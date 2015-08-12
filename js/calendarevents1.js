var calendar = null; // remember the calendar object so that we reuse it and
											// avoid creation other calendars.

// This function gets called when the end-user clicks on some date.
function selected(cal, date) 
{
	cal.sel.value = date; // just update the date in the input field.
	cal.selDay.value = date.substr(0,date.indexOf(' '));
	date = date.substr(date.indexOf(' ')+1,date.length);
	//cal.selMonth.selectedIndex = date.substr(0,date.indexOf(' '))-1;
	cal.selMonth.value = date.substr(0,date.indexOf(' '));
	date = date.substr(date.indexOf(' ')+1,date.length);
	cal.selYear.value = date;
	//if (cal.sel.id == "startdate" || cal.sel.id == "enddate")
		// if we add this call we close the calendar on single-click.
		// just to exemplify both cases, we are using this only for the 1st
		// and the 3rd field, while 2nd and 4th will still require double-click.
		cal.callCloseHandler();
}

// And this gets called when the end-user clicks on the _selected_ date,
// or clicks on the "Close" button.  It just hides the calendar without
// destroying it.
function closeHandler(cal) 
{
	cal.hide();                        // hide the calendar

	// don't check mousedown on document anymore (used to be able to hide the
	// calendar when someone clicks outside it, see the showCalendar function).
	Calendar.removeEvent(document, "mousedown", checkCalendar);
}

// This gets called when the user presses a mouse button anywhere in the
// document, if the calendar is shown.  If the click was outside the open
// calendar this function closes it.
function checkCalendar(ev) 
{
  var el = Calendar.is_ie ? Calendar.getElement(ev) : Calendar.getTargetElement(ev);
  for (; el != null; el = el.parentNode)
    // FIXME: allow end-user to click some link without closing the
    // calendar.  Good to see real-time stylesheet change :)
    if (el == calendar.element || el.tagName == "A") break;
  if (el == null) {
    // calls closeHandler which should hide the calendar.
    calendar.callCloseHandler();
    Calendar.stopEvent(ev);
  }
}

// This function shows the calendar under the element having the given id.
// It takes care of catching "mousedown" signals on document and hiding the
// calendar if the click was outside.
function showCalendar(id, dayId, monthId, yearId, format) 
{
  var el = document.getElementById(id);
  if (calendar != null) 
  {
    // we already have some calendar created
    calendar.hide();                 // so we hide it first.
  } 
  else 
  {
    // first-time call, create the calendar.
    var cal = new Calendar(true, null, selected, closeHandler);
    calendar = cal;                  // remember it in the global var
    cal.setRange(1995, 2050);        // min/max year allowed.
    cal.create();
  }
  calendar.setDateFormat(format);    // set the specified date format
  calendar.parseDate(el.value);      // try to parse the text in field
  calendar.sel = el;                 // inform it what input field we use
  calendar.selDay = "";
  calendar.selMonth = "";
  calendar.selYear = document.getElementById(dayId) + document.getElementById(monthId) + document.getElementById(yearId);
  calendar.showAtElement(el);        // show the calendar below it

  // catch "mousedown" on document
  Calendar.addEvent(document, "mousedown", checkCalendar);
  return false;
}

var MINUTE = 60 * 1000;
var HOUR = 60 * MINUTE;
var DAY = 24 * HOUR;
var WEEK = 7 * DAY;

// If this handler returns true then the "date" given as
// parameter will be disabled.  In this example we enable
// only days within a range of 10 days from the current
// date.
// You can use the functions date.getFullYear() -- returns the year
// as 4 digit number, date.getMonth() -- returns the month as 0..11,
// and date.getDate() -- returns the date of the month as 1..31, to
// make heavy calculations here.  However, beware that this function
// should be very fast, as it is called for each day in a month when
// the calendar is (re)constructed.
function isDisabled(date) 
{
	return false;
}

