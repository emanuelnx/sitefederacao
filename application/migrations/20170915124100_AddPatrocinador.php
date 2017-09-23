<?php
	defined('BASEPATH') OR exit('Script não pode ser acessado diretamente.');

	/**
	* Cria tabela de tipos de usuario
	*/
	class Migration_AddPatrocinador extends CI_Migration {
		private $tabela = 'patrocinador';
		
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
				'titulo' => array(
					'type' => 'VARCHAR',
					'constraint' => 100,
					'null' => FALSE
				),
				'subtitulo' => array(
					'type' => 'VARCHAR',
					'constraint' => 100
				),
				'conteudo' => array(
					'type' => 'TEXT',
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