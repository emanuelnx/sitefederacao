<?php
	defined('BASEPATH') OR exit('Script não pode ser acessado diretamente.');

	/**
	* Cria tabela de noticia
	*/
	class Migration_AddNoticia extends CI_Migration {
		private $tabela = 'noticia';
		
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
					'constraint' => 255,
					'null' => FALSE
				),
				'conteudo' => array(
					'type' => 'TEXT',
					'null' => FALSE
				),
				'acessos' => array(
					'type' => 'INT'
				),
				'aprovacao' => array(
					'type' => 'INT'
				),
				'status' => array(
					'type' => 'TINYINT',
					'null' => FALSE
				),
			);
			$this->dbforge->add_key('id',TRUE);
			$this->dbforge->add_field($colunas);
			$this->dbforge->create_table($this->tabela,TRUE);
			// adicionando fk
			$this->dbforge->add_column($this->tabela,[
			    'COLUMN usuario_id INT NOT NULL',
			    'CONSTRAINT fk_usuario_id FOREIGN KEY(usuario_id) REFERENCES usuario(id)',
			]);
		}

		public function down() {
			$this->dbforge->drop_table($this->tabela,TRUE);
		}
	}