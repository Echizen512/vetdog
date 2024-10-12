<?php
require_once '../modelo/modelocategory.php';
class categorycontrolador {
  public $model;
  public function __construct() {
    $this->model = new Modelo();
  }
  function mostrar() {
    $category = new Modelo();

    $category->mostrar("category", "1");
    require_once '../vista/categorias/mostrar.php';
  }
}
