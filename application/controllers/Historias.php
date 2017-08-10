<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Historias extends CI_Controller {

	public function index() {
		if (isset($_SESSION['logado']) && $_SESSION['logado'] == 1) {
			$this->indexAdmin();
		} else {
			$this->indexSite();
		}
	}

	public function indexSite() {

		$dados = array(
			'pagina' => 'site/historias.php',
			'template' => 'site',
			'tituloPagina' => TITULOPAGINA,
			'assets' => array()
		);

		$this->load->view('container_externo.php',$dados);
	}

	public function indexAdmin() {

		$dados = array(
			'pagina' => 'body_externo.php',
			'template' => 'admin',
			'tituloPagina' => TITULOPAGINA,
			'assets' => array()
		);

		$this->load->view('container_externo.php',$dados);
	}
}
