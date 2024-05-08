<?php
include("../classe/classAluFunProf.php");//Incluir Classe AluFunProf
include("../include/erro.php");// Incluir Tratamento de erros
$alu = new classAluFunProf();// instancia da classe livro

	if (isset($_REQUEST["enviar"]))//Se houver o REQUEST enviar receba e insirar 
	{
		$alu->nome = $_REQUEST["nome"];
		$alu->matricula = $_REQUEST["matricula"];
		$alu->curso = $_REQUEST["curso"];
		$alu->cpf = $_REQUEST["cpf"];
		$alu->email = $_REQUEST["email"];
		$alu->telefone = $_REQUEST["telefone"];
		$alu->tipoUsuario = $_REQUEST["tipoUsuario"];
		$alu->situacao = $_REQUEST["situacao"];
		$alu->login = $_REQUEST["login"];
		$alu->senha = $_REQUEST["senha"];
		$alu->lagradouro = $_REQUEST["lagradouro"];
		$alu->cidade = $_REQUEST["cidade"];
		$alu->estado = $_REQUEST["estado"];
		$alu->cep = $_REQUEST["cep"];
		$alu->foto = $_REQUEST["foto"];
		
		$alu->insert ();
	}
	
	if(isset($_REQUEST['atualizar']))//Se houver atualizar recebe e atualizar os campos
	{	$alu->idAluFunProf = $_REQUEST['idAluFunProf'];
		$alu->nome = $_REQUEST["nome"];
		$alu->matricula = $_REQUEST["matricula"];
		$alu->curso = $_REQUEST["curso"];
		$alu->cpf = $_REQUEST["cpf"];
		$alu->email = $_REQUEST["email"];
		$alu->telefone = $_REQUEST["telefone"];
		$alu->tipoUsuario = $_REQUEST["tipoUsuario"];
		$alu->situacao = $_REQUEST["situacao"];
		$alu->login = $_REQUEST["login"];
		$alu->senha = $_REQUEST["senha"];
		$alu->lagradouro = $_REQUEST["lagradouro"];
		$alu->cidade = $_REQUEST["cidade"];
		$alu->estado = $_REQUEST["estado"];
		$alu->cep = $_REQUEST["cep"];
		/*$alu->foto = $_REQUEST["foto"];*/
		
		$alu-> update();				  
	}else{	
		if(isset($_REQUEST['cancelar']))
		{
			$url = '../visualizar/visUsuarioCadastrado.php';
			echo '<meta http-equiv=refresh content="0;URL='.$url.'" />';
		}
	}
		
	if(isset($_REQUEST['deletar']))//Se houver deletar rece o idLivro e chama a função deletar na classe livro
	{
		$alu->idAluFunProf = $_REQUEST['idAluFunProf'];
		$alu -> deletar();
	}else
	{	
		if(isset($_REQUEST['cancelar']))
		{
			$url = '../visualizar/visUsuarioCadastrado.php';
			echo '<meta http-equiv=refresh content="0;URL='.$url.'" />';
		}
	}
?>