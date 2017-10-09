<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
		{
			  parent::__construct();
			$this->load->Model('AdminModel');
			
		}
	public function index()
	{
		$dataerror['error']='';
		$this->load->view('admin/adminlogin', $dataerror);
	}
	
	 public function userlogin()
    {
         $data['UserName']=$this->input->post('UserName');
         $data['Password']=md5($this->input->post('Password'));
        $query=$this->AdminModel->UserLoginModel($data);
		
		if ($query->num_rows() == 1) 
        {
			$result = $query->result();
            $session_data = array('UserName' => $this->input->post('UserName'),"userid"=>$result[0]->Id);
           $this->session->set_userdata('logged_in_admin', $session_data);
			$url=  base_url()."dashboard";
			header("Location:$url");
        } 
        else 
        {
			
			$dataerror['error']="Invalid Email or Password";
			$this->load->view("admin/adminlogin",$dataerror);

        }
    }
    public function logout()
    {
        // Removing session data
        $sess_array = array('username' => '','userid'=>'');
        $this->session->unset_userdata('logged_in_admin', $sess_array);
        $dataerror['error']="";
        $url=  base_url()."admin";
        header("Location:$url");
	}
    //put your code here

}