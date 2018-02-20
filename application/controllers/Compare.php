<?php
        class Compare extends CI_Controller {

                public function __construct()
                {
                        parent::__construct();
                        $this->load->model('compare_model');
                        $this->load->helper('url_helper');
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
                    $this->form_validation->set_rules('compare1', 'Compare1', 'required');
                    $this->form_validation->set_rules('ljcompare', 'ljcompare', 'required');

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
                            //$this->load->view('news/success');
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
}