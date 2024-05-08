
 <html lang="pt-br">
    <head>
      <meta charset="UTF-8"/>  
	  <title>Editora</title>
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
			<form action="cadEditora.php" method="get">
				<fieldset id="autor"> <legend>Editora</legend>
					<p><label for="nome">Nome:<input type="text" name="nome" id="nome" size="30" maxlength="30" placeholder="Nome"></label></p>
					<p><label for="cnpj">CNPJ:<input type="text" name="cnpj" id="cnpj" size="30" maxlength="30" placeholder="CNPJ"></label></p>
					<p><label for="telefone">Telefone:<input type="text" name="telefone" id="telefone" size="30" maxlength="30" placeholder="Telefone"></label></p>
					<p><label for="endereco">Endereço:<input type="text" name="endereco" id="endereco" size="30" maxlength="30" placeholder="Endereço"></label></p>
					<p><label for="email">E-mail:<input type="email" name="email" id="email" size="30" maxlength="30" placeholder="E-mail"></label></p>
					<p><label for="site">Site:<input type="text" name="site" id="site" size="30" maxlength="30" placeholder="Site"></label></p>	     
				</fieldset>
			</form>
	   </div>
	
	   <div id="rodape">
	
	     Sistema Bibliotecario 2014. Todos os Direitos Reservados
	 
	    </div>
	
	</div>
  </body>
</html>