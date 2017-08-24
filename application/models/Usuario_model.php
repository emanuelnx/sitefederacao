<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Usuario_model extends MY_Model {
	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		$this->table = 'usuario';
		parent::__construct();
	}

	/**
	 * Validacoes para registro de usuario.
	 * 
	 * @access public
	 * @return void
	 */
	public function validacoesRegistrar() {

		$this->load->library('form_validation');
		
		// configurando regras de validacao
		$this->form_validation->set_rules(
			'login', 
			'login', 
			'trim|required|alpha_numeric|min_length[4]|is_unique[usuario.login]',
			array(
				'is_unique' => 'Este usuário já existe.',
				'required' => 'Login é obrigatório',
				'min_length' => 'Login não pode possuir menos de 4 caracteres',
				'alpha_numeric' => 'Apenas letras e números são aceitos.'
			)
		);
		$this->form_validation->set_rules(
			'email',
			'Email',
			'trim|required|valid_email|is_unique[usuario.email]',
			array(
				'is_unique' => 'E-mail já cadastrado. Por favor, escolha outro.',
				'valid_email' => 'Formato do e-mail inválido.',
				'required' => 'E-mail é obrigatório.'
			)
		);
		$this->form_validation->set_rules(
			'senha',
			'senha',
			'trim|required|min_length[6]',
			array(
				'min_length' => 'Senha deve possuir no mínimo 6 caracteres.',
				'required' => 'Senha é obrigatória.'
			)
		);
		$this->form_validation->set_rules(
			'senha_confirm',
			'Confirm senha',
			'trim|required|min_length[6]|matches[senha]',
			array(
				'matches' => 'Senha e Confimação de senha devem ser iguais.',
				'required' => 'Confimação de senha é obrigatória.'
			)
		);

		return $this->form_validation->run();
	}
	
	/**
	 * validacoes para login de usuario.
	 * 
	 * @access public
	 * @return bool
	 */
	public function validacoesLogar() {
		$this->load->library('form_validation');

		$this->form_validation->set_rules(
			'login',
			'login',
			'required|alpha_numeric',
			array(
				'required' => 'Login é obrigatório',
				'alpha_numeric' => 'Apenas letras e números são aceitos.'
			)
		);
		$this->form_validation->set_rules('senha', 'senha', 'required', array('required' => 'Senha é obrigatória'));
		
		return $this->form_validation->run();
	}
}