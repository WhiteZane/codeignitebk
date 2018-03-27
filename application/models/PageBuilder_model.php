<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PageBuilder_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        public function get_auth()
        {
        	$authID = 1 ;
        	$query = $this->db->get_where('auth', array('id' => $authID));
        	return $query->row_array();
        }
        public function get_page($slug = FALSE)
		{
	        if ($slug === FALSE)
	        {
	            $query = $this->db->get('page');
                return $query->result_array(); // checking table page
                
        		} 

        		

        		$query = $this->db->select('*'); // SELECT columns
				$query = $this->db->join ('content', 'content.pageID = page.pageID'); // CONDITION
				$query = $this->db->order_by('content.rowOrder');
				$query = $this->db->get_where('page', array('slug' => $slug));

			    
			    $result = $query->result_array();
			    
			    //if result array gets a result
			    if ($result) {
			    	$query->result_array();
        		 	return $query->result_array();
			    } else {
			    	$query1 = $this->db->get_where('page', array('slug' => $slug));
        		 	return $query1->result_array();
			    }

			    

				
			}
				 public function get_editView_by_id($pageID = 0)
				{
				    if ($pageID === 0)
				        {
				            $query = $this->db->get('page');
				            return $query->result_array();
				        }
				 
				$query = $this->db->select('*'); // SELECT columns
				//$query = $this->db->from('page'); // Do not need from statement
				$query = $this->db->join ('content', 'content.pageID = page.pageID'); // CONDITION
				 // FROM clause*/ $query = $this->db->get();
				$query = $this->db->order_by('content.rowOrder');
				$query = $this->db->get_where('page', array('page.pageID' => $pageID));
			    $result = $query->result_array();
			    
			    //if result array gets a result
			    if ($result) {
			    	$query->result_array();
        		 	return $query->result_array();
			    } else {
			    	$query1 = $this->db->get_where('page', array('page.pageID' => $pageID));
        		 	return $query1->result_array();
			    }

				}

				public function get_page_by_id($pageID = 0)
			    {
			        if ($pageID === 0)
			        {
			            $query = $this->db->get('page');
			            return $query->result_array();
			        }
			 
			        $query = $this->db->get_where('page', array('pageID' => $pageID));
			        return $query->row_array();
			    }
			    public function get_content_by_id($contentID = 0)
			    {
			        if ($contentID === 0)
			        {
			            $query = $this->db->get('page');
			            return $query->result_array();
			        }
			 
			        $query = $this->db->get_where('content', array('contentID' => $contentID));
			        return $query->row_array();
			    }

				public function set_page($pageID = 0)
				{
			    $this->load->helper('url');
			    $this->load->library('upload');
			    
			    $slug = url_title($this->input->post('pageName'), 'dash', TRUE);
			     //get the filename
			   	$currentImg;
			   	
			   	$img = $this->upload->data();
			   	if(!empty($this->input->post('previousImg'))){
			   			$currentImg = $this->input->post('previousImg');
			   		} else{
			   			$currentImg = 0;
			   		}

			   	//error_log(json_encode($img));
			   	if (!empty($img) && $img['file_name'] !== "") {
                    $file_name = $img['file_name'];
                } else if ($currentImg !== 0 )
			     {
			     	$file_name = $currentImg;
             	} else {
             		$file_name = "";
             	}
			     
			    
			    $data = array(
			        'pageName' => $this->input->post('pageName'),
			        'slug' => $slug,
			        'pageHeaderTitle' => $this->input->post('pageHeaderTitle'),
			        'pRowDescription' => $this->input->post('pRowDescription'),
			        'pTableCompare1' => $this->input->post('pTableCompare1'),
			        'pTableCompare2' => $this->input->post('pTableCompare2'),
			        'pageFooter' => $this->input->post('pageFooter'),
			        'headColor' => $this->input->post('headColor'),
			        'rowColor' => $this->input->post('rowColor'),
			        'rowColor2' => $this->input->post('rowColor2'),
			        'imgName'	=> $file_name
		    	);
		    		//set default content
			    
			    	if ($pageID == 0) {
            			return $this->db->insert('page', $data);
        			} else {
            			$this->db->where('pageID', $pageID);
            			return $this->db->update('page', $data);
        			}
		    		//return $this->db->insert('page', $data);
				}

				public function set_content($contentID = 0)
				{
				    $this->load->helper('url');

				    //$slug = url_title($this->input->post('pageName'), 'dash', TRUE);
				    $rowCount = $this->input->post('rowCount');
				    $data = array(
				        'cDescription' => $this->input->post('cDescription'),
				        'compare1' => $this->input->post('compare1'),
				        'compare2' => $this->input->post('compare2'),
				        'pageID' => $this->input->post('pageID'),
				        'rowOrder' => $rowCount
			    	);
				    
				    if ($contentID == 0) {
	            			return $this->db->insert('content', $data);
	        			} else {
	            			$this->db->where('contentID', $contentID);
	            			return $this->db->update('content', $data);
	        			}
			    		//return $this->db->insert('content', $data);
				}
				public function get_last_page()
				{     
					$this->db->select_max('pageID');
     				$result= $this->db->get('page')->row_array();
     				echo $result['pageID'];    					
   					 return $result;
				}
				public function default_content($pageID = 0)
				{
					//setup row assignment with 1 
					$firstRow = 1;

					$cDescription = 'Use edit view to edit content';
					$compare1 = 'column1 test';
					$compare2 = 'column2 test';
					$pageID = implode(" ", $pageID);
					echo $pageID;

					//print_r($pageID);
					$data = array(
				        'cDescription' => $cDescription,
				        'compare1' => $compare1,
				        'compare2' => $compare2,
				        'pageID' => $pageID,
				        'rowOrder' => $firstRow
			    	);
			    	if ($pageID == FALSE) {
	            			echo "error";
	        			} else {
	            			return $this->db->insert('content', $data);
	        			}
				}
				public function delete_content($contentID)
    			{
        			$this->db->where('contentID', $contentID);
        			return $this->db->delete('content');
    			}
    			public function delete_page($pageID)
    			{	
        			$this->db->where('pageID', $pageID);
        			return $this->db->delete( array('content','page'));
    			}
    			public function showAllRows($pageID=0){
    				
    				$query = $this->db->get('content');
    				if ($pageID === 0)
				        {
				            $query = $this->db->get('page');
				            return $query->result_array();
				        }
				 
				$query = $this->db->select('*'); // SELECT columns
				//$query = $this->db->from('page'); // Do not need from statement
				$query = $this->db->join ('content', 'content.pageID = page.pageID'); // CONDITION
				 // FROM clause*/ $query = $this->db->get();
				$query = $this->db->order_by('content.rowOrder');
				$query = $this->db->get_where('page', array('page.pageID' => $pageID));
			    $result = $query->result_array();
			    
			    //if result array gets a result
			    if ($result) {
			    	$query->result_array();
        		 	return $query->result_array();
			    } else {
			    	$query1 = $this->db->get_where('page', array('page.pageID' => $pageID));
        		 	return $query1->result_array();
			    }
    			}
    			function deleteRow(){
    				$id = $this->input->get('id');
    				$this->db->where('contentID', $id);
    				$this->db->delete('content');
    				if ($this->db->affected_rows() > 0){
    					return true;
    				}else{
    					return false;
    				}
    			}
    			function updateRows(){
    				$contentID = $this->input->get('id');
    				$move = 1;

    				//start finding info for page 
    				 $query = $this->db->select('pageID, rowOrder');
    				 $query = $this->db->get_where('content', array('contentID' => $contentID));
    				 $data = $query->row_array();

    				$pageID = $data['pageID'];
    				$rowNum = (int) $data['rowOrder'];

    				//subtract from each row order greater than the content ID
    				$this->db->set("rowOrder", "rowOrder - $move", FALSE); 
				    $this->db->where('pageID', $pageID)->where('contentID >' , $contentID)->where('rowOrder >' , $rowNum);
	            	$this->db->update('content');
    				
    			}
    			//moving row up
    			function rowDown(){
    				$contentID = $this->input->get('id');
    				$move = 1; 

    				 
    				//start finding info 
    				 $query = $this->db->select('pageID, rowOrder', FALSE);
    				 $query = $this->db->get_where('content', array('contentID' => $contentID));
    				 $data = $query->row_array();
    				
    				$pageID = $data['pageID'];
    				$rowNum = (int) $data['rowOrder'];
    				$rowUpdate = $rowNum + 1 ;
    				$updateRow = $rowUpdate - $move;

    				//add to number before this row 
    				$this->db->set("rowOrder", $updateRow); 
				    $this->db->where('rowOrder', $rowUpdate)->where('pageID', $pageID);
	            	$this->db->update('content');
	            	
	            	//start query to subtract from selected row
    				 
    				 //get the row from database
    				 $query = $this->db->get_where('content', array('contentID' => $contentID));
			         $query->row_array();
			         
    				
			         // subtract one from row order 
			        $this->db->set("rowOrder", "rowOrder + $move", FALSE); 
				    $this->db->where('contentID', $contentID);
	            	$this->db->update('content');
    				//$this->db->where('contentID', $id);
    				//$this->db->update('content');
    				
    				if ($this->db->affected_rows() > 0){
    					return true;
    				}else{
    					return false;
    				}
    			}

    			//moving row down
    			function rowUp(){
    				
    				$contentID = $this->input->get('id');
    				$move = 1; 

    				 
    				//start finding info 
    				  $query = $this->db->select('pageID, rowOrder', FALSE);
    				 $query = $this->db->get_where('content', array('contentID' => $contentID));
    				 $data = $query->row_array();
    				
    				$pageID = $data['pageID'];
    				$rowNum = (int) $data['rowOrder'];
    				$rowUpdate = $rowNum - 1 ;
    				$updateRow = $rowUpdate + $move;

    				//add to number before this row 
    				$this->db->set("rowOrder", $updateRow);  
				    $this->db->where('rowOrder', $rowUpdate)->where('pageID', $pageID);
	            	$this->db->update('content');
	            	
	            	//start query to subtract from selected row
    				 
    				 //get the row from database
    				 $query = $this->db->get_where('content', array('contentID' => $contentID));
			         $query->row_array();

    				
			         // subtract one from row order 
			        $this->db->set("rowOrder", "rowOrder - $move", FALSE); 
				    $this->db->where('contentID', $contentID);
	            	$this->db->update('content');
    				//$this->db->where('contentID', $id);
    				//$this->db->update('content');
    				
    				if ($this->db->affected_rows() > 0){
    					return true;
    				}else{
    					return false;
    				}
    			}


}

