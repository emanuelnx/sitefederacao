<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function __construct() {
        parent::__construct();
    }

	public function index() {

		$this->dadosView['pagina'] = 'body_externo.php';
		$this->dadosView['template'] = 'site';

		$this->load->view('container_externo.php',$this->dadosView);
	}
}
