<?php

/**
 * @file
 * Loads libs/configs. Passes data to router.
 */

// Load our config file.
require ROOT . '/config/config.php';

// Set our errors.
if (DEVELOPMENT_ENVIRONMENT === TRUE) {
  error_reporting(E_ALL);
  ini_set('display_errors', 'On');
}
else {
  error_reporting(E_ALL);
  ini_set('display_errors', 'Off');
  ini_set('log_errors', 'On');
  ini_set('error_log', ROOT . '/logs/error.log');
}

// Autoload all libraries.
$libs = scandir(ROOT . '/lib');
foreach ($libs as $file) {
  if ($file[0] === ".") {
    continue;
  }

  require ROOT . "/lib/" . $file;
}

/**
 * Define function that calls our 404 page.
 */
function four_oh_four() {
  $four_oh_four = file_get_contents(ROOT . "/404.html");
  echo $four_oh_four;
}

// Route appropriately.
if (!empty($_GET['url'])) {
  $url = $_GET['url'];
  unset($_GET['url']);
}
else {
  $url = NULL;
}
$params = empty($_GET) ? array() : $_GET;
Router::route($url, $params);
