<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Exibe noticia da instituicao
*
* > CONFIGURACAO UPLOAD
* - diretorio padrao para imagens: assets/uploads/link
* - formato para imagens jpg|jpeg|png
* - nome da imagem: id da histora
*/
class Noticias extends MY_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model(array("Noticia_model"));
		$this->load->helper(array('datas'));
		$this->dadosView['template'] = 'admin';
    }

	public function index() {
		$this->paginaAdministrativa();

		$this->dadosView['tuplas'] = $this->Noticia_model->pegueTodos();
		$this->dadosView['pagina'] = 'admin/noticias/index.php';
		$this->load->view('admin/container.php',$this->dadosView);
	}

	public function exibir() {

		if ($this->ehAdmin()) {
			$this->load->helper('diretorio');
			$id = $this->uri->segment(4);
			if (empty($id)) {show_404();}
			$this->dadosView['tupla'] = $this->Noticia_model->ache($id);
			$this->dadosView['action'] = base_url("noticias");
			$this->dadosView['pagina'] = 'admin/noticias/_form.php';
			$this->dadosView['objetivo'] = 'exibir';
			$this->dadosView['imagem'] = base_url("assets/imagens/anuncie.png");
			$template = 'admin/container.php';
			$path = upload_path("/noticias/{$id}");

            if ($extensao = existeArquivoPasta($path,array('jpg','jpeg','gif','png'))) {
                $this->dadosView['imagem'] = upload_url("/noticias/{$id}.{$extensao}");
            }
		} else {
			$id = $this->uri->segment(2);
			if (empty($id)) {show_404();}
			$this->dadosView['tupla'] = $this->Noticia_model->ache($id);
			$this->dadosView['pagina'] = 'site/noticia.php';
			$this->dadosView['template'] = 'site';
			$template = 'container_externo.php';
		}

		$this->load->view($template,$this->dadosView);
	}

	public function cadastrar() {

		$this->paginaAdministrativa();
		$tupla = new stdClass();
		$tupla->status = 1;
		$tupla->tipo = 1;
		$this->dadosView['action'] = base_url("admin/noticias/criar");
		$this->dadosView['objetivo'] = 'cadastrar';
		$this->dadosView['pagina'] = 'admin/noticias/_form.php';
		$this->dadosView['tupla'] = array($tupla);

		$this->load->view('admin/container.php',$this->dadosView);
	}

	public function criar() {
		$this->paginaAdministrativa();

		if ($this->Noticia_model->validacoesSave() === false) {
			$_SESSION['erro'] = validation_errors();
			redirect(base_url("admin/noticias/cadastrar"));
		}

		$dados = array(
			'site' => $this->input->post('site'),
			'link' => $this->input->post('link'),
			'tipo' => $this->input->post('tipo'),
			'icone' => $this->input->post('icone'),
			'status' => $this->input->post('status'),
		);

		$this->setFlashMensage(['tipo' => $this->Noticia_model->inserir($dados),'str' => 'criar']);
		redirect(base_url("admin/noticias"));
	}

	public function editar() {
		$this->paginaAdministrativa();
		$id = $this->input->post('id');

		$this->dadosView['action'] = base_url("noticias/atualizar");
		$this->dadosView['objetivo'] = 'atualizar';
		$this->dadosView['tupla'] = $this->Noticia_model->ache($id);
		$this->dadosView['pagina'] = 'admin/noticias/_form.php';

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

		$this->setFlashMensage(['tipo' => $this->Noticia_model->atualiza($id, $dados),'str' => 'atualizar']);
		redirect(base_url("admin/noticias"));
	}

	public function excluir() {
		$this->paginaAdministrativa();
		$id = $this->input->post('id');

		$this->setFlashMensage(['tipo' => $this->Noticia_model->deletar($id), 'str' => 'excluir']);
		redirect(base_url("admin/noticias"));
	}
}