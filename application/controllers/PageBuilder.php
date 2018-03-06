<?php
class PageBuilder extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('pageBuilder_model');
                $this->load->helper('url_helper');
                $this->load->library('session');
        }

        public function adminController()
        {
                $data['page'] = $this->pageBuilder_model->get_page();
                $data['title'] = 'Page Archive';

                $this->load->view('templates/header', $data);
                $this->load->view('pagebuilder/adminController', $data);
                $this->load->view('templates/footer');
        }
        public function index()
        {
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
                        $username_md5 = md5($username);
                        $password_md5 = md5($password);
                        $user = md5('admin');
                        $pass = md5('Mededhse1');
                        if ($username_md5 == $user && $password_md5 == $pass){
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
        /*$data['page_content'] = $this->pageBuilder_model->get_content($pageID);*/
        
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

            $data['title'] = 'Create a page';

            $this->form_validation->set_rules('pageName', 'Page Name', 'required');
            $this->form_validation->set_rules('pageHeaderTitle', 'Page title Header', 'required');
            $this->form_validation->set_rules('pRowDescription', 'Title column 0', 'trim|alpha_numeric|max_length[30]');
            $this->form_validation->set_rules('pTableCompare1', 'Title column 1', 'required');
            $this->form_validation->set_rules('pTableCompare2', 'Title column 2', 'required');
            $this->form_validation->set_rules('pageFooter', 'Page Footer', 'required');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('pagebuilder/create');
                $this->load->view('templates/footer');

            }
            else
            {
                $this->pageBuilder_model->set_page();
                $pageID = $this->pageBuilder_model->get_last_page();
                $this->pageBuilder_model->default_content($pageID);
                redirect( base_url() . 'adminController');
            }
        }
        public function createRow()
        {
            $pageID = $this->uri->segment(2);
            if (!empty($pageID)){
               $data['currentpage'] = $pageID; 
            }


                $this->load->helper('form');
                $this->load->library('form_validation');
                $data['page'] = $this->pageBuilder_model->get_page();

                $data['title'] = 'Create a compare row';

                $this->form_validation->set_rules('pageID', 'Page Identification', 'required');
                $this->form_validation->set_rules('cDescription', 'Describe the comparison', 'required');
                $this->form_validation->set_rules('compare1', ' column 1', 'required');
                $this->form_validation->set_rules('compare2', ' column 2', 'required');
                $pageID = $this->input->post('pageID');
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
         
                if ($this->form_validation->run() === FALSE)
                {
                    $this->load->view('templates/header', $data);
                    $this->load->view('pagebuilder/editPage', $data);
                    $this->load->view('templates/footer');
         
                }
                else
                {
                    $this->pageBuilder_model->set_page($pageID);
                    redirect(base_url() . 'adminController');
                    //redirect( base_url() . '/pagebuilder');
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

                $data['title'] = 'Edit a content item';        
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


                    
}