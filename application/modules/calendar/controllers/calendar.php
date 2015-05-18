<?php
class Calendar extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	
		function home_calendar(){
		
		$data['rs'] = new Calendars();
		
		$data['rs']->order_by('id asc')->get_page();
		
		$this->load->view('home_calendar',$data);
		
	}
	
	
	function lists(){
		
		
		$data['rs'] = new Calendars();
		
		if(@$_GET['searchDate'])
		{
			$data['rs']->where('start_date like "%'.$_GET['searchDate'].'%"')->get();
		
		}
		else
		{
			$data['rs']->order_by('id desc')->get();	
			
		}
		
		$this->template->build('list',$data);
		
		
	}
	
   function showdetails($id=false){
		
		
		$rs = new Calendars($id);
		
		$rs->counter +=1;
		
		$rs->save();
		
		$data['rs'] = new Calendars($id);
		$this->template->build('view',$data);
		
		
	}
   
   
   	public function showP()
	{

		include('themes/msosocial/odbc_connect.php');
		$this->load->helper('html');

		$rs = $db->Execute("select * from INTRANET_ACTCALENDAR order by ID desc");
		
		
		foreach($rs as $row){
			
			print_r($rs);
		}
		
		
	}
	
	
	function calendar_mso(){
		
		
		include('themes/msosocial/odbc_connect.php');
		$this->load->helper('html');
		
		if(@$_GET['searchDate'])
		{
			$data['rs'] = $db->Execute("select * from INTRANET_ACTCALENDAR WHERE CREATEDATE = '".$_GET['searchDate']."' ORDER BY ID DESC");
		
		}
		else
		{
			$data['rs'] = $db->Execute("select * from INTRANET_ACTCALENDAR ORDER BY ID DESC");
			
		}
		
		$data['rs_type'] = $db->Execute("select * from INTRANET_ACTCALENDAR_TYPE ORDER BY ID DESC");
		$data['rs_acc'] = $db->Execute("select * from INTRANET_ACTCALENDAR_ACCESSORY ORDER BY ID DESC");
		
		$this->template->build('calendar_mso',$data);
		
		
	}
	
	function calendar_mso_detail($id=false){
		
		
		include('themes/msosocial/odbc_connect.php');
		$this->load->helper('html');
		
		$data['rs'] = $db->Execute("select * from INTRANET_ACTCALENDAR WHERE ID = ".$id);
		
		$this->template->build('calendar_mso_detail',$data);
		
		
	}
	
	
}
?>