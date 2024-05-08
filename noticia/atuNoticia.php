<?php
include("../sessao.php");
include("classNoticia.php");
include"../include/topo.php";
$not = new classNoticia();
$idNoticia = $_REQUEST['idNoticia'];
$select = mysql_query("SELECT * FROM noticia WHERE idNoticia = '$idNoticia'");
$linha = mysql_fetch_array($select);
		
?>

	    <div id="corpo">
			<form action="transNoticia.php" method="post" >
	<fieldset> <legend>Cadastro de Notícias</legend>
		<input type="hidden" name="idNoticia" value="<?php echo $linha['idNoticia']?>">
		<p>
		   <label for="titulo">Título:</label>
		   <input type="text" name="titulo" id="titulo" size="70" value="<?php echo $linha['titulo'];?>">
		</p>													 
		
		<p>
			<label for="resumo">Resumo:</label>
			<textarea name="resumo" id="resumo" rows="5" cols="130" ><?php echo $linha['resumo'];?></textarea>
		</p>
		
		<p>
			<?php echo"<img src='../img/imgNoticia/".$linha['foto']."' alt='$linha[titulo]'/>";?>
		</p>
		
		<p>
			<label for="texto">Texto:</label>
			<textarea name="texto" id="texto" rows="30" cols="130"><?php echo $linha['texto'];?></textarea>	
		</p>
		
		<p>
			<input type="submit" name="atualizar" id="atualizar" value="Atualizar">
			<input type="submit" value="Cancelar">
		</p>
			
	</fieldset>
</form>
	  
	   </div>
	   <?php
		include"../include/rodape.php";
	   ?>
	
	</div>
  </body>
</html>

