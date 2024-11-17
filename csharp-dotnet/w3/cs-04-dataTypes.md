
- [C# Data Types](#c-data-types)
  - [Numbers](#numbers)
  - [Booleans](#booleans)
  - [Characters](#characters)
  - [Strings](#strings)
- [C# Type Casting](#c-type-casting)
- [Art - DateTime](#art---datetime)
  - [C# DateTime with Different Culture](#c-datetime-with-different-culture)
  - [What is DateTimeOffset?](#what-is-datetimeoffset)
  - [Working with TimeSpan](#working-with-timespan)
- [Art : DateOnly - TimeOnly (link)](#art--dateonly---timeonly-link)

Source : https://www.w3schools.com/cs/cs_data_types.php

# C# Data Types

As explained in the variables chapter, a variable in C# must be a specified data type:

Example

```cs
int myNum = 5;               // Integer (whole number)
double myDoubleNum = 5.99D;  // Floating point number
char myLetter = 'D';         // Character
bool myBool = true;          // Boolean
string myText = "Hello";     // String

```

A data type specifies the size and type of variable values.

It is important to use the correct data type for the corresponding variable; to avoid errors, to save time and memory, but it will also make your code more maintainable and readable. The most common data types are:

Data Type | Size                  | Description
----------|-----------------------|----------------------------------------------------------------------------------
int       | 4 bytes               | Stores whole numbers from -2,147,483,648 to 2,147,483,647
long      | 8 bytes               | Stores whole numbers from -9,223,372,036,854,775,808 to 9,223,372,036,854,775,807
float     | 4 bytes               | Stores fractional numbers. Sufficient for storing 6 to 7 decimal digits
double    | 8 bytes               | Stores fractional numbers. Sufficient for storing 15 decimal digits
bool      | 1 bit                 | Stores true or false values
char      | 2 bytes               | Stores a single character/letter, surrounded by single quotes
string    | 2 bytes per character | Stores a sequence of characters, surrounded by double quotes

## Numbers

Number types are divided into two groups:

- Integer types stores whole numbers, positive or negative (such as 123 or -456), without decimals. Valid types are int and long. Which type you should use, depends on the numeric value.

- Floating point types represents numbers with a fractional part, containing one or more decimals. Valid types are float and double.

Even though there are many numeric types in C#, the most used for numbers are int (for whole numbers) and double (for floating point numbers). However, we will describe them all as you continue to read.

*Integer Types*

*Int*

The int data type can store whole numbers from -2147483648 (10digit)to 2147483647. In general, and in our tutorial, the int data type is the preferred data type when we create variables with a numeric value.

Example

```cs
int myNum = 100000;
Console.WriteLine(myNum);

```

*Long*

The long data type can store whole numbers from -9223372036854775808 to 9223372036854775807. This is used when int is not large enough to store the value. Note that you should end the value with an "L":

Example

```cs
long myNum = 15000000000L;
Console.WriteLine(myNum);

```

*Floating Point Types*

You should use a floating point type whenever you need a number with a decimal, such as 9.99 or 3.14515.

The float and double data types can store fractional numbers. Note that you should end the value with an "F" for floats and "D" for doubles:

Float Example

```cs
float myNum = 5.75F;
Console.WriteLine(myNum);

Double Example
double myNum = 19.99D;
Console.WriteLine(myNum);

```

*Use float or double?*

The precision of a floating point value indicates how many digits the value can have after the decimal point. The precision of float is only six or seven decimal digits, while double variables have a precision of about 15 digits. Therefore it is safer to use double for most calculations.

Scientific Numbers
A floating point number can also be a scientific number with an "e" to indicate the power of 10:

Example
```cs
float f1 = 35e3F;
double d1 = 12E4D;
Console.WriteLine(f1);
Console.WriteLine(d1);

```

## Booleans

A boolean data type is declared with the bool keyword and can only take the values true or false:

Example

```cs
bool isCSharpFun = true;
bool isFishTasty = false;
Console.WriteLine(isCSharpFun);   // Outputs True
Console.WriteLine(isFishTasty);   // Outputs False

```

Boolean values are mostly used for conditional testing, which you will learn more about in a later chapter.

## Characters

The char data type is used to store `a single character`. The character must be surrounded by single quotes, like 'A' or 'c':

Example

```cs
char myGrade = 'B';
Console.WriteLine(myGrade);

```

## Strings

The string data type is used to store `a sequence of characters (text)`. String values must be surrounded by double quotes:

Example

```cs
string greeting = "Hello World";
Console.WriteLine(greeting);

```

# C# Type Casting

Type casting is when you assign a value of one data type to another type.

In C#, there are two types of casting:

➖ Implicit Casting (automatically) - converting a smaller type to a larger type size

char -> int -> long -> float -> double

➖ Explicit Casting (manually) - converting a larger type to a smaller size type

double -> float -> long -> int -> char

🔔 Implicit Casting

Implicit casting is done automatically when passing a smaller size type to a larger size type:

Example

```css
int myInt = 9;
double myDouble = myInt;       // Automatic casting: int to double

Console.WriteLine(myInt);      // Outputs 9
Console.WriteLine(myDouble);   // Outputs 9

```

🔔 Explicit Casting

Explicit casting must be done manually by placing the type in parentheses in front of the value:

Example

```cs
double myDouble = 9.78;
int myInt = (int) myDouble;    // Manual casting: double to int

Console.WriteLine(myDouble);   // Outputs 9.78
Console.WriteLine(myInt);      // Outputs 9

```

🔔 Type Conversion Methods

It is also possible to convert data types explicitly by using built-in methods, such as `Convert.ToBoolean, Convert.ToDouble, Convert.ToString, Convert.ToInt32 (int) and Convert.ToInt64 (long)`:

Example

```cs
int myInt = 10;
double myDouble = 5.65;
bool myBool = true;

Console.WriteLine(Convert.ToString(myInt));    // convert int to string
Console.WriteLine(Convert.ToDouble(myInt));    // convert int to double
Console.WriteLine(Convert.ToInt32(myDouble));  // convert double to int
Console.WriteLine(Convert.ToString(myBool));   // convert bool to string

// -- Output --
// 10
// 10
// 6
// True

```

*Why Conversion?*

Many times, there's no need for type conversion. But sometimes you have to. Take a look at the User Input chapter, when working with user input, to see an example of this.


# Art - DateTime

Source : https://www.c-sharpcorner.com/article/datetime-in-c-sharp/ , By Manas Mohapatra, Jun 01, 2023

Date and Time in C# are two commonly used data types. Both Date and Time in C# are represented using C# DateTime class. 

In this detailed tutorial, we will learn the following:

- C# DateTime structure
- DateTime Constructor, Field, Methods and Properties
- Operators in DateTime
- DateTime Formatting
- Managing Nullable DateTime
- Parse to DateTime object from String
- Working with Calendars
- Working with TimeZone
- DateTime with different Culture
- Starting with DateTimeOffSet
- TimeSpan features

Note: The aim of this article is to provide the overall idea of DateTime object and how we can work with different cultures, timezones, formatting etc. This article provides so many features of DateTime object which are collected from various sources.

➖ DateTime in C#

C# DateTime is a structure of value Type like int, double etc. It is available in System namespace and present in `mscorlib.dll` assembly. It implements interfaces like `IComparable, IFormattable, IConvertible, ISerializable, IComparable, IEquatable`. 

```cs
public struct DateTime : IComparable, IFormattable, IConvertible, ISerializable, IComparable<DateTime>, IEquatable<DateTime>
{
     // Contains methods and properties
}

```

DateTime helps developer to find out more information about Date and Time like Get month, day, year, week day. It also helps to find date difference, add number of days to a date, etc.

➖ DateTime Constructor

It initializes a new instance of DateTime object. At the time of object creation we need to pass required parameters like year, month, day, etc. It contains around 11 overload methods. More details available here.

```cs
// 2015 is year, 12 is month, 25 is day
DateTime date1 = new DateTime(2015, 12, 25);
Console.WriteLine(date1.ToString()); // 12/25/2015 12:00:00 AM

// 2015 - year, 12 - month, 25 – day, 10 – hour, 30 – minute, 50 - second
DateTime date2 = new DateTime(2012, 12, 25, 10, 30, 50);
Console.WriteLine(date1.ToString());// 12/25/2015 10:30:00 AM }

```

➖ DateTime Fields

DateTime object contains two static read-only fields called as MaxValue and Minvalue.

- MinValue – It provides smallest possible value of DateTime.

```cs
// Define an uninitialized date.
Console.Write(DateTime.MinValue); // 1/1/0001 12:00:00 AM

```

- MaxValue – It provides maximum possible value of DateTime. 

```cs
// Define an uninitialized date.
Console.Write(DateTime.MaxValue); // 12/31/9999 11:59:59 PM

```
--*TBC - cs date

➖ DateTime Methods

DateTime contains a variety of methods which help to manipulate DateTime Object. It helps to add number of days, hour, minute, seconds to a date, date difference, parsing from string to datetime object, get universal time and many more. More on DateTime Methods, visit here (https://msdn.microsoft.com/en-us/library/system.datetime_methods(v=vs.110).aspx)

Here are a couple of DateTime Methods: 

```cs

// Creating TimeSpan object of one month(as 30 days)
System.TimeSpan duration = new System.TimeSpan(30, 0, 0, 0);
System.DateTime newDate1 = DateTime.Now.Add(duration);
System.Console.WriteLine(newDate1); // 1/19/2016 11:47:52 AM

// Adding days to a date
DateTime today = DateTime.Now; // 12/20/2015 11:48:09 AM
DateTime newDate2 = today.AddDays(30); // Adding one month(as 30 days)
Console.WriteLine(newDate2); // 1/19/2016 11:48:09 AM

// Parsing
string dateString = "Wed Dec 30, 2015";
DateTime dateTime12 = DateTime.Parse(dateString); // 12/30/2015 12:00:00 AM

// Date Difference
System.DateTime date1 = new System.DateTime(2015, 3, 10, 2, 15, 10);
System.DateTime date2 = new System.DateTime(2015, 7, 15, 6, 30, 20);
System.DateTime date3 = new System.DateTime(2015, 12, 28, 10, 45, 30);

// diff1 gets 127 days, 04 hours, 15 minutes and 10 seconds.
System.TimeSpan diff1 = date2.Subtract(date1); // 127.04:15:10
// date4 gets 8/23/2015 6:30:20 AM
System.DateTime date4 = date3.Subtract(diff1);
// diff2 gets 166 days 4 hours, 15 minutes and 10 seconds.
System.TimeSpan diff2 = date3 - date2; //166.04:15:10
// date5 gets 3/10/2015 2:15:10 AM
System.DateTime date5 = date2 - diff1;

// Universal Time
DateTime dateObj = new DateTime(2015, 12, 20, 10, 20, 30);
Console.WriteLine("mans" + dateObj.ToUniversalTime()); // 12/20/2015 4:50:30 AM

```

➖ *DateTime Properties*

It contains properties like Day, Month, Year, Hour, Minute, Second, DayOfWeek and others in a DateTime object.

```cs
DateTime myDate = new DateTime(2015, 12, 25, 10, 30, 45);
int year = myDate.Year; // 2015
int month = myDate.Month; //12
int day = myDate.Day; // 25
int hour = myDate.Hour; // 10
int minute = myDate.Minute; // 30
int second = myDate.Second; // 45
int weekDay = (int)myDate.DayOfWeek; // 5 due to Friday

```

➖ *DayOfWeek*

It specifies day of the week like Sunday, Monday etc. It is an enum which starts from Sunday to Saturday. If you cast the weekofday value to integer then it starts from Zero (0) for Sunday to Six (6) for Saturday.

```cs
DateTime dt = new DateTime(2015, 12, 25);
bool isEqual = dt.DayOfWeek == DayOfWeek.Thursday); // False
bool isEqual = dt.DayOfWeek == DayOfWeek.Friday); // True

```

➖ *DateTimeKind*

It specifies whether a DateTime object is Unspecified, Utc or Local time. It is enum type with values: Unspecified(0), Utc(1), Local(2).

```cs
DateTime saveNow = DateTime.Now;
DateTime saveUtcNow = DateTime.UtcNow;

DateTime myDate = DateTime.SpecifyKind(saveUtcNow, DateTimeKind.Utc); // 12/20/2015 12:17:18 PM
DateTime myDate2 = DateTime.SpecifyKind(saveNow, DateTimeKind.Local); // 12/20/2015 5:47:17 PM

Console.WriteLine("Kind: " + myDate.Kind); // Utc
Console.WriteLine("Kind: " + myDate2.Kind); // Local

```

More on DateTime properties visit here. (https://msdn.microsoft.com/en-us/library/system.datetime_properties(v=vs.110).aspx)

➖ *DateTime Operators*

DateTime object facilitates to perform addition, subtraction, equality, greater than using operators like “+”, “-”, “==” etc. Here are couples of examples:

```cs
// It is 10th December 2015
System.DateTime dtObject = new System.DateTime(2015, 12, 10); // 12/10/2015 12:00:00 AM
// TimeSpan object with 15 days, 10 hours, 5 minutes and 1 second.
System.TimeSpan timeSpan = new System.TimeSpan(15, 10, 5, 1);
System.DateTime addResult = dtObject + timeSpan; // 12/25/2015 10:05:01 AM
System.DateTime substarctResult = dtObject - timeSpan; // 11/24/2015 1:54:59 PM

DateTime dec25 = new DateTime(2015, 12, 25);
DateTime dec15 = new DateTime(2015, 12, 15);

// areEqual gets false.
bool areEqual = dec25 == dec15;
DateTime newDate = new DateTime(2015, 12, 25);
// areEqual gets true.
areEqual = dec25 == newDate

```

More on operators, please visit here (https://msdn.microsoft.com/en-us/library/system.datetime_operators(v=vs.110).aspx)

➖ *DateTime Formatting*

Different users need different kinds of  format date. For instance some users need date like "mm/dd/yyyy", some need "dd-mm-yyyy". Let's say current Date Time is "12/8/2015 3:15:19 PM" and as per specifier you will get below output.

DateTime tempDate = new DateTime(2015, 12, 08); // creating date object with 8th December 2015
Console.WriteLine(tempDate.ToString("MMMM dd, yyyy")); //December 08, 2105.
C#
Below specifiers will help you to get the date in different formats.

Specifier|	Description	|Output
--|--|--|
d	|Short Date	|12/8/2015
D	|Long Date	|Tuesday, December 08, 2015
t	|Short Time	|3:15 PM
T	|Long Time	|3:15:19 PM
f	|Full date and time	|Tuesday, December 08, 2015 3:15 PM
F	|Full date and time (long)	|Tuesday, December 08, 2015 3:15:19 PM
g	|Default date and time	|12/8/2015 15:15
G	|Default date and time (long)	|12/8/2015 15:15
M	|Day / Month	|8-Dec
r	|RFC1123 date	|Tue, 08 Dec 2015 15:15:19 GMT
s	|Sortable date/time	|2015-12-08T15:15:19
u	|Universal time, local timezone	|2015-12-08 15:15:19Z
Y	|Month / Year	|December, 2015
dd	|Day	|8
ddd	|Short Day Name	|Tue
dddd	|Full Day Name	|Tuesday
hh	|2 digit hour	|3
HH	|2 digit hour (24 hour)	|15
mm	|2 digit minute	|15
MM	|Month	|12
MMM	|Short Month name	|Dec
MMMM	|Month name	|December
ss	|seconds	|19
fff	|milliseconds	|120
FFF	|milliseconds without trailing zero	|12
tt	|AM/PM	|PM
yy	|2 digit year	|15
yyyy	|4 digit year	|2015
:	|Hours, minutes, seconds separator, e.g. {0:hh:mm:ss}	|9:08:59
/	|Year, month , day separator, e.g. {0:dd/MM/yyyy}	|8/4/2007

*Handling Nullable DateTime*

DateTime is a Value Type like int, double etc. so there is no way to assign a null value. When a type can be assigned null it is called nullable, that means the type has no value. All Reference Types are nullable by default, e.g. String, and all ValueTypes are not, e.g. Int32. The Nullable<T> structure is using a value type as a nullable type.

By default DateTime is not nullable because it is a *Value Type*, using the nullable operator introduced in C#, you can achieve this using a question mark (?) after the type or using the generic style Nullable.

```cs
Nullable <DateTime> nullDateTime;

DateTime? nullDateTime = null;

```

*Parse string to DateTime object*

Sometimes we do parsing from string to DateTime object to perform operations like date difference, weekday, month name etc. For instance, there is a string value (“12/10/2015”) and our requirement is to find out weekday (Sunday or Monday and so on) of date. In this scenario we need to convert string value to DateTime object and then use WeekDay property(obj.WeekDay) to find out weekday. We can accomplish the same by built-in methods like Convert.ToDateTime(), DateTime.Parse(), DateTime.ParseExact(), DateTime.TryParse(), DateTime.TryParseExact(). Here are a few examples of how to parse a string to DateTime object:

```cs
CultureInfo culture = new CultureInfo("en-US");

DateTime dateTimeObj = Convert.ToDateTime("10/22/2015 12:10:15 PM", culture);
DateTime dateTimeObj = DateTime.Parse("10/22/2015 12:10:15 PM");
DateTime dateTimeObj = DateTime.ParseExact("10-22-2015", "MM-dd-yyyy", provider); // 10/22/2015 12:00:00 AM

DateTime dateTimeObj; // 10-22-2015 12:00:00 AM
bool isSuccess = DateTime.TryParse("10-22-2015", out dateTimeObj); // True

DateTime dateTimeObj; // 10/22/2015 12:00:00 AM
CultureInfo provider = CultureInfo.InvariantCulture;
bool isSuccess = DateTime.TryParseExact("10-22-2015", "MM-dd-yyyy", provider, DateTimeStyles.None, out dateTimeObj); // True

```

Now a question arises in your mind, that is, why do we have so many methods for parsing? The reason is every method is for a different purpose. Use TryParse() when you want to be able to attempt a parse and handle invalid data immediately (instead of throwing the exception), and ParseExact() when the format you are expecting is not a standard format, or when you want to limit to one particular standard format for efficiency. If you're sure the string is a valid DateTime, and you know the format, you could also consider the DateTime.ParseExact() or DateTime.TryParseExact() methods.

More on this visit here.
 
➖ *Working with Calendars*

Although DateTime object stores Date and Time information but it also depends on Calendar. Calendar class is an abstract class which is present in System.Globalization namespace. There are different types of Calendar available in .Net framework. These are ChineseLunisolarCalendar, GregorianCalendar, HebrewCalendar, HijriCalendar, JapaneseCalendar, JapaneseLunisolarCalendar, JulianCalendar, KoreanCalendar, KoreanLunisolarCalendar, PersianCalendar, TaiwanCalendar, TaiwanLunisolarCalendar, ThaiBuddhistCalendar, UmAlQuraCalendar.

Calendar can be used in two ways:

- Using CultureInfo object
- Using Calendar object. It is for Calendars that are independent of culture: ChineseLunisolarCalendar, JapaneseLunisolarCalendar, JulianCalendar, KoreanLunisolarCalendar,PersianCalendar and TaiwanLunisolarCalendar. 

You can know your current Calendar information using following code:

```cs
CultureInfo currentCulture = Thread.CurrentThread.CurrentCulture;
Calendar cl = currentCulture.Calendar; // System.Globalization.GregorianCalendar
string temip = cl.ToString().Replace("System.Globalization.", "");

// 4th Jan 2016 - current date
Calendar calendar = new HijriCalendar();
DateTime dt10 = new DateTime(2016, 01, 04, calendar);// Uses month 13!
Console.WriteLine("HijriCalendar year: " + dt10.Year); // 2141
Console.WriteLine("HijriCalendar month: " + dt10.Month); // 9
Console.WriteLine("HijriCalendar total date: " + dt10.ToString("d")); // 9

// Converting one Calendar value to another - Option1
var calendar1 = new HijriCalendar();
var hijriYear = calendar1.GetYear(DateTime.Now); // 1437
var hijriMonth = calendar1.GetMonth(DateTime.Now); // 3
var hijriDay = calendar1.GetDayOfMonth(DateTime.Now); // 24

//- Option2
DateTime utc = DateTime.Now;
var ci = CultureInfo.CreateSpecificCulture("ar-SA");
string s = utc.ToString(ci); // 24/03/37 08:15:03 ?
A calendar divides into multiple eras. In .Net framework it supports only one era except JapaneseCalendar (supports multiple).

Calendar cal = new JapaneseCalendar();
foreach (int era in cal.Eras) {
DateTime date2 = cal.ToDateTime(year, month, day, 0, 0, 0, 0, era);

Console.WriteLine("{0}/{1}/{2} era {3} in Japanese Calendar -> {4:d} in Gregorian",
cal.GetMonth(date2), cal.GetDayOfMonth(date2),
cal.GetYear(date2), cal.GetEra(date2), date2);

```

➖ *Working with TimeZone object*

TimeZoneInfo class represents world time like Indian Standard Time (IST), US Eastern Standard Time, Tokyo Standard Time etc. It is present in System namespace. It recognizes Local Time Zone and converts times between Coordinated Universal Time (UTC) and local time. It helps to get time in Time Zone (Indis or Japan or USA), converts time between two Time Zone(Australia time zone to India Standard time) and serializes a Date Time.

It is a sealed class and you can’t create an instance of this class. You need to call static members and methods. Static methods like CreateCustomTimeZone(), FindSystemTimeZoneById(), FromSerializedString(), GetSystemTimeZonesand properties like Utc and Local. Here area couple examples:

```cs
//If you want to convert it back from UTC:
DateTime now = DateTime.UtcNow;
DateTime tempD = TimeZone.CurrentTimeZone.ToLocalTime(now);
// Get current TimeZone
string current = TimeZone.CurrentTimeZone.StandardName;

// Get All Time Zones
foreach (TimeZoneInfo z in TimeZoneInfo.GetSystemTimeZones())
{
    Console.WriteLine(z.Id);
}

//If you want to convert any date from your time-zone to UTC do this:
DateTime tempD1 = TimeZone.CurrentTimeZone.ToUniversalTime(DateTime.Now);

// Get Tokyo Standard Time zone from Local time Zone(India)
TimeZoneInfo tzObject = TimeZoneInfo.FindSystemTimeZoneById("Tokyo Standard Time");
DateTime tstTime = TimeZoneInfo.ConvertTime(DateTime.Now, TimeZoneInfo.Local, tzObject);
Console.WriteLine("1. Time in {0} zone: {1}", tzObject.IsDaylightSavingTime(tstTime) ?
tzObject.DaylightName : tzObject.StandardName, tstTime);

// Converting Austrlia Standard Time to Indian Standrd Time
TimeZoneInfo tzObject1 = TimeZoneInfo.FindSystemTimeZoneById("AUS Central Standard Time");
DateTime tstTime2 = TimeZoneInfo.ConvertTime(DateTime.Now, TimeZoneInfo.Local, tzObject1);
Console.WriteLine("2. Time in {0} zone: {1}", tzObject1.IsDaylightSavingTime(tstTime2) ?
tzObject1.DaylightName : tzObject1.StandardName, tstTime2);

// Converting value to UTC time zone to make comfortale with TimeZone
DateTime ut1 = TimeZoneInfo.ConvertTimeToUtc(tstTime2, tzObject1);

TimeZoneInfo tzObject2 = TimeZoneInfo.FindSystemTimeZoneById("India Standard Time");
DateTime tstTime3 = TimeZoneInfo.ConvertTime(ut1, TimeZoneInfo.Utc, tzObject2);
Console.WriteLine("3. Time in {0} zone: {1}", tzObject2.IsDaylightSavingTime(tstTime3) ?
tzObject2.DaylightName : tzObject2.StandardName, tstTime3);

```

## C# DateTime with Different Culture

.Net uses CultureInfo class for providing information about specific culture. The information is writing system, date, number, string, and calendar. It is present in System.Globalization namespace.


```cs
// Current culture name
string currentCulture = Thread.CurrentThread.CurrentCulture.DisplayName;

DateTime currentTime = DateTime.Now; //"1/9/2016 10:22:45 AM"
//// Getting DateTime based on culture.
string dateInUSA = currentTime.ToString("D", new CultureInfo("en-US")); // USA - Saturday, January 09, 2016
string dateInHindi = currentTime.ToString("D", new CultureInfo("hi-IN")); // Hindi - 09 ????? 2016
string dateInJapan = currentTime.ToString("D", new CultureInfo("ja-JP")); // Japan - 2016?1?9?
string dateInFrench = currentTime.ToString("D", new CultureInfo("fr-FR")); // French - samedi 9 janvier 2016

string dateInOriya = currentTime.ToString("D", new CultureInfo("or")); // Oriya - 09 ???????? 2016
// Convert Hindi Date to French Date
DateTime originalResult = new DateTime(2016, 01, 09);
// Converting Hindi Date to DateTime object
bool success = DateTime.TryParse(dateInHindi, new System.Globalization.CultureInfo("hi-IN"),
System.Globalization.DateTimeStyles.None, out originalResult);

// Next convert current date to French date
string frenchTDate = originalResult.ToString("D", new CultureInfo("fr-FR")); // French - samedi 9 janvier 2016

// To get DatePattern from Culture
CultureInfo fr = new CultureInfo("fr-FR");
string shortUsDateFormatString = fr.DateTimeFormat.LongDatePattern;
string shortUsTimeFormatString = fr.DateTimeFormat.ShortTimePattern;

// To get all installed culture in .Net version
foreach (CultureInfo ci in CultureInfo.GetCultures(CultureTypes. AllCultures))
{
    Console.WriteLine(ci.Name + ", " + ci.EnglishName);
}

```
## What is DateTimeOffset?

It is a structure type like DateTime. It is introduced in .Net framework 3.5 and present in System namespace. It is mostly relative to Universal Coordinated Time (UTC).

DateTimeOffset is Date + Time + Offset. It provides precise information because it contains offset from Date and Time is taken. DateTimeOffset provides same properties as DateTime structure like Day, Month, Year, Hour, Minute, Second etc. However DateTimeOffset has some new properties:

- DateTime - Gets the DateTime portion of the value without regard to the offset.
- LocalDateTime - Returns a DateTime representing the value in respect to the local time zone.
- Offset - Returns the time offset from UTC.
- UtcDateTime - Returns a DateTime representing the value in respect to UTC time. 

Follow example, we declare date variable of DateTimeOffset type and assign current DateTime to it. You will get a result like: 1/9/2016 2:27:00 PM +05:30. Here “1/9/2016 2:27:00 PM” is datetime and “+05:30” (5 hours 30 minutes) is your Offset value. Means if you add offset value to date time (1/9/2016 2:27:00 PM) you will get UTC time. It provides a better way to work with different times from different time zones.

```cs
// Original time: 1/9/2016 2:27:00 PM
DateTimeOffset date = DateTimeOffset.Now; // 1/9/2016 2:27:00 PM +05:30

// You can get Offset value using Offset property
DateTimeOffset dateTimeObj = DateTime.Now;
dateTimeObj.Offset.Hours // 5
dateTimeObj.Offset.Minutes //30
dateTimeObj.Offset.Seconds // 0

// Get only DateTime from DateTimeOffset
dateTimeObj.DateTime // 1/9/2016 2:27:00 PM

// Get Utc time from DateTime Offset
dateTimeObj.UtcDateTime.ToString() // 1/9/2016 7:57:00 PM

// Get Utc from local time
DateTime utcTimeObj = DateTimeOffset.Parse(DateTime.Now.ToString()).UtcDateTime;

// Another way to get Utc from local time
DateTime utcTimeObj = DateTime.Now.ToUniversalTime();

// Get local time from Utc time
DateTime localVersion = DateTime.UtcNow.ToLocalTime();

// Another way to get local(India) time from Utc time
localVersion = TimeZoneInfo.ConvertTimeFromUtc(DateTime.UtcNow, TimeZoneInfo.FindSystemTimeZoneById("India Standard Time"));

```

DateTime is a more powerful structure for manipulating datetime but it is less portable when working with times from different time zones. The DateTimeOffset is much more portable in that it preserves the offset from UTC. So choose as per your requirement.

## Working with TimeSpan

It is a structure type which is present in System namespace. It represents time interval and can be expressed as days, hours, minutes, and seconds. It helps to fetch days, hour, minutes and seconds between two dates.

You can create instance of TimeSpan object. It contains 4 parameterized constructors which take days, hours, minutes, seconds, and milliseconds as parameter. Here is the example:

```cs
TimeSpan ts = new TimeSpan(10, 40, 20); // 10 - hour, 40 - minute, 20 - second
TimeSpan ts1 = new TimeSpan(1, 2, 5, 10); // 1 - day, 2 - hour, 5 - minute, 10 – seconds

// You can add TimeSpan with DateTime object as well as TimeSpan object.
TimeSpan ts = new TimeSpan(10, 40, 20); // 10 - hour, 40 - minute, 20 - second
TimeSpan ts1 = new TimeSpan(1, 2, 5, 10); // 1 - day, 2 - hour, 5 - minute, 10 – seconds

DateTime tt = DateTime.Now + ts; // Addition with DateTime
ts.Add(ts1); // Addition with TimeSpan Object

```

A single tick represents one hundred nanoseconds or one ten-millionth of a second. There are 10,000 ticks in a millisecond, or 10 million ticks in a second.

```cs
TimeSpan ts3 = new TimeSpan(10000000);
double secondFromTs = ts3.TotalSeconds; // 1 second
Console.WriteLine(secondFromTs);

```

Below is the example of how to get the exact date difference between them using TimeSpan: 

```cs
// Define two dates.
DateTime date1 = new DateTime(2016, 1, 10, 11, 20, 30);
DateTime date2 = new DateTime(2016, 2, 20, 12, 25, 35);

// Calculate the interval between the two dates.
TimeSpan interval = date2 - date1;

// Display individual properties of the resulting TimeSpan object.
Console.WriteLine("No of Days:", interval.Days); // 41
Console.WriteLine("Total No of Days:", interval.TotalDays); // 41.0451
Console.WriteLine("No of Hours:", interval.Hours); //1
Console.WriteLine("Total No of Hours:", interval.TotalHours); // 985.084
Console.WriteLine("No of Minutes:", interval.Minutes); // 5
Console.WriteLine("Total No of Minutes:", interval.TotalMinutes); // 59105.833
Console.WriteLine("No of Seconds:", interval.Seconds); // 5
Console.WriteLine("Total No of Seconds:", interval.TotalSeconds); // 3546305.0
Console.WriteLine("No of Milliseconds:", interval.Milliseconds); // 0
Console.WriteLine("Total No of Milliseconds:", interval.TotalMilliseconds); // 3546305000
Console.WriteLine("Ticks:", interval.Ticks); // 354630500000000

```

Here you will get one doubt as to the difference between Hours and TotalHours. Hours property represents difference between two dates hours value (12-11). However TotalHours represents total number of hours difference between two dates. First it calculates days between two and then multiplies 24 hours into it.

➖ *Conclusion*

In this article we discussed about DateTime object in C#. It also contains how to work with different cultures, timezones, formmatting, date differences and others. Hope it will help you often.

# Art : DateOnly - TimeOnly (link)

Source : https://dev.to/karenpayneoregon/learn-dateonly-timeonly-23j0 , By Karen Payne


---

[Back](readme.md)