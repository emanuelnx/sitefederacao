<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Exibe patrocinadores da instituicao
*
* > CONFIGURACAO UPLOAD
* - diretorio padrao para imagens: assets/uploads/patrocinadores
* - formato para imagens jpg|jpeg|png
* - nome da imagem: id do patrocinador
*/
class Patrocinadores extends MY_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model(array("Patrocinador_model"));
		$this->load->helper(array('datas'));
		$this->dadosView['template'] = 'admin';
    }

	public function index() {
		$this->paginaAdministrativa();

		$this->dadosView['patrocinadores'] = $this->Patrocinador_model->pegueTodos();
		$this->dadosView['pagina'] = 'admin/patrocinadores/index.php';
		$this->load->view('admin/container.php',$this->dadosView);
	}

	public function exibir() {

		if ($this->ehAdmin()) {
			$id = $this->uri->segment(4);
			if (empty($id)) {show_404();}
			$this->dadosView['pagina'] = 'admin/patrocinadores/exibir.php';
			$template = 'admin/container.php';
		} else {
			$id = $this->uri->segment(2);
			if (empty($id)) {show_404();}
			$this->dadosView['pagina'] = 'site/patrocinadores.php';
			$this->dadosView['template'] = 'site';
			$template = 'container_externo.php';
		}

		$this->dadosView['patrocinador'] = $this->Patrocinador_model->ache($id);
		$this->load->view($template,$this->dadosView);
	}

	public function cadastrar() {

		$this->paginaAdministrativa();
		$patrocinador = new stdClass();
		$patrocinador->status = 1;
		$this->dadosView['action'] = base_url("admin/patrocinadores/criar");
		$this->dadosView['btnSubmit'] = 'Cadastrar';
		$this->dadosView['pagina'] = 'admin/patrocinadores/_form.php';
		$this->dadosView['patrocinador'] = array($patrocinador);

		$this->load->view('admin/container.php',$this->dadosView);
	}

	public function criar() {
		$this->paginaAdministrativa();

		if ($this->Patrocinador_model->validacoesSave() === false) {
			$_SESSION['erro'] = validation_errors();
			redirect(base_url("admin/patrocinadores/cadastrar"));
		}

		$dados = array(
			'titulo' => $this->input->post('titulo'),
			'status' => $this->input->post('status'),
			'conteudo' => $this->input->post('conteudo'),
			'subtitulo' => $this->input->post('subtitulo')
		);

		if ($this->Patrocinador_model->inserir($dados)) {
        	$_SESSION['sucesso'] = "História criada com sucesso!";
		} else {
			$_SESSION['erro'] = "Erro ao criar histótia! contate o administrador do sistema.";
		}

		redirect(base_url("patrocinadores"));
	}

	public function editar() {
		$this->paginaAdministrativa();
		$id = $this->input->post('id');

		$this->dadosView['action'] = base_url("patrocinadores/atualizar");
		$this->dadosView['btnSubmit'] = 'Atualizar';
		$this->dadosView['patrocinador'] = $this->Patrocinador_model->ache($id);
		$this->dadosView['pagina'] = 'admin/patrocinadores/_form.php';

		$this->load->view('admin/container.php',$this->dadosView);
	}

	public function atualizar() {
		$this->paginaAdministrativa();
		$id = $this->input->post('id');
		$dados = array(
			'titulo' => $this->input->post('titulo'),
			'status' => $this->input->post('status'),
			'conteudo' => $this->input->post('conteudo'),
			'subtitulo' => $this->input->post('subtitulo')
		);

		if ($this->Patrocinador_model->atualiza($id, $dados)) {
        	$_SESSION['sucesso'] = "História atualizada com sucesso";
		} else {
			$_SESSION['erro'] = "Erro ao atualizar histótia! contate o administrador do sistema.";
		}
		redirect(base_url("patrocinadores"));
	}

	public function excluir() {
		$this->paginaAdministrativa();
		$id = $this->input->post('id');

		if ($this->Patrocinador_model->deletar($id)) {
        	$_SESSION['sucesso'] = "História removida com sucesso";
		} else {
			$_SESSION['erro'] = "Erro ao remover histótia! contate o administrador do sistema.";
		}
		redirect(base_url("patrocinadores"));
	}
}