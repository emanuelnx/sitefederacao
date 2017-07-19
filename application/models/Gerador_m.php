<?php
	defined('BASEPATH') OR exit('Script não pode ser acessado diretamente.');

	/**
	* executa a ultima migracao manualmente, acessando via url.
	* Utilizado para testes.
	*/
	class Gerador_m extends CI_model {
		
		public function getTables() {
			return $this->db->list_tables();
		}

		public function getFields($table) {
			return $this->db->list_fields($table);
		}
	}