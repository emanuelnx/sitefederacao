<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct() {
        parent::__construct();
		$this->paginaAdministrativa();
    }

	public function index() {
		$this->dadosView['pagina'] = 'admin/admin_index.php';
		$this->dadosView['template'] = 'admin';

		$this->load->view('admin/container.php',$this->dadosView);
	}
}
