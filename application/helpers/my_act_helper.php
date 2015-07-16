<?php

if(!function_exists('act_get_province'))
{
	function act_get_province($province_id)
	{
		$CI =& get_instance();
		$result = $CI->db->getone('select province_name from act_province where province_code = ?',$province_id);
		dbConvert($result);
		return $result;
	}
}

if(!function_exists('act_get_ampor'))
{
	function act_get_ampor($province_id,$ampor_id)
	{
		$CI =& get_instance();
		$result = $CI->db->getone('select ampor_name from act_ampor where province_code = ? and ampor_code = ?',array($province_id,$ampor_id));
		dbConvert($result);
		return $result;
	}
}

if(!function_exists('act_get_tumbon'))
{
	function act_get_tumbon($province_id,$ampor_id,$tumbon_id)
	{
		$CI =& get_instance();
		$result = $CI->db->getone('select tumbon_name from act_tumbon where province_code = ? and ampor_code = ? and tumbon_code = ?',array($province_id,$ampor_id,$tumbon_id));
		dbConvert($result);
		return $result;
	}
}

if(!function_exists('act_get_title'))
{
	function act_get_title($title_id)
	{
		$CI =& get_instance();
		$result = $CI->db->getone('select title_name from act_title_name where title_id = ?',$title_id);
		dbConvert($result);
		return $result;
	}
}

if(!function_exists('act_get_position'))
{
	function act_get_position($position_id)
	{
		$CI =& get_instance();
		$result = $CI->db->getone('select position_name from act_committee_position where id = ?',$position_id);
		dbConvert($result);
		return $result;
	}
}

if(!function_exists('act_get_organ_name'))
{
	function act_get_organ_name($organ_id)
	{
		$CI =& get_instance();
		$result = $CI->db->getone('select organ_name from act_organization_main where organ_id = ?',$organ_id);
		dbConvert($result);
		return $result;
	}
}

if(!function_exists('act_get_project_name'))
{
	function act_get_project_name($project_id)
	{
		$CI =& get_instance();
		$result = $CI->db->getone('select project_name from act_fund_project where project_id = ?',$project_id);
		dbConvert($result);
		return $result;
	}
}

if(!function_exists('act_get_subcommittee_type'))
{
	function act_get_subcommittee_type($sub_type_id)
	{
		$CI =& get_instance();
		$result = $CI->db->getone('select sub_type_name from act_subcommittee_type where id = ?',$sub_type_id);
		dbConvert($result);
		return $result;
	}
}

if(!function_exists('act_get_subposition'))
{
	function act_get_subposition($position_id)
	{
		$CI =& get_instance();
		$result = $CI->db->getone('select position_name from act_subcommittee_position where id = ?',$position_id);
		dbConvert($result);
		return $result;
	}
}

if(!function_exists('act_get_target_name'))
{
	function act_get_target_name($project_id)
	{
		$CI =& get_instance();
		$sql = "SELECT
				ACT_TARGET_GROUP.TARGET_NAME
				FROM
				ACT_TARGET_GROUP
				INNER JOIN ACT_PROJECT_TARGET ON ACT_TARGET_GROUP.TARGET_ID = ACT_PROJECT_TARGET.FP_TARGET_ID
				WHERE ACT_PROJECT_TARGET.PROJECT_ID = ".$project_id;
		$result = $CI->db->getone($sql);
		dbConvert($result);
		return $result;
	}
}

if(!function_exists('act_get_fund_name'))
{
	function act_get_fund_name($fund_id)
	{
		$CI =& get_instance();
		$result = $CI->db->getone('select fund_name from act_mst_fund_name where fund_id = ?',$fund_id);
		dbConvert($result);
		return $result;
	}
}

if(!function_exists('act_get_target_group_name'))
{
	function act_get_target_group_name($target_id)
	{
		$CI =& get_instance();
		$result = $CI->db->getone('select target_name from act_target_group where target_id = ?',$target_id);
		dbConvert($result);
		return $result;
	}
}

if(!function_exists('act_get_service_name'))
{
	function act_get_service_name($service_id)
	{
		$CI =& get_instance();
		$result = $CI->db->getone('select service_name from act_service where service_id = ?',$service_id);
		dbConvert($result);
		return $result;
	}
}

if(!function_exists('act_get_process_name'))
{
	function act_get_process_name($process_id)
	{
		$CI =& get_instance();
		$result = $CI->db->getone('select process_name from act_process where process_id = ?',$process_id);
		dbConvert($result);
		return $result;
	}
}

if(!function_exists('act_get_service_com_name'))
{
	function act_get_service_com_name($scommunity_id)
	{
		$CI =& get_instance();
		$result = $CI->db->getone('select scommunity_name from act_service_community where scommunity_id = ?',$scommunity_id);
		dbConvert($result);
		return $result;
	}
}

if(!function_exists('act_get_welfare_benefit_name'))
{
	function act_get_welfare_benefit_name($id)
	{
		$CI =& get_instance();
		$result = $CI->db->getone('select organ_name from act_welfare_benefit where id = ?',$id);
		dbConvert($result);
		return $result;
	}
}

if(!function_exists('act_get_welfare_community_name'))
{
	function act_get_welfare_community_name($id)
	{
		$CI =& get_instance();
		$result = $CI->db->getone('select organ_name from act_welfare_comm where id = ?',$id);
		dbConvert($result);
		return $result;
	}
}

if(!function_exists('generateRandomString'))
{
	function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
}
?>