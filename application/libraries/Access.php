<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');
class Access
{
	public $CI;

	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('auth_model');
	}

	function checkLoginAdmin($u,$p)
	{
		$checkLogin = $this->CI->auth_model->checkLogin($u, md5($p.$this->CI->config->item('salt')));
		if($checkLogin->num_rows() > 0)
		{
			$admin_row = $checkLogin->row();
			$this->CI->session->set_userdata('admin_login', true);
			$this->CI->session->set_userdata('admin_id', $admin_row->id);
			$this->CI->session->set_userdata('admin_username', $admin_row->username);
			$this->CI->session->set_userdata('admin_fullname', $admin_row->fullname);
			$this->CI->session->set_userdata('admin_password', $admin_row->password);
			$this->CI->session->set_userdata('admin_level',$admin_row->level);
		}
		else
		{
			$this->CI->session->set_flashdata('information','<div class="alert alert-dismissable alert-danger information"><h4>Error</h4>Username / Password tidak terdaftar</div>');
				redirect('administer/login');
		}
		return $admin_row;
	}
}
?>