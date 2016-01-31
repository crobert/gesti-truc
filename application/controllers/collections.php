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
        //$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('type', 'Type', 'trim|required|xss_clean');

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
            //We upload the picture
            if(isset($_FILES['picture'])){
                $configUpload['upload_path'] = './uploads/collections';
                $configUpload['allowed_types'] = 'gif|jpg|png';
                $configUpload['overwrite'] = true;
                $configUpload['max_size']	= '10000';

                $_FILES['picture']['name'] = $id."_".$_FILES['picture']['name'];

                $this->load->library('upload', $configUpload);
                if($this->upload->do_upload('picture'))
                {
                    $configImage['image_library'] = 'gd2';
                    $configImage['source_image']	= './uploads/collections/'.$_FILES['picture']['name'];
                    $configImage['maintain_ratio'] = TRUE;
                    $configImage['width']	 = 200;
                    $configImage['height']	= 200;

                    $this->load->library('image_lib', $configImage);
                    if ( ! $this->image_lib->resize())
                    {
                        //$this->SetMsg($this->image_lib->display_errors(), '', TypeMessage::Error, false);
                    }


                    $this->collection->update($id, array('picture'=> $_FILES['picture']['name'] ));
                }else{
                    //On indique l'erreur, l'image reste la même
                    // $this->SetMsg($this->upload->display_errors(), '', TypeMessage::Error, false);
                }
            }
            redirect('collections/detail/'.$id);
        }
    }

    function edit($id){

        $this->load->model('collection');
        $c= $this->collection->getById($id);

        //Règles pour tous les champs
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nom', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('type', 'Type', 'trim|required|xss_clean');

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

            //We upload the picture
            if(isset($_FILES['picture'])){
                $configUpload['upload_path'] = './uploads/collections';
                $configUpload['allowed_types'] = 'gif|jpg|png';
                $configUpload['overwrite'] = true;
                $configUpload['max_size']	= '10000';

                $_FILES['picture']['name'] = $id."_".$_FILES['picture']['name'];

                $this->load->library('upload', $configUpload);
                if($this->upload->do_upload('picture'))
                {
                    $configImage['image_library'] = 'gd2';
                    $configImage['source_image']	= './uploads/collections/'.$_FILES['picture']['name'];
                    $configImage['maintain_ratio'] = TRUE;
                    $configImage['width']	 = 200;
                    $configImage['height']	= 200;

                    $this->load->library('image_lib', $configImage);
                    if ( ! $this->image_lib->resize())
                    {
                        //$this->SetMsg($this->image_lib->display_errors(), '', TypeMessage::Error, false);
                    }


                    $this->collection->update($id, array('picture'=> $_FILES['picture']['name'] ));
                }else{
                    //On indique l'erreur, l'image reste la même
                   // $this->SetMsg($this->upload->display_errors(), '', TypeMessage::Error, false);
                }
            }
            redirect('collections/detail/'.$id);
        }
    }

    function detail($id){
        $this->load->model('collection');
        $this->load->model('category');
        $c= $this->collection->getById($id);
        //todo test si $c existe


        $categories = $this->category->getByCollection($id);

        $data['titre_page'] = 'Aperçu';
        $data['vue'] = 'collections/detail_view.php';
        $data['menu'] = 'collections';
        $data['c'] = $c;
        $data['categories'] = $categories;
        $this->load->view('template', $data);

    }

    function delete($id)
    {
        $this->load->model('collection');
        $this->load->model('category');
        $this->load->model('item');

        $categories = $this->category->getByCollection($id);

        foreach($categories as $cat)
        {
            $this->item->deleteByCategory($cat->id);
            $this->category->delete($cat->id);
        }
        $this->collection->delete($id);

        redirect('collections/');
    }
}

/* End of file users.php */
/* Location: ./application/controllers/users.php */