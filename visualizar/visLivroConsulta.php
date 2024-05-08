 <?php
include("../include/topoIndexInicial2.php");// Incluindo Topo da Pagina
include ("../conect/conecta.php");// Abrindo a Conecxão com o Banco de dados
include("../classe/classAcervo.php");// Incluindo a classe livro
$acer = new classAcervo();//Instanciando a classe livro
$acer->idLivro = $_REQUEST["idLivro"];
?>
	<div id='corpo'><br />
		<div class="identifica"><h3>Informações do Livro<h3></div>		
		<?php $acer->listarEspecifico(); ?><!--Listando Livros -->
	
	</div>
<?php		
	mysql_close();//Fechando conecxão com o banco de dados
	include("../include/rodape.php");//incluindo rodapé
?>	

