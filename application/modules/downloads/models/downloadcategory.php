<?php
class Downloadcategory extends ORM {

    var $table = 'categories';
	
	var $has_one = array("user");

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
	
	
}
?>