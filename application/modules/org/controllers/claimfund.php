<?php
class Claimfund extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	public function lists($type="1") {
		putenv("NLS_LANG=AMERICAN_AMERICA.TH8TISASCII");
		$this->load->library('adodb');
		$data['type'] = $type;
		if ($type == '1') {
			$qry = "SELECT
				FPSID,
				PROJECT_CODE,
				PROJECT_NAME,
				PROJECT_STATUS,
				RECEIVE_DATE,
				(SELECT RESULT_TYPE FROM FUND_PROJECT_SUPPORT_RESULT WHERE FUND_PROJECT_SUPPORT_ID = FPSID AND TIME = FTIME AND ROWNUM = 1) RESULTT,
				(SELECT DATE_APPOVED FROM FUND_PROJECT_SUPPORT_RESULT WHERE FUND_PROJECT_SUPPORT_ID = FPSID AND TIME = FTIME AND ROWNUM = 1) DATE_APPOVED,
				PROVINCE_CODE
			FROM
				(
				SELECT
					FPSID, PROJECT_CODE, PROJECT_NAME, PROJECT_STATUS, RECEIVE_DATE, (
						SELECT MAX(TIME) 
						FROM FUND_PROJECT_SUPPORT_RESULT 
						WHERE FUND_PROJECT_SUPPORT_ID = FPSID
					) FTIME,
					PROVINCE_CODE
				FROM (
					SELECT FPS.ID FPSID, FPS.PROJECT_CODE, FPS.PROJECT_NAME, FPS.PROJECT_STATUS, FPS.RECEIVE_DATE, FPS.PROVINCE_ID PROVINCE_CODE
					FROM FUND_PROJECT_SUPPORT FPS
					JOIN ACT_PROVINCE APV ON APV.PROVINCE_CODE = FPS.PROVINCE_ID
					JOIN ACT_WELFARE_BENEFIT AWB ON APV.PROVINCE_CODE = AWB.PROVINCE_CODE 
					WHERE AWB.ID = '".$this->session->userdata('act_welfare_benefit_id')."'
				)
			)";
			echo '<pre>'.$qry.'</pre>';
		} else {
			$qry = "SELECT * from FUND_WELFARE";
		}
		
		
		/*
		$data['rs'] = $this->ado->GetArray($qry);
		dbConvert($data['rs']);
		 * 
		 */
		$limit = '20';
		$target = '';
		$current_page = @$_GET['page'];
		$this->load->library('pagination');
		$page = new pagination();
		$page->target($target);
		$page->limit($limit);
		$page->currentPage($current_page);
		$rs = $this->ado->PageExecute($qry, $limit, $page->page);
		$page->Items($rs->_maxRecordCount);			
		$data['pagination'] = $page->show();
		
		$data['rs'] = $rs->GetArray();
		dbConvert($data['rs']);
	
		$this->load->view('claimfund/list', @$data);
	}

	
	
	public function form($id = null) {
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
			
			//--Data for edit
				if(!empty($id)) {
					$data['rs'] = $this->ado->GetRow("select * from fund_project_support where id = '".$id."'");
					dbConvert($data['rs']);
					
					//แนบไฟล์เอกสารโครงการ
					$data['rs']['attach_file'] = $this->ado->GetArray("select * from fund_attach where module = 'project_support_attach' and module_id = '".$data['rs']['id']."'");
					dbConvert($data['rs']['attach_file']);
					
					//--งบประมาณทั้งโครงการ
					$data['rs']['project_budget'] = (@$data['rs']['budget_request'] + @$data['rs']['budget_other']);
					
					//--กลุ่มเป้าหมายของโครงการ
					$data['rs']['ptsd'] = $this->ado->GetArray("select * from fund_project_target_set where project_support_id = '".@$data['rs']['id']."'");
					
					//--แนบไฟล์เอกสารประกอบการพิจารณา
					$where = null;
					for($i=1; $i<6; $i++) {
						$where .= ($i != 1)?' or ':null;
						$where .= ' module = \'project_support_attach'.$i.'\' '; 
					}
					$sql = "select * from fund_attach where module_id = '".$data['rs']['id']."' and (".$where.')';
					$tmp = $this->ado->GetArray($sql);
					dbConvert($tmp);
					foreach($tmp as $item) {
						$data['rs']['fileattach'][$item['module']]['id'] = $item['id'];
						$data['rs']['fileattach'][$item['module']]['file'] = $item['attach_name'];
					}
				}
			//--End : Data for edit
			
			
			//--Data for form			
				//--สถานะโครงการที่ขอรับเงินกองทุนฯ
				$data['formInput']['project_status'] = array(
					'1' => 'โครงการริเริ่มใหม่ (โครงการที่มีแนวคิดหรือนโยบายใหม่ไม่เคยทำมาก่อน) '
					, '2' => 'โครงการใหม่ (โครงการที่ไม่เคยดำเนินการในพื้นที่ หรือกลุ่มเป้าหมายนั้นมาก่อน)'
					, '3' => 'โครงการเดิม (โครงการที่เคยดำเนินการในพื้นที่ หรือกลุ่มเป้าหมายนั้นแล้ว และต้องการดำเนินการต่อ โดยจะต้องมีทุนเพื่อใช้ในการดำเนินงานตามโครงการนี้อยู่แล้วบางส่วน)'
				);
				
				//--ประเภทโครงการ
				$data['formInput']['project_typep_main_id'] = array(
					'1' => 'สงเคราะห์'
					, '2' => 'คุ้มครองสวัสดิภาพ'
					, '3' => 'ส่งเสริมความประพฤติ'
					, '4' => '5 สถาน'
					, '5' => 'งานวิจัย ฯ'
					, '6' => 'อื่นๆ'
				);
				
				//--กรอบทิศทางในการจัดสรรเงินกองทุนคุ้มครองเด็ก
				$data['formInput']['project_direction_set_id'] = array(
					'4' => 'การส่งเสริมศักยภาพครอบครัวเพื่อการเลี้ยงดูบุตรอย่างเหมาะสม'
					, '2' => 'การพัฒนาเด็กและเยาวชน'
					, '3' => 'การพัฒนาระบบคุ้มครองเด็ก'
					, '5' => 'การส่งเสริมศักยภาพองค์กรปกครองส่วนท้องถิ่นในการคุ้มครองเด็ก'
					, '6' => 'สาโรจน์_ชื่อกรอบทิศทางในการจัดสรรเงิน'
					, '1' => 'การป้องกันและแก้ไขปัญหาเด็กและเยาวชน'
				);
				
				//--กรอบทิศทางในการจัดสรรเงินกองทุนคุ้มครองเด็ก
				$data['formInput']['budget_other_type'] = array(
					'1' => 'หน่วยงานภาครัฐ'
					, '2' => 'ท้องถิ่น'
					, '3' => 'ธุรกิจ/องค์กรเอกชน'
				);
				
				//--สาเหตุที่เสนอขอรับเงินกองทุน
				$data['formInput']['budget_cause'] = array(
					'1' => 'ไม่ได้รับงบประมาณปกติของหน่วยงาน'
					, '2' => 'ได้รับงบประมาณปกติจากหน่วยงานแต่ไม่เพียงพอ'
				);
				
				//--กลุ่มเป้าหมายของโครงการ
				$data['formInput']['project_target_set_id'] = $this->ado->GetArray("select * from fund_project_target_set where status = '1'");
				dbConvert($data['formInput']['project_target_set_id']);
				
				//--ประเภทองค์กรที่เสนอขอรับเงินกองทุน
				$data['formInput']['organiztion_type'] = array(
					'1' => 'องค์กรภาคเอกชน'
					, '2' => 'หน่วยงานของรัฐ'
				);
				
				//--ไฟล์แนบเอกสารประกอบการพิจารณา
				$data['formInput']['fileattach'] = array(
					1 => '1. แบบสรุปโครงการ'
					,2 => '2. ข้อมูลเกี่ยวกับโครงการที่เสนอขอรับเงินกองทุนฯพร้อมแผนที่พื้นที่ดำเนินงานโครงการ'
					,3 => '3. ข้อมูลเกี่ยวกับองค์กรที่เสนอขอรับเงินกองทุนฯพร้อมแผนที่ตั้งองค์กร'
					,4 => '4. หนังสือรับรองผลงาน'
					,5 => '5. หนังสือรับรององค์กร'
				);
			//--End : data for form
			
			$form = 'formChild';
		} else if($_GET['type'] == 2) {
			//	สาขาของโครงการที่ขอรับสนับสนุน
			$querySector = 'SELECT * FROM FUND_WELFARE_SECTOR WHERE STATUS = 1 ORDER BY ID ASC';
			$data["sectors"] = $this->ado->GetArray($querySector);

			//	กลุ่มเป้าหมาย
			$queryTarget = 'SELECT * FROM FUND_WELFARE_TARGET WHERE STATUS = 1 ORDER BY ID ASC';
			$data["targets"] = $this->ado->GetArray($queryTarget);

			$data['value'] = $this->ado->GetRow($query);

			dbConvert($data['sectors']);
			dbConvert($data['targets']);
			dbConvert($data['value']);

			$form = 'formSupport';
		} else if($_GET['type'] == 3) {
			$form = 'formTraffick';
		}
		
		$this->load->view('claimfund/'.$form,$data);
	}
	
	function gen_projectcode($year='XXXX', $id=false, $province_id=false, $checked=false, $status=false) {
		putenv("NLS_LANG=AMERICAN_AMERICA.TH8TISASCII");
		$this->load->library('adodb');
		
		//Get budgetyear
		$code = 'คคด/'.$year.'/';
		
		//Get province
			//เช็ค center_check
			//(Y) กทบ
			//(N) ชื่อจังหวัด
			#
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
			$qry = "select project_code from fund_project_support where project_code like '".iconv('utf-8', 'tis-620', $code)."%'";
			$qry .= (empty($id))?null:" and id = '".@$id."'";
			$qry .= " order by id desc";
			$current = $this->ado->GetOne($qry);
			dbConvert($current);
			
			
			if(!empty($current) && !empty($id)) {
				$code = $current;
			} else if((!empty($current) && empty($id)) || (empty($current) && !empty($id))) {
				$current = $this->ado->GetOne("select project_code from fund_project_support where project_code like '".iconv('utf-8', 'tis-620', $code)."%'");
				dbConvert($current);
								
				$current = explode('/', $current);
				$code .= substr('000'.(end($current)+1), -4, 4);
				
			} else {
				$code .= '0001';
			}
		}
		
		//return project_code
		if($status) { echo $code; } 
		else { return $code; }
	}
	
	public function deleteFile($id = null) {
		if($id) {
			$this->load->library('adodb');
			$data = $this->ado->GetRow("select * from fund_attach where id = '".$id."'");
			dbConvert($data);
			
			if(!empty($data['id'])) {
				if(file_exists($data['attach_name'])) {
					unlink($data['attach_name']);
				}
				$this->ado->query("delete from fund_attach where id = '".$id."'");
			}
		}	
		return false;
	}
	public function saveChild($id = null) {
		//--Call adodb
		#var_dump($id);
		#var_dump($_POST);
		//gen project_code
		$_POST['project_code'] = $this->gen_projectcode($_POST['budget_year'], @$id, @$_POST['province_id'], @$_POST['central_check']);
		//-- งบประมาณที่ได้รับสมทบจากแหล่งอื่น*(ถ้ามี) : Budget_other_type
			if(!empty($_POST['budget_other_type'])) {
				$tmp = '';
				$i = 0 ; 
				foreach($_POST['budget_other_type'] as $item) {
					if($i != 0) { $tmp .= ', '; }
					$i++;
					$tmp .= $item;
				}
				$_POST['budget_other_type'] = $tmp;
			}
		//--End
		
		$fieldExcept = array(
			'project_target_set_val'
			, 'project_target_set_id'
			, 'organiztion_type_'
			, 'budget_cause_'
			, 'project_budget_'
			, 'budget_request_'
			, 'budget_other_'
		);
		if(empty($id)) {
			//Get new id 
			$_POST['id'] = $id = $this->ado->GetOne("select MAX(id) id from fund_project_support")+1;
			
			$field = $val = null;	
			$i=0;
			foreach($_POST as $key=>$item) {
				if(!in_array($key, $fieldExcept)) {
					if($i != 0){ $field .= ', '; $val .= ', '; }
					$i++;
					
					$field .= ''.$key.'';
					$val .= "'".$item."'";
				}	
			}
			$qry = "INSERT INTO FUND_PROJECT_SUPPORT (".$field.") VALUES (".iconv('utf-8', 'tis-620', $val).")";
			$this->ado->query($qry);
		} else {
			$fieldExcept[] = 'id';
			
			$set = null;	
			$i=0;
			foreach($_POST as $key=>$item) {
				if(!in_array($key, $fieldExcept)) {
					if($i != 0){ $set .= ', '; }
					$i++;
					
					$set .= ''.$key.' = '."'".iconv('utf-8', 'tis-620', $item)."'";
					#$set .= ''.$key.' = '."'".$item."'";
				}	
			}
			$qry = "UPDATE FUND_PROJECT_SUPPORT SET ".$set." WHERE ID = '".$id."'";
			$this->ado->query($qry);
		}
		
		$dir = 'uploads/org/claimfund/child/'; //Directory สำหรับ แนบไฟล์
		
		
		//--แนบไฟล์เอกสารโครงการ
		foreach($_FILES['attach_file']['tmp_name'] as $key => $item) {
			$file = array('tmp_name' => $item, 'name' => $_FILES['attach_file']['name'][$key]);
			$data = array(
				'module' => 'project_support_attach'
				,'module_id' => $id
				,'attach_name' => uploadfiles(null, $dir, $file)
			);
			
			$field = $value = null;
			foreach($data as $key => $item) {
				$field .= ', '.$key;
				$value .= ', \''.$item."'";
			}
			$this->ado->query("insert into fund_attach (id".$field.") values ((select MAX(id)+1 from fund_attach)".$value.")");
		}

		//--แนบไฟล์เอกสารประกอบการพิจารณา 
		for($i=1; $i<6; $i++) {
			if(!empty($_FILES['fileattach'.$i]['tmp_name'])) {
				$fileattach['id'] = null;
				$fileattach['module'] = 'project_support_attach'.$i;
				
				
				//Find old data - Table:Fund_attach
				if(!empty($id)) {
					$qry = "select id, attach_name 
					from fund_attach 
					where module = '".$fileattach['module']."' and module_id = '".$id."'";
					$oldfile = $this->ado->GetRow($qry);
					dbConvert($oldfile);
					if(!empty($oldfile['id'])) {
						$fileattach['id'] = $oldfile['id'];
						$oldfile = $oldfile['attach_name'];
					}
				}
				
				//Data in fund_attach
				$fileattach['module_id'] = $id;
				$fileattach['attach_name'] = uploadfiles($oldfile, $dir, $_FILES['fileattach'.$i]);
				
				$j = 0; $set = $field = $values = null;
				foreach($fileattach as $key=> $item) {
					if($key != 'id') {
						if(empty($fileattach['id'])) {
							$field .= ', '; $values .= ', ';
							$field .= $key;
							$values .= "'".$item."'";
						} else {
							if($j != 0) {
								$set .= ', ';
							}
							$j++;
							$set .= $key." = '".$item."'";
						}
							
					}	
				}
				if(empty($fileattach['id'])) {
					
					
					$qry = "insert into fund_attach (id".$field.") values (".($this->ado->GetOne('select max(id) from fund_attach')+1).$values.")";
				} else {
					$qry = "update fund_attach set ".$set." where id = '".$fileattach['id']."'";
				}
				echo $qry.'<hr>';
				$this->ado->query($qry);
			}
		}
		
		set_notify('success', 'บันทึกข้อมูลเสร็จสิ้น');
		redirect('org/member#tabs-3');
	}

	//	เซฟกองทุนส่งเสริม
	public function saveSupport() {

	}

	public function getTarget($id) {
		putenv("NLS_LANG=AMERICAN_AMERICA.TH8TISASCII");
		$this->load->library('adodb');
		$data['other'] = 0;

		if($id==1) {
			$data['other'] = 1;
			$where = " AND SYSTEM_NORMAL = 1";
		} else {
			$where = " AND SYSTEM_DISTRIBUTE = 1";
		}
		$queryTarget = "SELECT * FROM FUND_WELFARE_TARGET WHERE STATUS = 1 $where ORDER BY ID ASC";

		$data["variable"] = $this->ado->GetArray($queryTarget);
		dbConvert($data['variable']);
		$this->load->view('claimfund/getSupportTarget',$data);
	}
}
?>