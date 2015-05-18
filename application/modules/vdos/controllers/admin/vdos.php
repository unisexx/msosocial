<?php
	
class Vdos extends Admin_Controller{
	
	function __construct(){
		parent::__construct();
	}
	
	function index()
	{
		$vdo = new Vdo();
		if(@$_GET['search'])$vdo->where("title like '%".$_GET['search']."%'");
		if(@$_GET['category_id'])$vdo->where("category_id = ".$_GET['category_id']);
		$data['rs'] = $vdo->order_by('id','desc')->get_page();
		$this->template->append_metadata(js_lightbox());
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['rs'] = new Vdo($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$rs = new Vdo($id);
			
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
			$rs = new Vdo($id);
			$rs->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$rs = new Vdo($id);
			$rs->from_array($_POST);
			$rs->save();
		}
	}
	
	function ajax_show_vid(){
		echo youtube($_GET['url']);
	}
}

?>