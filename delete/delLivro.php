<?php
include("../sessao.php");
include"../include/topo.php";
include("../classe/classLivro.php");
$idLivro = $_REQUEST['idLivro'];
$select = mysql_query("SELECT titulo FROM livro WHERE idLivro = '$idLivro'");
$linha = mysql_fetch_array($select);
?>
		
	<div id="corpo">
	
		<form action="../pagCad/transLivro.php" method="get">
			<fieldset id="delete"> <legend>Deletar Livro</legend>	
			<p>
				
				<h2>Tem Certeza que deseja excluir o Livro <?php echo $linha['titulo']?>?</h2>
				<input type="hidden" name="idLivro" value="<?php echo $idLivro?>">
				<input type="submit" id="deletar" name="deletar" value="Deletar" />
				<input type="submit" id="cancelar" name="cancelar" value="Cancelar" />

			</p>   
			</fieldset>
			
				
		</form>
	 
  
   </div>
	
<?php
include"../include/rodape.php";
?>	

