<?php
class Contents extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	
	function index(){
		
		//contents/view?module=เกี่ยวกับ กบท.&category=โครงสร้างหน่วยงาน
		
		$data['rs'] = new Content();
		$data['rs']->where('module = "'.$_GET['module'].'"')->get();
		$this->template->build('index',$data);
	}
	
	function view(){
		
		//contents/view?module=เกี่ยวกับ กบท.&category=โครงสร้างหน่วยงาน
		
		$data['rs'] = new Content();
		$data['rs']->where('module = "'.$_GET['module'].'" and category = "'.$_GET['category'].'"')->get(1);
		$this->template->build('view',$data);
	}
	
     function report_view($id=FALSE)
	{
		
		$conten = new Content($id);
		
		$conten->counter +=1;
		
		$conten->save();
		
		$data['rs'] = new Content($id);
		$this->template->build('view_report',$data);
	}
	
	
	function home_report(){
		
		$data['rs'] = new Content();
		
		$data['rs']->order_by('id desc')->get_page();
		
		$this->load->view('home_report',$data);
	}
	
	function lists_report(){
		$data['rs'] = new Content();
		$data['rs']->where('module = "'.$_GET['module'].'" and category = "'.$_GET['category'].'"')->get_page();
		$this->template->build('list_report',$data);
	}
	
	
}
?>