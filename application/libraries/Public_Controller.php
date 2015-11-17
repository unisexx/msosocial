<?php
class Public_Controller extends Master_Controller
{
	function __construct()
	{
		parent::__construct();
		
		header('Content-type: text/html; charset=UTF-8');
		$this->template->title('สำนักงานคณะกรรมการส่งเสริมการจัดสวัสดิการสังคมแห่งชาติ กรมพัฒนาสังคมและสวัสดิการ');
		$this->template->set_theme('msosocial');
    	$this->template->set_layout('blank');
		
		// Set js
		$this->lang->load('admin');
		$this->template->append_metadata(js_notify());
        
        // Set Language
        if(!$this->session->userdata('lang')) $this->session->set_userdata('lang','th');
       
        if(@$this->session->userdata('lang') == "th"){
            $this->lang->load('public','thai');
        }elseif(@$this->session->userdata('lang') == "en"){
            $this->lang->load('public','english');
        }else{
            $this->lang->load('public','china');
        }
	}
}
?>