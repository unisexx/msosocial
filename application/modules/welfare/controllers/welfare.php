<?php
class Welfare extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index(){
		
		
		$data['rs'] = new Welfares();
		$data['rs']->order_by('module asc')->get();
		//$data['rs']->where('module = "มุมความรู้" and status="approve"')->order_by('id desc')->get(4);
		$this->template->build('index',$data);
		
		
	}
	
	function lists(){
		
		
		$data['rs'] = new Welfares();
		$data['rs']->where('module = "'.$_GET['module'].'" and status="approve"')->order_by('module asc')->get_page();
		$this->template->build('list',$data);
		
		
	}
	
	function view($id=false){
		
		$rs = new Welfares($id);
		
		$rs->counter +=1;
	
		$rs->save();
		
		$data['rs'] = new Welfares($id);
			
		$this->template->build('view',$data);
	}

	
	function home_welfare(){
		
		$data['rs'] = new Welfares();
		
		$data['rs']->order_by('module asc')->get();
		
		$this->load->view('home_welfare',$data);
		
		//$this->template->build("home_welfare",$data);
	}
	
}
?>