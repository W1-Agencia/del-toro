<?php

	function select($tabela, $coluna="*", $where=NULL, $ordem="", $limite="") {

		// SQL da consulta
		$sql = "SELECT {$coluna} FROM {$tabela} WHERE {$where}  {$ordem} {$limite}";

		// Conectou?
		if ($conexao = connect()) {

			// Consegui consultar?
			if ($query = mysqli_query($conexao, $sql)) {

				//Encontrou alguma coisa?
				if (mysqli_num_rows($query) > 0) {

					$resultados_totais = array();

					// Recebe os dados individuais
					while ($resultado = mysqli_fetch_assoc($query)) {
						$resultados_totais[] = $resultado;
					}

					// Fecha conexão
					closeConnection($conexao);

					return $resultados_totais;

				} else {
					return false;
				}

			} else {
				return false;
			}

		} else {
			return false;
		}

	}

?>