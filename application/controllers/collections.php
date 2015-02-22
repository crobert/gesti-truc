<?php

class Collections extends CI_Controller {

    function Collections()
    {
        parent::__construct();
    }

    function index()
    {
        $collections = new Collection();
        $collections->get_iterated();

        $data['collections'] = $collections;
        $data['titre_page'] = 'Aperçu';
        $data['vue'] = 'collections';
        $data['menu'] = 'collections';
        $this->load->view('template', $data);

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