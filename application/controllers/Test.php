<?php
        class Test extends CI_Controller {

                public function __construct()
                {
                        parent::__construct();
                        $this->load->model('test_model');
                        $this->load->helper('url_helper');
                }

                public function index()
                {
                        $data['test'] = $this->test_model->get_test();
                        $data['title'] = 'Test archive';

                        $this->load->view('templates/header', $data);
                        $this->load->view('test/index', $data);
                        $this->load->view('templates/footer');
                }

               public function view($slug = NULL)
                {
                        $data['test_item'] = $this->test_model->get_test($slug);

                        if (empty($data['test_item']))
                        {
                                show_404();
                        }

                        $data['title'] = $data['test_item']['title'];

                        $this->load->view('templates/header', $data);
                        $this->load->view('test/view', $data);
                        $this->load->view('templates/footer');
                }
                public function create()
                {
                    $this->load->helper('form');
                    $this->load->library('form_validation');

                    $data['title'] = 'Create a test item';

                    $this->form_validation->set_rules('title', 'Title', 'required');
                    $this->form_validation->set_rules('text', 'Text', 'required');

                    if ($this->form_validation->run() === FALSE)
                    {
                        $this->load->view('templates/header', $data);
                        $this->load->view('test/create');
                        $this->load->view('templates/footer');

                    }
                    else
                    {
                        $this->test_model->set_test();
                        $this->load->view('test/success');
                    }
                }
        }
?>