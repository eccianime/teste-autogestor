<?php

class Categorias extends PDO_database{
	public function consultarCategorias(){
		$sql = "SELECT * FROM categorias";
		$resultado = $this->query_base($sql);
		return json_encode($resultado);
	}	

	public function guardarCategoria( $data ){
		if( $data['id'] == "" ){
			$sql = "INSERT INTO categorias (categoria) VALUES ('".$data['categoria']."')";
		}else{
			$sql = "UPDATE categorias SET categoria = '".$data['categoria']."' WHERE id ='".$data['id']."'";	
		}
		$resultado = $this->exex_base($sql);
		return json_encode($resultado);
	}

	public function apagarCategoria( $data ){
		$sql = "DELETE FROM categorias WHERE id ='".$data['id']."'";
		$resultado = $this->exex_base($sql);
		return json_encode($resultado);
	}
}

?>