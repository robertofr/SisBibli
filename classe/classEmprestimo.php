<!--**************************************************************************************************
                                CLASSE EMPRESTIMO
***************************************************************************************************-->
<?php
include ("../conect/conecta.php");// Conecta ao banco de dados
include("../include/erro.php");
include ("../conect/mysqlexecuta.php");// Executa a clausula SQL

class classEmprestimo
{
	public $idEmprestimo;
	public $idAluFunProf;
	public $idLivro;
	public $depuracao;
    public $dataEmprestimo; 
    public $dataDevolucao;
	public $renovacao;
	public $devolver;


	/*======================================================================== 
		INSERIR INFORMAÇÃO NA TABELA EMPRESTIMO
	========================================================================*/
	public function insert ()
	{  

			$sql="INSERT INTO emprestimo ( idAluFunProf, idLivro, dataEmprestimo, dataDevolucao, depuracao) VALUES ('$this->idAluFunProf', '$this->idLivro', '$this->dataEmprestimo', '$this->dataDevolucao', '$this->depuracao')";
			$res = mysqlexecuta($sql);
            
			echo "
					<div class='mensagem'>
						Emprestimo Realizado com Sucesso!!!
					</div>	
				";
	}

	/*========================================================================*/
	// DELETAR INFORMAÇAO NA TABELA EMPRESTIMO
	/*========================================================================*/ 
	public function delete($titulo)
	{

	}

	/*========================================================================*/ 
	// LISTA LIVROS DA TABELA EMPRESTIMO
	/*========================================================================*/
	public function listar ()
	{
	if(!isset($_REQUEST['buscar'])){//Primeira condição se NÃO existir o REQUEST buscar entrar nesta condição	
		/* Se o campo depuracao for diferente de 1 liste todos os emprestimos de acordo com os criterios */ 	
		$sql = "SELECT * FROM alufunprof, livro, emprestimo
				WHERE depuracao != 1  
				AND emprestimo.idAluFunProf = alufunprof.idAluFunProf 
				AND emprestimo.idLivro = livro.idLivro
				";
		$query = mysql_query($sql);
		$row = mysql_num_rows($query);
		if($row > 0){
			echo"
			<div class='resultado'>
				<table border='1' class='table'>
					<tr border='0'>
									<td colspan='4'>
										<span class='editar'><a href='../pagCad/cadEmprestimo.php'> Novo Emprestimo </a></span>
									</td>
									<td colspan='4'>
										<form action='' method='get'>
											<input type='text' name='busca' size='20' placeholder='Nome do Aluno/Professor' >
											<input type='submit' value='Buscar' name='buscar'>
											<input type='submit' value='Lista Todos' name='buscar'>
										</form>	
									</td>
									
					</tr>
					<tr class='title'>
						<td width='270px'><span>Usuário</span></td>
						<td><span>Matricula</td>
						<td><span>Livro:</span></td>
						<td><span>ISBN</span></td>
						<td><span>Data Emprestimo</span></td>
						<td><span>Data Devolução</span></td>
						<td><span>Renovar Emprestimo</span>	</td>
						<td><span>Devolução</span></td>
					</tr>
			";
			while($linha = mysql_fetch_array($query)){
				$idEmprestimo = $linha['idEmprestimo'];
				$idAluFunProf = $linha['idAluFunProf'];
				$nome = $linha['nome'];
				$matricula =  $linha['matricula'];
				$curso = $linha['curso'];
				$situacao = $linha['idSituacao'];
				$email = $linha['email'];
				$livro = $linha['titulo'];
				$issn = $linha['issn'];
				$autor = $linha['autor'];
				$dataEmprestimo = $linha['dataEmprestimo'];
				$dataDevolucao = $linha['dataDevolucao'];
				$foto = $linha['foto'];
				$capaLivro = $linha['capaLivro'];
				
				switch($situacao){
					case 1: $situacao = "Ativo";break;
					case 2: $situacao = "Pendente";break;
					case 3: $situacao = "Inativo";break;
					case 4: $situacao = "Bloqueado";break;
					
				}
				echo"

								<tr>
									<td width='270px'>".$nome."</td>
									<td>".$matricula."</td>
									<td>".$livro."</td>
									<td>".$issn."</td>
									<td>".$dataEmprestimo."</td>
									<td>".$dataDevolucao."</td>
									<td><span class='editar'><a href='../update/atuEmprestimo.php?idEmprestimo=$idEmprestimo'>Renovar</a></span></td>
									<td><span class='editar'><a href='../update/atuEmprestimo.php?idEmprestimo=$idEmprestimo'>Devolução</a></span></td>
								
					</div>
				
				
				";
			}//Fim While		
		echo"</table></div>";
	}else{
		echo"Ainda não existem registros.";
	}
	}//Fim da Primeira condição IF
	$buscar = $_REQUEST['busca'];// Recebe do formulario acima o valor repassado pelo metodo Get
		if(isset($_REQUEST['buscar'])){// Segunda condição se houver REQUEST buscar entra nesta condição e lista o livro solicitado 
			/* Se o campo depuracao for diferente de 1 liste todos os emprestimos de acordo com os criterios */ 	
			$sql = "SELECT * FROM alufunprof, livro, emprestimo
					WHERE depuracao != 1  
					AND emprestimo.idAluFunProf = alufunprof.idAluFunProf 
					AND emprestimo.idLivro = livro.idLivro
					AND aluFunProf.nome LIKE '%$buscar%'
					";
			$query = mysql_query($sql);
			$row = mysql_num_rows($query);
			if($row > 0){
				echo"
				<div class='resultado'>
					<table border='1' class='table'>
						<tr border='0'>
										<td colspan='4'>
											<span class='editar'><a href='../pagCad/cadEmprestimo.php'> Novo Emprestimo </a></span>
										</td>
										<td colspan='4'>
											<form action='' method='get'>
												<input type='text' name='busca' size='20' placeholder='Nome do Usuário' >
												<input type='submit' value='Buscar' name='buscar'>
												<input type='submit' value='Lista Todos' name='buscar'>
											</form>	
										</td>
										
						</tr>
						<tr class='title'>
							<td width='270px'><span>Usuário</span></td>
							<td><span>Matricula</td>
							<td><span>Livro:</span></td>
							<td><span>ISBN</span></td>
							<td><span>Data Emprestimo</span></td>
							<td><span>Data Devolução</span></td>
							<td><span>Renovar Emprestimo</span>	</td>
							<td><span>Devolução</span></td>
						</tr>
				";
				while($linha = mysql_fetch_array($query)){
					$idEmprestimo = $linha['idEmprestimo'];
					$idAluFunProf = $linha['idAluFunProf'];
					$nome = $linha['nome'];
					$matricula =  $linha['matricula'];
					$curso = $linha['curso'];
					$situacao = $linha['idSituacao'];
					$email = $linha['email'];
					$livro = $linha['titulo'];
					$issn = $linha['issn'];
					$autor = $linha['autor'];
					$dataEmprestimo = $linha['dataEmprestimo'];
					$dataDevolucao = $linha['dataDevolucao'];
					$foto = $linha['foto'];
					$capaLivro = $linha['capaLivro'];
					
					switch($situacao){
						case 1: $situacao = "Ativo";break;
						case 2: $situacao = "Pendente";break;
						case 3: $situacao = "Inativo";break;
						case 4: $situacao = "Bloqueado";break;
						
					}
					echo"

									<tr>
										<td width='270px'>".$nome."</td>
										<td>".$matricula."</td>
										<td>".$livro."</td>
										<td>".$issn."</td>
										<td>".$dataEmprestimo."</td>
										<td>".$dataDevolucao."</td>
										<td><span class='editar'><a href='../update/atuEmprestimo.php?idEmprestimo=$idEmprestimo'>Renovar</a></span></td>
										<td><span class='editar'><a href='../update/atuEmprestimo.php?idEmprestimo=$idEmprestimo'>Devolução</a></span></td>
									
						</div>
					
					
					";
				}//Fim While		
			echo"</table></div>";
		}else{
			echo"Ainda não existem registros.";
		}
	}//Fim da Primeira condição IF
	}//#listar

	/*=========================================================================*/
	// LISTA USUARIOS DA TABELA EMPRESTIMO
	/*==========================================================================*/
	public function listarLu()
	{
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
									<div class='resultado'>
										<table border='1'>
											<tr>
												<td colspan='4'><span>Aluno/Professor</span></td>
											</tr>
											<tr>
												<td rowspan='3' width='100px'><img src='../img/uploads/".$linha['foto']."' alt='$nome' class='foto'/></td>
												<td><span>Nome:</span> &nbsp;".$nome."</td>
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
								";
								array_push($id_mostrado, "$id");
							}
							
						}
				}//Else
			  }//for
			}//else
			
		}//Botão Presionado

		//Listando Livros cadastrados
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
									<div class='resultado'>
										<table border='1'>
											<tr>
												<td colspan='4'><span>Livro</span></td>
											</tr>
											<tr>
												<td rowspan='3' width='100px'><img src='../img/capaLivro/".$linha['capaLivro']."' alt='$titulo' class='foto'/></td>
												<td><span>Titulo: </span>".$titulo."</td>
												<td><span class='empres'>Efetuar Emprestimo <input type='checkbox' name='idLivro' value='$idLivro'></span></td>
											</tr>
											<tr>
												<td><span>Subtitulo:</span>".$subtitulo."</td>
												<td><span>ISBN:</span>".$issn."</td>
											</tr>
											<tr>
												<td><span>Autor:</span>".$autor."</td>
												<td><span>Editora:</span>".$editora."</td>
											</tr>
										</table>
									</div>
								";
								array_push($id_mostrar, "$idLivro");
							}
							
						}
				}//Else
			  }//for
			}//else
			
		}//Botão Presionado
						 
					
	}

	/*========================================================================*/
	// RENOVAR EMPRESTIMO 
	/*========================================================================*/   
	public function renovacao()
	{  	
		$update = ("UPDATE emprestimo SET dataDevolucao = '$this->renovacao' WHERE idEmprestimo = '$this->idEmprestimo'");
		$atualiza = mysql_query($update);
		include"../include/topo.php";
			if($atualiza){
				echo "
						<div class='mensagem'>
							<span>Renovação Realizada Com Sucesso!</span><br /> 
						</div>	
					";
					$idEmprestimo = $_REQUEST['idEmprestimo'];
				 echo '<meta http-equiv="refresh" content="5;URL=../update/atuEmprestimo.php?idEmprestimo=$idEmprestimo" />'; 
			}	else{
				echo"
						<div class='mensagem'>
							<span>Ocorreu Um Erro Durante a Renovação!</span><br />
						</div>	
					";
			}
		include"../include/rodape.php";		
	}
	
	/*========================================================================*/
	// REALIZAR DEVOLUÇÃO DO LIVRO 
	/*========================================================================*/   
	public function devolucao()
	{  	
		$update = ("UPDATE emprestimo SET depuracao = '$this->devolver' WHERE idEmprestimo = '$this->idEmprestimo'");
		$atualiza = mysql_query($update);
		include"../include/topo.php";
			if($atualiza){
				echo "
						<div class='mensagem'>
							<span>Devolução Realizada Com Sucesso!</span><br /> 
						</div>	
					";
				 echo '<meta http-equiv="refresh" content="5;URL=../visualizar/visEmprestimoRealizado.php" />'; 
			}	else{
				echo"
						<div class='mensagem'>
							<span>Ocorreu Um Erro Durante a Devolução!</span><br />
						</div>	
					";
			}
		include"../include/rodape.php";		
	}
	
}//#classEmprestimo
 //unset($conexao);
?>
