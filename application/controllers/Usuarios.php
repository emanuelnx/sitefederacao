<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User class.
 * 
 * @extends CI_Controller
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

		// load form helper and validation library
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('login', 'login', 'trim|required|alpha_numeric|min_length[4]|is_unique[users.login]', array('is_unique' => 'This login already exists. Please choose another one.'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('senha', 'senha', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('senha_confirm', 'Confirm senha', 'trim|required|min_length[6]|matches[senha]');
		
		$this->dadosView['pagina'] = 'user/register/register';
		$this->dadosView['template'] = 'site';
		if ($this->form_validation->run() !== false) {

			// set variables from the form
			$login = $this->input->post('login');
			$email = $this->input->post('email');
			$senha = $this->input->post('senha');
			
			if (!$this->Usuario_model->create_user($login, $email, $senha)) {
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
		
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('login', 'login', 'required|alpha_numeric');
		$this->form_validation->set_rules('senha', 'senha', 'required');
		
		if ($this->form_validation->run() == false) {
			
			// validation not ok, send validation errors to the view
			$this->load->view('header');
			$this->load->view('user/login/login');
			$this->load->view('footer');
			
		} else {
			
			// set variables from the form
			$login = $this->input->post('login');
			$senha = $this->input->post('senha');
			
			if ($this->Usuario_model->resolve_user_login($login, $senha)) {
				
				$user_id = $this->Usuario_model->get_user_id_from_login($login);
				$user    = $this->Usuario_model->get_user($user_id);
				
				// set session user datas
				$_SESSION['user_id']      = (int)$user->id;
				$_SESSION['login']     = (string)$user->login;
				$_SESSION['logged_in']    = (bool)true;
				$_SESSION['is_confirmed'] = (bool)$user->is_confirmed;
				$_SESSION['is_admin']     = (bool)$user->is_admin;
				
				// user login ok
				$this->load->view('header');
				$this->load->view('user/login/login_success', $data);
				$this->load->view('footer');
				
			} else {
				
				// login failed
				$data->error = 'Wrong login or senha.';
				
				// send error to the view
				$this->load->view('header');
				$this->load->view('user/login/login', $data);
				$this->load->view('footer');
				
			}
			
		}
		
	}
	
	/**
	 * logout function.
	 * 
	 * @access public
	 * @return void
	 */
	public function logout() {
		
		// create the data object
		$data = new stdClass();
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			
			// remove session datas
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			
			// user logout ok
			$this->load->view('header');
			$this->load->view('user/logout/logout_success', $data);
			$this->load->view('footer');
		} else {
			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			redirect('/');	
		}
	}
}