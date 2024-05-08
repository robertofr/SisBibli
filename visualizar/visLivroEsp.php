 <?php
include("../sessao.php");
include("../include/topo.php");// Incluindo Topo da Pagina
include ("../conect/conecta.php");// Abrindo a Conecxão com o Banco de dados
include("../classe/classLivro.php");// Incluindo a classe livro
$liv = new classLivro();//Instanciando a classe livro
$liv->idLivro = $_REQUEST["idLivro"];
?>
	<div id='corpo'><br />
		<div class="identifica"><h3>Informações do Livro<h3></div>			
		<?php $liv->listarEspecifico(); ?><!--Listando Livros -->
	
	</div>
<?php		
	mysql_close();//Fechando conecxão com o banco de dados
	include("../include/rodape.php");//incluindo rodapé
?>	

