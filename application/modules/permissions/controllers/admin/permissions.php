<?php
class Permissions extends Admin_Controller
{
	
	public $module = array(
		'user' => array('label' => 'ผู้ใช้งาน', 'permission' => array('full')),
		'about' => array('label' => 'เกี่ยวกับเรา', 'permission' => array('full')),
		'policy' => array('label' => 'นโยบาย/แผนงาน', 'permission' => array('full')),
		'measure' => array('label' => 'มาตรการ/กลไก', 'permission' => array('full')),
		'pr' => array('label' => 'ส่งเสริม/ประสานงาน', 'permission' => array('full')),
		'standard' => array('label' => 'พัฒนา/มาตรฐาน', 'permission' => array('full')),
		'fund' => array('label' => 'บริหารกองทุน', 'permission' => array('full')),
		'asian' => array('label' => 'อาเซียน', 'permission' => array('full')),
		'news' => array('label' => 'ข้อมูลข่าวสาร', 'permission' => array('full')),
		'download' => array('label' => 'ดาวน์โหลด', 'permission' => array('full')),
		'calendar' => array('label' => 'ปฎิทินกิจกรรม', 'permission' => array('full')),
		'multimedia' => array('label' => 'สื่อมัลติมีเดีย/วีดีโอ', 'permission' => array('full')),
		'benefit' => array('label' => 'องค์กรสาธารณประโยชน์', 'permission' => array('full')),
		'community' => array('label' => 'องค์กรสวัสดิการชุมชน', 'permission' => array('full')),
		'social' => array('label' => 'นักสังคมสงเคราะห์', 'permission' => array('full')),
		'agency' => array('label' => 'หน่วยงานรัฐ', 'permission' => array('full')),
		'volunteer' => array('label' => 'อาสาสมัคร', 'permission' => array('full')),
		'social_welfare' => array('label' => 'สวัสดิการสังคมไทย', 'permission' => array('full')),
		'situation' => array('label' => 'สถานการณ์และเหตุการณ์ด้านสวัสดิการสังคม', 'permission' => array('full')),
	);
	
	public $crud = array(
		'read' => 'ดู',
		'create' => 'เพิ่ม',
		'update' => 'แก้ไข',
		'delete' => 'ลบ',
		'download' => 'ดาวน์โหลด',
		'full' => 'ทั้งหมด'
	);
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$data['user_types'] = new User_type();
		$data['user_types']->order_by('id','asc')->get_page();
		$this->template->build('admin/permission_index',$data);
	}
	
	public function form($id=FALSE){
		$data['user_type'] = new User_type($id);
		$data['rs_perm'] = $this->permission_row($id);
		$data['module'] = $this->module;
		$data['crud'] = $this->crud;
		$this->template->build('admin/permission_form',$data);
	}
	
	public function permission_row($user_type_id)
	{
		if($user_type_id)
		{
			$perms = new Permission();
			$perms = $perms->where("user_type_id = ".$user_type_id)->get();
			foreach($perms as $item)
			{
				$perm[$item->module] = array(
					'read' => $item->read,
					'create' => $item->create,
					'update' => $item->update,
					'delete' => $item->delete,
					'download' => $item->download,
					'full' => $item->full
				);
			}
			return @$perm;
		}
		else return NULL;
	}
	
	public function save($id=FALSE){
		if($_POST){
			$user_type = new User_type($id);
			$user_type->from_array($_POST);
			$user_type->save();
			foreach($user_type->permission as $item) $item->delete();
			if(isset($_POST['checkbox'])){
				foreach($_POST['checkbox'] as $module => $item)
				{
					$data['user_type_id'] = $user_type->id;
					$data['module'] = $module;
					foreach($item as $perm => $val) $data[$perm] =  $val;
					$permission = new Permission();
					$permission->from_array($data);
					$permission->save();
					$data = array();
				}	
			}
			set_notify('success', lang('save_data_complete'));
		}
		//redirect('permissions/admin/permissions');
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function delete($id){
		if($id){
			$user_type = new User_type($id);
			foreach($user_type->permission as $item) $item->delete();
			$user_type->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
}
?>