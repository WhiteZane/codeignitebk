<?php
	class Pages extends CI_Controller {
		public function __construct()
                {
                        // calls constructor to use url helper on every object called
                        parent::__construct();
                        $this->load->helper('url_helper');
                        $this->load->model('compare_model');
                }
		
		public function view ($page = "index"){
			if (! file_exists(APPPATH.'views/pages/'.$page.'.php'))
			{
				//whoops, we dont have a page for that!
				show_404();
			}
			  $data['title'] = ucfirst($page); // Capitalize the first letter

        		$this->load->view('templates/header', $data);
        		$this->load->view('pages/'.$page, $data);
        		$this->load->view('templates/footer', $data);
		} 
		
	}
?>