<?php
require_once '../Model/modeloraza.php';
class razacontrolador{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $raza=new Modelo();

        $dato=$raza->mostrar("raza", "1");
        require_once '../View/raza/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../View/raza/nuevo';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->nomraza=$_POST['txtnomraza'];
                $alm->id_tiM=$_POST['txtid_tiM'];
                
                
     $this->model->insertar($alm);
     //-------------
header("Location: raza.php");

          }


    }
