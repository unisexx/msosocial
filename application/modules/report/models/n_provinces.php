<?php

class N_provinces extends ORM {

    var $table = 'n_province';
	
	var $has_one = array('n_amphur','n_district');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}


?>