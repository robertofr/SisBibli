<?php
include("../sessao.php");
include"../include/topo.php";//Inclui topo da pagina
include("../classe/classAluFunProf.php");//Incluir a classe aluFunProf
$alu = new classAluFunProf();//Instancia da da classe
$idAluFunProf = $_REQUEST['idAluFunProf'];//Recebe o idAluFunProf da pagina de visualização(visUsuarioCadastrado)
$select = mysql_query("SELECT * FROM aluFunProf WHERE idAluFunProf = '$idAluFunProf'");//Seleciona todos os dados da tabela aluFunProf em um array
$linha = mysql_fetch_array($select);//atribui o array recebido a variavel $linha
		
?>
	<div id="corpo">
		<form action="../pagCad/transAluFunProf.php" method="get" enctype="multipart/form-data">
			<fieldset id="grupo"> <legend>Identificação</legend>
				<div class='foto'>
					<?php echo"<img src='../img/uploads/".$linha['foto']."' alt=''/>";	?>
				</div>
					<input type=hidden name= "idAluFunProf" value="<?php echo $linha['idAluFunProf']?>">
					<!--<p>
						<label><b>Selecione Uma Foto de Perfil:
						<input type="file" name="foto" id="foto"></b></label>
					</p>-->
					<p>
						<label for="nome">Nome:
						<input type="text" name="nome" id="nome" size="30" maxlength="30" value="<?php echo $linha['nome']?>"></label>
					</p>
					<p>
						<label for="matricula">Matricula:
						<input type="text" name="matricula" id="matricula" size="30" maxlength="30" value="<?php echo $linha['matricula']?>"></label>
					</p>
					<p>
						<label for="curso">Curso:
						<input type="text" name="curso" id="curso" size="30" maxlength="30" value="<?php echo $linha['curso']?>"></label>
					</p>
					<p>
						<label for="cpf">CPF:
						<input type="text" name="cpf" id="cpf" size="30" maxlength="11" value="<?php echo $linha['cpf']?>"></label>
					</p>
					<p>
						<label for="email">E-mail:
						<input type="email" name="email" id="email" size="30" maxlength="30" value="<?php echo $linha['email']?>"></label>
					</p>
					<p>
						<label for="telefone">Telefone:
						<input type="text" name="telefone" id="telefone" size="30" maxlength="30" value="<?php echo $linha['telefone']?>"></label>
					</p>
					<p><label for="tipoUsuario">Tipo de Usuário:</label>
							<select name="tipoUsuario" id="tipoUsuario" >
								<option value="aluno" select> Aluno</option>
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
						<label for="login">Login: <input type="text" name="login" id="login" size="30" maxlength="30" value="<?php echo $linha['login']?>"></label> 
						<label for="senha">Senha: <input type="text" name="senha" id="senha" size="30" maxlength="8" value="<?php echo $linha['senha']?>"></label>
					</p>	
			</fieldset>
			<fieldset id="endereco"> <legend>Endereço</legend>
					<p>
						<label for="lagradouro">Lagradouro: 
						<input type="text" name="lagradouro" id="lagradouro" size="50" maxlength="50" value="<?php echo $linha['lagradouro']?>"></label>
					</p>
					<p>
						<label for="cidade">Cidade:
						<input type="text" name="cidade" id="cidade" size="50" maxlength="50" value="<?php echo $linha['cidade']?>"></label>
					</p>
					<p>
						<label for="estado">Estado: 
						<input type="text" name="estado" id="estado" size="20" maxlength="20" value="<?php echo $linha['estado']?>"></label>
						<label for="cep">CEP:
						<input type="text" name="cep" id="cep" size="20" maxlength="8" value="<?php echo $linha['cep']?>"></label>
					</p>						
			</fieldset>
				<p>
					<input type="submit" id="atualizar" name="atualizar" value="Atualizar" />
					<input type="submit" id="cancelar" name="cancelar" value="Cancelar" />
				</p>
		</form>
	  
	</div>
<?php
	include"../include/rodape.php";//Incluir o rodape da pagina
?>


