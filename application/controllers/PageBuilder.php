<?php
class PageBuilder extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('pageBuilder_model');
                $this->load->model('pageBuilder_model', 'm');
                $this->load->helper('url_helper');
                $this->load->library('session');
        }

        public function adminController()
        {
                $data['page'] = $this->pageBuilder_model->get_page();
                $data['title'] = 'Compare Page Builder';

                $this->load->view('templates/header', $data);
                $this->load->view('pagebuilder/adminController', $data);
                $this->load->view('templates/footer');
        }
        public function index()
        {           
                    $auth = $this->pageBuilder_model->get_auth();
                    
                    $this->load->helper('form');
                    $this->load->library('form_validation');
                    $data['title'] = 'Login Here:';

                    $this->form_validation->set_rules('username', 'User Name', 'required');
                    $this->form_validation->set_rules('password', 'Password', 'required');


                    if ($this->form_validation->run() === FALSE)
                    {
                        $this->load->view('templates/header', $data);
                        $this->load->view('pagebuilder/index.php');
                        $this->load->view('templates/footer');

                    }
                    else
                    {
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        //convert to md5
                        $username_sha1 = sha1($username);
                        $password_sha1 = sha1($password);
                        $user = $auth['user'];
                        $pass = $auth['password'];
                        if ($username_sha1 == $user && $password_sha1 == $pass){
                           $life=600;
                           
                           ini_set('session.use_strict_mode', 1);
                           session_set_cookie_params($life);
                           $sid = md5('LindseyJones');
                           $session_data = array();
                           $this->session->set_userdata('logged_in', $session_data);
                           // load admin controller
                           redirect(base_url() . 'adminController');
                        }else{
                            $this->session->sess_destroy();
                            $this->load->view('pagebuilder/fail');
                        }
                        
                        
                    }
                }
                

        public function view($slug = NULL, $pageID = NULL)
        {
        error_log($slug);        
        error_log($pageID);        
        $data['page_item'] = $this->pageBuilder_model->get_page($slug);
        
        if (empty($data['page_item']))
        {
                show_404();
        }


        $this->load->view('templates/header', $data);
        $this->load->view('pagebuilder/view', $data);
        $this->load->view('templates/footer');
        }

        public function create()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
            
            $data['title'] = 'Create page';

            $this->form_validation->set_rules('pageName', 'Page Name', 'trim|required');
            $this->form_validation->set_rules('pageHeaderTitle', 'Page title Header', 'trim|required');
            $this->form_validation->set_rules('pRowDescription', 'Title column 0', 'trim|alpha_numeric|max_length[30]');
            $this->form_validation->set_rules('pTableCompare1', 'Title column 1', 'trim|required');
            $this->form_validation->set_rules('pTableCompare2', 'Title column 2', 'trim|required');
            $this->form_validation->set_rules('pageFooter', 'Page Footer', 'trim|required');
            $this->form_validation->set_rules('headColor', 'Header Color', 'trim|required');
            $this->form_validation->set_rules('rowColor', 'Row 1 Color', 'trim|required');
            $this->form_validation->set_rules('rowColor2', 'Row 2 Color', 'trim|required');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('pagebuilder/create');
                $this->load->view('templates/footer');

            }
            else
            {
                //checking for the image file
                if (empty($_FILES['userfile']['name']))
                {
                        $this->pageBuilder_model->set_page();
                        $pageID = $this->pageBuilder_model->get_last_page();
                        $this->pageBuilder_model->default_content($pageID);
                        redirect( base_url() . 'adminController');
                }else{
                    // image upload rules
                    $config['upload_path']          = './uploads/';
                    $config['allowed_types']        = 'gif|jpg|png';
                    $config['max_size']             = 100;
                    $config['max_width']            = 1024;
                    $config['max_height']           = 768;

                    // getting the upload library setting the rules
                    $this->load->library('upload', $config);

                    if($this->upload->do_upload('userfile'))
                    {
                        $img = $this->upload->data();
                        $file_name = $img['file_name'];

                        $this->pageBuilder_model->set_page();
                        $pageID = $this->pageBuilder_model->get_last_page();
                        $this->pageBuilder_model->default_content($pageID);
                        redirect( base_url() . 'adminController');
                    } else {
                        echo $this->upload->display_errors();

                    }

                }
                
                
                
            }
        }
        public function createRow()
        {
            $pageID = $this->uri->segment(2);
            //$rowOrderNum = $this->uri->segment(3);
           

            if (!empty($pageID)){
               $data['currentpage'] = $pageID; 
            }
            if (!empty($nextRow)){
               $data['rowCount'] = $nextRow; 
            }

                $this->load->helper('form');
                $this->load->library('form_validation');
                $data['page'] = $this->pageBuilder_model->get_page();
                 $data['rows'] = $this->pageBuilder_model->get_editView_by_id($pageID);
                $data['title'] = 'Create Row';

                $this->form_validation->set_rules('pageID', 'Page Identification', 'required');
                $this->form_validation->set_rules('cDescription', 'Describe the comparison', 'required');
                $this->form_validation->set_rules('compare1', ' column 1', 'required');
                $this->form_validation->set_rules('compare2', ' column 2', 'required');
                $pageID = $this->input->post('pageID');
                $rowCount = $this->input->post('rowCount');
                if ($this->form_validation->run() === FALSE)
                {
                    $this->load->view('templates/header', $data);
                    $this->load->view('pagebuilder/createRow', $data);
                    $this->load->view('templates/footer');

                }
                else
                {
                    $this->pageBuilder_model->set_content();
                    redirect( base_url() . 'editView/'. $pageID);
                }
            
        
        }
        public function editView()
        {
                $pageID = $this->uri->segment(2);
                
                if (empty($pageID))
                {
                    show_404();
                }
                
                $data['title'] = 'Edit a page item';        
                $data['page_item'] = $this->pageBuilder_model->get_editView_by_id($pageID);
                
         
               
                    $this->load->view('templates/header', $data);
                    $this->load->view('pagebuilder/editView', $data);
                    $this->load->view('templates/footer');
                
        }
        public function editPage()
        {
                $pageID = $this->uri->segment(2);
                
                
                if (empty($pageID))
                {
                    show_404();
                }
                
                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['title'] = 'Edit Page';        
                $data['page_item'] = $this->pageBuilder_model->get_page_by_id($pageID);
                
                $this->form_validation->set_rules('pageName', 'Page Name', 'required');
                $this->form_validation->set_rules('pageHeaderTitle', 'Page title Header', 'required');
                $this->form_validation->set_rules('pRowDescription', 'Title column 0', 'trim|alpha_numeric|max_length[30]');
                $this->form_validation->set_rules('pTableCompare1', 'Title column 1', 'required');
                $this->form_validation->set_rules('pTableCompare2', 'Title column 2', 'required');
                $this->form_validation->set_rules('pageFooter', 'Page Footer', 'required');
                $this->form_validation->set_rules('headColor', 'Header Color', 'required');
                $this->form_validation->set_rules('rowColor', 'Row 1 Color', 'required');
                $this->form_validation->set_rules('rowColor2', 'Row 2 Color', 'required');       
                
                if ($this->form_validation->run() === FALSE)
                {
                    $this->load->view('templates/header', $data);
                    $this->load->view('pagebuilder/editPage', $data);
                    $this->load->view('templates/footer');
         
                }
                else
                {
                //checking for the image file
                if (empty($_FILES['userfile']['name']))
                {
                        $this->pageBuilder_model->set_page($pageID);
                        redirect( base_url() . 'adminController');
                } else {
                    // image upload rules
                    $config['upload_path']          = './uploads/';
                    $config['allowed_types']        = 'gif|jpg|png';
                    $config['max_size']             = 100;
                    $config['max_width']            = 1024;
                    $config['max_height']           = 768;

                    // getting the upload library setting the rules
                    $this->load->library('upload', $config);

                    if($this->upload->do_upload('userfile'))
                    {
                        $img = $this->upload->data();
                        $file_name = $img['file_name'];

                        $this->pageBuilder_model->set_page($pageID);
                        redirect( base_url() . 'adminController');
                    } else {
                        echo $this->upload->display_errors();

                    }

                }
                
                
                
            }
        }
        public function editContent()
        {
                $contentID = $this->uri->segment(2);
               
                
                if (empty($contentID))
                {
                    show_404();
                }
                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['title'] = 'Edit content';        
                $data['content_item'] = $this->pageBuilder_model->get_content_by_id($contentID);
                
                $this->form_validation->set_rules('pageID', 'Page Identification', 'required');
                $this->form_validation->set_rules('cDescription', 'Describe the comparison', 'required');
                $this->form_validation->set_rules('compare1', ' column 1', 'required');
                $this->form_validation->set_rules('compare2', ' column 2', 'required');
                $pageID = $this->input->post('pageID');
                if ($this->form_validation->run() === FALSE)
                {
                    $this->load->view('templates/header', $data);
                    $this->load->view('pagebuilder/editContent', $data);
                    $this->load->view('templates/footer');
         
                }
                else
                {
                    $this->pageBuilder_model->set_content($contentID);
                    //$this->load->view('news/success');
                    redirect( base_url() . 'editView/' . $pageID);
                }
        }
        //replacing with ajax version
        public function deleteContent()
        {
                $contentID = $this->uri->segment(2);
                print_r($contentID);
                $pageID = $this->uri->segment(3);
                print_r($pageID);               
                
                if (empty($contentID))
                {
                    show_404();
                }

                /*$content_item = $this->pageBuilder_model->get_content_by_id($contentID);*/
                /*$pageID = $this->input->post('pageID');*/
                
                //deleting content 
                    $this->pageBuilder_model->delete_content($contentID);
                //reloading the page
                    redirect( base_url() . 'editView/' . $pageID);
                
        }
        //ajax version of delete content
        public function deleteRow (){
            $result = $this->m->deleteRow();
            $msg['success'] = FALSE;
            
            if($result){
                $msg['success'] = TRUE;
            }
            echo json_encode($msg);
        }
            

        public function deletePage()
        {
                $pageID = $this->uri->segment(2);
               
                
                if (empty($pageID))
                {
                    show_404();
                }
                
                //deleting content

                    $this->pageBuilder_model->delete_page($pageID);

                //reloading the page
                    redirect(base_url() . 'adminController');
                
        }
        public function showAllRows(){
          $pageID = $this->uri->segment(2);
          $result = $this->m->showAllRows($pageID);
          echo json_encode($result);
        }
        //ajax move row up
        public function rowDown(){
            $result = $this->m->rowDown();
            $msg['success'] = FALSE;
            
            if($result){
                $msg['success'] = TRUE;
            }
            echo json_encode($msg);
        }
        //ajax move row down
        public function rowUp(){
            $result = $this->m->rowUp();
            $msg['success'] = FALSE;
            
            if($result){
                $msg['success'] = TRUE;
            }
            echo json_encode($msg);
        }
}