
 <html lang="pt-br">
    <head>
      <meta charset="UTF-8"/>  
	  <title>Grupo</title>
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
		
			<form action="cadGrupo.php" method="get">
					<fieldset id="grupo"> <legend>Grupo</legend>
						<p><label for="nome">Nome Grupo:<input type="text" name="nome" id="nome" size="30" maxlength="30" placeholder="Nome Grupo"></label></p>
						<p><label for="tipoGrupo">Tipo Grupo:<input type="text" name="tipoGrupo" id="tipoGrupo" size="30" maxlength="30" placeholder="Tipo Grupo"></label></p>
					</fieldset>
					<fieldset id="grupo"> <legend>Permissões</legend>
						<p><input type="checkbox" name="cadastrar" id="cadastrar"> <label for="cadastrar">Cadastrar</label></p>
						<p><input type="checkbox" name="visualizar" id="visualizar" checked> <label for="visualizar">Visualizar</label></p>
						<p><input type="checkbox" name="alterar" id="alterar"> <label for="alterar">Alterar</label></p>
						<p><input type="checkbox" name="deletar" id="deletar"> <label for="deletar">Deletar</label></p>
						     
					</fieldset>
					
					<p><input type="submit" id="enviar" name="enviar" value="Cadastrar" />
					<input type="reset"  value="Limpar"/><br /><br /></p>
				</form>
	     
	  
	   </div>
	
	   <div id="rodape">
	
	     Sistema Bibliotecario 2014. Todos os Direitos Reservados
	 
	    </div>
	
	</div>
  </body>
</html>