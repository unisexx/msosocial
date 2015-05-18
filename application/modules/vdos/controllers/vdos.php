<?php
class Vdos extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index(){
		
		
		$data['rs'] = new Vdo();
		$data['rs']->order_by('id desc')->order_by('id desc')->get_page();
		$this->template->build('list',$data);
		
		
	}
	
	function home_vdo(){
		$data['rs'] = new Vdo();
		$data['rs']->order_by('id desc')->get(1);
		$this->load->view('home_vdo',$data);
	}
	
/*	function lists(){
		
		
		$data['rs'] = new Vdo();
		$data['rs']->where('module = "'.$_GET['module'].'" and status="approve"')->get_page();
		$this->template->build('list',$data);
		
		
	}*/
	
	function view($id=false){
		
		$data['rs'] = new Vdo($id);
			
		$this->template->build('view',$data);
	}
	
	
	function ajax_show_vid(){
		echo youtube($_GET['url']);
	}

	
}
?>