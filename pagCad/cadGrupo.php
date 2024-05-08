<?php
include("../sessao.php");
include"../include/topo.php";
?>		
	<div id="corpo">
	<div class="identifica2"><h3>Cadastro de Grupo<h3></div>
	<form action="../pagCad/transGrupo.php" name="cadastro" method="get" onSubmit="return validacao();">
		<fieldset id="grupo"> <legend>Grupo</legend>
			<p><label for="nomeGrupo">Nome Grupo:<input type="text" name="nomeGrupo" id="nomeGrupo" size="30" maxlength="30" placeholder="Nome Grupo"></label></p>
			<p><label for="tipoGrupo">Tipo Grupo:
				<select name="tipoGrupo" id="tipoGrupo">
					<option>Selecione</option>
					<option>Administrador</option>
					<option>Usuário</option>
					<option>Visitante</option>
				</select>
			
			</label></p>
		</fieldset>
		<fieldset id="grupo"> <legend>Permissões</legend>
			<p><input type="radio" name="permissao" id="admin" value="1"> <label for="admin">Administrador</label></p>
			<p><input type="radio" name="permissao" id="usuario" value="2" checked> <label for="usuario">Usuário</label></p>
			<p><input type="radio" name="permissao" id="visitante" value="3"> <label for="visitante">Visitante</label></p>
			
				 
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
