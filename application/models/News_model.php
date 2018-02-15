<?php
	
	class News_model extends CI_model
	{
		
		public function __construct()
		{
			$this->load->database();
			$this->load->helper('url_helper');
		}
		 public function index()
        {
                $data['news'] = $this->news_model->get_news();
        }

        public function view($slug = NULL)
        {
                $data['news_item'] = $this->news_model->get_news($slug);
        }
	} 
?>