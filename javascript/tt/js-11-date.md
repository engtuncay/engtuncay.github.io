
# JavaScript Date: Create, Convert, Compare Dates in JavaScript

Source : https://www.tutorialsteacher.com/javascript/javascript-date

JavaScript provides Date object to work with date & time, including days, months, years, hours, minutes, seconds, and milliseconds.

Use the Date() function to get the string representation of the current date and time in JavaScript. Use the new keyword in JavaScript to get the Date object.

Example: Date In JavaScript

```js
Date(); //Returns current date and time string

//or

var currentDate = new Date(); //returns date object of current date and time

```

Create a date object by specifying different parameters in the Date() constructor function.

Date() Syntax

```js
new Date()
new Date(value)
new Date(dateString)
new Date(year, monthIndex)
new Date(year, monthIndex, day)
new Date(year, monthIndex, day, hours)
new Date(year, monthIndex, day, hours, minutes)
new Date(year, monthIndex, day, hours, minutes, seconds)
new Date(year, monthIndex, day, hours, minutes, seconds, milliseconds)

```
Parameters:

- No Parameters: A date object will be set to the current date & time if no parameter is specified in the constructor.
- value: An integer value representing the number of milliseconds since January 1, 1970, 00:00:00 UTC.
- dateString: A string value that will be parsed using Date.parse() method.
- year: An integer value to represent a year of a date. Numbers from 0 to 99 map to the years 1900 to 1999. All others are actual years.
- monthIndex: An integer value to represent a month of a date. It starts with 0 for January till 11 for December
- day: An integer value to represent day of the month.
- hours: An integer value to represent the hour of a day between 0 to 23.
- minutes: An integer value to represent the minute of a time segment.
- seconds: An integer value to represent the second of a time segment.
- milliseconds: An integer value to represent the millisecond of a time segment. Specify numeric milliseconds in the constructor to get the date and time elapsed from 1/1/1970.

In the following example, a date object is created by passing milliseconds in the Date() constructor function. So date will be calculated based on milliseconds elapsed from 1/1/1970.

Example: Create Date by Specifying Milliseconds

```js
var date1 = new Date(0);  // Thu Jan 01 1970 05:30:00

var date2 = new Date(1000); // Thu Jan 01 1970 05:30:01

var date3 = new Date(5000); // Thu Jan 01 1970 05:30:05 

```

The following example shows various formats of a date string that can be specified in a Date() constructor.

Example: Create Date by Specifying Date String
var date1 = new Date("3 march 2015");

var date2 = new Date("3 February, 2015");

var date3 = new Date("3rd February, 2015"); // invalid date

var date4 = new Date("2015 3 February");

var date5 = new Date("3 2015 February ");

var date6 = new Date("February 3 2015");

var date7 = new Date("February 2015 3");

var date8 = new Date("2 3 2015");

var date9 = new Date("3 march 2015 20:21:44");
You can use any valid separator in the date string to differentiate date segments.

Example: Create Date using Different Date Separator
var date1 = new Date("February 2015-3");

var date2 = new Date("February-2015-3");

var date3 = new Date("February-2015-3");

var date4 = new Date("February,2015-3");

var date5 = new Date("February,2015,3");

var date6 = new Date("February*2015,3");

var date7 = new Date("February$2015$3");

var date8 = new Date("3-2-2015"); // MM-dd-YYYY

var date9 = new Date("3/2/2015"); // MM-dd-YYYY
Specify seven numeric values to create a date object with the specified year, month and optionally date, hours, minutes, seconds and milliseconds.

Example: Date
var date1 = new Date(2021, 2, 3); // Mon Feb 03 2021 
var date2 = new Date(2021, 2, 3, 10); // Mon Feb 03 2021 10:00 
var date3 = new Date(2021, 2, 3, 10, 30); // Mon Feb 03 2021 10:30 
var date4 = new Date(2021, 2, 3, 10, 30, 50); // Mon Feb 03 2021 10:30:50 
var date5 = new Date(2021, 2, 3, 10, 30, 50, 800); // Mon Feb 03 2021 10:30:50
Date Formats
JavaScript supports ISO 8601 date format by default - YYYY-MM-DDTHH:mm:ss.sssZ

Example: ISO Date Format
var dt = new Date('2015-02-10T10:12:50.5000z');
Convert Date Formats
Use different Date methods to convert a date from one format to another format, e.g., to Universal Time, GMT, or local time format.

The following example demonstrates ToUTCString(), ToGMTString(), ToLocalDateString(), and ToTimeString() methods to convert date into respective formats.

Example: Date Conversion in Different Formats
var date = new Date('2015-02-10T10:12:50.5000z');

date; 'Default format:'

date.toDateString();'Tue Feb 10 2015'

date.toLocaleDateString();'2/10/2015'

date.toGMTString(); 'GMT format' 

date.toISOString(); '2015-02-10T10:12:50.500Z' 

date.toLocaleString();'Local date Format '

date.toLocaleTimeString(); 'Locale time format '

date.toString('YYYY-MM-dd'); 'Tue Feb 10 2015 15:42:50'

date.toTimeString(); '15:42:50' 

date.toUTCString(); 'UTC format ' 
To get date string in formats other than the ones listed above, you need to manually form the date string using different date object methods. The following example converts a date string to DD-MM-YYYY format.

Example: Get Date Segments
var date = new Date('4-1-2015'); // M-D-YYYY

var d = date.getDate();
var m = date.getMonth() + 1;
var y = date.getFullYear();

var dateString = (d <= 9 ? '0' + d : d) + '-' + (m <= 9 ? '0' + m : m) + '-' + y;
 
 Note:
Use third party JavaScript Date library like datejs.com or momentjs.com to work with Dates extensively in JavaScript.
Compare Dates in JavaScript
Use comparison operators to compare two date objects.

Example: Date Comparison
var date1 = new Date('4-1-2015');
var date2 = new Date('4-2-2015');

if (date1 > date2)
    alert(date1 + ' is greater than ' + date2);
else (date1 < date2 )
    alert(date1 + ' is less than ' + date2);


# Date Methods Reference
The following table lists all the get methods of Date object.

Method	Description
getDate()	Returns numeric day (1 - 31) of the specified date.
getDay()	Returns the day of the week (0 - 6) for the specified date.
getFullYear()	Returns four digit year of the specified date.
getHours()	Returns the hour (0 - 23) in the specified date.
getMilliseconds()	Returns the milliseconds (0 - 999) in the specified date.
getMinutes()	Returns the minutes (0 - 59) in the specified date.
getMonth()	Returns the month (0 - 11) in the specified date.
getSeconds()	Returns the seconds (0 - 59) in the specified date.
getTime()	Returns the milliseconds as number since January 1, 1970, 00:00:00 UTC.
getTimezoneOffset()	Returns the time zone offset in minutes for the current locale.
getUTCDate()	Returns the day (1 - 31) of the month of the specified date as per UTC time zone.
getUTCDay()	Returns the day (0 - 6) of the week of the specified date as per UTC timezone.
getUTCFullYear()	Returns the four digits year of the specified date as per UTC time zone.
getUTCHours()	Returns the hours (0 - 23) of the specified date as per UTC time zone.
getUTCMilliseconds()	Returns the milliseconds (0 - 999) of the specified date as per UTC time zone.
getUTCMinutes()	Returns the minutes (0 - 59) of the specified date as per UTC time zone.
getUTCMonth()	Returns the month (0 - 11) of the specified date as per UTC time zone.
getUTCSeconds()	Returns the seconds (0 - 59) of the specified date as per UTC time zone.
getYear()	Returns the no of years of the specified date since 1990. This method is Deprecated
The following table lists all the set methods of Date object.

Method	Description
setDate()	Sets the day as number in the date object.
setFullYear()	Sets the four digit full year as number in the date object. Optionally set month and date.
setHours()	Sets the hours as number in the date object. Optionally set minutes, seconds and milliseconds.
setMilliseconds()	Sets the milliseconds as number in the date object.
setMinutes()	Sets the minutes as number in the date object. Optionally set seconds & milliseconds.
setMonth()	Sets the month as number in the date object. Optionally set date.
setSeconds()	Sets the seconds as number in the date object. Optionally set milliseconds.
setTime()	Sets the time as number in the Date object since January 1, 1970, 00:00:00 UTC.
setUTCDate()	Sets the day in the date object as per UTC time zone.
setUTCFullYear()	Sets the full year in the date object as per UTC time zone
setUTCHours()	Sets the hour in the date object as per UTC time zone
setUTCMilliseconds()	Sets the milliseconds in the date object as per UTC time zone
setUTCMinutes()	Sets the minutes in the date object as per UTC time zone
setUTCMonth()	Sets the month in the date object as per UTC time zone
setUTCSeconds()	Sets the seconds in the date object as per UTC time zone
setYear()	Sets the year in the date object. This method is Deprecated
toDateString()	Returns the date segment from the specified date, excludes time.
toGMTString()	Returns a date string in GMT time zone.
toLocaleDateString()	Returns the date segment of the specified date using the current locale.
toLocaleFormat()	Returns a date string in default format.
toLocaleString()	Returns a date string using a current locale format.
toLocaleTimeString()	Returns the time segment of the specified Date as a string.
toString()	Returns a string for the specified Date object.
toTimeString()	Returns the time segment as a string from the specified date object.
toUTCString()	Returns a string as per UTC time zone.
valueOf()	Returns the primitive value of a Date object.


# JavaScript Date Formats

Source : https://www.w3schools.com/js/js_date_formats.asp

*JavaScript Date Input*

There are generally 3 types of JavaScript date input formats:

Type       | Example
-----------|------------------------------------------
ISO Date   | "2015-03-25" (The International Standard)
Short Date | "03/25/2015"
Long Date  | "Mar 25 2015" or "25 Mar 2015"

The ISO format follows a strict standard in JavaScript.

The other formats are not so well defined and might be browser specific.

*JavaScript Date Output*

Independent of input format, JavaScript will (by default) output dates in full text string format:

Tue Jun 13 2023 14:04:58 GMT+0300 (GMT+03:00)
JavaScript ISO Dates
ISO 8601 is the international standard for the representation of dates and times.

The ISO 8601 syntax (YYYY-MM-DD) is also the preferred JavaScript date format:

Example (Complete date)
const d = new Date("2015-03-25");
The computed date will be relative to your time zone.
Depending on your time zone, the result above will vary between March 24 and March 25.

ISO Dates (Year and Month)
ISO dates can be written without specifying the day (YYYY-MM):

Example
const d = new Date("2015-03");
Time zones will vary the result above between February 28 and March 01.

ISO Dates (Only Year)
ISO dates can be written without month and day (YYYY):

Example
const d = new Date("2015");
Time zones will vary the result above between December 31 2014 and January 01 2015.

ISO Dates (Date-Time)
ISO dates can be written with added hours, minutes, and seconds (YYYY-MM-DDTHH:MM:SSZ):

Example
const d = new Date("2015-03-25T12:00:00Z");
Date and time is separated with a capital T.

UTC time is defined with a capital letter Z.

If you want to modify the time relative to UTC, remove the Z and add +HH:MM or -HH:MM instead:

Example
const d = new Date("2015-03-25T12:00:00-06:30");
UTC (Universal Time Coordinated) is the same as GMT (Greenwich Mean Time).

Omitting T or Z in a date-time string can give different results in different browsers.

Time Zones
When setting a date, without specifying the time zone, JavaScript will use the browser's time zone.

When getting a date, without specifying the time zone, the result is converted to the browser's time zone.

In other words: If a date/time is created in GMT (Greenwich Mean Time), the date/time will be converted to CDT (Central US Daylight Time) if a user browses from central US.

JavaScript Short Dates.
Short dates are written with an "MM/DD/YYYY" syntax like this:

Example
const d = new Date("03/25/2015");
WARNINGS !
In some browsers, months or days with no leading zeroes may produce an error:

const d = new Date("2015-3-25");
The behavior of "YYYY/MM/DD" is undefined.
Some browsers will try to guess the format. Some will return NaN.

const d = new Date("2015/03/25");
The behavior of  "DD-MM-YYYY" is also undefined.
Some browsers will try to guess the format. Some will return NaN.

const d = new Date("25-03-2015");
JavaScript Long Dates.
Long dates are most often written with a "MMM DD YYYY" syntax like this:

Example
const d = new Date("Mar 25 2015");
Month and day can be in any order:

Example
const d = new Date("25 Mar 2015");
And, month can be written in full (January), or abbreviated (Jan):

Example
const d = new Date("January 25 2015");
Example
const d = new Date("Jan 25 2015");
Commas are ignored. Names are case insensitive:

Example
const d = new Date("JANUARY, 25, 2015");
Date Input - Parsing Dates
If you have a valid date string, you can use the Date.parse() method to convert it to milliseconds.

Date.parse() returns the number of milliseconds between the date and January 1, 1970:

Example
let msec = Date.parse("March 21, 2012");
You can then use the number of milliseconds to convert it to a date object:

Example
let msec = Date.parse("March 21, 2012");
const d = new Date(msec);