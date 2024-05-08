<?php
include("../sessao.php");
include"../include/topo.php";
include("../classe/classUsuario.php");
$idUsuario = $_REQUEST['idUsuario'];
$select = mysql_query("SELECT nome FROM usuario WHERE idUsuario = '$idUsuario'");
$linha = mysql_fetch_array($select);
?>
		
	<div id="corpo">
	
		<form action="../pagCad/transCadUsuario.php" method="get">
			<fieldset id="delete"> <legend>Deletar Usuário</legend>	
			<p>
				
				<h2>Tem Certeza que deseja excluir o Usuário <?php echo $linha['nome']?>?</h2>
				<input type="hidden" name="idUsuario" value="<?php echo $idUsuario?>">
				<input type="submit" id="deletar" name="deletar" value="Deletar" />
				<input type="submit" id="cancelar" name="cancelar" value="Cancelar" />

			</p>   
			</fieldset>
			
				
		</form>
	 
  
   </div>
	
<?php
include"../include/rodape.php";
?>	

