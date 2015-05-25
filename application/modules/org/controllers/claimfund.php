<?php
class Claimfund extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function QueryOracle($amountRec, $qry = null) {
		if(!$qry || $amountRec == 0) {
			return false;
		}
		
		$_GET['page'] = (empty($_GET['page']))?1:$_GET['page'];
		
		$limit = 10;
		$recMin = ($_GET['page']-1)*$limit;
		$recMax = (($_GET['page']-1)*$limit)+$limit;
		
		$pageMin = 1;
		$pageMax = ceil($amountRec/$limit);
		$pageCurrent = $_GET['page'];

		#var_dump($_SERVER);
		#$tmp = explode('?', $_SERVER['REDIRECT_URL']);
		$urlCurrent = $_SERVER['REDIRECT_URL'];
		
		$pagination = '<div class="pagination">';
			$pagination .= ($pageCurrent == $pageMin)?'<span class="disabled">« Previous</span>':'<a href="'.$urlCurrent.'?page='.($pageCurrent-1).'">« Previous</a>';
				
			for($i=$pageMin; $i<=$pageMax; $i++) {
				$pagination .= ($i == $pageCurrent)?'<span class="current">'.$i.'</span>':'<a href="'.$urlCurrent.'?page='.$i.'">'.$i.'</a>';
			}
			
			$pagination .= ($pageCurrent == $pageMax)?'<span class="disabled">Next »</span>':'<a href="'.$urlCurrent.'?page='.($pageCurrent+1).'">Next »</a>';
		$pagination .= '</div>';
		
		putenv("NLS_LANG=AMERICAN_AMERICA.TH8TISASCII");
		array_walk($_POST,'dbConvert','TIS-620');
		$this->load->library('adodb');
		
		
		$qry .= " WHERE ROWNUM > ".$recMin." and ROWNUM <= ".$recMax;
		
		echo '<pre>'.$qry.'</pre>';
		$data['rs'] = $this->ado->GetArray($qry);
		#dbConvert($data['rs']);
		$data['pagination'] = $_GET['page'].$pagination;
		
		return $data;
	}
	
	public function lists() {
		
		//List query
		//--Fund_project_support
		#$_GET['page'] = 2;
		
		//--Amount record
		putenv("NLS_LANG=AMERICAN_AMERICA.TH8TISASCII");
		array_walk($_POST,'dbConvert','TIS-620');
		$this->load->library('adodb');
		
		$qry = "SELECT
			count(FPSID) AMOUNTREC
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
		)";
		
		$amountRecord = $this->ado->GetOne($qry);
		
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
		)";
		
		$data = $this->QueryOracle($amountRecord, $qry);
		
		dbConvert($data['rs']);
		$this->load->view('claimfund/list', @$data);
	}

	
	
	public function form($id = null) {
		echo $id;
		putenv("NLS_LANG=AMERICAN_AMERICA.TH8TISASCII");
		array_walk($_POST,'dbConvert','TIS-620');
		$this->load->library('adodb');

		$data = null;

		$query = "SELECT
			AP.PROVINCE_NAME,
			AP.PROVINCE_CODE,
			AWB.*
		FROM ACT_WELFARE_BENEFIT AWB
		JOIN ACT_PROVINCE AP ON AP.PROVINCE_CODE = AWB.PROVINCE_CODE
		WHERE ID = ".$this->session->userdata('act_welfare_benefit_id');
		
	
	
		//-- Set default $_GET['type']
		$_GET['type'] = (empty($_GET['type']))?1:$_GET['type'];
		if($_GET['type'] == 1){
			$data['value'] = $this->ado->GetRow($query);
			dbConvert($data['value']);
			
			if(!empty($id)) {
				$data['rs'] = "select * from fund_project_support where id = '".$id."'";
			}
			 
			
			$form = 'formChild';
		} else if($_GET['type'] == 2) {
			$data['value'] = $this->ado->GetRow($query);
			dbConvert($data['value']);
			$form = 'formSupport';
		} else if($_GET['type'] == 3) {
			$form = 'formTraffick';
		}
		
		$this->load->view('claimfund/'.$form,$data);
	}
	
	function gen_projectcode($year='XXXX', $id=false, $province_id=false, $checked=false, $status=false) {
		putenv("NLS_LANG=AMERICAN_AMERICA.TH8TISASCII");
		array_walk($_POST,'dbConvert','TIS-620');
		$this->load->library('adodb');
		
		
		//Get budgetyear
		$code = 'คคด/'.$year.'/';
		
		//Get province
			//เช็ค center_check
			//(Y) กทบ
			//(N) ชื่อจังหวัด
		if($status && empty($checked) && empty($province_id)) {
			$code .= 'XXXX/';
		} else if($checked == 1) {
			$code .= 'กบท/';
		} else {
			$province_name = $this->ado->GetOne('select province_name from act_province where province_code = \''.$province_id.'\'');
			dbConvert($province_name);
			$code .= $province_name.'/';
		}
		
		//Run number
			//ถ้ามี ID
			//	(Y) หาจาก project code = 'xxx%' && id = 'id'
			//	(N) หาจาก project code = 'xxx%'
		
		if($status && empty($id)) {
			$code .= 'XXXX';
		} else {
			$qry = "select project_code from project_support ";
			if(!empty($id)) {
				$qry .= "project_code like '".$code."%' and id = '".@$id."'";
			} else {
				$qry .= "project_code like '".$code."%'";
			}
			$qry .= " order by id desc";
			$current = $this->ado->GetRow($qry);
			
			if(!empty($current) && !empty($id)) {
				$code = $current['project_code'];
			
			} else if((!empty($current) && empty($id)) || (empty($current) && !empty($id))) {
				$current = $this->ado->getrow("select project_code from project_support where project_code like '".$code."%' order_by id desc");
				
				$current['project_code'] = explode('/', $current['project_code']);
				$code .= substr('000'.(end($current['project_code'])+1), -4, 4);
				
			} else {
				$code .= '0001';
			}
		}
		
		//return project_code
		if($status) {
			echo $code;
		} else {
			return $code;
		}
	}
	
	public function saveChild($id = null) {
		//--Call adodb
		putenv("NLS_LANG=AMERICAN_AMERICA.TH8TISASCII");
		array_walk($_POST,'dbConvert','TIS-620');
		$this->load->library('adodb');
		
		#var_dump($id);
		#var_dump($_POST);
		
		//gen project_code
		$_POST['project_code'] = $this->gen_projectcode($_POST['budget_year'], @$id, @$_POST['province_id'], @$_POST['central_check']);
		
		//-- งบประมาณที่ได้รับสมทบจากแหล่งอื่น*(ถ้ามี) : Budget_other_type
			$tmp = '';
			$i = 0 ; 
			foreach($_POST['budget_other_type'] as $item) {
				if($i != 0) { $tmp .= ', '; }
				$i++;
				$tmp .= $item;
			}
			$_POST['budget_other_type'] = $tmp;
		//--End
		
		if(empty($id)) {
			//Get new id 
			$_POST['id'] = $id = $this->ado->GetOne("select MAX(id) id from fund_project_support")+1;
			
			
			
			$field = $val = null;	
			$i=0;
			$fieldExcept = array(
				'project_target_set_val'
				, 'project_target_set_id'
				, 'organiztion_type_'
				, 'budget_cause_'
				, 'project_budget_'
				, 'budget_request_'
				, 'budget_other_'
			);
			foreach($_POST as $key=>$item) {
				if(!in_array($key, $fieldExcept)) {
					if($i != 0){ $field .= ', '; $val .= ', '; }
					$i++;
					
					$field .= ''.$key.'';
					$val .= "'".$item."'";
				}	
			}
			$qry = "INSERT INTO FUND_PROJECT_SUPPORT (".$field.") VALUES (".$val.")";
			$this->ado->query($qry);
		} else {
			
		}
		/*
		//--กลุ่มเป้าหมายของโครงการ  (fund_project_target_set_data)
		#$this->project_target_set_data->where("project_support_id = '".$_POST['id']."'")->delete(); #Clear old data
		if(!empty($id)) {
			$this->ado->query("delete from project_target_set_data where project_support_id = '".$id."'");
		}	
		foreach($_POST['project_target_set_id'] as $item) {
			echo $item;
			$data = array(
				'project_support_id'=>@$id,
				'project_target_set_id'=>$item,
				'value'=>$_POST['project_target_set_val'][$item]
			);
			var_dump($data);
			#$this->project_target_set_data->save($data);
		}
	
	
			
		//--แนบไฟล์เอกสารประกอบการพิจารณา 
		for($i=1; $i<6; $i++) {
			if(!empty($_FILES['fileattach'.$i]['tmp_name'])) {
				$module = 'project_support_attach'.$i;
				
				//Find old data - Table:Fund_attach
				if(!empty($id)) {
					$qry = "select * 
					from fund_attach 
					where module = '".$module."'
						and module_id = '".$id."'";
					echo $qry;
				}
				
				#$dir = 'uploads/org/claimfund/child';
				#var_dump($_FILES['fileattach'.$i]);
				
				$id;
				#echo uploadfiles('help');
			}
		}
		return false;
		 * 
		 */
		set_notify('success', 'บันทึกข้อมูลเสร็จสิ้น');
		redirect('org/member#tabs-3');
	}
}
?>