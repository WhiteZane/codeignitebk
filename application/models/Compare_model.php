<?php
class Compare_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        public function get_compare($slug = FALSE)
		{
        if ($slug === FALSE)
        {
                $query = $this->db->get('compare');
                return $query->result_array();
        }

        $query = $this->db->get_where('compare', array('slug' => $slug));
        return $query->row_array();
		}
		public function get_compare_by_id($id = 0)
    	{
	        if ($id === 0)
	        {
	            $query = $this->db->get('compare');
	            return $query->result_array();
	        }
	 
	        $query = $this->db->get_where('compare', array('id' => $id));
	        return $query->row_array();
    	}
		public function set_compare($id = 0)
		{
		    $this->load->helper('url');

		    $slug = url_title($this->input->post('title'), 'dash', TRUE);

		    $data = array(
		        'title' => $this->input->post('title'),
		        'slug' => $slug,
		        'compare1' => $this->input->post('compare1'),
		        'ljcompare' => $this->input->post('ljcompare')
		    );
		    if ($id == 0) {
		    	return $this->db->insert('compare', $data);
		    } else {
		    	$this->db->where('id', $id);
		    	return $this->db->update('compare', $data);
		    }

		}
}