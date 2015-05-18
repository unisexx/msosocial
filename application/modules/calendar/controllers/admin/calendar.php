<?php
	
class Calendar extends Admin_Controller{
	
	function __construct(){
		parent::__construct();
	}
	
	function index()
	{
		$calendar = new Calendars();
		if(@$_GET['search'])$calendar->where("title like '%".$_GET['search']."%'");
		
		if(@$_GET['module'])
		{
			$calendar->where("module = '".$_GET['module']."'");	
			$data['module'] = $_GET['module'];
			$data['category'] = $_GET['category'];
		}
		
		
		$data['rs'] = $calendar->order_by('id','desc')->get_page();
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['rs'] = new Calendars($id);
		$this->template->append_metadata(js_datepicker());
		if(@$_GET['module'])
		{
			$data['module'] = $_GET['module'];
			$data['category'] = $_GET['category'];
		}
		else
		{
			$calendar = new Calendars($id);
			
			
			$data['module'] = $calendar->module;
			$data['category'] = $calendar->category;
			
		}
		$this->template->build('admin/form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$rs = new Calendars($id);
			if($_FILES['image']['name'])
            {
                if($rs->id){
                    $rs->delete_file($rs->id,'uploads/calendar','image');
                }
                $_POST['image'] = $rs->upload($_FILES['image'],'uploads/calendar/',139,96);
            }
			
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			$_POST['status'] = "approve";
			
			$stime=date('H:i:s');
			$s_date = $_POST['start_date'];
			$e_date = $_POST['end_date'];
			
			$sd = explode("/", $s_date); 
			$ed = explode("/", $e_date); 
			
			$start_date = ($sd[2]  - 543).'-'.$sd[1].'-'.$sd[0].' '.$stime;
			$end_date = ($ed[2]  - 543).'-'.$ed[1].'-'.$ed[0].' '.$stime;
			
			$_POST['start_date'] = $start_date;
			$_POST['end_date'] = $end_date;
			$_POST['orderlist'] = 0;
			$_POST['slug'] = $_POST['module'];
			
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
			$rs = new Calendars($id);
			$rs->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$rs = new Calendars($id);
			$rs->from_array($_POST);
			$rs->save();
		}

	}
}

?>