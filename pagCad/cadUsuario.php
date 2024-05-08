<?php
include("../sessao.php");
include"../include/topo.php";
include("../classe/classUsuario.php");
$usu = new classUsuario();	
?>

 <div id="corpo">
		
	<form action="transCadUsuario.php" name="cadastro" method="get" onSubmit="return validacao();">
		<fieldset id="grupo"> <legend>Usuário</legend>
			<p><label for="nome">Nome:</label> <input type="text" name="nome" id="nome" size="30" maxlength="30" placeholder="Nome"></p>
			<p><label for="email">E-mail:</label><input type="email" name="email" id="email" size="30" maxlength="30" placeholder="E-mail"></p>
			<p><label for="cpf">CPF:</label><input type="text" name="cpf" id="cpf" size="30" maxlength="30" placeholder="CPF"></p>
			<p><label for="telefone">Telefone:</label> <input type="text" name="telefone" id="telefone" size="30" maxlength="30" placeholder="Telefone"></p>
			<p><label for="idGrupo">Grupo:</label>
				<select name="grupo">
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
			<p><label for="login">Login:</label> <input type="text" name="login" id="login" size="30" maxlength="30" placeholder="Login"></p> 
			<p><label for="senha">Senha:</label> <input type="password" name="senha" id="senha" size="30" maxlength="30" placeholder="Senha"></p>
			
		</fieldset>
		<p>
			<input type="submit" id="enviar" name="enviar" value="Cadastrar" />
			<input type="reset"  id="limpar" name="limpar" value="Limpar"/><br /><br />
		</p>
	</form>
	 
  
  </div>
	
<?php
include"../include/rodape.php";
?>	
