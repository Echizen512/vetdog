<?php

session_start();
if(!empty($_POST)){
	if(isset($_POST["id_prod"])  && isset($_POST["canti"]) && isset($_POST["stock"]) ){
		
		if(empty($_SESSION["carts"])){
			$_SESSION["carts"]=array( array("id_prod"=>$_POST["id_prod"], "canti"=>$_POST["canti"],"stock"=>$_POST["stock"]));
		}else{
			
			$carts = $_SESSION["carts"];
			$repeated = false;
			
			foreach ($carts as $c) {
				
				if($c["id_prod"]==$_POST["id_prod"]){
					$repeated=true;
					break;
				}
			}
			
			if($repeated){
				print "<script>alert('Error: Producto Repetido!');</script>";
			}else{
				
				array_push($carts, array("id_prod"=>$_POST["id_prod"],"canti"=> $_POST["canti"],"stock"=> $_POST["stock"]));
				$_SESSION["carts"] = $carts;
			}
		}
		print "<script>window.location='nuevo';</script>";
	}
}

?>

