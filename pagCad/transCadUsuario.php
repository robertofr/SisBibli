<?php
include("../classe/classUsuario.php");//Incluir Classe Usuario
include("../include/erro.php");// Incluir Tratamento de erros
$usu = new classUsuario();// instancia da classe Usuario

if(isset($_REQUEST["enviar"]))
	{
		$usu->nome = $_REQUEST["nome"];
		$usu->email = $_REQUEST["email"];
		$usu->telefone = $_REQUEST["telefone"];
		$usu->grupo = $_REQUEST["grupo"];
		$usu->login = $_REQUEST["login"];
		$usu->senha = $_REQUEST["senha"];
		
		$usu-> insert();
		
	}
	
if(isset($_REQUEST['atualizar']))//Se houver atualizar recebe e atualizar os campos
	{
		$usu->idUsuario = $_REQUEST['idUsuario'];
		$usu->nome = $_REQUEST["nome"];
		$usu->email = $_REQUEST["email"];
		$usu->telefone = $_REQUEST["telefone"];
		$usu->grupo = $_REQUEST["grupo"];
		$usu->login = $_REQUEST["login"];
		$usu->senha = $_REQUEST["senha"];
	
		$usu->update();	//Chama a função update da classe Usuario			  
}else{
		if(isset($_REQUEST['cancelar']))//Se Cancelar volte para a pagina anterior
		{
			$url = '../visualizar/visUser.php';
			echo '
				<meta http-equiv=refresh content="0;URL='.$url.'" />
			';
		}
	}

if(isset($_REQUEST['deletar']))//Se houver deletar rece o idLivro e chama a função deletar na classe livro
	{
		$usu->idUsuario = $_REQUEST['idUsuario'];
		$usu->deletar();
	}else
	{
		if(isset($_REQUEST['cancelar']))//Se Cancelar volte para a pagina anterior
		{
			$url = '../visualizar/visUser.php';
			echo '
				<meta http-equiv=refresh content="5;URL='.$url.'" />
			';
		}
	}
?>	

