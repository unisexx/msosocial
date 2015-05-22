<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = 'default';
$active_record = TRUE;


$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'root';
$db['default']['password'] = '';
$db['default']['database'] = 'funlaw';

// $db['default']['hostname'] = 'mysql1.favouritehosting.com';
// $db['default']['username'] = 'c1fundlaw';
// $db['default']['password'] = 'fl1234';
// $db['default']['database'] = 'c1fundlaw';

$db['default']['dbdriver'] = 'mysql';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;

$db['mso']['hostname'] = 'localhost';
$db['mso']['username'] = 'root';
$db['mso']['password'] = 'S^69XY<Kzp';
$db['mso']['database'] = 'fund02';
$db['mso']['dbdriver'] = 'mysql';
$db['mso']['dbprefix'] = '';
$db['mso']['pconnect'] = TRUE;
$db['mso']['db_debug'] = TRUE;
$db['mso']['cache_on'] = FALSE;
$db['mso']['cachedir'] = '';
$db['mso']['char_set'] = 'utf8';
$db['mso']['dbcollat'] = 'utf8_general_ci';
$db['mso']['swap_pre'] = '';
$db['mso']['autoinit'] = TRUE;
$db['mso']['stricton'] = FALSE;

$db['adodb']['hostname'] = '10.20.50.12';
$db['adodb']['username'] = 'boffice';
$db['adodb']['password'] = 'bo2557';
$db['adodb']['database'] = 'BOFFICE';
$db['adodb']['dbdriver'] = 'oci8po';
$db['adodb']['dbprefix'] = '';
$db['adodb']['pconnect'] = TRUE;
$db['adodb']['db_debug'] = TRUE;
$db['adodb']['cache_on'] = FALSE;
$db['adodb']['cachedir'] = '';
$db['adodb']['char_set'] = 'utf8';
$db['adodb']['dbcollat'] = 'utf8_unicode_ci';
$db['adodb']['swap_pre'] = '';
$db['adodb']['autoinit'] = TRUE;
$db['adodb']['stricton'] = FALSE;


/* End of file database.php */
/* Location: ./application/config/database.php */