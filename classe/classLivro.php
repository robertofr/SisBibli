<!--**************************************************************************************************
                                CLASSE LIVRO
***************************************************************************************************-->
<?php
include("../conect/conecta.php");// Conecta ao banco de dados
include("../conect/mysqlexecuta.php");// Executa a cláusula SQL
include("../include/erro.php");// Incluir Tratamento de erros

class classLivro
{
	/*Dados Livro*/
	public $idLivro;
    public $titulo;   
    public $subtitulo;
    public $issn; 
    public $dataPublicacao;
    public $dataAquisicao; 
	public $numExemplar;   
    public $volume;
    public $numPagina;
	public $areaConhecimento;
	public $autor;
	public $resumo;
	/*Dados Editora*/
	public $nomeEditora;   
    public $cnpj;
    public $telefone; 
    public $endereco;
    public $email;
	public $site; 
    public $capaLivro; 
	
	/*======================================================================== 
	INSERIR INFORMAÇÃO NA TABELA LIVRO
	========================================================================*/
		public function insert (){  
		// Recupera os dados dos campos
	$capaLivro = $_FILES["capaLivro"];
	
	// Se a foto estiver sido selecionada
	if (!empty($capaLivro["name"])) {
		
		// Largura máxima em pixels
		$largura = 3600;
		// Altura máxima em pixels
		$altura = 4320;
		// Tamanho máximo do arquivo em bytes
		$tamanho = 2000;

    	// Verifica se o arquivo é uma imagem
    	if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $capaLivro["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
		
		// Pega as dimensões da imagem
		$dimensoes = getimagesize($capaLivro["tmp_name"]);
	
		// Verifica se a largura da imagem é maior que a largura permitida
		if($dimensoes[0] > $largura) {
			$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
		}

		// Verifica se a altura da imagem é maior que a altura permitida
		if($dimensoes[1] > $altura) {
			$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		}
		
		// Verifica se o tamanho da imagem é maior que o tamanho permitido
		if($arquivo["size"] > $tamanho) {
   		 	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
		}

		// Se não houver nenhum erro
		if (count($error) == 0) {
		
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $capaLivro["name"], $ext);

        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];

        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "../img/capaLivro/" . $nome_imagem;

			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($capaLivro["tmp_name"], $caminho_imagem);
			
			$sql="INSERT INTO livro ( titulo, subtitulo, issn, dataPublicacao, dataAquisicao, numExemplar, volume, numPagina, areaConhecimento, autor, resumo, nomeEditora, cnpj, telefone, endereco, email, site, capaLivro) 
			VALUES ('$this->titulo', '$this->subtitulo', '$this->issn', '$this->dataPublicacao', '$this->dataAquisicao', '$this->numExemplar', '$this->volume', '$this->numPagina', '$this->areaConhecimento', '$this->autor',
			'$this->resumo', '$this->nomeEditora', '$this->cnpj', '$this->telefone', '$this->endereco', '$this->email', '$this->site', '$nome_imagem')";
			$res = mysqlexecuta($sql);
            
			include"../include/topo.php";
					if ($sql){ // Se os dados forem inseridos com sucesso
						echo "
								<div class='mensagem'>
									<span>Cadastro Efetuado com Sucesso!!!</span>
								</div>	
							";
					}else{
						echo"
								<div class='mensagem'>
									Ocorreu um erro ao realizar o cadastro!
								</div>	
							";
					}
	
		
					$url = '../visualizar/visLivroCadastrado.php';
						echo '
							<meta http-equiv=refresh content="2;URL='.$url.'" />
						';
		}	
			include"../include/rodape.php";	
		
			/* $url = '../visualizar/visLivroCadastrado.php';//Retorna para a pagina visualizar livros cadastrados
			echo '
				<meta http-equiv=refresh content="2;URL='.$url.'" />
			'; */
				
	} 
}//#insert()
	/*========================================================================*/ 
	// LISTA INFORMAÇÃO DA TABELA LIVRO
	/*========================================================================*/
	public function listar ()
	{
		if(!isset($_REQUEST['buscar'])){//Primeira condição se NÃO existir o REQUEST buscar entrar nesta condição	
			$select = mysql_query("SELECT idLivro, titulo, subtitulo, issn, autor, resumo, nomeEditora, capaLivro
							   FROM  livro");			
			
			echo"
				<div class='resultado'>
					<table border='1'>
							<tr border='0'>
								<td colspan='3'>
									<span class='editar'><a href='../pagCad/cadLivro.php'> Novo Livro </a></span>
								</td>
								<td colspan='5'>
									<form action='' method='get'>
										<input type='text' name='busca' size='20' placeholder='Titulo ou ISBN' >
										<input type='submit' value='Buscar' name='buscar'>
										<input type='submit' value='Lista Todos' name='buscar'>
									</form>	
								</td>
								
							</tr>
							<tr class='title'>
								<td><span>Título</span></td>
								<td><span>Subtitulo</span></td>
								<td><span>ISBN</span></td>
								<td><span>Autor</span></td>							
								<td><span>Nome Editora</span></td>							
								<td><span>Visualizar</span></td>
								<td><span>Alterar</span></td>
								<td><span>Deletar</span></td>
							</tr>
						
				";		
			while($linha = mysql_fetch_array($select)) {            // inicia o loop que vai mostrar todos os dados
				$idLivro = $linha['idLivro'];//Recebe idLivro
				echo"
				
						<tr>
							<td>".$linha['titulo']."</td>
							<td>".$linha['subtitulo']."</td>
							<td>".$linha['issn']."</td>
							<td>".$linha['autor']."</td>
							<td>".$linha['nomeEditora']."</td>
							<td><span class='editar'><a href='../visualizar/visLivroEsp.php?idLivro=$idLivro'>Visualizar</a></span></td>
							<td><span class='editar'><a href='../update/atuLivro.php?idLivro=$idLivro'>Alterar</a></span></td>
							<td><span class='editar'><a href='../delete/delLivro.php?idLivro=$idLivro']'>Deletar</a></span></td>
						</tr>
					
				";
			
			}// fim do while
		}//fim da Primeira condição IF	
		$buscar = $_REQUEST['busca'];// Recebe do formulario acima o valor repassado pelo metodo Get
		if(isset($_REQUEST['buscar'])){// Segunda condição se houver REQUEST buscar entra nesta condição e lista o livro solicitado 
			$select = mysql_query("SELECT idLivro, titulo, subtitulo, issn, autor, resumo, nomeEditora, capaLivro
							   FROM  livro WHERE titulo LIKE '%$buscar%' OR issn LIKE '%$buscar'");	
		
		echo"
			<div class='resultado'>
				<table border='1'>
						<tr border='0'>
							<td colspan='5'>
								<span class='editar'><a href='../pagCad/cadLivro.php'> Novo Livro </a></span>
							</td>
							<td colspan='3'>
								<form action='' method='get'>
									<input type='text' name='busca' size='20' placeholder='Titulo ou ISSN'>
									<input type='submit' value='Buscar' name='buscar'>
									<input type='submit' value='Lista Todos' name='buscar'>
								</form>	
							</td>
							
						</tr>
						<tr class='title'>
							<td><span>Título</span></td>
							<td><span>Subtitulo</span></td>
							<td><span>ISSN</span></td>
							<td><span>Autor</span></td>							
							<td><span>Nome Editora</span></td>							
							<td><span>Visualizar</span></td>
							<td><span>Alterar</span></td>
							<td><span>Deletar</span></td>
						</tr>
					
			";							   
		while($linha = mysql_fetch_array($select)) {            // inicia o loop que vai mostrar todos os dados
			$idLivro = $linha['idLivro'];//Recebe idLivro
			echo"
			
					<tr>
						<td>".$linha['titulo']."</td>
						<td>".$linha['subtitulo']."</td>
						<td>".$linha['issn']."</td>
						<td>".$linha['autor']."</td>
						<td>".$linha['nomeEditora']."</td>
						<td><span class='editar'><a href='../visualizar/visLivroEsp.php?idLivro=$idLivro'>Visualizar</a></span></td>
						<td><span class='editar'><a href='../update/atuLivro.php?idLivro=$idLivro'>Alterar</a></span></td>
						<td><span class='editar'><a href='../delete/delLivro.php?idLivro=$idLivro']'>Deletar</a></span></td>
					</tr>
				
			";					   
		}	
		}//Fim da Segunda Condição IF
			echo"</table></div>";
		
	}//# listar()
	
	/*========================================================================*/ 
	// LISTA INFORMAÇÃO DE LIVRO ESPECIFICO
	/*========================================================================*/
	public function listarEspecifico ()
	{
		$select = mysql_query("SELECT * FROM  livro WHERE idLivro = '$this->idLivro'");
		$linha = mysql_fetch_array($select);//atribui o array recebido a variavel $linha										
		$idLivro = $linha['idLivro'];//Recebe idLivro
			
			echo"
				<form>
				<fieldset> <legend>Dados Livro</legend>
				<table border='1' class='table'>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td>
						<span class='editar'><a href='../visualizar/visLivroCadastrado.php'>Voltar</a></span>
						<span class='editar'><a href='../update/atuLivro.php?idLivro=$idLivro'>Alterar</a></span>
						<span class='editar'><a href='../delete/delLivro.php?idLivro=$idLivro'>Deletar</a></span>
					</td>
				</tr>
				<tr>
					<td rowspan='4'>
						<img src='../img/capaLivro/".$linha['capaLivro']."' alt='".$linha['titulo']."'/ class='foto'>	
					</td> 
					<td><span>Titulo:</span>".$linha['titulo']."</td>
					<td><span>Subtitulo:</span>".$linha['subtitulo']."</td>
					<td><span>ISBN:</span>".$linha['issn']."</td>
				</tr>	
				<tr>
					<td><span>Data Publicação:</span>".$linha['dataPublicacao']."</td>
					<td><span>Data Aquisição:</span>".$linha['dataAquisicao']."</td>
					<td></td>
				</tr>	
				<tr>
					<td><span>Números de Exemplares:</span>".$linha['numExemplar']."</td>
					<td><span>Volume:</span>".$linha['volume']."</td>
					<td><span>Número de páginas:</span>".$linha['numPagina']."</td>
				</tr>
				<tr>		
					<td><span>Área de Conhecimento:</span>".$linha['areaConhecimento']."</td>
					<td><span>Autor(es):</span>".$linha['autor']."</td>
					<td></td>
				</tr>	
				<tr>
					<td><span>Resumo:</span></td> <td colspan='4' rowspan='4'>".$linha['resumo']."</td>
				</tr>	
				</table>	
				</fieldset> 
							
				<fieldset><legend>Dados Editora</legend> <!-- Dados Editora-->	
				<table border='1' class='table'>
				<tr>
					<td><span>Nome Editora:</span>".$linha['nomeEditora']."</td>
					<td><span>CNPJ:</span>".$linha['cnpj']."</td>
				</tr>
				<tr>
					<td><span>Telefone:</span>".$linha['telefone']."</td>
					<td><span>Endereço:</span>".$linha['endereco']."</td>
				</tr>
				<tr>
					<td><span>E-mail:</span>".$linha['email']."</td>
					<td><span>Site:</span><a href=".$linha['site']." target='_blank'>".$linha['site']."</a></td>   
				</tr>		
				</table>	
				</fieldset>
				
		</form>
			";	
		
	}//# listar()

	/*========================================================================*/
	// ATUALIZA INFORMAÇÕES DA TABELA LIVRO
	/*========================================================================*/   
	
	public function update()
	{  
		
		$update = ("UPDATE livro SET titulo = '$this->titulo', subtitulo = '$this->subtitulo', issn = '$this->issn', dataPublicacao = '$this->dataPublicacao', dataAquisicao= '$this->dataAquisicao', 
			numExemplar = '$this->numExemplar', volume = '$this->volume', numPagina = '$this->numPagina', areaConhecimento = '$this->areaConhecimento', autor = '$this->autor', resumo = '$this->resumo',
			nomeEditora = '$this->nomeEditora',cnpj = '$this->cnpj', telefone = '$this->telefone',endereco = '$this->endereco',email = '$this->email', site = '$this->site'
			WHERE idLivro = '$this->idLivro'");
		$atualiza = mysql_query($update);
		include"../include/topo.php";
			if($atualiza){
				echo "
						<div class='mensagem'>
							<span>Dados Atualizados Com Sucesso!</span><br /> 
						</div>	
					";
				//printf ("Registros atualizados: %d\n", mysql_affected_rows());
				echo '<meta http-equiv="refresh" content="5;URL=../visualizar/visLivroCadastrado.php" />';
			}else{
				echo"Ocorreu Um Erro ao Atualizar os Dados!<br />";
				//printf("Registros atualizados: %d\n", mysql_affected_rows());
				
			}
				$url = '../visualizar/visLivroCadastrado.php';
				echo '
					<meta http-equiv=refresh content="2;URL='.$url.'" />
				';
		include "../include/rodape.php";	
	}
	/*========================================================================*/
	// DELETA INFORMAÇÕES DA TABELA LIVRO
	/*========================================================================*/   
	
	public function deletar()
	{
		$select = mysql_query("SELECT titulo FROM livro WHERE idLivro = '$this->idLivro'");
		$linha = mysql_fetch_array($select);
		
		$query = "DELETE FROM livro WHERE idLivro = '$this->idLivro'";// Montamos a consulta SQL para deletar notícias que não sejam desse ano
		
		$deletar = mysql_query($query);// Executa a query
		include "../include/topo.php";
			if ($deletar){
					//Exibe Mensagem se deletado
					echo "
						<div class='mensagem'>
							<span>O Livro ".$linha['titulo']." foi deletado com sucesso!</span>
						</div>
					";
			} else {
				//Exibe Mensagem se não for possivel deletar e Exibe dados sobre o erro:
				echo "
					<div class='mensagem'>
						<span>Não foi possível deletar o livro".$linha['titulo'].", Porque Ainda esta Cadastrado como Emprestado a um Usuario.</span><br />
						Dados sobre o erro: ".mysql_error()."
					</div>
					";
			}
			  $url = '../visualizar/visLivroCadastrado.php';
				echo '
					<meta http-equiv=refresh content="2;URL='.$url.'" />
				';  
		include "../include/rodape.php";	
	}//#deletar()

}//#classe
	
//unset($conexao);

?>
