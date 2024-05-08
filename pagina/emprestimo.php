
 <html lang="pt-br">
    <head>
      <meta charset="UTF-8"/>  
	  <title>Emprestimo</title>
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
		
				<form action="cadEmprestimo.php" method="get">
					<fieldset id="emprestimo"> <legend>Emprestimo</legend>
						<p><label for="aluFunProf">Aluno Funcionario Professor: </label>
							<select name="aluFunProf">
								<option value="aluFunProf">Selecione o Usuário</option>
							</select>
						</p>
						<p><label for="livro">Livro: </label>
							<select name="livro">
								<option value="livro">Selecione o Livro</option>
							</select>
						</p>
						<p><label for="dataEmprestimo">Data Emprestimo:<input type="date" name="dataEmprestimo" id="dataEmprestimo" size="30" maxlength="30"></label></p>
						<p><label for="dataDevolucao">Data Devolução:<input type="date" name="dataDevolucao" id="dataDevolucao" size="30" maxlength="30"></label></p>
						
						     
					</fieldset>
				</form>
	  
	   </div>
	
	   <div id="rodape">
	
	     Sistema Bibliotecario 2014. Todos os Direitos Reservados
	 
	    </div>
	
	</div>
  </body>
</html>