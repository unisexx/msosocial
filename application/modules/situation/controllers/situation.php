<?php
class Situation extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	
	function index(){
	
		
		$data['rs'] = new Situations();
		
		$data['rs']->where('module = "'.$_GET['module'].'" and category= "'.$_GET['category'].'"  and status="approve"')->order_by('id desc')->get_page();
		
		$this->template->build('index',$data);
	}
	
	function view($id=false){
		
		$rs = new Situations($id);
		
		$rs->counter +=1;
		
		$rs->save();
		
		$data['rs'] = new Situations($id);
		$this->template->build('view',$data);
	}
	
	
	/*	ใน controller
	$data['rs'] = $this->member->get();
	$data['paginantion'] = $this->member->pagination();
	$this->template->build('index',$data);
	
	ใน view จะเอา pagination มาโชว์ก้อใส่
	<?php echo $pagination;?>*/
	
}
?>