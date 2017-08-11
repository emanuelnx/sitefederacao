<?php
	defined('BASEPATH') OR exit('Script não pode ser acessado diretamente.');

	/**
	* Cria tabela de tipos de usuario
	*/
	class Migration_AddTypeUser extends CI_Migration {
		private $tabela = 'tipo_usuario';
		
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
				'descricao' => array(
					'type' => 'VARCHAR',
					'constraint' => 100,
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
			$this->defaultValues();
		}

		private function defaultValues() {
			$agora = date('Y-m-d H:i:s');
			$dados = array(
	            array('created_at' => $agora,'descricao' => 'Administrador','status' => 1),
	            array('created_at' => $agora,'descricao' => 'root','status' => 1),
	            array('created_at' => $agora,'descricao' => 'padrao','status' => 1)
	        );

			$this->db->trans_begin();
			foreach ($dados as $key => $dado) {
				$this->db->insert($this->tabela, $dado);
			}

			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				$this->down();
				echo "erro ao criar {$this->tabela} usuario criada <br>";
			} else {
				$this->db->trans_commit();
				echo "tabela {$this->tabela} criada <br>";
			}
		}

		public function down() {
			$this->dbforge->drop_table($this->tabela,TRUE);
		}
	}