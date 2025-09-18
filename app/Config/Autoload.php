<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Autoload extends BaseConfig
{
    /**
     * An array of namespaces for autoloading.
     */
    public array $psr4 = [
        APP_NAMESPACE => APPPATH, // For custom app namespace
        'Config'      => APPPATH . 'Config',
    ];

    /**
     * Map of class names and locations
     */
    public array $classmap = [];

    /**
     * Files to automatically include
     */
    public array $files = [];

    /**
     * Helpers to automatically load
     */
    public array $helpers = ['url', 'form', 'html', 'custom'];
}
