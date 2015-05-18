<?php
class Feed extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		       //load the parser library
		       $this->load->library('simplexml');
		
               $data['title'] = 'นำเข้าไฟล์ข้อมูลจากไฟล์ XML';
        
               $data['products'] = $this->_getXML('myxml');
        
	           $this->parser->parse('table_view', $data);
	}
	
	
	 function _getXML($fname)
    {

                $filename = $fname.'.xml';
                $xmlfile="media/".$filename;
                $xmlRaw = file_get_contents($xmlfile);

                $this->load->library('simplexml');
                $xmlData = $this->simplexml->xml_parse($xmlRaw);

				$result = "";

                foreach($xmlData['item'] as $row)
                {

						$result .= '<tr>';
						$result .= '<td>'.$row['module'].'</td>';
						$result .= '<td>'.$row['slug'].'</td>';
						$result .= '<td>'.$row['title'].'</td>';
						$result .= '<td>'.$row['category_id'].'</td>';
						$result .= '<td>'.$row['detail'].'</td>';
						$result .= '<td>'.$row['image'].'</td>';
						$result .= '<td>'.$row['user_id'].'</td>';
						$result .= '<td>'.$row['counter'].'</td>';
						$result .= '<td>'.$row['status'].'</td>';
						$result .= '<td>'.$row['created'].'</td>';
						$result .= '<td>'.$row['updated'].'</td>';
						$result .= '<td>'.$row['start_date'].'</td>';
						$result .= '<td>'.$row['end_date'].'</td>';
						$result .= '</tr>';
						
					
						$rs = new Feeds();
			
						$rs->module = $row['module'];
						$rs->slug = $row['slug'];
						$rs->title = $row['title'];
						$rs->category_id = $row['category_id'];
						$rs->detail = $row['detail'];
						$rs->image = $row['image'];
						$rs->user_id = $row['user_id'];
						$rs->counter = $row['counter'];
						$rs->status = $row['status'];
						$rs->created = $row['created'];
						$rs->updated = $row['updated'];
						$rs->start_date = $row['start_date'];
						$rs->end_date = $row['end_date'];
						
						$rs->save();

                }
                 return $result;
        }

	
}
?>