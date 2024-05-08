<?php
include "include/topoIndexInicial.php";
?>

		 <div id="corpo">
		  
		  <form action="recuperaImail.php"  method="get">
		  
			<fieldset id="grupo"><legend>Recuperar de Senha</legend>
			
				<p>
					<label for="email">E-mail:</label>
					<input type="email" name="email" id="email" size="30" maxlength="30" placeholder="E-MAIL">
					<label for="cpf">CPF:</label>
					<input type="text" name="cpf" id="cpf" size="30" maxlength="30" placeholder="CPF">
					<input type="submit" id="verificar" name="verificar" value="Verificar" />
				</p>
				
			
			</fieldset>
		  
		  </form>
		  
		</div>	

<?php
include "include/rodape.php";
?>
