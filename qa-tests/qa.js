#!/usr/bin/env node
/**
 * Lightweight QA checks for static/dynamic pages using headless HTTP requests.
 *
 * Usage: node qa-tests/qa.js <baseUrl>
 * Default baseUrl is http://localhost:8000/
 */
const { URL } = require('url');
const { setTimeout: delay } = require('timers/promises');

const BASE_URL = process.argv[2] || 'http://localhost:8000/';
const MAX_PAGES = parseInt(process.env.QA_MAX_PAGES || '50', 10);
const IMAGE_SIZE_LIMIT = parseInt(process.env.QA_IMAGE_SIZE_LIMIT || `${500 * 1024}`, 10); // 500 KB
const FETCH_TIMEOUT = parseInt(process.env.QA_FETCH_TIMEOUT || '10000', 10);

const normalizedBaseUrl = normalizeUrl(BASE_URL);

if (!normalizedBaseUrl) {
  console.error('Invalid base URL provided.');
  process.exit(1);
}

const visitedPages = new Set();
const pagesToVisit = [normalizedBaseUrl];
const brokenLinks = [];
const missingSeo = [];
const missingResources = [];
const heavyImages = [];

if (!global.fetch) {
  console.error('Global fetch is required (Node.js 18+).');
  process.exit(1);
}

function normalizeUrl(input) {
  try {
    const url = new URL(input, BASE_URL);
    if (url.hash) {
      url.hash = '';
    }
    return url.toString();
  } catch (error) {
    return null;
  }
}

function isSameOrigin(url) {
  try {
    const base = new URL(BASE_URL);
    const target = new URL(url);
    return base.origin === target.origin;
  } catch (error) {
    return false;
  }
}

function isIgnorableLink(href) {
  return !href || href.startsWith('mailto:') || href.startsWith('tel:') || href.startsWith('javascript:') || href.startsWith('#');
}

async function fetchWithTimeout(url, options = {}) {
  const controller = new AbortController();
  const timeout = setTimeout(() => controller.abort(), FETCH_TIMEOUT);
  try {
    const response = await fetch(url, { ...options, signal: controller.signal });
    return response;
  } finally {
    clearTimeout(timeout);
  }
}

async function safeFetch(url, options) {
  try {
    const response = await fetchWithTimeout(url, options);
    return response;
  } catch (error) {
    return { ok: false, status: 0, statusText: error.name || 'FetchError' };
  }
}

async function processAsset(url, context) {
  const response = await safeFetch(url, { method: 'HEAD' });
  if (!response.ok && response.status === 405) {
    return processAssetWithGet(url, context);
  }
  if (!response.ok) {
    missingResources.push({ url, status: response.status, statusText: response.statusText, context });
    return;
  }
  if (response.headers && response.headers.has('content-length')) {
    const size = parseInt(response.headers.get('content-length'), 10);
    if (!Number.isNaN(size) && size > IMAGE_SIZE_LIMIT && /\.(png|jpe?g|gif|webp|avif|svg)$/i.test(new URL(url).pathname)) {
      heavyImages.push({ url, size, context });
    }
  }
}

async function processAssetWithGet(url, context) {
  const response = await safeFetch(url, { method: 'GET' });
  if (!response.ok) {
    missingResources.push({ url, status: response.status, statusText: response.statusText, context });
    return;
  }
  if (response.headers && response.headers.has('content-length')) {
    const size = parseInt(response.headers.get('content-length'), 10);
    if (!Number.isNaN(size) && size > IMAGE_SIZE_LIMIT && /\.(png|jpe?g|gif|webp|avif|svg)$/i.test(new URL(url).pathname)) {
      heavyImages.push({ url, size, context });
    }
  } else if (/\.(png|jpe?g|gif|webp|avif|svg)$/i.test(new URL(url).pathname)) {
    // Attempt to infer large images even if content-length is missing by downloading small chunk
    try {
      const buffer = await response.arrayBuffer();
      if (buffer.byteLength > IMAGE_SIZE_LIMIT) {
        heavyImages.push({ url, size: buffer.byteLength, context });
      }
    } catch (error) {
      // ignore read errors here
    }
  }
}

async function processPage(url) {
  if (visitedPages.has(url) || visitedPages.size >= MAX_PAGES) {
    return;
  }
  visitedPages.add(url);
  const response = await safeFetch(url, { headers: { 'User-Agent': 'QA-Bot/1.0 (+https://example.com)' } });
  if (!response.ok) {
    brokenLinks.push({ url, status: response.status, statusText: response.statusText, source: url });
    return;
  }
  const contentType = response.headers.get('content-type') || '';
  if (!contentType.includes('text/html')) {
    return;
  }
  const html = await response.text();
  evaluateSeo(url, html);
  const links = extractLinks(html, url);
  const assets = extractAssets(html, url);

  for (const link of links) {
    if (!visitedPages.has(link) && isSameOrigin(link)) {
      pagesToVisit.push(link);
    } else if (!isSameOrigin(link)) {
      // For external links, perform a HEAD request to ensure reachability
      const res = await safeFetch(link, { method: 'HEAD' });
      if (!res.ok) {
        brokenLinks.push({ url: link, status: res.status, statusText: res.statusText, source: url });
      }
    }
  }

  for (const asset of assets) {
    await processAsset(asset, url);
  }

  // small delay to avoid hammering servers
  await delay(50);
}

function extractLinks(html, currentUrl) {
  const links = new Set();
  const hrefRegex = /<a\s+[^>]*href\s*=\s*"([^"]+)"|<a\s+[^>]*href\s*=\s*'([^']+)'/gi;
  let match;
  while ((match = hrefRegex.exec(html)) !== null) {
    const href = match[1] || match[2];
    if (isIgnorableLink(href)) continue;
    const normalized = normalizeUrl(new URL(href, currentUrl).toString());
    if (normalized) {
      links.add(normalized);
    }
  }
  return Array.from(links);
}

function extractAssets(html, currentUrl) {
  const assets = new Set();
  const assetRegexes = [
    /<img\s+[^>]*src\s*=\s*"([^"]+)"|<img\s+[^>]*src\s*=\s*'([^']+)'/gi,
    /<script\s+[^>]*src\s*=\s*"([^"]+)"|<script\s+[^>]*src\s*=\s*'([^']+)'/gi,
    /<link\s+[^>]*href\s*=\s*"([^"]+)"|<link\s+[^>]*href\s*=\s*'([^']+)'/gi,
    /<source\s+[^>]*src\s*=\s*"([^"]+)"|<source\s+[^>]*src\s*=\s*'([^']+)'/gi
  ];
  for (const regex of assetRegexes) {
    let match;
    while ((match = regex.exec(html)) !== null) {
      const src = match[1] || match[2];
      if (!src || src.startsWith('data:')) continue;
      const normalized = normalizeUrl(new URL(src, currentUrl).toString());
      if (normalized) {
        assets.add(normalized);
      }
    }
  }
  return Array.from(assets);
}

function evaluateSeo(url, html) {
  const titleMatch = html.match(/<title>(.*?)<\/title>/i);
  const descriptionMatch = html.match(/<meta\s+name=["']description["']\s+content=["']([^"']+)["']/i);
  const robotsMatch = html.match(/<meta\s+name=["']robots["']\s+content=["']([^"']+)["']/i);

  const missing = [];
  if (!titleMatch || !titleMatch[1].trim()) missing.push('title');
  if (!descriptionMatch || !descriptionMatch[1].trim()) missing.push('meta description');
  if (!robotsMatch || !robotsMatch[1].trim()) missing.push('meta robots');

  if (missing.length) {
    missingSeo.push({ url, missing });
  }
}

(async () => {
  while (pagesToVisit.length) {
    const next = pagesToVisit.shift();
    if (!next || visitedPages.has(next)) continue;
    await processPage(next);
  }

  report();
})();

function report() {
  const issues = [];

  if (brokenLinks.length) {
    issues.push(`Broken links (${brokenLinks.length})`);
    console.log('\nBroken links:');
    for (const item of brokenLinks) {
      console.log(` - ${item.url} (status: ${item.status} ${item.statusText}) [found on ${item.source}]`);
    }
  }

  if (missingResources.length) {
    issues.push(`Missing resources (${missingResources.length})`);
    console.log('\nMissing resources:');
    for (const item of missingResources) {
      console.log(` - ${item.url} (status: ${item.status} ${item.statusText}) [referenced in ${item.context}]`);
    }
  }

  if (heavyImages.length) {
    issues.push(`Heavy images (${heavyImages.length})`);
    console.log('\nImages exceeding size limit:');
    for (const item of heavyImages) {
      console.log(` - ${item.url} (${formatBytes(item.size)}) [referenced in ${item.context}]`);
    }
  }

  if (missingSeo.length) {
    issues.push(`Missing SEO tags (${missingSeo.length})`);
    console.log('\nMissing SEO tags:');
    for (const page of missingSeo) {
      console.log(` - ${page.url}: missing ${page.missing.join(', ')}`);
    }
  }

  if (!issues.length) {
    console.log(`\nQA checks completed successfully for ${visitedPages.size} page(s).`);
    process.exit(0);
  } else {
    console.error('\nQA issues detected:');
    for (const issue of issues) {
      console.error(` * ${issue}`);
    }
    process.exit(1);
  }
}

function formatBytes(bytes) {
  if (bytes === 0) return '0 B';
  const k = 1024;
  const sizes = ['B', 'KB', 'MB', 'GB'];
  const i = Math.floor(Math.log(bytes) / Math.log(k));
  const value = bytes / Math.pow(k, i);
  return `${value.toFixed(2)} ${sizes[i]}`;
}
