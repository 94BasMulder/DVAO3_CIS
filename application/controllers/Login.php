<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {



	function __construct(){
		parent::__construct();
		$this->load->model('User_Model','User_Model',true);
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login');
	}

	public function process(){
		$user = $this->input->post('user');
		$pwd = $this->input->post('pass');

		$result = $this->User_Model->login($user,$pwd);
		if($result){ echo 'success';
		$this->session->set_userdata(array('user'=> $user));}
		else {
				$data = array('error' => "Password and user do not match");
				$this->load->view('login',$data);

		}
	}


}
