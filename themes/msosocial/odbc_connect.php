<?php

putenv("NLS_LANG=AMERICAN_AMERICA.TH8TISASCII");
//include('application/helpers/MY_url_helper.php');
//include('media/simpledom/simple_html_dom.php');
include('adodb/adodb.inc.php');


$_config['dbdriver'] = 'oci8';
$_config['server'] = '10.20.50.12';
$_config['username'] = 'boffice';
$_config['password'] = 'bo2557';
$_config['database'] = 'BOFFICE';


$db = ADONewConnection($_config['dbdriver']);
$db->Connect($_config['server'],$_config['username'],$_config['password'],$_config['database']);
$db->Execute('SET character_set_results=utf8');
$db->Execute('SET collation_connection=utf8_unicode_ci');
$db->Execute('SET NAMES utf8');
//$db->debug = true;




//$rs = $db->Execute("select * from act_province order by province_code asc");

// print_r($rs);
//foreach($rs as $row){
//	echo $row['PROVINCE_NAME']."<br>";
//}

?>