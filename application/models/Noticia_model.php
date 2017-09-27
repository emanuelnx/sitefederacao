<?php
	defined('BASEPATH') OR exit('Script não pode ser acessado diretamente.');

	/**
	*
	*/
	class Noticia_model extends MY_Model {
		
		public function __construct() {
			$this->table = 'noticia';
			$this->temUm[] = 'usuario';
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
				'Título', 
				'trim|required',
				array('required' => 'Título é obrigatório')
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