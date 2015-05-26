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

		//--แนบไฟล์เอกสารประกอบการพิจารณา
		$dir = 'uploads/org/claimfund/child/'; 
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
					echo $fileattach['module'];
					dbConvert($oldfile);
					var_dump($oldfile);
					#return false;
					if(!empty($oldfile['id'])) {
						$fileattach['id'] = $oldfile['id'];
						$oldfile = $oldfile['attach_name'];
					}
				}
				
				echo $fileattach['id'];
				echo '<hr>';
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
					$qry = "insert into fund_attach (id".$field.") values ((select max(id) from fund_attach)".$values.")";
				} else {
					$qry = "update fund_attach set ".$set." where id = '".$fileattach['id']."'";
				}
				$this->ado->query($qry);
			}
		}
		
		set_notify('success', 'บันทึกข้อมูลเสร็จสิ้น');
		redirect('org/member#tabs-3');
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
					echo $value.'<br />';
					$error = 1;
				}
			}

			if($error==1) {
				set_notify('error', "ไม่สามารถบันทึกได้ กรุณาตรวจสอบข้อมูลให้ถูกต้อง");
			} else {

				//	เรียกค่าองค์กร
				if($this->session->userdata('act_welfare_benefit_id'))  {
					//	องค์กรสาธารณประโยชน์
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
					$temp = $this->ado->GetOne("SELECT * FROM FUND_WELFARE WHERE ID = $id");
					dbConvert($temp);
				} else {
					$welfare["created"] = date("Y-m-d H:i:s");
					$welfare["pre_status"] = 0;																			//	ผลพิจารณาเบื้องต้นของเจ้าหน้าที่	
					$welfare["status"] = 0;																				//	สถานะ default
					$welfare["edit_time"] = 1;																			//	แสดงว่าเป็นการส่งครั้งแรก
					$welfare["send_central"] = 0;																		//	checkbox ส่วนกลาง
					$welfare["budget_total"] = 0;																		//	งบประมาณทั้งโครงการ
					$welfare["year_budget"] = (@$_POST["year_budget"]) ? $_POST["year_budget"] : (date("Y")+543);		//	ปีงบประมาณ
						
					//	- รหัสโครงการ
					$welfare["project_name"] = $_POST["project_name"];

					$max = $this->ado->GetOne("SELECT NVL(MAX(PROJECT_NUMBER),0) max_id FROM FUND_WELFARE WHERE YEAR_BUDGET = ".$_POST["year_budget"]);
					dbConvert($max);

					$welfare["project_id"] = substr($_POST["year_budget"], -2,2)."/".($max+1);
					$welfare["project_number"] = $max+1;
					//	รหัสโครงการ --------------------------------------------------------------------------------------------------

				}

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
					$welfare['id'] = $this->ado->GetOne("SELECT (MAX(ID)+1) FROM FUND_WELFARE");
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
								$max_id = $this->ado->GetOne("SELECT (MAX(ID)+1) FROM FUND_WELFARE_TARGET_NUMBER");

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
								$max_id = $this->ado->GetOne("SELECT (MAX(ID)+1) FROM FUND_WELFARE_TARGET_NUMBER");
								
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
							$max_id = $this->ado->GetOne("SELECT (MAX(ID)+1) FROM FUND_WELFARE_SECTOR_SELECT");

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
						$max_id = $this->ado->GetOne("SELECT (MAX(ID)+1) FROM FUND_WELFARE_SECTOR_SELECT");

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

	public function getOtherTarget() {
		$this->load->view('claimfund/getOtherTarget');
	}
}
