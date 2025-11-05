# template

## Documentation

### QA automation checks
The repository includes a lightweight Node.js script at `qa-tests/qa.js` that crawls the site using headless fetch requests to surface common quality issues:

- Broken internal or external links
- Referenced assets returning error responses (e.g., 404 stylesheets or scripts)
- Images whose reported size exceeds the configurable threshold (defaults to 500 KB)
- Missing SEO essentials (`<title>`, meta description, and meta robots tags)

### Running the QA script locally
1. Ensure you have Node.js 18 or newer available so that the built-in `fetch` API is present.
2. From the project root run one of the following commands:
   - `npm run qa -- <baseUrl>`
   - `yarn qa <baseUrl>` (Yarn automatically forwards additional arguments)
   - `node qa-tests/qa.js <baseUrl>`

If no `<baseUrl>` is provided the script defaults to `http://localhost:8000/`. You can also adjust behaviour via environment variables:

- `QA_MAX_PAGES`: limit the number of pages to crawl (default `50`).
- `QA_IMAGE_SIZE_LIMIT`: maximum allowed image size in bytes (default `512000`).
- `QA_FETCH_TIMEOUT`: request timeout in milliseconds (default `10000`).

The script exits with a non-zero status when any issues are detected and prints a categorized summary so CI pipelines or local developers can clearly see the failing checks.
