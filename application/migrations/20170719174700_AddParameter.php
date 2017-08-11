<?php
	defined('BASEPATH') OR exit('Script não pode ser acessado diretamente.');

	/**
	* Cria tabela de parametros de configuracao do sistema.
	*/
	class Migration_AddParameter extends CI_Migration {
		private $tabela = 'parametros';
		
		public function up() {
			$colunas = array(
				'id' => array(
					'type' => 'INT',
					'auto_increment' => true
				),
				'created_at' => array(
					'type' => 'DATETIME',
					'null' => FALSE
				),
				'updated_at' => array(
					'type' => 'DATETIME',
					'null' => FALSE
				),
				'confirm_email' => array(
					'type' => 'VARCHAR',
					'constraint' => 50,
					'null' => FALSE
				),
				'confirm_admin' => array(
					'type' => 'VARCHAR',
					'constraint' => 32,
					'null' => FALSE
				),
				'status' => array(
					'type' => 'TINYINT',
					'null' => FALSE
				)
			);
			$this->dbforge->add_key('id',TRUE);
			$this->dbforge->add_field($colunas);
			$this->dbforge->create_table($this->tabela,TRUE);
		}

		public function down() {
			$this->dbforge->drop_table($this->tabela,TRUE);
		}
	}