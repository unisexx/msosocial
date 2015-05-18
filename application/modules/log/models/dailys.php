<?php
class Dailys extends ORM {

    //var $table = 'counter';
	var $table = 'daily';
	
	var $has_one = array('categories');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>