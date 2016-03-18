<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Set the session vars used to display breadcrumbs
     * Check if it's a new page or one from history
     */
    function addBreadcrumbs($link, $value){

        $breadcrumbs = $this->session->userdata('breadcrumbs');
        $crumb = array("link" => $link, "value" => $value);
        //If we already have this crumb in our list, then we keep it and remove everything after
        if(in_array($crumb, $breadcrumbs))
        {
            $idx = array_search($crumb, $breadcrumbs)+1;
            $breadcrumbs = array_slice($breadcrumbs,0,$idx);
        }else{
            //Else, we simply add it at the end
            array_push($breadcrumbs,$crumb);
        }
        $this->session->set_userdata(array('breadcrumbs'=>$breadcrumbs));
    }
    function clearBreadcrumbs(){
        $breadcrumbs = array();
        array_push($breadcrumbs,array("link" => "collections", "value" => "Collections"));
        $this->session->set_userdata(array('breadcrumbs'=>$breadcrumbs));
    }

}

/* Fin du contrôleur Mu_Auth.php */

