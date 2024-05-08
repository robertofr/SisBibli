<html lang="pt-br">
    <head>
      <meta charset="UTF-8"/>  
	  <title>Sistema Bibliotecário</title>
	  <link rel="stylesheet" type="text/css" href="../css/style.css">
	  <link rel="icon" type="image/png" href="../img/livro.png" />
	
    </head>
 <body>	
 
	<div id="interface">
	   <div id="topo">
	    <hgroup id="logo">
		   <a href="../index.php">
		   <h1> <img src="../img/livro.png"/> Sistema Bibliotecário</h1>
		     <h2> Versão 1.0</h2>
			 </a>
		</hgroup>
		<hgroup id="login">
		<form action="../validacao.php" method="post">
			<fieldset>
				<label for="txUsuario">Usuário</label>
				<input type="text" name="usuario" id="txUsuario" maxlength="25" />
				<label for="txSenha">Senha</label>
				<input type="password" name="senha" id="txSenha" />

				<input type="submit" value="Entrar" /><br />
				<a href="../esqSenha.php" class="esqueci">Esqueci minha senha</a>
			</fieldset>
		</form>
		</hgroup>
		  <nav id="menu">
			<ul>
				<a href="../index.php"><li>Inicio</li></a>
				
				<a href="../noticia/visNoticia.php"><li>Notícias</li></a>
				
				<a href="../visualizar/visAcervo.php"><li>Consultar Acervo</li></a>
				
				<a href="../sistema.php"><li>Sistema</li></a>
					
				<a href="../sobreNos.php"><li>Sobre Nós</li></a>		
					
				
				
			</ul>
		 </nav>
		 </div>