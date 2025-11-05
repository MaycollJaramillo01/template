<?php
if (!function_exists('nova_clean_string')) {
    function nova_clean_string($value)
    {
        if (is_array($value) || is_object($value)) {
            return '';
        }
        $value = (string) $value;
        $value = trim($value);
        return $value;
    }
}

if (!function_exists('nova_text_fallback')) {
    function nova_text_fallback($value, $fallback = '', $company = '')
    {
        $value = nova_clean_string($value);
        if ($value !== '') {
            return $value;
        }
        $fallback = nova_clean_string(is_callable($fallback) ? $fallback() : $fallback);
        if ($fallback !== '') {
            return $fallback;
        }
        $company = nova_clean_string($company);
        if ($company !== '') {
            return $company . ' image';
        }
        return 'Website image';
    }
}

if (!function_exists('nova_img_alt')) {
    function nova_img_alt($value, $fallback = '', $company = '')
    {
        $text = nova_text_fallback($value, $fallback, $company);
        return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('nova_collect_social_links')) {
    function nova_collect_social_links(array $links)
    {
        $clean = [];
        foreach ($links as $link) {
            $link = nova_clean_string($link);
            if ($link !== '') {
                $clean[$link] = $link;
            }
        }
        return array_values($clean);
    }
}

if (!function_exists('nova_first_non_empty')) {
    function nova_first_non_empty(array $candidates, $fallback = '')
    {
        foreach ($candidates as $candidate) {
            if (is_array($candidate)) {
                $candidate = reset($candidate);
            }
            $candidate = nova_clean_string($candidate);
            if ($candidate !== '') {
                return $candidate;
            }
        }
        return nova_clean_string($fallback);
    }
}

if (!function_exists('nova_limit_text')) {
    function nova_limit_text($text, $max = 155)
    {
        $text = nova_clean_string($text);
        if ($text === '') {
            return '';
        }
        $length = function_exists('mb_strlen') ? mb_strlen($text, 'UTF-8') : strlen($text);
        if ($length <= $max) {
            return $text;
        }
        $trimmed = function_exists('mb_substr') ? mb_substr($text, 0, $max - 1, 'UTF-8') : substr($text, 0, $max - 1);
        $trimmed = rtrim($trimmed, " ,.;:-\t\n\r");
        return $trimmed . '…';
    }
}

if (!function_exists('nova_ensure_absolute_url')) {
    function nova_ensure_absolute_url($domain, $path)
    {
        $domain = nova_clean_string($domain);
        $path = nova_clean_string($path);
        if ($path === '') {
            return $domain;
        }
        if (preg_match('/^https?:\/\//i', $path)) {
            return $path;
        }
        if ($domain === '') {
            return $path;
        }
        if ($path[0] !== '/') {
            $path = '/' . $path;
        }
        return rtrim($domain, '/') . $path;
    }
}

if (!function_exists('nova_canonical_url')) {
    function nova_canonical_url($domain, $requestUri = '/')
    {
        $domain = nova_clean_string($domain);
        $path = '/';
        if ($requestUri !== null) {
            $parsed = parse_url((string) $requestUri, PHP_URL_PATH);
            if ($parsed !== null && $parsed !== '') {
                $path = $parsed;
            }
        }
        if ($path === '') {
            $path = '/';
        }
        return nova_ensure_absolute_url($domain, $path);
    }
}

if (!function_exists('nova_document_title')) {
    function nova_document_title($company, $pageTitle = '', $separator = ' | ')
    {
        $company = nova_clean_string($company);
        $pageTitle = nova_clean_string($pageTitle);
        if ($company === '') {
            return $pageTitle !== '' ? $pageTitle : 'Website';
        }
        if ($pageTitle === '' || stripos($pageTitle, $company) !== false) {
            return $company;
        }
        return $company . $separator . $pageTitle;
    }
}

if (!function_exists('nova_detect_languages')) {
    function nova_detect_languages($note)
    {
        $note = strtolower(nova_clean_string($note));
        $languages = ['English'];
        if ($note !== '' && (strpos($note, 'bilingual') !== false || strpos($note, 'spanish') !== false || strpos($note, 'español') !== false)) {
            $languages[] = 'Spanish';
        }
        return array_values(array_unique($languages));
    }
}

if (!function_exists('nova_extract_twitter_handle')) {
    function nova_extract_twitter_handle($url)
    {
        $url = nova_clean_string($url);
        if ($url === '') {
            return '';
        }
        if (preg_match('~(?:https?://)?(?:www\.)?(?:twitter\.com|x\.com)/@?([A-Za-z0-9_]{1,15})~', $url, $match)) {
            return '@' . $match[1];
        }
        return '';
    }
}

if (!function_exists('nova_parse_address')) {
    function nova_parse_address($address)
    {
        $address = nova_clean_string($address);
        if ($address === '') {
            return [];
        }
        $parsed = [
            'streetAddress' => $address,
        ];
        if (preg_match('/^(.*?),(?:\s+)?([A-Z]{2})(?:\s+(\d{5}))?$/', $address, $matches)) {
            $city = nova_clean_string($matches[1]);
            $region = strtoupper($matches[2]);
            $postal = isset($matches[3]) ? nova_clean_string($matches[3]) : '';
            if ($city !== '') {
                $parsed['streetAddress'] = $city;
                $parsed['addressLocality'] = $city;
            }
            if ($region !== '') {
                $parsed['addressRegion'] = $region;
                $parsed['addressCountry'] = 'US';
            }
            if ($postal !== '') {
                $parsed['postalCode'] = $postal;
            }
        }
        return $parsed;
    }
}

if (!function_exists('nova_schema_filter')) {
    function nova_schema_filter($value)
    {
        if (is_array($value)) {
            $value = array_map('nova_schema_filter', $value);
            $value = array_filter($value, function ($item) {
                if (is_array($item)) {
                    return !empty($item);
                }
                if (is_string($item)) {
                    return trim($item) !== '';
                }
                return $item !== null && $item !== '';
            });
        } elseif (is_string($value)) {
            $value = trim($value);
        }
        return $value;
    }
}

if (!function_exists('nova_build_structured_data')) {
    function nova_build_structured_data(array $data)
    {
        $company = nova_clean_string($data['company'] ?? '');
        $domain = nova_clean_string($data['domain'] ?? '');
        if ($domain !== '' && !preg_match('/^https?:\/\//i', $domain)) {
            $domain = 'https://' . ltrim($domain, '/');
        }
        $domain = rtrim($domain, '/');
        $description = nova_clean_string($data['description'] ?? '');
        $logo = nova_clean_string($data['logo'] ?? '');
        $email = nova_clean_string($data['email'] ?? '');
        $phone = nova_clean_string($data['phone'] ?? '');
        $coverage = nova_clean_string($data['coverage'] ?? '');
        $services = nova_clean_string($data['services'] ?? '');
        $schedule = nova_clean_string($data['schedule'] ?? '');
        $address = nova_clean_string($data['address'] ?? '');
        $map = nova_clean_string($data['map'] ?? '');
        $sameAs = nova_collect_social_links($data['sameAs'] ?? []);
        $languages = array_values(array_filter(array_map('nova_clean_string', $data['languages'] ?? [])));
        if (empty($languages)) {
            $languages = null;
        }

        $organizationId = $domain !== '' ? $domain . '#organization' : null;
        $localBusinessId = $domain !== '' ? $domain . '#localbusiness' : null;
        $websiteId = $domain !== '' ? $domain . '#website' : null;

        $contactPoint = [];
        if ($phone !== '' || $email !== '') {
            $contactPoint[] = array_filter([
                '@type' => 'ContactPoint',
                'telephone' => $phone !== '' ? $phone : null,
                'email' => $email !== '' ? $email : null,
                'contactType' => 'customer service',
                'areaServed' => $coverage !== '' ? $coverage : null,
                'availableLanguage' => $languages,
            ], function ($value) {
                if (is_array($value)) {
                    return !empty($value);
                }
                return $value !== null && $value !== '';
            });
        }

        $openingHours = [];
        if ($schedule !== '') {
            $normalized = strtolower($schedule);
            if (strpos($normalized, '24/7') !== false || strpos($normalized, '24-7') !== false || strpos($normalized, '24 hours') !== false) {
                $openingHours[] = [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'],
                    'opens' => '00:00',
                    'closes' => '23:59',
                ];
            }
        }

        $organization = array_filter([
            '@type' => 'Organization',
            '@id' => $organizationId,
            'name' => $company !== '' ? $company : null,
            'url' => $domain !== '' ? $domain : null,
            'logo' => $logo !== '' ? $logo : null,
            'sameAs' => !empty($sameAs) ? $sameAs : null,
            'contactPoint' => !empty($contactPoint) ? $contactPoint : null,
        ], function ($value) {
            if (is_array($value)) {
                return !empty($value);
            }
            return $value !== null && $value !== '';
        });

        $addressData = $address !== '' ? nova_parse_address($address) : [];

        $localBusiness = array_filter([
            '@type' => 'LocalBusiness',
            '@id' => $localBusinessId,
            'name' => $company !== '' ? $company : null,
            'description' => $description !== '' ? $description : null,
            'url' => $domain !== '' ? $domain : null,
            'image' => $logo !== '' ? [$logo] : null,
            'telephone' => $phone !== '' ? $phone : null,
            'email' => $email !== '' ? $email : null,
            'address' => !empty($addressData) ? array_merge(['@type' => 'PostalAddress'], $addressData) : null,
            'areaServed' => $coverage !== '' ? $coverage : null,
            'serviceType' => $services !== '' ? $services : null,
            'openingHoursSpecification' => !empty($openingHours) ? $openingHours : null,
            'hasMap' => $map !== '' ? $map : null,
            'parentOrganization' => $organizationId ? ['@id' => $organizationId] : null,
            'sameAs' => !empty($sameAs) ? $sameAs : null,
        ], function ($value) {
            if (is_array($value)) {
                return !empty($value);
            }
            return $value !== null && $value !== '';
        });

        $website = array_filter([
            '@type' => 'WebSite',
            '@id' => $websiteId,
            'url' => $domain !== '' ? $domain : null,
            'name' => $company !== '' ? $company : null,
            'description' => $description !== '' ? $description : null,
            'publisher' => $organizationId ? ['@id' => $organizationId] : null,
        ], function ($value) {
            if (is_array($value)) {
                return !empty($value);
            }
            return $value !== null && $value !== '';
        });

        $graph = [];
        if (!empty($organization)) {
            $graph[] = $organization;
        }
        if (!empty($localBusiness)) {
            $graph[] = $localBusiness;
        }
        if (!empty($website)) {
            $graph[] = $website;
        }

        if (empty($graph)) {
            return [];
        }

        return [
            '@context' => 'https://schema.org',
            '@graph' => $graph,
        ];
    }
}

if (!function_exists('nova_render_structured_data')) {
    function nova_render_structured_data(array $data)
    {
        $graph = nova_build_structured_data($data);
        if (empty($graph)) {
            return '';
        }
        return json_encode($graph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}

if (!function_exists('nova_prepare_head_metadata')) {
    function nova_prepare_head_metadata(array $context)
    {
        $company = nova_clean_string($context['company'] ?? '');
        $pageTitle = nova_clean_string($context['pageTitle'] ?? '');
        $domain = nova_clean_string($context['domain'] ?? '');
        $fallbackDomain = nova_clean_string($context['fallbackDomain'] ?? '');
        $metaImage = nova_clean_string($context['metaImage'] ?? '');
        $requestUri = $context['requestUri'] ?? '/';
        $descriptionCandidates = $context['descriptionCandidates'] ?? [];
        $fallbackDescription = $context['fallbackDescription'] ?? '';
        $social = $context['social'] ?? [];
        $map = $context['map'] ?? '';
        $email = $context['email'] ?? '';
        $phone = $context['phone'] ?? '';
        $coverage = $context['coverage'] ?? '';
        $services = $context['services'] ?? '';
        $schedule = $context['schedule'] ?? '';
        $address = $context['address'] ?? '';
        $languages = $context['languages'] ?? [];
        $twitterUrl = $context['twitterUrl'] ?? '';
        $defaultSiteName = $context['defaultSiteName'] ?? 'Website';

        $title = nova_document_title($company, $pageTitle);

        $descriptionPool = $descriptionCandidates;
        $descriptionPool[] = $fallbackDescription;
        $metaDescriptionRaw = nova_first_non_empty($descriptionPool, $fallbackDescription);
        $metaDescription = nova_limit_text($metaDescriptionRaw, 160);

        $baseDomain = $domain !== '' ? $domain : $fallbackDomain;
        $canonical = nova_canonical_url($baseDomain, $requestUri);
        $imageAbsolute = nova_ensure_absolute_url($baseDomain !== '' ? $baseDomain : $canonical, $metaImage !== '' ? $metaImage : '/assets/img/normal/about_4.jpg');

        $siteName = nova_first_non_empty([$company, $defaultSiteName], $defaultSiteName);

        $socialLinks = nova_collect_social_links($social);
        $structuredDataJson = nova_render_structured_data([
            'company' => $company,
            'domain' => $baseDomain !== '' ? $baseDomain : $canonical,
            'description' => $metaDescriptionRaw,
            'logo' => $imageAbsolute,
            'email' => $email,
            'phone' => $phone,
            'coverage' => $coverage,
            'services' => $services,
            'schedule' => $schedule,
            'address' => $address,
            'map' => $map,
            'sameAs' => $socialLinks,
            'languages' => $languages,
        ]);

        $twitterHandle = nova_extract_twitter_handle($twitterUrl);

        return [
            'title' => $title,
            'description' => $metaDescription,
            'description_raw' => $metaDescriptionRaw,
            'canonical' => $canonical,
            'image' => $imageAbsolute,
            'url' => $canonical,
            'site_name' => $siteName !== '' ? $siteName : $defaultSiteName,
            'twitter_handle' => $twitterHandle,
            'structured_data' => $structuredDataJson,
            'same_as' => $socialLinks,
        ];
    }
}
