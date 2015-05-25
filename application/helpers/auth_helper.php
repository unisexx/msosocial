<?php

function login($username,$password)
{
	// $password = md5(sha1($password."secret"));
	$CI =& get_instance();
	$user = new User();
	$user->where(array('username'=>$username,'password'=>$password))->get();
	if($user->exists())
	{
		$CI->session->set_userdata('id',$user->id);
		$CI->session->set_userdata('level',$user->level_id);
		$CI->session->set_userdata('user_type',$user->user_type_id);
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}

function is_login($level_name = FALSE)
{
	$CI =& get_instance();
	$user = new User($CI->session->userdata('id'));
	if($level_name)
	{
		$level = new Level();
		if($user->level->level)
		{
			$id = ($level->get_by_level($level_name)->id >= $user->level->id)? true : false ;
		}
		else
		{
			$id = false;
		}
	}
	else
	{
		$id = $user->id;
	}
	return ($id) ? true : false;
}

function user_login($id=FALSE)
{
	$CI =& get_instance();
	$id = ($id)?$id:$CI->session->userdata('id');
	$user = new User($id);
	return $user;
}

function logout()
{
	$CI =& get_instance();
	$CI->session->unset_userdata('id');
	$CI->session->unset_userdata('level');
	$CI->session->unset_userdata('user_type');
}

function is_owner($id)
{
    $CI =& get_instance();
    if($id == $CI->session->userdata('id') && $CI->session->userdata('id') != 0)
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}

function permission($module, $action)
{
	$CI =& get_instance();
	$permission = new Permission();
	$perm = $permission->where("user_type_id = ".$CI->session->userdata('user_type')." and module = '".$module."'")->get();
	
	if($perm->$action){
		return TRUE;
	}else{
		return FALSE;
	}
}




function uploadfiles($oldPath = null, $dirPath = null, $fileInput = null) {
	//Help
	if(strtolower($oldPath) == 'help') {
		$help = "<pre>
			Dir : helper/authen_helper
			uploadfiles(oldpath, dirpath, fileinput);
			input--oldpath : remove old file or fileinput error function will return \"oldpath\".
			input--dirpath : directory for uploadfiles.
			input--fileinput : \$_FILES for upload.
			return : upload file and return directory current file.
		</pre>";
		return $help;
	}
	
	//Retur old path;
	if(empty($fileInput['tmp_name'])) {
		return $oldPath;
	}
	
	//Remove old file
	if(@file_exists($oldPath) && !empty($oldPath)) {
		unlink($oldPath);
	}
	
	//Make directory
	if(@!file_exists($dirPath)) {
		mkdir($dirPath);
	}
	
	//Get fil type
	$fileType = explode('.', $fileInput['name']);
	$fileType = end($fileType);
	
	//Get file name
	$rs = $dirPath.uniqid().'.'.$fileType;
	
	//Upload file 
	move_uploaded_file($fileInput['tmp_name'], $rs);
	
	return $rs;
}


?>