<?php
include("../sessao.php");
include"../include/topo.php";//Inclui o topo da pagina
include("../classe/classEmprestimo.php");//Incluir a classe Emprestimo
$idEmprestimo = $_REQUEST['idEmprestimo'];//Recebe a variavel idEmprestimo da pagina visEmprestimoRealizado
$select = mysql_query("SELECT * FROM emprestimo WHERE idEmprestimo = '$idEmprestimo'");//Seleciona o emprestimo na tabela emprestimo
$linha = mysql_fetch_array($select);//Variavel linha recebe array de dados do select
?>
		
	<div id="corpo">
	
		<form action="../pagCad/transLivro.php" method="get">
			<fieldset id="delete"> <legend>Deletar Livro</legend>	
			<p>
				
				<h2>Tem Certeza que deseja excluir o Livro <?php echo $linha['nome']['titulo']?>?</h2>
				<input type="hidden" name="idLivro" value="<?php echo $idEmprestimo?>">
				<input type="submit" id="deletar" name="deletar" value="Deletar" />
				<input type="submit" id="cancelar" name="cancelar" value="Cancelar" />

			</p>   
			</fieldset>
			
				
		</form>
	 
  
   </div>
	
<?php
include"../include/rodape.php";//Inclui rodape na pagina
?>	

