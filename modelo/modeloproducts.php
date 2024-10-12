<?php
class Modelo
{

  private $products;
  private $db;

  public function __construct()
  {
    $this->products = array();
    $this->db = new PDO('mysql:host=localhost;dbname=vetdog', "root", "");
  }
  public function mostrar($tabla){
    $consulta = "SELECT products.id_prod, category.id_cate, category.nomcate, products.nompro, products.peso, products.preciC, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate = category.id_cate ORDER BY fere DESC";

    $resultado = $this->db->query($consulta);
    while ($tabla = $resultado->fetchAll(PDO::FETCH_ASSOC)) {
      $this->products[] = $tabla;
    }
    return $this->products;
  }
}
