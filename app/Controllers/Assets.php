<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;

class Assets extends BaseController
{
    public function image(string $path = ''): ResponseInterface
    {
        // Normalize and prevent directory traversal
        $safePath = str_replace(['..', '\\'], ['', '/'], $path);
        $fullPath = ROOTPATH . 'public' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $safePath;

        if (!is_file($fullPath)) {
            return $this->response->setStatusCode(404)->setBody('Not Found');
        }

        $ext = strtolower(pathinfo($fullPath, PATHINFO_EXTENSION));
        $mime = match ($ext) {
            'jpg', 'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'webp' => 'image/webp',
            'svg' => 'image/svg+xml',
            default => 'application/octet-stream',
        };

        return $this->response
            ->setHeader('Content-Type', $mime)
            ->setBody(file_get_contents($fullPath));
    }
}



