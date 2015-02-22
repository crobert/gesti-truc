<?php

class Users extends CI_Controller {

    function Users()
    {
        parent::__construct();
    }

    function index()
    {
        // Let's create a user
        $u = new User(3);

        // Let's now get the first 5 books from our database
        $b = new Collection(1);

        // Let's look at the first book
        echo 'ID: ' . $b->id . '<br />';
        echo 'Name: ' . $b->name . '<br />';
        echo 'Description: ' . $b->description . '<br />';
        echo 'Type: ' . $b->type . '<br />';

        if ( $u->save( $b)){
            echo "save OK";

        }else{
            echo "save not OK<br/>";
            foreach ($b->error->all as $error)
            {
                echo $error;
            }
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