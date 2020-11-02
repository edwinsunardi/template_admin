<?php
	class javascript extends MY_Admin
	{
		public function __construct()
		{
			parent::__construct();
		}

		function vuejs()
		{
			$this->data['title'] = "Tutorial Vue JS";
			$this->data['active_sub_menu'] = 'vuejs';
			$this->head_params('Vue JS - Tutorial','','','');
			$this->load->view('javascript/vue_tutorial', $this->data);
		}
	}
?>