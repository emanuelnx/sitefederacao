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
		$this->load->helper(array('datas'));
		$this->dadosView['template'] = 'admin';
    }

	public function index() {
		$this->paginaAdministrativa();

		$this->dadosView['historias'] = $this->Historia_model->pegueTodos();
		$this->dadosView['pagina'] = 'admin/historias/index.php';
		$this->load->view('admin/container.php',$this->dadosView);
	}

	public function exibir() {
		$id = $this->uri->segment(2);
		if (empty($id)) {
			show_404();
		}

		$this->dadosView['historia'] = $this->Historia_model->ache($id);

		if ($this->ehAdmin()) {
			$this->dadosView['pagina'] = 'admin/historias/index.php';
			$this->load->view('admin/container.php',$this->dadosView);
		} else {
			$this->dadosView['pagina'] = 'site/historias.php';
			$this->dadosView['template'] = 'site';
			$this->load->view('container_externo.php',$this->dadosView);
		}
	}

	public function cadastrar() {
		$this->paginaAdministrativa();

		$this->dadosView['action'] = base_url("historias");
		$this->dadosView['btnSubmit'] = 'Cadastrar';
		$this->dadosView['pagina'] = 'admin/historias/_form.php';

		$this->load->view('admin/container.php',$this->dadosView);
	}

	public function criar() {
		$this->paginaAdministrativa();
		// implementar
		echo 'criar';
	}

	public function editar() {
		$this->paginaAdministrativa();
		$id = $this->input->post('id');

		$this->dadosView['action'] = base_url("historias/atualizar");
		$this->dadosView['btnSubmit'] = 'Atualizar';
		$this->dadosView['historia'] = $this->Historia_model->ache($id);
		$this->dadosView['pagina'] = 'admin/historias/_form.php';

		$this->load->view('admin/container.php',$this->dadosView);
	}

	public function atualizar() {
		$this->paginaAdministrativa();
		$id = $this->input->post('id');
		$dados = array(
			'titulo' => $this->input->post('titulo'),
			'status' => $this->input->post('status'),
			'conteudo' => $this->input->post('conteudo')
		);

		if ($this->Historia_model->atualiza($id, $dados)) {
        	$_SESSION['sucesso'] = "História atualizada com sucesso";
		} else {
			$_SESSION['erro'] = "Erro ao atualizar histótia! contate o administrador do sistema.";
		}
		redirect(base_url("historias"));
	}

	public function excluir() {
		$this->paginaAdministrativa();
		$id = $this->input->post('id');
		// implementarSSS
		echo 'excluir '.$id;
	}
}