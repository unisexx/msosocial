<?php
class Claimfund extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function lists() {
		putenv("NLS_LANG=AMERICAN_AMERICA.TH8TISASCII");
		array_walk($_POST,'dbConvert','TIS-620');
		$this->load->library('adodb');
		
		//List query
		//--Fund_project_support
		#$_GET['page'] = 2;
		$_GET['page'] = (empty($_GET['page']))?1:$_GET['page'];
		
		$limit = 10;
		$pageMin = ($_GET['page']-1)*$limit;
		$pageMax = (($_GET['page']-1)*$limit)+$limit;
		
		echo $pageMin.'/'.$pageMax;
		$qry = "SELECT
			FPSID,
			PROJECT_CODE,
			PROJECT_NAME,
			PROJECT_STATUS,
			RECEIVE_DATE,
			(SELECT RESULT_TYPE FROM FUND_PROJECT_SUPPORT_RESULT WHERE FUND_PROJECT_SUPPORT_ID = FPSID AND TIME = FTIME AND ROWNUM = 1) RESULTT,
			(SELECT DATE_APPOVED FROM FUND_PROJECT_SUPPORT_RESULT WHERE FUND_PROJECT_SUPPORT_ID = FPSID AND TIME = FTIME AND ROWNUM = 1) DATE_APPOVED
		FROM
			(
			SELECT
				FPSID, PROJECT_CODE, PROJECT_NAME, PROJECT_STATUS, RECEIVE_DATE, (
					SELECT MAX(TIME) 
					FROM FUND_PROJECT_SUPPORT_RESULT 
					WHERE FUND_PROJECT_SUPPORT_ID = FPSID
				) FTIME
			FROM (
				SELECT ID FPSID, FPS.PROJECT_CODE, FPS.PROJECT_NAME, FPS.PROJECT_STATUS, FPS.RECEIVE_DATE
				FROM FUND_PROJECT_SUPPORT FPS
			)
		)
		WHERE 
			ROWNUM > ".$pageMin." and ROWNUM <= ".$pageMax;
		$data['rs'] = $this->ado->GetArray($qry);
		
		dbConvert($data['rs']);
			
		$this->load->view('claimfund/list', @$data);
	}
	
	public function form($id = null) {
		//-- Set default $_GET['type']
		$_GET['type'] = (empty($_GET['type']))?1:$_GET['type'];
		if($_GET['type'] == 1) 		{ $form = 'formChild'; } 
		else if($_GET['type'] == 2) { $form = 'formSupport'; } 
		else if($_GET['type'] == 3)	{ $form = 'formTraffick'; }
		
		$this->load->view('claimfund/'.$form);
	}
	
	public function saveChild($id = null) {
		var_dump($id);
		var_dump($_POST);
		return false;
		set_notify('success', 'บันทึกข้อมูลเสร็จสิ้น');
		redirect('org/member#tabs-3');
	}
}
?>