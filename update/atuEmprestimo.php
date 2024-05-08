<?php
include("../sessao.php");	
include"../include/topo.php";
include("../classe/classEmprestimo.php");
$emp = new classEmprestimo();
$idEmprestimo = $_REQUEST['idEmprestimo'];
$select = mysql_query("SELECT * FROM alufunprof, livro, emprestimo
			WHERE idEmprestimo = '$idEmprestimo'
			AND emprestimo.idAluFunProf = alufunprof.idAluFunProf 
			AND emprestimo.idLivro = livro.idLivro
			");
$linha = mysql_fetch_array($select);
$situacao = $linha['idSituacao'];
	switch($situacao){
		case 1: $situacao = "Ativo";break;
		case 2: $situacao = "Pendente";break;
		case 3: $situacao = "Inativo";break;
		case 4: $situacao = "Bloqueado";break;	
	}		
?>

	<div id="corpo">
	<form action="../pagCad/transEmprestimo.php" method="get">
		<table border='1' class='table'>
			<tr>
				<input type=hidden name="idEmprestimo" value="<?php echo $linha['idEmprestimo']?>">
				<td rowspan='3' width='100px'><img src='../img/uploads/<?php echo $linha['foto']?>' alt='<?php echo $linha['nome']?>' class='foto'/></td>
				<td>
					<span>Usuário:</span><?php echo $linha['nome']?><br /><br />
					<span>Curso:</span><?php echo $linha['curso']?><br /><br />
					<span>Matricula:</span><?php echo $linha['matricula']?><br /><br />
					<span>Situação:</span><?php echo $situacao?><br /><br />
				</td>
				<td rowspan='3' width='100px'><img src='../img/capaLivro/<?php echo $linha['capaLivro']?>' alt='<?php echo $linha['titulo']?>' class="foto"/></td>
				<td>
					<span>Livro:</span><?php echo $linha['titulo']?><br /><br />
					<span>ISBN:</span><?php echo $linha['issn']?><br /><br />
					<span>Autor:</span><?php echo $linha['autor']?><br /><br />
					<span>Data Emprestimo:</span><?php echo $linha['dataEmprestimo']?><br /><br />
					<span>Data Devolução:</span><input type="date" name="renovacao" id="renovacao" value="<?php echo $linha['dataDevolucao']?>"><br /><br />
				</td>
				<td>
					<input type="submit" name="renovar" value="Renovar">
					<input type="submit" name="devolver" value="Devolver">
					<input type=hidden name="devolucao" value="1">
					
				</td>
				
			</tr>
		</table>
	</form>
	 </div>
<?php
include"../include/rodape.php";
?>


