<?php
/**
 * @file
 * Contains the router action.
 *
 * Determines which controller to load and which action to take.
 */

/**
 * Class Router.
 *
 * Instantiates the appropriate controller object and fires appropriate method,
 * based on url.
 */
class Router {

  /**
   * Runs the appropriate controller::method().
   *
   * @param string $url
   *   The url string, like search/query/china.
   * @param array $params
   *   Any other GET params (used by advanced search).
   *
   * @return bool
   *   Whether we found the controller/action.
   */
  public static function route($url, $params = array()) {
    $url_parts = explode("/", $url);

    // Load our controller.
    $controller_name = empty($url_parts[0]) ? DEFAULT_CONTROLLER : $url_parts[0];
    $controller_name = ucfirst($controller_name);
    $controller_file = $controller_name . ".php";
    $full_controller = ROOT . "/application/controllers/" . $controller_file;
    if (!file_exists($full_controller)) {
      four_oh_four();
      return FALSE;
    }
    require $full_controller;
    $controller = new $controller_name($params);

    // Call our action method.
    $action_name = empty($url_parts[1]) ? DEFAULT_ACTION : $url_parts[1];
    if (!method_exists($controller, $action_name)) {
      four_oh_four();
      return FALSE;
    }
    if (empty($url_parts[2])) {
      $controller->$action_name();
    }
    else {
      $controller->$action_name($url_parts[2]);
    }

    return TRUE;
  }

}
