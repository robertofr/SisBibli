<?php 
	// A sessão precisa ser iniciada em cada página diferente
	if (!isset($_SESSION)) 
		session_start();

	// Verifica se não há a variável da sessão que identifica o usuário
	if (!isset($_SESSION['UsuarioID'])) {
		include"../include/topoIndexInicial2.php";	
		echo"
		<div class='mensagem'>
		<span>ACESSO NEGADO!<br /> Efetue o Login Para Ter Acesso ao Conteudo Desta Pagina.</span>
		</div>
		";	
		// Destrói a sessão por segurança
		session_destroy();
		// Redireciona o visitante de volta pro login
		$url = '../index.php';
		echo '
			<meta http-equiv=refresh content="10;URL='.$url.'" />
		'; exit;
	}
?>