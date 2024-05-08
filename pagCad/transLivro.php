<?php
include("../classe/classLivro.php");//Incluir Classe Livro
include("../include/erro.php");// Incluir Tratamento de erros
$liv = new classLivro();// instancia da classe livro

if(isset($_REQUEST["enviar"]))//Se houver o REQUEST enviar receba e insirar 
	{
		$liv->idLivro = $_REQUEST["idLivro"];
		$liv->titulo = $_REQUEST["titulo"];
		$liv->subtitulo = $_REQUEST["subtitulo"];
		$liv->issn = $_REQUEST["issn"];
		$liv->dataPublicacao = $_REQUEST["dataPublicacao"];
		$liv->dataAquisicao = $_REQUEST["dataAquisicao"];
		$liv->numExemplar = $_REQUEST["numExemplar"];
		$liv->volume = $_REQUEST["volume"];
		$liv->numPagina = $_REQUEST["numPagina"];
		$liv->areaConhecimento = $_REQUEST["areaConhecimento"];
		$liv->autor = $_REQUEST["autor"];
		$liv->resumo = $_REQUEST["resumo"];
		/*Dados Editora*/
		$liv->nomeEditora = $_REQUEST["nomeEditora"];
		$liv->cnpj = $_REQUEST["cnpj"];
		$liv->telefone = $_REQUEST["telefone"];
		$liv->endereco = $_REQUEST["endereco"];
		$liv->email = $_REQUEST["email"];
		$liv->site = $_REQUEST["site"];
		$liv->capaLivro = $_REQUEST["capaLivro"];
		$liv->insert();//chama função insert da classe livro
		
	}
	
if(isset($_REQUEST['atualizar']))//Se houver atualizar recebe e atualizar os campos
	{
		$liv->idLivro = $_REQUEST["idLivro"];
		$liv->titulo = $_REQUEST["titulo"];
		$liv->subtitulo = $_REQUEST["subtitulo"];
		$liv->issn = $_REQUEST["issn"];
		$liv->dataPublicacao = $_REQUEST["dataPublicacao"];
		$liv->dataAquisicao = $_REQUEST["dataAquisicao"];
		$liv->numExemplar = $_REQUEST["numExemplar"];
		$liv->volume = $_REQUEST["volume"];
		$liv->numPagina = $_REQUEST["numPagina"];
		$liv->areaConhecimento = $_REQUEST["areaConhecimento"];
		$liv->autor = $_REQUEST["autor"];
		$liv->resumo = $_REQUEST["resumo"];
		/*Dados Editora*/
		$liv->nomeEditora = $_REQUEST["nomeEditora"];
		$liv->cnpj = $_REQUEST["cnpj"];
		$liv->telefone = $_REQUEST["telefone"];
		$liv->endereco = $_REQUEST["endereco"];
		$liv->email = $_REQUEST["email"];
		$liv->site = $_REQUEST["site"];
		/*$liv->capaLivro = $_REQUEST["capaLivro"];*/
	
		$liv->update();	//Chama a função update da classe livro			  
}else
	{
		if(isset($_REQUEST['cancelar']))//Se Cancelar volte para a pagina anterior
		{
			$url = '../visualizar/visLivroCadastrado.php';
			echo '
				<meta http-equiv=refresh content="0;URL='.$url.'" />
			';
		}
	}

if(isset($_REQUEST['deletar']))//Se houver deletar rece o idLivro e chama a função deletar na classe livro
	{
		$liv->idLivro = $_REQUEST['idLivro'];
		$liv-> deletar();
	}else
	{
		if(isset($_REQUEST['cancelar']))//Se Cancelar volte para a pagina anterior
		{
			$url = '../visualizar/visLivroCadastrado.php';
			echo '
				<meta http-equiv=refresh content="0;URL='.$url.'" />
			';
		}
	}
?>	

