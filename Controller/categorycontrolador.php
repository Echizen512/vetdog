<?php
require_once '../Model/modelocategory.php';
class categorycontrolador {
  public $model;
  public function __construct() {
    $this->model = new Modelo();
  }
  function mostrar() {
    $category = new Modelo();

    $category->mostrar("category", "1");
    require_once '../View/categorias/mostrar.php';
  }
}
