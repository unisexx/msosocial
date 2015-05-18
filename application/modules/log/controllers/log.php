<?php
class Log extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	
	function lists(){
		
		
		$data['rs'] = new Logs();
		$data['rs']->order_by('id desc')->get_page();
		$this->template->build('list',$data);
		
		
	}
	

	function statvisits(){
		
			   // log visiwebsite ==============================
			   $timestart=time(); 
			   $d=date('Y-m-d H:i:s');
			   $remote=getenv("REMOTE_ADDR");
			   $refer=@$_SERVER['HTTP_REFERER'];
			   $browser=$_SERVER['HTTP_USER_AGENT'];
			   $cook_nm='G';
			   
			   	$strSQL = " SELECT logdate FROM sitelog Order by id desc LIMIT 0,1";
				$objQuery = $this->db->query($strSQL);
				$objResult = $objQuery->row_array();
				$view_date = $objResult['logdate'];
				
				if($view_date!="")
				{
					$hours = 0.1;  // 5 minute
                    if (date($view_date, time() + 3600 * $hours)>4)
                    {
                      
																
						$rs = new Logs();
			
						$rs->logtime = $timestart;
						$rs->logdate = $d;
						$rs->ip = $remote;
						$rs->refer = $refer;
						$rs->browser = $browser;
						$rs->username = $cook_nm;
						
						$rs->save();
						
						
                    }
				
				}

				// save log visitwebsite ================================
				
				
				
				$strSQL = " SELECT DATE FROM counter LIMIT 0,1";
				$objQuery = $this->db->query($strSQL);
				$objResult = $objQuery->row_array();

				if($objResult["DATE"] != date("Y-m-d"))
				{
					
					$strSQL = " INSERT INTO daily (DATE,NUM) SELECT '".date('Y-m-d',strtotime("-1 day"))."',COUNT(*) AS intYesterday FROM  counter WHERE 1 AND DATE = '".date('Y-m-d',strtotime("-1 day"))."'";
				
					$this->db->query($strSQL);
					
					$strSQL = " DELETE FROM counter WHERE DATE != '".date("Y-m-d")."' ";
		
					$this->db->query($strSQL);
					
				}
				$strSQL = " INSERT INTO counter (DATE,IP) VALUES ('".date("Y-m-d")."','".$_SERVER["REMOTE_ADDR"]."') ";
				
				$this->db->query($strSQL);
				
				$strSQL = " SELECT COUNT(DATE) AS CounterToday FROM counter WHERE DATE = '".date("Y-m-d")."' ";
				$objQuery = $this->db->query($strSQL);
				$objResult = $objQuery->row_array();
				$strToday = $objResult["CounterToday"];
				
				
				$strSQL = " SELECT SUM(NUM) AS CountMonth FROM daily WHERE DATE_FORMAT(DATE,'%Y-%m')  = '".date('Y-m')."' ";
				$objQuery =  $this->db->query($strSQL);
				$objResult = $objQuery->row_array();
				$strThisMonth = $objResult["CountMonth"];
				
				
				$strSQL = " SELECT SUM(NUM) AS CountYear FROM daily WHERE DATE_FORMAT(DATE,'%Y')  = '".date('Y')."' ";
				$objQuery =  $this->db->query($strSQL);
				$objResult = $objQuery->row_array();
				$strThisYear = $objResult["CountYear"];
				
				$strSQL = " SELECT SUM(NUM) AS CountYear FROM daily WHERE DATE_FORMAT(DATE,'%Y')  = '".date('Y',strtotime("-1 year"))."' ";
				$objQuery = $this->db->query($strSQL);
				$objResult = $objQuery->row_array();
				$strLastYear = $objResult["CountYear"];
				
				$strSQL = " SELECT * FROM daily ORDER BY DATE ASC";
				$objQuery = $this->db->query($strSQL);
				$objResult = $objQuery->row_array();
				$strbeginDate = $objResult["DATE"];
				
				
				$strSQL = " SELECT * FROM sitelog ORDER BY id ASC";
				$objQuery = $this->db->query($strSQL);
				
				$AllData = $objQuery->num_rows(); 
				

				   $data['beginip'] = $strbeginDate;
				   $data['todayip'] = $strToday;
				   $data['monthip'] = $strThisMonth;
				   $data['yearip'] = $strThisYear;
				   
				   $data['allip'] = $AllData;
				

			  $this->load->view('home_footer',$data);
		
	}
	
}
?>