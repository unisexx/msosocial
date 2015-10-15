<?php
class Fund extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function report_contact(){
		$CI =& get_instance();
		putenv("NLS_LANG=AMERICAN_AMERICA.TH8TISASCII");
		array_walk($_POST,'dbConvert','TIS-620');
		$this->load->library('adodb');
		// $this->ado->debug = true;
		
		if($_GET['contact_type'] == 1){
			// กองทุนคุ้มครองเด็ก รายโครงการ
			$sql = "select 
				fund_projectsupport.* 
				,CASE WHEN fund_projectsupport.welfare_type = 1 THEN AWB.organ_name
					WHEN fund_projectsupport.welfare_type = 2 THEN awc.organ_name
					END organization
				,FUND_PROJECT_SUPPORT_RESULT.appoved_id
				,fund_project_support_result.date_appoved
				,fund_project_contract.status contract_status
			from (
						select 
							FUND_PROJECTSUPPORT.*,
							(
								select ap_id from (
									select 
										FUND_PROJECT_SUPPORT_RESULT.fund_project_support_id id
										, FUND_PROJECT_SUPPORT_RESULT.id ap_id 	
									from FUND_PROJECT_SUPPORT_RESULT
										left join fund_projectsupport on fund_project_support_result.fund_project_support_id = fund_projectsupport.id
									where 
										(
											fund_projectsupport.central_check = 1 
											and FUND_PROJECT_SUPPORT_RESULT.result_type = 2 
										) or (
											fund_projectsupport.central_check != 1 
											and FUND_PROJECT_SUPPORT_RESULT.result_type = 3
										)
										
									order by DATE_APPOVED desc, time DESC
								)
								where rownum = 1
									and id = FUND_PROJECTSUPPORT.id
							) fpsr_id
						from FUND_PROJECTSUPPORT
					) fund_projectsupport
						left join act_welfare_benefit awb on fund_projectsupport.welfare_id = awb.id
						left join ACT_WELFARE_COMM awc on fund_projectsupport.welfare_id = awc.id
						left join FUND_PROJECT_SUPPORT_RESULT on FUND_PROJECT_SUPPORT_RESULT.id = fund_projectsupport.fpsr_id
						left join fund_project_contract on fund_projectsupport.id = fund_project_contract.fund_projectsupport_id
			where 
				(FUND_PROJECT_SUPPORT_RESULT.appoved_id = 2
				or FUND_PROJECT_SUPPORT_RESULT.appoved_id = 3) ";
	
			// if($data['is_central'] == 0) {
				// $province = $this->province->get_row("wprovince_id", login_data('workgroup_provinceid'));
				// $sql .= " and fund_projectsupport.province_id = '".$province['id']."' and (fund_projectsupport.central_check = 0 or fund_projectsupport.central_check is null)";
			// }
		
		}elseif($_GET['contact_type'] == 2){
			// กองทุนส่งเสริมการจัดสวัสดิการสังคม
			$sql = "select 
						wc.*, 
						w.id as w_id,
						w.agency_name as w_agency_name,
						w.project_name as w_project_name,
						w.project_system_name,
						w.approve_amount as w_approve_amount
					from FUND_WELFARE w
					left join fund_welfare_contract wc on wc.welfare_id = w.id ";
	
			$sql .= ' LEFT JOIN FUND_PROVINCE ON FUND_PROVINCE.ID = w.PROVINCE_ID';
	
			$sql .= " where w.PRE_STATUS = '3' and ( w.COMMIT_STATUS = '1' or w.COMMIT_STATUS = '2') ";
	
			// if(permission('fund/welfare/getlist', 'action_extra1')) {
				$sql .= " AND w.WEB_FORM = 0 ";
			// } else {
				// $sql .= " AND FUND_PROVINCE.WPROVINCE_ID = '".login_data("WORKGROUP_PROVINCEID")."'";
			// }
			
			if (!empty($_GET['src_text'])) {
				$sql .= " AND w.PROJECT_NAME LIKE '%".$_GET["src_text"]."%' ";
				$sql .= " AND wc.contract_no LIKE '%".$_GET["src_text"]."%' ";
				$sql .= " AND w.BUDGET LIKE '%".$_GET["src_text"]."%' ";
			}
	
			if (!empty($_GET['src_project_system'])) {
				$sql .= " AND w.project_system = '".$_GET["src_project_system"]."' ";
			}
	
			if (!empty($_GET['src_dept'])) {
				$sql .= " AND wc.DEPT_ID = '".$_GET["src_dept"]."' ";
			}
	
			if (!empty($_GET['src_date'])) {
				$sql .= " AND wc.contract_date = '".$_GET["src_date"]."' ";
			}
			
			$sql .= " order by w.id desc ";
	
			// นับจำนวนแต่ละสถานนะ //
			$sql_count = "SELECT 
								count(CASE WHEN id is not null  THEN 1 ELSE null END) as count_normal,
								count(CASE WHEN id is null THEN 1 ELSE null END) as count_wait
							FROM
							(".$sql.")";
		}elseif($_GET['contact_type'] == 3){
			// กองทุนเพื่อการป้องกันและปราบปรามการค้ามนุษย์รายโครงการ
			$date_chk = date('d');
		
		
			if ($date_chk == '1') {
				$date_sql = date('Y-m-02', strtotime('-1 month')); // ลบ 1 เดือนเพื่อให้เป็นเดือนก่อน
			} else {
				$date_sql = date('Y-m-02');
			}

			$sql = "select
						 CASE 
						WHEN CAST (
						 (
						  DATE_START - ADD_MONTHS (
						   TO_DATE (
						    '".$date_sql." 00:00:00',
						    'YYYY-MM-DD HH24:MI:SS'
						   ),
						   1
						  )
						 ) AS INTEGER
						) < 0 THEN
						 9999999
						ELSE
						 CAST (
						  (
						   DATE_START - ADD_MONTHS (
						    TO_DATE (
						     '".$date_sql." 00:00:00',
						     'YYYY-MM-DD HH24:MI:SS'
						    ),
						    1
						   )
						  ) AS INTEGER
						 )
						END AS date_show, 
						
						CASE 
						WHEN CAST (
						 (
						  DATE_END - ADD_MONTHS (
						   TO_DATE (
						    '".$date_sql." 00:00:00',
						    'YYYY-MM-DD HH24:MI:SS'
						   ),
						   1
						  )
						 ) AS INTEGER
						) < 0 THEN
						 9999999
						ELSE
						 CAST (
						  (
						   DATE_END - ADD_MONTHS (
						    TO_DATE (
						     '".$date_sql." 00:00:00',
						     'YYYY-MM-DD HH24:MI:SS'
						    ),
						    1
						   )
						  ) AS INTEGER
						 )
						END AS date_end_show,
						
						pj.project_name as pj_project_name,
						pj.contract_id as pj_contract_id,
						pj.agency_name as pj_agency_name,
						pj.id as pj_id,
						pj_c.id as id,
						pj_c.contract_no,
						pj_c.contract_budget_year,
						pj_c.agency_name,
						pj_c.project_name,
						pj_c.contract_date,
						pj_c.budget,
						pj_c.month_start,
						pj_c.year_start,
						pj_c.month_end,
						pj_c.year_end,
						pj_c.alert_status_before,
						pj_c.alert_status_after,
						pj_c.track_id,
						pj_commit.approve_amount,
						pj.budget_total
						
					from FUND_TRAFFICKING_PROJECT pj 
					left join FUND_TRAFFICKING_PJ_CONTRACT pj_c on PJ.id = PJ_C.project_id
					left join FUND_TRAFFICKING_PJ_COMMIT pj_commit on pj.id = pj_commit.fund_trafficking_project_id and pj_commit.status = '1' 
					where pj.commit_status = '1'";
		
		
			if (@$_GET['src_alert_status'] == '1') {
				$sql .= (empty($date_sql))?" AND pj_c.ALERT_STATUS_BEFORE = '1' ":" AND pj_c.ALERT_STATUS_BEFORE = '1' AND ( DATE_START - ADD_MONTHS ( TO_DATE ('".$date_sql." 00:00:00', 'YYYY-MM-DD HH24:MI:SS'), 1)) = '0' ";
			} else if (@$_GET['src_alert_status'] == '2') {
				$sql .= (empty($date_sql))?" AND pj_c.ALERT_STATUS_AFTER = '1' ":" AND pj_c.ALERT_STATUS_AFTER = '1' AND ( DATE_END - ADD_MONTHS ( TO_DATE ('".$date_sql." 00:00:00', 'YYYY-MM-DD HH24:MI:SS'), 1)) = '0' ";
			} else if (@$_GET['src_alert_status'] == '3') {
				$sql .= " AND pj_c.ALERT_STATUS_BEFORE = '0' AND pj_c.ALERT_STATUS_AFTER = '0' ";
			} else if (@$_GET['src_alert_status'] == '4') {
				$sql .= " AND pj_c.id is null ";
			}
			
			if (!empty($_GET['src_text'])) {
				$sql .= " AND pj_c.PROJECT_NAME LIKE '%".$_GET["src_text"]."%' ";
				$sql .= " AND pj.PROJECT_NAME LIKE '%".$_GET["src_text"]."%' ";
				$sql .= " AND pj_c.contract_no LIKE '%".$_GET["src_text"]."%' ";
				$sql .= " AND pj_c.BUDGET LIKE '%".$_GET["src_text"]."%' ";
			}
			
			if (!empty($_GET['p'])) {
				$sql .= " AND pj_c.PJ_DEPT_ID = '".$_GET["p"]."' ";
			}
			
			if (!empty($_GET['src_date'])) {
				$sql .= " AND pj_c.src_date = '".$_GET["src_date"]."' ";
			}
			
			if ($date_chk >= '15' || $date_chk == '1') {
				$sql .= " order by date_show asc, date_end_show asc, pj_c.id desc";
			} else {
				$sql .= " order by pj_c.id desc";
			}
			
			// นับจำนวนแต่ละสถานนะ //
			$sql_count = "SELECT 
				count(CASE WHEN date_show = 0 THEN 1 ELSE null END) as count_alert_status_before, 
				count(CASE WHEN date_end_show = 0 THEN 1 ELSE null END) as count_alert_status_after,
				count(CASE WHEN date_show != 0 AND date_end_show != 0 AND id is not null  THEN 1 ELSE null END) as count_normal,
				count(CASE WHEN id is null THEN 1 ELSE null END) as count_wait
			FROM
			(".$sql.")";
			
			// $data["status_count"] = $this->db->getrow($sql_count);
			// dbConvert($data["status_count"]);
			// นับจำนวนแต่ละสถานนะ //
			// echo $sql;
			
		}// endif

			
			$data['variable'] = $this->ado->GetArray($sql);
			dbConvert($data['variable']);
				
			$this->template->build('report_contact',$data);
	}
	
	
	function report_result(){
		$CI =& get_instance();
		putenv("NLS_LANG=AMERICAN_AMERICA.TH8TISASCII");
		array_walk($_POST,'dbConvert','TIS-620');
		$this->load->library('adodb');
		
		if($_GET['result_type'] == 1){
			// กองทุนคุ้มครองเด็กรายบุคคล
			$where = " 1=1 ";
		
			// if(@$_GET["keyword"]) {
				// $where .= " AND (FRS.FUND_CHILD_NAME LIKE '%".$_GET["keyword"]."%' OR FRS.FUND_REG_PERSONAL_NAME LIKE '%".$_GET["keyword"]."%')";
			// }
// 			
			// if(@$_GET["y"]) {
				// $where .= " AND FRS.YEAR_BUDGET = ".$_GET["y"];
			// }
// 			
// 			
			// if(@$_GET["s"]!=null) {
				// $where .= " AND FRS.STATUS = ".$_GET["s"];
			// }
// 			
			// if(login_data("divisionid")==105) {
				// $where .= " AND FP.WPROVINCE_ID = ".login_data("WORKGROUP_PROVINCEID");
			// } else {
				// if(@$_GET["p"]) {
					// $where .= " AND FRS.PROVINCE_ID = ".$_GET["p"];
				// }
			// }
			
			$sql = "SELECT FRS.*,FP.TITLE PROVINCE_TITLE FROM FUND_REQUEST_SUPPORT FRS INNER JOIN FUND_PROVINCE FP ON FRS.PROVINCE_ID = FP.ID WHERE ".$where." ORDER BY STATUS ASC";
		}elseif($_GET['result_type'] == 2){
			// กองทุนคุ้มครองเด็กรายโครงการ
			$data['appoved_title1'] = array(
				'1'=>'เห็นชอบ',
				'2'=>'เห็นชอบในหลักการ',
				'3'=>'ขอรายละเอียดเพิ่มเติม',
				'4'=>'ไม่เห็นชอบ',
			);
			$data['appoved_title2'] = array(
				'1'=>'อนุมัติ',
				'2'=>'อนุมัติในหลักการ',
				'3'=>'ขอรายละเอียดเพิ่มเติม',
				'4'=>'ไม่อนุมัติ',
			);
			$data['appoved_title3'] = array(
				'1'=>'อนุมัติ',
				'2'=>'อนุมัติในหลักการ',
				'3'=>'ขอรายละเอียดเพิ่มเติม',
				'4'=>'ไม่อนุมัติ',
				'5'=>'ส่งเข้าพิจารณาในระบบปกติ (ส่วนกลาง)'
			);
	
	
			$sql = "select
					fund_projectsupport.* 
					,CASE WHEN fund_projectsupport.welfare_type = 1 THEN AWB.organ_name
						WHEN FUND_PROJECTSUPPORT.welfare_type = 2 THEN awc.organ_name
						END welfare_tog_title
				from fund_projectsupport 
					left join act_welfare_benefit awb on fund_projectsupport.welfare_id = awb.id
					left join ACT_WELFARE_COMM awc on fund_projectsupport.welfare_id = awc.id
				where 
					fund_projectsupport.status = 3 ";
					/*web_form = 0 
					and (center_receive_date is not null or central_check = '1') */
			if (!empty($_GET['keyword'])) {
				$sql .= " and ( 
					fund_projectsupport.project_code like '%".$_GET['keyword']."%' 
					or fund_projectsupport.project_name like '%".$_GET['keyword']."%' 
					or fund_projectsupport.organization like '%".$_GET['keyword']."%' 
				) ";
			}
			
			// if(login_data('usertype') != 1) {
				// if(!permission('fund/project/project_support', 'action_extra1')) {
					// if(login_data('divisionid') == 105) {
						// $this->load->model('fund_province', 'province');
						// $tmp = $this->province->get_row("wprovince_id", login_data('workgroup_provinceid'));
						// $sql .= " and province_id = '".$tmp['id']."'";
					// }
				// }
			// }
			
		}elseif($_GET['result_type'] == 3){
			//กองทุนส่งเสริมการจัดสวัสดิการสังคม
			$select = 'FUND_WELFARE.*';
			
			$join = 'LEFT JOIN FUND_PROVINCE ON FUND_PROVINCE.ID = FUND_WELFARE.PROVINCE_ID';
			
			$where = " 1=1 ";
			
			if(@$_GET["type"]) {
				switch ($_GET["type"]) {
					case 1:
						$where .= " AND PROJECT_ID LIKE '%".$_GET["keyword"]."%'";
						break;
					case 2:
						$where .= " AND PROJECT_NAME LIKE '%".$_GET["keyword"]."%'";
						break;
					case 3:
						$where .= " AND AGENCY_NAME LIKE '%".$_GET["keyword"]."%'";
						break;
				}
			}
			
			if(@$_GET["a"]) {
				$where .= " AND AGENCY_TYPE = '".$_GET["a"]."'";
			}
			
			if(@$_GET["y"]) {
				$where .= " AND YEAR_BUDGET = '".$_GET["y"]."'";
			}
			
			if(@$_GET["p"]) {
				
				if($_GET["p"]=="c") {
					$where .= " AND CENTRAL_CHECK = 1";
				} else {
					$where .= " AND PROVINCE_ID = '".$_GET["p"]."'";
				}
			}
			
			
			// if(permission('fund/welfare/getlist', 'action_extra1')) { // ถ้าเป็นส่วนกลาง
				// // $where = " FUND_WELFARE.WEB_FORM = 0 "; // ฟอร์มที่ไม่ได้ส่งมากจากเว็บ
				// $where = " 1=1 ";
			// } else {
				// $where = " FUND_PROVINCE.WPROVINCE_ID = '".login_data("WORKGROUP_PROVINCEID")."'";
			// }
			
			// $data["variable"] = $this->fund_welfare->select($select)->join($join)->where($where)->order_by("fund_welfare.id","DESC")->get();
			
			$sql = 'select '.$select.' from FUND_WELFARE '.$join.' where '.$where.' order by fund_welfare.id desc';
			// $sql = "select FUND_WELFARE.* from FUND_WELFARE LEFT JOIN FUND_PROVINCE ON FUND_PROVINCE.ID = FUND_WELFARE.PROVINCE_ID where 1=1";
			// echo $sql;
		}elseif($_GET['result_type'] == 4){
			// กองทุนเพื่อการป้องกันและปราบปรามการค้ามนุษย์รายโครงการ
			$sql = "select *
					from FUND_TRAFFICKING_PROJECT
					where status = '2' ";
			if (!empty($_GET['src_text'])) {
				// เลือกว่าจะค้นหาจากอะไร
				switch (@$_GET["src_type"]) {
					case 1:
						$sql .= "AND PROJECT_CODE_TITLE LIKE '%".$_GET["src_text"]."%' ";
						break;
					case 2:
						$sql .= "AND PROJECT_NAME LIKE '%".$_GET["src_text"]."%' ";
						break;
					case 3:
						$sql .= "AND AGENCY_NAME LIKE '%".$_GET["src_text"]."%' ";
						break;
				}
			}
			
			if (!empty($_GET['y'])) {
				$sql .= "AND BUDGET_YEAR = '".$_GET["y"]."' ";
			}
			
			if (!empty($_GET['p'])) {
				$sql .= "AND PROVINCE_ID = '".$_GET["p"]."' ";
			}
			
			$sql .= " order by id desc";
		}elseif($_GET['result_type'] == 5){
			// กองทุนป้องกันการค้ามนุษย์ รายบุคคล
			$sql = "SELECT 
					FP.TITLE PROVINCE_TITLE,
					FT.ID,
					FT.PS_HELP_NAME,
					FT.AGE,
					FT.REQUEST_DEPT_TITLE,
					FT.CENTRAL_CHECK_STATUS,
					FT.CODE_TITLE,
					FT.STATUS,
					FT.LEADER_DATE,
					FT.STATUS_NOTE
				FROM FUND_TRAFFICKING FT
				LEFT JOIN FUND_PROVINCE FP ON FT.PROVINCE_ID = FP.ID ";
			// if (!permission('fund/trafficking/position', 'action_extra1')) { 
				// $chk_user = $this->ps_dept->where("user_id = '".login_data('id')."'")->get_row();
				// if (empty($chk_user['id'])) {
					// set_notify('error', "ท่านไม่มีข้อมูลที่หน่วยงาน");
					// redirect("fund");
				// }
				// $sql .= " where FT.REQUEST_DEPT_ID = '".$chk_user['id']."'";
			// }
			$sql .= "ORDER BY FT.ID DESC";
			// echo $sql;
		}// endif

		$data['variable'] = $this->ado->GetArray($sql);
		dbConvert($data['variable']);
			
		$this->template->build('report_result',$data);
	}
}
?>