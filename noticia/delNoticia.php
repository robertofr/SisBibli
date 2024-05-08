<?php
include("../sessao.php");
include"../include/topo.php";
include("classNoticia.php");
$idNoticia = $_REQUEST['idNoticia'];
$select = mysql_query("SELECT titulo FROM noticia WHERE idNoticia = '$idNoticia'");
$linha = mysql_fetch_array($select);
?>
		
	<div id="corpo">
	
		<form action="transNoticia.php" method="get">
			<fieldset id="delete"> <legend>Deletar Notícia</legend>	
			<p>
				
				<h2>Tem Certeza que deseja excluir a Notícia <?php echo $linha['titulo']?>?</h2>
				<input type="hidden" name="idNoticia" value="<?php echo $idNoticia?>">
				<input type="submit" id="deletar" name="deletar" value="Deletar" />
				<input type="submit" id="cancelar" name="cancelar" value="Cancelar" />

			</p>   
			</fieldset>
			
				
		</form>
	 
  
   </div>
	
<?php
include"../include/rodape.php";
?>	

