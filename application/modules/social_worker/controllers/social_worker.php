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
		putenv("NLS_LANG=AMERICAN_AMERICA.TH8TISASCII");
		$specifics = $this->ado->GetArray('SELECT ID,SPECIFIC_NAME FROM ACT_SPECIFIC ORDER BY SEQ asc');
		$target_groups = $this->ado->GetArray('SELECT * FROM ACT_TARGET_GROUP ORDER BY SEQ asc ');
		$data['specifics'] = $specifics;// dbConvert($specifics);
		$data['target_groups'] = $target_groups;		
		$this->template->build('register', $data);
	}	
	function check_id_card(){
		putenv("NLS_LANG=AMERICAN_AMERICA.TH8TISASCII");
		$id_card = $_GET['id_card'];
		$result = $this->ado->GetOne("(SELECT ID FROM ACT_SUPPORTER_MAIN WHERE ID_CARD = '".$id_card."')");
		if($result > 0 ){
			echo false;	
		}else{
			echo 'true';
		}		
	}
	
	function check_captcha(){
		$captcha = $this->session->userdata('captcha');
		if($captcha == @$_GET['captcha']){
			echo 'true';
		}else{
			echo false;
		}			
		
	}
	function save(){
		//$this->db->debug = true;
		//var_dump($_POST);
		if($_POST){
			$service = new Act_service();
			putenv("NLS_LANG=AMERICAN_AMERICA.TH8TISASCII");
			array_walk($_POST,'dbConvert','TIS-620');
			if(@$_POST['birthday']!=''){
				$tmp = explode('-',$_POST['birthday']);
				$_POST['birthday'] = $tmp[2].$tmp[1].$tmp[0];
			}
			//$this->load->library('adodb');
			//$this->ado->debug = true;
			/***** รูปภาพ *****/
			fix_file($_FILES["UploadFile"]);		    
		   $_POST['file_data'] = !empty($_FILES['UploadFile']['name']) ? $service->upload($_FILES["UploadFile"],"uploads/file_shares/act/social_worker") : $_POST['hdfilename'];
		   $_POST['REGISTER_FROM'] = "MSOSOCIAL";
		   if(@$_POST['id'] == ''){
			$_POST['input_date'] = th_to_stamp(date("d-m-Y H:i:s"),TRUE);
			$_POST['id'] = $this->ado->GetOne('(SELECT MAX(ID)+1 FROM ACT_SUPPORTER_MAIN)');
			$_POST['id'] = $_POST['id'] == "" ? "1" : $_POST['id'];
				$this->ado->AutoExecute('ACT_SUPPORTER_MAIN',$_POST,'INSERT');
			}else{
				$this->ado->AutoExecute('ACT_SUPPORTER_MAIN',$_POST,'UPDATE','id = '.$_POST['id']);
			}
		    $main_id = $_POST['id'];
			/***** เชพฟอร์มย่อย *****/
			$this->ado->Execute("DELETE FROM ACT_SUPPORTER_SUB WHERE ID_CARD = '".$_POST['id_card']."'");
			if(isset($_POST['answer_id'])){
				foreach($_POST['answer_id'] as $key=>$item){
					$_POST['sub_id'] = $this->ado->GetOne('(SELECT MAX(SUB_ID)+1 FROM ACT_SUPPORTER_SUB)');
					$_POST['sub_id'] = $_POST['sub_id'] == "" ? "1" : $_POST['sub_id'];
						$this->ado->AutoExecute('ACT_SUPPORTER_SUB',array(
								'sub_id'=>$_POST['sub_id'],
								'id_card'=>$_POST['id_card'],
								'question_name'=>@$_POST['question_name'][$key],
								'answer_id'=>$item,
								'other'=>$_POST['other'][$key]																
							), 'INSERT'
						);
				}
			}
			/*
			$this->supporter_sub->delete('id_card',$_POST['id_card']);
			if(isset($_POST['answer_id'])){
				foreach($_POST['answer_id'] as $key=>$item){
					$this->supporter_sub->save(array(
						'id_card'=>$_POST['id_card'],
						'question_name'=>@$_POST['question_name'][$key],
						'answer_id'=>$item,
						'other'=>$_POST['other'][$key]																
					));
				}
			}
			*/
			
			
			set_notify('success', lang('save_data_complete'));
		}
		redirect('social_worker/complete');
	}
	function complete(){
		$this->template->build('complete');
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
	function test(){
		$this->template->build('test');
	}
}
?>