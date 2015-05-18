<?php
class Auth extends Public_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function login()
	{
		$this->template->set_theme('admin')->set_layout('blank')->build('admin/auth/login');
	}
	
	public function check_login()
	{
		if(login($this->input->post('username'), $this->input->post('password')))
		{
			set_notify('success', 'Welcome to Admin control');
			redirect('contents/admin/contents/form?module=เกี่ยวกับเรา&category=พ.ร.บ. ส่งเสริมฯ คืออะไร');
		} 
		else
		{
			set_notify('error', 'Username or Password is incorrect?');
			redirect('users/admin/auth/login');
		} 
	}
	
	public function logout()
	{
		logout();
		redirect('users/admin/auth/login');
	}
	
}
?>