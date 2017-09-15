<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function __construct() {
        parent::__construct();
    }

	public function index() {
		$this->load->model(array("Historia_model"));
		$this->load->model(array("Patrocinador_model"));

		$this->dadosView['historias'] = $this->Historia_model->pegueTodos();
		$this->dadosView['patrocinadores'] = $this->montaPatrocinadores();
		$this->dadosView['pagina'] = 'body_externo.php';
		$this->dadosView['template'] = 'site';
		$this->addJs(
			array(
				'jquery.1.11.1.js', 'bootstrap.js',
				'owl.carousel.js', 'skrollr.js',
				'imagesloaded.js', 'jquery.isotope.js',
				'nivo-lightbox.min.js', 'jqBootstrapValidation.js',
				'contact.js', 'main.js',
			), 
			'footer', 
			$this->dadosView['template']
		);

		$this->load->view('container_externo.php',$this->dadosView);
	}

	private function montaPatrocinadores() {
		$patrocinadores = $this->Patrocinador_model->pegueTodos();

		// patrocinio anuncie aqui
		$patrocinador = new stdClass();
		$patrocinador->id = '0';
		$patrocinador->titulo = 'Anuncie aqui';
		$patrocinador->subtitulo = 'Seja patrocinador';
		$patrocinador->status = 1;
		$patrocinador->conteudo = 'Entre em contato e veja a melhor forma de anunciar em nosso site.';

		if (!$patrocinadores || ($patrocinadores && count($patrocinadores) < 3)) {
			if (!$patrocinadores) $patrocinadores = array();
			for ($i = (3-count($patrocinadores)); $i > 0 ; $i--) { 
				$patrocinadores[] = clone $patrocinador;
			}
		}

		foreach ($patrocinadores as $key => $patrocinador) {
			if (file_exists(base_url(base_url("assets/uploads/patrocinadores/{$patrocinador->id}")))) {
				$patrocinadores[$key]->imagem = base_url("assets/uploads/patrocinadores/{$patrocinador->id}");
			} else {
				$patrocinadores[$key]->imagem = base_url("assets/imagens/anuncie.png");
			}
		}
		// adicionando o patrocinador padrao
		$patrocinadores[] = clone $patrocinador;
// echo '<pre>';print_r($patrocinadores);
		return $patrocinadores;
	}
}
