<?php
class Welfare extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['rs'] = new Welfares();
		$data['rs']->where('module = "'.$_GET['module'].'"')->order_by('id','desc')->get();
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['rs'] = new Welfares($id);
		$this->template->build('admin/form',$data);
	}
	
	function save($id=false){
        if($_POST)
        {
            $rs = new Welfares($id);
            if($_FILES['image']['name'])
            {
                if($rs->id){
                    $rs->delete_file($rs->id,'uploads/info','image');
                }
                $_POST['image'] = $rs->upload($_FILES['image'],'uploads/info/',139,96);
            }
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
/*			if(!$id)$_POST['status'] = "approve";
			$_POST['slug'] = clean_url($_POST['title']);*/

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
			$content = new Welfares($id);
			$content->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
		
	}
	
	function approve($id){
        if($_POST)
        {
            $rs = new Welfares($id);
            $rs->from_array($_POST);
            $rs->save();
        }

    }
}
?>