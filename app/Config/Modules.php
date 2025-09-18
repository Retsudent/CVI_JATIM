<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Modules extends BaseConfig
{
    /**
     * An array of namespaces for autoloading.
     */
    public array $psr4 = [];

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
    public array $helpers = [];
}
