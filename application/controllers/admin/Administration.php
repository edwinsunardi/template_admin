<?php
class Administration extends MY_Admin
{
	function __construct(){
		parent::__construct();
		$this->load->model(array('auth_model', 'administration_model', 'general_model'));
		$this->data['active_menu'] = 'administration';
	}

	function addAdmin(){
		if($this->data['admin_level'] != 'super administrator') redirect('admin/main');

		$this->head_params('Administration - Add/Update admin','','','
		<link rel="stylesheet" href="'.base_url().'assets/plugins/toastr/toastr.min.css">',
		'<script type="text/javascript" src="'.base_url().'assets/plugins/toastr/toastr.min.js"></script>');

		$this->load->library('form_validation');
		$this->data['title'] = "Add Administration";
		$this->data['active_sub_menu'] = 'administration_listadmin';
		
		$id = $this->uri->segment(4);
		if(!empty($id))
		{
			$this->form_validation->set_rules('fullname', 'Full Name', 'required|trim|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean');
			$this->form_validation->set_rules('level', 'Level', 'required|trim|xss_clean');
			if($this->form_validation->run() == FALSE){
				$this->data['form_title'] = "Edit Admin";
				$this->data['detail_admin'] = $this->administration_model->getDetailAdmin(array('id'=>$id))->row();
				$this->load->view('admin/administration/administration_editadmin_view',$this->data);
			}else{
				$username = $this->input->post('username');
				$fullname = $this->input->post('fullname');
				$email    = $this->input->post('email');
				$level    = $this->input->post('level');
				$status   = $this->input->post('status');
				$dataUpdate = array(
					'username' => $username,
					'fullname' => $fullname,
					'email'    => $email,
					'level'    => $level,
					'status'   => $status
				);

				$dataWhere = array('id'=>$id);
				$updateAdmin = $this->administration_model->updateAdmin($dataUpdate,$dataWhere);
				if($updateAdmin){
					$this->setFlashData('success','Admin berhasil dirubah');
				}
				else
				{
					$this->setFlashData('failed','Admin gagal dirubah');
				}
				redirect('admin/administration/listAdmin');
			}
		}else{
			$this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean');
			$this->form_validation->set_rules('fullname', 'Full Name', 'required|trim|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean');
			$this->form_validation->set_rules('level', 'Level', 'required|trim|xss_clean');

			if($this->form_validation->run() == FALSE){
				$this->data['form_title'] = 'Add Admin';
				$this->load->view('admin/administration/administration_addadmin_view',$this->data);
			}else{
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$fullname = $this->input->post('fullname');
				$email    = $this->input->post('email');
				$level    = $this->input->post('level');
				$status   = isset($_POST['status']) == 1 ? 1 : 0;

				$dataSave = array(
					'username' => $username,
					'fullname' => $fullname,
					'password' => md5($password. $this->config->item('salt')),
					'email'    => $email,
					'level'    => $level,
					'status'   => $status
				);

				$saveAdmin = $this->administration_model->saveAdmin($dataSave);
				if($saveAdmin)
				{
					$this->setFlashData('success','Admin berhasil ditambahkan');
				}
				else
				{
					$this->setFlashData('error','Admin gagal ditambahkan');
				}
				redirect('admin/administration/listAdmin');	
			}
		}
	}

	function listAdmin(){
		$this->head_params('Administration - Administration List','','',
			'<link rel="stylesheet" href="'.base_url().'assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
			<link rel="stylesheet" href="'.base_url().'assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
			<link rel="stylesheet" href="'.base_url().'assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">',
			'<script src="'.base_url().'assets/plugins/datatables/jquery.dataTables.min.js"></script>
			<script src="'.base_url().'assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
			<script src="'.base_url().'assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
			<script src="'.base_url().'assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
			<script src="'.base_url().'assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
			<script src="'.base_url().'assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
			<script src="'.base_url().'assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
			<script src="'.base_url().'assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
			<script src="'.base_url().'assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
	        <script type="text/javascript">
	            $(document).ready(function(){
	                $.ajaxPrefilter( "json script", function( options ) {
	                    options.crossDomain = true;
	                });
	                $("#listData").dataTable({
	                    stateSave: true,
	                    "stateSaveCallback": function (settings, data) {
	                        localStorage.setItem("Datatables_" + window.location.pathname, JSON.stringify(data));
	                    },
	                    "stateLoadCallback": function (settings) {
	                        return JSON.parse(localStorage.getItem("Datatables_" + window.location.pathname));
	                    },
	                    "dom": \'<"bottom"lpf>rt<"top"ip><"clear">\',
	                    "oLanguage": {
	                        "sProcessing": "<i class=\'fa fa-refresh fa-spin\'><\/i> Loading"
	                    },
	                    "processing": true,
	                    "serverSide": true,
	                    "bDestroy": true,
	                    "autoWidth": false,
	                    "ajax": {
	                        "url": BASE_URL +"index.php/admin/administration/ajaxListAdministration",
	                        "type": "POST"
	                    },
	                    
	                    lengthMenu:[[5,10,15,20],[5,10,15,20]],
	                    pageLength:10,
	                    dom:"<\'row\' <\'col-md-12\'B>><\'row\'<\'col-md-6 col-sm-12\'l><\'col-md-6 col-sm-12\'f>r><\'table-scrollable\'t><\'row\'<\'col-md-5 col-sm-12\'i><\'col-md-7 col-sm-12\'p>>",
	                    "lengthChange": false,
	      				"ordering": false,
	                });
	            });
	        </script>
			'
		);	
		$this->data['active_sub_menu'] = 'administration_listadmin';
		$this->load->view('admin/administration/administration_listadmin_view', $this->data);
	}

	function ajaxListAdministration()
	{
		$arrData = array();

		$start = $this->input->post('start');
		$length = $this->input->post('length');
		$draw = $this->input->post('draw');
		$search = $this->input->post('search');

		$getDataAdministration = $this->administration_model->getDataAdministration(intval($start), intval($length), $search['value']);

		// var_dump($getDataAdministration);
		$getTotalDataAdministration = $this->administration_model->getTotalDataAdministration($search['value']);

		if($getDataAdministration->num_rows() > 0)
		{
			$i = ($start == 0) ? 1 : $start+1;
			foreach($getDataAdministration->result() as $row)
			{

				$view = '<a href="#">VIEW</a>';
				//$view = '<button type="button" class="btn btn-block bg-gradient-secondary btn-sm">VIEW</button>';
				$arrData['data'][] = array(
					$i,
					$row->username,
					$row->fullname,
					$row->email,
					$row->level,
					$row->status,
					'<div class="row"><a href="'.base_url().'admin/administration/AddAdmin/'.$row->id.'"><button type="button" class="btn btn-block bg-gradient-primary btn-sm">Edit</button></a><a href="'.base_url().'admin/administration/addPrevilage/'.$row->id.'"><button type="button" class="btn btn-block bg-gradient-secondary btn-sm">Previlage</button></a></div>',
				);
				$i++;
			}
		}
		else
		{
			$arrData['data'] = array();
		}
		$arrData['draw'] = $draw;
		$arrData['recordsTotal'] = $getTotalDataAdministration->num_rows();
		$arrData['recordsFiltered'] = $getTotalDataAdministration->num_rows();
		header('Content-Type: application/json');
		echo json_encode($arrData);
	}

	function resetPass(){
		$username = $this->input->post('username');
		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
		$where = array('username'=>$username);
		$alpnum = substr(str_shuffle($permitted_chars),0,10);
		$post = array('password'=>md5($alpnum));
		$reset = $this->administration_model->resetPassword($where,$post);
		echo json_encode($alpnum);
	}

	public $html;

	function _list_previlage($arrOut, $userPriv){


		$this->html .='<div class="col-sm-12"><div class="form-group">';
		$selected = '';
		$i = 1;
		foreach($arrOut as $key => $value)
		{
			if(in_array($value['data']['id'],$userPriv))
			{
				$selected = 'checked';
			}
			else
			{
				$selected = '';
			}

			if(count($value['child']) > 0)
			{
				$this->html .= '<div class="form-check">
					<input type="checkbox" class="form-check-input" name="priv[]"  value="'.$value['data']['id'].'" '.$selected.'><label for="customCheckBox'.$i.'" class="form-check-label"> '.ucwords($value['data']['menu_name'].'</label></div>');
			}
			else
			{
				$this->html .= '<div class="form-check">
					<input type="checkbox" class="form-check-input" name="priv[]" value="'.$value['data']['id'].'" '.$selected.'><label for="customCheckbox'.$i.'" class="form-check-label">'.ucwords($value['data']['menu_name'].'</label></div>');	
			}

			if(count($value['child']) > 0){
				$this->_list_previlage($value['child'], $userPriv);
			}
			$i++;
		}
		$this->html .= '</div></div>'.PHP_EOL; 
	}

	function addPrevilage()
	{
		if($this->data['admin_level'] != 'super administrator') redirect('admin/main');
		$this->head_params('Administrator - Add Privilage','','','');
		$this->data['active_sub_menu'] = 'administration_listadmin';
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id','ID','required|trim');
		if($this->form_validation->run()==FALSE)
		{
			$adminId = $this->uri->segment(4);
			$this->data['detailAdmin'] = $this->administration_model->getDetailAdmin(array('id'=>$adminId))->row();
			$treeNav = array();
			$this->general_model->generateTreeNavigationAdmin($treeNav, 0);
			$getUserPrevilage = $this->administration_model->getUserPrevilage($adminId);
			$userPriv = array();
			foreach($getUserPrevilage->result() as $row)
			{
				$userPriv[] = $row->menu_id;
			}
			$this->_list_previlage($treeNav, $userPriv);
			$this->data['listPrevilage'] = $this->html;
		}
		else
		{
			$id = $this->input->post('id');
			$deleteAdminMenuPrev = $this->administration_model->deleteAdminMenuPrev(array('admin_id' => $id));
			$priv = $this->input->post('priv');

			foreach($priv as $row){
				$dataSave = array('admin_id'=>$id, 'menu_id'=> $row);
				$saveAdminMenuPrev = $this->administration_model->saveAdminMenuPrev($dataSave);
			}
			redirect('admin/administration/listAdmin');
		}
		$this->load->view('admin/administration/administration_addadminprev_view', $this->data);
	}
}

?>