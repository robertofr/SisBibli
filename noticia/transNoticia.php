<?php
include"classNoticia.php";
include"../include/erro.php";
$not = new classNoticia();

if(isset($_REQUEST["cadastrar"])){
	
	$not->titulo = $_REQUEST["titulo"];
	$not->resumo = $_REQUEST["resumo"];
	$not->foto = $_REQUEST["foto"];
	$not->texto = $_REQUEST["texto"];
	
	$not-> insert();
}

if(isset($_REQUEST["atualizar"])){
	$not->idNoticia = $_REQUEST['idNoticia'];
	$not->titulo = $_REQUEST["titulo"];
	$not->resumo = $_REQUEST["resumo"];
	//$not->foto = $_REQUEST["foto"];
	$not->texto = $_REQUEST["texto"];
	
	$not-> update();
}else if(isset($_REQUEST["cancelar"])){
	$url = 'visNoticiaAdm.php';
			echo '
				<meta http-equiv=refresh content="0;URL='.$url.'" />
			';
}

if(isset($_REQUEST['deletar']))//Se houver deletar rece o idLivro e chama a função deletar na classe livro
	{
		$not->idNoticia = $_REQUEST['idNoticia'];
		$not-> deletar();
	}else
	{
		if(isset($_REQUEST['cancelar']))//Se Cancelar volte para a pagina anterior
		{
			$url = '../index2.php';
			echo '
				<meta http-equiv=refresh content="0;URL='.$url.'" />
			';
		}
	}

?>