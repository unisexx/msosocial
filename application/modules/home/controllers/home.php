<?php
class Home extends Public_Controller {

	function __construct()
	{
		parent::__construct();	
	}
	
	function index($seYear=FALSE,$seMonth=FALSE)
	{
		$this->template->set_layout('home');
		
		if($seMonth == '')$seMonth = date('m');
		if($seYear == '')$seYear = date('Y');
		
		
		$data['seYear'] = $seYear;
		$data['seMonth'] = $seMonth;
	
		
		$this->template->build('index', $data);
		
/*		include('themes/msosocial/odbc_connect.php');
		$this->load->helper('html');
		
		if(@$seMonth)
		{
			$m=$seMonth;	
			
		}else{
			$m=date('m');
		}
		
		$data[1] = 'calendar/calendar_mso_detail/1';
		
		
		$rs = $db->Execute("select * from INTRANET_ACTCALENDAR ORDER BY ID DESC");
			
						
		foreach($rs as $row)
		{
	
			dbConvert($row);
				
			$bg = "#77c705";
	
			$cat_type = $row['actcalendar_type_id'];
			$s_date = $row['startdate'];
			
			$calendar_id = $row['id'];
			$calendar_title = $row['title'];
			
			$sd = explode(" ", $s_date); 
			$sd1 = explode("-", $sd[0]); 
			
			
	
				
				if($sd1[1]==$m)
				{
				
					$data[$sd1[2]] = 'calendar/calendar_mso_detail/'.$calendar_id;
				  		
				}
				
			

		}
		
	
	$prefs = array (
       'show_next_prev'  => TRUE,
       'next_prev_url'   => 'home/index/'
    );
	
	$prefs['template'] = '
   {table_open} <table class="cal" width="95%">{/table_open}

   {heading_row_start}<tr>{/heading_row_start}

   {heading_previous_cell}<td>
   
   <span class="cal-pre"><a href="{previous_url}">&nbsp;</a></span> 
   
   </td>{/heading_previous_cell}
   

   
   {heading_title_cell}
   
   <td colspan="5" align="center">
   
   	<span class="cal-month">{heading}</span>
   
   </td>
   
   {/heading_title_cell}
   
   
   {heading_next_cell}<td>
   
     <span class="cal-next"><a href="{next_url}">&nbsp;</a></span> 
   
   </td>{/heading_next_cell}

   {heading_row_end}</tr>{/heading_row_end}

   {week_row_start}<tr>{/week_row_start}
   {week_day_cell}<th>{week_day}</th>{/week_day_cell}
   {week_row_end}</tr>{/week_row_end}

   {cal_row_start}<tr>{/cal_row_start}
   {cal_cell_start}<td>{/cal_cell_start}

   {cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
   {cal_cell_content_today}<div class="today"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

   {cal_cell_no_content}{day}{/cal_cell_no_content}
   {cal_cell_no_content_today}<div class="today">{day}</div>{/cal_cell_no_content_today}

   {cal_cell_blank}&nbsp;{/cal_cell_blank}

   {cal_cell_end}</td>{/cal_cell_end}
   {cal_row_end}</tr>{/cal_row_end}

   {table_close}</table>{/table_close}';
	
	
	
	
		$this->load->library('calendar', $prefs);
		
		$vars['rs_calendar'] = $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4), $data);
	*/
		
		//$this->template->build('index', $vars);
	
		
		
	}
	
	function show_calendar($seYear=FALSE,$seMonth=FALSE)
	{
		
			
		$m=$seMonth;	
		
		$data = array();
		
		$vars['seYear'] = $seYear;
		$vars['seMonth'] = $seMonth;
		
		$vars['seYear2'] = $seYear;
		$vars['seMonth2'] = $seMonth;
		
		$rs = new Calendars();
		
		$rs->order_by('id desc')->get();
			
						
		foreach($rs as $row)
		{
	
	
				
			$bg = "#77c705";
	
			$cat_type = $row->module;
			$s_date = $row->start_date;
			
			$calendar_id = $row->id;
			$calendar_title = $row->title;
			
			$sd = explode(" ", $s_date); 
			$sd1 = explode("-", $sd[0]); 
				
			if(@$sd1[1]==$m)
			{
			
				$data[$sd1[2]] = 'calendar/calendar_mso_detail/'.$calendar_id;
					
			}
				
			

		}
		
		
	if(count($data)==0)$data[1] = 'calendar/calendar_mso_detail/1';		
	
	$prefs = array (
       'show_next_prev'  => FALSE,
       'next_prev_url'   => 'calendar/index/'
    );
	
	$prefs['template'] = '
   {table_open} <table class="cal" width="95%">{/table_open}

   {week_row_start}<tr>{/week_row_start}
   {week_day_cell}<th>{week_day}</th>{/week_day_cell}
   {week_row_end}</tr>{/week_row_end}

   {cal_row_start}<tr>{/cal_row_start}
   {cal_cell_start}<td>{/cal_cell_start}

   {cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
   {cal_cell_content_today}<div class="today"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

   {cal_cell_no_content}{day}{/cal_cell_no_content}
   {cal_cell_no_content_today}<div class="today">{day}</div>{/cal_cell_no_content_today}

   {cal_cell_blank}&nbsp;{/cal_cell_blank}

   {cal_cell_end}</td>{/cal_cell_end}
   {cal_row_end}</tr>{/cal_row_end}

   {table_close}</table>{/table_close}';
	
	
	
	
		$this->load->library('calendar', $prefs);
		
		$vars['rs_calendar'] = $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4), $data);
			
		$this->load->view('calendar_data', $vars);	
	}
	
	function intro(){
		$this->load->view('intro');
	}
	
	public function lang($lang)
	{
		$this->load->library('user_agent');
		$this->session->set_userdata('lang',$lang);
		
		redirect($this->agent->referrer());
	}
	
	public function sitemap()
	{
		$data['categories'] = new Category();
		$data['childs'] = new Category();
		$data['categories']->where("parents = 0 and id not in (74)")->get();
		$data['num'] = ceil($data['categories']->where("parents = 0 and id not in (74)")->count()/2);
		$this->template->build('sitemap',$data);
	}
	
	function testmail(){
			$this->load->library('email');
			$this->email->from('kenku440065@gmail.com', 'Emp@FD');
			$this->email->to('pichai_preeda@hotmail.com');
			$this->email->subject('ทดสอบส่งเมล์');
			$this->email->message('ทดสอบส่งเมล์  \t\n 555+');
			$this->email->send();
			echo $this->email->print_debugger();
	}
	
	function testmail2(){
			 $message = "หวัดดีทุกคน \n";
			 $message .= "ถ้า E-mail นี้ มีข้อความในการส่งเป็น tag html ต้องแก้ไข เป็น true \n";
			 $message .= "Email ปลายทางที่เราต้องการส่ง";
			
			 $config['charset'] = 'utf-8';
			 $config['mailtype'] = 'text';
			 $config['newline'] = '\r\n';
				
			$this->load->library('email');
			$this->email->initialize($config);
			$this->email->from('unisexx@gmail.com', 'Emp@FD');
			$this->email->to('unisexx@gmail.com');
			$this->email->subject('ทดสอบส่งเมล์');
			$this->email->message($message);
			$this->email->send();
			echo $this->email->print_debugger();
	}
	
	function testmail3(){
		require_once("media/PHPMailer_v5.1/class.phpmailer.php"); // ประกาศใช้ class phpmailer กรุณาตรวจสอบ ว่าประกาศถูก path
	    $mail = new PHPMailer();
	    $mail->IsSMTP();
	    $mail->Host = 'ssl://smtp.googlemail.com';
	    $mail->Port = 465;
	    $mail->Username = 'Kpi.msociety@gmail.com';
	    $mail->Password = 'kpimsociety';
	    $mail->SMTPAuth = true;
	    $mail->CharSet = "utf-8";
	    $mail->From = "line2me.info@gmail.com";       //  account e-mail ของเราที่ใช้ในการส่งอีเมล
	    $mail->FromName = "line2me.in.th";
	    $mail->IsHTML(true);                            // ถ้า E-mail นี้ มีข้อความในการส่งเป็น tag html ต้องแก้ไข เป็น true
	    $mail->Subject = "ทดสอบหัวข้อ";            // หัวข้อที่จะส่ง
	    $mail->Body =  "ทดสอบข้อความ";                // ข้อความ ที่จะส่ง
	    $mail->SMTPDebug = 1;
	    $mail->do_debug = 0;
	    $mail->AddAddress("unisexx@gmail.com");                      // Email ปลายทางที่เราต้องการส่ง
	    $mail->send();
	    $mail->ClearAddresses();
	}
	
	function search()
	{
		$this->template->title(lang('search').' - zulex.co.th');
		$this->template->build('search');
	}
	
	function under_construction(){
		$this->template->build('under_contruction');
	}
	
	
	public function showP()
	{

		include('themes/msosocial/odbc_connect.php');
		$this->load->helper('html');

		$rs = $db->Execute("select * from WEB_NEWS order by id desc");
		
		
		foreach($rs as $row){
			
			print_r($rs);
		}
		
		
	}
	
	public function testdb()
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
	
	function infoo(){
		phpinfo();
	}
	
	
}
?>