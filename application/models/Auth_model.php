<?php 
class Auth_Model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function checkLogin($u, $p)
	{
		return $this->db->select('*')
						->from('admin')
						->where('username', $u)
						->where('password', $p)
						->where('status', 1)
						->get();
	}
}
?>