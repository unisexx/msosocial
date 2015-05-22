<?php
class Claimfund extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function lists() {
		$this->load->view('claimfund/list');
	}
	
	public function form($id = null) {
		//-- Set default $_GET['type']
		$_GET['type'] = (empty($_GET['type']))?1:$_GET['type'];
		if($_GET['type'] == 1) 		{ $form = 'formChild'; } 
		else if($_GET['type'] == 2) { $form = 'formSupport'; } 
		else if($_GET['type'] == 3)	{ $form = 'formTraffick'; }
		
		$this->load->view('claimfund/'.$form);
	}
	
	public function saveChild() {
		var_dump($_POST);
		return false;
		set_notify('success', 'บันทึกข้อมูลเสร็จสิ้น');
		redirect('org/member#tabs-3');
	}
}
?>