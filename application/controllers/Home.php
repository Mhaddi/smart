<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct()
	{
		parent:: __construct();
		$this->load->Model("Smartmodel");
	}

	public function index()
	{
		$this->load->view('header_view');
		$tag='device';
		$data['content']=$this->Smartmodel->searchall();

		$data['world']=$this->Smartmodel->searchmodel_world($tag);
		$data['diy']=$this->Smartmodel->searchmodel_diy($tag);
		$data['tag_idea']=$this->Smartmodel->tag_ideas();
		$this->load->view('home_view',$data);
	}
	public function search()
	{
		
		$tag=$this->input->post('search');
		$data['content']=$this->Smartmodel->searchmodel($tag);
		$data['world']=$this->Smartmodel->searchmodel_world($tag);
		$data['diy']=$this->Smartmodel->searchmodel_diy($tag);
		$data['tag_idea']=$this->Smartmodel->tag_ideas();
		$this->load->view('header_view');
		$this->load->view('home_view',$data);
	}
	public function searchbytag()
	{
		$tag=$this->uri->segment(3);
		$data['content']=$this->Smartmodel->searchmodel($tag);
		$data['world']=$this->Smartmodel->searchmodel_world($tag);
		$data['diy']=$this->Smartmodel->searchmodel_diy($tag);
		$data['tag_idea']=$this->Smartmodel->tag_ideas();
		$this->load->view('header_view');
		$this->load->view('home_view',$data);
	}
	

}
