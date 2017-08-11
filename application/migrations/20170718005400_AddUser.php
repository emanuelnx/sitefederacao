<?php
	defined('BASEPATH') OR exit('Script não pode ser acessado diretamente.');

	/**
	* Cria tabela de usuario utilizada para login no sistema.
	*/
	class Migration_AddUser extends CI_Migration {
		private $tabela = 'usuario';
		
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
				'email' => array(
					'type' => 'VARCHAR',
					'constraint' => 100,
					'null' => FALSE
				),
				'login' => array(
					'type' => 'VARCHAR',
					'constraint' => 50,
					'null' => FALSE
				),
				'senha' => array(
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
			// adicionando fk
			$this->dbforge->add_column($this->tabela,[
			    'COLUMN id_tipo_usuario INT NOT NULL',
			    'CONSTRAINT fk_id_tipo_usuario FOREIGN KEY(id_tipo_usuario) REFERENCES tipo_usuario(id)',
			]);
		}

		public function down() {
			$this->dbforge->drop_table($this->tabela,TRUE);
		}
	}