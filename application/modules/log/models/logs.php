<?php
class Logs extends ORM {

    //var $table = 'counter';
	var $table = 'sitelog';
	
	var $has_one = array('categories');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>