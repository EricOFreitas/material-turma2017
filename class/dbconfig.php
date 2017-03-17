<?php

//parâmetros para conectar no banco de dados local
$DB_host = "";
$DB_user = "";
$DB_pass = "";
$DB_name = "";

/*
Faço um try para tentar a conexão no banco de dados, caso dê falha 
pego a mensagem no catch e apresento.
O try tenta executar o comando ali dentro e caso dê erro ele continua 
e apresenta o erro no catch.
Sem o try ele apresentaria um erro na tela sem tratamento e poderia 
parar na linha do erro, não executando os outros comandos
*/
try
{
	$DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
	$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo $e->getMessage(); //apresento a msg de erro caso aconteça
}
?>