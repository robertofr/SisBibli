<?php
include "../include/topoIndexInicial2.php";
include "../classe/classAcervo.php";//Incluir Classe Acervo
include "../include/erro.php";// Incluir Tratamento de erros
$acer = new classAcervo();// instancia da classe Acervo

?>		

		 <div id="corpo">
		 <div class="identifica"><h3>Acervo<h3></div>
		 <form action="" method="get" class="pesquizar">
			<input type="text" size="60" name="pesquisa" placeholder="Pesquizar">
			<input type="submit" name="buscar" value="Buscar">
		 </form> 
		 
		 <?php
		 
			if(!isset($_REQUEST["buscar"]))//Se houver o REQUEST enviar receba e insirar 
			{
				$acer-> listarAcervo();

			}
			if(isset($_REQUEST["buscar"]))//Se houver o REQUEST enviar receba e insirar 
			{
				$acer->pesquisa = $_REQUEST["pesquisa"];
				$acer-> listarAcervo();

			}
		 ?>
		</div>	
	
<?php
include "../include/rodape.php";
?>
