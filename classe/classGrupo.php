<!--**************************************************************************************************
                                CLASSE GRUPO
***************************************************************************************************-->
<?php
include ("../conect/conecta.php"); // Conecta ao banco de dados
include ("../conect/mysqlexecuta.php");// Executa a clausula SQL
include("../include/erro.php");// Incluir Tratamento de erros

class classGrupo
{
	public $idGrupo;
    public $nomeGrupo;   
    public $tipoGrupo;
	public $permissao;
    
	/*======================================================================== 
	INSERI INFORMAÇÃO NA TABELA GRUPO
	========================================================================*/
	public function insert ()
	{  					
		$sql="INSERT INTO grupo( nomeGrupo, tipoGrupo, idPermissao) VALUES ('$this->nomeGrupo', '$this->tipoGrupo', '$this->permissao')";
		$res = mysqlexecuta($sql);
		include"../include/topo.php";
		echo "
				<div class='mensagem'>
					<span>Cadastro Efetuado com Sucesso!!!</span>
				</div>
			";
			$url = '../visualizar/visGrupo.php';
		echo '<meta http-equiv=refresh content="5;URL='.$url.'" />';
		include"../include/rodape.php"	;
			
	}

	/*========================================================================*/
	// DELETAR INSFORMAÇÃO DA TABELA GRUPO
	/*========================================================================*/ 
	public function deletar()
	{
		$select = mysql_query("SELECT nomeGrupo FROM grupo WHERE idGrupo = '$this->idGrupo'");
		$linha = mysql_fetch_array($select);
		
		$query = "DELETE FROM grupo WHERE idGrupo = '$this->idGrupo'";// Montamos a consulta SQL para deletar o grupo
		
		$deletar = mysql_query($query);// Executa a query
		include"../include/topo.php";
			if ($deletar){
			echo "
					<div class='mensagem'>
						<span>O Grupo ".$linha['nomeGrupo']." foi deletado com sucesso!</span>
					</div>	
				";
			} else {
			echo "
					<div class='mensagem'>
						<span>Não foi possível deletar o Grupo ".$linha['nomeGrupo'].", pois o Grupo possui Usuários registrado!</span><br />
						Dados sobre o erro:". mysql_error()."
					</div>
					";
			
			
			}
			$url = '../visualizar/visGrupo.php';
				echo '
					<meta http-equiv=refresh content="5;URL='.$url.'" />
				';
		include"../include/rodape.php";		
	}

	/*========================================================================*/ 
	// LISTA INFORMAÇÕES DA TABELA GRUPO
	/*========================================================================*/
	public function listar () //Lista todos os Usuarios cadastrados na pagina visualizar Usuarios cadastrados
	{
	if(!isset($_REQUEST['buscar'])){//Primeira condição se NÃO existir o REQUEST buscar entrar nesta condição		
		$select = mysql_query("SELECT grupo.idGrupo, grupo.nomeGrupo, grupo.tipoGrupo, permissao.idPermissao
							   FROM  grupo, permissao 
							   WHERE grupo.idPermissao = permissao.idPermissao");			
		 
			echo"
				<div class='resultado'>
					<table border='1'>
						<tr border='0'>
							<td colspan='4'>
								<span class='editar'><a href='../pagCad/cadGrupo.php'> Novo Grupo </a></span>
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
							<td><span>Nome Grupo</span></td>
							<td><span>Tipo Grupo</span></td>
							<td><span>Permissões</span></td>
							<td><span>Alterar</span></td>
							<td><span>Deletar</span></td>
						</tr>
						
				";		
			while($linha = mysql_fetch_array($select)) {            // inicia o loop que vai mostrar todos os dados
				$idGrupo = $linha['idGrupo'];//Recebe idUsuario
				$permissao = $linha['idPermissao'];
				switch($permissao){
					case 1: $permissao = "Visualizar - Cadastrar - Alterar - Deletar";break;
					case 2: $permissao = "Visualizar - Cadastrar - Alterar";break;
					case 3: $permissao = "Visualizar";
				}
				echo"
						<tr>
							<td>".$linha['nomeGrupo']."</td>
							<td>".$linha['tipoGrupo']."</td>
							<td>".$permissao."</td>
							<td><span class='editar'><a href='../update/atuGrupo.php?idGrupo=$idGrupo'>Alterar</a></span></td>
							<td><span class='editar'><a href='../delete/delGrupo.php?idGrupo=$idGrupo'>Deletar</a></span></td>
						</tr>
					
				";
				
			}// fim do while
	}//Fim da primeira condição IF
	
	$buscar = $_REQUEST['busca'];// Recebe do formulario acima o valor repassado pelo metodo Get
	if(isset($_REQUEST['buscar'])){// Segunda condição se houver REQUEST buscar entra nesta condição e lista o livro solicitado 
		$select = mysql_query("SELECT grupo.idGrupo, grupo.nomeGrupo, grupo.tipoGrupo, permissao.idPermissao
							   FROM  grupo, permissao 
							   WHERE grupo.idPermissao = permissao.idPermissao
							   AND nomeGrupo LIKE '%$buscar%'");			
		 
			echo"
				<div class='resultado'>
					<table border='1'>
						<tr border='0'>
							<td colspan='4'>
								<span class='editar'><a href='../pagCad/cadGrupo.php'> Novo Grupo </a></span>
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
							<td><span>Nome Grupo</span></td>
							<td><span>Tipo Grupo</span></td>
							<td><span>Permissões</span></td>
							<td><span>Alterar</span></td>
							<td><span>Deletar</span></td>
						</tr>
						
				";		
			while($linha = mysql_fetch_array($select)) {            // inicia o loop que vai mostrar todos os dados
				$idGrupo = $linha['idGrupo'];//Recebe idUsuario
				$permissao = $linha['idPermissao'];
				switch($permissao){
					case 1: $permissao = "Visualizar - Cadastrar - Alterar - Deletar";break;
					case 2: $permissao = "Visualizar - Cadastrar - Alterar";break;
					case 3: $permissao = "Visualizar";
				}
				echo"
						<tr>
							<td>".$linha['nomeGrupo']."</td>
							<td>".$linha['tipoGrupo']."</td>
							<td>".$permissao."</td>
							<td><span class='editar'><a href='../update/atuGrupo.php?idGrupo=$idGrupo'>Alterar</a></span></td>
							<td><span class='editar'><a href='../delete/delGrupo.php?idGrupo=$idGrupo'>Deletar</a></span></td>
						</tr>
					
				";
				
			}// fim do while
	}//Fim da primeira condição IF
		echo"</table></div>";

	}//#listar

	/*========================================================================*/
	// ATUALIZAR INFORMAÇÕES DA TABELA GRUPO
	/*========================================================================*/   
	public function update ()
	{  
		$update = ("UPDATE grupo SET nomeGrupo = '$this->nomeGrupo', tipoGrupo= '$this->tipoGrupo', idPermissao = '$this->permissao',
					WHERE idGrupo = '$this->idGrupo'");			
		$atualiza = mysql_query($update);
		include"../include/topo.php";
			if($atualiza){
				echo "
						<div class='mensagem'>
							<span>Dados Atualizados Com Sucesso!</span><br /> 
						</div>	
					";	
				echo '<meta http-equiv="refresh" content="5;URL=../visualizar/visGrupo.php" />';
			}	else{
				echo"
						<div class='mensagem'>
							<span>Ocorreu Um Erro ao Atualizar os Dados!</span><br />
							Dados sobre o erro:". mysql_error()."
						</div>	
					";
				
			}
			echo '<meta http-equiv="refresh" content="50;URL=../visualizar/visGrupo.php" />';
		include"../include/rodape.php";	
		
	}
}

	
	
    //unset($conexao);

?>
