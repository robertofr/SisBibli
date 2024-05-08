<link rel="stylesheet" type="text/css" href="css/style.css" />
<?php
include ("conect/conecta.php");// Conecta ao banco de dados
include ("conect/mysqlexecuta.php");// Executa a cláusula SQL
include("include/erro.php");// Incluir Tratamento de erros
include("include/topoIndexInicial.php");//inclui topo
	
if(isset($_REQUEST['verificar'])){
$email = $_REQUEST["email"];
$cpf = $_REQUEST["cpf"];


$sql = mysql_query("SELECT * FROM usuario WHERE email = '$email' AND cpf = $cpf ");
        $contador = mysql_num_rows($sql);
         
        if ($contador == 1){
            while($resultado = mysql_fetch_array($sql)){
                $nome  = $resultado['nome'];
                $login = $resultado['login'];
                $email = $resultado['email'];
                $senha = $resultado['senha'];
            }
             
                $corpo_email  = 'Recuperacão de dados realizada com sucesso!<br />';
                $corpo_email .= 'Login = ".$login."<br />';
                $corpo_email .= 'Senha = ".$senha."<br />';
                $corpo_email .= 'E-Mail = ".$email."<br />';
                $corpo_email .= 'Está é uma mensagem automática do sistema, você não precisa responder a mesma!';     
                $destinatario = '$email';
				$remetente = 'sisbibli@gmail.com';
				mail($destinatario,'Recuperacao de Senha',$corpo_email,$remetente);
                 
				echo '<div class=mensagem><span>Sua senha foi enviada com sucesso para o email: '.$email.'.</span></div>';
				
                }else{
						echo '<div class=mensagem><span>Seu E-Mail ou CPF está incorreto.</span></div>';
                     }
					 
        }
		
?>