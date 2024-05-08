<!--**************************************************************************************************
                                CLASSE USUARIO
***************************************************************************************************-->
<?php
include("../conect/conecta.php");// Conecta ao banco de dados
include("../conect/mysqlexecuta.php");// Executa a cláusula SQL
include("../include/erro.php");// Incluir Tratamento de erros

class classUsuario
{
	public $idUsuario;
    public $nome;   
    public $email;
	public $cpf;
    public $telefone; 
	public $grupo;
    public $login; 
	public $senha; 


	/*======================================================================== 
	INSERIR INFORMAÇÃO NA TABELA USUARIO
	========================================================================*/
	public function insert ()
	{  		
	
		$sql="INSERT INTO usuario ( nome, email, cpf, telefone, idGrupo, login, senha) VALUES ('$this->nome', '$this->email', '$this->cpf', '$this->telefone', '$this->grupo', '$this->login', '$this->senha')";
		$res = mysqlexecuta($sql);
	
		include "../include/topo.php";
		echo "
			<div class='mensagem'>
				<span>Usuário $this->nome Cadastro Efetuado com Sucesso!!!</span>
			</div>	
		
		";
		$url = '../visualizar/visUser.php';
			echo '
				<meta http-equiv=refresh content="5;URL='.$url.'" />
			';
		include "../include/rodape.php";
	}

	/*========================================================================*/ 
	// LISTA INFORMAÇÃO DA TABELA USUARIO
	/*========================================================================*/
	public function listar () //Lista todos os Usuarios cadastrados na pagina visualizar Usuarios cadastrados
	{
	if(!isset($_REQUEST['buscar'])){//Primeira condição se NÃO existir o REQUEST buscar entrar nesta condição	
		$select = mysql_query("SELECT usuario.idUsuario, usuario.nome, usuario.email, usuario.cpf, usuario.telefone, grupo.nomeGrupo, grupo.tipoGrupo
							   FROM  usuario, grupo 
							   WHERE usuario.idGrupo = grupo.idGrupo");	
				
			echo"
				<div class='resultado'>
					<table border='1'>
						<tr border='0'>
							<td colspan='4'>
								<span class='editar'><a href='../pagCad/cadUsuario.php'> Novo Usuário </a></span>
							</td>
							<td colspan='4'>
								<form action='' method='get'>
									<input type='text' name='busca' size='20' placeholder='Nome'>
									<input type='submit' value='Buscar' name='buscar'>
									<input type='submit' value='Lista Todos' name='buscar'>
								</form>
							</td>
						</tr>
						<tr class='title'>
							<td><span>Nome</span></td>
							<td><span>Email</span></td>
							<td><span>CPF</span></td>
							<td><span>Telefone</span></td>
							<td><span>Nome do Grupo</span></td>
							<td><span>Tipo Grupo</span></td>
							<td><span>Visualizar</span></td>
							<td><span>Alterar</span></td>
							<td><span>Deletar</span></td>
						</tr>
						
				";	
			while($linha = mysql_fetch_array($select)) { // inicia o loop que vai mostrar todos os dados
				$idUsuario = $linha['idUsuario'];//Recebe idUsuario
				echo"
						<tr>
							<td>".$linha['nome']."</td>
							<td>".$linha['email']."</td>
							<td>".$linha['cpf']."</td>
							<td>".$linha['telefone']."</td>
							<td>".$linha['nomeGrupo']."</td>
							<td>".$linha['tipoGrupo']."</td>
							<td><span class='editar'><a href='../visualizar/visUserEsp.php?idUsuario=$idUsuario'>Visualizar</a></span></td>
							<td><span class='editar'><a href='../update/atuUser.php?idUsuario=$idUsuario'>Alterar</a></span></td>
							<td><span class='editar'><a href='../delete/delUser.php?idUsuario=$idUsuario'>Deletar</a></span></td>
						</tr>
					
				";
				
			}// fim do while
		}//Fim da primeira Condição IF	
		
		$buscar = $_REQUEST['busca'];// Recebe do formulario acima o valor repassado pelo metodo Get
		if(isset($_REQUEST['buscar'])){// Segunda condição se houver REQUEST buscar entra nesta condição e lista o livro solicitado 
			$select = mysql_query("SELECT usuario.idUsuario, usuario.nome, usuario.email, usuario.cpf, usuario.telefone, grupo.nomeGrupo, grupo.tipoGrupo
							   FROM  usuario, grupo 
							   WHERE usuario.idGrupo = grupo.idGrupo
							   AND nome LIKE '%$buscar%'");			
				
			echo"
				<div class='resultado'>
					<table border='1'>
						<tr border='0'>
							<td colspan='4'>
								<span class='editar'><a href='../pagCad/cadUsuario.php'> Novo Usuário </a></span>
							</td>
							<td colspan='4'>
								<form action='' method='get'>
									<input type='text' name='busca' size='20' placeholder='Nome'>
									<input type='submit' value='Buscar' name='buscar'>
									<input type='submit' value='Lista Todos' name='buscar'>
								</form>
							</td>
						</tr>
						<tr class='title'>
							<td><span>Nome</span></td>
							<td><span>Email</span></td>
							<td><span>CPF</span></td>
							<td><span>Telefone</span></td>
							<td><span>Nome do Grupo</span></td>
							<td><span>Tipo Grupo</span></td>
							<td><span>Visualizar</span></td>
							<td><span>Alterar</span></td>
							<td><span>Deletar</span></td>
						</tr>
						
				";		
			while($linha = mysql_fetch_array($select)) {            // inicia o loop que vai mostrar todos os dados
				$idUsuario = $linha['idUsuario'];//Recebe idUsuario
				echo"
						<tr>
							<td>".$linha['nome']."</td>
							<td>".$linha['email']."</td>
							<td>".$linha['cpf']."</td>
							<td>".$linha['telefone']."</td>
							<td>".$linha['nomeGrupo']."</td>
							<td>".$linha['tipoGrupo']."</td>
							<td><span class='editar'><a href='../visualizar/visUserEsp.php?idUsuario=$idUsuario'>Visualizar</a></span></td>
							<td><span class='editar'><a href='../update/atuUser.php?idUsuario=$idUsuario'>Alterar</a></span></td>
							<td><span class='editar'><a href='../delete/delUser.php?idUsuario=$idUsuario'>Deletar</a></span></td>
						</tr>
					
				";
				
			}// fim do while
		}//Fim da Segunda Condição IF
		echo"</table></div>";

	}//#listar

	/*========================================================================*/ 
	// VISUALIZAR TODOS OS DADOS DE UM USUARIO ESPECIFICO CADASTRADO 
	/*========================================================================*/
	public function listarEspecifico () //Lista todos os livros na pagina visualizar livros cadastrados
	{
		$select = mysql_query("SELECT usuario.idUsuario, usuario.nome, usuario.email, usuario.cpf, usuario.telefone, grupo.nomeGrupo, grupo.tipoGrupo
								FROM  usuario, grupo 
								WHERE usuario.idGrupo = grupo.idGrupo
								AND idUsuario = '$this->idUsuario'");//Seleciona todos os dados da tabela aluFunProf em um array
		$linha = mysql_fetch_array($select);//atribui o array recebido a variavel $linha										
		$idUsuario = $linha['idUsuario'];//Recebe idUsuario
			
			echo"
				<fieldset> <legend>Dados Usuário</legend>
				<table border='1' class='table'>
				<tr>
					<td colspan='3'></td>
					<td>
						<span class='editar'><a href='../visualizar/visUser.php'>Voltar</a></span>
						<span class='editar'><a href='../update/atuUser.php?idUsuario=$idUsuario'>Alterar</a></span>
						<span class='editar'><a href='../delete/delUser.php?idUsuario=$idUsuario'>Deletar</a></span>
					</td>
				</tr>
				<tr>
					<td rowspan='3' width='100'>
						<img src='../img/uploads/".$linha['foto']."' alt='".$linha['nome']."'/ class='foto'>	
					</td> 
					<td><span>Nome:</span>".$linha['nome']."</td>
					<td><span>Email:</span>".$linha['email']."</td>
					<td><span>CPF:</span>".$linha['cpf']."</td>
					<td><span>Telefone:</span>".$linha['telefone']."</td>
				</tr>	
				<tr>
					<td><span>Nome do Grupo:</span>".$linha['nomeGrupo']."</td>
					<td><span>Tipo Grupo:</span>".$linha['tipoGrupo']."</td>
					<td></td>
				</tr>	

			</table>	
			  </fieldset> 
			";//#echo
			
		/* mysql_close(conecta); // tira o resultado da busca da memória */

	}//#listar

	/*========================================================================*/
	// ATUALIZAR INFORMAÇÃO DA TABELA USUARIO
	/*========================================================================*/   
	public function update ()
	{  
		$update = ("UPDATE usuario SET nome = '$this->nome', email= '$this->email',cpf= '$this->cpf', telefone = '$this->telefone',
					idGrupo = '$this->idGrupo', login = '$this->login', senha = '$this->senha'
					WHERE idUsuario = '$this->idUsuario'");
		$atualiza = mysql_query($update);
		include"../include/topo.php";
			if($atualiza){
				echo "
						<div class='mensagem'>
							<span>Dados Atualizados Com Sucesso!</span><br /> 
						</div>	
					";	
				echo '<meta http-equiv="refresh" content="5;URL=../visualizar/visUser.php" />';
			}	else{
				echo"
						<div class='mensagem'>
							<span>Ocorreu Um Erro ao Atualizar os Dados!</span><br />
							Dados sobre o erro:". mysql_error()."
						</div>	
					";
				
			}
			echo '<meta http-equiv="refresh" content="5;URL=../visualizar/visUser.php" />';
		include"../include/rodape.php";		
	}

	/*========================================================================*/
	// DELETAR INFORMAÇÃO NA TABELA USUARIO
	/*========================================================================*/ 
	public function deletar()
	{
		$select = mysql_query("SELECT nome FROM usuario WHERE idUsuario = '$this->idUsuario'");
		$linha = mysql_fetch_array($select);
		
		$query = "DELETE FROM usuario WHERE idUsuario = '$this->idUsuario'";// Montamos a consulta SQL para deletar o usuario
		
		$deletar = mysql_query($query);// Executa a query
		include"../include/topo.php";
			if ($deletar){
			echo "
					<div class='mensagem'>
						<span>O Usuario ".$linha['nome']." foi deletado com sucesso ".$idUsuario."!</span>
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
			$url = '../visualizar/visUser.php';
				echo '
					<meta http-equiv=refresh content="5;URL='.$url.'" />
				';
		include"../include/rodape.php";	
	}
	
}

	
	
    //unset($conexao);

?>
