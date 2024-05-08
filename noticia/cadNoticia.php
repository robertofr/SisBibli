<?php
include("../sessao.php");
include "../include/topo.php";
?>


<div class="identifica2"><h3>Cadastro de Notícias<h3></div>
<form action="transNoticia.php" method="post" enctype="multipart/form-data">
	<fieldset> <legend>Cadastro de Notícias</legend>
		<p>
		   <label for="titulo">Título:</label>
		   <input type="text" name="titulo" id="titulo" size="70" placeholder="Título">
		</p>
		
		<p>
			<label for="resumo">Resumo:</label>
			<textarea name="resumo" id="resumo" rows="5" cols="130" placeholder="Resumo da Notícia..."></textarea>
		</p>
		
		<p>
			<label>Selecione uma imagem:</label>
			<input type="file" name="foto" id="foto"><br />
		</p>
		
		<p>
			<label for="texto">Texto:</label>
			<textarea name="texto" id="texto" rows="30" cols="130" placeholder="Texto da Notícia..."></textarea>	
		</p>
		
		<p>
			<input type="submit" name="cadastrar" id="cadastrar" value="Cadastrar">
			<input type="reset" value="Limpar">
		</p>
			
	</fieldset>
</form>
<?php
include "../include/rodape.php";
?>