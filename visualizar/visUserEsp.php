<?php
include("../sessao.php");
include("../include/topo.php");//Incluindo Topo da Página
include("../conect/conecta.php");//Abrindo Conecxão com o Banco de dados
include("../classe/classUsuario.php");//Incluindo classe AluFunProf
$usu = new classUsuario();// Instanciando a classe AluFunProf
$usu->idUsuario = $_REQUEST["idUsuario"];
?>
	 <div id="corpo"><br />
		<div class="identifica"><h3>Dados do Usuário Administrador<h3></div>	
		<?php $usu->listarEspecifico(); ?><!--Listando Usuarios Cadastrados-->
		
	 </div>
	
<?php
mysql_close();//Fechando conecxão com o DB
include("../include/rodape.php");//Incluindo Rodapé
?>	
