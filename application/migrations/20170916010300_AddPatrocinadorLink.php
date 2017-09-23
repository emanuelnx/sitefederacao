<?php
	defined('BASEPATH') OR exit('Script não pode ser acessado diretamente.');

	/**
	* Cria tabela de intermediaria entre patrocinador e link
	*/
	class Migration_AddPatrocinadorLink extends CI_Migration {
		private $tabela = 'patrocinador_link';
		
		public function up() {
			$colunas = array(
				'id' => array(
					'type' => 'INT',
					'auto_increment' => true
				),
				'created_at' => array(
					'type' => 'DATETIME',
					'null' => FALSE
				)
			);
			$this->dbforge->add_key('id',TRUE);
			$this->dbforge->add_field($colunas);
			$this->dbforge->create_table($this->tabela,TRUE);
			// adicionando fk
			$this->dbforge->add_column($this->tabela,[
			    'COLUMN link_id INT NOT NULL',
			    'CONSTRAINT fk_link_id FOREIGN KEY(link_id) REFERENCES link(id)',
			]);
			$this->dbforge->add_column($this->tabela,[
			    'COLUMN patrocinador_id INT NOT NULL',
			    'CONSTRAINT fk_patrocinador_id FOREIGN KEY(patrocinador_id) REFERENCES patrocinador(id)',
			]);
		}

		public function down() {
			$this->dbforge->drop_table($this->tabela,TRUE);
		}
	}