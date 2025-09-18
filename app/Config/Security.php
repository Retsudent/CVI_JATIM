<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Security extends BaseConfig
{
    /**
     * CSRF Protection
     */
    public bool $csrfProtection = false;
    public string $csrfTokenName = 'csrf_test_name';
    public string $csrfHeaderName = 'X-CSRF-TOKEN';
    public string $csrfCookieName = 'csrf_cookie_name';
    public int $csrfExpire = 7200;
    public bool $csrfRegenerate = true;
    public bool $csrfRedirect = true;
    public string $csrfSameSite = 'Lax';

    /**
     * Content Security Policy
     */
    public bool $CSPEnabled = false;
}



