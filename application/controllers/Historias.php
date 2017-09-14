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

		if ($this->ehAdmin()) {
			$id = $this->uri->segment(4);
			if (empty($id)) {show_404();}
			$this->dadosView['pagina'] = 'admin/historias/exibir.php';
			// $this->load->view('admin/container.php',$this->dadosView);
			$template = 'admin/container.php';
		} else {
			$id = $this->uri->segment(2);
			if (empty($id)) {show_404();}
			$this->dadosView['pagina'] = 'site/historias.php';
			$this->dadosView['template'] = 'site';
			// $this->load->view('container_externo.php',$this->dadosView);
			$template = 'container_externo.php';
		}

		$this->dadosView['historia'] = $this->Historia_model->ache($id);
		$this->load->view($template,$this->dadosView);
	}

	public function cadastrar() {

		$this->paginaAdministrativa();
		$historia = new stdClass();
		$historia->status = 1;
		$this->dadosView['action'] = base_url("admin/historias/criar");
		$this->dadosView['btnSubmit'] = 'Cadastrar';
		$this->dadosView['pagina'] = 'admin/historias/_form.php';
		$this->dadosView['historia'] = array($historia);

		$this->load->view('admin/container.php',$this->dadosView);
	}

	public function criar() {
		$this->paginaAdministrativa();

		if ($this->Historia_model->validacoesSave() === false) {
			$_SESSION['erro'] = validation_errors();
			redirect(base_url("admin/historias/cadastrar"));
		}

		$dados = array(
			'titulo' => $this->input->post('titulo'),
			'status' => $this->input->post('status'),
			'conteudo' => $this->input->post('conteudo')
		);

		if ($this->Historia_model->inserir($dados)) {
        	$_SESSION['sucesso'] = "História criada com sucesso!";
		} else {
			$_SESSION['erro'] = "Erro ao criar histótia! contate o administrador do sistema.";
		}

		redirect(base_url("historias"));
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

		if ($this->Historia_model->deletar($id)) {
        	$_SESSION['sucesso'] = "História removida com sucesso";
		} else {
			$_SESSION['erro'] = "Erro ao remover histótia! contate o administrador do sistema.";
		}
		redirect(base_url("historias"));
	}
}