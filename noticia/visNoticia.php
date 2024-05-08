<?php
include("../include/topoIndexInicial2.php");//Incluindo Topo da Página
include("../conect/conecta.php");//Abrindo Conecxão com o Banco de dados
include("../noticia/classNoticia.php");//Incluindo classe AluFunProf
$not = new classNoticia();// Instanciando a classe AluFunProf
?>
	 <div id="corpo"><br />
		<div class="noticia">
			<?php $not->listarNoticias(); ?><!--Listando Notícias Cadastradas-->
		</div>	
		
	 </div>
	
<?php
mysql_close();//Fechando conecxão com o DB
include("../include/rodape.php");//Incluindo Rodapé
?>	