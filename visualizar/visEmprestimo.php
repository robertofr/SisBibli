 <?php
include("../sessao.php");
if(isset($_GET['botao'])){
	$busca = $_GET['aluFunProf'];
	if($busca == "" or $busca == " "){
		echo '<center><strong>Digite Algo Para a Busca</strong></center>';
	}else{
	$busca_dividida = explode(' ', $busca);
	$quant = count($busca_dividida);
	$id_mostrado = array("");
	for($i=0; $i<$quant; $i++){
		$pesquisa = $busca_dividida[$i];
		
		$sql = mysql_query("SELECT * FROM alufunprof WHERE nome LIKE '%$pesquisa%'");
		$quant_campos = mysql_num_rows($sql);
		if($quant_campos == 0){
			echo'<center><strong>Nenhum resultado Obtido!</strong></center>';
		}else{
				while($linha = mysql_fetch_array($sql)){
					
					$id = $linha['idAluFunProf'];
					$nome = $linha['nome'];
					$matricula = $linha['matricula'];
					$curso = $linha['curso'];
					$nome = $linha['nome'];
					$email = $linha['email'];
					$telefone = $linha['telefone'];
					$foto = $linha['foto'];
					$capaLivro = $linha['capa'];
					
					if(!array_search($id, $id_mostrado)){
						echo"
						<html>
								<div class='resultado'>
									<div class='foto'>
										<img src='../img/uploads/".$linha['foto']."' alt='$nome'/>	
									</div>
									<table>
										<tr>
											<td><span>Nome:</span> &nbsp;<span>".$nome."</span></td>
											<td><span class='empres'>Efetuar emprestimo <input type='checkbox' name='idAluFunProf' value='$id'></span></td>
										</tr>
										<tr>
											<td><span>Matricula:</span> &nbsp;".$matricula."</td>
											<td><span>Curso:</span> &nbsp;".$curso."</td>
										</tr>
										<tr>
											<td><span>Email:</span>&nbsp; ".$email."</td>
											<td><span>Telefone:</span> &nbsp;".$telefone."</td>
										</tr>
									</table>
																				
									
								</div>
								
								
							
							
							
						</html>
						";
						array_push($id_mostrado, "$id");
					}
					
				}
		}//Else
	  }//for
	}//else
	
}//Botão Presionado

if(isset($_GET['botao'])){
	$busca = $_GET['livro'];
	
	if($busca == "" or $busca == " "){
		echo '<center><strong>Digite Algo Para a Busca</strong></center>';
	}else{
	$busca_dividida = explode(' ', $busca);
	$quant = count($busca_dividida);
	$id_mostrar = array("");
	for($i=0; $i<$quant; $i++){
		$pesquisa = $busca_dividida[$i];
		
		$sql = mysql_query("SELECT * FROM livro WHERE titulo LIKE '%$pesquisa%'");
		$quant_campos = mysql_num_rows($sql);
		if($quant_campos == 0){
			echo'<center><strong>Nenhum resultado Obtido!</strong></center>';
		}else{
				while($linha = mysql_fetch_array($sql)){
					
					$idLivro = $linha['idLivro'];
					$titulo = $linha['titulo'];
					$subtitulo = $linha['subtitulo'];
					$issn = $linha['issn'];
					$autor = $linha['autor'];
					$editora = $linha['editora'];
					$resumo = $linha['resumo'];
					
					if(!array_search($idLivro, $id_mostrar)){
						echo"
						<html>	
							
							<div class='resultado'>
								<div class='foto'>
								<img src='../img/capaLivro/".$linha['capaLivro']."' alt='$titulo'/>	
								</div>
																							
								<table>
										<tr>
											<td><span>Titulo: </span>&nbsp;".$titulo."</td>
											<td><span class='empres'>Efetuar Emprestimo <input type='checkbox' name='idLivro' value='$idLivro'></span></td>
										</tr>
										<tr>
											<td><span>Subtitulo:</span>&nbsp;".$subtitulo."</td>
											<td><span1>ISSN:</span1>&nbsp;".$issn."</td>
										</tr>
										<tr>
											<td><span>Autor:</span>&nbsp;".$autor."</td>
											<td><span1>Editora:</span1>&nbsp;".$editora."</td>
										</tr>
										<tr>
											<!--<span>Resumo:</span><br /><p>".$resumo."-->
										</tr>
									</table>
							</div>
						</html>	
						";
						array_push($id_mostrar, "$idLivro");
					}
					
				}
		}//Else
	  }//for
	}//else
	
}//Botão Presionado
?>
						 
					