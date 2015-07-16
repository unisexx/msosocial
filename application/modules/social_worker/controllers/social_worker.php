<?php
class Social_worker extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('adodb');
	}
	
	function register(){
		$data = '';
			
		$specifics = $this->ado->GetArray('SELECT ID,SPECIFIC_NAME FROM ACT_SPECIFIC ORDER BY SEQ asc');
		$target_groups = $this->ado->GetArray('SELECT * FROM ACT_TARGET_GROUP ORDER BY SEQ asc ');
		$data['specifics'] = $specifics;// dbConvert($specifics);
		$data['target_groups'] = $target_groups;		
		$this->template->build('register', $data);
	}	
	
	
	
	function ajax_ampor($type = NULL)
	{
		$text = ($type == 'report') ? '-- ทุกอำเภอ --' : '- เลือกอำเภอ -';
		$result = $this->ado->GetArray('select ampor_code,ampor_name as text from act_ampor where province_code = ? order by ampor_name',$_GET['q']);
        dbConvert($result);
		echo $result ? json_encode($result) : '[{"id":"","text":"'.$text.'"}]';
	}
	
	function ajax_tumbon($type=NULL)
	{
		$text = ($type == 'report') ? '-- ทุกตำบล --' : '- เลือกตำบล -';
		$result = $this->ado->GetArray('select tumbon_code,tumbon_name as text from act_tumbon where province_code = ? and ampor_code = ?',array($_GET['p'],$_GET['q']));
		dbConvert($result);
		echo $result ? json_encode($result) : '[{"id":"","text":"'.$text.'"}]';
	}
	
	function organ_select(){
		// $this->db->debug = true;
		//if(@$_GET){
		$condition = @$_GET['search']!='' ? " and L.ORGAN_NAME like '%".iconv('UTF-8','TIS-620',$_GET['search'])."%'" : "";
		$condition .= @$_GET['budget_year']!='' ? " and F.BUDGET_YEAR = ".$_GET['budget_year'] : "";
		$condition .= @$_GET['province_code']!='' ? " and L.PROVINCE_CODE = ".$_GET['province_code'] : "";
		
		$sql = "SELECT DISTINCT
		L.ORGAN_ID,
		L.ORGAN_NAME,
		L.UNDER_TYPE_SUB,
		L.HOME_NO,
		L.O_NAME,
		L.MOO,
		L.SOI,
		L.ROAD,
		L.TUMBON_CODE,
		L.AMPOR_CODE,
		L.PROVINCE_CODE,
		L.TEL,
		L.FAX
		FROM
		ACT_ORGANIZATION_MAIN L
		LEFT JOIN ( SELECT ORG_ID,BUDGET_YEAR,PROVINCE_CODE FROM ACT_FUND_PROJECT ORDER BY ORG_ID ASC ) F 
		ON L.ORGAN_ID = F.ORG_ID
		WHERE 1=1 ".$condition;
		
		$data = $this->ado->getarray($sql);
		$limit = '10';
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
		//}else{$data='';}
		$this->load->view('social_worker/organ_select',$data);
	}
}
?>