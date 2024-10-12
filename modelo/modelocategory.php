<?php
class Modelo {
  private $category;
  private $db;

  public function __construct() {
    $this->category = array();
    $this->db = new PDO('mysql:host=localhost;dbname=vetdog', "root", "");
  }

  public function mostrar() {}

}
