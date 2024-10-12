<?php
class Modelo {
  private $raza;
  private $db;

  public function __construct() {
    $this->raza = array();
    $this->db = new PDO('mysql:host=localhost;dbname=vetdog', "root", "");
  }

  public function mostrar($tabla, $condicion) {
    $consulta = "SELECT raza.nomraza, raza.id_raza, pet_type.id_tiM, pet_type.noTiM, raza.estado FROM raza INNER JOIN pet_type ON raza.id_tiM = pet_type.id_tiM";

    $resultado = $this->db->query($consulta);
    while ($tabla = $resultado->fetchAll(PDO::FETCH_ASSOC)) {
      $this->raza[] = $tabla;
    }
    return $this->raza;
  }
}
