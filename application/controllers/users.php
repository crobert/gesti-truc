<?php

class Users extends CI_Controller {

    function Users()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->model('user');
        $collections = $this->user->getAll();

        $data['users'] = $collections;
        $data['titre_page'] = 'Aperçu';
        $data['vue'] = 'users/users.php';
        $data['menu'] = 'users';
        $this->load->view('template', $data);

    }

    function add(){
        //Règles pour tous les champs
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nom', 'trim|required|xss_clean');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {


            $data['titre_page'] = 'Aperçu';
            $data['vue'] = 'users/add_view.php';
            $data['menu'] = 'users';
            $this->load->helper('form');
            $this->load->view('template', $data);



        } else {
            //$now = new DateTime("now", new DateTimeZone('Europe/Paris'));
            $this->load->model('user');
            $id= $this->user->add($this->input->post());
            redirect('users');
        }
    }

    function edit($id){

        $this->load->model('user');
        $u= $this->user->getById($id);

        //Règles pour tous les champs
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nom', 'trim|required|xss_clean');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');


        if ($this->form_validation->run() == FALSE) {

            $data['titre_page'] = 'Aperçu';
            $data['vue'] = 'users/edit_view.php';
            $data['menu'] = 'users';
            $data['u'] = $u;
            $this->load->helper('form');
            $this->load->view('template', $data);

        } else {
            //$now = new DateTime("now", new DateTimeZone('Europe/Paris'));
            $this->load->model('user');
            $id= $this->user->update($id,$this->input->post());
            redirect('users');
        }
    }

    function register()
    {
        // Create user object
        $u = new User();

        // Put user supplied data into user object
        // (no need to validate the post variables in the controller,
        // if you've set your DataMapper models up with validation rules)
        $u->username = $this->input->post('username');
        $u->password = $this->input->post('password');
        $u->confirm_password = $this->input->post('confirm_password');
        $u->email = $this->input->post('email');

        // Attempt to save the user into the database
        if ($u->save())
        {
            echo '<p>You have successfully registered</p>';
        }
        else
        {
            // Show all error messages
            echo '<p>' . $u->error->string . '</p>';
        }
    }

    function login()
    {
        // Create user object
        $u = new User();

        // Put user supplied data into user object
        // (no need to validate the post variables in the controller,
        // if you've set your DataMapper models up with validation rules)
        $u->username = $this->input->post('username');
        $u->password = $this->input->post('password');

        // Attempt to log user in with the data they supplied, using the login function setup in the User model
        // You might want to have a quick look at that login function up the top of this page to see how it authenticates the user
        if ($u->login())
        {
            echo '<p>Welcome ' . $u->username . '!</p>';
            echo '<p>You have successfully logged in so now we know that your email is ' . $u->email . '.</p>';
        }
        else
        {
            // Show the custom login error message
            echo '<p>' . $u->error->login . '</p>';
        }
    }
}

/* End of file users.php */
/* Location: ./application/controllers/users.php */