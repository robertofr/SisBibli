<?php
include("../sessao.php");
include("../classe/classLivro.php");
include"../include/topo.php";
$liv = new classLivro();
$idLivro = $_REQUEST['idLivro'];
$select = mysql_query("SELECT * FROM livro WHERE idLivro = '$idLivro'");
$linha = mysql_fetch_array($select);
		
?>

	    <div id="corpo">
			<form action="../pagCad/transLivro.php" method="post" enctype="multipart/form-data">
				<fieldset id="livro"> <legend>Dados Livro</legend>
				<div class='foto'>
					<?php
					echo"	
						<img src='../img/capaLivro/".$linha['capaLivro']."' alt='$linha[titulo]'/>		
						";	
					?>
				</div>
					
					<input type=hidden name="idLivro" value="<?php echo $linha['idLivro']?>">
					<!--<p><label><b>Seleciona a Capa do Livro:</b> <input type="file" name="foto" id="foto"></label></p>-->
					<p><label for="titulo">Titulo:</label><input type="text" name="titulo" id="titulo" size="30" maxlength="30" placeholder=" Titulo" value="<?php echo $linha['titulo']?>"/></p>
					<p><label for="subtitulo">Subtitulo:</label><input type="text" name="subtitulo" id="subtitulo" size="30" maxlength="30" placeholder=" Subtitulo" value="<?php echo $linha['subtitulo']?>"></p>
					<p><label for="issn">ISBN:</label><input type="text" name="issn" id="issn" placeholder="ISSN" value="<?php echo $linha['issn']?>"></p>
					<p><label for="dataPublicacao">Data Publicação:</label><input type="date" name="dataPublicacao" id="dataPublicacao" value="<?php echo $linha['dataPublicacao']?>"></p>
					<p><label for="dataAquisicao">Data Aquisição:</label><input type="date" name="dataAquisicao" id="dataAquisicao" value="<?php echo $linha['dataAquisicao']?>"></p>
					<p><label for="numExemplar">Números de Exemplares:</label><input type="number" name="numExemplar" id="numExemplar" value="<?php echo $linha['numExemplar']?>"></p>
					<p><label for="volume">Volume:</label><input type="number" name="volume" id="volume" value="<?php echo $linha['volume']?>"></p>
					<p><label for="numPagina">Número de páginas:</label><input type="number" name="numPagina" id="numPagina" value="<?php echo $linha['numPagina']?>"></p>
					<p><label for="areaConhecimento">Área de Conhecimento:</label><input type="text" name="areaConhecimento" id="areaConhecimento" placeholder=" Área de Conhecimento" value="<?php echo $linha['areaConhecimento']?>"></p>
					<p>
						<label for="autor">Autores:</label><input type="text" name="autor" id="autor" placeholder="Autores" value="<?php echo $linha['autor']?>">
					</p>
					<p>Resumo:<br /><textarea id="resumo" name="resumo" rows="12" cols="80" ><?php echo $linha['resumo']?></textarea></p>
					
				</fieldset> 
				<!-- Dados Editora-->				
				<fieldset><legend>Dados Editora</legend>
					<p><label for="nomeEditora">Nome Editora:<input type="text" name="nomeEditora" id="nomeEditora" size="30" maxlength="30" placeholder="Nome Editora" value="<?php echo $linha['nomeEditora']?>"></label></p>
					<p><label for="cnpj">CNPJ:<input type="text" name="cnpj" id="cnpj" size="30" maxlength="30" placeholder="CNPJ" value="<?php echo $linha['cnpj']?>"></label></p>
					<p><label for="telefone">Telefone:<input type="text" name="telefone" id="telefone" size="30" maxlength="30" placeholder="Telefone" value="<?php echo $linha['telefone']?>"></label></p>
					<p><label for="endereco">Endereço:<input type="text" name="endereco" id="endereco" size="30" maxlength="50" placeholder="Endereço" value="<?php echo $linha['endereco']?>"></label></p>
					<p><label for="email">E-mail:<input type="email" name="email" id="email" size="30" maxlength="30" placeholder="E-mail" value="<?php echo $linha['email']?>"></label></p>
					<p><label for="site">Site:<input type="text" name="site" id="site" size="30" maxlength="30" placeholder="Site" value="<?php echo $linha['site']?>"></label></p>	     
					
				</fieldset>
				<p>
						<input type="submit" id="atualizar" name="atualizar" value="Atualizar" />
						<input type="submit" id="cancelar" name="cancelar" value="Cancelar" />
						
				</p>
				</fieldset>
			</form>
	  
	   </div>
	   <?php
		include"../include/rodape.php";
	   ?>
	
	</div>
  </body>
</html>

