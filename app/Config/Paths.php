<?php

namespace Config;

/**
 * Holds the paths that are used by the system to
 * locate the main directories, app, system, etc.
 * Modifying these allows you to reorganize your application,
 * share a system folder between multiple applications, and more.
 *
 * All paths are relative to the project's root folder.
 */
class Paths
{
    /**
     * The path to the project root directory. Just above the `public` folder.
     */
    public string $rootDirectory = ROOTPATH;

    /**
     * The path to the application directory.
     */
    public string $appDirectory = APPPATH;

    /**
     * The path to the project system directory.
     */
    public string $systemDirectory = SYSTEMPATH;

    /**
     * The path to the writable directory.
     */
    public string $writableDirectory = WRITEPATH;

    /**
     * The path to the tests directory
     */
    public string $testsDirectory = TESTPATH;

    /**
     * The path to the views directory
     */
    public string $viewDirectory = APPPATH . 'Views' . DIRECTORY_SEPARATOR;
}