<?php

class N_districts extends ORM {

    var $table = 'n_district';
	
	var $has_one = array('n_amphur','n_district');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}


?>