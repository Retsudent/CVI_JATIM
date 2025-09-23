<?php

if (!function_exists('base_url')) {
    /**
     * Return the base URL to use in views
     */
    function base_url(string $path = ''): string
    {
        // Get the current protocol
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        
        // Get the host
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost:8080';
        
        // Build base URL
        $baseURL = $protocol . '://' . $host . '/';
        
        if ($path === '') {
            return $baseURL;
        }
        
        $path = ltrim($path, '/');
        return $baseURL . $path;
    }
}

if (!function_exists('esc')) {
    /**
     * Escape data to prevent XSS attacks
     */
    function esc($data, string $context = 'html'): string
    {
        if (is_string($data)) {
            return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        }
        return (string) $data;
    }
}

if (!function_exists('current_url')) {
    /**
     * Get current URL
     */
    function current_url(): string
    {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost:8080';
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        
        return $protocol . '://' . $host . $uri;
    }
}

if (!function_exists('site_url')) {
    /**
     * Get site URL
     */
    function site_url(string $path = ''): string
    {
        return base_url($path);
    }
}
?>