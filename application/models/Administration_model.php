<?php
	class Administration_model extends CI_Model
	{
		public function __construct(){
			parent::__construct();
			
		}

		function getUserPrivilage($admin_id)
		{
			return $this->db->select('*')->from('admin_menu_prev')->where('admin_id', $admin_id)->get();
		}

		function getDetailAdmin($where)
		{
			return $this->db->select('*')->from('admin')->where($where)->get();
		}

		function saveAdmin($dataSave)
		{
			$this->db->insert('admin',$dataSave);
			return $this->db->affected_rows();
		}

		function updateAdmin($dataUpdate,$where)
		{
			$this->db->where($where);
			$this->db->update('admin',$dataUpdate);
			return $this->db->affected_rows();
		}

		function getDataAdministration($start,$limit,$search)
		{
			$sql = "SELECT id, username, fullname, email, level, status FROM admin ";
			if(!empty($search)){
				$sql .= "WHERE username LIKE '%".$search."%' OR fullname LIKE '%".$search."%' OR email LIKE '%".$search."%'";
			}
			$sql .= " LIMIT ?,?";
			return $this->db->query($sql, array($start, $limit));
		}

		function getTotalDataAdministration($search)
		{
			$sql = "SELECT id, username, fullname, email, level, status FROM admin ";
			if(!empty($search)){
				$sql .= "WHERE username LIKE '%".$search."%' OR fullname LIKE '%".$search."%' OR email LIKE '%".$search."%'";
			}

			return $this->db->query($sql);
		}

		function resetPassword($where,$post)
		{
			$this->db->update('admin',$post,$where);
			return $this->db->affected_rows();
		}

		function getUserPrevilage($adminId)
		{
			return $this->db->select('*')->from('admin_menu_prev')->where('admin_id',$adminId)->get();
		}

		function deleteAdminMenuPrev($dataWhere)
		{
			$this->db->where($dataWhere);
			$this->db->delete('admin_menu_prev');
			return $this->db->affected_rows();
		}

		function saveAdminMenuPrev($dataSave)
		{
			$this->db->insert('admin_menu_prev',$dataSave);
			return $this->db->affected_rows();
		}

		function getAdmin(){
			return $this->db->get('admin');
		}

		function send_message($post){
			$this->db->insert('chat',$post);
			return $this->db->affected_rows();
		}

		function getChatUser($user){
			$this->db->from('chat');
			$this->db->where('sender', $user);
			$this->db->or_where('receiver', $user);
			$this->db->order_by('id','ASC');
			return $this->db->get();
		}
	}
?>