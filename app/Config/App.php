<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class App extends BaseConfig
{
    /**
     * Base Site URL
     */
    public string $baseURL = 'http://localhost:8080/';

    /**
     * Allowed Hostnames in Site URL other than the hostname in the URL
     */
    public array $allowedHostnames = [];

    /**
     * Index File
     */
    public string $indexPage = '';

    /**
     * URI Protocol
     */
    public string $uriProtocol = 'REQUEST_URI';

    /**
     * Default Locale
     */
    public string $defaultLocale = 'id';

    /**
     * Negotiate Locale
     */
    public bool $negotiateLocale = false;

    /**
     * Supported Locales
     */
    public array $supportedLocales = ['en', 'id'];

    /**
     * Application Timezone
     */
    public string $appTimezone = 'Asia/Jakarta';

    /**
     * Default Character Set
     */
    public string $charset = 'UTF-8';

    /**
     * Force Global Secure Requests
     */
    public bool $forceGlobalSecureRequests = false;

    /**
     * Session Driver
     */
    public string $sessionDriver = 'CodeIgniter\Session\Handlers\FileHandler';

    /**
     * Session Cookie Name
     */
    public string $sessionCookieName = 'ci_session';

    /**
     * Session Expiration
     */
    public int $sessionExpiration = 7200;

    /**
     * Session Save Path
     */
    public ?string $sessionSavePath = null;

    /**
     * Session Match IP
     */
    public bool $sessionMatchIP = false;

    /**
     * Session Time to Update
     */
    public int $sessionTimeToUpdate = 300;

    /**
     * Session Regenerate Destroy
     */
    public bool $sessionRegenerateDestroy = false;

    /**
     * Content Security Policy
     */
    public bool $CSPEnabled = false;
}



