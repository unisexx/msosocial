<?php
class Org extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function benefit_reg(){
		// $this->load->library('adodb');
		
		// กลุ่มเป้าหมายในการจัดสวัสดิการสังคม 
		$data['target_groups'] = new Act_target_group();
		$data['target_groups']->order_by('seq asc')->get();
		
		// สาขาในการจัดสวัสดิการสังคม 
		$data['services'] = new Act_service();
		$data['services']->order_by('seq asc')->get();
		
		// ลักษณะการดำเนินงาน 
		$data['processes'] = new Act_process();
		$data['processes']->order_by('seq asc')->get();
		
		// รูปแบบการให้บริการ 
		$data['service_types'] = new Act_service_type();
		$data['service_types']->order_by('seq asc')->get();
		
		// วิธีการดำเนินการ 
		$data['methods'] = new Act_method();
		$data['methods']->order_by('seq asc')->get();
		
		// การดำเนินงาน 
		$data['promotes'] = new Act_promote();
		$data['promotes']->order_by('seq asc')->get();
		
		// การประกอบกิจการเพื่อสังคม 
		$data['socials'] = new Act_social();
		$data['socials']->order_by('seq asc')->get();
		
		// ถ้าเป็นการกลับมาแก้ไข เช็ค edit_code
		if(@$_GET['edit_code']){
			$this->load->library('adodb');
			
			$data['rs'] = $this->ado->GetRow("SELECT * FROM ACT_WELFARE_BENEFIT WHERE EDIT_CODE='".$_GET['edit_code']."'");
			dbConvert($data['rs']);
			
			// เอกสารหลักฐาน มาเพื่อประกอบการพิจารณา
			$data['doc'] = $this->ado->GetArray("SELECT * FROM ACT_WELFARE_BENEFIT_DOC WHERE ACT_WELFARE_BENEFIT_ID = ".$data['rs']['id']);
			dbConvert($data['doc']);
			
			// ที่ปรึกษา
			$data['adviser'] = $this->ado->GetArray("SELECT * FROM ACT_WELFARE_BENEFIT_ADVISER WHERE ACT_WELFARE_BENEFIT_ID = ".$data['rs']['id']);
			dbConvert($data['adviser']);
			
			$data['targetgroup_select'] = $this->ado->GetArray("SELECT * FROM ACT_WELFARE_BENEFIT_SUB where question_name = 'target' and act_welfare_benefit_id = ".$data['rs']['id']);
			dbConvert($data['targetgroup_select']);
			
			$data['service_select'] = $this->ado->GetArray("SELECT * FROM ACT_WELFARE_BENEFIT_SUB where question_name = 'service' and act_welfare_benefit_id = ".$data['rs']['id']);
			dbConvert($data['service_select']);
			
			$data['process_select'] = $this->ado->GetArray("SELECT * FROM ACT_WELFARE_BENEFIT_SUB where question_name = 'process' and act_welfare_benefit_id = ".$data['rs']['id']);
			dbConvert($data['process_select']);
			
			$data['method_select'] = $this->ado->GetArray("SELECT * FROM ACT_WELFARE_BENEFIT_SUB where question_name = 'method' and act_welfare_benefit_id = ".$data['rs']['id']);
			dbConvert($data['method_select']);
			
			$data['service_type_select'] = $this->ado->GetArray("SELECT * FROM ACT_WELFARE_BENEFIT_SUB where question_name = 'service_type' and act_welfare_benefit_id = ".$data['rs']['id']);
			dbConvert($data['service_type_select']);
			
			$data['promote_select'] = $this->ado->GetArray("SELECT * FROM ACT_WELFARE_BENEFIT_SUB where question_name = 'promote' and act_welfare_benefit_id = ".$data['rs']['id']);
			dbConvert($data['promote_select']);
			
			$data['social_select'] = $this->ado->GetArray("SELECT * FROM ACT_WELFARE_BENEFIT_SUB where question_name = 'social' and act_welfare_benefit_id = ".$data['rs']['id']);
			dbConvert($data['social_select']);
			
			$data['location'] = $this->ado->GetArray("SELECT * FROM ACT_WELFARE_BENEFIT_LOCATION where act_welfare_benefit_id = ".$data['rs']['id']);
			dbConvert($data['location']);
		}
		
		$this->template->build('benefit_reg',$data);
	}
	
	function benefit_save(){
		putenv("NLS_LANG=AMERICAN_AMERICA.TH8TISASCII");
		array_walk($_POST,'dbConvert','TIS-620');
		$this->load->library('adodb');
		// $this->ado->debug = true;
		if($_POST){
			$_POST['agency_type_id'] = 1;
			$_POST['agency_type_title'] = 1;
			
			$service = new Act_service();
			// แผนที่ตั้งของสำนักงานใหญ่
			if($_FILES["UploadFile"]["error"] != 4){
				$_POST['filemap']=isset($_FILES["UploadFile"])!='' ? $service->upload($_FILES['UploadFile'],'uploads/welfare_benefit/map/') : @$_POST['hdfilemap'];
				$_POST['filemap'] = base_url().'uploads/welfare_benefit/map/'.$_POST['filemap'];
		    }else{
				$_POST['filemap'] = @$_POST['hdfilemap'];
		    }
			
			// แผนที่ตั้งของสำนักงานสาขา
			if($_FILES["UploadFile2"]["error"] != 4){
				$_POST['b_filemap']=isset($_FILES["UploadFile2"])!='' ? $service->upload($_FILES['UploadFile2'],'uploads/welfare_benefit/map/') : @$_POST['hdfilemap2'];
				$_POST['b_filemap'] = base_url().'uploads/welfare_benefit/map/'.$_POST['b_filemap'];
		    }else{
				$_POST['b_filemap'] = @$_POST['hdfilemap2'];
		    }
			
			if(@$_POST['id'] == ''){
				$_POST['id'] = $this->ado->GetOne('(SELECT MAX(ID)+1 FROM ACT_WELFARE_BENEFIT)');
				$_POST['id'] = $_POST['id'] == "" ? "1" : $_POST['id'];
				$this->ado->AutoExecute('ACT_WELFARE_BENEFIT',$_POST,'INSERT');
			}else{
				$this->ado->AutoExecute('ACT_WELFARE_BENEFIT',$_POST,'UPDATE','id = '.$_POST['id']);
			}
			
			// ที่ปรึกษา
			$this->ado->Execute('DELETE FROM ACT_WELFARE_BENEFIT_ADVISER WHERE ACT_WELFARE_BENEFIT_ID = '.$_POST['id']);
			if(@is_array($_POST['a_name'])){
				foreach($_POST['a_name'] as $key=>$item){
					if($item != ""){
						$record["id"] = $this->ado->GetOne('(SELECT MAX(ID)+1 FROM ACT_WELFARE_BENEFIT_ADVISER)');
						$record['id'] = $record['id'] == "" ? "1" : $record['id'];
						$record["act_welfare_benefit_id"] = $_POST['id'];
						$record["name"] = $item;
						$record["surname"] = $_POST['a_surname'][$key];
						$record["education"] = $_POST['a_education'][$key];
						$record["experience"] = $_POST['a_experience'][$key];
						$record["location"] = $_POST['a_location'][$key];
						$record["address"] = $_POST['a_address'][$key];
						$record["tel"] = $_POST['a_tel'][$key];
						$record["fax"] = $_POST['a_fax'][$key];
						$record["mobile"] = $_POST['a_mobile'][$key];
						$record["email"] = $_POST['a_email'][$key];
						
						$this->ado->AutoExecute('ACT_WELFARE_BENEFIT_ADVISER',$record,'INSERT');
					}
				}
			}
			
			// พื้นที่ปฎิบัติงาน
			$this->ado->Execute('DELETE FROM ACT_WELFARE_BENEFIT_LOCATION WHERE ACT_WELFARE_BENEFIT_ID = '.$_POST['id']);
			if(@is_array($_POST['location_type'])){
				foreach($_POST['location_type'] as $key=>$item){
					if($item != ""){
						$record["id"] = $this->ado->GetOne('(SELECT MAX(ID)+1 FROM ACT_WELFARE_BENEFIT_LOCATION)');
						$record['id'] = $record['id'] == "" ? "1" : $record['id'];
						$record["act_welfare_benefit_id"] = $_POST['id'];
						$record["type"] = $_POST['location_type'][$key];
						$record["province_code"] = $_POST['location_province'][$key];
						$record["ampor_code"] = $_POST['location_ampor'][$key];
						$record["tumbon_code"] = $_POST['location_tumbon'][$key];
						$record["mooban"] = $_POST['location_mooban_text'][$key];
						$record["province"] = $_POST['location_province_text'][$key];
						$record["ampor"] = $_POST['location_ampor_text'][$key];
						$record["tumbon"] = $_POST['location_tumbon_text'][$key];
						
						$this->ado->AutoExecute('ACT_WELFARE_BENEFIT_LOCATION',$record,'INSERT');
					}
				}
			}
			
			// เอกสารหลักฐาน มาเพื่อประกอบการพิจารณา
			fix_file($_FILES['filesToUpload']);
			foreach($_FILES['filesToUpload'] as $key => $item)
			{
				if($item)
				{
					if($_FILES['filesToUpload'][$key]['name'])
					{
						$files = $service->upload($_FILES['filesToUpload'][$key],'uploads/welfare_benefit/doc/');
						
						$record["id"] = $this->ado->GetOne('(SELECT MAX(ID)+1 FROM ACT_WELFARE_BENEFIT_DOC)');
						$record['id'] = $record['id'] == "" ? "1" : $record['id'];
						$record["act_welfare_benefit_id"] = $_POST['id'];
						$record["files"] = base_url().'uploads/welfare_benefit/doc/'.$files;
						$record["storage"] = 'fund02';
						
						$this->ado->AutoExecute('ACT_WELFARE_BENEFIT_DOC',$record,'INSERT');
					}		
				}
			}
			
			// อื่นๆ
			$this->ado->Execute('DELETE FROM ACT_WELFARE_BENEFIT_SUB WHERE ACT_WELFARE_BENEFIT_ID = '.$_POST['id']);
			if(@is_array($_POST['answer_id'])){
				foreach($_POST['answer_id'] as $key=>$item){
					$record["id"] = $this->ado->GetOne('(SELECT MAX(ID)+1 FROM ACT_WELFARE_BENEFIT_SUB)');
					$record['id'] = $record['id'] == "" ? "1" : $record['id'];
					$record["act_welfare_benefit_id"] = $_POST['id'];
					$record["question_name"] = @$_POST['question_name'][$key];
					$record["answer_id"] = $item;
					$record["other"] = $_POST['other'][$key];
					
					$this->ado->AutoExecute('ACT_WELFARE_BENEFIT_SUB',$record,'INSERT');
				}
			}

			// อัพเดทสถานะยื่นใหม่
			$status['id'] = $this->ado->GetOne('(SELECT MAX(ID)+1 FROM ACT_BENEFIT_STATUS)');
			$status['id'] = $status['id'] == "" ? "1" : $_POST['id'];
			$status['act_welfare_benefit_id'] = $_POST['id'];
			$status['status_type'] = "ยื่นใหม่";
			$this->ado->AutoExecute('ACT_BENEFIT_STATUS',$status,'INSERT');
			
			set_notify('success', 'ยื่นจดทะเบียนสำเร็จ รอการติดต่อกลับจากเจ้าหน้าที่');
		}
		// redirect($_SERVER['HTTP_REFERER']);
		redirect('home');
	}
	
	function community_reg(){
		// ลักษณะการดำเนินการองค์กร 
		$data['pcommunities'] = new Act_process_community();
		$data['pcommunities']->order_by('seq asc')->get();
		
		// ถ้าเป็นการกลับมาแก้ไข เช็ค edit_code
		if(@$_GET['edit_code']){
			$this->load->library('adodb');
			
			$data['rs'] = $this->ado->GetRow("SELECT * FROM ACT_WELFARE_COMM WHERE EDIT_CODE='".$_GET['edit_code']."'");
			dbConvert($data['rs']);
			
			// เอกสารหลักฐาน มาเพื่อประกอบการพิจารณา
			$data['doc'] = $this->ado->GetArray("SELECT * FROM ACT_WELFARE_COMM_DOC WHERE ACT_WELFARE_COMM_ID = ".$data['rs']['id']);
			dbConvert($data['doc']);
			
			// ผู้ประสานงานองค์กร
			$data['coordinate'] = $this->ado->GetArray("SELECT * FROM ACT_WELFARE_COMM_COORDINATE WHERE ACT_WELFARE_COMM_ID = ".$data['rs']['id']);
			dbConvert($data['coordinate']);
			
			// ที่ปรึกษา
			$data['adviser'] = $this->ado->GetArray("SELECT * FROM ACT_WELFARE_COMM_ADVISER WHERE ACT_WELFARE_COMM_ID = ".$data['rs']['id']);
			dbConvert($data['adviser']);
			
			// บริการสวัสดิการที่จัดให้แก่สมาชิก
			$data['service'] = $this->ado->GetArray("SELECT * FROM ACT_WELFARE_COMM_SERVICE WHERE ACT_WELFARE_COMM_ID = ".$data['rs']['id']);
			dbConvert($data['service']);
			
			$data['pcommunity_select'] = $this->ado->GetArray("SELECT * FROM ACT_WELFARE_COMM_SUB where question_name = 'ProcessCommunity' and act_welfare_comm_id = ".$data['rs']['id']);
			dbConvert($data['pcommunity_select']);
		}
		
		$this->template->build('community_reg',$data);
	}
	
	function community_save(){
		putenv("NLS_LANG=AMERICAN_AMERICA.TH8TISASCII");
		array_walk($_POST,'dbConvert','TIS-620');
		$this->load->library('adodb');
		// $this->ado->debug = true;
		if($_POST){
			$service = new Act_service();
			// แผนที่ตั้งของสำนักงานใหญ่
			if($_FILES["UploadFile"]["error"] != 4){
				$_POST['filemap']=isset($_FILES["UploadFile"])!='' ? $service->upload($_FILES['UploadFile'],'uploads/welfare_community/map/') : @$_POST['hdfilemap'];
				$_POST['filemap'] = base_url().'uploads/welfare_community/map/'.$_POST['filemap'];
		    }else{
				$_POST['filemap'] = @$_POST['hdfilemap'];
		    }
			
			// แผนที่ตั้งของสำนักงานสาขา
			if($_FILES["UploadFile2"]["error"] != 4){
				$_POST['b_filemap']=isset($_FILES["UploadFile2"])!='' ? $service->upload($_FILES['UploadFile2'],'uploads/welfare_community/map/') : @$_POST['hdfilemap2'];
				$_POST['b_filemap'] = base_url().'uploads/welfare_community/map/'.$_POST['b_filemap'];
		    }else{
				$_POST['b_filemap'] = @$_POST['hdfilemap2'];
		    }
			
			if(@$_POST['id'] == ''){
				$_POST['id'] = $this->ado->GetOne('(SELECT MAX(ID)+1 FROM ACT_WELFARE_COMM)');
				$_POST['id'] = $_POST['id'] == "" ? "1" : $_POST['id'];
				$this->ado->AutoExecute('ACT_WELFARE_COMM',$_POST,'INSERT');
			}else{
				$this->ado->AutoExecute('act_welfare_comm',$_POST,'UPDATE','id = '.$_POST['id']);
			} 
			
			// ผู้ประสานงานองค์กร
			$this->ado->Execute('DELETE FROM ACT_WELFARE_COMM_COORDINATE WHERE ACT_WELFARE_COMM_ID = '.$_POST['id']);
			if(@is_array($_POST['c_name'])){
				foreach($_POST['c_name'] as $key=>$item){
					if($item != ""){
						$record["id"] = $this->ado->GetOne('(SELECT MAX(ID)+1 FROM ACT_WELFARE_COMM_COORDINATE)');
						$record['id'] = $record['id'] == "" ? "1" : $record['id'];
						$record["act_welfare_comm_id"] = $_POST['id'];
						$record["name"] = $item;
						$record["surname"] = $_POST['c_surname'][$key];
						$record["education"] = $_POST['c_education'][$key];
						$record["experience"] = $_POST['c_experience'][$key];
						$record["location"] = $_POST['c_location'][$key];
						$record["address"] = $_POST['c_address'][$key];
						$record["tel"] = $_POST['c_tel'][$key];
						$record["fax"] = $_POST['c_fax'][$key];
						$record["mobile"] = $_POST['c_mobile'][$key];
						$record["email"] = $_POST['c_email'][$key];
						
						$this->ado->AutoExecute('ACT_WELFARE_COMM_COORDINATE',$record,'INSERT');
					}
				}
			}
			
			// ที่ปรึกษา
			$this->ado->Execute('DELETE FROM ACT_WELFARE_COMM_ADVISER WHERE ACT_WELFARE_COMM_ID = '.$_POST['id']);
			if(@is_array($_POST['a_name'])){
				foreach($_POST['a_name'] as $key=>$item){
					if($item != ""){
						$record["id"] = $this->ado->GetOne('(SELECT MAX(ID)+1 FROM ACT_WELFARE_COMM_ADVISER)');
						$record['id'] = $record['id'] == "" ? "1" : $record['id'];
						$record["act_welfare_comm_id"] = $_POST['id'];
						$record["name"] = $item;
						$record["surname"] = $_POST['a_surname'][$key];
						$record["education"] = $_POST['a_education'][$key];
						$record["experience"] = $_POST['a_experience'][$key];
						$record["location"] = $_POST['a_location'][$key];
						$record["address"] = $_POST['a_address'][$key];
						$record["tel"] = $_POST['a_tel'][$key];
						$record["fax"] = $_POST['a_fax'][$key];
						$record["mobile"] = $_POST['a_mobile'][$key];
						$record["email"] = $_POST['a_email'][$key];
						
						$this->ado->AutoExecute('ACT_WELFARE_COMM_ADVISER',$record,'INSERT');
					}
				}
			}
			
			// บริการสวัสดิการที่จัดให้แก่สมาชิก
			$this->ado->Execute('DELETE FROM ACT_WELFARE_COMM_SERVICE WHERE ACT_WELFARE_COMM_ID = '.$_POST['id']);
			if(@is_array($_POST['m_target'])){
				foreach($_POST['m_target'] as $key=>$item){
					if($item != ""){
						
						$record["id"] = $this->ado->GetOne('(SELECT MAX(ID)+1 FROM ACT_WELFARE_COMM_SERVICE)');
						$record['id'] = $record['id'] == "" ? "1" : $record['id'];
						$record["act_welfare_comm_id"] = $_POST['id'];
						$record["target"] = $item;
						$record["receive"] = $_POST['m_receive'][$key];
						$record["condition"] = $_POST['m_condition'][$key];
						$record["other"] = $_POST['m_other'][$key];
						
						$this->ado->AutoExecute('ACT_WELFARE_COMM_SERVICE',$record,'INSERT');
					}
				}
			}
			
			// เอกสารหลักฐาน มาเพื่อประกอบการพิจารณา
			// $this->ado->Execute('DELETE FROM ACT_WELFARE_COMM_DOC WHERE ACT_WELFARE_COMM_ID = '.$_POST['id']);
			fix_file($_FILES['filesToUpload']);
			foreach($_FILES['filesToUpload'] as $key => $item)
			{
				if($item)
				{
					if($_FILES['filesToUpload'][$key]['name'])
					{
						$files = $service->upload($_FILES['filesToUpload'][$key],'uploads/welfare_community/doc/');
						
						$record["id"] = $this->ado->GetOne('(SELECT MAX(ID)+1 FROM ACT_WELFARE_COMM_DOC)');
						$record['id'] = $record['id'] == "" ? "1" : $record['id'];
						$record["act_welfare_comm_id"] = $_POST['id'];
						$record["files"] = base_url().'uploads/welfare_community/doc/'.$files;
						$record["storage"] = 'fund02';
						
						$this->ado->AutoExecute('ACT_WELFARE_COMM_DOC',$record,'INSERT');
					}		
				}
			}

			// อื่นๆ
			$this->ado->Execute('DELETE FROM ACT_WELFARE_COMM_SUB WHERE ACT_WELFARE_COMM_ID = '.$_POST['id']);
			if(@is_array($_POST['answer_id'])){
				foreach($_POST['answer_id'] as $key=>$item){
					$record["id"] = $this->ado->GetOne('(SELECT MAX(ID)+1 FROM ACT_WELFARE_COMM_SUB)');
					$record['id'] = $record['id'] == "" ? "1" : $record['id'];
					$record["act_welfare_comm_id"] = $_POST['id'];
					$record["question_name"] = @$_POST['question_name'][$key];
					$record["answer_id"] = $item;
					$record["other"] = $_POST['other'][$key];
					
					$this->ado->AutoExecute('ACT_WELFARE_COMM_SUB',$record,'INSERT');
				}
			}

			// อัพเดทสถานะยื่นใหม่
			$status['id'] = $this->ado->GetOne('(SELECT MAX(ID)+1 FROM ACT_COMM_STATUS)');
			$status['id'] = $status['id'] == "" ? "1" : $_POST['id'];
			$status['act_welfare_comm_id'] = $_POST['id'];
			$status['status_type'] = "ยื่นใหม่";
			$this->ado->AutoExecute('ACT_COMM_STATUS',$status,'INSERT');
			
			set_notify('success', 'ยื่นจดทะเบียนสำเร็จ รอการติดต่อกลับจากเจ้าหน้าที่');
		}
		// redirect($_SERVER['HTTP_REFERER']);
		redirect('home');
	}
	
	function ajax_ampor($type = NULL)
	{
		if($_POST){
			echo form_dropdown($_POST['select_name'],get_option('ampor_code','ampor_name','act_ampor','where province_code = '.$_POST['province_code'].' order by ampor_name asc'),'','class="form-control"','- เลือกอำเภอ -');
		}
	}
	
	function ajax_tumbon($type=NULL)
	{
		if($_POST){
			echo form_dropdown($_POST['select_name'],get_option('tumbon_code','tumbon_name','act_tumbon','where province_code = '.$_POST['province_code'].' and ampor_code = '.$_POST['ampor_code'].' order by tumbon_name asc'),'','class="form-control"','- เลือกตำบล -');
		}
	}
	
	function testdb()
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
	
	function reg_member(){
		$CI =& get_instance();
		if($CI->session->userdata('organ_id') == ""){
			set_notify('error', 'ไม่พบชื่อองค์กร ไม่สามารถเข้าใช้งานระบบได้');
			redirect('home');
		}
		
		$data['organ_id'] = $CI->session->userdata('organ_id');
		$data['organ_id_old'] = $CI->session->userdata('organ_id_old');
		$data['organ_type'] = $CI->session->userdata('organ_type');
		$data['organ_name'] = $CI->session->userdata('organ_name');
		$this->template->build('reg_member',$data);
		set_notify('success', 'ยินดีต้อนรับเข้าสู่ระบบ');
	}
	
	function reg_member_save(){
		putenv("NLS_LANG=AMERICAN_AMERICA.TH8TISASCII");
		array_walk($_POST,'dbConvert','TIS-620');
		$this->load->library('adodb');
		// $this->ado->debug = true;
		if($_POST){
			$service = new Act_service();
			$_POST['id'] = $this->ado->GetOne('(SELECT MAX(ID)+1 FROM ACT_USER)');
			$_POST['id'] = $_POST['id'] == "" ? "1" : $_POST['id'];
			$this->ado->AutoExecute('ACT_USER',$_POST,'INSERT');
			
			// เอกสารหลักฐาน มาเพื่อประกอบการพิจารณา
			fix_file($_FILES['filesToUpload']);
			foreach($_FILES['filesToUpload'] as $key => $item)
			{
				if($item)
				{
					if($_FILES['filesToUpload'][$key]['name'])
					{
						$files = $service->upload($_FILES['filesToUpload'][$key],'uploads/reg_member_doc/');
						
						$record["id"] = $this->ado->GetOne('(SELECT MAX(ID)+1 FROM ACT_USER_DOC)');
						$record['id'] = $record['id'] == "" ? "1" : $record['id'];
						$record["act_user_id"] = $_POST['id'];
						$record["files"] = base_url().'uploads/reg_member_doc/'.$files;
						$record["storage"] = 'fund02';
						
						$this->ado->AutoExecute('ACT_USER_DOC',$record,'INSERT');
					}		
				}
			}
			
			set_notify('success', 'ยืนยันความเป็นองค์กรสำเร็จ รอการติดต่อกลับจากเจ้าหน้าที่');
		}
		// redirect($_SERVER['HTTP_REFERER']);
		redirect('home');
	}
	
	function ajax_register(){
		putenv("NLS_LANG=AMERICAN_AMERICA.TH8TISASCII");
		array_walk($_POST,'dbConvert','TIS-620');
		$this->load->library('adodb');
		// $this->ado->debug = true;
		// $rs = $this->ado->GetRow("SELECT * FROM ACT_WELFARE_BENEFIT WHERE ORGAN_NAME like '%".$_POST['organ_name']."%'");
		$rs = $this->ado->GetRow("SELECT * FROM ACT_WELFARE_BENEFIT WHERE ORGAN_NAME = '".$_POST['organ_name']."'  AND POST_FORM = 'app4'");
		dbConvert($rs);
		// print_r($rs);
		if(@$rs['id'] == "")
		{
			// $rs = $this->ado->GetRow("SELECT * FROM ACT_WELFARE_COMM WHERE ORGAN_NAME like '%".$_POST['organ_name']."%'");
			$rs = $this->ado->GetRow("SELECT * FROM ACT_WELFARE_COMM WHERE ORGAN_NAME = '".$_POST['organ_name']."' AND POST_FORM = 'app4'");
			dbConvert($rs);
			if(@$rs['id'] == ""){
				echo ' <font color="#CC075F">ตรวจสอบไม่พบชื่อองค์กรนี้</font>';
			}else{
				$CI =& get_instance();
				$CI->session->set_userdata('organ_type','welfare_community');
				$CI->session->set_userdata('organ_id',$rs['id']);
				$CI->session->set_userdata('organ_id_old',$rs['organ_id']);
				$CI->session->set_userdata('organ_name',$rs['organ_name']);
				echo 'success';
			}
		}
		else
		{
			$CI =& get_instance();
			$CI->session->set_userdata('organ_type','welfare_benefit');
			$CI->session->set_userdata('organ_id',$rs['id']);
			$CI->session->set_userdata('organ_id_old',$rs['organ_id']);
			$CI->session->set_userdata('organ_name',$rs['organ_name']);
			echo 'success';
		}
	}


	function ajax_login(){
		putenv("NLS_LANG=AMERICAN_AMERICA.TH8TISASCII");
		array_walk($_POST,'dbConvert','TIS-620');
		$this->load->library('adodb');
		// $this->ado->debug = true;
		$rs = $this->ado->GetRow("SELECT * FROM ACT_USER WHERE USERNAME='".$_POST['username']."' AND PASSWORD = '".$_POST['password']."' AND STATUS = '".$_POST['status']."'");
		dbConvert($rs);
		if(@$rs['id'] != "")
		{
			$CI =& get_instance();
			$CI->session->set_userdata('id',$rs['id']);
			$CI->session->set_userdata('act_welfare_type',@$rs['act_welfare_type']);
			$CI->session->set_userdata('act_welfare_benefit_id',@$rs['act_welfare_benefit_id']);
			$CI->session->set_userdata('act_welfare_comm_id',@$rs['act_welfare_comm_id']);
			echo 'ล้อกอินสำเร็จ';
		}
		else
		{
			echo ' <font color="#CC075F">ยูสเซอร์เนมหรือรหัสผ่านไม่ถูกต้อง</font>';
		}
	}
	
	function member(){
		$CI =& get_instance();
		/*
		if($CI->session->userdata('id') == ""){
			set_notify('error', 'ยังไม่ได้ล้อกอิน ไม่สามารถเข้าใช้งานระบบได้');
			redirect('home');
		}
		*/
		putenv("NLS_LANG=AMERICAN_AMERICA.TH8TISASCII");
		array_walk($_POST,'dbConvert','TIS-620');
		$this->load->library('adodb');
		// $this->ado->debug = true;
		
		// ถ้าเป็นองค์กรสาธารณะประโยชน์
		if($CI->session->userdata('act_welfare_benefit_id') > 0){
			 
			$data['rs'] = $this->ado->GetRow("SELECT * FROM ACT_WELFARE_BENEFIT WHERE ID='".$CI->session->userdata('act_welfare_benefit_id')."'");
			dbConvert($data['rs']);
			
			// เอกสารหลักฐาน มาเพื่อประกอบการพิจารณา
			$data['doc'] = $this->ado->GetArray("SELECT * FROM ACT_WELFARE_BENEFIT_DOC WHERE ACT_WELFARE_BENEFIT_ID = ".$data['rs']['id']);
			dbConvert($data['doc']);
			
			// ที่ปรึกษา
			$data['adviser'] = $this->ado->GetArray("SELECT * FROM ACT_WELFARE_BENEFIT_ADVISER WHERE ACT_WELFARE_BENEFIT_ID = ".$data['rs']['id']);
			dbConvert($data['adviser']);
			
			$data['targetgroup_select'] = $this->ado->GetArray("SELECT * FROM ACT_WELFARE_BENEFIT_SUB where question_name = 'target' and act_welfare_benefit_id = ".$data['rs']['id']);
			dbConvert($data['targetgroup_select']);
			
			$data['service_select'] = $this->ado->GetArray("SELECT * FROM ACT_WELFARE_BENEFIT_SUB where question_name = 'service' and act_welfare_benefit_id = ".$data['rs']['id']);
			dbConvert($data['service_select']);
			
			$data['process_select'] = $this->ado->GetArray("SELECT * FROM ACT_WELFARE_BENEFIT_SUB where question_name = 'process' and act_welfare_benefit_id = ".$data['rs']['id']);
			dbConvert($data['process_select']);
			
			$data['method_select'] = $this->ado->GetArray("SELECT * FROM ACT_WELFARE_BENEFIT_SUB where question_name = 'method' and act_welfare_benefit_id = ".$data['rs']['id']);
			dbConvert($data['method_select']);
			
			$data['service_type_select'] = $this->ado->GetArray("SELECT * FROM ACT_WELFARE_BENEFIT_SUB where question_name = 'service_type' and act_welfare_benefit_id = ".$data['rs']['id']);
			dbConvert($data['service_type_select']);
			
			$data['promote_select'] = $this->ado->GetArray("SELECT * FROM ACT_WELFARE_BENEFIT_SUB where question_name = 'promote' and act_welfare_benefit_id = ".$data['rs']['id']);
			dbConvert($data['promote_select']);
			
			$data['social_select'] = $this->ado->GetArray("SELECT * FROM ACT_WELFARE_BENEFIT_SUB where question_name = 'social' and act_welfare_benefit_id = ".$data['rs']['id']);
			dbConvert($data['social_select']);
			
			$data['location'] = $this->ado->GetArray("SELECT * FROM ACT_WELFARE_BENEFIT_LOCATION where act_welfare_benefit_id = ".$data['rs']['id']);
			dbConvert($data['location']);
			
			// กลุ่มเป้าหมายในการจัดสวัสดิการสังคม 
			$data['target_groups'] = new Act_target_group();
			$data['target_groups']->order_by('seq asc')->get();
			
			// สาขาในการจัดสวัสดิการสังคม 
			$data['services'] = new Act_service();
			$data['services']->order_by('seq asc')->get();
			
			// ลักษณะการดำเนินงาน 
			$data['processes'] = new Act_process();
			$data['processes']->order_by('seq asc')->get();
			
			// รูปแบบการให้บริการ 
			$data['service_types'] = new Act_service_type();
			$data['service_types']->order_by('seq asc')->get();
			
			// วิธีการดำเนินการ 
			$data['methods'] = new Act_method();
			$data['methods']->order_by('seq asc')->get();
			
			// การดำเนินงาน 
			$data['promotes'] = new Act_promote();
			$data['promotes']->order_by('seq asc')->get();
			
			// การประกอบกิจการเพื่อสังคม 
			$data['socials'] = new Act_social();
			$data['socials']->order_by('seq asc')->get();
			
			// สถานะการจดทะเบียน (#Tab2)
			$data['status'] = $this->ado->GetArray("SELECT * FROM ACT_BENEFIT_STATUS WHERE ACT_WELFARE_BENEFIT_ID = ".$data['rs']['id']." ORDER BY ID ASC");
			dbConvert($data['status']);
		
		// ถ้าเป็นองค์กรสวัสดิการสังคม
		}elseif($CI->session->userdata('act_welfare_comm_id') > 0){
			
			$data['rs'] = $this->ado->GetRow("SELECT * FROM ACT_WELFARE_COMM WHERE ID='".@$CI->session->userdata('act_welfare_comm_id')."'");
			dbConvert($data['rs']);
			
			if(empty($data['rs']['id'])) {
				set_notify('error', 'ไม่พบข้อมูลองค์กรของผู้ใช้งานนี้ กรุณาติดต่อผู้ดูแลระบบ');
				redirect('');
			}
			
			// เอกสารหลักฐาน มาเพื่อประกอบการพิจารณา
			$data['doc'] = $this->ado->GetArray("SELECT * FROM ACT_WELFARE_COMM_DOC WHERE ACT_WELFARE_COMM_ID = ".$data['rs']['id']);
			dbConvert($data['doc']);
			
			// ผู้ประสานงานองค์กร
			$data['coordinate'] = $this->ado->GetArray("SELECT * FROM ACT_WELFARE_COMM_COORDINATE WHERE ACT_WELFARE_COMM_ID = ".$data['rs']['id']);
			dbConvert($data['coordinate']);
			
			// ที่ปรึกษา
			$data['adviser'] = $this->ado->GetArray("SELECT * FROM ACT_WELFARE_COMM_ADVISER WHERE ACT_WELFARE_COMM_ID = ".$data['rs']['id']);
			dbConvert($data['adviser']);
			
			// บริการสวัสดิการที่จัดให้แก่สมาชิก
			$data['service'] = $this->ado->GetArray("SELECT * FROM ACT_WELFARE_COMM_SERVICE WHERE ACT_WELFARE_COMM_ID = ".$data['rs']['id']);
			dbConvert($data['service']);
			
			$data['pcommunity_select'] = $this->ado->GetArray("SELECT * FROM ACT_WELFARE_COMM_SUB where question_name = 'ProcessCommunity' and act_welfare_comm_id = ".$data['rs']['id']);
			dbConvert($data['pcommunity_select']);
			
			// ลักษณะการดำเนินการองค์กร 
			$data['pcommunities'] = new Act_process_community();
			$data['pcommunities']->order_by('seq asc')->get();
			
			// สถานะการจดทะเบียน (#Tab2)
			$data['status'] = $this->ado->GetArray("SELECT * FROM ACT_COMM_STATUS WHERE ACT_WELFARE_COMM_ID = ".$data['rs']['id']." ORDER BY ID ASC");
			dbConvert($data['status']);
		}
		
		set_notify('success', 'ยินดีต้อนรับเข้าสู่ระบบ');
		$this->template->build('member',$data);
	}
	
	function community_save_update(){
		putenv("NLS_LANG=AMERICAN_AMERICA.TH8TISASCII");
		array_walk($_POST,'dbConvert','TIS-620');
		$this->load->library('adodb');
		// $this->ado->debug = true;
		if($_POST){
			$service = new Act_service();
			// แผนที่ตั้งของสำนักงานใหญ่
			if($_FILES["UploadFile"]["error"] != 4){
				$_POST['filemap']=isset($_FILES["UploadFile"])!='' ? $service->upload($_FILES['UploadFile'],'uploads/welfare_community/map/') : @$_POST['hdfilemap'];
				$_POST['filemap'] = base_url().'uploads/welfare_community/map/'.$_POST['filemap'];
		    }else{
				$_POST['filemap'] = @$_POST['hdfilemap'];
		    }
			
			// แผนที่ตั้งของสำนักงานสาขา
			if($_FILES["UploadFile2"]["error"] != 4){
				$_POST['b_filemap']=isset($_FILES["UploadFile2"])!='' ? $service->upload($_FILES['UploadFile2'],'uploads/welfare_community/map/') : @$_POST['hdfilemap2'];
				$_POST['b_filemap'] = base_url().'uploads/welfare_community/map/'.$_POST['b_filemap'];
		    }else{
				$_POST['b_filemap'] = @$_POST['hdfilemap2'];
		    }
			
			if(@$_POST['id'] == ''){
				$_POST['id'] = $this->ado->GetOne('(SELECT MAX(ID)+1 FROM ACT_WELFARE_COMM)');
				$_POST['id'] = $_POST['id'] == "" ? "1" : $_POST['id'];
				$this->ado->AutoExecute('ACT_WELFARE_COMM',$_POST,'INSERT');
			}else{
				$this->ado->AutoExecute('ACT_WELFARE_COMM',$_POST,'UPDATE','id = '.$_POST['id']);
			} 
			
			// ผู้ประสานงานองค์กร
			$this->ado->Execute('DELETE FROM ACT_WELFARE_COMM_COORDINATE WHERE ACT_WELFARE_COMM_ID = '.$_POST['id']);
			if(@is_array($_POST['c_name'])){
				foreach($_POST['c_name'] as $key=>$item){
					if($item != ""){
						$record["id"] = $this->ado->GetOne('(SELECT MAX(ID)+1 FROM ACT_WELFARE_COMM_COORDINATE)');
						$record['id'] = $record['id'] == "" ? "1" : $record['id'];
						$record["act_welfare_comm_id"] = $_POST['id'];
						$record["name"] = $item;
						$record["surname"] = $_POST['c_surname'][$key];
						$record["education"] = $_POST['c_education'][$key];
						$record["experience"] = $_POST['c_experience'][$key];
						$record["location"] = $_POST['c_location'][$key];
						$record["address"] = $_POST['c_address'][$key];
						$record["tel"] = $_POST['c_tel'][$key];
						$record["fax"] = $_POST['c_fax'][$key];
						$record["mobile"] = $_POST['c_mobile'][$key];
						$record["email"] = $_POST['c_email'][$key];
						
						$this->ado->AutoExecute('ACT_WELFARE_COMM_COORDINATE',$record,'INSERT');
					}
				}
			}
			
			// ที่ปรึกษา
			$this->ado->Execute('DELETE FROM ACT_WELFARE_COMM_ADVISER WHERE ACT_WELFARE_COMM_ID = '.$_POST['id']);
			if(@is_array($_POST['a_name'])){
				foreach($_POST['a_name'] as $key=>$item){
					if($item != ""){
						$record["id"] = $this->ado->GetOne('(SELECT MAX(ID)+1 FROM ACT_WELFARE_COMM_ADVISER)');
						$record['id'] = $record['id'] == "" ? "1" : $record['id'];
						$record["act_welfare_comm_id"] = $_POST['id'];
						$record["name"] = $item;
						$record["surname"] = $_POST['a_surname'][$key];
						$record["education"] = $_POST['a_education'][$key];
						$record["experience"] = $_POST['a_experience'][$key];
						$record["location"] = $_POST['a_location'][$key];
						$record["address"] = $_POST['a_address'][$key];
						$record["tel"] = $_POST['a_tel'][$key];
						$record["fax"] = $_POST['a_fax'][$key];
						$record["mobile"] = $_POST['a_mobile'][$key];
						$record["email"] = $_POST['a_email'][$key];
						
						$this->ado->AutoExecute('ACT_WELFARE_COMM_ADVISER',$record,'INSERT');
					}
				}
			}
			
			// บริการสวัสดิการที่จัดให้แก่สมาชิก
			$this->ado->Execute('DELETE FROM ACT_WELFARE_COMM_SERVICE WHERE ACT_WELFARE_COMM_ID = '.$_POST['id']);
			if(@is_array($_POST['m_target'])){
				foreach($_POST['m_target'] as $key=>$item){
					if($item != ""){
						
						$record["id"] = $this->ado->GetOne('(SELECT MAX(ID)+1 FROM ACT_WELFARE_COMM_SERVICE)');
						$record['id'] = $record['id'] == "" ? "1" : $record['id'];
						$record["act_welfare_comm_id"] = $_POST['id'];
						$record["target"] = $item;
						$record["receive"] = $_POST['m_receive'][$key];
						$record["condition"] = $_POST['m_condition'][$key];
						$record["other"] = $_POST['m_other'][$key];
						
						$this->ado->AutoExecute('ACT_WELFARE_COMM_SERVICE',$record,'INSERT');
					}
				}
			}
			
			// เอกสารหลักฐาน มาเพื่อประกอบการพิจารณา
			// $this->ado->Execute('DELETE FROM ACT_WELFARE_COMM_DOC WHERE ACT_WELFARE_COMM_ID = '.$_POST['id']);
			fix_file($_FILES['filesToUpload']);
			foreach($_FILES['filesToUpload'] as $key => $item)
			{
				if($item)
				{
					if($_FILES['filesToUpload'][$key]['name'])
					{
						$files = $service->upload($_FILES['filesToUpload'][$key],'uploads/welfare_community/doc/');
						
						$record["id"] = $this->ado->GetOne('(SELECT MAX(ID)+1 FROM ACT_WELFARE_COMM_DOC)');
						$record['id'] = $record['id'] == "" ? "1" : $record['id'];
						$record["act_welfare_comm_id"] = $_POST['id'];
						$record["files"] = base_url().'uploads/welfare_community/doc/'.$files;
						$record["storage"] = 'fund02';
						
						$this->ado->AutoExecute('ACT_WELFARE_COMM_DOC',$record,'INSERT');
					}		
				}
			}

			// อื่นๆ
			$this->ado->Execute('DELETE FROM ACT_WELFARE_COMM_SUB WHERE ACT_WELFARE_COMM_ID = '.$_POST['id']);
			if(@is_array($_POST['answer_id'])){
				foreach($_POST['answer_id'] as $key=>$item){
					$record["id"] = $this->ado->GetOne('(SELECT MAX(ID)+1 FROM ACT_WELFARE_COMM_SUB)');
					$record['id'] = $record['id'] == "" ? "1" : $record['id'];
					$record["act_welfare_comm_id"] = $_POST['id'];
					$record["question_name"] = @$_POST['question_name'][$key];
					$record["answer_id"] = $item;
					$record["other"] = $_POST['other'][$key];
					
					$this->ado->AutoExecute('ACT_WELFARE_COMM_SUB',$record,'INSERT');
				}
			}
			
			set_notify('success', 'บันทึกข้อมูลเรียบร้อย');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	function benefit_save_update(){
		putenv("NLS_LANG=AMERICAN_AMERICA.TH8TISASCII");
		array_walk($_POST,'dbConvert','TIS-620');
		$this->load->library('adodb');
		// $this->ado->debug = true;
		if($_POST){
			
			$service = new Act_service();
			// แผนที่ตั้งของสำนักงานใหญ่
			if($_FILES["UploadFile"]["error"] != 4){
				$_POST['filemap']=isset($_FILES["UploadFile"])!='' ? $service->upload($_FILES['UploadFile'],'uploads/welfare_benefit/map/') : @$_POST['hdfilemap'];
				$_POST['filemap'] = base_url().'uploads/welfare_benefit/map/'.$_POST['filemap'];
		    }else{
				$_POST['filemap'] = @$_POST['hdfilemap'];
		    }
			
			// แผนที่ตั้งของสำนักงานสาขา
			if($_FILES["UploadFile2"]["error"] != 4){
				$_POST['b_filemap']=isset($_FILES["UploadFile2"])!='' ? $service->upload($_FILES['UploadFile2'],'uploads/welfare_benefit/map/') : @$_POST['hdfilemap2'];
				$_POST['b_filemap'] = base_url().'uploads/welfare_benefit/map/'.$_POST['b_filemap'];
		    }else{
				$_POST['b_filemap'] = @$_POST['hdfilemap2'];
		    }
			
			if(@$_POST['id'] == ''){
				$_POST['id'] = $this->ado->GetOne('(SELECT MAX(ID)+1 FROM ACT_WELFARE_BENEFIT)');
				$_POST['id'] = $_POST['id'] == "" ? "1" : $_POST['id'];
				$this->ado->AutoExecute('ACT_WELFARE_BENEFIT',$_POST,'INSERT');
			}else{
				$this->ado->AutoExecute('ACT_WELFARE_BENEFIT',$_POST,'UPDATE','id = '.$_POST['id']);
			}
			
			// ที่ปรึกษา
			$this->ado->Execute('DELETE FROM ACT_WELFARE_BENEFIT_ADVISER WHERE ACT_WELFARE_BENEFIT_ID = '.$_POST['id']);
			if(@is_array($_POST['a_name'])){
				foreach($_POST['a_name'] as $key=>$item){
					if($item != ""){
						$record["id"] = $this->ado->GetOne('(SELECT MAX(ID)+1 FROM ACT_WELFARE_BENEFIT_ADVISER)');
						$record['id'] = $record['id'] == "" ? "1" : $record['id'];
						$record["act_welfare_benefit_id"] = $_POST['id'];
						$record["name"] = $item;
						$record["surname"] = $_POST['a_surname'][$key];
						$record["education"] = $_POST['a_education'][$key];
						$record["experience"] = $_POST['a_experience'][$key];
						$record["location"] = $_POST['a_location'][$key];
						$record["address"] = $_POST['a_address'][$key];
						$record["tel"] = $_POST['a_tel'][$key];
						$record["fax"] = $_POST['a_fax'][$key];
						$record["mobile"] = $_POST['a_mobile'][$key];
						$record["email"] = $_POST['a_email'][$key];
						
						$this->ado->AutoExecute('ACT_WELFARE_BENEFIT_ADVISER',$record,'INSERT');
					}
				}
			}
			
			// พื้นที่ปฎิบัติงาน
			$this->ado->Execute('DELETE FROM ACT_WELFARE_BENEFIT_LOCATION WHERE ACT_WELFARE_BENEFIT_ID = '.$_POST['id']);
			if(@is_array($_POST['location_type'])){
				foreach($_POST['location_type'] as $key=>$item){
					if($item != ""){
						$record["id"] = $this->ado->GetOne('(SELECT MAX(ID)+1 FROM ACT_WELFARE_BENEFIT_LOCATION)');
						$record['id'] = $record['id'] == "" ? "1" : $record['id'];
						$record["act_welfare_benefit_id"] = $_POST['id'];
						$record["type"] = $_POST['location_type'][$key];
						$record["province_code"] = $_POST['location_province'][$key];
						$record["ampor_code"] = $_POST['location_ampor'][$key];
						$record["tumbon_code"] = $_POST['location_tumbon'][$key];
						$record["mooban"] = $_POST['location_mooban_text'][$key];
						$record["province"] = $_POST['location_province_text'][$key];
						$record["ampor"] = $_POST['location_ampor_text'][$key];
						$record["tumbon"] = $_POST['location_tumbon_text'][$key];
						
						$this->ado->AutoExecute('ACT_WELFARE_BENEFIT_LOCATION',$record,'INSERT');
					}
				}
			}
			
			// เอกสารหลักฐาน มาเพื่อประกอบการพิจารณา
			fix_file($_FILES['filesToUpload']);
			foreach($_FILES['filesToUpload'] as $key => $item)
			{
				if($item)
				{
					if($_FILES['filesToUpload'][$key]['name'])
					{
						$files = $service->upload($_FILES['filesToUpload'][$key],'uploads/welfare_benefit/doc/');
						
						$record["id"] = $this->ado->GetOne('(SELECT MAX(ID)+1 FROM ACT_WELFARE_BENEFIT_DOC)');
						$record['id'] = $record['id'] == "" ? "1" : $record['id'];
						$record["act_welfare_benefit_id"] = $_POST['id'];
						$record["files"] = base_url().'uploads/welfare_benefit/doc/'.$files;
						$record["storage"] = 'fund02';
						
						$this->ado->AutoExecute('ACT_WELFARE_BENEFIT_DOC',$record,'INSERT');
					}		
				}
			}
			
			// อื่นๆ
			$this->ado->Execute('DELETE FROM ACT_WELFARE_BENEFIT_SUB WHERE ACT_WELFARE_BENEFIT_ID = '.$_POST['id']);
			if(@is_array($_POST['answer_id'])){
				foreach($_POST['answer_id'] as $key=>$item){
					$record["id"] = $this->ado->GetOne('(SELECT MAX(ID)+1 FROM ACT_WELFARE_BENEFIT_SUB)');
					$record['id'] = $record['id'] == "" ? "1" : $record['id'];
					$record["act_welfare_benefit_id"] = $_POST['id'];
					$record["question_name"] = @$_POST['question_name'][$key];
					$record["answer_id"] = $item;
					$record["other"] = $_POST['other'][$key];
					
					$this->ado->AutoExecute('ACT_WELFARE_BENEFIT_SUB',$record,'INSERT');
				}
			}
			
			set_notify('success', 'บันทึกข้อมูลเรียบร้อย');
		}
		redirect($_SERVER['HTTP_REFERER']);
		// redirect('home');
	}
}
?>