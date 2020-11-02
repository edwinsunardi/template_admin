<?php
class MY_Controller extends CI_Controller
{
	public $data;
	public $CI;
	public $db;
	
	function __construct()
	{
		parent::__construct();
			$this->CI =& get_instance();
			$this->data['active_menu'] = 'home';
			$this->db = $this->load->database('default',true);	
		
	}

	function head_params($title='', $meta_keyword='', $meta_desc='', $custom_css='', $custom_js='')
    {
	
		$this->params['title'] 		= empty($title)? $this->config->item('title_default') : $title.' - '.$this->config->item('title_tail');
		$this->params['meta_keyword'] 	= empty($meta_keyword)? $this->config->item('meta_keyword_default') : $meta_keyword;
		$this->params['meta_desc'] 	= empty($meta_desc)? $this->config->item('meta_desc_default') : $meta_desc;
		$this->params['custom_css'] 	= $custom_css;
		$this->params['custom_js'] 	= $custom_js;
		return $this->params;
    }	
}

class MY_Admin extends MY_Controller
{
	public $data;
	function __construct()
	{
		parent::__construct();
		$this->data['admin_login'] = $this->session->userdata('admin_login');
		$this->data['admin_id'] = $this->session->userdata('admin_id');
		$this->data['admin_username'] = $this->session->userdata('admin_username');
		$this->data['admin_fullname'] = $this->session->userdata('admin_fullname');
		$this->data['admin_level'] = $this->session->userdata('admin_level');

		if(!$this->data['admin_login'] || !$this->data['admin_id']) redirect('administer');
		$this->CI->load->model('administration_model');

		$getUserPrivilage = $this->CI->administration_model->getUserPrivilage($this->data['admin_id']);
		$privilage = array();
		foreach($getUserPrivilage->result() as $menu)
		{
			$privilage[] = $menu->menu_id;
		}
		$this->load->library('navigation');
		$this->data['privilage'] = $privilage;

		$adminMenuByPrev = $this->general_model->getAdminMenuUrlByPrev($privilage);
		$allowedUrl = array();
		foreach($adminMenuByPrev->result() as $menu)
		{
			$allowedUrl[] = $menu->menu_url;
		}
		if(uri_string() != 'admin/main' && strposa(uri_string(),$allowedUrl) === true){

		}
		else
		{
			$getAdminMenu = $this->general_model->getAdminMenu();
			$adminMenu = array();
			foreach($getAdminMenu->result() as $row)
			{
				$adminMenu[] = $row->menu_url;
			}
			if(uri_string()!='admin_main' && strposa(uri_string(), $adminMenu))
			{
				redirect('admin/man');exit();
			}
		}

		$this->data['active_menu'] = 'none';
		$this->data['active_sub_menu'] = 'none';
		$this->data['active_sub_menu2'] = 'none';
		$this->data['active_sub_menu3'] = 'none';
	}

	function setFlashData($type, $data)
	{
		if($type == 'success')
		{
			$this->session->set_flashdata('information', '<div class="alert alert-dismissable alert-success information">'.$data.'</div>');
		}
		elseif($type =='error')
		{
			$this->session->set_flashdata('information', '<div class="alert alert-danger alert-dismissible">'.$data.'</div>');
		}
		elseif($type == 'info')
		{
			$this->session->set_flashdata('information', '<div class="alert alert-success alert-dismissible">'.$data.'</div>');

		}
	}


}
?>