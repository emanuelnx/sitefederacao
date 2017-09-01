<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * classe Usuarios.
 * Responsavel por registrar novos usuarios, logar no sistema e realizar logoff do sistema.
 * 
 * @extends MY_Controller
 */
class Usuarios extends MY_Controller {
	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('Usuario_model');
	}

	public function index() {
		
	}
	
	/**
	 * register function.
	 * 
	 * @access public
	 * @return void
	 */
	public function register() {

		$this->dadosView['pagina'] = 'usuario/register/register.php';
		$this->dadosView['template'] = 'site';
		$this->addJs(
			array('jquery.1.11.1.js', 'bootstrap.js'), 
			'footer', 
			$this->dadosView['template']
		);

		if ($this->Usuario_model->validacoesRegistrar() !== false) {

			$dados = array(
				'id_tipo_usuario' => 1,
				'login' => $this->input->post('login'),
				'email' => $this->input->post('email'),
				'senha' => password_hash($this->input->post('senha'), PASSWORD_BCRYPT),
				'status' => 1
			);

			if (!$this->Usuario_model->inserir($dados)) {
				$this->dadosView['erro'] = 'Houve um problema ao criar sua conta. Tente novamente mais tarde.';
			}
		}

		$this->load->view('container_externo.php',$this->dadosView);	
	}
		
	/**
	 * login function.
	 * 
	 * @access public
	 * @return void
	 */
	public function login() {
		
		if ($this->Usuario_model->validacoesLogar() == false) {
			
			// validacao falhou, envia os erros para a view
			$this->dadosView['pagina'] = 'usuario/login/login.php';
			$this->dadosView['template'] = 'site';
			$this->load->view('container_externo.php',$this->dadosView);
			
		} else {

			$login = $this->input->post('login');
			$senha = $this->input->post('senha');

			$usuario = $this->Usuario_model->achePor(
				"(login = '{$login}' or email = '{$login}') 
				and status = 1
			");
			if (count($usuario) && password_verify($senha, $usuario[0]->senha)) {

				unset($usuario[0]->senha);
				
				$_SESSION['usuario'] = $usuario[0];
				$_SESSION['logged_in'] = (bool)true;

				redirect(base_url("admin"));
				/*$this->dadosView['pagina'] = 'admin/index.php';
				$this->dadosView['template'] = 'admin';
				$this->load->view('admin/container.php',$this->dadosView);*/
				
			} else {				
				// login falhou
				$this->dadosView['erro'] = 'Login ou senha incorretos.';

				$this->dadosView['pagina'] = 'usuario/login/login.php';
				$this->dadosView['template'] = 'site';

				$this->load->view('container_externo.php',$this->dadosView);	
			}	
		}
	}
	
	/**
	 * funcao que realiza o logout do usuario.
	 * 
	 * @access public
	 * @return void
	 */
	public function logout() {
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			
			// remove dados da sessao
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			
			// logout de usuario ok
			$this->dadosView['pagina'] = 'usuario/logout/logout_success.php';
			$this->dadosView['template'] = 'site';

			$this->load->view('container_externo.php',$this->dadosView);
		} else {
			redirect(base_url(), 'GET');
		}
	}
}