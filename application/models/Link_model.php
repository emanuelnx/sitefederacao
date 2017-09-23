<?php
	defined('BASEPATH') OR exit('Script não pode ser acessado diretamente.');

	/**
	*
	*/
	class Link_model extends MY_Model {
		
		public function __construct() {
	        $this->table = 'link';
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
				'site', 
				'Site', 
				'trim|required|is_unique[link.site]',
				array(
					'is_unique' => 'Este site já existe.',
					'required' => 'Site é obrigatório'
				)
			);
			$this->form_validation->set_rules(
				'link',
				'Link',
				'trim|required|is_unique[link.link]',
				array(
					'is_unique' => 'Este link já existe.',
					'required' => 'Link é obrigatório.'
				)
			);

			return $this->form_validation->run();
		}
	}