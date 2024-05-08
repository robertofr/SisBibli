<?php
include("../sessao.php");
include"../include/topo.php";//Incluindo Topo
?>	
	 <div id="corpo">
	 <div class="identifica2"><h3>Cadastro de Livros<h3></div>
		<form action="transLivro.php" name="cadastro" method="post" enctype="multipart/form-data" onSubmit="return validacao();">
				<fieldset id="livro"> <legend>Dados Livro</legend>
					<p>
						 <label><b>Seleciona a Capa do Livro:</b>
						 <input type="file" name="capaLivro" id="capaLivro"></label>
					</p>
					<p>
						<label for="titulo">Titulo:</label>
						<input type="text" name="titulo" id="titulo" size="30" maxlength="30" placeholder=" Titulo"/>
					</p>
					<p>
						<label for="subtitulo">Subtitulo:</label>
						<input type="text" name="subtitulo" id="subtitulo" size="30" maxlength="30" placeholder=" Subtitulo">
					</p>
					<p>
						<label for="issn">ISBN:</label>
						<input type="text" name="issn" id="issn" placeholder="ISBN">
					</p>
					<p>
						<label for="dataPublicacao">Data Publicação:</label>
						<input type="date" name="dataPublicacao" id="dataPublicacao">
					</p>
					<p>
						<label for="dataAquisicao">Data Aquisição:</label>
							<input type="date" name="dataAquisicao" id="dataAquisicao">
					</p>
					<p>
						<label for="numExemplar">Números de Exemplares:</label>
						<input type="number" name="numExemplar" id="numExemplar">
					</p>
					<p>
						<label for="volume">Volume:</label>
							<input type="number" name="volume" id="volume">
					</p>
					<p>
						<label for="numPagina">Número de páginas:</label>
						<input type="number" name="numPagina" id="numPagina">
					</p>
					<p>
						<label for="areaConhecimento">Área de Conhecimento:</label>
						<input type="text" name="areaConhecimento" id="areaConhecimento" placeholder=" Área de Conhecimento">
					</p>
					<p>
						<label for="autor">Autores:</label>
						<input type="text" name="autor" id="autor" placeholder="Autores">
					</p>
					<p>
						Resumo:<br /><textarea id="resumo" name="resumo" rows="12" cols="80"  placeholder="Digite aqui o resumo do livro..."></textarea>
					</p>
					
				</fieldset> 
							
				<fieldset><legend>Dados Editora</legend> <!-- Dados Editora-->	
					<p>
						<label for="nomeEditora">Nome Editora:
						<input type="text" name="nomeEditora" id="nomeEditora" size="30" maxlength="30" placeholder="Nome Editora"></label>
					</p>
					<p>
						<label for="cnpj">CNPJ:
						<input type="text" name="cnpj" id="cnpj" size="30" maxlength="30" placeholder="CNPJ"></label>
					</p>
					<p>
						<label for="telefone">Telefone:
						<input type="text" name="telefone" id="telefone" size="30" maxlength="30" placeholder="Telefone"></label>
					</p>
					<p>
						<label for="endereco">Endereço:
						<input type="text" name="endereco" id="endereco" size="30" maxlength="50" placeholder="Endereço"></label>
					</p>
					<p>
						<label for="email">E-mail:
						<input type="email" name="email" id="email" size="30" maxlength="30" placeholder="E-mail"></label>
					</p>
					<p>
						<label for="site">Site:
						<input type="text" name="site" id="site" size="30" maxlength="30" placeholder="Site"></label>
					</p>	     
				</fieldset>
				<p>
						<input type="submit" id="enviar" name="enviar" value="Cadastrar" />
						<input type="reset"  id="limpar" name="limpar" value="Limpar"/><br /><br />
				</p>
				</fieldset>
		</form>
	  
    </div>

<?php
include"../include/rodape.php";//Incluindo Rodapé
?>

