
 <html lang="pt-br">
    <head>
      <meta charset="UTF-8"/>  
	  <title>Sistema Bibliotecario</title>
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
		
			<form action="cadAluFunProf.php" method="get">
					<fieldset id="grupo"> <legend>Identificação</legend>
						<p><label for="nome">Nome: <input type="text" name="nome" id="nome" size="30" maxlength="30" placeholder="NOME"></label></p>
						<p><label for="matricula">Matricula:<input type="text" name="matricula" id="matricula" size="30" maxlength="30" placeholder="Nº MATRICULA"></label>
							<label for="curso">Curso:</label><input type="text" name="curso" id="curso" size="30" maxlength="30" placeholder="CURSO"></p>
						<p><label for="cpf">CPF:</label><input type="text" name="cpf" id="cpf" size="30" maxlength="11" placeholder="CPF"></p>
						<p><label for="email">E-mail:</label><input type="email" name="email" id="email" size="30" maxlength="30" placeholder="E-MAIL"></p>
						<p><label for="telefone">Telefone: <input type="text" name="telefone" id="telefone" size="30" maxlength="30" placeholder="TELEFONE"></label></p>
						<p><label for="tipoUsuario">Tipo de Usuário:</label>
							<select>
								<option value="selecione"> Selecione </option>
								<option value="aluno"> Aluno</option>
								<option value="funcionario"> Funcionário</option>
								<option value="professor"> Professor(a)</option>
							</select>
							<label for="situacao">Situacão Usuário:</label>
							<select>
								<option value="selecione"> Selecione </option>
							</select>
						</p>
						<p>
							<label for="login">Login: <input type="text" name="login" id="login" size="30" maxlength="30" placeholder="LOGIN"></label> 
							<label for="senha">Senha: <input type="password" name="senha" id="senha" size="30" maxlength="8" placeholder="SENHA"></label>
						</p>	
					</fieldset>
					<fieldset id="endereco"> <legend>Endereço</legend>
						<p><label for="lagradouro">Lagradouro: </label><input type="text" name="lagradouro" id="lagradouro" size="50" maxlength="50" placeholder="RUA, AV, TRAVESSA"></p>
						<p><label for="cidade">Cidade: </label><input type="text" name="cidade" id="cidade" size="50" maxlength="50" placeholder="CIDADE"></p>
						<p><label for="estado">Estado: </label><input type="text" name="estado" id="estado" size="20" maxlength="20" placeholder="ESTADO">
							<label for="cep">CEP:</label><input type="text" name="cep" id="cep" size="20" maxlength="8" placeholder="CEP"></p>						
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