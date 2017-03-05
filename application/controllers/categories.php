<?php

class Categories extends MY_Auth
{

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
        $data['vue'] = 'categories/categories.php';
        $data['menu'] = 'categories';
        $this->load->view('template', $data);

    }

    /**
     * Create a new category
     * @param string $collection id of the collection you want to add a category
     */
    function add($collection = "")
    {
        //Règles pour tous les champs
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nom', 'trim|required|xss_clean');
       // $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
        $this->form_validation->set_rules('collection_id', 'Collection', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {

            $this->load->model('collection');
            $collections = $this->collection->getList();

            $data['titre_page'] = 'Aperçu';
            $data['vue'] = 'categories/add_view.php';
            $data['menu'] = 'categories';
            $data['collections'] = $collections;
            $data['collection'] = $collection;
            $this->load->helper('form');
            $this->load->view('template', $data);

        } else {

            //$now = new DateTime("now", new DateTimeZone('Europe/Paris'));
            $this->load->model('category');
            $id = $this->category->add($this->input->post());
            if(isset($_FILES['picture'])){
                $configUpload['upload_path'] = './uploads/categories';
                $configUpload['allowed_types'] = 'gif|jpg|png';
                $configUpload['overwrite'] = true;
                $configUpload['max_size']	= '10000';

                $_FILES['picture']['name'] = $id."_".$_FILES['picture']['name'];

                $this->load->library('upload', $configUpload);
                if($this->upload->do_upload('picture'))
                {
                    $configImage['image_library'] = 'gd2';
                    $configImage['source_image']	= './uploads/categories/'.$_FILES['picture']['name'];
                    $configImage['maintain_ratio'] = TRUE;
                    $configImage['width']	 = 200;
                    $configImage['height']	= 200;

                    $this->load->library('image_lib', $configImage);
                    if ( ! $this->image_lib->resize())
                    {
                        //$this->SetMsg($this->image_lib->display_errors(), '', TypeMessage::Error, false);
                    }

                    $this->category->update($id, array('picture'=> $_FILES['picture']['name'] ));
                }else{
                    //On indique l'erreur, l'image reste la même
                    //$this->SetMsg($this->upload->display_errors(), '', TypeMessage::Error, false);
                }
            }

            redirect('categories/detail/' . $id);
        }
    }

    function edit($id)
    {
        //Règles pour tous les champs
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nom', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
        $this->form_validation->set_rules('collection_id', 'Collection', 'trim|required|xss_clean');


        if ($this->form_validation->run() == FALSE) {

            $this->load->model('category');
            $this->load->model('collection');
            $c = $this->category->getById($id);
            $collections = $this->collection->getList();
            $myCollection = $this->collection->getById($c->collection_id);

            $data['titre_page'] = 'Aperçu';
            $data['vue'] = 'categories/edit_view.php';
            $data['menu'] = 'categories';
            $data['c'] = $c;
            $data['collections'] = $collections;
            $data['collection'] = $myCollection;
            $this->load->helper('form');
            $this->load->view('template', $data);

        } else {
            //$now = new DateTime("now", new DateTimeZone('Europe/Paris'));
            $this->load->model('category');
            $this->category->update($id, $this->input->post());
            //We upload the picture
            if(isset($_FILES['picture'])){
                $configUpload['upload_path'] = './uploads/categories';
                $configUpload['allowed_types'] = 'gif|jpg|png';
                $configUpload['overwrite'] = true;
                $configUpload['max_size']	= '10000';

                $_FILES['picture']['name'] = $id."_".$_FILES['picture']['name'];

                $this->load->library('upload', $configUpload);
                if($this->upload->do_upload('picture'))
                {
                    $configImage['image_library'] = 'gd2';
                    $configImage['source_image']	= './uploads/categories/'.$_FILES['picture']['name'];
                    $configImage['maintain_ratio'] = TRUE;
                    $configImage['width']	 = 200;
                    $configImage['height']	= 200;

                    $this->load->library('image_lib', $configImage);
                    if ( ! $this->image_lib->resize())
                    {
                        //$this->SetMsg($this->image_lib->display_errors(), '', TypeMessage::Error, false);
                    }


                    $this->category->update($id, array('picture'=> $_FILES['picture']['name'] ));
                }else{
                    //On indique l'erreur, l'image reste la même
                    // $this->SetMsg($this->upload->display_errors(), '', TypeMessage::Error, false);
                }
            }
            redirect('categories/detail/' . $id);
        }
    }

    function detail($id)
    {
        $this->load->model('item');
        $this->load->model('category');
        $c = $this->category->getById($id);
        $this->addBreadcrumbs("categories/detail/".$id, $c->name);
        //todo test si $c existe

        $items = $this->item->getByCategory($id);

        $data['titre_page'] = 'Aperçu';
        $data['vue'] = 'categories/detail_view.php';
        $data['menu'] = 'categories';
        $data['c'] = $c;
        $data['items'] = $items;
        // $data['categories'] = $categories;
        $this->load->view('template', $data);

    }

    function delete($id)
    {
        $this->load->model('category');
        $this->load->model('item');

        $c = $this->category->getById($id);

        $this->item->deleteByCategory($id);
        $this->category->delete($id);

        redirect('collections/detail/' . $c->collection_id);
    }

}

/* End of file categories.php */
/* Location: ./application/controllers/categories.php */
