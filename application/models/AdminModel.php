<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class AdminModel extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
	
	
      
    public function UserLoginModel($data)
    {
       $condition = "UserName =" . "'" . $data['UserName'] . "' AND " . "Password =" . "'" . $data['Password'] . "'";
        $this->db->select('admin.Id, admin.UserName, admin.Password ');
        $this->db->from('admin');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
    }
    
}
?>
