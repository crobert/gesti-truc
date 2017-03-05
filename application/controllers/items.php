<?php

class Items extends MY_Auth {

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
            $this->load->model('collection');
            $myCategorie = $this->category->getById($category);
            $collection = $myCategorie->collection_id;
            $myCollection = $this->collection->getById($collection);
            $categories = $this->category->getByCollection($collection);

            $data['titre_page'] = 'Aperçu';
            $data['vue'] = 'items/add_view.php';
            $data['menu'] = 'items';
            $data['categories'] = $categories;
            $data['category'] = $myCategorie;
            $data['collection'] = $myCollection;
            $this->load->helper('form');
            $this->load->view('template', $data);

        } else {

            //$now = new DateTime("now", new DateTimeZone('Europe/Paris'));
            $this->load->model('item');
            $id= $this->item->add($this->input->post());
            if(isset($_FILES['picture'])){
                $configUpload['upload_path'] = './uploads/items';
                $configUpload['allowed_types'] = 'gif|jpg|png';
                $configUpload['overwrite'] = true;
                $configUpload['max_size']	= '10000';

                $_FILES['picture']['name'] = $id."_".$_FILES['picture']['name'];

                $this->load->library('upload', $configUpload);
                if($this->upload->do_upload('picture'))
                {
                    $configImage['image_library'] = 'gd2';
                    $configImage['source_image']	= './uploads/items/'.$_FILES['picture']['name'];
                    $configImage['maintain_ratio'] = TRUE;
                    $configImage['width']	 = 200;
                    $configImage['height']	= 200;

                    $this->load->library('image_lib', $configImage);
                    if ( ! $this->image_lib->resize())
                    {
                        //$this->SetMsg($this->image_lib->display_errors(), '', TypeMessage::Error, false);
                    }

                    $this->item->update($id, array('picture'=> $_FILES['picture']['name'] ));
                }else{
                    //On indique l'erreur, l'image reste la même
                    // $this->SetMsg($this->upload->display_errors(), '', TypeMessage::Error, false);
                }
            }
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
            $this->load->model('collection');
            $myCategorie = $this->category->getById($i->category_id);
            $collection = $myCategorie->collection_id;
            $myCollection = $this->collection->getById($collection);
            $categories = $this->category->getByCollection($collection);

            $data['titre_page'] = 'Aperçu';
            $data['vue'] = 'items/edit_view.php';
            $data['menu'] = 'items';
            $data['i'] = $i;
            $data['categories'] = $categories;
            $data['collection'] = $myCollection;
            $this->load->helper('form');
            $this->load->view('template', $data);
        } else {
            //$now = new DateTime("now", new DateTimeZone('Europe/Paris'));
            $this->item->update($id,$this->input->post());
            if(isset($_FILES['picture'])){
                $configUpload['upload_path'] = './uploads/items';
                $configUpload['allowed_types'] = 'gif|jpg|png';
                $configUpload['overwrite'] = true;
                $configUpload['max_size']	= '10000';

                $_FILES['picture']['name'] = $id."_".$_FILES['picture']['name'];

                $this->load->library('upload', $configUpload);
                if($this->upload->do_upload('picture'))
                {
                    $configImage['image_library'] = 'gd2';
                    $configImage['source_image']	= './uploads/items/'.$_FILES['picture']['name'];
                    $configImage['maintain_ratio'] = TRUE;
                    $configImage['width']	 = 200;
                    $configImage['height']	= 200;

                    $this->load->library('image_lib', $configImage);
                    if ( ! $this->image_lib->resize())
                    {
                        //$this->SetMsg($this->image_lib->display_errors(), '', TypeMessage::Error, false);
                    }


                    $this->item->update($id, array('picture'=> $_FILES['picture']['name'] ));
                }else{
                    //On indique l'erreur, l'image reste la même
                    // $this->SetMsg($this->upload->display_errors(), '', TypeMessage::Error, false);
                }
            }
            redirect('items/detail/'.$id);
        }
    }

    function detail($id){
        //$this->load->model('item');
        $this->load->model('item');
        $i= $this->item->getById($id);
        $this->addBreadcrumbs("items/detail/".$id, $i->name);
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
