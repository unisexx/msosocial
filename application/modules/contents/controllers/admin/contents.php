<?php
class Contents extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['contents'] = new Content();
        if(@$_GET['title'])$data['books']->where("title like '%".$_GET['title']."%'");
        if(@$_GET['category_id'])$data['books']->where('category_id',$_GET['category_id']);
		$data['contents']->order_by('orderlist','asc')->order_by('id','desc')->get_page();
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['content'] = new Content($id);
		$data['content']->where('module = "'.$_GET['module'].'" and category = "'.$_GET['category'].'"')->get(1);
		$this->template->build('admin/form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$content = new Content($id);
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
		redirect($_POST['current']);
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$content = new Content($id);
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
			$content = new Content($id);
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
                        $content = new Content(@$_POST['orderid'][$key]);
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
		$data['rs'] = new Content();
		$data['rs']->where('module = "'.$_GET['module'].'" and category = "'.$_GET['category'].'"')->get();
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/report',$data);
	}
	
	function report_form($id=FALSE)
	{
		$data['content'] = new Content($id);
		$this->template->build('admin/form',$data);
	}
	
	
}
?>