<?php
class Downloads extends Public_Controller{
	function __construct(){
		parent::__construct();
	}
	
	function inc_home()
	{
		$data['rs'] = new Category();
		$this->load->view('inc_home');
	}
	
	function home_download()
	{
		$data['rs'] = new Download();
		
		$data['rs']->order_by('id desc')->get(10);
		
		$data['cat'] = new Downloadcategory();
		$data['cat']->where("module = 'downloads'")->get();
				
		$this->load->view('home_download',$data);
	}
	

	
	function lists(){
		$data['rs'] = new Download();
		$data['rs']->where('module = "'.$_GET['module'].'" and status="approve"')->order_by('id desc')->get_page();
		$this->template->build('list',$data);
	}
	
	function view($id=false){
		
		$rs = new Download($id);
		
		$rs->counter +=1;
		
		$file_download = $rs->files;
		
		$rs->save();
		
		//redirect("uploads/download/".$file_download);
		redirect($file_download);
		
	}
	
}
?>