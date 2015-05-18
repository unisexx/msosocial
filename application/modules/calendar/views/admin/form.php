<div class="breadcrumbs" id="breadcrumbs">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home home-icon"></i>
			<a href="contents/admin/contents/form?module=เกี่ยวกับเรา&category=พ.ร.บ. ส่งเสริมฯ คืออะไร">หน้าแรก</a>

			<span class="divider">
				<i class="icon-angle-right arrow-icon"></i>
			</span>
		</li>
		<li class="active">ฟอร์ม</li>
	</ul><!--.breadcrumb-->

	<div class="nav-search" id="nav-search">
		<form class="form-search" />
			<span class="input-icon">
				<input type="text" placeholder="Search ..." class="input-small nav-search-input" id="nav-search-input" autocomplete="off" />
				<i class="icon-search nav-search-icon"></i>
			</span>
		</form>
	</div><!--#nav-search-->
</div>

<div class="page-content">
	<div class="page-header position-relative">
		<h1>
			<?=$rs->module?>
		</h1>
	</div><!--/.page-header-->

	<div class="row-fluid">
		<div class="span12">
			<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" method="post" action="calendar/admin/calendar/save/<?php echo $rs->id ?>" enctype="multipart/form-data" id="frmForm">
					
					<div class="control-group">
			            <label class="control-label" for="id-input-file-1">ภาพประกอบ</label>
			            <div class="controls">
			                <?php if($rs->image):?>
			                <img class="img" style="width:100px;" src="<?php echo (is_file('uploads/calendar/'.$rs->image))? 'uploads/calendar/'.$rs->image : 'media/images/webboard/noavatar.gif' ?>"  /> <br><br>
			                <?php endif;?>
			                <div class="input-xxlarge" style="width:544px;">
			                    <input type="file" id="id-input-file-1" name="image"/>
			                </div>
			            </div>
			        </div>
					
					<div class="control-group">
						<label class="control-label">หัวข้อ</label>
						<div class="controls">
							<input class="input-xxlarge" type="text" name="title" value="<?php echo $rs->title?>"/>
						</div>
					</div>
                    
                    <?php
						 
						 $sdate=date('Y-m-d H:i:s');
						 $edate=date('Y-m-d H:i:s');
						 
						 if($rs->start_date!=""){$sdate=$rs->start_date;}
						 if($rs->end_date!=""){$edate=$rs->end_date;}
						 
						 $sd = explode(" ", $sdate);
						 $sd_date = $sd[0]; 
						 $sd1 = explode("-", $sd_date);
						 
						$ed = explode(" ", $edate); 
						$ed_date = $ed[0];
						$ed1 = explode("-", $ed_date); 
						
						$start_date = $sd1[2].'/'.$sd1[1].'/'.($sd1[0]  + 543);
						$end_date = $ed1[2].'/'.$ed1[1].'/'.($ed1[0]  + 543);
						 
						 
					?>
                    <div class="control-group">
						<label class="control-label">ช่วงวันที่</label>
						<div class="controls">
							
                                <input name="start_date" type="text" id="start_date" class="form-control input_date" placeholder="วันที่" value="<?=$start_date?>"  />
                                ถึง
                                <input name="end_date" type="text" id="end_date" class="form-control input_date" placeholder="วันที่" value="<?=$end_date?>"  />
                            
                            
						</div>
					</div>
					
					<div class="control-group">
			            <label class="control-label" for="form-field-9">รายละเอียด</label>
			            <div class="controls">
			                <textarea class="input-xxlarge" rows="5" id="form-field-9" name="detail"><?php echo $rs->detail?></textarea>
			            </div>
			        </div>
				
					
					<div class="form-actions">
                    
                    <?php
						if($rs->module != ""){$module=$rs->module;}
						if($rs->category != ""){$category=$rs->category;}
					?>
                    
						<?php echo form_referer() ?>
						<input type="hidden" name="module" value="<?=$module?>">
                        <input type="hidden" name="category" value="<?=$category?>">
						<button class="btn btn-large btn-info" type="submit">
							<i class="icon-ok bigger-110"></i>บันทึก
						</button>

						&nbsp; &nbsp; &nbsp;
						<button class="btn btn-large" type="reset">
							<i class="icon-undo bigger-110"></i>รีเซ็ต
						</button>
					</div>
				
				</form>
				
			<!--PAGE CONTENT ENDS-->
		</div><!--/.span-->
	</div><!--/.row-fluid-->
</div>

<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>



<script type="text/javascript">
tiny('detail');
$(function() {
	$('#id-input-file-1 , #id-input-file-2').ace_file_input({
		no_file:'ไม่มีไฟล์แนบ...',
		btn_choose:'แนบไฟล์',
		btn_change:'เปลี่ยน',
		droppable:false,
		onchange:null,
		thumbnail:false //| true | large
		//whitelist:'gif|png|jpg|jpeg'
		//blacklist:'exe|php'
		//onchange:''
		//
	});
	
 $("#frmForm").bind("submit", function () {
			  
	 if ($("#start_date").val().length < 1) {

		alert("กรุณากรอกวันที่ให้ครบ!!");

		return false;
	}

	if ($("#end_date").val().length < 1) {

		alert("กรุณากรอกวันที่ให้ครบ!!");

		return false;
	}
	
});
	
});
</script>

<!--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
<script src="media/jQueryCalendarThai/jquery-ui-1.10.3.custom.js"></script>
<link href="media/jQueryCalendarThai/jquery-ui-1.10.3.custom.css" rel="stylesheet" />
<link href="media/jQueryCalendarThai/SpecialDateSheet.css" rel="stylesheet" />

<style>

    .ui-datepicker {
		
        font-weight: normal;
        color: black !important;
        
    }
    .ui-datepicker-month{
        color:black;
    }
    .ui-datepicker-year{
        color:black;
    }

</style>


<script>

    $.datepicker.regional['th'] = {
        changeMonth: true,
        changeYear: true,
        //defaultDate: GetFxupdateDate(FxRateDateAndUpdate.d[0].Day),
        yearOffSet: 543,
        //showOn: "button",
        //buttonImage: 'images/calendar.gif',
        buttonImageOnly: false,
        dateFormat: 'dd/mm/yy',
        dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
        dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],
        monthNames: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
        monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'],
        constrainInput: true,

        prevText: 'ก่อนหน้า',
        nextText: 'ถัดไป',
        yearRange: '-20:+0',
        buttonText: 'เลือก',

    };
    $.datepicker.setDefaults($.datepicker.regional['th']);

    $(function () {

        $("#start_date").datepicker($.datepicker.regional["th"]); // Set ภาษาที่เรานิยามไว้ด้านบน
        //$("#start_date").datepicker("setDate", new Date()); //Set ค่าวันปัจจุบัน

        $("#end_date").datepicker($.datepicker.regional["th"]); // Set ภาษาที่เรานิยามไว้ด้านบน
       // $("#end_date").datepicker("setDate", new Date()); //Set ค่าวันปัจจุบัน

    });


    var Holidays;


    function CheckDate(date) {
        var day = date.getDate();
        var selectable = true;
        var CssClass = '';

        if (Holidays != null) {

            for (var i = 0; i < Holidays.length; i++) {
                var value = Holidays[i];
                if (value == day) {

                    selectable = false;
                    CssClass = 'specialDate';
                    break;
                }
            }
        }
        return [selectable, CssClass, ''];
    }


    //=====================================================================================================
    //On Selected Date
    function SelectedDate(dateText, inst) {

        var DateText = inst.selectedDay + '/' + (inst.selectedMonth + 1) + '/' + inst.selectedYear;

        return [dateText, inst]
    }
    //=====================================================================================================
    //Call Date in month on click image
    function OnBeforShow(input, inst) {
        var month = inst.currentMonth + 1;
        var year = inst.currentYear;
		
        GetDaysShows(month, year);

    }
    //=====================================================================================================
    //On Selected Date
    //On Change Drop Down
    function ChangMonthAndYear(year, month, inst) {

        GetDaysShows(month, year);
    }

    //=====================================
    function GetDaysShows(month, year) {

        Holidays = [1, 4, 6, 11]; // Sample Data
    }
    //=====================================

</script>
