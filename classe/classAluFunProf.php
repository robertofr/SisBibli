<!--**************************************************************************************************
                                CLASSE ALUFUNPROF
***************************************************************************************************-->
<?php
include("../conect/conecta.php");// Conecta ao banco de dados
include("../conect/mysqlexecuta.php");// Executa a cláusula SQL
include("../include/erro.php");// Incluir Tratamento de erros

class classAluFunProf
{
	public $idAluFunProf;
    public $nome;   
    public $matricula;
    public $curso; 
    public $cpf; 
	public $email;   
    public $telefone;
    public $tipoUsuario; 
    public $situacao;
	public $login;   
    public $senha;
    public $lagradouro;     
	public $cidade;   
    public $estado;
	public $cep;
	public $foto;
	
	/*======================================================================== 
		INSERIR INFORMAÇÃO NA TABELA ALUFUNPROF
	========================================================================*/
	public function insert()
	{  
			
	$foto = $_FILES["foto"];// Recupera os dados dos campos	
	
	if (!empty($foto["name"])) {// Se a foto estiver sido selecionada
		
		
		$largura = 3600;// Largura máxima em pixels
		
		$altura = 4320;// Altura máxima em pixels
		
		$tamanho = 2000;// Tamanho máximo do arquivo em bytes

    	
    	if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $foto["type"])){// Verifica se o arquivo é uma imagem
     	   $error[1] = "Isso não á uma imagem.";
   	 	} 
	
	
		$dimensoes = getimagesize($foto["tmp_name"]);	// Pega as dimensões da imagem
	
		
		if($dimensoes[0] > $largura) {// Verifica se a largura da imagem é maior que a largura permitida
			$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
		}

		
		if($dimensoes[1] > $altura) {// Verifica se a altura da imagem é maior que a altura permitida
			$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		}
		
		
		if($arquivo["size"] > $tamanho) {// Verifica se o tamanho da imagem é maior que o tamanho permitido
   		 	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
		}

		
		if (count($error) == 0) {// Se não houver nenhum erro
		
			
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);// Pega extensão da imagem

        	
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];// Gera um nome único para a imagem

        	
        	$caminho_imagem = "../img/uploads/" . $nome_imagem;// Caminho de onde ficará a imagem

			
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);// Faz o upload da imagem para seu respectivo caminho
			

			
			$sql="INSERT INTO alufunprof (nome, matricula, curso, cpf, email, telefone, tipoUsuario, idSituacao, login, senha, lagradouro, cidade, estado, cep, foto)
				  VALUES ('$this->nome', '$this->matricula', '$this->curso', '$this->cpf', '$this->email', '$this->telefone', '$this->tipoUsuario', '$this->situacao',
				  '$this->login', '$this->senha', '$this->lagradouro', '$this->cidade', '$this->estado', '$this->cep', '$nome_imagem')";
			$res = mysqlexecuta($sql);          
						
			include"../include/topo.php";
				if ($sql){// Se os dados forem inseridos com sucesso
					echo "
							<div class='mensagem'>
								<span>Cadastro Efetuado com Sucesso!!!</span>
							</div>
						";
				}
		}
	
		
				if (count($error) != 0) {// Se houver mensagens de erro, exibe-as
					foreach ($error as $erro) {
						echo $erro . "<br />";
					}
				}
	}//#if
				$url = '../visualizar/visUsuarioCadastrado.php';
					echo '
						<meta http-equiv=refresh content="2;URL='.$url.'" />
					';
			include"../include/rodape.php";	
	}

	/*========================================================================*/ 
	// LISTAR INFORMAÇÕES TODOS OS USUARIOS CADASTRADOS NA PAGINA VISUALIZAR USUARIOS CADASTRADOS
	/*========================================================================*/
	public function listar () //Lista todos os Usuarios cadastrados na pagina visualizar Usuarios cadastrados
	{
	if(!isset($_REQUEST['buscar'])){//Primeira condição se NÃO existir o REQUEST buscar entrar nesta condição	
		$select = mysql_query("SELECT idAluFunProf, nome, matricula, curso, email, telefone
							   FROM  alufunprof");			
				
			echo"
				<div class='resultado'>
					<table border='1'>
							<tr border='0'>
								<td colspan='3'>
									<span class='editar'><a href='../pagCad/cadAluFunProf.php'> Novo Usuário </a></span>
								</td>
								<td colspan='5'ervo>
									<form action='' method='get'>
										<input type='text' name='busca' size='20' placeholder='Nome ou Matricula'>
										<input type='submit' value='Buscar' name='buscar'>
										<input type='submit' value='Lista Todos' name='buscar'>
									</form>
								</td>
							</tr>
							<tr class='title'>
								<td><span>Nome</span></td>
								<td><span>Matricula</span></td>
								<td><span>Curso</span></td>
								<td><span>Email</span></td>
								<td><span>Telefone</span></td>
								<td><span>Visualizar</span></td>
								<td><span>Alterar</span></td>
								<td><span>Deletar</span></td>
							</tr>
						
				";
				
										
			while($linha = mysql_fetch_array($select)) {            // inicia o loop que vai mostrar todos os dados
				$idAluFunProf = $linha['idAluFunProf'];//Recebe idAluFunProf
				echo"
						<tr>
							<td>".$linha['nome']."</td>
							<td>".$linha['matricula']."</td>
							<td>".$linha['curso']."</td>
							<td>".$linha['email']."</td>
							<td>".$linha['telefone']."</td>
							<td><span class='editar'><a href='../visualizar/visUsuarioCadastradoEsp.php?idAluFunProf=$idAluFunProf'>Visualizar</a></span></td>
							<td><span class='editar'><a href='../update/atuAluFunProf.php?idAluFunProf=$idAluFunProf'>Alterar</a></span></td>
							<td><span class='editar'><a href='../delete/delAluFunProf.php?idAluFunProf=$idAluFunProf'>Deletar</a></span></td>
						</tr>
					
				";
				
			}// fim do while
	}//Fim da Primeira Condição IF
		$buscar = $_REQUEST['busca'];// Recebe do formulario acima o valor repassado pelo metodo Get
		if(isset($_REQUEST['buscar'])){// Segunda condição se houver REQUEST buscar entra nesta condição e lista o livro solicitado 
			$select = mysql_query("SELECT idAluFunProf, nome, matricula, curso, email, telefone
							   FROM  alufunprof WHERE nome LIKE '%$buscar%' OR matricula LIKE '%$buscar'");	
		
		echo"
				<div class='resultado'>
					<table border='1'>
							<tr border='0'>
								<td colspan='4'>
									<span class='editar'><a href='../pagCad/cadAluFunProf.php'> Novo Usuário </a></span>
								</td>
								<td colspan='4'>
									<form action='' method='get'>
										<input type='text' name='busca' size='20' placeholder='Nome ou Matricula'>
										<input type='submit' value='Buscar' name='buscar'>
										<input type='submit' value='Lista Todos' name='buscar'>
									</form>
								</td>
							</tr>
							<tr class='title'>
								<td><span>Nome</span></td>
								<td><span>Matricula</span></td>
								<td><span>Curso</span></td>
								<td><span>Email</span></td>
								<td><span>Telefone</span></td>
								<td><span>Visualizar</span></td>
								<td><span>Alterar</span></td>
								<td><span>Deletar</span></td>
							</tr>
						
				";							   
		while($linha = mysql_fetch_array($select)) {            // inicia o loop que vai mostrar todos os dados
			  $idAluFunProf = $linha['idAluFunProf'];//Recebe idAluFunProf
			echo"
						<tr>
							<td>".$linha['nome']."</td>
							<td>".$linha['matricula']."</td>
							<td>".$linha['curso']."</td>
							<td>".$linha['email']."</td>
							<td>".$linha['telefone']."</td>
							<td><span class='editar'><a href='../visualizar/visUsuarioCadastradoEsp.php?idAluFunProf=$idAluFunProf'>Visualizar</a></span></td>
							<td><span class='editar'><a href='../update/atuAluFunProf.php?idAluFunProf=$idAluFunProf'>Alterar</a></span></td>
							<td><span class='editar'><a href='../delete/delAluFunProf.php?idAluFunProf=$idAluFunProf'>Deletar</a></span></td>
						</tr>
					
				";					   
		}	
		}//Fim da Segunda Condição IF
		echo"</table></div>";
		/* mysql_close(conecta); // tira o resultado da busca da memoria */

	}//#listar

	/*========================================================================*/ 
	// VISUALIZAR TODOS OS DADOS DE UM USUARIO ESPECIFICO CADASTRADO 
	/*========================================================================*/
	public function listarEspecifico () //Lista todos os livros na pagina visualizar livros cadastrados
	{
		$select = mysql_query("SELECT * FROM alufunprof WHERE idAluFunProf ='$this->idAluFunProf'");//Seleciona todos os dados da tabela aluFunProf em um array
		$linha = mysql_fetch_array($select);//atribui o array recebido a variavel $linha										
		$idAluFunProf = $linha['idAluFunProf'];//Recebe idAluFunProf
			switch($linha['idSituacao']){
				case 1: $idSituacao = "Ativo";break;
				case 2: $idSituacao = "Pendente";break;
				case 3: $idSituacao = "Inativo";break;
				case 4: $idSituacao = "Bloqueado";break;
				
			}
			echo"
				<fieldset> <legend>Dados Usuário</legend>
				<table border='1' class='table'>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td>
						<span class='editar'><a href='../visualizar/visUsuarioCadastrado.php'>Voltar</a></span>
						<span class='editar'><a href='../update/atuAluFunProf.php?idAluFunProf=$idAluFunProf'>Alterar</a></span>
						<span class='editar'><a href='../delete/delAluFunProf.php?idAluFunProf=$idAluFunProf'>Deletar</a></span>
						<span class='editar'><a href='../visualizar/visHistorico.php?idAluFunProf=$idAluFunProf'>Histórico</a></span>
					</td>
				</tr>
				<tr>
					<td rowspan='4' width='100'>
						<img src='../img/uploads/".$linha['foto']."' alt='".$linha['nome']."'/ class='foto'>	
					</td> 
					<td><span>Nome:</span>".$linha['nome']."</td>
					<td><span>Matricula:</span>".$linha['matricula']."</td>
					<td><span>Curso:</span>".$linha['curso']."</td>
				</tr>	
				<tr>
					<td><span>CPF:</span>".$linha['cpf']."</td>
					<td><span>Email:</span>".$linha['email']."</td>
					<td><span>Telefone:</span>".$linha['telefone']."</td>
				</tr>	
				<tr>
				
					<td><span>Tipo de Usuário:</span>".$linha['tipoUsuario']."</td>
					<td><span>Situação:</span>".$idSituacao."</td>
					<td></td>
				</tr>
				
				<tr>
					<td><span>Lagradouro:</span>".$linha['lagradouro']."</td>
					<td><span>Cidade:</span>".$linha['cidade']."</td>
					<td><span>Estado:</span>".$linha['estado']."</td>
				</tr>	

				<tr>
					<td></td>
					<td><span>CEP:</span>".$linha['cep']."</td>
					<td></td>
					<td></td>
				</tr>
			</table>	
			  </fieldset> 
			";//#echo
			
		/* mysql_close(conecta); // tira o resultado da busca da memória */

	}//#listar

	/*========================================================================*/
	// ATUALIZA INFORMAÇÃO NA TABELA ALUFUNPROF
	/*========================================================================*/   
	public function update()
	{  
		
		$update = ("UPDATE alufunprof SET nome = '$this->nome', matricula = '$this->matricula', curso = '$this->curso', cpf = '$this->cpf', email= '$this->email', telefone = '$this->telefone',
			tipoUsuario = '$this->tipoUsuario', idSituacao = '$this->situacao', login = '$this->login', senha = '$this->senha', lagradouro = '$this->lagradouro', cidade = '$this->cidade', estado = '$this->estado',
			cep = '$this->cep'
			WHERE idAluFunProf = '$this->idAluFunProf'");
		$atualiza = mysql_query($update);
		include"../include/topo.php";
			if($atualiza){
				echo "
						<div class='mensagem'>
							<span>Dados Atualizados Com Sucesso!</span><br /> 
						</div>	
					";
				//printf ("Registros atualizados: %d\n", mysql_affected_rows());
				echo '<meta http-equiv="refresh" content="5;URL=../visualizar/visUsuarioCadastrado.php" />';
			}	else{
				echo"
						<div class='mensagem'>
							<span>Ocorreu Um Erro ao Atualizar os Dados!</span><br />
						</div>	
					";
				//printf("Registros atualizados: %d\n", mysql_affected_rows());
				
			}
			$url = '../visualizar/visUsuarioCadastrado.php';
				echo '
					<meta http-equiv=refresh content="2;URL='.$url.'" />
				';
		include"../include/rodape.php";		
	}//#update	
	
	/*========================================================================*/
	// DELETA INFORMAÇÃO NA TABELA ALUFUNPROF
	/*========================================================================*/ 
	public function deletar()
	{
		$select = mysql_query("SELECT nome FROM alufunprof WHERE idAluFunProf = '$this->idAluFunProf'");
		$linha = mysql_fetch_array($select);
		
		$query = "DELETE FROM alufunprof WHERE idAluFunProf = '$this->idAluFunProf'";// Montamos a consulta SQL para deletar notícias que não sejam desse ano
		
		$deletar = mysql_query($query);// Executa a query
		include"../include/topo.php";
			if ($deletar){
			echo "
					<div class='mensagem'>
						<span>O Usuario ".$linha['nome']." foi deletado com sucesso ".$idAluFunProf."!</span>
					</div>	
				";
			} else {
			echo "
					<div class='mensagem'>
						<span>Não foi possível deletar o Usuario ".$linha['nome'].", pois o usuario possui emprestimo registrado em seu nome!</span><br />
						Dados sobre o erro:". mysql_error()."
					</div>
					";
			
			
			}
			$url = '../visualizar/visUsuarioCadastrado.php';
				echo '
					<meta http-equiv=refresh content="5;URL='.$url.'" />
				';
		include"../include/rodape.php";		
	}//#Delete	
	
/*========================================================================*/
// FUNÇÃO GERAR HISTORICO 
/*========================================================================*/ 	
public function historico(){
		$select = mysql_query("SELECT * FROM alufunprof, livro, emprestimo
					WHERE  alufunprof.idAluFunProf = $this->idAluFunProf  
					AND emprestimo.idAluFunProf = alufunprof.idAluFunProf 
					AND emprestimo.idLivro = livro.idLivro
				");	
		$idAluFunProf = $_REQUEST["idAluFunProf"];	
		$rows = mysql_num_rows($select);		
	    echo"
				<table border=1 class='table'>
					<tr>
						<td colspan='7'><h3>HISTORICO DE EMPRESTIMO</h3> </td>
						 
						<td colspan='1'><span class='editar'><a href='../visualizar/visUsuarioCadastradoEsp.php?idAluFunProf=$idAluFunProf'>Voltar</a></span></td>
					</tr>
					<tr>
						<td><span>Nome Usuário</span></td>
						<td><span>Titulo Livro</span></td>
						<td><span>Subtitulo</span></td>
						<td><span>ISBN</span></td>
						<td><span>Autor</span></td>
						<td><span>Data Emprestimo</span></td>
						<td><span>Data Devolução</span></td>
						<td><span>Situação</span></td>
					</tr>
			";	
			
		while($linha = mysql_fetch_array($select)){
			$depuracao = $linha['depuracao'];
			
			if($depuracao) 
				$depuracao = "Devolvido";
			else $depuracao = "Emprestado";
			
			echo"
					<tr>
						<td>".$linha['nome']."</td>
						<td>".$linha['titulo']."</td>
						<td>".$linha['subtitulo']."</td>
						<td>".$linha['issn']."</td>
						<td>".$linha['autor']."</td>
						<td>".$linha['dataEmprestimo']."</td>
						<td>".$linha['dataDevolucao']."</td>
						<td>".$depuracao."</td>
					</tr>
			";
		}//#fim while
		
		echo"
			<tr>
				<td colspan='8'><span> Registros Encontrados : $rows</span></td>
			</tr>
			</table>
		";
}//#fim da Função Historico



}//#classe

?>
