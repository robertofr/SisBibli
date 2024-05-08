 <?php
include("../sessao.php"); 
include("../include/topo.php");// Incluindo Topo da Pagina
include ("../conect/conecta.php");// Abrindo a Conecxão com o Banco de dados
include("../classe/classAluFunProf.php");// Incluindo a classe livro
$alu = new classAluFunProf();//Instanciando a classe livro
$alu->idAluFunProf = $_REQUEST["idAluFunProf"];
?>
	<div id='corpo'><br />
		<div class="identifica"><h3>Informações do Usuário<h3></div>			
		<?php $alu->listarEspecifico () ?><!--Listando Livros -->
	
	</div>
<?php		
	mysql_close();//Fechando conecxão com o banco de dados
	include("../include/rodape.php");//incluindo rodapé
?>	