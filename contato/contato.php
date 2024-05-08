<?php
include("../sessao.php");
include "../include/topo.php";
include "funcao.php";
include "../include/erro.php";

if(strlen($_POST['name']))
{
    if(sendMail($_POST['email'],'roberto387635@gmail.com', $_POST['mensagem'], 'Formulário de contato'))
    {
        echo "Sua mensagem foi enviada com sucesso!";
    }
    else
    {
        echo "Ocorreu um erro ao enviar.";
    }
    echo "<br><a href='index.php'>Voltar</a>";
    exit();
}
?>
	<link rel="stylesheet" href="../css/styleContato.css" type="text/css" media="all" />
	<fieldset id="grupo"><legend>Formulário de contato - Sisbibli</legend>
		<form method="post" id="formulario_contato" onsubmit="validaForm(); return false;" class="form">
			<p >
				<label for="name">Nome:</label>
				<input type="text" name="nome" id="nome" placeholder="Seu Nome" />
			</p>
			
			<p >
				<label for="email">E-mail:</label>
				<input type="text" name="email" id="email" placeholder="mail@exemplo.com.br" />
			</p>		
		
			<p>
				<label for="mensagem">Mensagem:</label>
				<textarea name="mensagem" id="mensagem" placeholder="Escreva sua mensagem" /></textarea>
			</p>
			
			<p class="submit">
				<input type="submit" name="enviar" value="Enviar" />
			</p>
		</form>
	</fieldset>	
    <script type="text/javascript">
        function validaForm()
        {
            erro = false;
            if($('#nome').val() == '')
            {
                alert('Você precisa preencher o campo Nome');erro = true;
            }
            if($('#email').val() == '' && !erro)
            {
                alert('Você precisa preencher o campo E-mail');erro = true;
            }
            if($('#mensagem').val() == '' && !erro)
            {
                alert('Você precisa preencher o campo Mensagem');erro = true;
            }
            
            //se nao tiver erros
            if(!erro)
            {
                $('#formulario_contato').submit();
            }
        }
    </script>
<?php
include"../include/rodape.php";
?>