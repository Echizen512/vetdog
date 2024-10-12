<?php
require_once '../modelo/modeloproducts.php';

class productscontrolador {
	function mostrar() {
		$products = new Modelo();

		$dato = $products->mostrar("products", "1");
		require_once '../vista/productos/mostrar.php';
	}
}
