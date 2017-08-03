<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Historias extends CI_Controller {

	public function getHistoria() {

		$dados = array(
			'pagina' => 'body_externo.php',
			'tituloPagina' => TITULOPAGINA,
			'assets' => array()
		);

		$this->load->view('container_externo.php',$dados);
	}
}
