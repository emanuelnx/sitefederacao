<?php
	defined('BASEPATH') OR exit('Script não pode ser acessado diretamente.');

	/**
	*
	*/
	class Historia_model extends MY_Model {
		
		public function __construct() {
	        $this->table = 'historia';
	        parent::__construct();
	    }

	    /**
		 * Validacoes para cadastros.
		 * 
		 * @access public
		 * @return void
		 */
		public function validacoesSave() {

			$this->load->library('form_validation');
			
			// configurando regras de validacao
			$this->form_validation->set_rules(
				'titulo', 
				'Titulo', 
				'trim|required|min_length[4]|is_unique[historia.titulo]',
				array(
					'is_unique' => 'Este título já existe.',
					'required' => 'Título é obrigatório',
					'min_length' => 'Título não pode possuir menos de 4 caracteres'
				)
			);
			$this->form_validation->set_rules(
				'conteudo',
				'Conteudo',
				'trim|required',
				array('required' => 'Conteudo é obrigatório.')
			);

			return $this->form_validation->run();
		}
	}