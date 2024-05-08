<?php
include("../sessao.php");
include("../include/topo.php");//Incluindo Topo da Página
include("../conect/conecta.php");//Abrindo Conecxão com o Banco de dados
?>
	 <div id="corpo">	
		<form action="" method="get">
			<fieldset><legend>Relatórios do Sistema</legend>
				  <p>
					Relatório de Usuários Cadastrado no Sistema
						<a href="../relatorio/relAluFunProf.php" class="botao" target="_blank">Gerar</a>
				  </p>
				  <p>
					  Relatório de Livros Cadastrado no Sistema
					 <a href="../relatorio/relLivro.php" class="botao" target="_blank">Gerar</a>
				  </p>
				<p>
					Relatório de Emprestimos Cadastrado no Sistema
					<a href="../relatorio/relEmprestimo.php" class="botao" target="_blank">Gerar</a>
				</p>
			</fieldset>
		</form>
		
	 </div>
	
<?php
mysql_close();//Fechando conecxão com o DB
include("../include/rodape.php");//Incluindo Rodapé
?>	
