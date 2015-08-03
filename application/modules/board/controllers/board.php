<?php 

class Board extends Public_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('adodb');
	}
	
	public function index()
	{
		$sql = "select c.*,
		p.province_name  
		from act_committee_main c 
		join act_province p on p.province_code = c.province_code 
		order by c.order_date desc";
		$data = $this->ado->getarray($sql);
		$limit = '20';
		$target = preg_replace('/([&?]+page=[0-9]+)/i', '',  $_SERVER['REQUEST_URI']);
		$current_page = @$_GET['page'];
		$this->load->library('pagination');
		$page = new pagination();
		$page->target($target);
		$page->limit($limit);
		$page->currentPage($current_page);
		$rs = $this->ado->PageExecute($sql, $limit, $page->page);
		@$page->Items($rs->_maxRecordCount);			
		$data['pagination'] = $page->show();
		$data['result'] = $rs->GetArray();
		dbConvert($data['result']);
		$this->template->build('board/index', @$data);
	}
	
	public function province($id)
	{
		$sql = "select s.*, 
		t.title_name,
		p.position_name 
		from act_committee_sub s 
		join act_title_name t on t.title_id = s.title_id
		join act_committee_position p on p.id = s.position_id
		where s.committee_id = $id
		order by s.id";
		$data = $this->ado->getarray($sql);
		$limit = '20';
		$target = preg_replace('/([&?]+page=[0-9]+)/i', '',  $_SERVER['REQUEST_URI']);
		$current_page = @$_GET['page'];
		$this->load->library('pagination');
		$page = new pagination();
		$page->target($target);
		$page->limit($limit);
		$page->currentPage($current_page);
		$rs = $this->ado->PageExecute($sql, $limit, $page->page);
		@$page->Items($rs->_maxRecordCount);			
		$data['pagination'] = $page->show();
		$data['result'] = $rs->GetArray();
		dbConvert($data['result']);
		
		$committee_type = array(
			'1'=>'คณะกรรมการส่งเสริมการจัดสวัสดิการสังคมแห่งชาติ',
			'2'=>'คณะกรรมการส่งเสริมการจัดสวัสดิการสังคมจังหวัด',
			'3'=>'คณะกรรมการส่งเสริมการจัดสวัสดิการสังคมกรุงเทพมหานคร',
			'4'=>'คณะกรรมการบริหารกองทุนส่งเสริมการจัดสวัสดิการสังคม',
			'5'=>'คณะกรรมการติดตามและประเมินผลการดำเนินงานของกองทุนส่งเสริมการจัดสวัสดิการสังคม'
		);
		$sql = "select c.committee_type,
		p.province_name  
		from act_committee_main c 
		join act_province p on p.province_code = c.province_code  
		where c.id = $id";
		$rs = $this->ado->getrow($sql);
		dbConvert($rs); 
		$data['committee_name'] = $committee_type[$rs['committee_type']].' '.$rs['province_name'];
		
		$this->template->build('board/province', @$data);
	}
	
}
