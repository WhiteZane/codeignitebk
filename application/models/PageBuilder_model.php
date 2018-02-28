<?php
class PageBuilder_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        public function get_page($slug = FALSE)
		{
        if ($slug === FALSE)
        {
                $query = $this->db->get('page');
                return $query->result_array(); // checking table page
                /*$query = $this->db->get('content');
                return $query->result_array();*/ // checking table content
               /* $this->db->select('page.pageID, page.pageName, page.slug, page.pageHeaderTitle, page.pRowDescription, page.pTableCompare1, 
				page.pTableCompare2, page.pageFooter, content.contentID,  content.cDescription,  content.compare1, 
				content.compare2'); // SELECT columns
				$this->db->from('page','content'); // select table
				$this->db->join ('content', 'page.pageID = content.pageID'); // CONDITION
				$query = $this->db->get(); // FROM clause
				//return $query->row_array();
				return $query->result_array();*/
        		}

        		//$query = $this->db->get_where('page', array('slug' => $slug));

        		$query = $this->db->select('*'); // SELECT columns
				//$query = $this->db->from('page'); // select table
				$query = $this->db->join ('content', 'content.pageID = page.pageID'); // CONDITION
				 // FROM clause*/ $query = $this->db->get();
				$query = $this->db->get_where('page', array('slug' => $slug));
			    return $query->result_array();
        		
				}
				/*public function get_content($pageID)
				{
        		if ($pageID === FALSE)
        		{
	                $query = $this->db->get('content');
	                return $query->result_array(); 
        		}

        		$query = $this->db->select('contentID,  cDescription,  compare1, 
				compare2');
        		//$this->db->from('content'); // select table
        		$query = $this->db->get_where('content', array('pageID' => $pageID ));
			    
			    return $query->result_array();
        		
				}*/

				public function set_page()
				{
			    $this->load->helper('url');

			    $slug = url_title($this->input->post('pageName'), 'dash', TRUE);

			    $data = array(
			        'pageName' => $this->input->post('pageName'),
			        'slug' => $slug,
			        'pageHeaderTitle' => $this->input->post('pageHeaderTitle'),
			        'pRowDescription' => $this->input->post('pRowDescription'),
			        'pTableCompare1' => $this->input->post('pTableCompare1'),
			        'pTableCompare2' => $this->input->post('pTableCompare2'),
			        'pageFooter' => $this->input->post('pageFooter')
		    	);

		    		return $this->db->insert('page', $data);
				}
				public function set_content()
				{
			    $this->load->helper('url');

			    //$slug = url_title($this->input->post('pageName'), 'dash', TRUE);

			    $data = array(
			        'cDescription' => $this->input->post('cDescription'),
			        'compare1' => $this->input->post('compare1'),
			        'compare2' => $this->input->post('compare2'),
			        'pageID' => $this->input->post('pageID'),
		    	);

		    		return $this->db->insert('content', $data);
				}
}
