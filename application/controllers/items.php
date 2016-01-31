<?php

class Items extends CI_Controller {

    function Items()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->model('item');
        $items = $this->item->getAll();

        $data['items'] = $items;
        $data['titre_page'] = 'Aperçu';
        $data['vue'] = 'items/items.php';
        $data['menu'] = 'items';
        $this->load->view('template', $data);

    }

    /**
     * Create a new item
     * @param string $category id of the category you want to add an item
     */
    function add($category=""){
        //Règles pour tous les champs
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nom', 'trim|required|xss_clean');
        $this->form_validation->set_rules('category_id', 'Catégorie', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {

            $this->load->model('category');
            $categories = $this->category->getList();

            $data['titre_page'] = 'Aperçu';
            $data['vue'] = 'items/add_view.php';
            $data['menu'] = 'items';
            $data['categories'] = $categories;
            $data['category'] = $category;
            $this->load->helper('form');
            $this->load->view('template', $data);

        } else {

            //$now = new DateTime("now", new DateTimeZone('Europe/Paris'));
            $this->load->model('item');
            $id= $this->item->add($this->input->post());
            redirect('items/detail/'.$id);
        }
    }

    function edit($id){
        $this->load->model('item');
        $i= $this->item->getById($id);

        //Règles pour tous les champs
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nom', 'trim|required|xss_clean');
        $this->form_validation->set_rules('category_id', 'Catégorie', 'trim|required|xss_clean');


        if ($this->form_validation->run() == FALSE) {

            $this->load->model('category');
            $categories = $this->category->getList();

            $data['titre_page'] = 'Aperçu';
            $data['vue'] = 'items/edit_view.php';
            $data['menu'] = 'items';
            $data['i'] = $i;
            $data['categories'] = $categories;
            $this->load->helper('form');
            $this->load->view('template', $data);

        } else {
            //$now = new DateTime("now", new DateTimeZone('Europe/Paris'));
            $this->item->update($id,$this->input->post());
            redirect('items/detail/'.$id);
        }
    }

    function detail($id){
        //$this->load->model('item');
        $this->load->model('item');
        $i= $this->item->getById($id);
        //todo test si $i existe

        $data['titre_page'] = 'Aperçu';
        $data['vue'] = 'items/detail_view.php';
        $data['menu'] = 'items';
        $data['i'] = $i;
        $this->load->view('template', $data);
    }

    function delete($id)
    {
        $this->load->model('item');
        $i= $this->item->getById($id);
        $this->item->delete($id);
        redirect('categories/detail/'.$i->category_id);
    }

}

/* End of file items.php */
/* Location: ./application/controllers/items.php */
