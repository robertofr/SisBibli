<?php

// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID'])) {
  // Destrói a sessão por segurança
  session_destroy();
  // Redireciona o visitante de volta pro login
  header("Location: index.php"); exit;
}
include "include/topoIndex.php";//Incluindo Topo
include("include/erro.php");
include("conect/conecta.php");//Abrindo Conecxão com o Banco de dados

	
?>
<div id="corpo">
	<?php 
		include "include/aside.php";
		$select = mysql_query ("SELECT * FROM noticia ORDER BY idNoticia DESC");
		
		while($linha = mysql_fetch_array($select)) {            // inicia o loop que vai mostrar todos os dados
				$idNoticia = $linha['idNoticia'];//Recebe idNoticia
				echo"
					<div id='noticia'>
						<span class='editar1'><a href='noticia/delNoticia.php?idNoticia=$idNoticia'>Deletar</a></span>
						<span class='editar1'><a href='noticia/atuNoticia.php?idNoticia=$idNoticia'>Editar</a></span>
						<h1><a href='noticia/visNoticiaEspAdm.php?idNoticia=$idNoticia'>".$linha['titulo']."</a></h1>
						<span class='datahora'>Publicado : ".$linha['dataHora']."</span>
						<a href='noticia/visNoticiaEspAdm.php?idNoticia=$idNoticia'><img src='img/imgNoticia/".$linha['foto']."'/></a>
						<p>
							".$linha['resumo']."
							<div class='cont'><a href='noticia/visNoticiaEspAdm.php?idNoticia=$idNoticia'>Continue Lendo...</a></div>
							
						</p>
						
					</div>
									
				";
			
		}// fim do while
		include "include/rodape.php";
	?>
	
	
</div>