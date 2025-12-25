<?php
if (!function_exists('nova_navigation_items')) {
    function nova_navigation_items($homePath = '/home-1')
    {
        $homePath = $homePath ?: '/home-1';
        return [
            ['label' => 'Home', 'href' => $homePath, 'key' => 'Home'],
            ['label' => 'Services', 'href' => '/services.php', 'key' => 'Services'],
            ['label' => 'Projects', 'href' => '/gallery.php', 'key' => 'Projects'],
            ['label' => 'About', 'href' => '/about.php', 'key' => 'About'],
            ['label' => 'Contact', 'href' => '/contact.php', 'key' => 'Contact'],
        ];
    }
}

if (!function_exists('nova_navigation_link_class')) {
    function nova_navigation_link_class($itemKey, $activeKey)
    {
        return trim($itemKey === $activeKey ? 'is-active' : '');
    }
}
