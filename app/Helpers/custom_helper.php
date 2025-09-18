<?php

if (!function_exists('base_url')) {
    /**
     * Return the base URL to use in views
     */
    function base_url(string $path = ''): string
    {
        // Derive base URL from current request to support standalone bootstrap
        $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost:8080';
        $baseURL = $scheme . '://' . $host . '/';

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

// Do not override PHP built-ins in this simplified runtime
