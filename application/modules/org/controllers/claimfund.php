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
			$qry = "select * from fund_projectsupport where web_form = 1 and act_user_id = '".$this->session->userdata('id')."'";
		} else {
			$qry = "SELECT * from FUND_WELFARE WHERE ACT_USER_ID IS NOT NULL AND ACT_USER_ID = '".$this->session->userdata('id')."'";
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
		@$page->Items($rs->_maxRecordCount);			
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
		$welfare_table = null;
		$welfare_id = null;

		if($this->session->userdata('act_welfare_type')==1) {
			$welfare_table = 'ACT_WELFARE_BENEFIT';
			$welfare_id = $this->session->userdata('act_welfare_benefit_id');
		} else {
			$welfare_table = 'ACT_WELFARE_COMM';
			$welfare_id = $this->session->userdata('act_welfare_comm_id');
		}

		$query = "SELECT
			AP.PROVINCE_NAME,
			AP.PROVINCE_CODE,
			AW.*
		FROM $welfare_table AW
		JOIN ACT_PROVINCE AP ON AP.PROVINCE_CODE = AW.PROVINCE_CODE
		WHERE ID = $welfare_id";

		//-- Set default $_GET['type']
		$_GET['type'] = (empty($_GET['type']))?1:$_GET['type'];
		if($_GET['type'] == 1){
			$data['value'] = $this->ado->GetRow($query); dbConvert($data['value']);
			
			//--Data for edit
				//--Data form fund_project_support
				$data['rs'] = $this->ado->GetRow("select 
					fps.*
					,CASE WHEN fps.welfare_type = 1 THEN AWB.organ_name
						WHEN fps.welfare_type = 2 THEN awc.organ_name
						END welfare_tog_title
				from fund_projectsupport fps
					left join act_welfare_benefit awb on fps.welfare_id = awb.id
					left join ACT_WELFARE_COMM awc on fps.welfare_id = awc.id
				where FPS.id = '".$id."'");
				dbConvert($data['rs']);
				
				
				if(empty($data['rs']['id'])) { // Add
					$fund_province = $this->ado->GetRow("select id, title from fund_province where province_code = '".@$data['value']['province_code']."'"); dbConvert($fund_province);
					$data['rs']['province_id'] = @$fund_province['id'];
					$data['rs']['province_name'] = @$fund_province['title'];
					$data['rs']['welfare_benefit_title'] = @$data['value']['organ_name'];
					$data['rs']['welfare_benefit_id'] = $this->session->userdata('act_welfare_benefit_id');
				} else { //Edit
					$fund_province = $this->ado->GetRow("select id, title from fund_province where id = '".$data['rs']['province_id']."'"); dbConvert($fund_province);
					$data['rs']['province_id'] = $fund_province['id'];
					$data['rs']['province_name'] = $fund_province['title'];
					
					//attach_set
					$attach_set = array('attach_set_1', 'attach_set_2');
					foreach($attach_set as $item) {
						$filelist = $this->ado->GetArray("select id, file_name, file_path from fund_projectsupport_attach where module_name = '".$item."' and module_id = '".$data['rs']['id']."'");
						dbConvert($filelist);
						
						$data['rs'][$item] = $filelist;
					}
					
					//--fund_project_target_set_data
					$pts = $this->ado->GetArray("select project_target_set_id id, amount, detail from fund_project_target_set_data where project_support_id = '".$data['rs']['id']."'");
					dbConvert($pts);
					foreach($pts as $item) {
						$data['rs']['project_target_set'][$item['id']] = $item['amount'];
						$data['rs']['project_target_set_comment'][$item['id']] = $item['detail'];
					}
				}
				#var_dump($data['rs']);
				#exit;

				//--Status
				$data['status'] = (empty($data['rs']['id']) || @$data['rs']['status'] == 2)?'edit':'view';
			//--End : Data for edit
			
			
			//--Data for form
				//--สถานะ
				//--status
				$data['formInput']['status'] = array(
					1 => 'รายการใหม่',
					2 => 'กลับไปแก้ไข',
					3 => 'รอพิจารณา'
				);
				
				//--กลุ่มเป้าหมายของโครงการ
				$data['formInput']['project_target_set_id'] = $this->ado->GetArray("select * from fund_project_target_set where status = '1'");
				dbConvert($data['formInput']['project_target_set_id']);
				
				//--สถานะโครงการที่ขอรับเงินกองทุนฯ
				//--project_status
				$data['formInput']['project_status'] = array(
					1 => 'โครงการริเริ่มใหม่ (โครงการที่มีแนวคิดหรือนโยบายใหม่ไม่เคยทำมาก่อน)',
					2 => 'โครงการใหม่ (โครงการที่ไม่เคยดำเนินการในพื้นที่ หรือกลุ่มเป้าหมายนั้นมาก่อน)',
					3 => 'โครงการเดิม (โครงการที่เคยดำเนินการในพื้นที่ หรือกลุ่มเป้าหมายนั้นแล้ว และต้องการดำเนินการต่อ โดยจะต้องมีทุนเพื่อใช้ในการดำเนินงานตามโครงการนี้อยู่แล้วบางส่วน)'
				);
				
				//--ประเภทโครงการ
				//--project_type
				$data['formInput']['project_type'] = array(
					1 => 'สงเคราะห์',
					2 => 'คุ้มครองสวัสดิภาพ',
					3 => 'ส่งเสริมความประพฤติ',
					4 => '5 สถาน',
					5 => 'งานวิจัย ฯ',
					6 => 'อื่นๆ'
				);
				
				
				//--กรอบทิศทางในการจัดสรรเงินกองทุนคุ้มครองเด็ก
				//--project_direction

				#$this->load->model('fund_project_direction_set_model', 'direction_set');
				$tmp = $this->ado->GetArray("select * from fund_project_direction_set where status = 1");
				dbConvert($tmp);
				foreach($tmp as $item) {
					$data['formInput']['project_direction'][$item['id']] = $item['title'];
				}
				
				//--งบประมาณที่ได้รับสมทบจากแหล่งอื่น
				//--has_budget_other
				$data['formInput']['has_budget_other'] = array(
					1 => 'หน่วยงานภาครัฐ',
					2 => 'ท้องถิ่น',
					3 => 'ธุรกิจ/องค์กรเอกชน'
				);	
				
				
				//--สาเหตุที่เสนอขอรับเงินกองทุน
				//--budget_cause
				$data['formInput']['budget_cause'] = array(
					1 => 'ไม่ได้รับงบประมาณปกติของหน่วยงาน'
					,2 => 'ได้รับงบประมาณปกติจากหน่วยงานแต่ไม่เพียงพอ'
				);
				
				
				//--ประเภทองค์กรที่เสนอขอรับเงินกองทุน
				//--organization_type
				$data['formInput']['organization_type'] = array(
					1 => 'องค์กรภาคเอกชน'
					,2 => 'หน่วยงานของรัฐ'
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
			$form = 'WelfareForm';

			//	สาขาของโครงการที่ขอรับสนับสนุน
			$querySector = 'SELECT * FROM FUND_WELFARE_SECTOR WHERE STATUS = 1 ORDER BY ID ASC';
			$data["sectors"] = $this->ado->GetArray($querySector);

			//	กลุ่มเป้าหมาย
			$queryTarget = 'SELECT * FROM FUND_WELFARE_TARGET WHERE STATUS = 1 ORDER BY ID ASC';
			$data["targets"] = $this->ado->GetArray($queryTarget);

			$data['agency'] = $this->ado->GetRow($query);

			if($id) {
				$query = "SELECT * FROM FUND_WELFARE WHERE ID = $id";
				$data['value'] = $this->ado->GetRow($query);

				$query = "SELECT * FROM FUND_WELFARE_SECTOR_SELECT WHERE FUND_WELFARE_ID = $id ORDER BY ID ASC";
				$data["csectors"] = $this->ado->GetArray($query);

				dbConvert($data['value']);
				dbConvert($data['csectors']);

				if(@$data['value']['web_status']!=2 && @$data['value']['id']==true) {
					$edit_time = $data['value']['edit_time'];

					$query = "SELECT * FROM FUND_WELFARE_TARGET_NUMBER WHERE FUND_WELFARE_ID = $id AND EDIT_TIME = $edit_time ORDER BY FUND_WELFARE_TARGET_ID ASC";
					$data['ctargets'] = $this->ado->GetArray($query);

					dbConvert($data['ctargets']);

					$form = 'WelfareView';
				}
			}

			dbConvert($data['sectors']);
			dbConvert($data['targets']);
			dbConvert($data['agency']);
		} else if($_GET['type'] == 3) {
			$form = 'formTraffick';
		}
		
		$this->load->view('claimfund/'.$form,$data);
	}
		public function cbox_list_benefit() {
			putenv("NLS_LANG=AMERICAN_AMERICA.TH8TISASCII");
			$this->load->library('adodb');

			//Key search 
			if(!empty($_GET['title'])) {
				$cond_awb = " and awb.organ_name like '%".iconv('utf-8', 'tis-620', $_GET['title'])."%' ";
				$cond_awc = " and awc.organ_name like '%".iconv('utf-8', 'tis-620', $_GET['title'])."%' ";
			}

			if(empty($_GET['b_type'])) {
				$sql = "select 
						1 as b_type,
						awb.id,
						AWB.input_date,
						AWB.UNDER_TYPE_SUB,
						AWB.organ_name,
						awb.current_status,
						AWB.tel,
						AWB.fax
					from act_welfare_benefit awb
					where 1=1 ".@$cond_awb."
				UNION
					select 
						2 as b_type
						,awc.id
						,AWC.input_date
						,AWC.under_type_sub
						,awc.organ_name
						,awc.CURRENT_STATUS
						,AWC.TEL
						,AWC.fax
					from ACT_WELFARE_COMM awc
					where 1=1 ".@$cond_awc."";
			} else {
				$tbl_type1 = array(1 => 'benefit', 2 => 'comm');
				$tbl_type2 = array(1 => 'awb', 2 => 'awc');
				$sql = "select 
					".$_GET['b_type']." as b_type,
					".$tbl_type2[$_GET['b_type']].".id,
					".$tbl_type2[$_GET['b_type']].".input_date,
					".$tbl_type2[$_GET['b_type']].".UNDER_TYPE_SUB,
					".$tbl_type2[$_GET['b_type']].".organ_name,
					".$tbl_type2[$_GET['b_type']].".current_status,
					".$tbl_type2[$_GET['b_type']].".tel,
					".$tbl_type2[$_GET['b_type']].".fax
				from act_welfare_".$tbl_type1[$_GET['b_type']]." ".$tbl_type2[$_GET['b_type']]."
				where 1=1 ".${'cond_'.$tbl_type2[$_GET['b_type']]};
			}

			$limit = '10';
			#$rs = $this->ado->GetArray($sql);
			$target = '';
			$current_page = @$_GET['page'];
			$this->load->library('pagination');
			$page = new pagination();
			$page->target($target);
			$page->limit($limit);
			$page->currentPage($current_page);
			$rs = $this->ado->PageExecute($sql, $limit, $page->page);
			@$page->Items($rs->_maxRecordCount);
			$data['pagination'] = $page->show();
			$data['rs'] = $rs->GetArray();
			dbConvert($data['rs']);
			$data['no'] = (empty($_GET['page']))?0:($_GET['page']-1)*10;
			
			$this->load->view('org/claimfund/list_welfare', @$data);
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
			$province_name = $this->ado->GetOne('select title from fund_province where id = \''.$province_id.'\'');
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
			$qry = "select project_code from fund_projectsupport where project_code like '".iconv('utf-8', 'tis-620', $code)."%'";
			$qry .= (empty($id))?null:" and id = '".@$id."'";
			$qry .= " order by id desc";
			$current = $this->ado->GetOne($qry);
			dbConvert($current);
			
			
			if(!empty($current) && !empty($id)) {
				$code = $current;
			} else if((!empty($current) && empty($id)) || (empty($current) && !empty($id))) {
				$current = $this->ado->GetOne("select project_code from fund_projectsupport where project_code like '".iconv('utf-8', 'tis-620', $code)."%'");
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
	public function delfileChild($type = null, $id = null) {
		if(empty($id) || empty($type)) { return false; }
		
		$this->load->library('adodb');
		
		$fileattach = array('fileattach_1', 'fileattach_2', 'fileattach_3', 'fileattach_4', 'fileattach_5');
		$fileattachIndex = array(1,2,3,4,5);
		if(in_array($type, $fileattach)) {
			$link = $this->ado->GetRow("select base_path_".$fileattachIndex[array_search($type, $fileattach)]." base_path, ".$type." file_path from fund_projectsupport where id = '".$id."'");
			dbConvert($link);
			$link = str_replace($link['base_path'], null, $link['file_path']);
			
			if(@file_exists($link)) {
				unlink($link);
			}
			
			$data = array(
				'id' => $id
				,$type => null
				,'base_path_'.$fileattachIndex[array_search($type, $fileattach)] => null
			);
			
			array_walk($data, 'dbConvert','TIS-620');
			$this->ado->AutoExecute('FUND_PROJECTSUPPORT',$data,'UPDATE', "ID = '".$id."'");
		}
		
		$attachset = array('attach_set_1', 'attach_set_2');
		if(in_array($type, $attachset)) {
			$link = $this->ado->GetRow("select base_path, file_path from fund_projectsupport_attach where id = '".$id."'");
			dbConvert($link);
			$link = str_replace($link['base_path'], null, $link['file_path']);

			if(@file_exists($link)) {
				unlink($link);
			}
			
			$this->ado->query("delete from fund_projectsupport_attach where id = '".$id."'");
		}
	}
	public function downloadChild($type = null, $id = null) {
		if(empty($id) || empty($type)) { return false; }
		
		$this->load->library('adodb');
		
		$fileattach = array('fileattach_1', 'fileattach_2', 'fileattach_3', 'fileattach_4', 'fileattach_5');
		if(in_array($type, $fileattach)) {
			$text['fileattach'] = array(
				'fileattach_1' => 'แบบสรุปโครงการ'
				,'fileattach_2' => 'ข้อมูลเกี่ยวกับโครงการที่เสนอขอรับเงินกองทุนฯพร้อมแผนที่พื้นที่ดำเนินงานโครงการ'
				,'fileattach_3' => 'ข้อมูลเกี่ยวกับองค์กรที่เสนอขอรับเงินกองทุนฯพร้อมแผนที่ตั้งองค์กร'
				,'fileattach_4' => 'หนังสือรับรองผลงาน'
				,'fileattach_4' => 'หนังสือรับรององค์กร'
			);
			
			$filePath = $this->ado->GetOne("select ".$type." from fund_projectsupport where id = '".$id."'");
			$fileName = $text['fileattach'][$type];
		}
		
		$attachset = array('attach_set_1', 'attach_set_2');
		if(in_array($type, $attachset)) {
			$tmp = $this->ado->GetRow("select file_name, file_path from fund_projectsupport_attach where module_name = '".$type."' and id = '".$id."'");
			echo "select file_name, file_path from fund_projectsupport_attach where module_name = '".$type."' and id = '".$id."'";
			dbConvert($tmp);
			$filePath = @$tmp['file_path'];
			$fileName = @$tmp['file_name'];
		}
		
		headerDownload($filePath, $fileName);
	}
	
	
	public function saveChild($id = null) {
		putenv("NLS_LANG=AMERICAN_AMERICA.TH8TISASCII");
		$this->load->library('adodb');
		
		//Validate 
			$error = 0;
			foreach(array('year_budget', 'project_name', 'project_type', 'project_status', 'project_direction', 'budget_support', 'budget_cause', 'organization_type') as $item) {
				$error = (empty($_POST[$item]))?1:$error;
			}
			if($error == 1) {
				#set_notify('error', "ไม่สามารถบันทึกได้ กรุณาตรวจสอบข้อมูลให้ถูกต้อง");
				#redirect('org/member/');
			}
		//End-validate
		
		
		//fund_projecsupport
			$fund_ps = $_POST;
			$ae = array('type' => null, 'where' => null);
			$fund_ps['status'] = 1;
			
			//--id
			
				if(empty($id)) {
					$fund_ps['id'] = $this->ado->GetOne('select max(id)+1 from fund_projectsupport');
					$fund_ps['id'] = ($fund_ps['id'] == 0)?1:$fund_ps['id'];
					$ae['type'] = 'INSERT';
					
					$fund_ps['created'] = date('Y-m-d H:i:s');
					$fund_ps['created_by'] = $this->session->userdata('id');;
					$ae['where'] = false;
				} else {
					$fund_ps['id'] = $id;
					
					$ae['type'] = 'UPDATE';
					$ae['where'] = " id = '".$fund_ps['id']."' ";
				}
				
		
			//--Act_welfare_benefit_id
				$query = "SELECT
					AWB.id,
					AWB.ORGAN_NAME
				FROM ACT_WELFARE_BENEFIT AWB
				JOIN ACT_PROVINCE AP ON AP.PROVINCE_CODE = AWB.PROVINCE_CODE
				WHERE ID = ".$this->session->userdata('act_welfare_benefit_id');
				$value = $this->ado->GetRow($query);
				dbConvert($value);
				
				$fund_ps['act_user_id'] = $this->session->userdata('id');
				$fund_ps['welfare_benefit_title'] = $value['organ_name']; 
			//--gen project_code
				#$fund_ps['project_code'] = $this->gen_projectcode($_POST['year_budget'], @$id, @$_POST['province_id'], @$_POST['central_check']);
				//project_code_text
				$project_title = $this->ado->GetOne('select title from fund_province where id = \''.$_POST['province_id'].'\'');
				dbConvert($project_title);
				$fund_ps['project_code_text'] = 'คคด/'.$_POST['year_budget'].'/'.$project_title;
				
				//project_code_number
				$chk_self = $this->ado->GetOne("select project_code_number from fund_projectsupport where id = '".$fund_ps['id']."' and project_code_text = '".iconv('utf-8', 'tis-620', $fund_ps['project_code_text'])."' order by project_code_number desc");
				dbConvert($chk_self);
				if(empty($chk_self) || empty($fund_ps['id'])) {
					$fund_ps['project_code_number'] = $this->ado->GetOne("select project_code_number from fund_projectsupport where project_code_text = '".iconv('utf-8', 'tis-620', $fund_ps['project_code_text'])."' order by project_code_number desc");
					dbConvert($fund_ps['project_code_number']);
					@$fund_ps['project_code_number'] += 1;
				} else {
					$fund_ps['project_code_number'] = $chk_self;	
				}
				
				//project_code 
				$fund_ps['project_code'] = $fund_ps['project_code_text'].'/'.substr('000'.$fund_ps['project_code_number'], -3, 3);
				
				unset($fund_ps['project_target_set_val']);
				
								
			//--has_budget_other_n
				for($i=1; $i<4; $i++) {
					$fund_ps['has_budget_other_'.$i] = (empty($fund_ps['has_budget_other'][$i]))?0:1;
				}
				unset($fund_ps['has_budget_other']);
			
				$fund_ps['budget_support'] = str_replace(',',null,$fund_ps['budget_support']);
				$fund_ps['budget_other'] = str_replace(',',null,$fund_ps['budget_other']);
				$fund_ps['budget_project'] = $fund_ps['budget_support']+$fund_ps['budget_other'];
				$fund_ps['web_form'] = 1;
			//--file attach 1 - 5
				$dir = 'uploads/org/claimfund/child/';
				for( $i = 1 ; $i < 6; $i ++ ) {
					if(!empty($_FILES['fileattach_'.$i]['tmp_name'])) {
						$fund_ps['fileattach_'.$i] = base_url().uploadfiles(null, $dir, $_FILES['fileattach_'.$i]);
						$fund_ps['base_path_'.$i] = base_url();
					}	
				}
		//--Save (fund_projecsupport) 
			$fund_ps['updated'] = date('Y-m-d H:i:s');
			$fund_ps['updated_by'] = $this->session->userdata('id');
			$fund_ps['receive_date'] = $fund_ps['updated'];
			
			array_walk($fund_ps, 'dbConvert','TIS-620');
#var_dump($fund_ps);
#exit;
			$this->ado->AutoExecute('FUND_PROJECTSUPPORT',$fund_ps,$ae['type'], $ae['where']);
		//fund_projecsupport
		
		//--attach_set_1-2
		$attach_set = array('attach_set_1', 'attach_set_2');
		
		foreach($attach_set as $item) {
			foreach($_FILES[$item]['tmp_name'] as $key => $item2) {
				if(!empty($item2)) {
					//--Filename
					$ftype = explode('.', $_FILES[$item]['name'][$key]);
					$filename = str_replace('.'.end($ftype), null, $_FILES[$item]['name'][$key]);
					$data = array(
						'id' => $this->ado->GetOne("select max(id)+1 from fund_projectsupport_attach")
						,'module_name' => $item
						,'module_id' => $fund_ps['id']
						,'file_name' => $filename
						,'file_path' => base_url().uploadfiles(null, $dir, array('tmp_name' => $_FILES[$item]['tmp_name'][$key], 'name' => $_FILES[$item]['name'][$key]))
						,'base_path' => base_url()
					);
					$data['id'] = ($data['id'] == 0)?1:$data['id']; 
					array_walk($data, 'dbConvert','TIS-620');
					$this->ado->AutoExecute('FUND_PROJECTSUPPORT_ATTACH', $data, 'INSERT');
				}	
			}	
		}
		
		//--project_target_set_data
		$this->ado->query("delete from fund_project_target_set_data where project_support_id = '".$fund_ps['id']."'");
		foreach($_POST['project_target_set_id'] as $item) {
			$data = array(
				'id' => $this->ado->GetOne("select max(id)+1 from fund_project_target_set_data")
				,'project_support_id' => $fund_ps['id']
				,'project_target_set_id' => $item
				,'amount' => $_POST['project_target_set_val'][$item]
				,'detail' => @$_POST['project_target_set_comment'][$item]
				,'title' => $this->ado->GetOne("select title from fund_project_target_set where id = '".$item."'")
			);
			dbConvert($data['title']);

			array_walk($data, 'dbConvert','TIS-620');
			$this->ado->AutoExecute('FUND_PROJECT_TARGET_SET_DATA', $data, 'INSERT');
		}
		
		set_notify('success', 'บันทึกข้อมูลเสร็จสิ้น');
		redirect('org/member');
	}

	//	เซฟกองทุนส่งเสริม
	public function saveSupport($id=null) {
		putenv("NLS_LANG=AMERICAN_AMERICA.TH8TISASCII");
		$this->load->library('adodb');

		if($_POST) {
			$error = 0;
			$input = array('project_system','project_name','project_type_id');
			
			foreach ($input as $value) {
				if(!@$_POST[$value]) {
					$error = 1;
				}
			}

			if($error==1) {
				set_notify('error', "ไม่สามารถบันทึกได้ กรุณาตรวจสอบข้อมูลให้ถูกต้อง");
			} else {

				//	เรียกค่าองค์กร
				if($this->session->userdata('act_welfare_benefit_id'))  {
					//	องค์กรสาธารณประโยชน์
					$welfare["act_welfare_benefit_id"] = $this->session->userdata('act_welfare_benefit_id');
					$agency = $this->ado->GetRow("SELECT * FROM ACT_WELFARE_BENEFIT WHERE id = ".$this->session->userdata('act_welfare_benefit_id'));
					dbConvert($agency);
					$agency_type_id = 1;
					$agency_type_title = 'องค์กรสาธารณประโยชน์';

                  	switch ($agency['under_type_sub']) {
                    	case 'มูลนิธิ':
                      		$agency_sub_type_id = 1;
							$agency_sub_type_title = 'มูลนิธิ';
                      		break;
                    	case 'สมาคม':
                      		$agency_sub_type_id = 2;
							$agency_sub_type_title = 'สมาคม';
                      		break;
                    	case 'องค์กรภาคเอกชน':
                      		$agency_sub_type_id = 3;
							$agency_sub_type_title = 'องค์กรภาคเอกชน';
                    		break;
					}
				} else {
					//	องค์กรสวัสดิการชุมชน
					$welfare["act_welfare_comm_id"] = $this->session->userdata('act_welfare_comm_id');
					$agency = $this->ado->GetRow("SELECT * FROM ACT_WELFARE_COMM WHERE id = ".$this->session->userdata('act_welfare_comm_id'));
					dbConvert($agency);
					$agency_type_id = 2;
					$agency_type_title = 'องค์กรสวัสดิการชุมชน';
					$agency_sub_type_id = 1;
					$agency_sub_type_title = 'text';

                  	switch ($agency['under_type_sub']) {
                    	case 'องค์กรสวัสดิการชุมชน':
                      		$agency_sub_type_id = 5;
							$agency_sub_type_title = 'องค์กรสวัสดิการชุมชน';
                      		break;
                    	case 'เครือข่าย':
                      		$agency_sub_type_id = 4;
							$agency_sub_type_title = 'เครือข่าย';
                      		break;
					}
				}

				$welfare['updated'] = date("Y-m-d H:i:s");

				if(@$id) {
					$temp = $this->ado->GetRow("SELECT * FROM FUND_WELFARE WHERE ID = $id");
					dbConvert($temp);

					$welfare = $temp;
					$welfare['edit_time'] = ($welfare['edit_time']+1);
					$welfare['budget_total'] = 0;
					$welfare['web_status'] = 0;
				} else {
					$welfare['web_form'] = 1;
					$welfare["act_user_id"] = $this->session->userdata('id');
					$welfare["created"] = date("Y-m-d H:i:s");
					$welfare["pre_status"] = 0;																			//	ผลพิจารณาเบื้องต้นของเจ้าหน้าที่	
					$welfare["status"] = 0;																				//	สถานะ default
					$welfare["edit_time"] = 1;																			//	แสดงว่าเป็นการส่งครั้งแรก
					$welfare["send_central"] = 0;																		//	checkbox ส่วนกลาง
					$welfare["budget_total"] = 0;																		//	งบประมาณทั้งโครงการ
					$welfare["year_budget"] = (@$_POST["year_budget"]) ? $_POST["year_budget"] : (date("Y")+543);		//	ปีงบประมาณ
						
					//	- รหัสโครงการ
					$max = $this->ado->GetOne("SELECT NVL(MAX(PROJECT_NUMBER),0) max_id FROM FUND_WELFARE WHERE YEAR_BUDGET = ".$_POST["year_budget"]);
					dbConvert($max);

					$welfare["project_id"] = substr($_POST["year_budget"], -2,2)."/".($max+1);
					$welfare["project_number"] = $max+1;
					//	รหัสโครงการ --------------------------------------------------------------------------------------------------

				}
				$welfare["project_name"] = $_POST["project_name"];

				//	ระบบการขอรับเงินสนับสนุน
				if(@$_POST["project_system"]==1) {
					$welfare["project_system"] = 1;	
					$welfare["project_system_name"] = "ปกติ (ส่งเข้าส่วนกลาง)";
				} else {
					$welfare["project_system"] = 2;
					$welfare["project_system_name"] = "กระจาย (พิจารณาในจังหวัด)";
					$welfare["is_project_system_2"] = (@$_POST["is_project_system_2"]) ? $_POST["is_project_system_2"] : 0;
					
					if(@$welfare["is_project_system_2"]>0) {
						$welfare["is_project_system_2_name"] = "เชิงประเด็น";
					} else {
						$welfare["is_project_system_2_name"] = "เชิงพื้นที่";
					}
				}
				//	ระบบการขอรับเงินสนับสนุน --------------------------------------------------------------------------------------------------	
		
				//	จังหวัด
				if(@$_POST["province_id"]==true) {
					$welfare["central_check"] = 0;

					$province = $this->ado->GetRow("SELECT * FROM FUND_PROVINCE WHERE province_code = ".$_POST['province_id']);
					dbConvert($province);

					$welfare["province_id"] = $province["id"];
					$welfare["province_title"] = $province['title'];
				}
				//	จังหวัด --------------------------------------------------------------------------------------------------

				//	ชื่อองค์กรที่เสนอขอรับเงินกองทุน
				$welfare["agency_name"] = $agency['organ_name'];
				$welfare["agency_number"] = @$_POST["agency_number"]; 
				$welfare["agency_year"] = @$_POST["agency_year"];
				//	ชื่อองค์กรที่เสนอขอรับเงินกองทุน --------------------------------------------------------------------------------------------------
				
				//	ประเภทองค์กร
				$welfare["agency_type_id"] = $agency_type_id;
				$welfare["agency_type_title"] = $agency_type_title;
				//	ประเภทองค์กร --------------------------------------------------------------------------------------------------
				
				//	ประเภทองค์กรย่อย				
				$welfare["agency_sub_type_id"] = $agency_sub_type_id;
				$welfare["agency_sub_type_title"] = $agency_sub_type_title;
				//	ประเภทองค์กรย่อย --------------------------------------------------------------------------------------------------
								
				//	ลักษณะโครงการ
				$welfare["project_type_id"] = $_POST["project_type_id"];
				switch ($welfare["project_type_id"]) {
					case 1:
						$welfare["project_type_title"] = "โครงการใหม่ (โครงการที่ไม่เคยดำเนินการในพื้นที่ หรือกลุ่มเป้าหมายนั้น มาก่อน)";
						break;
					case 2:
						$welfare["project_type_title"] = "โครงการที่ดำเนินงานมาแล้ว (โครงการที่ได้ดำเนินการในพื้นที่ หรือกลุ่มเป้าหมายนั้นแล้ว โดยต้องมีทุนเพื่อใช้ในการดำเนินงานตามโครงการนี้อยู่แล้วบางส่วน ซึ่งต้องไม่น้อยกว่า 25%)";
						break;
					case 3:
						$welfare["project_type_title"] = "ไม่ได้รับการสนับสนุนงบประมาณจากส่วนราชการและแหล่งทุนอื่นๆ  หรือได้รับแต่ไม่เพียงพอ";
						break;
				}
				//	ลักษณะโครงการ --------------------------------------------------------------------------------------------------
			
				//	งบประมาณโครงการและแหล่งสนับสนุน(เฉพาะปีปัจจุบัน) --------------------------------------------------------------------------------------------------
			
				//	งบประมาณที่ขอรับการสนับสนุน
				$welfare["budget_request"] = cleanformat($_POST["budget_request"]) ? $_POST["budget_request"] : 0;
				$welfare["budget_total"] += $welfare["budget_request"];
				
				//	งบประมาณที่ได้รับสมทบจากแหล่งอื่น -> หน่วยงานรัฐ
				if(@$_POST["has_budget_other_1"]==1) {
					$welfare["has_budget_other_1"] = 1;
					$welfare["budget_other_1"] = cleanformat($_POST["budget_other_1"]) ? $_POST["budget_other_1"] : 0;
					$welfare["budget_total"] += $welfare["budget_other_1"];
				}
				
				//	งบประมาณที่ได้รับสมทบจากแหล่งอื่น -> หน่วยงานภาคเอกชน
				if(@$_POST["has_budget_other_2"]==1) {
					$welfare["has_budget_other_2"] = 1;
					$welfare["budget_other_2"] = cleanformat($_POST["budget_other_2"]) ? $_POST["budget_other_2"] : 0;
					$welfare["budget_total"] += $welfare["budget_other_2"];
				}
				
				//	งบประมาณที่ได้รับสมทบจากแหล่งอื่น -> ท้องถิ่น
				if(@$_POST["has_budget_other_3"]==1) {
					$welfare["has_budget_other_3"] = 1;
					
					//	องค์การบริหารส่วนจังหวัด
					if(@$_POST["has_budget_other_3_1"]==1) {
						$welfare["has_budget_other_3_1"] = 1;
						$welfare["budget_other_3_1"] = cleanformat($_POST["budget_other_3_1"]) ? $_POST["budget_other_3_1"] : 0;
						$welfare["budget_total"] += $welfare["budget_other_3_1"];
					}
					
					//	องค์การบริหารส่วนตำบล
					if(@$_POST["has_budget_other_3_2"]==1) {
						$welfare["has_budget_other_3_2"] = 1;
						$welfare["budget_other_3_2"] = cleanformat($_POST["budget_other_3_2"]) ? $_POST["budget_other_3_2"] : 0;
						$welfare["budget_total"] += $welfare["budget_other_3_2"];
					}
					
					//	องค์กรปกครองส่วนท้องถิ่น
					if(@$_POST["has_budget_other_3_3"]==1) {
						$welfare["has_budget_other_3_3"] = 1;
						$welfare["budget_other_3_3"] = cleanformat($_POST["budget_other_3_3"]) ? $_POST["budget_other_3_3"] : 0;
						$welfare["budget_total"] += $welfare["budget_other_3_3"];
					}
					
					//	องค์การบริหารส่วนจังหวัด
					if(@$_POST["has_budget_other_3_4"]==1) {
						$welfare["has_budget_other_3_4"] = 1;
						$welfare["budget_other_3_4"] = cleanformat($_POST["budget_other_3_4"]) ? $_POST["budget_other_3_4"] : 0;
						$welfare["budget_total"] += $welfare["budget_other_3_4"];
					}
				}
					
				$welfare["organization_budget"] = cleanformat($_POST["organization_budget"]) ? $_POST["organization_budget"] : 0;
				$welfare["budget_total"] += $welfare["organization_budget"];
			
				//	งบประมาณโครงการและแหล่งสนับสนุน(เฉพาะปีปัจจุบัน) --------------------------------------------------------------------------------------------------
				if($_POST["budget_total"]==$welfare["budget_total"]) {
						
					//	ขนาดโครงการ
					if($welfare["budget_request"]>3000000) {
						$welfare["project_size"] = 4;
						$welfare["project_size_name"] = "ขนาดพิเศษ (3,000,000 บาทขึ้นไป)"; 
					}
					
					if($welfare["budget_request"]<=3000000) {
						$welfare["project_size"] = 3;
						$welfare["project_size_name"] = "ขนาดใหญ่ (300,001 - 3,000,000 บาท)";
					}
					
					if($welfare["budget_request"]<=300000) {
						$welfare["project_size"] = 2;
						$welfare["project_size_name"] = "ขนาดกลาง (50,001 - 300,000 บาท)";
					}
					
					if($welfare["budget_request"]<=5000) {
						$welfare["project_size"] = 1;
						$welfare["project_size_name"] = "ขนาดเล็ก (ไม่เกิน 50,000 บาท)";
					}

					$col = null;
					$values = null;
					$i = 0;
					foreach ($welfare as $key => $value) {
						$col .= ",$key";
						$values .= ",'$value'";
						$i++;
					}

					$this->ado->debug = true;
					$welfare['id'] = $this->ado->GetOne("SELECT (NVL(MAX(ID),0)+1) FROM FUND_WELFARE");
					array_walk($welfare,'dbConvert','TIS-620');
					$this->ado->AutoExecute('FUND_WELFARE',$welfare,'INSERT');

					$id = $welfare['id'];

					//	กลุ่มเป้าหมาย
					$queryTarget = 'SELECT * FROM FUND_WELFARE_TARGET WHERE STATUS = 1 ORDER BY ID ASC';
					$targets = $this->ado->GetArray($queryTarget);
					dbConvert($targets);
					foreach ($targets as $key => $target) {
						if(@$_POST["project_target_".$target["id"]]==1) {
		
							if(@$_POST["project_target_number_".$target["id"]]) {
								$max_id = $this->ado->GetOne("SELECT (NVL(MAX(ID),0)+1) FROM FUND_WELFARE_TARGET_NUMBER");

								$data = array(
									"id"							=> $max_id,
									"fund_welfare_id"				=> $id,
									"fund_welfare_target_id"		=> $target["id"],
									"fund_welfare_target_title"		=> $target["title"],
									"target_number"					=> $_POST["project_target_number_".$target["id"]],
									"edit_time"						=> $welfare["edit_time"]
								);
								
								array_walk($data, 'dbConvert','TIS-620');
								$this->ado->AutoExecute('FUND_WELFARE_TARGET_NUMBER',$data,'INSERT');
							}
							
						}
					}
					
					//	กลุ่มเป้าหมายอื่นๆ
					if(@$_POST["project_target_other"]==1) {
							
						// นับจำนวนที่เพิ่ม input มา
						foreach ($_POST["project_target_other_title"] as $key => $value) {
								
							//	ตรวจสอบว่าต้องมีทั้งชื่อกลุ่มเป้าหมาย และจำนวน
							if(@$_POST["project_target_other_title"][$key] && @$_POST["project_target_other_number"][$key]) {
								$max_id = $this->ado->GetOne("SELECT (NVL(MAX(ID),0)+1) FROM FUND_WELFARE_TARGET_NUMBER");
								
								$data = array(
									"id"							=> $max_id,
									"fund_welfare_id"				=> $id,
									"target_other"					=> 1,
									"fund_welfare_target_title"		=> $value,
									"target_number"					=> $_POST["project_target_other_number"][$key],
									"edit_time"						=> $welfare["edit_time"]
								);
								
								array_walk($data, 'dbConvert','TIS-620');
								$this->ado->AutoExecute('FUND_WELFARE_TARGET_NUMBER',$data,'INSERT');
							}
							 
						}
					}
					//	กลุ่มเป้าหมาย --------------------------------------------------------------------------------------------------
					
					//	สาขาของโครงการที่ขอรับสนับสนุน
					$querySector = 'SELECT * FROM FUND_WELFARE_SECTOR WHERE STATUS = 1 ORDER BY ID ASC';
					$sectors = $this->ado->GetArray($querySector);
					dbConvert($sectors);
					foreach ($sectors as $key => $sector) {
						if(@$_POST["project_sector_".$sector["id"]]==1) {
							$max_id = $this->ado->GetOne("SELECT (NVL(MAX(ID),0)+1) FROM FUND_WELFARE_SECTOR_SELECT");

							$data = array(
								"id"							=> $max_id,
								"fund_welfare_id"				=> $id,
								"fund_welfare_sector_id"		=> $sector["id"],
								"fund_welfare_sector_title"		=> $sector["title"],
								"edit_time"						=> $welfare["edit_time"]
							);
								
							array_walk($data, 'dbConvert','TIS-620');
							$this->ado->AutoExecute('FUND_WELFARE_SECTOR_SELECT',$data,'INSERT');
						}
					}
					
					//	สาขาอื่นๆ
					if(@$_POST["project_sector_other"]==1) {
						$max_id = $this->ado->GetOne("SELECT (NVL(MAX(ID),0)+1) FROM FUND_WELFARE_SECTOR_SELECT");

						$data = array(
							"id"				=> $max_id,
							"fund_welfare_id"	=> $id,
							"others"			=> 1,
							"other_title"		=> @$_POST["project_sector_other_title"],
							"edit_time"			=> $welfare["edit_time"]
						);
								
						array_walk($data, 'dbConvert','TIS-620');
						$this->ado->AutoExecute('FUND_WELFARE_SECTOR_SELECT',$data,'INSERT');
					}
					//	สาขาของโครงการที่ขอรับสนับสนุน --------------------------------------------------------------------------------------------------
					
					set_notify('success', 'ยื่นแบบฟอร์มการขอรับเงินสนับสนุนโครงการกองทุนส่งเสริมการจัดสวัสดิการสังคมสำเร็จ');
				} else {
					set_notify('error', "ไม่สามารถบันทึกได้ กรุณาตรวจสอบข้อมูลให้ถูกต้อง");
				}	//	งบประมาณโครงการและแหล่งสนับสนุน(เฉพาะปีปัจจุบัน) --------------------------------------------------------------------------------------------------
			}//	close else $error
		}
		redirect("org/member");
	}

	public function getTarget($id,$welfare=null) {
		putenv("NLS_LANG=AMERICAN_AMERICA.TH8TISASCII");
		$this->load->library('adodb');
		$data['other'] = 0;

		if($id==1) {
			$data['other'] = 1;
			$where = " AND SYSTEM_NORMAL = 1";
		} else {
			$where = " AND SYSTEM_DISTRIBUTE = 1";
		}

		if($welfare) {
			$query = "SELECT * FROM FUND_WELFARE WHERE ID = $welfare";
			$data['fund'] = $this->ado->GetRow($query);

			$edit_time = $data['fund']['EDIT_TIME'];

			$query = "SELECT * FROM FUND_WELFARE_TARGET_NUMBER WHERE FUND_WELFARE_ID = $welfare AND EDIT_TIME = $edit_time ORDER BY ID ASC";
			$data["ctargets"] = $this->ado->GetArray($query);

			dbConvert($data['fund']);
			dbConvert($data['ctargets']);
		}

		$query = "SELECT * FROM FUND_WELFARE_TARGET WHERE STATUS = 1 $where ORDER BY ID ASC";
		$data["variable"] = $this->ado->GetArray($query);

		dbConvert($data['variable']);

		$this->load->view('claimfund/getSupportTarget',$data);
	}

	public function getOtherTarget() {
		$this->load->view('claimfund/getOtherTarget');
	}
}
