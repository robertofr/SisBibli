<?php
include("../sessao.php");
include"../include/topo.php";//Inclui o topo da pagina
include("../classe/classAluFunProf.php");// Incluir a classe alufunprof
$idAluFunProf = $_REQUEST['idAluFunProf'];//Recebe o idAluFunProf da pagina visUsuarioCadastrado
$select = mysql_query("SELECT * FROM alufunprof WHERE idAluFunProf = '$idAluFunProf'");// Seleciona todos os dados da tabela aluFunProf em um array
$linha = mysql_fetch_array($select);//atribui o array recebido a variavel $linha
?>
		
	<div id="corpo">
	
		<form action="../pagCad/transAluFunProf.php" method="get">
			<fieldset id="delete"> <legend>Deletar Usuario</legend>	
			<p>
				
				<h2>Tem Certeza que deseja excluir o Usuario <?php echo $linha['nome']?>?</h2>
				<input type=hidden name="idAluFunProf" value="<?php echo $linha['idAluFunProf']?>">
				<input type="submit" id="deletar" name="deletar" value="Deletar" />
				<input type="submit" id="cancelar" name="cancelar" value="Cancelar" />

			</p>   
			</fieldset>
			
				
		</form>
	 
  
   </div>
	
<?php
include"../include/rodape.php";//Inclui rodape da pagina
?>	

