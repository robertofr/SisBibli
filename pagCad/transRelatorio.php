<?php
include("../classe/classRelatorio.php");//Incluir Classe Relatório
include("../include/erro.php");// Incluir Tratamento de erros
$rel = new classRelatorio();// instancia da classe Relatório

if(isset($_REQUEST["aluFunProf"]))//Se houver o REQUEST aluFunProf liste
	{
		
		//$rel->aluFunProf();//Gerar Relatório de aluFunProf
		$url = '../relatorio/relAluFunProf.php';
			echo '
				<meta http-equiv=refresh content="0;URL='.$url.'" />
			';
	}
if(isset($_REQUEST["livro"]))//Se houver o REQUEST livro liste
	{
		
		$rel->livro();//Gerar Relatório de Livro
		
	}
if(isset($_REQUEST["emprestimo"]))//Se houver o REQUEST emprestimo liste
	{
		
		$rel->emprestimo();//Gerar Relatório de emprestimo
		
	}	

?>	

