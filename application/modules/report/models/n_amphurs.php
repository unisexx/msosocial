<?php

class N_amphurs extends ORM {

    var $table = 'n_amphur';
	
	var $has_one = array('n_amphur','n_district');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}


?>