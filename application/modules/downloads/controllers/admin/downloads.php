<?php
	
class Downloads extends Admin_Controller{
	
	function __construct(){
		parent::__construct();
	}
	
	function index()
	{
		$download = new Download();
		if(@$_GET['search'])$download->where("title like '%".$_GET['search']."%'");
		
		if(@$_GET['module'])
		{
			$download->where("module = '".$_GET['module']."'");	
			$data['module'] = $_GET['module'];
			$data['category_id'] = $_GET['category_id'];
		}
		
		
		$data['rs'] = $download->order_by('id','desc')->get_page();
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['rs'] = new Download($id);
		$this->template->append_metadata(js_datepicker());
		
		if(@$_GET['module'])$data['module'] = $_GET['module'];
		if(@$_GET['category_id'])$data['category_id'] = $_GET['category_id'];
		
		$this->template->build('admin/form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$rs = new Download($id);
			
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			$_POST['status'] = "approve";
			
			$rs->from_array($_POST);
			$rs->save();
			set_notify('success', lang('save_data_complete'));
			redirect($_POST['referer']);
		}
		
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$rs = new Download($id);
			$rs->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$rs = new Download($id);
			$rs->from_array($_POST);
			$rs->save();
		}

	}
}

?>