<?php

/**
 * @file
 * This is an example controller. Feel free to delete it.
 */

Class Example extends Controller {

  public function index() {
    $this->view->loadView("example-header");
    $this->view->loadView("example-index-content");
    $this->view->loadView("example-footer");
  }

  public function search($query = "") {
    if($query !== "") {
      $this->view->addProperty('query', $query);
    }

    if($this->params !== array()) {
      $this->view->addProperty('various_params', $this->params);
    }

    $this->view->loadView("example-header");
    $this->view->loadView("example-search-content");
    $this->view->loadView("example-footer");
  }
}
