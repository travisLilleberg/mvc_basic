<?php

/**
 * @file
 * Contains the base Controller class.
 */

/**
 * Class Controller.
 *
 * Base controller class that all actual controllers extend.
 */
class Controller {

  // The view object, see lib/View.php .
  protected $view;
  protected $url = "";
  protected $params = array();

  /**
   * Creates our View object, passes initial parameters to it.
   *
   * @param string $url
   *   The full url that's being used.
   * @param array $params
   *   The $_GET Parameters from the request.
   */
  public function __construct($params = array()) {
    $this->view = new View();
    $this->params = $params;
  }

  /**
   * Adds a variable to the view.
   *
   * @param string $name
   *   The variable name.
   * @param string $value
   *   The variable value.
   */
  public function addParam($name, $value) {
    $this->view->addProperty($name, $value);
  }

  /**
   * Removes a variable from the view.
   *
   * @param string $name
   *   The variable name.
   */
  public function removeParam($name) {
    $this->view->removeProperty($name);
  }

  /**
   * Overwrite this!
   *
   * All controllers must have an index function. It's the default action.
   */
  protected function index() {
    four_oh_four();
    return TRUE;
  }

}
