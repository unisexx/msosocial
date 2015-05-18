        <div class="title-report">รายงาน</div>
      <div id="report">
       	  <span class="title-report2">รายงาน องค์กรสาธารณประโยชน์</span>
            <ul>
                             <?foreach($rs->where('module = "องค์กรสาธารณประโยชน์" and category = "รายงาน" and status="approve"')->order_by('id desc')->get() as $row0):?>   
                                <li><a href="contents/report_view/<?=$row0->id?>"><?=$row0->title?></a></li>
                            <?endforeach;?>
          </ul>
       	  <span class="title-report2">รายงาน องค์กรสวัสดิการชุมชน</span>
            <ul>
                         <?foreach($rs->where('module = "องค์กรสวัสดิการชุมชน" and category = "รายงาน" and status="approve"')->order_by('id desc')->get() as $row1):?>   
            					 <li><a href="contents/report_view/<?=$row1->id?>"><?=$row1->title?></a></li>
                            <?endforeach;?>

          </ul>	  
    </div>
    <div class="clearfix">&nbsp;</div>