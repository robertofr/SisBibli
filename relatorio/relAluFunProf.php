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
	$select = mysql_query ("SELECT nome, matricula, curso, email, telefone FROM alufunprof");
	$row = mysql_num_rows($select);	
	
	$html="
	
	<h2><img src='../img/livro.png' width='50' heigth='50' >SISBIBLI- Sistema Bibliotecario  <span> - Data: $data</span></h2> 
	<table border=1 >
		
		<tr>
			<td colspan='6'  class='topo1'><h3>Lista de Usuários  Cadastrados</h3></td>
		</tr>
		<tr>
			<td class='topo'>Nome</td>
			<td class='topo'>Matricula</td>
			<td class='topo'>Curso</td>
			<td class='topo'>E-Mail</td>
			<td class='topo'>Telefone</td>
		</tr>
";			
	while($linha = mysql_fetch_array($select)){	
	$html .="		
			<tr>
				<td>".$linha[nome]."</td>
				<td>".$linha[matricula]."</td>
				<td>".$linha[curso]."</td>
				<td>".$linha[email]."</td>
				<td>".$linha[telefone]."</td>
				
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