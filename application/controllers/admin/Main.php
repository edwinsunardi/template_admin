<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main extends MY_Admin{
	function __construct(){
		parent::__construct();
		$this->data['active_menu'] = 'master';
		
	}

	public function apiKeyWeatherJSON(){
		$apiKey = "9a57b08aa310f0a559bf5b2554d400f6";
		$cityId = 1642907;
		$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;
		echo $googleApiUrl;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL,$googleApiUrl);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_VERBOSE, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$response = curl_exec($ch);
		curl_close($ch);
		return json_decode($response);
	}
	function index(){
		// $this->data['weatherJSON'] = $this->apiKeyWeatherJSON();
		// echo @COUNT(@$_POST['array1']); die();
		// $this->load->library('form_validation');
		// $this->form_validation->set_rules('array1[0]','Array1', 'required|trim');
		// $this->form_validation->set_rules('array2[0]','Array1', 'required|trim');
		// if($this->form_validation->run()==FALSE){
		// 	$this->load->view('header',$this->data);
		// $this->load->view('admin/main_view',$this->data);
		
		// $this->load->view('footer');
		// }else{
		// 	$array1 = array();
		// 	$array2 = array();
		// }
		$this->data['title'] = "Add Administration";
		$this->data['active_sub_menu'] = 'administration_listadmin';
		$this->head_params('Administration - Add/Update admin','','','
		<link rel="stylesheet" href="'.base_url().'assets/plugins/toastr/toastr.min.css">',
		'<script type="text/javascript" src="'.base_url().'assets/plugins/toastr/toastr.min.js"></script>');
		$this->load->model('administration_model');
		$this->data['get_user'] = $this->administration_model->getAdmin();
		
		$this->load->view('admin/main_view',$this->data);
	
		
	}

	function ajax_array(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('array1[0]','Array1', 'required|trim');
		$this->form_validation->set_rules('array2[0]','Array2', 'required|trim');
		//echo $this->input->post('array1');
		// if($this->form_validation->run()==FALSE){
		// 		echo 'no valid';
		
		// }else{

			$array1 = array();
			$array2 = array();
			$array_total = array();

			for($i = 0; $i< 4; $i++){
				$post_array1 = $_POST['array1'][$i];
				array_push($array1,$post_array1);
			}
			for($i = 0; $i< 4; $i++){
				$post_array2 = $_POST['array2'][$i];
				array_push($array2,$post_array2);
			}

			for($i = 0; $i < COUNT($array1); $i++){
				for($a = 0; $a < COUNT($array1); $a++){
					$total = intval($array1[$i]) + intval($array2[$a]);
					array_push($array_total,$total);

				}

			//}
		}
		if(in_array(6,$array_total)){
			echo "Yes";
		}else{
			// echo array_search(6,$array_total,true);
			echo "No";
		}
	}

	function ajax_post_chat(){
		$user = $this->input->post('user');
		$message = $this->input->post('message');
		$post = array(
			'sender' => $this->session->userdata('admin_username'),
			'message' => $message,
			'receiver' => $user
		);
		$data = $this->administration_model->send_message($post);
		if($data){
			echo "submit berhasil";
		}else{
			echo "submit gagal";
		}
	}

	function get_chat_user($user){
		$getChatUser = $this->administration_model->getChatUser($user);
		echo json_encode($getChatUser->result());
	}

	
}
?>