/////////////////// Plug-in file for CalendarXP 9.0 /////////////////
// This file is totally configurable. You may remove all the comments in this file to minimize the download size.
/////////////////////////////////////////////////////////////////////

///////////// Calendar Onchange Handler ////////////////////////////
// It's triggered whenever the calendar gets changed to y(ear),m(onth),d(ay)
// d = 0 means the calendar is about to switch to the month of (y,m); 
// d > 0 means a specific date [y,m,d] is about to be selected.
// e is a reference to the triggering event object
// Return a true value will cancel the change action.
// NOTE: DO NOT define this handler unless you really need to use it.
////////////////////////////////////////////////////////////////////
// function fOnChange(y,m,d,e) {}


///////////// Calendar AfterSelected Handler ///////////////////////
// It's triggered whenever a date gets fully selected.
// The selected date is passed in as y(ear),m(onth),d(ay)
// e is a reference to the triggering event object
// NOTE: DO NOT define this handler unless you really need to use it.
////////////////////////////////////////////////////////////////////
// function fAfterSelected(y,m,d,e) {}


///////////// Calendar Cell OnDrag Handler ///////////////////////
// It triggered when you try to drag a calendar cell. (y,m,d) is the cell date. 
// aStat = 0 means a mousedown is detected (dragstart)
// aStat = 1 means a mouseover between dragstart and dragend is detected (dragover)
// aStat = 2 means a mouseup is detected (dragend)
// e is a reference to the triggering event object
// NOTE: DO NOT define this handler unless you really need to use it.
//       If you use fRepaint() here, fAfterSelected() will be ignored.
////////////////////////////////////////////////////////////////////
function fOnDrag(y,m,d,aStat,e) {
	if (aStat==0) {
		var bRangeClick=e?fCheckKeyPressed(1+2+4,e):false;	// use ctrl, shift or alt to select range end
		if (fIsSelected(y,m,d))
			fRemoveRange(y,m,d,bRangeClick||(e?e.button==2||e.which==3:false));
		else
			fAddRange(y,m,d,bRangeClick);
		fRepaint();
	} else if (aStat==1) {
		if (!fIsSelected(y,m,d)) {
			fAddRange(y,m,d,true);
			fRepaint();
		}
	}
}


////////////////// Calendar OnResize Handler ///////////////////////
// It's triggered after the calendar panel has finished drawing.
// NOTE: DO NOT define this handler unless you really need to use it.
////////////////////////////////////////////////////////////////////
// function fOnResize() {}


////////////////// Calendar fOnWeekClick Handler ///////////////////////
// It's triggered when the week number is clicked.
// NOTE: DO NOT define this handler unless you really need to use it.
////////////////////////////////////////////////////////////////////
function fOnWeekClick(year, weekNo) {
	var wmark=fGetEvent(year, -weekNo, 0);
	for (var i=1; i<=7; i++) {
		var dts=fW2Date(year,weekNo,i);
		if (wmark) {
			fRemoveRange(dts[0],dts[1],dts[2],false);
		} else {
			fAddRange(dts[0],dts[1],dts[2],false);
		}
	}
	if (wmark) {
		fRemoveEvent(year, -weekNo, 0);
	} else {
		fAddEvent(year, -weekNo, 0, "selected");
	}
	fRepaint();
}


////////////////// Calendar fOnDoWClick Handler ///////////////////////
// It's triggered when the week head (day of week) is clicked.
// dow ranged from 0-6 while 0 denotes Sunday, 6 denotes Saturday.
// NOTE: DO NOT define this handler unless you really need to use it.
////////////////////////////////////////////////////////////////////
function fOnDoWClick(year, month, dow) {
	var dmark=fGetEvent(year, month, -1-dow);

	var eom=fGetDays(year)[month];
	var d=fGetDateByDOW(year,month,1,dow);
	while (d<=eom) {
		if (dmark) {
			fRemoveRange(year,month,d,false);
		} else {
			fAddRange(year,month,d,false);
		}
		d+=7;
	}
	if (dmark) {
		fRemoveEvent(year, month, -1-dow);
	} else {
		fAddEvent(year, month, -1-dow, "selected");
	}
	fRepaint();
}

////////////////// Calendar fIsSelected Callback ///////////////////////
// It's triggered for every date passed in as y(ear) m(onth) d(ay). And if 
// the return value is true, that date will be rendered using the giMarkSelected,
// gcFGSelected, gcBGSelected and guSelectedBGImg theme options.
// NOTE: If NOT defined here, the engine will create one that checks the gdSelect only.
////////////////////////////////////////////////////////////////////
function fIsSelected(y,m,d) {
	if (_pds.length==0) return false;
	var dt=Date.UTC(y,m-1,d);
	for (var i=0; i<_pds.length; i++)
		if (_pds[i][0]<=dt&&dt<=_pds[i][1])
			return true;
	return false;
}


////////////////// Calendar fOnload Handler ///////////////////////
// It's triggered when the calendar engine is fully loaded by the browser.
// NOTE: DO NOT define this handler unless you really need to use it.
////////////////////////////////////////////////////////////////////
function fOnload() {
	if (gContainer.fInitAgenda) gContainer.fInitAgenda();
}


// ====== predefined utility functions for use with agendas. ========
// load an url in the window/frame designated by "framename".
function popup(url,framename) {	
	var w=parent.open(url,framename,"top=200,left=200,width=400,height=200,scrollbars=1,resizable=1");
	if (w&&url.split(":")[0]=="mailto") w.close();
	else if (w&&!framename) w.focus();
}

// ====== Following are self-defined and/or custom-built functions! =======


// ======= the following plugin is coded for the multi-select plugin ========
// If you define a fAddListItem(strDate) and a fRemoveListItem(strDate) in the 
// container page, they will be called whenever dates are adding or removing from
// the range. You may make use of them to populate the listbox on your page.
// The format of param strDate can be modified in fDateString() function
// ------------------------------------------------------------------------
giWeekCol=0;
giMarkSelected=1+2+4;	// change the effects of selection
gcBGSelected="#fffacd";	// set the background color of selection
giShowOther=1+2;	// allow agendas to show up in other months.

var _pds=[];	// selected date periods. It's an array of 1 or more time periods in array format [startdate,enddate]. (startdate and enddate are represented in UTC milliseconds)
var _ls=null;	// last selected date, in UTC milliseconds.

function fDateString(y,m,d) {
	return y+"/"+fPad0(m)+"/"+fPad0(d);
}

function fPad0(n) {
	return n<10?"0"+n:n;
}

function fCheckKeyPressed(key,e) {
	var ALT=1, CTRL=2, SHIFT=4, pr=false;
	if (key&&ALT) pr=NN4?e.modifiers&1:e.altKey;
	if (!pr&&key&&CTRL) pr=NN4?e.modifiers&2:e.ctrlKey;
	if (!pr&&key&&SHIFT) pr=NN4?e.modifiers&4:e.shiftKey;
	return pr;
}

function fAddDate(y,m,d) {
	var ag=fGetAgenda(y,m,d,false);
	if (fIsSelected(y,m,d)||ag[1]==null) return;
	if (gContainer.fAddListItem) gContainer.fAddListItem(fDateString(y,m,d));
	if (ag[1].indexOf("alert")!=-1)
		__lastDrag=null;
	eval(ag[1]);
	if (fAfterSelected) fAfterSelected(y,m,d);
}

function fRemoveDate(y,m,d) {
	if (gContainer.fRemoveListItem) gContainer.fRemoveListItem(fDateString(y,m,d));
}

function fAddRange(y,m,d,bBatch) {
	var dt=Date.UTC(y,m-1,d);
	if (_ls==null||!bBatch) {
		fAddDate(y,m,d);
		_ls=dt;
		_pds.push([dt,dt]);
	} else {
		var pd=[_ls,_ls];
		_ls=dt;
		if (dt<pd[0]) pd[0]=dt;
		else if (pd[1]<dt) pd[1]=dt;
		for (var i=pd[0];i<=pd[1];i+=MILLIDAY) {
			var di=new Date(i);
			fAddDate(di.getUTCFullYear(),di.getUTCMonth()+1,di.getUTCDate());
		}
		_pds.push(pd);
	}
	fMergePDS();
}

function fSort(a,b) {
	return a[0]<b[0]?-1:a[0]>b[0]?1:0;
}

function fMergePDS() {
	if (_pds.length<=1) return;
	_pds.sort(fSort);
	var tmpd=[_pds[0]];
	for (var i=0,j=1; j<_pds.length; j++)
		if (tmpd[i][1]<_pds[j][0]-MILLIDAY) {
			i=tmpd.length;
			tmpd[i]=_pds[j];
		} else
			tmpd[i][1]=Math.max(tmpd[i][1],_pds[j][1]);
	_pds=tmpd;
}

function fRemoveRange(y,m,d,bBatch) {
	var dt=Date.UTC(y,m-1,d);
	for (var i=0; i<_pds.length; i++)
		if (_pds[i][0]<=dt&&_pds[i][1]>=dt) break;
	if (i==_pds.length) return;
	if (bBatch||_pds[i][0]==_pds[i][1]) {
		for (var k=_pds[i][0];k<=_pds[i][1];k+=MILLIDAY) {
			var dk=new Date(k);
			fRemoveDate(dk.getUTCFullYear(),dk.getUTCMonth()+1,dk.getUTCDate());
		}
		fSplice(_pds,i);
	} else {
		fRemoveDate(y,m,d);
		if (dt<_pds[i][1]) _pds.push([dt+MILLIDAY,_pds[i][1]]);
		if (_pds[i][0]<dt) _pds[i][1]=dt-MILLIDAY;
		else fSplice(_pds,i);
	}
	_ls=null;
}

function fClearAll() {
	var miny=10000, maxy=0;
	for (var i=_pds.length-1; i>=0; i--) {
		var dt=new Date(_pds[i][0]);
		var y=dt.getUTCFullYear(),m=dt.getUTCMonth()+1,d=dt.getUTCDate();
		fRemoveRange(y,m,d,true);
		miny=Math.min(miny,y);
		maxy=Math.max(maxy,y);
	}
	for (var y=miny; y<=maxy; y++) {
		for (var w=1; w<=53; w++) fRemoveEvent(y, -w, 0);
		for (var m=1; m<=12; m++)
			for (var dow=1; dow<=7; dow++)
				fRemoveEvent(y, m, -dow);
	}
}

function fSplice(arr,n) { // made for IE5, push() had already been implemented in the engine
	for (var i=n; i<arr.length-1; i++) arr[i]=arr[i+1];
	arr[i]=null;
	arr.length--;
}

// ======= end of multi-select plugin ========
