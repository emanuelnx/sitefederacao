<?php
	defined('BASEPATH') OR exit('Script n�o pode ser acessado diretamente.');

	/**
	*
	*/
	class Historia_model extends MY_model {
		
		public function __construct() {
	        parent::__construct();
	        $this->table = 'historia';
	    }
	}