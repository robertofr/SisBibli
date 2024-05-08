<!--**************************************************************************************************
                                CLASSE NOTICIA
***************************************************************************************************-->
<?php
include ("../conect/conecta.php"); // Conecta ao banco de dados
include ("../conect/mysqlexecuta.php");// Executa a clausula SQL
include("../include/erro.php");// Incluir Tratamento de erros
date_default_timezone_set('America/Sao_Paulo');//Definir o servidor de horario
class classNoticia
{
	public $idNoticia;
	public $titulo;
	public $resumo;
	public $texto;
	public $foto;
	
	/*======================================================================== 
	INSERIR INFORMAÇÃO NA TABELA LIVRO
	========================================================================*/
	public function insert(){
		
	 // Recupera os dados dos campos
	$foto = $_FILES["foto"];
	
	// Se a foto estiver sido selecionada
	if (!empty($foto["name"])) {
		
		// Largura máxima em pixels
		$largura = 2000;
		// Altura máxima em pixels
		$altura = 2000;
		// Tamanho máximo do arquivo em bytes
		$tamanho = 2000;

    	// Verifica se o arquivo é uma imagem
    	if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $foto["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
		
		// Pega as dimensões da imagem
		$dimensoes = getimagesize($foto["tmp_name"]);
	
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
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];

        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "../img/imgNoticia/" . $nome_imagem;

			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);
			
			//Data e Horario de Publicação
			$dataHora = date('Y-m-d H:i:s');
			$dataHora .= ' Horario:'.date('H:i:s');
			
			$sql="INSERT INTO noticia( titulo, resumo, texto, dataHora, foto) 
			VALUES ('$this->titulo', '$this->resumo', '$this->texto', '$dataHora', '$nome_imagem')";
			$res = mysqlexecuta($sql);
            
			include"../include/topo.php";
					if ($sql){ // Se os dados forem inseridos com sucesso
						echo "
								<div class='mensagem'>
									<span>Notícia cadastrada sucesso!!!$this->titulo</span>
								</div>	
							";
					}else{
						echo"
								<div class='mensagem'>
									Ocorreu um erro ao cadastrar a notícia!
								</div>	
							";
					}
	
		
					/*$url = '../visualizar/visLivroCadastrado.php';
						echo '
							<meta http-equiv=refresh content="2;URL='.$url.'" />
						';*/
		}	
			echo '<meta http-equiv="refresh" content="5;URL=../index2.php" />';
			include"../include/rodape.php";	
		
			
				
	}//Fim do IF 	
		
	}//# Fim função insert
	
	/*======================================================================== 
	LISTA AS NOTICIAS DA TABELA NOTICIAS
	========================================================================*/
	public function listarNoticias(){
		
		$select = mysql_query ("SELECT * FROM noticia ORDER BY idNoticia DESC");
		
		while($linha = mysql_fetch_array($select)) {            // inicia o loop que vai mostrar todos os dados
				$idNoticia = $linha['idNoticia'];//Recebe idNoticia
				echo"
					<div id='noticia'>
						<h1><a href='visNoticiaEsp.php?idNoticia=$idNoticia'>".$linha['titulo']."</a></h1>
						<span class='datahora'>Publicado : ".$linha['dataHora']."</span>
						<a href='visNoticiaEsp.php?idNoticia=$idNoticia'><img src='../img/imgNoticia/".$linha['foto']."'/></a>
						<p>
							".$linha['resumo']."
							<div class='cont'><a href='visNoticiaEsp.php?idNoticia=$idNoticia'>Continue Lendo...</a></div>
							
						</p>
						
					</div>
									
				";
			
		}// fim do while
	}//FIm do Função Listar Noticias
	
	/*======================================================================== 
	LISTA AS NOTICIAS DA TABELA NOTICIAS ADMINISTRADOR
	========================================================================*/
	public function listarNoticiasAdm(){
		
		$select = mysql_query ("SELECT * FROM noticia ORDER BY idNoticia DESC");
		
		while($linha = mysql_fetch_array($select)) {            // inicia o loop que vai mostrar todos os dados
				$idNoticia = $linha['idNoticia'];//Recebe idNoticia
				echo"
					<h1>Notícias</h1>
					<div id='noticia'>
						<span class='editar1'><a href='noticia/delNoticia.php?idNoticia=$idNoticia'>Deletar</a></span>
						<span class='editar1'><a href='noticia/atuNoticia.php?idNoticia=$idNoticia'>Editar</a></span>
						<h1><a href='noticia/visNoticiaEsp.php?idNoticia=$idNoticia'>".$linha['titulo']."</a></h1>
						<span class='datahora'>Publicado : ".$linha['dataHora']."</span>
						<a href='noticia/visNoticiaEspAdm.php?idNoticia=$idNoticia'><img src='img/imgNoticia/".$linha['foto']."'/></a>
						<p>
							".$linha['resumo']."
							<div class='cont'><a href='noticia/visNoticiaEsp.php?idNoticia=$idNoticia'>Continue Lendo...</a></div>
							
						</p>
						
					</div>
									
				";
			
		}// fim do while
	}//FIm do Função Listar Noticias
	
	
	/*======================================================================== 
	 LISTA NOTICIA ESPECIFICA 
	========================================================================*/
	public function listarNoticiasEsp(){

		$select = mysql_query ("SELECT * FROM noticia WHERE idNoticia = $this->idNoticia");
		$linha = mysql_fetch_array($select);
		$idNoticia = $linha['idNoticia'];//Recebe idNoticia
		
			echo"
				<div id='noticiaEsp'>
						<h1><a href=''>".$linha['titulo']."</a> <br /><span class='datahora'>Publicado : ".$linha['dataHora']."</span></h1>
						<img src='../img/imgNoticia/".$linha['foto']."'/>
						<p>".nl2br($linha['texto'])."	</p>
						
				</div>
			";
		
	}//#Fim da Função Lista Especifico
	
	/*======================================================================== 
	 LISTA NOTICIA ESPECIFICA ADM
	========================================================================*/
	public function listarNoticiasEspAdm(){

		$select = mysql_query ("SELECT * FROM noticia WHERE idNoticia = $this->idNoticia");
		$linha = mysql_fetch_array($select);
		$idNoticia = $linha['idNoticia'];//Recebe idNoticia
		
			echo"
				<div id='noticiaEsp'>
						<span class='editar1'><a href='delNoticia.php?idNoticia=$idNoticia'>Deletar</a></span>
						<span class='editar1'><a href='atuNoticia.php?idNoticia=$idNoticia'>Editar</a></span>
						<h1><a href=''>".$linha['titulo']."</a> <br /><span class='datahora'>Publicado : ".$linha['dataHora']."</span></h1>
						<img src='../img/imgNoticia/".$linha['foto']."'/>
						<p>".nl2br($linha['texto'])."	</p>
						
				</div>
			";
		
	}//#Fim da Função Lista Especifico
	
	/*========================================================================*/
	// ATUALIZAR INFORMAÇÕES DA TABELA GRUPO
	/*========================================================================*/   
	public function update ()
	{  
		//Data e Horario de Publicação
			$dataHora = date('Y-m-d H:i:s');
			$dataHora .= ' Horario:'.date('H:i:s');
		$select = mysql_query("SELECT * FROM noticia WHERE idNoticia = $this->idNoticia");
		$linha = mysql_fetch_array($select);
		$update = ("UPDATE noticia SET titulo = '$this->titulo', resumo = '$this->resumo', texto = '$this->texto'
					WHERE idNoticia = '$this->idNoticia'");			
		$atualiza = mysql_query($update);
		include"../include/topo.php";
			if($atualiza){
				echo "
						<div class='mensagem'>
			<span>Notícia \" ".$linha['titulo']." \" Atualizada Com Sucesso!  </span><br /> 
						</div>	
					";	
			}	else{
				echo"
						<div class='mensagem'>
							<span>Ocorreu Um Erro ao Atualizar o Notícia!</span><br />
							Dados sobre o erro:". mysql_error()."
						</div>	
					";
				
			}
			echo '<meta http-equiv="refresh" content="5;URL=../index2.php" />';
		include"../include/rodape.php";	
		
	}
	
	/*========================================================================*/
	// DELETAR NOTICIA
	/*========================================================================*/ 
	public function deletar()
	{
		$select = mysql_query("SELECT titulo FROM noticia WHERE idNoticia = '$this->idNoticia'");
		$linha = mysql_fetch_array($select);
		
		$query = "DELETE FROM noticia WHERE idNoticia = '$this->idNoticia'";// Montamos a consulta SQL para deletar o Noticia
		
		$deletar = mysql_query($query);// Executa a query
		include"../include/topo.php";
			if ($deletar){
			echo "
					<div class='mensagem'>
						<span>A Notícia ".$linha['titulo']." foi deletada com sucesso!</span>
					</div>	
				";
			} else {
			echo "
					<div class='mensagem'>
						<span>Não foi possível deletar a Notícia ".$linha['titulo']."</span><br />
						Dados sobre o erro:". mysql_error()."
					</div>
					";
			
			
			}
			$url = '../index2.php';
				echo '
					<meta http-equiv=refresh content="5;URL='.$url.'" />
				';
		include"../include/rodape.php";		
	}
}//#Fim da Classe Noticia	