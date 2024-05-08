<?php
include("../sessao.php");
include("../include/topo.php");//Incluindo Topo da Página
include("../conect/conecta.php");//Abrindo Conecxão com o Banco de dados
include("../noticia/classNoticia.php");//Incluindo classe AluFunProf
$not = new classNoticia();// Instanciando a classe AluFunProf
?>
	 <div id="corpo"><br />
	 
		<?php 
			include ("../include/aside.php");
			$not->listarNoticiasAdm(); //<!--Listando Notícias Cadastradas-->
		?>
		
	 </div>
	
<?php
mysql_close();//Fechando conecxão com o DB
include("../include/rodape.php");//Incluindo Rodapé
?>	