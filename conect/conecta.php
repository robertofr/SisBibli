<?php
	/* Este arquivo conecta um banco de dados MySQL � Servidor
	= localhost */
	$dbname="sisbibli"; // Indique o nome do banco de dados que ser� aberto
	$usuario="root"; // Indique o nome do usu�rio que tem acesso
	$password=""; // Indique a senha do usu�rio
	
	//1� passo � Conecta ao servidor MySQL 
	error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
	if(!($id = mysql_connect("localhost",$usuario,$password)))
	{
	   echo "N�o foi poss�vel estabelecer uma conex�o com o gerenciador MySQL. Favor Contactar o Administrador.";
	   exit;
	} 
	//2� passo � Seleciona o Banco de Dados 
	if(!($con=mysql_select_db($dbname,$id))) { 
	   echo "N�o foi poss�vel estabelecer 	uma conex�o com o gerenciador MySQL. Favor Contactar o Administrador.";
	   exit; 
	} 
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');
?>