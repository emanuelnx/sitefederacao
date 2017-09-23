<?php
	defined('BASEPATH') OR exit('Script não pode ser acessado diretamente.');

	/**
	* Cria tabela de tipos de usuario
	*/
	class Migration_AddLink extends CI_Migration {
		private $tabela = 'link';
		
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
				'site' => array(
					'type' => 'VARCHAR',
					'constraint' => 100,
					'null' => FALSE
				),
				'link' => array(
					'type' => 'VARCHAR',
					'constraint' => 255,
					'null' => FALSE
				),
				'tipo' => array(
					'type' => 'TINYINT', // 0 interno, 1 externo
					'null' => FALSE
				),
				'status' => array(
					'type' => 'TINYINT',
					'null' => FALSE
				),
				'icone' => array(
					'type' => 'VARCHAR',
					'constraint' => 20
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