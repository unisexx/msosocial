<?php

class Reports extends ORM {

    var $table = 'welfare';
	
	var $has_one = array('categories');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}


?>