<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH."traits/Upload_unic_trait.php";
require APPPATH."traits/Imagens_trait.php";
/**
* Exibe noticia da instituicao
*
* > CONFIGURACAO UPLOAD
* - diretorio padrao para imagens: assets/uploads/link
* - formato para imagens jpg|jpeg|png
* - nome da imagem: id da histora
*/
class Noticias extends MY_Controller {

	use Upload_unic;
	use Imagens;

	/**
	* definimos o path onde o arquivo será gravado
	* @var String
	*/
	private $pastaUpload = 'noticias';

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
		$this->paginaAdministrativa();

		$this->load->helper('diretorio');
		$id = $this->uri->segment(4);
		if (empty($id)) {show_404();}
		$this->dadosView['tupla'] = $this->Noticia_model->ache($id);
		$this->dadosView['action'] = base_url("noticias");
		$this->dadosView['pagina'] = 'admin/noticias/_form.php';
		$this->dadosView['objetivo'] = 'exibir';
		$this->dadosView['imagem'] = base_url("assets/imagens/anuncie.png");

		$path = upload_path("/noticias/{$id}");

        if ($extensao = existeArquivoPasta($path,array('jpg','jpeg','gif','png'))) {
            $this->dadosView['imagem'] = upload_url("/noticias/{$id}.{$extensao}");
        }

		$this->load->view('admin/container.php',$this->dadosView);
	}

	public function exibirSite() {
		$id = $this->uri->segment(2);
		if (empty($id)) {show_404();}
		$this->dadosView['tupla'] = $this->inserirImagemPadrao($this->Noticia_model->ache($id),'noticias');
		$this->dadosView['pagina'] = 'site/noticia.php';
		$this->dadosView['template'] = 'site';

		$this->load->view('container_externo.php',$this->dadosView);
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
			'titulo' => $this->input->post('titulo'),
			'status' => $this->input->post('status'),
			'conteudo' => $this->input->post('conteudo'),
			'acessos' => 0,
			'aprovacao' => 0,
			'usuario_id' => $_SESSION['usuario']->id,
		);

		if ($id = $this->Noticia_model->inserir($dados)) {
			if($this->Upload($id) !== true) {
				$this->setFlashMensage(['tipo' => false,'str' => 'salvar a imagem']);
			}
		}
		$this->setFlashMensage(['tipo' => $id,'str' => 'criar']);
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
			'titulo' => $this->input->post('titulo'),
			'status' => $this->input->post('status'),
			'conteudo' => $this->input->post('conteudo'),
		);

		if($this->Upload($id) !== true) {
			$this->setFlashMensage(['tipo' => false,'str' => 'salvar a imagem']);
		}

		$this->setFlashMensage(['tipo' => $this->Noticia_model->atualiza($id, $dados),'str' => 'atualizar']);
		redirect(base_url("admin/noticias"));
	}

	public function excluir() {
		$this->paginaAdministrativa();
		$id = $this->input->post('id');

		$this->setFlashMensage(['tipo' => $this->Noticia_model->deletar($id), 'str' => 'excluir']);
		unlink($this->pathUpload.$this->pastaUpload.'/'.$id);
		redirect(base_url("admin/noticias"));
	}
}