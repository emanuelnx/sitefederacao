<?php
	defined('BASEPATH') OR exit('Script não pode ser acessado diretamente.');

	/**
	*
	*/
	class Historia_model extends MY_model {
		
		public function __construct() {
	        parent::__construct();
	        $this->table = 'historia';
	    }
	}