<?php
class Situations extends ORM {

    var $table = 'situations';
	
	var $has_one = array('user');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>