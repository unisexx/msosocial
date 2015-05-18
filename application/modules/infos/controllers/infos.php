<?php
class Infos extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function lists(){
		$data['rs'] = new Info();
		$data['rs']->where('module = "'.$_GET['module'].'" and status="approve"')->get_page();
		$this->template->build('list',$data);
		
//		$this->template->set_layout('dev');
//		$this->template->build('list',$data);
		
		
		//$this->load->view('list',$data);
	}
	
	function view($id=false){
		$data['rs'] = new Info($id);
		$this->template->build('view',$data);
	}
	
	
	function news_relation(){
		$data['rs'] = new Info();
		$data['rs']->where('module = "กิจกรรม" and status="approve"')->order_by('id desc')->get(1);
		$this->load->view('news_relation',$data);
	}
	
	function news_relation_mso(){

		//$this->load->library('adodb');
		//$data['rs'] = $this->ado->pageexecute('SELECT * FROM WEB_NEWS ', 4, 1);
		
		include('themes/msosocial/odbc_connect.php');
		$this->load->helper('html');
		$data['rs_first'] = $db->Execute("select * from WEB_NEWS WHERE ID = 21");
		$data['rs'] = $db->Execute("select * from WEB_NEWS WHERE ROWNUM <=4 ORDER BY ID DESC");
		
		$this->load->view('inc_news_mso',$data);
	}

	function list_news_mso(){
		
		include('themes/msosocial/odbc_connect.php');
		$this->load->helper('html');
		
		$rs_first = $db->Execute("select * from WEB_NEWS WHERE ID = 21");
		
		foreach($rs_first as $row){
			
			dbConvert($row);
			$data['news_title'] = $row['title'];				
		}
		
		$data['rs'] = $db->Execute("select * from WEB_NEWS ORDER BY ID DESC");
		
		
		$this->template->build('list_news_mso',$data);
		
	}

	function view_mso($id=false){
		
		//$data['rs'] = new Info($id);
		include('themes/msosocial/odbc_connect.php');
		$this->load->helper('html');
		$data['rs'] = $db->Execute("select * from WEB_NEWS WHERE ID = ".$id);
		
		$this->template->build('view_mso',$data);
	}
	
	
	function home_situation(){
		$data['rs'] = new Info();
		$this->load->view('home_situation',$data);
	}
	
	function read_xml_file(){
		
				$doc = new DOMDocument();
				$doc->load( 'test1.xml' );//xml file loading here
				
				$employees = $doc->getElementsByTagName( "employee" );
				foreach( $employees as $employee )
				{
				  $names = $employee->getElementsByTagName( "name" );
				  $name = $names->item(0)->nodeValue;
				
				  $ages= $employee->getElementsByTagName( "age" );
				  $age= $ages->item(0)->nodeValue;
				
				  $salaries = $employee->getElementsByTagName( "salary" );
				  $salary = $salaries->item(0)->nodeValue;
				
				  echo "<b>$name - $age - $salary\n</b><br>";
				  }	
				  
	}

	
}
?>