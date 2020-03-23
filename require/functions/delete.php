<?php

	function delete ($tabela, $where = NULL) {

		// SQL
		$delete = "DELETE FROM {$tabela} WHERE {$where}";

		// Conectou?
		if($con = connect()) {
			// Deletou?
			if(mysqli_query($con, $delete)) {
				// Fechar conexão
				closeConnection($con);
				return true;
			} else {
				// Mostrar uma msg de erro
				echo "Query Inválida {$delete}";
				return false;
			}
		} else {
			return false;
		}
	}

?>