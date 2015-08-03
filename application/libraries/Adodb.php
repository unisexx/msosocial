<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Adodb plugin for ci
 * Author: iyottt@gmail.com
 */
class Adodb {

	function __construct(){
		
		// $config['hostname'] = '27.254.33.52';
		$config['hostname'] = 'localhost';
		$config['username'] = 'BOFFICE';
		$config['password'] = '1234';
		$config['database'] = 'BOFFICE';
		$config['dbdriver'] = 'oci8po';
		$config['dbprefix'] = '';
		$config['pconnect'] = TRUE;
		$config['db_debug'] = TRUE;
		$config['cache_on'] = FALSE;
		$config['cachedir'] = '';
		$config['char_set'] = 'utf8';
		$config['dbcollat'] = 'utf8_unicode_ci';
		$config['swap_pre'] = '';
		$config['autoinit'] = TRUE;
		$config['stricton'] = FALSE;

		$this->obj =& get_instance();
       	
       	if ($config['cache_on'] && is_dir(APPPATH.$config['cachedir'])){
			GLOBAL $ADODB_CACHE_DIR;
			$ADODB_CACHE_DIR = APPPATH.$config['cachedir'];
		} 
		 
       	require_once(dirname(__FILE__).'/adodb/adodb.inc.php');
		$this->obj->ado =& NewADOConnection($config['dbdriver']);

		if (@$config['db_debug']) { @$this->conn->debug = true; }

		$this->obj->ado->Connect(
			$config['hostname'],
			$config['username'],
			$config['password'],
			$config['database']
		);
		if ($config['char_set'] && $config['dbcollat']){
  			$this->obj->ado->Execute('SET character_set_results='.$config['char_set']);
			$this->obj->ado->Execute('SET collation_connection='.$config['dbcollat']);
			$this->obj->ado->Execute('SET NAMES '.$config['char_set']);
		}
		$this->obj->ado->SetFetchMode(ADODB_FETCH_ASSOC);
		return true;
	}

}