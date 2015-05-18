<?php
class categories extends Public_Controller{
	function __construct(){
		parent::__construct();
	}
	
	function category_download()
	{
	
		$data['rs'] = new Category();
		$data['rs']->where("module = 'downloads'")->get();
		
		$data['calendar'] = new Category_calendar();
		$data['calendar']->get();
		
		
		$this->load->view('_menu',$data);
		
	}
	
	

}
?>