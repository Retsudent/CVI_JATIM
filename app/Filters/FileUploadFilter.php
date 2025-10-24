<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FileUploadFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        helper(['form']);

        $files = $request->getFileMultiple(null);
        if (!empty($files)) {
            $maxSize = 4 * 1024 * 1024; // 4MB
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

            foreach ($files as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    if ($file->getSize() > $maxSize) {
                        return service('response')
                            ->setStatusCode(413)
                            ->setJSON([
                                'error' => 'File terlalu besar. Maksimal ukuran file adalah 4MB.'
                            ]);
                    }

                    $mimeType = $file->getMimeType();
                    if (!in_array($mimeType, $allowedTypes)) {
                        return service('response')
                            ->setStatusCode(415)
                            ->setJSON([
                                'error' => 'Tipe file tidak diizinkan. File harus berupa gambar (JPG, PNG, atau GIF).'
                            ]);
                    }
                }
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing after request
    }
}