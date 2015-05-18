
    	<div id="title-blank"></div>
        <div id="breadcrumb">
		
		<a href="<?php echo base_url(); ?>home">หน้าแรก</a> 
		> 
		<span class="b1"><a href="#"></a></span> 

		</div>
		
	    <div id="page">
		<?php
		$this->load->helper('html'); 
		foreach($rs as $row){
			
			dbConvert($row);
			echo $row['title']."<br>";
			echo $row['img_title']."<br>";
			echo $row['create_date']."<br>";
			//print_r($row);
		}
		?>	
        </div>