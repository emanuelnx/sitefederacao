
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	protected $dadosView = array();

	public function __construct() {
        parent::__construct();
        $this->dadosView['tituloPagina'] = TITULOPAGINA;
        $this->dadosView['erro'] = false;
        $this->dadosView['sucesso'] = false;
        $this->dadosView['assets'] = array(
        	/*'css' => array(),
        	'js' => array(
        		'footer' => array(),
        		'head' => array()
        	),*/
        );
    }

	protected function addJs($arquivos, $local = 'footer',$template = false) {
		$arquivos = is_string($arquivos) ? array($arquivos) : $arquivos;
		$local = ($local === 'head' || $local === 'footer') ? $local : 'footer';

        if ($template) {
            $this->dadosView['assets']['js'][$template][$local] = $arquivos;
        } else {
            $this->dadosView['assets']['js']['compartilhado'][$local] = $arquivos;
        }
        
	}

	protected function addCss($arquivos,$template = false) {
		$arquivos = is_string($arquivos) ? array($arquivos) : $arquivos;

        if ($template) {
            $this->dadosView['assets'][$template]['css'] = $arquivos;
        } else {
            $this->dadosView['assets']['compartilhado']['css'] = $arquivos;
        }
	}
}
