<?php
	
	class Test_model extends CI_model
	{
		
		public function __construct()
		{
			$this->load->database();
		}

		 public function get_test($slug = FALSE)
		{
	        if ($slug === FALSE)
	        {
	                $query = $this->db->get('test');
	                return $query->result_array();
	        }

	        $query = $this->db->get_where('test', array('slug' => $slug));
	        return $query->row_array();
		}
		public function set_test()
		{
    		$this->load->helper('url');

		    $slug = url_title($this->input->post('title'), 'dash', TRUE);

		    $data = array(
		        'title' => $this->input->post('title'),
		        'text' => $this->input->post('text')
		    );

		    return $this->db->insert('test', $data);
		}
	} 
?>