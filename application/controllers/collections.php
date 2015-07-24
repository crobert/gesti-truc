<?php

class Collections extends CI_Controller {

    function Collections()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->model('collection');
        $collections = $this->collection->getAll();

        $data['collections'] = $collections;
        $data['titre_page'] = 'Aperçu';
        $data['vue'] = 'collections/collections.php';
        $data['menu'] = 'collections';
        $this->load->view('template', $data);

    }

    function add(){
        //Règles pour tous les champs
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nom', 'trim|required|xss_clean');
        $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
        $this->form_validation->set_rules('type', 'Type', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {


            $data['titre_page'] = 'Aperçu';
            $data['vue'] = 'collections/add_view.php';
            $data['menu'] = 'collections';
            $this->load->helper('form');
            $this->load->view('template', $data);



        } else {
            //$now = new DateTime("now", new DateTimeZone('Europe/Paris'));
            $this->load->model('collection');
            $id= $this->collection->add($this->input->post());
            redirect('collections');
        }
    }

    function edit($id){

        $this->load->model('collection');
        $c= $this->collection->getById($id);

        //Règles pour tous les champs
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nom', 'trim|required|xss_clean');
        $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
        $this->form_validation->set_rules('type', 'Type', 'trim|required|xss_clean');


        if ($this->form_validation->run() == FALSE) {

            $data['titre_page'] = 'Aperçu';
            $data['vue'] = 'collections/edit_view.php';
            $data['menu'] = 'collections';
            $data['c'] = $c;
            $this->load->helper('form');
            $this->load->view('template', $data);

        } else {
            //$now = new DateTime("now", new DateTimeZone('Europe/Paris'));
            $this->load->model('collection');
            $id= $this->collection->update($id,$this->input->post());
            redirect('collections');
        }
    }

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */