<?php
	class Pages extends CI_Controller {
		public function __construct()
                {
                        // calls constructor to use url helper on every object called
                        parent::__construct();
                        $this->load->helper('url_helper');
                        $this->load->model('compare_model');
                }
		
		public function view ($slug = NULL, $page = "index"){
			if (! file_exists(APPPATH.'views/compare/'.$page.'.php'))
			{
				//whoops, we dont have a page for that!
				show_404();
			}
			 $data['compare'] = $this->compare_model->get_compare();
			//$this->load->helper('url');
			$data['compare_item'] = $this->compare_model->get_compare($slug);
			$data['title'] = $data['compare_item']['title'];

			$this->load->view('templates/header',$data);
			$this->load->view('compare/'.$page, $data);
			$this->load->view('templates/footer', $data);
		} 
		
	}
?>