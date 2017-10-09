<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class HomeModel extends CI_Model{
    public function __construct() {
        parent::__construct();
        
    }
	
	
      
    public function fleet_model()
    {
            $this->db->select('title, pic');
            $this->db->from('smart_home');
            $query = $this->db->get();
            return $query->result();    
    }
    public function header_model()
    {
            $this->db->select('title');
            $this->db->from('smart_home');
            $query = $this->db->get();
            return $query->result();    
    }
    public function dynamic_model($title)
    {
            $this->db->select('heading,text,pic,tag,cat');
            $this->db->from('smart_home');
            $this->db->where('title', $title);
            $this->db->limit(1);
            $query = $this->db->get();
            return $query->result();    
    }

    
    
}
?>
