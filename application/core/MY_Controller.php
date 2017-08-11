
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	protected $dadosView = array();

	public function __construct() {
        parent::__construct();
        $dadosView['tituloPagina'] = TITULOPAGINA;
        $dadosView['assets'] = array(
        	'css' => array(),
        	'js' => array(
        		'footer' => array(),
        		'head' => array()
        	),
        );
    }

	protected function addJs($arquivos, $local = 'foot') {
		$arquivos = is_string($arquivos) ? array($arquivos) : $arquivos;
		$local = ($local === 'head' || $local === 'foot') ? $local : 'foot';
		$this->dadosView['assets']['js'][$local] = $arquivos;
	}

	protected function addCss($arquivos) {
		$arquivos = is_string($arquivos) ? array($arquivos) : $arquivos;
		$this->dadosView['assets']['css'] = $arquivos;
	}
}
