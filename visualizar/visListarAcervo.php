<?php
include("../sessao.php");
include("../include/topo.php");// Incluindo Topo da Pagina
include ("../conect/conecta.php");// Abrindo a Conecxão com o Banco de dados
include("../classe/classAcervo.php");// Incluindo a classe livro
$acer = new classAcervo();//Instanciando a classe livro
?>
	<div id='corpo'><br />
		<div class="identifica"><h3>Acervo Cadastrado<h3></div>		
		<?php $acer->listarAcervo(); ?><!--Listando Livros -->
	
	</div>
<?php		
	mysql_close();//Fechando conecxão com o banco de dados
	include("../include/rodape.php");//incluindo rodapé
?>	

