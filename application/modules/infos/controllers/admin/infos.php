<?php
class Infos extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['rs'] = new Info();
		$data['rs']->where('module = "'.$_GET['module'].'"')->order_by('id','desc')->get();
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['rs'] = new Info($id);
		$this->template->build('admin/form',$data);
	}
	
	function save($id=false){
        if($_POST)
        {
            $rs = new Info($id);
            if($_FILES['image']['name'])
            {
                if($rs->id){
                    $rs->delete_file($rs->id,'uploads/info','image');
                }
                $_POST['image'] = $rs->upload($_FILES['image'],'uploads/info/',139,96);
            }
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			if(!$id)$_POST['status'] = "approve";
			$_POST['slug'] = clean_url($_POST['title']);
			// $_POST['start_date'] = Date2DB($_POST['start_date']);
            // $_POST['end_date'] = Date2DB($_POST['end_date']);
            $rs->from_array($_POST);
            $rs->save();
            set_notify('success', lang('save_data_complete'));
        }
        redirect($_POST['referer']);
    }
	
	function delete($id=false)
	{
		if($id)
		{
			$rs = new Info($id);
			$rs->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	function approve($id){
        if($_POST)
        {
            $rs = new Info($id);
            $rs->from_array($_POST);
            $rs->save();
        }

    }
	
	
	function xml_import()
	{
		       //load the parser library
		       $this->load->library('simplexml');
				
			   $info = new Info();
               
			   $data['title'] = 'นำเข้าไฟล์ข้อมูลจากไฟล์ XML';
			   
				$file_xml = "";   
				
				if($_FILES['file_xml']['name'])
				{
					$file_xml =$info->upload($_FILES['file_xml'],'uploads/info/',139,96);
				}
        
               $data['products'] = $this->_getXML($file_xml);
        
	           //$this->parser->parse('table_view', $data);
			   
			   
			   	$data['rs'] = new Info();
				$data['rs']->where('module = "'.$_GET['module'].'"')->order_by('id','desc')->get();
				$this->template->append_metadata(js_checkbox('approve'));
			   $this->template->build('admin/index',$data);
	}
	
	
	 function _getXML($fname)
    {

                $filename = $fname;
                $xmlfile="uploads/info/".$filename;
                $xmlRaw = file_get_contents($xmlfile);

                $this->load->library('simplexml');
                $xmlData = $this->simplexml->xml_parse($xmlRaw);

				$result = "";

                foreach($xmlData['item'] as $row)
                {

						$result .= '<tr>';
						$result .= '<td>'.$row['module'].'</td>';
						$result .= '<td>'.$row['slug'].'</td>';
						$result .= '<td>'.$row['title'].'</td>';
						$result .= '<td>'.$row['category_id'].'</td>';
						$result .= '<td>'.$row['detail'].'</td>';
						$result .= '<td>'.$row['image'].'</td>';
						$result .= '<td>'.$row['user_id'].'</td>';
						$result .= '<td>'.$row['counter'].'</td>';
						$result .= '<td>'.$row['status'].'</td>';
						$result .= '<td>'.$row['created'].'</td>';
						$result .= '<td>'.$row['updated'].'</td>';
						$result .= '<td>'.$row['start_date'].'</td>';
						$result .= '<td>'.$row['end_date'].'</td>';
						$result .= '</tr>';
						
					
						$rs = new Feeds();
			
						$rs->module = $row['module'];
						$rs->slug = $row['slug'];
						$rs->title = $row['title'];
						$rs->category_id = $row['category_id'];
						$rs->detail = $row['detail'];
						$rs->image = $row['image'];
						$rs->user_id = $row['user_id'];
						$rs->counter = $row['counter'];
						$rs->status = $row['status'];
						$rs->created = $row['created'];
						$rs->updated = $row['updated'];
						$rs->start_date = $row['start_date'];
						$rs->end_date = $row['end_date'];
						
						$rs->save();

                }
                 return $result;
        }
	
}
?>