<?php

class Clientes extends PDO_database{
	public function consultarClientes(){
		$sql = "SELECT c.*, t.id categoria_id, t.categoria categoria
				FROM clientes c
				LEFT JOIN categorias t ON c.id_categoria = t.id";
		$resultado = $this->query_base($sql);
		return json_encode($resultado);
	}	

	public function buscarCliente( $data ){
		if( $data['termino'] == "" ){
			$where = "";
		}else{
			$where = "WHERE c.nome like '%".$data['termino']."%' OR c.sobrenome like '%".$data['termino']."%' OR t.categoria like '%".$data['termino']."%' ";
		}

		$sql = "SELECT c.*, t.id categoria_id, t.categoria categoria
				FROM clientes c
				JOIN categorias t ON c.id_categoria = t.id
				$where";
		$resultado = $this->query_base($sql);
		return json_encode($resultado);
	}	

	public function guardarCliente( $data ){
		if( $data['id'] == "" ){
			$sql = "INSERT INTO clientes (nome,sobrenome,id_categoria) 
					VALUES 
					('".$data['nome']."', '".$data['sobrenome']."','".$data['id_categoria']."')";
		}else{
			$sql = "UPDATE clientes 
					SET 
					nome = '".$data['nome']."' ,
					sobrenome = '".$data['sobrenome']."' ,
					id_categoria = '".$data['id_categoria']."' 
					WHERE id ='".$data['id']."'";	
		}
		$resultado = $this->exex_base($sql);
		return json_encode($resultado);
	}


	public function apagarCliente( $data ){
		$sql = "DELETE FROM clientes WHERE id ='".$data['id']."'";
		$resultado = $this->exex_base($sql);
		return json_encode($resultado);
	}

}
?>