<?php
class Modelo {
  private $pet_type;
  private $db;

  public function __construct() {
    $this->pet_type = array();
    $this->db = new PDO('mysql:host=localhost;dbname=vetdog', "root", "");
  }

  public function mostrar($tabla, $condicion) {
    $consulta = "SELECT * FROM pet_type ORDER BY fere DESC";

    $resultado = $this->db->query($consulta);
    while ($tabla = $resultado->fetchAll(PDO::FETCH_ASSOC)) {
      $this->pet_type[] = $tabla;
    }
    return $this->pet_type;
  }
}