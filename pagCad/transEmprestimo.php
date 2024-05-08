<?php
include("../classe/classEmprestimo.php");
include("../include/erro.php");
$emp = new classEmprestimo();

if(isset($_REQUEST["enviar"]))
	{
		$emp->idAluFunProf = $_REQUEST["idAluFunProf"];
		$emp->idLivro = $_REQUEST["idLivro"];
		$emp->depuracao = $_REQUEST["depuracao"];
		$emp->dataEmprestimo = $_REQUEST["dataEmprestimo"];
		$emp->dataDevolucao = $_REQUEST["dataDevolucao"];
		$emp->insert();
	}
else{	
}	

if(isset($_REQUEST["botao"]))
	{
		$emp->listarLu();	
		echo"
		
	
				<p>
					<label for='dataEmprestimo'>Data Emprestimo:<input type='date' name='dataEmprestimo' id='dataEmprestimo' size='30' maxlength='30'></label>
					<label for='dataDevolucao'>Data Devolução:<input type='date' name='dataDevolucao' id='dataDevolucao' size='30' maxlength='30'></label>
				</p>
					 
			
			
		
		";
	}	
	
if(isset($_REQUEST["renovar"]))
	{
		$emp->idEmprestimo = $_REQUEST["idEmprestimo"];	
		$emp->renovacao = $_REQUEST["renovacao"];
		$emp->renovacao();
	}	

if(isset($_REQUEST["devolver"]))
	{
		$emp->idEmprestimo = $_REQUEST["idEmprestimo"];	
		$emp->devolver = $_REQUEST["devolucao"];
		$emp->devolucao();
	}		

?>


