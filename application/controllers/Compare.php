<?php
        class Compare extends CI_Controller {

                public function __construct()
                {
                        parent::__construct();
                        $this->load->model('compare_model');
                        $this->load->helper('url_helper');
                }
                public function admin()
                {
                    $this->load->helper('form');
                    $this->load->library('form_validation');

                    $data['title'] = 'Create a compare item';

                    $this->form_validation->set_rules('title', 'Title', 'required');
                    

                    if ($this->form_validation->run() === FALSE)
                    {
                        $this->load->view('templates/header', $data);
                        $this->load->view('compare/create');
                        $this->load->view('templates/footer');

                    }
                    else
                    {
                        $value = $_POST['title'];
                        echo $value;
                        $this->load->view('compare/create');
                    }
                }
                public function index()
                {
                        $data['compare'] = $this->compare_model->get_compare();
                        $data['title'] = 'Compare archive';

                        $this->load->view('templates/header', $data);
                        $this->load->view('compare/index', $data);
                        $this->load->view('templates/footer');
                }

               public function view($slug = NULL)
                {
                        $data['compare_item'] = $this->compare_model->get_compare($slug);

                        if (empty($data['compare_item']))
                        {
                                show_404();
                        }

                        $data['title'] = $data['compare_item']['title'];

                        $this->load->view('templates/header', $data);
                        $this->load->view('compare/view', $data);
                        $this->load->view('templates/footer');
                }
                public function create()
                {
                    $this->load->helper('form');
                    $this->load->library('form_validation');

                    $data['title'] = 'Create a compare item';

                    $this->form_validation->set_rules('title', 'Title', 'required');
                    $this->form_validation->set_rules('compare1', 'Kettering compare', 'required');
                    $this->form_validation->set_rules('ljcompare', 'LindseyJones compare', 'required');

                    if ($this->form_validation->run() === FALSE)
                    {
                        $this->load->view('templates/header', $data);
                        $this->load->view('compare/create');
                        $this->load->view('templates/footer');

                    }
                    else
                    {
                        $this->compare_model->set_compare();
                        $this->load->view('compare/success');
                    }
                }
                public function edit()
                {
                        $id = $this->uri->segment(3);
                        
                        if (empty($id))
                        {
                            show_404();
                        }
                        
                        $this->load->helper('form');
                        $this->load->library('form_validation');
                        
                        $data['title'] = 'Edit a compare item';        
                        $data['compare_item'] = $this->compare_model->get_compare_by_id($id);
                        
                        $this->form_validation->set_rules('title', 'Title', 'required');
                        $this->form_validation->set_rules('compare1', 'Compare1', 'required');
                        $this->form_validation->set_rules('ljcompare', 'ljcompare', 'required');
                 
                        if ($this->form_validation->run() === FALSE)
                        {
                            $this->load->view('templates/header', $data);
                            $this->load->view('compare/edit', $data);
                            $this->load->view('templates/footer');
                 
                        }
                        else
                        {
                            $this->compare_model->set_compare($id);
                            //$this->load->view('compare/success');
                            redirect( base_url() . 'compare/editAdmin');
                        }
                    }
                public function editAdmin()
                {
                        $data['compare'] = $this->compare_model->get_compare();
                        $data['title'] = 'Compare archive';

                        $this->load->view('templates/header', $data);
                        $this->load->view('compare/editAdmin', $data);
                        $this->load->view('templates/footer');
                }
                public function login()
                {
                    $this->load->helper('form');
                    $this->load->library('form_validation');

                    $data['title'] = 'Login Here:';

                    $this->form_validation->set_rules('username', 'User Name', 'required');
                    $this->form_validation->set_rules('password', 'Password', 'required');


                    if ($this->form_validation->run() === FALSE)
                    {
                        $this->load->view('templates/header', $data);
                        $this->load->view('compare/login');
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
                        $pass = md5('admin');
                        if ($username_md5 == $user && $password_md5 == $pass){
                           $life=600;
                           
                           ini_set('session.use_strict_mode', 1);
                           session_set_cookie_params($life);
                           $sid = md5('LindseyJones');
                            session_id($sid);

                           session_start();

                           $this->load->view('compare/success');
                        }else{
                            $this->load->view('compare/fail');
                        }
                        
                        
                    }
                }    
}