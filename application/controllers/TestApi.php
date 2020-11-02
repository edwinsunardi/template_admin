<?php
//import library dari REST_Controller
require APPPATH .'./libraries/REST_Controller.php';
//extends class dari REST_Controller
class TestApi extends REST_Controller{
	public function __construct(){
		parent::__construct();
	}

	public function index_get(){
		//testing respon
		$response['status'] = 200;
		$response['error'] = false;
		$response['message'] = 'Hai from response';


		// tampilkan response
		$this->response($response);
	}

	public function user_get(){
		$response['status'] = 200;
		$response['error'] = false;
		$response['user']['username'] = 'edwin';
		$response['user']['email']    = 'edwinsunardi86@gmail.com';
		$response['user']['detail']['full_name'] = 'Edwin Budiyanto Sunardi';
		$response['user']['detail']['position'] = 'Developer';
		$response['user']['detail']['specialize'] = 'Android, IOS, Web, Desktop';

		$this->response($response);
	}
}