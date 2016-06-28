<?php

/**
 * @file
 * Sets configuration variables, which change between environments.
 */

// Prints to screen on TRUE. Prints to logs/error.log on FALSE.
define('DEVELOPMENT_ENVIRONMENT', TRUE);

// Domain name of the site (no slash at the end!).
define('SITE_ROOT', 'localhost');

// Routing Defaults.
define('DEFAULT_CONTROLLER', "example");
define('DEFAULT_ACTION', "index");

// DB creds.
define('DB_HOST', '');
define('DB_USER', '');
define('DB_PASS', '');
define('DB_NAME', '');
