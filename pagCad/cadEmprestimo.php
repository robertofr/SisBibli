<?php
include("../sessao.php");
include("../include/topo.php");
include("../include/erro.php");
include("../classe/classEmprestimo.php");
$emp = new classEmprestimo();
date_default_timezone_set('America/Sao_Paulo');//Definir o servidor de horario
$data = date('d-m-Y');

if(isset($_REQUEST["enviar"]))
	{
		$emp->idAluFunProf = $_REQUEST["idAluFunProf"];
		$emp->idLivro = $_REQUEST["idLivro"];
		$emp->depuracao = $_REQUEST["depuracao"];
		$emp->dataEmprestimo = $_REQUEST["dataEmprestimo"];
		$emp->dataDevolucao = $_REQUEST["dataDevolucao"];
		
		$emp->insert();
	}

?>
	    <div id="corpo">
		<div class="identifica2"><h3>Cadastrar Empréstimo<h3></div>
				<form action="" name="cadastro" method="get" onSubmit="return validacao();">
					<fieldset id="emprestimo"> <legend>Emprestimo</legend>
						<p>
						<label for="aluFunProf">Usuário: </label>
							<input type="text" name="aluFunProf" size="30" placeholder="Informe o Nome do Aluno/Professor">
						<label for="livro">Livro: </label>
							<input type="text" name="livro" id="livro" size="30" placeholder="Infome o Nome do Livro">	
							<input type="submit" name="botao" value="Buscar">
						</p>
						
						<!--Buscar Usuário -->
						<?php
								
								if(isset($_REQUEST["botao"]))
								{
									$emp->listarLu();	
									echo"
									
											<p>
												<input type=hidden name='depuracao' value='0'>
												<label for='dataEmprestimo'>Data Emprestimo:<input type='text' name='dataEmprestimo' id='dataEmprestimo' value='$data' ></label>
											    <label for='dataDevolucao'>Data Devolução:<input type='date' name='dataDevolucao' id='dataDevolucao'></label>
											</p>
									
									";
								}
						?>	
						
				<p>
					<input type='submit' id='enviar' name='enviar' value='Cadastrar' />
					<input type='reset'  id='limpar' name='limpar' value='Limpar'/><br />
				</p>	
				</form>
					
				
	  
	   </div>
	
<?php
include"../include/rodape.php";
?>	
	
