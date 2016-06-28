<?php

/**
 * @file
 * Contains the View class, which is used to build the response HTML.
 */

/**
 * Class View.
 *
 * Builds and returns the response HTML by loading and processing views.
 */
class View {
  private $vars = array();

  /**
   * Adds a value to the $vars property.
   *
   * @param string $name
   *   The variable's name.
   * @param string $value
   *   The variable's value.
   */
  public function addProperty($name, $value) {
    $this->vars[$name] = $value;
  }

  /**
   * Removes a value from the $vars property.
   *
   * @param string $name
   *   The variable's name.
   */
  public function removeProperty($name) {
    if (isset($this->vars[$name])) {
      unset($this->vars[$name]);
    }
  }

  /**
   * Sets our local variables and includes our HTML view.
   *
   * @param string $filename
   *   The name of the view -- no path and no extension.
   */
  public function loadView($filename) {
    // Create all our variables that the view might need.
    foreach ($this->vars as $var => $value) {
      $$var = $value;
    }

    require ROOT . "/application/views/" . $filename . ".php";
  }

}
