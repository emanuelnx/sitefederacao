<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	protected $dadosView = array();

	public function __construct() {
        parent::__construct();
        session_start();
        $this->dadosView['tituloPagina'] = TITULOPAGINA;
        $this->dadosView['info'] = false;
        $this->dadosView['erro'] = false;
        $this->dadosView['sucesso'] = false;
        $this->dadosView['assets'] = array(
        	/*'css' => array(),
        	'js' => array(
        		'footer' => array(),
        		'head' => array()
        	),*/
        );

        $this->setMensagens();
    }

    /**
    * Seta os valores de sucesso e erro no array que eh enviado para a view.
    */
    private function setMensagens() {
        if (isset($_SESSION['erro'])) {
            $this->dadosView['erro'] = $_SESSION['erro'];
            unset($_SESSION['erro']);
        }

        if (isset($_SESSION['sucesso'])) {
            $this->dadosView['sucesso'] = $_SESSION['sucesso'];
            unset($_SESSION['sucesso']);
        }

        if (isset($_SESSION['info'])) {
            $this->dadosView['info'] = $_SESSION['info'];
            unset($_SESSION['info']);
        }
    }

    protected function ehAdmin() {
        return (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1) ? true : false;
    }

    protected function paginaAdministrativa() {
        if (!$this->ehAdmin()) {
            show_404();
        }
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
