<?php
class Welfares extends ORM {

    var $table = 'welfare';
	
	var $has_one = array('user');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>