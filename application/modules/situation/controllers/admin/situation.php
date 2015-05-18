<?php
class Situation extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['rs'] = new Situations();
		$data['rs']->where('module = "'.$_GET['module'].'" and category = "'.$_GET['category'].'"')->order_by('id desc')->get();
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['rs'] = new Situations($id);
		//$data['rs']->where('module = "'.$_GET['module'].'" and category = "'.$_GET['category'].'"')->get(1);
		$this->template->build('admin/form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$content = new Situations($id);
            $_POST['slug'] = clean_url($_POST['title']);
			$_POST['status'] = "approve";
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			if(@$_FILES['image']['name'])
			{
				if($id)$content->delete_file($content->id,'uploads/book/thumbnail','image',115,162);
				$content->image = $book->upload($_FILES['image'],'uploads/book/');
			}
			$content->from_array($_POST);
			$content->save();
			set_notify('success', lang('save_data_complete'));
		}
		//redirect($_POST['current']);
		
		 redirect($_POST['referer']);
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$content = new Situations($id);
			$_POST['approve_id'] = $this->session->userdata('id');
			$content->from_array($_POST);
			$content->save();
			$content->check_last_query();
			print_r($_POST);
		}

	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$content = new Situations($id);
			$content->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	function save_orderlist($id=FALSE){
        if($_POST)
        {
                foreach($_POST['orderlist'] as $key => $item)
                {
                    if($item)
                    {
                        $content = new Situations(@$_POST['orderid'][$key]);
                        $content->from_array(array('orderlist' => $item));
                        $content->save();
                    }
                }
            set_notify('success', lang('save_data_complete'));
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
	
	function report()
	{
		$data['rs'] = new Situations();
		$data['rs']->where('module = "'.$_GET['module'].'" and category = "'.$_GET['category'].'"')->get();
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/report',$data);
	}
	
	function report_form($id=FALSE)
	{
		$data['rs'] = new Situations($id);
		$this->template->build('admin/form',$data);
	}
	
	
}
?>