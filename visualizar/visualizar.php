<?php
include("../sessao.php");
include"../include/topo.php";
 ?>

	    <div id="corpo">
		<div class="identifica"><h3>Emprestimo de Livro<h3></div>	
				<form action="cadEmprestimo.php" method="get">
					<fieldset id="emprestimo"> <legend>Emprestimo</legend>
						<p>
						<label for="aluFunProf">Usuário: </label>
							<input type="text" name="aluFunProf" size="30" placeholder="Informe o Nome do Usuário">
						<label for="livro">Livro: </label>
							<input type="text" name="livro" id="livro" size="30" placeholder="Infome o Nome do Livro">	
							<input type="submit" name="botao" value="Buscar">
						</p>
						
						<!--Buscar Usuário -->
							<?php
								include "../visualizar/visRelatorio.php";
							?>
						
						
					</fieldset>
					<p>
						<input type="submit" id="enviar" name="enviar" value="Cadastrar" />
						<input type="reset"  id="limpar" name="limpar" value="Limpar"/><br /><br />
					</p>
				</form>
	  
	   </div>
	
	<?php
		include"../include/rodape.php";
	?>	
	
	</div>
  </body>
</html>
