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
		$this->load->view('claimfund/form');
	}
}
?>