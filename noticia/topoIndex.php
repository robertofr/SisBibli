<?php 
if (isset($_REQUEST["sair"]))//Se houver o REQUEST sair  
{
	$sair = $_REQUEST["sair"];
	session_destroy();//Destroi a Sessão impedido que seja acessada voltando a pagina 
	// Redireciona o visitante de volta pro login
	$url = 'index.php';
	echo '
		<meta http-equiv=refresh content="0;URL='.$url.'" />
	'; exit;
}?>
 <html lang="pt-br">
    <head>
      <meta charset="UTF-8"/>  
	  <title>Sistema Bibliotecário</title>
	  <link rel="stylesheet" type="text/css" href="css/style.css">
	  <script type="text/javascript" src="../javaScript/javaScript.js"></script>
	
    </head>
	
 <body>	
 
	<div id="interface">
	   <div id="topo">
	
	     <hgroup id="logo">
		   <a href="index2.php">
		   <h1> <img src="img/livro.png"/> Sistema Bibliotecário</h1>
		     <h2> Versão 1.0</h2>
			 </a>
		 </hgroup>
		 <nav id="menu">
			<ul>
				<a href="index2.php"><li>Inicio</li></a>
				<a href="#"><li>Usuário</a>
					<ul>
						<a href="pagCad/cadAluFunProf.php"><li>Cadastrar Usuário</li></a>
						<a href="visualizar/visUsuarioCadastrado.php"><li>Usuários Cadastrados</li></a>
					</ul>
				</li>
					
				<a href="#"><li>Livro</a>	
					<ul>
						<a href="pagCad/cadLivro.php"><li>Cadastro Livro</li></a>
						<a href="visualizar/visLivroCadastrado.php"><li>Acervo Cadastrado</li></a>
					</ul>
					
				</li>	
				<a href="#"><li>Empréstimo</a>
					<ul>
						<a href="pagCad/cadEmprestimo.php"><li>Efetuar Empréstimo</li></a>
						<a href="visualizar/visEmprestimoRealizado.php"><li>Histórico de Empréstimos</li></a>
					</ul>
				</li>
				<a href="#"><li>Administração do Sistema</a>
					<ul>
						<a href="visualizar/visUser.php"><li>Cadastro de Usuário</li></a>
						<a href="visualizar/visGrupo.php"><li>Cadastro de Grupos</li></a>
						<a href="visualizar/visRelatorio.php"><li>Relatórios</li></a>
						<a href="noticia/cadNoticia.php"><li>Cadastrar Notícia</li></a>
						
					</ul>
				</li>				
			</ul>
			
				<form action='' method='get' class="sair"><!--Botão de sair-->
					<input type='submit' name='sair' value='SAIR'>	
				</form>
				
		 </nav><!--#Nav-->
	   </div><!--#topo-->
