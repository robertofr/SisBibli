<!--**************************************************************************************************
                                CLASSE GRUPO
***************************************************************************************************-->
<?php
include ("../conect/conecta.php"); // Conecta ao banco de dados
include ("../conect/mysqlexecuta.php");// Executa a clausula SQL
include("../include/erro.php");// Incluir Tratamento de erros

class classAcervo
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
	public $pesquisa; 

	/*========================================================================*/ 
	// LISTA INFORMAÇÕES DA TABELA GRUPO
	/*========================================================================*/
	public function listarAcervo() //Lista todos os Usuarios cadastrados na pagina visualizar Usuarios cadastrados
	{	
		$pesquisa = $_REQUEST['pesquisa'];
			$select = mysql_query("SELECT idLivro, titulo, subtitulo, issn, autor, resumo, nomeEditora, capaLivro
							   FROM  livro WHERE titulo LIKE '%$pesquisa%' OR issn LIKE '%$pesquisa'");	

		echo"
			<div class='resultado'>
				<table border='1'>
						<tr class='title'>
							<td><span>Título</span></td>
							<td><span>Subtitulo</span></td>
							<td><span>ISBN</span></td>
							<td><span>Autor</span></td>							
							<td><span>Nome Editora</span></td>							
							<td><span>Visualizar</span></td>
						</tr>
					
			";							   
		while($linha = mysql_fetch_array($select)) {            // inicia o loop que vai mostrar todos os dados
			$idLivro = $linha['idLivro'];
			echo"
			
					<tr>
						<td>".$linha['titulo']."</td>
						<td>".$linha['subtitulo']."</td>
						<td>".$linha['issn']."</td>
						<td>".$linha['autor']."</td>
						<td>".$linha['nomeEditora']."</td>
						<td><span class='editar'><a href='../visualizar/visLivroConsulta.php?idLivro=$idLivro'>Visualizar</a></span></td>
					</tr>
				
			";					   
		}	
		echo"</table></div>";
		
	}

/*========================================================================*/ 
// LISTA INFORMAÇÃO DE LIVRO ESPECIFICO
/*========================================================================*/
	public function listarEspecifico ()
	{	
		$this->idLivro = $_REQUEST['idLivro'];
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
						<span class='editar'><a href='../visualizar/visAcervo.php'>Voltar</a></span>
						<span class='editar'><a href='../pagCad/cadReservar.php?idLivro=$idLivro''>Reservar</a></span>
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
					<td>
						
						<span>Status:</span>Disponível
					</td>
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
// FUNÇÃO RESERVAR
/*========================================================================*/
	public function reservar ()
	{	
		$this->idLivro = $_REQUEST['idLivro'];
		$select = mysql_query("SELECT * FROM  livro WHERE idLivro = '$this->idLivro'");
		$linha = mysql_fetch_array($select);//atribui o array recebido a variavel $linha										
		$idLivro = $linha['idLivro'];//Recebe idLivro
			echo"
				<form>
				<fieldset> <legend>Dados da Reserva</legend>
				<table border='1' class='table'>
				<tr>
					
					<td colspan='4'>
						<span class='editar1'><a href='../visualizar/visLivroConsulta.php?idLivro=$idLivro''>Voltar</a></span>
					</td>
				</tr>
				<tr>
					<td rowspan='4'>
						<img src='../img/capaLivro/".$linha['capaLivro']."' alt='".$linha['titulo']."'/ class='foto'>	
					</td> 
					<td colspan='4'>
						<span>Titulo:</span>".$linha['titulo']."&nbsp;&nbsp;&nbsp;&nbsp;
						<span>Subtitulo:</span>".$linha['subtitulo']."&nbsp;&nbsp;&nbsp;&nbsp;
						<span>ISBN:</span>".$linha['issn']."&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					
				</tr>	
					<td colspan='4'><span>
						<label for='nome'>Nome do Reservante:</label>
							<input type='text' name='nome' id='nome' size='30' placeholder='Nome do Reservante'>
						<label for='matricula'>Matrícula:</label>
							<input type='text' name='matricula' id='matricula' size='30' placeholder='Matrícula' >
							
							<input type='submit' id='reservar' name='reservar' value='Reservar' />
					</span></td>
					
				<tr>
					
				</tr>	
				</table>	
				</fieldset> 
				
		</form>
			";	
		
	}//# Reservar()	
/*========================================================================*/ 
// CADASTRA RESERVA
/*========================================================================*/
	public function cadReservar ()
	{	
		$this->idLivro = $_REQUEST['idLivro'];
		$select = mysql_query("SELECT * FROM  livro WHERE idLivro = '$this->idLivro'");
		$linha = mysql_fetch_array($select);//atribui o array recebido a variavel $linha										
		$idLivro = $linha['idLivro'];//Recebe idLivro
			echo"
				<form>
				<fieldset> <legend>Dados da Reserva</legend>
				<table border='1' class='table'>
				<tr>
					
					<td colspan='4'>
						<span class='editar1'><a href='../visualizar/visLivroConsulta.php?idLivro=$idLivro''>Voltar</a></span>
					</td>
				</tr>
				<tr>
					<td rowspan='4'>
						<img src='../img/capaLivro/".$linha['capaLivro']."' alt='".$linha['titulo']."'/ class='foto'>	
					</td> 
					<td colspan='4'>
						<span>Titulo:</span>".$linha['titulo']."&nbsp;&nbsp;&nbsp;&nbsp;
						<span>Subtitulo:</span>".$linha['subtitulo']."&nbsp;&nbsp;&nbsp;&nbsp;
						<span>ISBN:</span>".$linha['issn']."&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					
				</tr>	
					<td colspan='4'><span>
						<label for='nome'>Nome do Reservante:</label>
							<input type='text' name='nome' id='nome' size='30' placeholder='Nome do Reservante'>
						<label for='matricula'>Matrícula:</label>
							<input type='text' name='matricula' id='matricula' size='30' placeholder='Matrícula' >
							
							<input type='submit' id='reservar' name='reservar' value='Reservar' />
					</span></td>
					
				<tr>
					
				</tr>	
				</table>	
				</fieldset> 
				
		</form>
			";	
		
	}//# Reservar()			
}
?>
