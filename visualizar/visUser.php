<?php
include("../sessao.php");
include("../include/topo.php");//Incluindo Topo da Página
include("../conect/conecta.php");//Abrindo Conecxão com o Banco de dados
include("../classe/classUsuario.php");//Incluindo classe AluFunProf
$usu = new classUsuario();// Instanciando a classe AluFunProf
?>
	 <div id="corpo"><br />
	 <div class="identifica"><h3>Usuários Cadastrados<h3></div>	
		<?php $usu->listar(); ?><!--Listando Usuarios Cadastrados-->
		
	 </div>
	
<?php
mysql_close();//Fechando conecxão com o DB
include("../include/rodape.php");//Incluindo Rodapé
?>	
