<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Login
 * Gestion de la connexion et déconnexion
 * Reinitialisation des identifiants.
 */
class Login extends CI_Controller
{

    /**
     * Display the login form if necessary
     */
    public function index()
    {
        //if we're already logged then we go to the default page
        if ($this->session->userdata('logged')) {
            //S'il ne l'est pas on le redirige sur la page de log
            redirect('', 'refresh');
        }else{
            //We display the login form
            //Règles pour tous les champs
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_credentials');

            if ($this->form_validation->run() == FALSE) {
                $data['titre_page'] = 'Login';
                $data['vue'] = 'login_view.php';
                $data['menu'] = '';
                $this->load->helper('form');
                $this->load->view('template', $data);
            } else {
                $this->session->set_userdata('logged', true);
                redirect('', 'refresh');
            }
        }
    }

    /**
     * Allow the other to disconnect so the login/password will be ask again next time
     */
    public function out()
    {
        $this->session->unset_userdata('logged');
        $this->session->sess_destroy();
        redirect('users', 'refresh');
    }

    /**
     * Check the login/password combination
     * @param $str
     * @return bool
     */
    function check_credentials($str)
    {
        $this->load->model('user');
        if ($this->user->check_credentials($this->input->post('username'),$this->input->post('password')))
            return TRUE;
        else {
            $this->form_validation->set_message('check_credentials', 'Wrong credentials');
            return FALSE;
        }
    }
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
