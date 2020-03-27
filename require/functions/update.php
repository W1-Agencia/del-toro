<?php
	function update($coluna,$valor,$tabela, $where) {

		// São arrays?
		if ((is_array($coluna)) and (is_array($valor))) {

			// Tem o mesmo número de elementos?
			if(count($coluna) == count($valor)) {

				$valor_coluna = NULL;

				// Colocar arrais em uma string
				for ($i=0; $i < count($coluna); $i++) { 
					
					$valor_coluna .= "{$coluna[$i]} = '{$valor[$i]}',";
				}

				// Tirando a virgula da ultima posição

				$valor_coluna = substr($valor_coluna, 0,-1);

				// Montar SQL

				$atualizar = "UPDATE IGNORE {$tabela} SET {$valor_coluna} WHERE {$where}";

			} else {
				return false;
			}
		} else {
			// Montar SQL
			$atualizar = "UPDATE IGNORE {$tabela} SET {$coluna} = '{$valor}' WHERE {$where}";			
		}

		// Conectou?
		if ($conexao = connect()) {

			// inseriu?
			if(mysqli_query($conexao, $atualizar)) {
				// fecha conexao
				closeConnection($conexao);
				return true;
			} else {
				echo $atualizar."<br>";
				echo "Query inválida!<br>";die (mysqli_connect_errno());
				return false;
			}
		} else {
			return false;
		}
	}
?>