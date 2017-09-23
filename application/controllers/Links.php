<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Exibe links de sites e redes sociais relacionados a instituicao
*
* > CONFIGURACAO UPLOAD
* - diretorio padrao para imagens: assets/uploads/link
* - formato para imagens jpg|jpeg|png
* - nome da imagem: id da histora
*/
class Links extends MY_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model(array("Link_model"));
		$this->load->helper(array('datas'));
		$this->dadosView['template'] = 'admin';
    }

	public function index() {
		$this->paginaAdministrativa();

		$this->dadosView['tuplas'] = $this->Link_model->pegueTodos();
		$this->dadosView['pagina'] = 'admin/links/index.php';
		$this->load->view('admin/container.php',$this->dadosView);
	}

	public function exibir() {

		$id = $this->uri->segment(4);
		if (empty($id)) {show_404();}

		$this->dadosView['action'] = base_url("links/atualizar");
		$this->dadosView['objetivo'] = 'exibir';
		$this->dadosView['pagina'] = 'admin/links/_form.php';
		$this->dadosView['tupla'] = $this->Link_model->ache($id);
		$this->load->view('admin/container.php',$this->dadosView);
	}

	public function cadastrar() {

		$this->paginaAdministrativa();
		$tupla = new stdClass();
		$tupla->status = 1;
		$tupla->tipo = 1;
		$this->dadosView['action'] = base_url("admin/links/criar");
		$this->dadosView['objetivo'] = 'cadastrar';
		$this->dadosView['pagina'] = 'admin/links/_form.php';
		$this->dadosView['tupla'] = array($tupla);

		$this->load->view('admin/container.php',$this->dadosView);
	}

	public function criar() {
		$this->paginaAdministrativa();

		if ($this->Link_model->validacoesSave() === false) {
			$_SESSION['erro'] = validation_errors();
			redirect(base_url("admin/links/cadastrar"));
		}

		$dados = array(
			'site' => $this->input->post('site'),
			'link' => $this->input->post('link'),
			'tipo' => $this->input->post('tipo'),
			'icone' => $this->input->post('icone'),
			'status' => $this->input->post('status'),
		);

		$this->setFlashMensage(['tipo' => $this->Link_model->inserir($dados),'str' => 'criar']);
		redirect(base_url("admin/links"));
	}

	public function editar() {
		$this->paginaAdministrativa();
		$id = $this->input->post('id');

		$this->dadosView['action'] = base_url("links/atualizar");
		$this->dadosView['objetivo'] = 'atualizar';
		$this->dadosView['tupla'] = $this->Link_model->ache($id);
		$this->dadosView['pagina'] = 'admin/links/_form.php';

		$this->load->view('admin/container.php',$this->dadosView);
	}

	public function atualizar() {
		$this->paginaAdministrativa();
		$id = $this->input->post('id');
		$dados = array(
			'site' => $this->input->post('site'),
			'link' => $this->input->post('link'),
			'tipo' => $this->input->post('tipo'),
			'icone' => $this->input->post('icone'),
			'status' => $this->input->post('status'),
		);

		$this->setFlashMensage(['tipo' => $this->Link_model->atualiza($id, $dados),'str' => 'atualizar']);
		redirect(base_url("admin/links"));
	}

	public function excluir() {
		$this->paginaAdministrativa();
		$id = $this->input->post('id');
		// bloqueando edicoes de tipos internos
		if($this->Link_model->ache($id)[0]->tipo == 1) {
			$this->setFlashMensage(['customizada' => ['tipo' => 'info', 'msg' => "Não é possivel excluir links internos, somente inativar.\n Para isso edite-o e altere o status para inativo."]]);
			redirect(base_url("admin/links"));
		}


		$this->setFlashMensage(['tipo' => $this->Link_model->deletar($id), 'str' => 'excluir']);
		redirect(base_url("admin/links"));
	}
}