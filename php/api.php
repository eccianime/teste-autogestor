<?php

include('db_connection.php');
include('Clientes.php');
include('Categorias.php');

$clientes = new Clientes();
$categorias = new Categorias();

$param = isset( $_REQUEST['param'] ) ? $_REQUEST['param'] : null;

switch ( $param ) {
	case 'consultarClientes':
		echo $clientes->consultarClientes();
	break;
	case 'guardarCliente':
		echo $clientes->guardarCliente( $_REQUEST );
	break;
	case 'buscarCliente':
		echo $clientes->buscarCliente( $_REQUEST );
	break;
	case 'apagarCliente':
		echo $clientes->apagarCliente( $_REQUEST );
	break;

	case 'consultarCategorias':
		echo $categorias->consultarCategorias();
	break;
	case 'guardarCategoria':
		echo $categorias->guardarCategoria( $_REQUEST );
	break;
	case 'apagarCategoria':
		echo $categorias->apagarCategoria( $_REQUEST );
	break;
	
	
}

?>