<?php

/* 
Esta funзгo executa um comando SQL no banco de dados MySQL
$id – Ponteiro da Conexгo 
$sql – Clбusula SQL a executar 
$erro – Especifica se a funзгo exibe ou nгo(0=nгo, 1=sim)
$res – Resposta 
*/ 
//function mysqlexecuta($id,$sql,$erro = 1) 
function mysqlexecuta($sql,$erro = 1) 
{ 
    if(empty($sql)) 
       return 0; //Erro na conexгo ou no comando SQL   
    if (!($res = @mysql_query($sql))) 
	{

		if($erro) 
			echo "Ocorreu um erro na execuзгo do Comando SQL no banco de dados. Favor Contactar o Administrador.";
	   
		exit;
    } 
    return $res; 
}
?>