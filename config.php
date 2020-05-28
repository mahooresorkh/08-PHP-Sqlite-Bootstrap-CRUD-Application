<?php

    session_start();

    define('SITE_URL','https://localhost/dashboard/PROJECTS/A-Simple-CMS/');
    define('SITE_PATH', __DIR__.DIRECTORY_SEPARATOR);
    define('DB_FILENAME', 'myapp.data');

    define('APP_TITLE', 'برنامه اول من');

    foreach(glob('lib/*.php') as $lib_file) {
        include_once($lib_file);
    } 
?>