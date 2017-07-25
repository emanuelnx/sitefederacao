<?php
	defined('BASEPATH') OR exit('Script não pode ser acessado diretamente.');

	/**
	* executa a ultima migracao manualmente, acessando via url.
	* Utilizado para testes.
	*/
	class Gerador extends CI_controller {

		public function __construct() {
			parent::__construct();
			$this->load->model('gerador_m');
		}
		
		public function index() {
			$dados = array(
				'pagina' => 'gerador.php',
				'tituloPagina' => TITULOPAGINA,
				'selectTabelas' => form_dropdown('', $this->gerador_m->getTables()),
				'assets' => array()
			);

			$this->load->view('root/container_root.php',$dados);
		}

		public function create() {
			echo '<pre>';print_r($_POST);die;
		}
	}