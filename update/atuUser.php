<?php
include("../sessao.php");
include"../include/topo.php";
include("../classe/classUsuario.php");
$usu = new classUsuario();
$idUsuario = $_REQUEST['idUsuario'];
$select = mysql_query("SELECT usuario.idUsuario, usuario.nome, usuario.email, usuario.telefone, usuario.login, usuario.senha, grupo.nomeGrupo, grupo.tipoGrupo
					   FROM  usuario, grupo 
					   WHERE usuario.idGrupo = grupo.idGrupo
					   AND idUsuario = $idUsuario");
$linha = mysql_fetch_array($select);		
?>

	    <div id="corpo">
		
	<form action="../pagCad/transCadUsuario.php" method="get">
		<fieldset id="grupo"> <legend>Usuário</legend>
			<input type=hidden name="idUsuario" value="idUsuario">
			<p><label for="nome">Nome:</label> <input type="text" name="nome" id="nome" size="30" maxlength="30" value="<?php echo $linha['nome']?>" ></p>
			<p><label for="email">E-mail:</label><input type="email" name="email" id="email" size="30" maxlength="30" value="<?php echo $linha['email']?>" ></p>
			<p><label for="telefone">Telefone:</label> <input type="text" name="telefone" id="telefone" size="30" maxlength="30" value="<?php echo $linha['telefone']?>"></p>
			<p><label for="idGrupo">Grupo:</label>
				<select name="grupo">
					<option selected><?php echo $linha['nomeGrupo']?></option>
					<?php
						$sql = "select * from grupo";
						$res = mysql_query($sql,$id);
						while($dados = mysql_fetch_array($res)){
							$idGrupo = $dados['idGrupo'];
							$nome = $dados['nomeGrupo'];
							echo "<option value=$idGrupo>$nome</option>";
						}
					?>

				</select>
			</p>
			<p><label for="login">Login:</label> <input type="text" name="login" id="login" size="30" maxlength="30" value="<?php echo $linha['login']?>"></p> 
			<p><label for="senha">Senha:</label> <input type="password" name="senha" id="senha" size="30" maxlength="30" value="<?php echo $linha['senha']?>"></p>
			
		</fieldset>
		<p>
			<input type="submit" id="atualizar" name="atualizar" value="Atualizar" />
			<input type="submit"  id="cancelar" name="cancelar" value="Cancelar"/>
			
		</p>
	</form>
	 
  
  </div>
<?php
include"../include/rodape.php";
?>
