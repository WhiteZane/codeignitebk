<?php
	class Pages extends CI_Controller {

		public function index()
			{ 
	         $this->load->helper('url'); 
	    	} 
		public function view ($page = "index"){
			if (! file_exists(APPPATH.'views/pages/'.$page.'.php'))
			{
				//whoops, we dont have a page for that!
				show_404();
			}
			$data['title'] = ucfirst($page); // Capitalize the first letter 

			$this->load->view('templates/header',$data);
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer', $data);
		} 
	}
?>