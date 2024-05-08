<?php
include ("../../conect/conecta.php");// Conecta ao banco de dados
include ("../../conect/mysqlexecuta.php");// Executa a clausula SQL
include ("../../include/erro.php");// Incluir Tratamento de erros

    $data = date('d-m-Y');
    $data .= ' Horario:'.date('H:i:s');
	$select = mysql_query ("SELECT * FROM alufunprof, livro, emprestimo  
							WHERE emprestimo.idAluFunProf = alufunprof.idAluFunProf 
							AND emprestimo.idLivro = livro.idLivro
			");
	$linha = mysql_fetch_array($select);//atribui o array recebido a variavel $linha
	$row = mysql_num_rows($select);
	if($row > 0){
		
$html = "
	
	<h2>SISBIBLI- Sistema Bibliotecario  <span> - Data: '.$data.'</span></h2> 
		<table border=1 >
			
			<tr>
				<td colspan='6'  class='topo'><h3>Relatorio dos Livros - Emprestados</h3></td>
			</tr>
			<tr>
				<td class='topo'>Aluno</td>
				<td class='topo'>Matricula</td>
				<td class='topo'>Livro</td>
				<td class='topo'>ISSN</td>
				<td class='topo'>Data Emprestimo</td>
				<td class='topo'>Data Devolução</td>
			</tr>
			
		while($linha = mysql_fetch_array($select)){	
				
				<tr>
					<td>$linha[nome]</td>
					<td>$linha[matricula]</td>
					<td>$linha[titulo]</td>
					<td>$linha[issn]</td>
					<td>$linha[dataEmprestimo]</td>
					<td>$linha[dataDevolucao]</td>
				</tr>
				
		}
			
		</table>


";
}else{
		echo"Ainda não existem registros.";
	}
	
//==============================================================
//==============================================================
//==============================================================

include("../mpdf.php");

$mpdf=new mPDF(); 
$css = file_get_contents("../../css/styleRelatotio.css");
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($html);
$mpdf->Output();
exit;

//==============================================================
//==============================================================
//==============================================================


?>