<?php
require_once '../Model/modeloproducts.php';

class productscontrolador {
	function mostrar() {
		$products = new Modelo();

		$dato = $products->mostrar("products", "1");
		require_once '../View/productos/mostrar.php';
	}
}
