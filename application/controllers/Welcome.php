<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index() {
		$this->load->helper('render');
		$dados = array(
			'pagina' => 'body_externo.php',
			'tituloPagina' => TITULOPAGINA,
			'assets' => array()
		);
		$this->load->view('container_externo.php',$dados);
	}
}
