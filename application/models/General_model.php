<?php
class General_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		
	}

	function getNavigationByParentId($parent_id)
	{
		$query = $this->db->select('*')->
		from('admin_menu')
		->where('menu_parent_id',$parent_id)
		->where('menu_status',1)
		->order_by('menu_order','ASC')
		->get()->result_array();
		
		return $query;
	}		

	function generateTreeNavigationAdmin(&$tree, $parent_id){
		$res = $this->getNavigationByParentId($parent_id);
		$i=0;
		foreach($res as $key => $val){
			$tree[] = array('data' => $val, 'child'=> array());
			$this->generateTreeNavigationAdmin($tree[$i++]['child'], $val['id']);
		}
	}

	function getAdminMenuUrlByPrev($id = array())
	{
		return $this->db->select('menu_url')->from('admin_menu')->where('menu_status',1)->where('menu_url<>','javascript:;')->where_in('id', $id)->get();
	}

	function getAdminMenu(){
		return $this->db->select('*')->from('admin_menu')->where('menu_status',1)->get();
	}
}
?>