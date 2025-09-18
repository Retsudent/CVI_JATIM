<?php

namespace Config;

use CodeIgniter\Config\BaseService;

/**
 * Services Configuration file.
 *
 * Services are simply other classes/libraries that the system uses
 * to do its job. This is used by CodeIgniter to allow the core of the
 * framework to be swapped out easily without affecting the usage within
 * the rest of your application.
 *
 * This file holds any application-specific services, or service overrides
 * that you might need. However, be aware that this file is loaded very
 * early in the boot process, so you may need to access other services
 * via the Services class.
 */
class Services extends BaseService
{
    /**
     * The Autoloader class is the central class that handles
     * all of the autoloading for the application.
     *
     * @param bool $getShared
     *
     * @return \CodeIgniter\Autoloader\Autoloader
     */
    public static function autoloader(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('autoloader');
        }

        return new \CodeIgniter\Autoloader\Autoloader();
    }

    /**
     * The CLI Request class provides for ways to interact with
     * the command line.
     *
     * @param bool $getShared
     *
     * @return \CodeIgniter\HTTP\CLIRequest
     */
    public static function clirequest(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('clirequest');
        }

        return new \CodeIgniter\HTTP\CLIRequest();
    }

    /**
     * The CURL Request class acts as a simple HTTP client for interacting
     * with other servers, typically through APIs.
     *
     * @param bool $getShared
     *
     * @return \CodeIgniter\HTTP\CURLRequest
     */
    public static function curlrequest(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('curlrequest');
        }

        return new \CodeIgniter\HTTP\CURLRequest();
    }

    /**
     * The Email class allows you to send email via mail, sendmail, SMTP.
     *
     * @param bool $getShared
     *
     * @return \CodeIgniter\Email\Email
     */
    public static function email(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('email');
        }

        return new \CodeIgniter\Email\Email();
    }

    /**
     * The Exceptions class holds the methods that can be used to display
     * exceptions, and show a stack trace.
     *
     * @param bool $getShared
     *
     * @return \CodeIgniter\Debug\Exceptions
     */
    public static function exceptions(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('exceptions');
        }

        return new \CodeIgniter\Debug\Exceptions();
    }

    /**
     * The Filters class allows you to run pre and post action filters
     * on controller methods.
     *
     * @param bool $getShared
     *
     * @return \CodeIgniter\Filters\Filters
     */
    public static function filters(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('filters');
        }

        return new \CodeIgniter\Filters\Filters();
    }

    /**
     * The Honeypot class provides a simple way to protect forms from
     * spam bots.
     *
     * @param bool $getShared
     *
     * @return \CodeIgniter\Security\Honeypot
     */
    public static function honeypot(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('honeypot');
        }

        return new \CodeIgniter\Security\Honeypot();
    }

    /**
     * The Logger class is a PSR-3 compatible Logging class that supports
     * multiple handlers that process the actual logging.
     *
     * @param bool $getShared
     *
     * @return \CodeIgniter\Log\Logger
     */
    public static function logger(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('logger');
        }

        return new \CodeIgniter\Log\Logger();
    }

    /**
     * The Migrations class provides a way to manage your database schema
     * and can automatically migrate your database.
     *
     * @param bool $getShared
     *
     * @return \CodeIgniter\Database\MigrationRunner
     */
    public static function migrations(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('migrations');
        }

        return new \CodeIgniter\Database\MigrationRunner();
    }

    /**
     * The Pagination class provides a simple way to paginate your
     * data.
     *
     * @param bool $getShared
     *
     * @return \CodeIgniter\Pagination\Pager
     */
    public static function pager(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('pager');
        }

        return new \CodeIgniter\Pagination\Pager();
    }

    /**
     * The Parser class provides a simple way to parse your templates.
     *
     * @param bool $getShared
     *
     * @return \CodeIgniter\View\Parser
     */
    public static function parser(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('parser');
        }

        return new \CodeIgniter\View\Parser();
    }

    /**
     * The Request class models an HTTP request.
     *
     * @param bool $getShared
     *
     * @return \CodeIgniter\HTTP\IncomingRequest
     */
    public static function request(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('request');
        }

        return new \CodeIgniter\HTTP\IncomingRequest();
    }

    /**
     * The Response class models an HTTP response.
     *
     * @param bool $getShared
     *
     * @return \CodeIgniter\HTTP\Response
     */
    public static function response(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('response');
        }

        return new \CodeIgniter\HTTP\Response();
    }

    /**
     * The Router class uses a RouteCollection to route HTTP requests
     * to the appropriate controller method.
     *
     * @param bool $getShared
     *
     * @return \CodeIgniter\Router\Router
     */
    public static function router(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('router');
        }

        return new \CodeIgniter\Router\Router();
    }

    /**
     * The Security class provides a few handy tools for keeping your site
     * secure, most notably the CSRF protection tools.
     *
     * @param bool $getShared
     *
     * @return \CodeIgniter\Security\Security
     */
    public static function security(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('security');
        }

        return new \CodeIgniter\Security\Security();
    }

    /**
     * The Session class provides a way to persist variables across
     * multiple HTTP requests.
     *
     * @param bool $getShared
     *
     * @return \CodeIgniter\Session\Session
     */
    public static function session(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('session');
        }

        return new \CodeIgniter\Session\Session();
    }

    /**
     * The Throttler class provides a simple method to implement
     * rate limiting in your applications.
     *
     * @param bool $getShared
     *
     * @return \CodeIgniter\Throttle\Throttler
     */
    public static function throttler(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('throttler');
        }

        return new \CodeIgniter\Throttle\Throttler();
    }

    /**
     * The Timer class provides a simple way to Benchmark portions of
     * your application.
     *
     * @param bool $getShared
     *
     * @return \CodeIgniter\Debug\Timer
     */
    public static function timer(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('timer');
        }

        return new \CodeIgniter\Debug\Timer();
    }

    /**
     * The URI class provides a way to model and manipulate URIs.
     *
     * @param bool $getShared
     *
     * @return \CodeIgniter\HTTP\URI
     */
    public static function uri(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('uri');
        }

        return new \CodeIgniter\HTTP\URI();
    }

    /**
     * The Validation class allows you to validate data.
     *
     * @param bool $getShared
     *
     * @return \CodeIgniter\Validation\Validation
     */
    public static function validation(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('validation');
        }

        return new \CodeIgniter\Validation\Validation();
    }

    /**
     * The View class is a simple templating engine.
     *
     * @param bool $getShared
     *
     * @return \CodeIgniter\View\View
     */
    public static function view(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('view');
        }

        return new \CodeIgniter\View\View();
    }
}