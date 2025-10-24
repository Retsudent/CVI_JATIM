<?php

namespace App\Controllers;

class Contact extends BaseController
{
    public function index()
    {
        // Handle POST submission (AJAX or normal POST)
        if ($this->request->getMethod() === 'post') {
            $post = $this->request->getPost();

            // Basic validation
            $name = trim($post['name'] ?? '');
            $email = trim($post['email'] ?? '');
            $subject = trim($post['subject'] ?? 'Contact');
            $phone = trim($post['phone'] ?? '');
            $message = trim($post['message'] ?? '');

            if ($name === '' || $email === '' || $message === '') {
                return $this->response->setStatusCode(422)->setJSON(['error' => 'Validation failed']);
            }

            // Send email to site owner
            try {
                $mailer = \Config\Services::email();
                $mailer->setFrom('info@cviwirotaman.com', 'CVI Wirotaman');
                $mailer->setTo('ceokop12@gmail.com');
                // set reply-to so owner can reply directly to sender
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $mailer->setReplyTo($email, $name);
                }

                $mailer->setSubject('[Website Contact] ' . ($subject ?: 'Pesan Baru'));

                $body = "Nama: " . $name . "\n";
                $body .= "Email: " . $email . "\n";
                $body .= "Telepon: " . $phone . "\n\n";
                $body .= "Pesan:\n" . $message . "\n";

                $mailer->setMessage(nl2br(htmlspecialchars($body)));

                if ($mailer->send()) {
                    return $this->response->setJSON(['success' => true]);
                } else {
                    log_message('error', '[Contact] Email send failed: ' . $mailer->printDebugger(['headers','subject','body']));
                    return $this->response->setStatusCode(500)->setJSON(['error' => 'Failed to send email']);
                }
            } catch (\Exception $e) {
                log_message('error', '[Contact] Exception sending email: ' . $e->getMessage());
                return $this->response->setStatusCode(500)->setJSON(['error' => 'Server error']);
            }
        }

        $data = [
            'title' => 'Contact - CVI WIROTAMAN'
        ];

        return render('contact/index', $data);
    }
}
