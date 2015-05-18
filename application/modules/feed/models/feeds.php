<?php
class Feeds extends ORM {

    var $table = 'infos';
	
	var $has_one = array('user');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>