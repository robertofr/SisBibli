<?php
include("../classe/classGrupo.php");//Incluir Classe grupo
include("../include/erro.php");// Incluir Tratamento de erros
$gru = new classGrupo();// instancia da classe grupo

if(isset($_REQUEST["enviar"]))
	{
		$gru->nomeGrupo = $_REQUEST["nomeGrupo"];
		$gru->tipoGrupo = $_REQUEST["tipoGrupo"];
		$gru->idPermissao = $_REQUEST["permissao"];		
		$gru-> insert();
		
	}
	
if(isset($_REQUEST['atualizar']))//Se houver atualizar recebe e atualizar os campos
	{
		$gru->idGrupo = $_REQUEST['idGrupo'];
		$gru->nomeGrupo = $_REQUEST["nomeGrupo"];
		$gru->tipoGrupo = $_REQUEST["tipoGrupo"];
		$gru->idPermissao = $_REQUEST["permissao"];
	
		$gru->update();	//Chama a função update da classe grupo			  
}else
	{
		if(isset($_REQUEST['cancelar']))//Se Cancelar volte para a pagina anterior
		{
			$url = '../visualizar/visGrupo.php';
			echo '
				<meta http-equiv=refresh content="0;URL='.$url.'" />
			';
		}
	}

if(isset($_REQUEST['deletar']))//Se houver deletar recebe o idGrupo e chama a função deletar na classe Grupo
	{
		$gru->idGrupo = $_REQUEST['idGrupo'];
		$gru->deletar();
	}else
	{
		if(isset($_REQUEST['cancelar']))//Se Cancelar volte para a pagina anterior
		{
			$url = '../visualizar/visGrupo.php';
			echo '
				<meta http-equiv=refresh content="5;URL='.$url.'" />
			';
		}
	}
?>	

