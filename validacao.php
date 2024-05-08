<?php
// Conectar ao servidor MySQL
include("conect/conecta.php");

$usuario = mysql_real_escape_string($_POST['usuario']);
$senha = mysql_real_escape_string($_POST['senha']);

// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
  header("Location: index.php"); exit;
}
// Validação do usuário/senha digitados
$sql = "SELECT idUsuario, nome, login, idGrupo FROM usuario WHERE (login = '$usuario') AND (senha = '$senha') LIMIT 1";
//$sql = "SELECT idAluFunProf, nome, login, situacao FROM alufunprof WHERE (login = '$usuario') AND (senha = '$senha') LIMIT 1";
$query = mysql_query($sql);
if (mysql_num_rows($query) != 1) {
  // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
  
  echo "
  <link rel='stylesheet' type='text/css' href='css/style.css' />
		<div class='mensagem1'>
			<span>Login inválido!</span>
			
		</div>	
	"; 
	include "index.php";exit;
} else {
  // Salva os dados encontados na variável $resultado
  $resultado = mysql_fetch_assoc($query);
}
  // Se a sessão não existir, inicia uma
  if (!isset($_SESSION)) session_start();

  // Salva os dados encontrados na sessão
   $_SESSION['UsuarioID'] = $resultado['idUsuario'];
   $_SESSION['UsuarioNome'] = $resultado['nome'];
   $_SESSION['UsuarioNivel'] = $resultado['idGrupo'];
  // $_SESSION['UsuarioID'] = $resultado['idAluFunProf'];
  // $_SESSION['UsuarioNome'] = $resultado['nome'];


  // Redireciona o visitante
  header("Location: index2.php"); exit;

?>