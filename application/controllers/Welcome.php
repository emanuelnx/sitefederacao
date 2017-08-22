<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function __construct() {
        parent::__construct();
    }

	public function index() {

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
}
