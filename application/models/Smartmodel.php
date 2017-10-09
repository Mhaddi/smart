<?php
class Smartmodel extends CI_Model{
    
     public function __construct() {
        parent::__construct();
        
    }

    public function searchmodel($tag)
    {
        $this->db->select('*');
        $this->db->from('smart_home');
        $this->db->where('tag',$tag);
        $query = $this->db->get();
        return $query->result();
    }
    public function searchmodel_world($tag)
    {
        $this->db->select('text');
        $this->db->from('smart_home');
        $this->db->where('tag',$tag);
        $this->db->where('cat','world');
        $this->db->order_by('id', 'DESC ');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }
    public function searchmodel_diy($tag)
    {
        $this->db->select('text');
        $this->db->from('smart_home');
        $this->db->where('tag',$tag);
        $this->db->where('cat','diy');
        $this->db->order_by('id', 'DESC ');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }
    public function searchall()
    {
        $this->db->select('*');
        $this->db->from('smart_home');
        $query = $this->db->get();
        return $query->result();
    }
    public function tag_ideas()
    {
        $this->db->distinct();
        $this->db->select('tag');
        $this->db->from('smart_home');
        $query = $this->db->get();
        return $query->result();
    }
    
 
}
