<?php
defined('BASEPATH') OR exit('Access Denied');


class Gen {

	public function checkLogin() 
	{
        if (empty($_SESSION['logged_in_admin'])) {
            //redirect to log in page            
            redirect(base_url() .'admin'); //redirects to login page
        } 
        
        else {
            return "";
        }
    }
    
}

?>