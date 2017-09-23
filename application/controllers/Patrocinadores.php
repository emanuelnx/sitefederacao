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
	/**
	* definimos o path onde o arquivo será gravado
	* @var String
	*/
	private $pastaUpload = 'patrocinadores';

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
			$this->load->helper('diretorio');
			$id = $this->uri->segment(4);
			if (empty($id)) {show_404();}
			$this->dadosView['tupla'] = $this->Patrocinador_model->ache($id);
			$this->dadosView['action'] = base_url("links");
			$this->dadosView['pagina'] = 'admin/patrocinadores/_form.php';
			$this->dadosView['objetivo'] = 'exibir';
			$this->dadosView['imagem'] = base_url("assets/imagens/anuncie.png");
			$template = 'admin/container.php';
			$path = upload_path("/patrocinadores/{$id}");

            if ($extensao = existeArquivoPasta($path,array('jpg','jpeg','gif','png'))) {
                $this->dadosView['imagem'] = upload_url("/patrocinadores/{$id}.{$extensao}");
            }
		} else {
			$id = $this->uri->segment(2);
			if (empty($id)) {show_404();}
			$this->dadosView['tupla'] = $this->Patrocinador_model->ache($id);
			$this->dadosView['pagina'] = 'site/patrocinadores.php';
			$this->dadosView['template'] = 'site';
			$template = 'container_externo.php';
		}

		$this->load->view($template,$this->dadosView);
	}

	public function cadastrar() {

		$this->paginaAdministrativa();
		$tupla = new stdClass();
		$tupla->status = 1;
		$this->dadosView['action'] = base_url("admin/patrocinadores/criar");
		$this->dadosView['objetivo'] = 'cadastrar';
		$this->dadosView['pagina'] = 'admin/patrocinadores/_form.php';
		$this->dadosView['tupla'] = array($tupla);

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

		if ($id = $this->Patrocinador_model->inserir($dados)) {
			if($this->Upload($id) !== true) {
				$this->setFlashMensage(['tipo' => false,'str' => 'salvar a imagem']);
			}
		}
		$this->setFlashMensage(['tipo' => $id,'str' => 'criar']);

		redirect(base_url("admin/patrocinadores"));
	}

	public function editar() {
		$this->paginaAdministrativa();
		$id = $this->input->post('id');

		$this->dadosView['action'] = base_url("patrocinadores/atualizar");
		$this->dadosView['objetivo'] = 'Atualizar';
		$this->dadosView['tupla'] = $this->Patrocinador_model->ache($id);
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

		if($this->Upload($id) !== true) {
			$this->setFlashMensage(['tipo' => false,'str' => 'salvar a imagem']);
		}
		$this->setFlashMensage(['tipo' => $this->Patrocinador_model->atualiza($id, $dados),'str' => 'atualizar']);

		redirect(base_url("admin/patrocinadores"));
	}

	public function excluir() {
		$this->paginaAdministrativa();
		$id = $this->input->post('id');
		$this->setFlashMensage(['tipo' => $this->Patrocinador_model->deletar($id), 'str' => 'excluir']);
		// excluindo a imagem
		unlink($this->pathUpload.$this->pastaUpload.'/'.$id);

		redirect(base_url("admin/patrocinadores"));
	}

	// Método que processar o upload do arquivo
    public function Upload($nome){
    	if (empty($_FILES['userfile']['name'])) {
    		return true;
    	}
	    $path = $this->pathUpload.$this->pastaUpload;
	    $this->load->helper('diretorio');
	    criarPastas($path);
 
        // definimos as configurações para o upload
        // determinamos o path para gravar o arquivo
        $config['upload_path'] = $path;
        // definimos - através da extensão - os tipos de arquivos suportados
        $config['allowed_types'] = 'jpg|png|gif';
        // sobreescreve os arquivos com mesmo nome.
        $config['overwrite'] = true;
        // alterando o nome do arquivo
        $config['file_name'] = $nome;

        // passamos as configurações para a library upload
        $this->load->library('upload', $config);
 
        // verificamos se o upload foi processado com sucesso
        if (!$this->upload->do_upload()) {
            // retornando o erro.
            return $this->upload->display_errors();
        }
		//var_dump($this->upload->data()); //recuperamos os dados do arquivo
        return true;
    }
}