<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class DashboardModel extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function smart_home_count_model()
    {
        $this->db->from('smart_home');
        $this->db->where('cat', 'smart_home');
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }
    function smart_community_count_model()
    {
        $this->db->from('smart_home');
        $this->db->where('cat', 'smart_community');
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }
    function smart_city_count_model()
    {
        $this->db->from('smart_home');
        $this->db->where('cat', 'smart_city');
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }
    function smart_world_count_model()
    {
        $this->db->from('smart_home');
        $this->db->where('cat', 'world');
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }
    function diy_count_model()
    {
        $this->db->from('smart_home');
        $this->db->where('cat', 'diy');
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }

   	function fleet_upload($data)
    { 
    	$this->db->insert('smart_home',$data);
    }
    function page_upload($data)
    {  
    	$this->db->insert('smart_home',$data);
    }
    function page_manage_model()
    {  
        $this->db->select('id,heading,text,pic,tag,cat');
            $this->db->from('smart_home');
            $query = $this->db->get();
        return $query->result(); 
    } 
    function page_delete_model($id)
    {
        $this->db->delete('smart_home',array('id'=>$id));
    }
    function page_edit_get_model($id)
    {
        $this->db->select('id,heading,text,pic,tag,cat');
            $this->db->from('smart_home');
            $this->db->where('id', $id);
            $this->db->limit(1);
            $query = $this->db->get();
        return $query->result();
    }
    function page_update($id,$data)
    { 
        $this->db->where('id', $id);
        return $this->db->update('smart_home',$data);
    }
    function blogg_manage_model()
    {
        $this->db->select('id,heading,text,pic,tag,cat');
            $this->db->from('smart_home');
            $this->db->where('cat', 'smart_home');
            $this->db->or_where('cat', 'smart_community');
            $this->db->or_where('cat', 'smart_city');
            $query = $this->db->get();
        return $query->result(); 
    }
    function smart_world_manage_model()
    {
        $this->db->select('id,heading,text,tag,cat');
            $this->db->from('smart_home');
            $this->db->where('cat', 'world');
            $query = $this->db->get();
        return $query->result(); 
    }
    function diy_manage_manage_model()
    {
        $this->db->select('id,heading,text,tag,cat');
            $this->db->from('smart_home');
            $this->db->where('cat', 'diy');
            $query = $this->db->get();
        return $query->result(); 
    }
    
    function fleet_delete_model($id)
    {
        $this->db->delete('smart_home',array('id'=>$id));   
    }
        
}
?>
