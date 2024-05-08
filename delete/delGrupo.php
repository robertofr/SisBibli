<?php
include("../sessao.php");
include"../include/topo.php";
include("../classe/classGrupo.php");
$idGrupo = $_REQUEST['idGrupo'];
$select = mysql_query("SELECT nomeGrupo FROM grupo WHERE idGrupo = '$idGrupo'");
$linha = mysql_fetch_array($select);
?>
		
	<div id="corpo">
	
		<form action="../pagCad/transGrupo.php" method="get">
			<fieldset id="delete"> <legend>Deletar Usuário</legend>	
			<p>
				
				<h2>Tem Certeza que deseja excluir o Grupo <?php echo $linha['nomeGrupo']?>?</h2>
				<input type="hidden" name="idGrupo" value="<?php echo $idGrupo?>">
				<input type="submit" id="deletar" name="deletar" value="Deletar" />
				<input type="submit" id="cancelar" name="cancelar" value="Cancelar" />

			</p>   
			</fieldset>
			
				
		</form>
	 
  
   </div>
	
<?php
include"../include/rodape.php";
?>	

