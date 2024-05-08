 <?php
include("../sessao.php");
include("../include/topo.php");//Incluindo Topo da Página 
include("../conect/conecta.php");//Abrindo conecxão com DB
include("../classe/classEmprestimo.php");//Incluindo classe classEmprestimo
$emp =  new classEmprestimo();// Instânciando classe classEmprestimo 
 ?>
<div id="corpo"><br />
	<div class="identifica"><h3>Emprestimos Realizados<h3></div>
 <?php $emp->listar(); ?> <!--Listando Emprestimos Realizados-->

 </div>
	
<?php
mysql_close();//Fechando conecxão com DB
include("../include/rodape.php");//Incluindo o Rodapé
?>	
