<?php

    // Session Check.
    if (!isset($_SESSION)) {
        // Start Session.
        session_start();
    }

    // Configuration.
    require_once('config.php');

    // System Helpers.
    require_once('helpers\System.php');
    
    // Autoloader.
    spl_autoload_register(function ($className)
    {
        // Existance Check.
        if (!file_exists('..\app\core\\' .$className. '.php')) {
            // Minimize Error Message.
            return false;
        }
        // Involve Class.
        require_once('..\app\core\\' .$className. '.php');
    });