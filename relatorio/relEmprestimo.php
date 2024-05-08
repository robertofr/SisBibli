<?php
include("../sessao.php");//incluir a sessão do usuario
include ("../conect/conecta.php");// Conecta ao banco de dados
include ("../conect/mysqlexecuta.php");// Executa a clausula SQL
include ("../include/erro.php");// Incluir Tratamento de erros
date_default_timezone_set('America/Sao_Paulo');//Definir o servidor de horario
$data = date('d-m-Y');
$data .= ' Horario:'.date('H:i:s');
//===============================================================================================================
//===============================================================================================================	
	$select = mysql_query ("SELECT * FROM alufunprof, livro, emprestimo  
							WHERE depuracao = 1
							AND emprestimo.idAluFunProf = alufunprof.idAluFunProf 
							AND emprestimo.idLivro = livro.idLivro
			");
	$row = mysql_num_rows($select);	
	
	$html="
	
	<h2><img src='../img/livro.png' width='50' heigth='50' >SISBIBLI- Sistema Bibliotecario  <span> - Data: $data</span></h2> 
	<table border=1 >
		
		<tr>
			<td colspan='6'  class='topo1'><h3>Relatorio dos Livros - Emprestados</h3></td>
		</tr>
		<tr>
			<td class='topo'>Aluno</td>
			<td class='topo'>Matricula</td>
			<td class='topo'>Livro</td>
			<td class='topo'>ISSN</td>
			<td class='topo'>Data Emprestimo</td>
			<td class='topo'>Data Devolução</td>
		</tr>
";			
	while($linha = mysql_fetch_array($select)){	
	$html .="		
			<tr>
				<td>".$linha[nome]."</td>
				<td>".$linha[matricula]."</td>
				<td>".$linha[titulo]."</td>
				<td>".$linha[issn]."</td>
				<td>".$linha[dataEmprestimo]."</td>
				<td>".$linha[dataDevolucao]."</td>
				
			</tr>
	";
}
	$html.="
	<tr>
		<td colspan='6'><span>Total de Registros Encontrados: $row </span></td>
	</tr>
	</table>
";

//==============================================================
//==============================================================
//==============================================================

include("../mpdf/mpdf.php");

$mpdf=new mPDF(); 
$css = file_get_contents("../css/styleRelatotio.css");
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($html);
$mpdf->Output();
exit;

//==============================================================
//==============================================================
//==============================================================


?>