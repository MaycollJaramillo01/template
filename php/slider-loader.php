<?php
/**
 * Slider loader utility.
 */

if (!function_exists('nova_slider_registry')) {
    function nova_slider_registry(): array
    {
        $baseDir = __DIR__ . '/../partials/slider';

        return [
            'hero-a' => [
                'file'    => $baseDir . '/slider-hero-a.php',
                'styles'  => ['/assets/css/hero/slider-hero-a.css'],
                'scripts' => [],
            ],
            'hero-b' => [
                'file'    => $baseDir . '/slider-hero-b.php',
                'styles'  => ['/assets/css/hero/slider-hero-b.css'],
                'scripts' => ['/assets/js/hero/slider-hero-b.js'],
            ],
            'hero-c' => [
                'file'    => $baseDir . '/slider-hero-c.php',
                'styles'  => ['/assets/css/hero/slider-hero-c.css'],
                'scripts' => ['/assets/js/hero/slider-hero-c.js'],
            ],
        ];
    }
}

if (!function_exists('nova_slider_resolve_variant')) {
    function nova_slider_resolve_variant(?string $variant): string
    {
        $variant = strtolower((string)$variant);
        $registry = nova_slider_registry();

        if (isset($registry[$variant])) {
            return $variant;
        }

        return 'hero-a';
    }
}

if (!function_exists('nova_slider_prepare')) {
    function nova_slider_prepare(?string $variant): array
    {
        $resolved = nova_slider_resolve_variant($variant);
        $registry = nova_slider_registry();
        $entry    = $registry[$resolved];

        return [
            'variant' => $resolved,
            'styles'  => $entry['styles'],
            'scripts' => $entry['scripts'],
        ];
    }
}

if (!function_exists('nova_slider_render')) {
    function nova_slider_render(array $payload): void
    {
        $variant  = $payload['variant'] ?? 'hero-a';
        $registry = nova_slider_registry();

        if (!isset($registry[$variant])) {
            $variant = 'hero-a';
        }

        $file = $registry[$variant]['file'];
        if (file_exists($file)) {
            include $file;
        }
    }
}
