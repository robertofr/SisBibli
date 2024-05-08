<?php
include("../sessao.php");
include"../include/topo.php";
include("../classe/classGrupo.php");
$gru = new classGrupo();
$idGrupo = $_REQUEST['idGrupo'];
$select = mysql_query("SELECT grupo.idGrupo,grupo.idPermissao, grupo.nomeGrupo, grupo.tipoGrupo, permissao.idPermissao
					   FROM  grupo, permissao 
					   WHERE idGrupo = $idGrupo
					   AND grupo.idPermissao = permissao.idPermissao");
$linha = mysql_fetch_array($select);		
$permissao = $linha['idPermissao'];
?>

	<div id="corpo">
		
	<form action="../pagCad/transGrupo.php" method="get">
			<fieldset id="grupo"> <legend>Grupo</legend>
				<p><label for="nome">Nome Grupo:</label><input type="text" name="nome" id="nome" size="30" maxlength="30" value="<?php echo $linha['nomeGrupo']?>"></p>
				<p><label for="tipoGrupo">Tipo Grupo:
					<select name="tipoGrupo" id="tipoGrupo">
						<option selected><?php echo $linha['tipoGrupo']?></option>
						<option>Administrador</option>
						<option>Usuário</option>
						<option>Visitante</option>
					</select>
				
				</label></p>
			</fieldset>
			<fieldset id="grupo"> <legend>Permissões</legend>
				<p><input type="radio" name="permissao" id="admin" value="1" <?php if ($permissao=='1') echo 'checked="checked"'; ?>> <label for="admin">Administrador</label></p>
				<p><input type="radio" name="permissao" id="usuario" value="2" <?php if ($permissao=='2') echo 'checked="checked"'; ?>> <label for="usuario">Usuário</label></p>
				<p><input type="radio" name="permissao" id="visitante" value="3" <?php if ($permissao=='3') echo 'checked="checked"'; ?>> <label for="visitante">Visitante</label></p>
				
					 
			</fieldset>
			
			<p>
				<input type="submit" id="atualizar" name="atualizar" value="Atualizar" />
				<input type="submit"  id="cancelar" name="cancelar" value="Cancelar"/><br /><br />
			</p>
		</form>
	 
  
  </div>
<?php
include"../include/rodape.php";
?>
