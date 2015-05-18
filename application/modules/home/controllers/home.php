<?php
class Home extends Public_Controller {

	function __construct()
	{
		parent::__construct();	
	}
	
	function index()
	{
		$this->template->set_layout('home');
		$this->template->build('index');
	}
	
	function intro(){
		$this->load->view('intro');
	}
	
	public function lang($lang)
	{
		$this->load->library('user_agent');
		$this->session->set_userdata('lang',$lang);
		
		redirect($this->agent->referrer());
	}
	
	public function sitemap()
	{
		$data['categories'] = new Category();
		$data['childs'] = new Category();
		$data['categories']->where("parents = 0 and id not in (74)")->get();
		$data['num'] = ceil($data['categories']->where("parents = 0 and id not in (74)")->count()/2);
		$this->template->build('sitemap',$data);
	}
	
	function testmail(){
			$this->load->library('email');
			$this->email->from('kenku440065@gmail.com', 'Emp@FD');
			$this->email->to('pichai_preeda@hotmail.com');
			$this->email->subject('ทดสอบส่งเมล์');
			$this->email->message('ทดสอบส่งเมล์  \t\n 555+');
			$this->email->send();
			echo $this->email->print_debugger();
	}
	
	function search()
	{
		$this->template->title(lang('search').' - zulex.co.th');
		$this->template->build('search');
	}
	
	function under_construction(){
		$this->template->build('under_contruction');
	}
	
	
	public function showP()
	{

		include('themes/msosocial/odbc_connect.php');
		$this->load->helper('html');

		$rs = $db->Execute("select * from WEB_NEWS order by id desc");
		
		
		foreach($rs as $row){
			
			print_r($rs);
		}
		
		
	}
	
	public function testdb()
	{

		$this->load->library('adodb');
		$row = $this->ado->pageexecute('SELECT * FROM ACT_PROVINCE', 10, 1);
		//dbConvert($row);
		foreach($row as $item)
		{
			dbConvert($item);
			echo $item['province_name'].'<br />';
		}
	}
	
	
}
?>