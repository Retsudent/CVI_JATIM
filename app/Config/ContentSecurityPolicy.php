<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class ContentSecurityPolicy extends BaseConfig
{
    /**
     * Content Security Policy
     */
    public bool $reportOnly = false;
    public array $defaultSrc = ['self'];
    public array $scriptSrc = ['self', 'unsafe-inline', 'unsafe-eval', 'cdn.jsdelivr.net', 'cdnjs.cloudflare.com'];
    public array $styleSrc = ['self', 'unsafe-inline', 'fonts.googleapis.com', 'cdn.jsdelivr.net', 'cdnjs.cloudflare.com'];
    public array $imageSrc = ['self', 'data:', 'https:'];
    public array $baseURI = ['self'];
    public array $childSrc = ['self'];
    public array $connectSrc = ['self'];
    public array $fontSrc = ['self', 'fonts.gstatic.com'];
    public array $formAction = ['self'];
    public array $frameAncestors = ['none'];
    public array $mediaSrc = ['self'];
    public array $objectSrc = ['self'];
    public array $pluginTypes = [];
    public array $reportURI = [];
    public array $sandbox = [];
    public array $upgradeInsecureRequests = [];
    public array $manifestSrc = [];
    public array $workerSrc = [];
}



