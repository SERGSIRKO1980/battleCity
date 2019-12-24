<?php
session_start();

define('DEVELOPER_MODE', true); // switch error reporting
define('PROJECT_ROOT', __DIR__); // project absolute path
define('SEPARATOR', '/'); // sepearator in file pathes
define('FILE_EXTENSION', '.php'); // php file extennsion name
define('STORE_IN_DATABASE', true); 

if (DEVELOPER_MODE) {
    error_reporting(E_ALL); // full error reporting
} else {
    error_reporting(0); // stops error reportinng
}

require_once(PROJECT_ROOT.SEPARATOR.'config'.FILE_EXTENSION); // includes configuration file
require_once(PROJECT_ROOT.SEPARATOR.'functions'.FILE_EXTENSION); // includes functiions 
require_once(PROJECT_ROOT.SEPARATOR.'classes'.SEPARATOR.'MySQLConnector'.FILE_EXTENSION); // includes tools to connect MySQL databases


start('global'.FILE_EXTENSION); // starts site main page
