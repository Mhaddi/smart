<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
		{
			parent::__construct();
			$this->load->library('Gen');
			$this->gen->checkLogin();
			$this->load->Model('DashboardModel');
		}
	public function index()
	{
		$this->load->view('admin/header_view');
		$data['smart_home_count']=$this->DashboardModel->smart_home_count_model();
		$data['smart_community_count']=$this->DashboardModel->smart_community_count_model();
		$data['smart_city_count']=$this->DashboardModel->smart_city_count_model();
		$data['smart_world_count']=$this->DashboardModel->smart_world_count_model();
		$data['diy_count']=$this->DashboardModel->diy_count_model();
		$this->load->view('admin/dashboard',$data);
		$this->load->view('admin/footer_view');
	}
	public function blogg()
	{
		//$this->load->view('admin/header_view');
		$this->load->view('admin/blogg_view');
		//$this->load->view('admin/footer_view');
	}
	public function blogg_manage()
	{
		$this->load->view('admin/header_view');

		$data['data_fleet']=$this->DashboardModel->blogg_manage_model();
		$this->load->view('admin/blogg_manage_view', $data);
		$this->load->view('admin/footer_view');
	}
	public function smart_world()
	{
		$this->load->view('admin/header_view');
		$this->load->view('admin/world_view');
		$this->load->view('admin/footer_view');
	}
	public function smart_world_manage()
	{
		$this->load->view('admin/header_view');

		$data['data_fleet']=$this->DashboardModel->smart_world_manage_model();
		$this->load->view('admin/world_manage_view', $data);
		$this->load->view('admin/footer_view');
	}
	public function diy()
	{
		$this->load->view('admin/header_view');
		$this->load->view('admin/diy_view');
		$this->load->view('admin/footer_view');
	}
	public function diy_manage()
	{
		$this->load->view('admin/header_view');

		$data['data_fleet']=$this->DashboardModel->diy_manage_manage_model();
		$this->load->view('admin/diy_manage_view', $data);
		$this->load->view('admin/footer_view');
	}
	

	
	public function fleet_insert()
	{
		 $data['heading']=$this->input->post('heading');
		 $data['text']=$this->input->post('text');
		 $data['tag']=$this->input->post('tag');
		 $data['cat']=$this->input->post('cat');
		 $config['upload_path'] = './admin_assets/images/page_uploads/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']	= '20000';
                    $config['max_width']  = '20240';
                    $config['max_height']  = '17680';
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if(!$this->upload->do_upload('ppic'))
                    {
                      //  echo $this->upload->display_errors();
//exit();
						$this->DashboardModel->fleet_upload($data);
						$url=  base_url()."dashboard/index";
						header("Location:$url");
                    }
                    else
                    {   
                        $abc = array('upload_data' => $this->upload->data());
						$Path=$abc['upload_data']['file_name'];
						$data['pic']=$Path;
						$this->DashboardModel->fleet_upload($data);
						$url=  base_url()."dashboard/index";
						header("Location:$url");
                    }

		 
	}
	public function fleet_delete()
	{
		$id=$this->uri->segment(3);
		$this->DashboardModel->fleet_delete_model($id);
		$url=  base_url()."dashboard";
		header("Location:$url");
	}
	public function page()
	{
		$this->load->view('admin/header_view');
		$this->load->view('admin/page_view');
		$this->load->view('admin/footer_view');
	}
	public function page_insert()
	{
		 
		 $data['heading']=$this->input->post('heading');
		 $data['text']=$this->input->post('text');
		 $data['tag']=$this->input->post('tag');
		 $data['cat']=$this->input->post('cat');
		 $config['upload_path'] = './admin_assets\images\page_uploads/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']	= '20000';
                    $config['max_width']  = '20240';
                    $config['max_height']  = '17680';
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if(!$this->upload->do_upload('ppic'))
                    {
                        //echo $this->upload->display_errors();
						$this->DashboardModel->page_upload($data);
						$url=  base_url()."dashboard/page_manage";
						header("Location:$url");
                    }
                    else
                    {   
                        $abc = array('upload_data' => $this->upload->data());
						$Path=$abc['upload_data']['file_name'];
						$data['pic']=$Path;
						$this->DashboardModel->page_upload($data);
						$url=  base_url()."dashboard/page_manage";
						header("Location:$url");
                    }

		 
	}
	public function page_manage()
	{
		$this->load->view('admin/header_view');
		$data['page_list']=$this->DashboardModel->page_manage_model();
		$this->load->view('admin/page_manage_view', $data);
		$this->load->view('admin/footer_view');
	}
	public function page_delete()
	{
		$id=$this->uri->segment(3);
		$this->DashboardModel->page_delete_model($id);
		$url=  base_url()."dashboard";
		header("Location:$url");
	}
	public function page_edit()
	{
		$id=$this->uri->segment(3);
		$data['page_data']=$this->DashboardModel->page_edit_get_model($id);
		$data['id']=$id;
		$this->load->view('admin/header_view');
		$this->load->view('admin/page_edit_view', $data);
		$this->load->view('admin/footer_view');
		
	}

	public function page_edit_insert()
	{
		$id=$this->input->post('id');
		 $data['heading']=$this->input->post('heading');
		 $data['text']=$this->input->post('text');
		 $data['tag']=$this->input->post('tag');
		 $data['cat']=$this->input->post('cat');
		 $config['upload_path'] = './assets\images\page_uploads/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']	= '20000';
                    $config['max_width']  = '20240';
                    $config['max_height']  = '17680';
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if(!$this->upload->do_upload('ppic'))
                    {
                        //echo $this->upload->display_errors();
						$this->DashboardModel->page_update($id,$data);
						$url=  base_url()."dashboard/page_manage";
						header("Location:$url");
                    }
                    else
                    {   
                        $abc = array('upload_data' => $this->upload->data());
						$Path=$abc['upload_data']['file_name'];
						$data['pic']=$Path;
						$this->DashboardModel->page_update($id,$data);
						$url=  base_url()."dashboard/page_manage";
						header("Location:$url");
                    }

	}

}
?>