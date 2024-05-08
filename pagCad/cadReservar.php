<?php
include "../include/topoIndexInicial2.php";
include "../classe/classAcervo.php";//Incluir Classe Acervo
include "../include/erro.php";// Incluir Tratamento de erros
$acer = new classAcervo();// instancia da classe Acervo

?>		

		 <div id="corpo">
		 
		 <?php
		 
			if(!isset($_REQUEST["reservar"]))//Se houver o REQUEST enviar receba e insirar 
			{
				$acer-> reservar();

			}
		 ?>
		</div>	
	
<?php
include "../include/rodape.php";
?>