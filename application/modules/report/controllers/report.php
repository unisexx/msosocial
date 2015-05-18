<?php
class Report extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index(){
		
		$data['all'] = new N_provinces();
		$data['all']->order_by('province_id asc')->get();
		
		$data['rs'] = new N_provinces();
		   if(@$_GET['seProvince'])$data['rs']->where("province_id = '".$_GET['seProvince']."'");
		$data['rs']->order_by('province_id asc')->get();
		$this->template->build('index',$data);
	
	}
	
	function board(){
		
		$data['all'] = new N_provinces();
		$data['all']->order_by('province_id asc')->get();
		
		$data['rs'] = new N_provinces();
		   if(@$_POST['seProvince'])$data['rs']->where("province_id = '".$_POST['seProvince']."'");
/*		   if(@$_POST['seBoard'])$data['rs']->where("province_id = '".$_POST['seBoard']."'");
		   if(@$_POST['seStatus'])$data['rs']->where("province_id = '".$_POST['seStatus']."'");*/
		$data['rs']->order_by('province_id asc')->get_page();
		$this->template->build('board',$data);
	
	}
	
	function content(){
		
		$data['all'] = new N_provinces();
		$data['all']->order_by('province_id asc')->get();
		
		$data['rs'] = new N_provinces();
		   if(@$_GET['seProvince'])$data['rs']->where("province_id = '".$_GET['seProvince']."'");
		$data['rs']->order_by('province_id asc')->get();
		$this->template->build('content',$data);
	
	}
	
	
	function agency(){
		
		$data['all'] = new N_provinces();
		$data['all']->order_by('province_id asc')->get();
		
		$data['rs'] = new N_provinces();
		   if(@$_GET['seProvince'])$data['rs']->where("province_id = '".$_GET['seProvince']."'");
		$data['rs']->order_by('province_id asc')->get();
		$this->template->build('agency',$data);
	
	}
	
	function export_excel(){
		
		if(@$_GET['type'])
		{
				$type = $_GET['type'];
				$view = "export_index";
				
				if($type==1)
				{
							$data['rs'] = new N_provinces();
							   if(@$_GET['seProvince'])$data['rs']->where("province_id = '".$_GET['seProvince']."'");
							$data['rs']->order_by('province_id asc')->get();
							$view = "export_index";
				}
				else if($type==2)
				{
							$data['rs'] = new N_provinces();
							   if(@$_GET['seProvince'])$data['rs']->where("province_id = '".$_GET['seProvince']."'");
							$data['rs']->order_by('province_id asc')->get();
							$view = "export_content";
				}
				else if($type==3)
				{
							$data['rs'] = new N_provinces();
							   if(@$_GET['seProvince'])$data['rs']->where("province_id = '".$_GET['seProvince']."'");
							$data['rs']->order_by('province_id asc')->get();
							$view = "export_agency";
				}
				
						$this->load->view($view,$data);
		}
		
		//$this->template->build('export',$data);
	
	}
	
	function ShowAmphur(){
		
		$data['rs'] = new N_amphurs();
		$data['rs']->where('province_id = "'.$_GET['province_id'].'"')->order_by('province_id asc')->get();
		$this->template->build('list',$data);
	
	}
	
	function Showtumbon(){
		
		$data['rs'] = new N_districts();
		$data['rs']->where('province_id = "'.$_GET['province_id'].'" and amphur_id="'.$_GET['amphur_id'].'"')->order_by('province_id asc')->get();
		$this->template->build('list',$data);
	
	}
	
	function view($id=false){
		$data['rs'] = new Reports($id);
		$this->template->build('view',$data);
	}

	
}
?>