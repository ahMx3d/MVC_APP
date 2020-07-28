<?php

    /*
        ** For MVC Compatibility:
        **  - Change the public .htaccess path With app path.
        **  - Change the app config URL_ROOT constant to app path.
        **  - Change the app config APP_NAME constant to app name.
        **  - Change the app config DB_NAME constant to app database name create database with the same name.
        **  - Create `users` table with `id`, `name`, `mail`, `pass`, and `reg_date` columns.
    */

    // DB Host Name.
    defined('DB_HOST')
        || define(
            'DB_HOST',
            'localhost'
        );
    // DB Username.
    defined('DB_USER')
        || define(
            'DB_USER',
            'root'
        );
    // DB Password.
    defined('DB_PASS')
        || define(
            'DB_PASS',
            ''
        );
    // DB Name.
    defined('DB_NAME')
        || define(
            'DB_NAME',
            'mvc'     // Application Database.
        );

    // Application Root.
    defined('APP_ROOT')
        || define(
            'APP_ROOT',
            dirname(
                dirname(
                    __FILE__
                )
            )
        );
    // Application URL.
    defined('URL_ROOT')
        || define(
            'URL_ROOT',
            'http://'
            .$_SERVER['SERVER_NAME'].
            '/phpdev/mvc/public/'      // Application Folder Name.
        );
    // Application Name.
    defined('APP_NAME')
        || define(
            'APP_NAME',
            'MVC'       // Application Name.
        );