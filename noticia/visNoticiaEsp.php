<?php
include("../include/topoIndexInicial2.php");//Incluindo Topo da Página
include("../conect/conecta.php");//Abrindo Conecxão com o Banco de dados
include("../noticia/classNoticia.php");//Incluindo classe AluFunProf
$not = new classNoticia();// Instanciando a classe AluFunProf
$not->idNoticia = $_REQUEST["idNoticia"];//Recebe idNoticia
?>
	 <div id="corpo"><br />
	 
		<?php $not->listarNoticiasEsp(); ?><!--Listando Notícias Cadastradas-->
		
	 </div>
	
<?php
mysql_close();//Fechando conecxão com o DB
include("../include/rodape.php");//Incluindo Rodapé
?>