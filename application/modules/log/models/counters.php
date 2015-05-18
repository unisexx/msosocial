<?php
class Counters extends ORM {

    //var $table = 'counter';
	var $table = 'counter';
	
	var $has_one = array('categories');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>