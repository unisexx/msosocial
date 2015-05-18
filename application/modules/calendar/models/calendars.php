<?php
class Calendars extends ORM {

    var $table = 'contents_calendar';
	
	var $has_one = array('categories_calendar');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>