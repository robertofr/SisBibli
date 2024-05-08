
 <html lang="pt-br">
    <head>
      <meta charset="UTF-8"/>  
	  <title>Livro</title>
	  <link rel="stylesheet" type="text/css" href="../css/estyles.css">
	
    </head>
	
   <body>	
	   <div id="interface">
	   <div id="topo">
	
	     <hgroup id="logo">
		   <a href="../index.php">
		   <h1> <img src="../img/livro.png"/> Sistema Bibliotecario</h1>
		     <h2> Versão 1.0</h2>
			 </a>
		 </hgroup>
		 <nav id="menu">
			<ul>
				<li><a href="../index.php">Inicio</a></li>
				<li><a href="usuario.php">Usuário</a></li>
				<li><a href="livro.php">Livro</a></li>
				<li><a href="emprestimo.php">Emprestimo</a></li>
			</ul>
		 </nav>
	  
	  
	   </div>
	
	    <div id="corpo">
			<form action="../pagCad/cadLivro.php" method="get">
				<fieldset id="livro"> <legend>Dados Livro</legend>
					<p><label for="titulo">Titulo:</label><input type="text" name="titulo" id="titulo" size="30" maxlength="30" placeholder=" Titulo"/></p>
					<p><label for="subtitulo">Subtitulo:</label><input type="text" name="subtitulo" id="subtitulo" size="30" maxlength="30" placeholder=" Subtitulo"></p>
					<p><label for="issn">ISSN:</label><input type="text" name="issn" id="issn" placeholder="ISSN"></p>
					<p><label for="dataPublicacao">Data Publicação:</label><input type="date" name="dataPublicacao" id="dataPublicacao"></p>
					<p><label for="dataAquisicao">Data Aquisição:</label><input type="date" name="dataAquisicao" id="dataAquisicao"></p>
					<p><label for="numExemplar">Números de Exemplares:</label><input type="number" name="numExemplar" id="numExemplar"></p>
					<p><label for="volume">Volume:</label><input type="number" name="volume" id="volume"></p>
					<p><label for="numPagina">Número de páginas:</label><input type="number" name="numPagina" id="numPagina"></p>
					<p><label for="areaConhecimento">Área de Conhecimento:</label><input type="text" name="areaConhecimento" id="areaConhecimento" placeholder=" Área de Conhecimento"></p>
					<p>
						<label for="editora">Editora:</label>
						<select name="editora">
							<option value="">Selecione a Editora</option> 
						</select>
					</p
					<p>
						<label for="autor">Autor:</label>
						<select name="autor">
							<option value="">Selecione o Autor</option> 
						</select>
					</p>
					<p>Resumo:<br /><textarea id="resumo" name="resumo" rows="12" cols="80"  placeholder="Digite aqui o resumo do livro..."></textarea></p>
					
					<input type="submit" id="enviar" name="enviar" value="Cadastrar" />
					<input type="reset"  value="Limpar"/><br /><br />
				</fieldset> 
			</form>
	  
	   </div>
	
	   <div id="rodape">
	
	     Sistema Bibliotecario 2014. Todos os Direitos Reservados
	 
	    </div>
	
	</div>
  </body>
</html>

