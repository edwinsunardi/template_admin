<?php
	class javascript extends MY_Admin
	{
		public function __construct()
		{
			parent::__construct();
		}

		function vuejs()
		{
			// <link rel="stylesheet" href="'.base_url().'assets/plugins/summernote/summernote-bs4.min.css"><link href="'.base_url().'assets/plugins/codemirror/codemirror.css"><link href="'.base_url().'assets/plugins/codemirror/theme/monokai.css"><link rel="stylesheet" href="'.base_url().'assets/plugins/simplemde/simplemde.min.css">

// 			<script src="'.base_url().'assets/plugins/summernote/summernote-bs4.min.js"></script><script src="'.base_url().'assets/plugins/codemirror/codemirror.js"></script><script src="'.base_url().'assets/plugins/codemirror/mode/css/css.js"></script>
// <script src="'.base_url().'assets/plugins/codemirror/mode/xml/xml.js"></script><script src="'.base_url().'assets/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>

			$this->data['title'] = "Tutorial Vue JS";
			$this->data['active_sub_menu'] = 'vuejs';
			$this->head_params('Vue JS - Tutorial','','','');
			$this->load->view('javascript/vue_tutorial', $this->data);
		}
	}
?>