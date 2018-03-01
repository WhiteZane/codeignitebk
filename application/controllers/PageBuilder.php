<?php
class PageBuilder extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('pageBuilder_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
                $data['page'] = $this->pageBuilder_model->get_page();
                $data['title'] = 'Page Archive';

                $this->load->view('templates/header', $data);
                $this->load->view('pagebuilder/index', $data);
                $this->load->view('templates/footer');
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
                redirect( base_url() . 'index.php/pagebuilder');
            }
        }
        public function createRow()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
            $data['page'] = $this->pageBuilder_model->get_page();

            $data['title'] = 'Create a compare row';

            $this->form_validation->set_rules('pageID', 'Page Identification', 'required');
            $this->form_validation->set_rules('cDescription', 'Describe the comparison', 'required');
            $this->form_validation->set_rules('compare1', ' column 1', 'required');
            $this->form_validation->set_rules('compare2', ' column 2', 'required');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('pagebuilder/createRow');
                $this->load->view('templates/footer');

            }
            else
            {
                $this->pageBuilder_model->set_content();
                redirect( base_url() . 'index.php/pagebuilder');
            }
        }
        public function editView()
        {
                $pageID = $this->uri->segment(3);
                
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
                $pageID = $this->uri->segment(3);
                
                
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
                    redirect( base_url() . 'index.php/pagebuilder');
                    //redirect( base_url() . '/pagebuilder');
                }
        }
        public function editContent()
        {
                $contentID = $this->uri->segment(3);
                
                
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
                    redirect( base_url() . 'index.php/pagebuilder');
                }
        }
}