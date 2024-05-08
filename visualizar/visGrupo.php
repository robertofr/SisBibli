<?php
include("../sessao.php");
include("../include/topo.php");//Incluindo Topo da Página
include("../conect/conecta.php");//Abrindo Conecxão com o Banco de dados
include("../classe/classGrupo.php");//Incluindo classe AluFunProf
$gru = new classGrupo();// Instanciando a classe AluFunProf
?>
	 <div id="corpo"><br />
		<div class="identifica"><h3>Grupos Cadastrados<h3></div>
		<?php $gru->listar(); ?><!--Listando Usuarios Cadastrados-->
		
	 </div>
	
<?php
mysql_close();//Fechando conecxão com o DB
include("../include/rodape.php");//Incluindo Rodapé
?>	
