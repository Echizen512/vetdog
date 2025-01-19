<?php
require_once '../Model/modeloquotes.php';
class quotescontrolador
{

  public $model;
  public function __construct()
  {
    $this->model = new Modelo();
  }
  function mostrar()
  {
    $quotes = new Modelo();

    $dato = $quotes->mostrar("quotes", "1");
    require_once '../View/citas/mostrar.php';
  }


  //INSERTAR
  public  function nuevo()
  {
    require_once '../View/citas/nuevo';
  }
  //aca ando haciendo
  public function recibir()
  {
    $alm = new Modelo();
    $alm->id_vet = $_POST['txtid_vet'];
    $alm->id_tiM = $_POST['txtid_tiM'];


    $this->model->insertar($alm);
    //-------------
    header("Location: citas.php");
  }
}
