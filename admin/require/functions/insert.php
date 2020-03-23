<?php
	
	function insert($coluna,$valor,$tabela) {

		// São arrays?
		if ((is_array($coluna)) && (is_array($valor))) {

			// Tem o mesmo número de elementos?
			if(count($coluna) == count($valor)) {

				// Montar SQL
				// Implode transforma array em valores para serem transformados em string
				$inserir = "INSERT IGNORE INTO {$tabela} (".implode(', ',$coluna).")
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
			echo $inserir;
			if(mysqli_query($conexao, $inserir)) {
				// fecha conexao
				closeConnection($conexao);
				return true;
			} else {
				echo "Query inválida!<br>";
				die (trigger_error(mysqli_error($conexao)));
				return false;
			}
		} else {
			return false;
		}
	}
?>