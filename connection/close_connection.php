<?php
	
	function closeConnection($connect) {
		$fecha = mysqli_close($connect);

		if (!$fecha) {
			echo "Impossível fechar a conexão";
			return false;
		} else {
			return true;
		}
	}
?>