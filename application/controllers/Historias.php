<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Exibe historias institucionais
*
* > CONFIGURACAO UPLOAD
* - diretorio padrao para imagens: assets/uploads/historias
* - formato para imagens jpg|jpeg|png
* - nome da imagem: id da histora
*/
class Historias extends MY_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model(array("Historia_model"));
		$this->load->helper('datas');
    }

	/**
	* metodo especifico para o layout site
	* Exibe as informacoes de um registro especifico.
	*/
	public function exibirSite() {

		$id = $this->uri->segment(2);

		$this->dadosView['historia'] = $this->Historia_model->ache($id);
		$this->dadosView['pagina'] = 'site/historias.php';
		$this->dadosView['template'] = 'site';

		$this->load->view('container_externo.php',$this->dadosView);
	}

	/*********************************************************/
	/*             Metodos especificos do admin              */
	/*********************************************************/

	public function index() {
		if (isset($_SESSION['logado']) && $_SESSION['logado'] == 1) {
			$this->dadosView['pagina'] = 'admin/historias.php';
			$this->dadosView['template'] = 'admin';
			$this->load->view('admin/container.php',$this->dadosView);
		} else {
			$this->exibirSite();
		}
	}

	public function exibir() {

		$this->dadosView['historias'] = $this->Historia_model->pegueTodos();
		$this->dadosView['pagina'] = 'admin/listagemHistorias.php';
		$this->dadosView['template'] = 'admin';

		$this->load->view('admin/container.php',$this->dadosView);
	}
	public function cadastrar() {

		$this->dadosView['pagina'] = 'admin/cadastroHistorias.php';
		$this->dadosView['template'] = 'admin';

		$this->load->view('admin/container.php',$this->dadosView);
	}
	public function criar() {
		// implementar
	}
	public function editar() {
		// implementar
	}
	public function atualizar() {
		// implementar
	}
	public function excluir() {
		// implementar
	}
}
