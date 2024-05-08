
 <html lang="pt-br">
    <head>
      <meta charset="UTF-8"/>  
	  <title>Autor</title>
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
			<form action="cadAutor.php" method="get">
				<fieldset id="autor"> <legend>Dados Autor</legend>
					<p><label for="nome">Nome:</label><input type="text" name="nome" id="nome" size="30" maxlength="30" placeholder=" Nome"/></p>
					<p><label for="sobrenome">Sobrenome:</label><input type="text" name="sobrenome" id="sobrenome" size="30" maxlength="30" placeholder=" Sobrenome"></p>
					<p><label for="email">Email:</label><input type="email" name="email" id="email" placeholder="E-mail"></p>
					<p><label for="formacao">Formação:</label><input type="text" name="formacao" id="formacao"></p>
			
				</fieldset> 
	     </form>
	  
	   </div>
	
	   <div id="rodape">
	
	     Sistema Bibliotecario 2014. Todos os Direitos Reservados
	 
	    </div>
	
	</div>
  </body>
</html>