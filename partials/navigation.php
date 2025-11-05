<?php
if (!function_exists('nova_navigation_items')) {
    function nova_navigation_items($homePath = '/home-1')
    {
        $homePath = $homePath ?: '/home-1';
        return [
            ['label' => 'Home', 'href' => $homePath, 'key' => 'Home'],
            ['label' => 'About Us', 'href' => '/about.php', 'key' => 'About'],
            ['label' => 'Our Services', 'href' => '/services.php', 'key' => 'Services'],
            ['label' => 'Gallery', 'href' => '/gallery.php', 'key' => 'Gallery'],
            ['label' => 'Contact Us', 'href' => '/contact.php', 'key' => 'Contact'],
        ];
    }
}

if (!function_exists('nova_navigation_link_class')) {
    function nova_navigation_link_class($itemKey, $activeKey)
    {
        return trim($itemKey === $activeKey ? 'is-active' : '');
    }
}
