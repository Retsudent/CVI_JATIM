<?php

/*
 * This file is part of the CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/*
 |--------------------------------------------------------------------------
 | ERROR DISPLAY
 |--------------------------------------------------------------------------
 | Don't show ANY error messages on production, off by default.
 */
ini_set('display_errors', '1');
error_reporting(E_ALL);

/*
 |--------------------------------------------------------------------------
 | DEBUG MODE
 |--------------------------------------------------------------------------
 | Debug mode is an experimental flag that can allow some additional
 | information to be shown during development.
 */
defined('CI_DEBUG') || define('CI_DEBUG', false);

/*
 |--------------------------------------------------------------------------
 | ROOT PATH
 |--------------------------------------------------------------------------
 | The path to the project root directory. Just above the `public` folder.
 */
defined('ROOTPATH') || define('ROOTPATH', realpath(FCPATH . '../') . DIRECTORY_SEPARATOR);

/*
 |--------------------------------------------------------------------------
 | APP PATH
 |--------------------------------------------------------------------------
 | The path to the application directory.
 */
defined('APPPATH') || define('APPPATH', ROOTPATH . 'app' . DIRECTORY_SEPARATOR);

/*
 |--------------------------------------------------------------------------
 | SYSTEM PATH
 |--------------------------------------------------------------------------
 | The path to the system directory.
 */
defined('SYSTEMPATH') || define('SYSTEMPATH', ROOTPATH . 'vendor' . DIRECTORY_SEPARATOR . 'codeigniter4' . DIRECTORY_SEPARATOR . 'framework' . DIRECTORY_SEPARATOR . 'system' . DIRECTORY_SEPARATOR);

/*
 |--------------------------------------------------------------------------
 | WRITABLE PATH
 |--------------------------------------------------------------------------
 | The path to the writable directory.
 */
defined('WRITEPATH') || define('WRITEPATH', ROOTPATH . 'writable' . DIRECTORY_SEPARATOR);

/*
 |--------------------------------------------------------------------------
 | TEST PATH
 |--------------------------------------------------------------------------
 | The path to the tests directory.
 */
defined('TESTPATH') || define('TESTPATH', ROOTPATH . 'tests' . DIRECTORY_SEPARATOR);

/*
 |--------------------------------------------------------------------------
 | FCPATH
 |--------------------------------------------------------------------------
 | The path to the front controller (this file)
 */
defined('FCPATH') || define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

/*
 |--------------------------------------------------------------------------
 | VIEWPATH
 |--------------------------------------------------------------------------
 | The path to the view directory.
 */
defined('VIEWPATH') || define('VIEWPATH', APPPATH . 'Views' . DIRECTORY_SEPARATOR);

/*
 |--------------------------------------------------------------------------
 | COMPOSER AUTOLOAD
 |--------------------------------------------------------------------------
 | The path to the Composer autoload file.
 */
defined('COMPOSER_PATH') || define('COMPOSER_PATH', ROOTPATH . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

/*
 |--------------------------------------------------------------------------
 | ENVIRONMENT
 |--------------------------------------------------------------------------
 | The environment in which the application is running.
 */
defined('ENVIRONMENT') || define('ENVIRONMENT', $_ENV['CI_ENVIRONMENT'] ?? 'production');