<?php
//$banco="w1agencia02", $usuario="w1agencia02", $senha="rhematec26", $hostname="mysql.w1agencia.com.br"
function connect($banco="deltoro", $usuario="root", $senha="", $hostname="localhost") {
	$connect = mysqli_connect($hostname, $usuario, $senha, $banco);

	if(!$connect) {
		die (trigger_error("Não foi possível estabelecer a conexão"));
		return false;
	} else {	
		return $connect;
	}
}
?>