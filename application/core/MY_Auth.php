<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Auth extends MY_Controller
{
    /**
     * Check if a user is authorize to access the application
     */
    function __construct()
    {
        parent::__construct();
        //On test si l'utilisateur est connecté ou pas.
        if (!$this->session->userdata('logged')) {
            //S'il ne l'est pas on le redirige sur la page de log
            redirect('login', 'refresh');
        }
    }

    public function IsAdmin()
    {

    }

    public function IsGranted()
    {

    }

}

/* Fin du contrôleur Mu_Auth.php */

