<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Usuario_model extends CI_Model {
	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	/**
	 * create_user function.
	 * 
	 * @access public
	 * @param mixed $login
	 * @param mixed $email
	 * @param mixed $senha
	 * @return bool true on success, false on failure
	 */
	public function create_user($login, $email, $senha) {
		
		$data = array(
			'id_tipo_usuario' => 1,
			'login' => $login,
			'email' => $email,
			'senha' => $this->hash_senha($senha),
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('usuario', $data);
	}
	
	/**
	 * resolve_user_login function.
	 * 
	 * @access public
	 * @param mixed $login
	 * @param mixed $senha
	 * @return bool true on success, false on failure
	 */
	public function resolve_user_login($login, $senha) {
		$this->db->select('senha');
		$this->db->from('usuario');
		$this->db->where('login', $login);
		$hash = $this->db->get()->row('senha');
		
		return $this->verify_senha_hash($senha, $hash);
	}
	
	/**
	 * get_user_id_from_login function.
	 * 
	 * @access public
	 * @param mixed $login
	 * @return int the user id
	 */
	public function get_user_id_from_login($login) {
		$this->db->select('id');
		$this->db->from('usuario');
		$this->db->where('login', $login);
		return $this->db->get()->row('id');
	}
	
	/**
	 * get_user function.
	 * 
	 * @access public
	 * @param mixed $user_id
	 * @return object the user object
	 */
	public function get_user($user_id) {
		$this->db->from('usuario');
		$this->db->where('id', $user_id);
		return $this->db->get()->row();
	}
	
	/**
	 * hash_senha function.
	 * 
	 * @access private
	 * @param mixed $senha
	 * @return string|bool could be a string on success, or bool false on failure
	 */
	private function hash_senha($senha) {
		return password_hash($senha, PASSWORD_BCRYPT);
	}
	
	/**
	 * verify_senha_hash function.
	 * 
	 * @access private
	 * @param mixed $senha
	 * @param mixed $hash
	 * @return bool
	 */
	private function verify_senha_hash($senha, $hash) {
		return password_verify($senha, $hash);
	}
}