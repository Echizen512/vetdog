<?php
require_once '../Model/modeloveterinarian.php';
class veterinariancontrolador {

  public $model;
  public function __construct() {
    $this->model = new Modelo();
  }
  function mostrar() {
    $veterinarian = new Modelo();

    $dato = $veterinarian->mostrar("veterinarian", "1");
    require_once '../View/veterinarios/mostrar.php';
  }

  //INSERTAR
  public  function nuevo() {
    require_once '../veterinarios/nuevo';
  }
  //aca ando haciendo
  public function recibir() {
    $alm = new Modelo();
    $alm->dnivet = $_POST['txtdnivet'];
    $alm->nomvet = $_POST['txtnomvet'];

    $this->model->insertar($alm);
    //-------------
    header("Location: veterinarios.php");
  }
}
