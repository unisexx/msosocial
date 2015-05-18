<?php
class Category_calendar extends ORM {

    var $table = 'categories_calendar';
	
	var $has_one = array("user");

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
		
	
}
?>