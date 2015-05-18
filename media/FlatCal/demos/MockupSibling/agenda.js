
////////////////////////////////////////////////////////
function fHoliday(y,m,d) {
	var rE=fGetEvent(y,m,d), r=null;

	// you may have sophisticated holiday calculation set here, following are only simple examples.
	if (m==1&&d==1)
		r=[" มกราคม 1, "+y+" \n วันขึ้นปีใหม่! ", "alert('สวัสดีวันปีใหม่!')", null, null, "Holiday.jpg", false, "<div align=left class='MsgBoard'>สวัสดีวันปีใหม่!</div>"];
	
	//else if (m==12&&d==25)
		//r=[" Dec 25, "+y+" \n Merry X'mas! ", null, null, null, "Holiday.jpg"];	
	else if (m==2&&d==14)
		r=[" กุุมภาพันธ์ 14, "+y+" \n วัน มาฆบูชา  ", null, null, null, "Holiday.jpg"]; 
	
	else if (m==4&&d==6)
		r=[" เมษายน 6, "+y+" \n วัน จักรี    ", null, null, null, "Holiday.jpg"]; 
	else if (m==4&&d==7)
		r=[" เมษายน 7, "+y+" \n ชดเชยวันจักรี    ", null, null, null, "Holiday.jpg"]; 
	
	else if (m==4&&d==13)
		r=[" เมษายน 13, "+y+" \n  วันสงกรานต์  ", null, null, null, "Holiday.jpg"]; 
	else if (m==4&&d==14)
		r=[" เมษายน 14, "+y+" \n  วันสงกรานต์   ", null, null, null, "Holiday.jpg"]; 
	else if (m==4&&d==15)
		r=[" เมษายน 15, "+y+" \n  วันสงกรานต์ ", null, null, null, "Holiday.jpg"]; 
	
	
	else if (m==5&&d==5)
		r=[" พฤษภาคม 5, "+y+" \n วัน ฉัตรมงคล  ", null, null, null, "Holiday.jpg"];
	
	else if (m==5&&d==13)
		r=[" พฤษภาคม 13, "+y+" \n วัน วิสาขบูชา ", null, null, null, "Holiday.jpg"];
	
	else if (m==7&&d==11)
		r=[" กรกฎาคม 11, "+y+" \n วัน อาสาฬหบูชา  ", null, null, null, "Holiday.jpg"];
	else if (m==7&&d==12)
		r=[" กรกฎาคม 12, "+y+" \n วัน เข้าพรรษา  ", null, null, null, "Holiday.jpg"];
	else if (m==7&&d==14)
		r=[" กรกฎาคม 14, "+y+" \n ชดเชยวันเข้าพรรษา  ", null, null, null, "Holiday.jpg"];
		
		
	else if (m==8&&d==12)
		r=[" สิงหาคม 12, "+y+" \n วันแม่แห่งชาติ  ", null, null, null, "Holiday.jpg"];
	
	else if (m==10&&d==23)
		r=[" ตุลาคม 23, "+y+" \n วันปิยมหาราช ", null, null, null, "Holiday.jpg"];
	
	else if (m==12&&d==5)
		r=[" ธันวาคม 5, "+y+" \n วัน พ่อแห่งชาติ  ", null, null, null, "Holiday.jpg"];
	else if (m==12&&d==10)
		r=[" ธันวาคม 10, "+y+" \n วัน รัฐธรรมนูญ  ", null, null, null, "Holiday.jpg"];
	else if (m==12&&d==31)
		r=[" ธันวาคม 31, "+y+" \n วัน สิ้นปี  ", null, null, null, "Holiday.jpg"];		
	
	else if (m==5&&d>20) 
	{
		//var date=fGetDateByDOW(y,5,5,1);
		//if (d==date) r=["May "+d+", "+y+" \n Memorial Day ", gsAction, "#4682b4", "white"];
		
	}

	
	return rE?rE:r;	// favor events over holidays
}


