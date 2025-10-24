<?php

namespace App\Controllers;

class Debug extends BaseController
{
    // Simple echo endpoint to help debug incoming requests during development.
    public function echoPost($id = null)
    {
        $headers = [];
        foreach (getallheaders() as $k => $v) {
            $headers[$k] = $v;
        }

        $post = $this->request->getPost();
        $json = [];
        // Also capture raw body
        $raw = $this->request->getBody();

        log_message('info', '[Debug::echoPost] Called for id=' . ($id ?? 'none') . '. Headers: ' . json_encode(array_keys($headers)) . ' POST keys: ' . json_encode(array_keys((array)$post)));

        $json['headers'] = $headers;
        $json['post'] = $post;
        $json['raw'] = $raw;
        $json['method'] = $this->request->getMethod();
        $json['uri'] = (string)$this->request->getURI();

        return $this->response->setStatusCode(200)->setJSON($json);
    }
}
