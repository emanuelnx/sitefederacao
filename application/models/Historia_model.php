<?php
	defined('BASEPATH') OR exit('Script n�o pode ser acessado diretamente.');

	/**
	*
	*/
	class Historia_model extends MY_Model {
		
		public function __construct() {
	        $this->table = 'historia';
	        parent::__construct();
	    }
	}