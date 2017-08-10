<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index() {

		$dados = array(
			'pagina' => 'body_externo.php',
			'template' => 'site',
			'tituloPagina' => TITULOPAGINA,
			'assets' => array()
		);

		$this->load->view('container_externo.php',$dados);
	}
}
