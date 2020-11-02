<?php 
	if(! defined('BASEPATH')) exit('No direct script access allowed');

	class Administer extends MY_Controller{
		function __construct(){
			parent::__construct();
			$this->load->helper(array('form','url'));
			$this->load->library(array('form_validation','session'));
		}

		function index(){
			$this->login();
		}

		function login(){
			$this->load->library('form_validation');
			$this->head_params('Login Administer','','','','');
			$this->form_validation->set_rules('username','Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if($this->form_validation->run() == FALSE){
				$this->load->view('admin/login_view',$this->data);
			}
			else
			{
				$user = $this->input->post('username');
				$pass = $this->input->post('password');
				$this->load->library('access');
				$checkLogin = $this->access->checkLoginAdmin($user,$pass);
				if(!empty($checkLogin))
				{
					redirect('admin/main');
				}
			}
		}
	}
?>