<?php
include("../sessao.php");//incluir a sessão do usuario
include ("../conect/conecta.php");// Conecta ao banco de dados
include ("../conect/mysqlexecuta.php");// Executa a clausula SQL
include ("../include/erro.php");// Incluir Tratamento de erros
date_default_timezone_set('America/Sao_Paulo');//Definir o servidor de horario
$data = date('d-m-Y');
$data .= ' Horario:'.date('H:i:s');
	
	$select = mysql_query ("SELECT titulo, subtitulo, issn, autor, nomeEditora FROM livro ");
	$row = mysql_num_rows($select);	
	
	$html="
	
	<h2><img src='../img/livro.png' width='50' heigth='50' >SISBIBLI- Sistema Bibliotecario  <span> - Data: $data</span></h2> 
	<table border=1 >
		
		<tr>
			<td colspan='6'  class='topo1'><h3>Lista de Livros  Cadastrados</h3></td>
		</tr>
		<tr>
			<td class='topo'>Titulo</td>
			<td class='topo'>Subtitulo</td>
			<td class='topo'>ISSN</td>
			<td class='topo'>Autor</td>
			<td class='topo'>Editora</td>
		</tr>
";			
	while($linha = mysql_fetch_array($select)){	
	$html .="		
			<tr>
				<td>".$linha[titulo]."</td>
				<td>".$linha[subtitulo]."</td>
				<td>".$linha[issn]."</td>
				<td>".$linha[autor]."</td>
				<td>".$linha[nomeEditora]."</td>
				
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