<?php

class Categories extends CI_Controller {

    function Categories()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->model('category');
        $categories = $this->category->getAll();

        $data['categories'] = $categories;
        $data['titre_page'] = 'Aperçu';
        $data['vue'] = 'categories';
        $data['menu'] = 'categories';
        $this->load->view('template', $data);

    }

    function add(){
        //Règles pour tous les champs
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nom', 'trim|required|xss_clean');
        $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {


            $data['titre_page'] = 'Aperçu';
            $data['vue'] = 'categories/add_view.php';
            $data['menu'] = 'categories';
            $this->load->helper('form');
            $this->load->view('template', $data);




        } else {

            //$now = new DateTime("now", new DateTimeZone('Europe/Paris'));
            $this->load->model('category');
            $id= $this->category->add($this->input->post());
            redirect('categories');
        }
    }

    function edit($id){
        $this->load->model('category');
        $c= $this->category->getById($id);

        //Règles pour tous les champs
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nom', 'trim|required|xss_clean');
        $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');


        if ($this->form_validation->run() == FALSE) {

            $data['titre_page'] = 'Aperçu';
            $data['vue'] = 'categories/edit_view.php';
            $data['menu'] = 'categories';
            $data['c'] = $c;
            $this->load->helper('form');
            $this->load->view('template', $data);

        } else {
            //$now = new DateTime("now", new DateTimeZone('Europe/Paris'));
            $id= $this->category->update($id,$this->input->post());
            redirect('categories');
        }
    }

}

/* End of file categories.php */
/* Location: ./application/controllers/categories.php */
