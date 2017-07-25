<?php
	defined('BASEPATH') OR exit('Script não pode ser acessado diretamente.');

	/**
	* executa a ultima migracao manualmente, acessando via url.
	* Utilizado para testes.
	*/
	class Migracoes extends CI_controller {
		
		public function atualizar() {
			$this->load->library('migration');
			$resultado = $this->migration->current();
			$msg = '';

			if ($resultado === TRUE) {
				$msg = 'Nenhuma migração pendente.';
			} elseif ($resultado !== FALSE && $resultado !== TRUE) {
				$msg = 'Banco de dados atualizado: '.$resultado;
			} else {
				$msg = 'erro: '.$this->migration->error_string();
			}

			echo $msg;
		}
	}