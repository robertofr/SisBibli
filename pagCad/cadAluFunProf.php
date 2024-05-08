<?php
include("../sessao.php");
include("../include/topo.php");//inclui topo
?>
	    <div id="corpo">
			<div class="identifica2"><h3>Cadastro de Usuários<h3></div>	
			<form action="transAluFunProf.php" name="cadastro" method="post" enctype="multipart/form-data" onSubmit="return validacao();">
				<fieldset id="grupo"> <legend>Identificação</legend>
					    <p>
							<label><b>Selecione Uma Foto de Perfil:
							<input type="file" name="foto" id="foto"></b></label>
						</p>
						<p>
							<label for="nome">Nome:</label>
							<input type="text" name="nome" id="nome" size="30" maxlength="30" placeholder="NOME">
						</p>
						<p>
							<label for="matricula">Matricula:</label>
							<input type="text" name="matricula" id="matricula" size="30" maxlength="30" placeholder="Nº MATRICULA">
						</p>
						<p>
							<label for="curso">Curso:</label>
							<input type="text" name="curso" id="curso" size="30" maxlength="30" placeholder="CURSO">
						</p>
						<p>
							<label for="cpf">CPF:</label>
							<input type="text" name="cpf" id="cpf" size="30" maxlength="11" placeholder="CPF">
						</p>
						<p>
							<label for="email">E-mail:</label>
							<input type="email" name="email" id="email" size="30" maxlength="30" placeholder="E-MAIL">
						</p>
						<p>
							<label for="telefone">Telefone:</label>
							<input type="text" name="telefone" id="telefone" size="30" maxlength="30" placeholder="TELEFONE">
						</p>
						<p>		<label for="tipoUsuario">Tipo de Usuário:</label>
									<select name="tipoUsuario" id="tipoUsuario">
										<option value="selecione"> Selecione </option>
										<option value="aluno"> Aluno</option>
										<option value="funcionario"> Funcionário</option>
										<option value="professor"> Professor(a)</option>
									</select>
								<label for="situacao">Situacão Usuário:</label>
									<select name="situacao" id="situacao">
										<option value="1" select> Ativo </option>
										<option value="2"> Pendente </option>
										<option value="3"> Inativo </option>
										<option value="4"> Bloqueado </option>
									</select>
						</p>
						<p>
							<label for="login">Login: <input type="text" name="login" id="login" size="30" maxlength="30" placeholder="LOGIN"></label> 
							<label for="senha">Senha: <input type="password" name="senha" id="senha" size="30" maxlength="8" placeholder="SENHA"></label>
						</p>	
				</fieldset>
				<fieldset id="endereco"> <legend>Endereço</legend>
						<p>
							<label for="lagradouro">Lagradouro: </label>
							<input type="text" name="lagradouro" id="lagradouro" size="50" maxlength="50" placeholder="RUA, AV, TRAVESSA">
						</p>
						<p>
							<label for="cidade">Cidade: </label>
							<input type="text" name="cidade" id="cidade" size="50" maxlength="50" placeholder="CIDADE">
						</p>
						<p>
							<label for="estado">Estado: </label><input type="text" name="estado" id="estado" size="20" maxlength="20" placeholder="ESTADO">
							<label for="cep">CEP:</label><input type="text" name="cep" id="cep" size="20" maxlength="8" placeholder="CEP">
						</p>						
				</fieldset>
					<p>
						<input type="submit" id="enviar" name="enviar" value="Cadastrar" />
						<input type="reset"  id="limpar" name="limpar" value="Limpar"/><br /><br />
					</p>
			</form>
	     
	  
	   </div><!--#corpo-->
	

<?php
	include"../include/rodape.php";//inclui rodape
?>	
	
	
