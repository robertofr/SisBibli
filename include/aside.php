<aside id="esquerdo">
<?php 
include("calendario.php");
/*if (isset($_REQUEST["sair"]))//Se houver o REQUEST sair  
{
	$sair = $_REQUEST["sair"];
	session_destroy();//Destroi a Sessão impedido que seja acessada voltando a pagina 
	// Redireciona o visitante de volta pro login
	$url = 'index.php';
	echo '
		<meta http-equiv=refresh content="0;URL='.$url.'" />
	'; exit;
}*/	
echo "
		<div id='msgLogin'>
			 Olá ".$_SESSION['UsuarioNome'].", Seja Bem Vindo!
		
		</div>
	  ";	
?>
				<nav id="menu2">
					<ul>
						<li><a href="sistema2.php">Sobre o Sistema</a></li>
						<li><a href="contato/contato.php">Contate-nos</a></li>
					</ul>
				</nav>
				<div id="calendario">
					<script type="text/javascript">writeCalendar()</script>
				</div>	
		 </aside>