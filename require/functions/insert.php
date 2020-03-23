<?php
	
	function insert($coluna,$valor,$tabela) {

		// São arrays?
		if ((is_array($coluna)) and (is_array($valor))) {

			// Tem o mesmo número de elementos?
			if(count($coluna) == count($valor)) {

				// Montar SQL
				// Implode transforma array em valores para serem transformados em string
				$inserir = "INSERT INTO {$tabela} (".implode(', ',$coluna).")
				VALUES ('".implode('\', \'',$valor)."')";

			} else {
				return false;
			}
		} else {
			// Montar SQL
			$inserir = "INSERT INTO {$tabela} ({$coluna}) VALUES ('{$valor}')";
		}

		// Conectou?
		if ($conexao = connect()) {
			// inseriu?
			if(mysqli_query($conexao, $inserir)) {
				// fecha conexao
				closeConnection($conexao);
				return true;
			} else {
				echo "Query inválida!<br>";die (trigger_error(mysql_error()));
				return false;
			}
		} else {
			return false;
		}
	}
?>