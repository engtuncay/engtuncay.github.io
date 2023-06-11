
- [C# Data Types](#c-data-types)
  - [Numbers](#numbers)
  - [Booleans](#booleans)
  - [Characters](#characters)
  - [Strings](#strings)
- [C# Type Casting](#c-type-casting)
- [DateTime](#datetime)
  - [C# DateTime with Different Culture](#c-datetime-with-different-culture)
  - [What is DateTimeOffset?](#what-is-datetimeoffset)
  - [Working with TimeSpan](#working-with-timespan)
- [DateOnly - TimeOnly](#dateonly---timeonly)
- [DateTime in C#](#datetime-in-c)

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
float f1 = 35e3F;
double d1 = 12E4D;
Console.WriteLine(f1);
Console.WriteLine(d1);

## Booleans

A boolean data type is declared with the bool keyword and can only take the values true or false:

Example
bool isCSharpFun = true;
bool isFishTasty = false;
Console.WriteLine(isCSharpFun);   // Outputs True
Console.WriteLine(isFishTasty);   // Outputs False

Boolean values are mostly used for conditional testing, which you will learn more about in a later chapter.

## Characters

The char data type is used to store a single character. The character must be surrounded by single quotes, like 'A' or 'c':

Example
char myGrade = 'B';
Console.WriteLine(myGrade);

## Strings

The string data type is used to store a sequence of characters (text). String values must be surrounded by double quotes:

Example
string greeting = "Hello World";
Console.WriteLine(greeting);

# C# Type Casting

Type casting is when you assign a value of one data type to another type.

In C#, there are two types of casting:

Implicit Casting (automatically) - converting a smaller type to a larger type size

char -> int -> long -> float -> double

Explicit Casting (manually) - converting a larger type to a smaller size type

double -> float -> long -> int -> char

Implicit Casting

Implicit casting is done automatically when passing a smaller size type to a larger size type:

Example
int myInt = 9;
double myDouble = myInt;       // Automatic casting: int to double

Console.WriteLine(myInt);      // Outputs 9
Console.WriteLine(myDouble);   // Outputs 9

Explicit Casting
Explicit casting must be done manually by placing the type in parentheses in front of the value:

Example
double myDouble = 9.78;
int myInt = (int) myDouble;    // Manual casting: double to int

Console.WriteLine(myDouble);   // Outputs 9.78
Console.WriteLine(myInt);      // Outputs 9

Type Conversion Methods
It is also possible to convert data types explicitly by using built-in methods, such as Convert.ToBoolean, Convert.ToDouble, Convert.ToString, Convert.ToInt32 (int) and Convert.ToInt64 (long):

Example
int myInt = 10;
double myDouble = 5.25;
bool myBool = true;

Console.WriteLine(Convert.ToString(myInt));    // convert int to string
Console.WriteLine(Convert.ToDouble(myInt));    // convert int to double
Console.WriteLine(Convert.ToInt32(myDouble));  // convert double to int
Console.WriteLine(Convert.ToString(myBool));   // convert bool to string

*Why Conversion?*

Many times, there's no need for type conversion. But sometimes you have to. Take a look at the next chapter, when working with user input, to see an example of this.


# DateTime

Source : https://www.c-sharpcorner.com/article/datetime-in-c-sharp/

By Manas Mohapatra, Jun 01, 2023


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

*DateTime in C#*

C# DateTime is a structure of value Type like int, double etc. It is available in System namespace and present in mscorlib.dll assembly. It implements interfaces like IComparable, IFormattable, IConvertible, ISerializable, IComparable, IEquatable. 

```cs
public struct DateTime : IComparable, IFormattable, IConvertible, ISerializable, IComparable<DateTime>, IEquatable<DateTime>
{
     // Contains methods and properties
}

```

DateTime helps developer to find out more information about Date and Time like Get month, day, year, week day. It also helps to find date difference, add number of days to a date, etc.

*DateTime Constructor*

It initializes a new instance of DateTime object. At the time of object creation we need to pass required parameters like year, month, day, etc. It contains around 11 overload methods. More details available here.

```cs
// 2015 is year, 12 is month, 25 is day
DateTime date1 = new DateTime(2015, 12, 25);
Console.WriteLine(date1.ToString()); // 12/25/2015 12:00:00 AM

// 2015 - year, 12 - month, 25 – day, 10 – hour, 30 – minute, 50 - second
DateTime date2 = new DateTime(2012, 12, 25, 10, 30, 50);
Console.WriteLine(date1.ToString());// 12/25/2015 10:30:00 AM }

```

*DateTime Fields*

DateTime object contains two static read-only fields called as MaxValue and Minvalue.

- MinValue – It provides smallest possible value of DateTime.

```cs
// Define an uninitialized date.
Console.Write(DateTime.MinValue); // 1/1/0001 12:00:00 AM

```

- MaxValue – It provides smallest possible value of DateTime. 

```cs
// Define an uninitialized date.
Console.Write(DateTime.MaxValue); // 12/31/9999 11:59:59 PM

```

*DateTime Methods*

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

*DateTime Properties*

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

** *DayOfWeek*

It specifies day of the week like Sunday, Monday etc. It is an enum which starts from Sunday to Saturday. If you cast the weekofday value to integer then it starts from Zero (0) for Sunday to Six (6) for Saturday.

```cs
DateTime dt = new DateTime(2015, 12, 25);
bool isEqual = dt.DayOfWeek == DayOfWeek.Thursday); // False
bool isEqual = dt.DayOfWeek == DayOfWeek.Friday); // True

```

** *DateTimeKind*

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

*DateTime Operators*

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

*DateTime Formatting*

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

*Working with Calendars*

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

*Working with TimeZone object*

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

*Conclusion*

In this article we discussed about DateTime object in C#. It also contains how to work with different cultures, timezones, formmatting, date differences and others. Hope it will help you often.

# DateOnly - TimeOnly

Source : https://dev.to/karenpayneoregon/learn-dateonly-timeonly-23j0

By Karen Payne

*Introduction*

Every developer/coder at some point will work with dates. For the majority of those working with dates using DateTime (or DateTimeOffset) will suffice for most task while for others with needs such as interacting with a database which has column type of date it can be awkward transposing from DateTime to date and then it’s now a string. Similarly, working with time via TimeSpan can also be cumbersome for specific task.

Also, when there is a need to work with json files, the same applies so DateOnly and TimeOnly is a welcome addition to the .NET Framework.

In this article learn how to work with DateOnly and TimeOnly with SqlClient data provider, Newtonsoft Json.net and Entity Framework Core 7.

✔️ DateOnly and TimeOnly were first introduced with .NET Core 6

*EF Core 8*

Will support DateOnly and TimeOnly as per the following.

For advance programmers

Consider going right to the code samples.

- Working with DateOnly primer with TimeOnly
- EF Core: Working with TimeOnly

*Basics*

To create a DateOnly instance.

```cs
DateOnly date = new DateOnly();
// Which will have a value of 1/1/0001.

```

To create a meaningful DateOnly

```cs
DateOnly date = new DateOnly(2023,1,14);

```

Or with a specific calendar.

```cs
DateOnly date = new DateOnly(2023,1,14, new PersianCalendar());

```
Creating a TimeOnly with hours, minutes and seconds

```cs
TimeOnly time = new TimeOnly(13,15,45);

```

Creating a TimeOnly with hours, minutes, milliseconds and microseconds

```cs
TimeOnly time = new TimeOnly(13,15,45,11,55);

```

*SqlClient data provider*

In this example we will use the following table schema, a date and two time(7) columns.

Field - Type
VisitOn - date
EnteredTime - time(7)
Exited Time - time(7)

Next, to keep code clean, two language extension methods, one get get a DateOnly by indexing into the data reader while the second one gets a TimeOnly by indexing into the data reader.


```cs
internal static class Extensions
{

    public static DateOnly GetDateOnly(this SqlDataReader reader, int index)
        => reader.GetFieldValue<DateOnly>(index);
    public static TimeOnly ToTimeOnly(this TimeSpan sender)
        => TimeOnly.FromTimeSpan(sender);

    public static TimeOnly GetTimeOnly(this SqlDataReader reader, int index)
        => reader.GetFieldValue<TimeOnly>(index);
}

```

The following model is for returning read data from the database.

```cs
public class VisitorLog
{

    public DateOnly VisitOn { get; set; }
    public TimeOnly EnteredTime { get; set; }
    public TimeOnly ExitedTime { get; set; }

    public override string ToString() 
        => $"{VisitOn,-10}{EnteredTime,-10}{ExitedTime}";
}

```

And here is the code to read the data.

```cs
internal class DataOperations
{
    public static async Task<List<VisitorLog>> DataReaderLoopExample()
    {

        List<VisitorLog> list = new();
        var statement = """
            SELECT VL.VisitOn, VL.EnteredTime, VL.ExitedTime 
            FROM Visitor AS V  
            INNER JOIN VisitorLog AS VL ON V.VisitorIdentifier = VL.VisitorIdentifier 
            """;

        await using var cn = new SqlConnection(ConfigurationHelper.ConnectionString());
        await using var cmd = new SqlCommand { Connection = cn, CommandText = statement };

        await cn.OpenAsync();
        await using var reader = await cmd.ExecuteReaderAsync();



        while (reader.Read())
        {
            list.Add(new VisitorLog()
            {
                VisitOn = reader.GetDateOnly(0),
                EnteredTime = reader.GetTimeOnly(1),
                ExitedTime = reader.GetTimeOnly(2)
            });
        }

        return list;

    }

}

```
What if the task is to read the data above into a DataTable?

```cs
public static async Task<DataTable> DataTableExample()
{

    var statement = """
        SELECT VL.VisitOn, VL.EnteredTime, VL.ExitedTime 
        FROM Visitor AS V  
        INNER JOIN VisitorLog AS VL ON V.VisitorIdentifier = VL.VisitorIdentifier 
        """;

    await using var cn = new SqlConnection(ConfigurationHelper.ConnectionString());
    await using var cmd = new SqlCommand { Connection = cn, CommandText = statement };

    await cn.OpenAsync();

    DataTable dataTable = new DataTable();

    dataTable.Load(await cmd.ExecuteReaderAsync());
    return dataTable;

}

```

The code reads the data but the date column will be seen as a DateTime. Although the DateTime can be converted to a DateOnly using DateOnly.FromDateTime there really is nothing gained here reading from a DateTable. (https://learn.microsoft.com/en-us/dotnet/api/system.dateonly.fromdatetime?view=net-7.0)

```cs
var tableResult = await DataOperations.DataTableExample();

foreach (DataRow row in tableResult.Rows)
{
    Console.WriteLine(
        $"{DateOnly.FromDateTime(row.Field<DateTime>("VisitOn")).ToString("MM/dd/yyyy"),-12}" + 
        $"{row.Field<TimeSpan>("EnteredTime").ToTimeOnly().ToString("hh:mm:ss tt"),-15}" + 
        $"{row.Field<TimeSpan>("ExitedTime").ToTimeOnly().ToString("hh:mm:ss tt")}");
}

```

Note

There is a NuGet package ErikEJ.EntityFrameworkCore.SqlServer.DateOnlyTimeOnly for working with the data provider. (https://www.nuget.org/packages/ErikEJ.EntityFrameworkCore.SqlServer.DateOnlyTimeOnly/)

This is the same author of EF Power Tools which I wrote a tutorial on found here.

*Bogus*

Bogus is a simple fake data generator for .NET languages.

*Basic syntax for generating data*

```cs
Randomizer.Seed = new Random(1338);
var orderIds = 0;
var orderFaker = new Faker<Order>()
    .RuleFor(o => o.OrderId, f => orderIds++)
    .RuleFor(o => o.Item, f => f.Commerce.Product())
    .RuleFor(o => o.Quantity, f => f.Random.Number(1, 5));

orderFaker.Generate(5).Dump();

```

What is interesting is Bogus has not updated their documentation to include that it provides the ability to work with DateOnly.

Given the following model.

```cs
public class Person
{
    public int Id { get; set; }
    public string FirstName { get; set; }
    public string LastName { get; set; }
    public DateOnly BirthDate { get; set; }

    public Person(int identifier)
    {
        Id = identifier;
    }

    public Person() { }

}

```
We can generate data for BirthDate as per below.

```cs
public static List<Person> People(int count = 10)
{
    int identifier = 1;

    Faker<Person> fakePerson = new Faker<Person>()
            .CustomInstantiator(f => new Person(identifier++))
            .RuleFor(p => p.FirstName, f => f.Person.FirstName)
            .RuleFor(p => p.LastName, f => f.Person.LastName)
            .RuleFor(p => p.BirthDate, f => 
                f.Date.BetweenDateOnly(
                    new DateOnly(2000, 1, 1), 
                    new DateOnly(2022, 12, 1)))
        ;


    return fakePerson.Generate(count);

}

```

There are a few more via Intellisense as there is no documentation.

Figure 2

BetweenDateOnly DateOnly
FutureDateOnly DateOnly

*JSON.NET and DateOnly/TimeOnly support*

There is really nothing special to show here, instead check out the sample code.

Code samples for Json.net which as of version 13.0.2 now supports DateOnly and TimeOnly. Three code samples are used to show interactions with Bogus and Microsoft.Data.SqlClient which is most likely used to work with json data.

Sample	| Description|
--|--|
Sample1	| Created a list of mocked people, serialize then deserialize with Json.net
Sample2 |	Same as Sample1 but uses Bogus NuGet package to create a list. Bogus just began support for DateOnly and TimeOnly with Json.net

*System.Text.Json*

For System.Text.Json basic example

Model

```cs
public class VisitorLog
{

    public DateOnly VisitOn { get; set; }
    public TimeOnly EnteredTime { get; set; }
    public TimeOnly ExitedTime { get; set; }

    public override string ToString()
        => $"{VisitOn,-10}{EnteredTime,-10}{ExitedTime}";
}

```

Code sample

```cs
using System.Text.Json;
using DateOnlyTimeOnlySysJsonApp.Models;
using Spectre.Console.Json;

namespace DateOnlyTimeOnlySysJsonApp;

internal partial class Program
{
    static void Main(string[] args)
    {
        VisitorLog log = new()
        {
            VisitOn = new DateOnly(2023,1,12), 
            EnteredTime = new TimeOnly(13,15,15), 
            ExitedTime = new TimeOnly(13,45,0)
        };


        string jsonString = JsonSerializer.Serialize(log, 
            new JsonSerializerOptions { WriteIndented = true });

        var json = new JsonText(jsonString)
            .BracketColor(Color.Green)
            .ColonColor(Color.Blue)
            .CommaColor(Color.Red)
            .StringColor(Color.Green)
            .NumberColor(Color.Blue)
            .BooleanColor(Color.Red)
            .NullColor(Color.Green);

        AnsiConsole.Write(
            new Panel(json)
                .Header("VisitorLog serialized")
                .Collapse()
                .BorderColor(Color.White));

        Console.WriteLine();

        var deserializedLog = JsonSerializer.Deserialize<VisitorLog>(jsonString);
        AnsiConsole.MarkupLine("[white]Deserialize[/]");
        AnsiConsole.MarkupLine($"[yellow]Visited[/] {deserializedLog.VisitOn,-15}" + 
                               $"[yellow]Entered[/] {deserializedLog.EnteredTime, -15}" + 
                               $"[yellow]Exit[/] {deserializedLog.ExitedTime, -15}");

        Console.ReadLine();
    }
}

```

** result figure

*EF Core* 

You can read from article.

*Deconstruct DateOnly/TimeOnly* 

In some cases one may want an elegant way to get individual parts for DateOnly and/or TimeOnly as per below.

```cs
internal static class Helpers
{
    public static void Deconstruct(this DateOnly date, out int day, out int month, out int year) =>
        (day, month, year) = (date.Day, date.Month, date.Year);

    public static void Deconstruct(this TimeOnly time, out int hour, out int minutes, out int seconds, out int milliseconds)
        => (hour, minutes, seconds, milliseconds) = (time.Hour, time.Minute, time.Second, time.Microsecond);

    public static void Deconstruct(this TimeOnly time, out int hour, out int minutes, out int seconds)
        => (hour, minutes, seconds) = (time.Hour, time.Minute, time.Second);
}

```

*Usage*

```cs
internal partial class Program
{
    static void Main(string[] args)
    {
        var (day, month, year) = Sample1();
        AnsiConsole.MarkupLine($"{month}  {day}  {year}");
        var (hour, minutes, seconds) = Sample2();
        AnsiConsole.MarkupLine($"{hour}  {minutes}  {seconds}");

        Console.ReadLine();
    }

    static DateOnly Sample1() => new(2023, 7, 11);
    static TimeOnly Sample2() => new(13,15, 15);
}

```
And we can use discards for values not needed.

```cs
var (hour, minutes, _ ) = Sample2();
AnsiConsole.MarkupLine($"{hour}  {minutes}");

```

*Summary*

This article and accompanying source code provides what a developer needs to get started working with DateOnly and TimeOnly in their applications.

Notes, the code for data provider uses a preview version and expect and non-preview version to be release in the near future. For EF Core, there is talks about having native support in EF Core 8 for DateOnly and TimeOnly.

---end--

# DateTime in C#

We used the DateTime when there is a need to work with the dates and times in C#.

We can format the date and time in different formats by the properties and methods of the DateTime./p>

The value of the DateTime is between the 12:00:00 midnight, January 1 0001 and 11:59:59 PM, December 31, 9999 A.D.

Here we will explain how to create the DateTime in C#.

We have different ways to create the DateTime object. A DateTime object has Time, Culture, Date, Localization, Milliseconds.

Here we have a code which shows the various constructor uses by the DateTime structure to create the DateTime objects.

```cs
// From DateTime create the Date and Time  
DateTime DOB= new DateTime(19, 56, 8, 12, 8, 12, 23);  
// From String creation of DateTime  
string DateString= "8/12/1956 7:10:24 AM";  
DateTime dateFromString =  
    DateTime.Parse(DateString, System.Globalization.CultureInfo.InvariantCulture);  
Console.WriteLine(dateFromString.ToString());  
// Empty DateTime    
DateTime EmpDateTime= new DateTime();  
// Just date    
DateTime OnlyDate= new DateTime(2002, 10, 18);  
// DateTime from Ticks    
DateTime OnlyTime= new DateTime(10000000);   
// Localization with DateTime  
DateTime DateTimewithKind = new DateTime(1976, 7, 10, 7, 10, 24, DateTimeKind.Local);   
// DateTime with date, time and milliseconds    
DateTime WithMilliseconds= new DateTime(2010, 12, 15, 5, 30, 45, 100);  

```

*Properties of DateTime in C#*

The DateTime has the Date and Time property. From DateTime, we can find the date and time. DateTime contains other properties as well, like Hour, Minute, Second, Millisecond, Year, Month, and Day.

The other properties of DateTime are:

- We can get the name of the day from the week with the help of the DayOfWeek property.

- To get the day of the year, we will use DayOfYear property.

- To get time in a DateTime, we use TimeOfDay property.

- Today property will return the object of the DateTime, which is having today's value. The value of the time is 12:00:00

- The Now property will return the DateTime object, which is having the current date and time.
- The Utc property of DateTime will return the Coordinated Universal Time (UTC).
- The one tick represents the One hundred nanoseconds in DateTime. Ticks property of the DateTime returns the number of ticks in a DateTime.
- The Kind property returns value where the representation of time is done by the instance, which is based on the local time, Coordinated Universal Time (UTC). It also shows the unspecified default value.

Here we are taking an example of using the properties of the DateTime in the C# Code.

Example:

```cs
using System;  
using System.Collections;  
using System.Collections.Generic;  
using System.Linq;  
using System.Text;  
using System.Threading.Tasks;  
  
namespace ConsoleApp8  
{  
    class Program  
    {  
        static void Main(string[] args)  
        {  
          DateTime DateTimeProperty = new DateTime(1974, 7, 10, 7, 10, 24);  
          Console.WriteLine("Day:{0}", DateTimeProperty.Day);  
          Console.WriteLine("Month:{0}", DateTimeProperty.Month);  
          Console.WriteLine("Year:{0}", DateTimeProperty.Year);  
          Console.WriteLine("Hour:{0}", DateTimeProperty.Hour);  
          Console.WriteLine("Minute:{0}", DateTimeProperty.Minute);  
          Console.WriteLine("Second:{0}", DateTimeProperty.Second);  
          Console.WriteLine("Millisecond:{0}", DateTimeProperty.Millisecond);  

          Console.WriteLine("Day of Week:{0}", DateTimeProperty.DayOfWeek);  
          Console.WriteLine("Day of Year: {0}", DateTimeProperty.DayOfYear);  
          Console.WriteLine("Time of Day:{0}", DateTimeProperty.TimeOfDay);  
          Console.WriteLine("Tick:{0}", DateTimeProperty.Ticks);  
          Console.WriteLine("Kind:{0}", DateTimeProperty.Kind);  
        }  
    }  
}  
Output:

```

*Addition and Subtraction of the DateTime in C#*

The DateTime structure provides the methods to add and subtract the date and time to and from the DateTime object. We can add and subtract the date in the DateTime structure to and from the DateTime object. For the Addition and Subtraction in the DateTime, we use the TimeSpan structure.

For Addition and Subtraction, we can use the Add and Subtract method from the DateTime object. Firstly, we create the TimeSpan with the values of the date and time where we use the Add and Subtract methods.

Here we are creating a code that will add 3 and subtract the 30 days from today and display the day on the console.

```cs
using System;  
using System. Collections;  
using System.Collections.Generic;  
using System. Linq;  
using System. Text;  
using System.Threading.Tasks;  
  
namespace ConsoleApp8  
{  
    class Program  
    {  
        static void Main(string[] args)  
        {  
  
  
            DateTime Day = DateTime.Now;  
            TimeSpan Month = new System.TimeSpan(30, 0, 0, 0);  
            DateTime aDayAfterAMonth = Day.Add(Month);  
            DateTime aDayBeforeAMonth = Day.Subtract(Month);  
            Console.WriteLine("{0:dddd}", aDayAfterAMonth);  
            Console.WriteLine("{0:dddd}", aDayBeforeAMonth);  
        }  
    }  
}  

```

DateTime structure contains the methods to add years, days, hours, minutes, seconds.

To add the different components to the DateTime object Add method is used.

```cs
// To Add the Years and Days    
   day.AddYears(2);  
   day.AddDays(12);  
// Add Hours, Minutes, Seconds, Milliseconds, and Ticks    
   Day.AddHours(4.25);  
   day.AddMinutes(15);  
   day.AddSeconds(45);  
   day.AddMilliseconds(200);  
day.AddTicks(5000);  

```

The DateTime does not contain the subtract method. To subtract the component of the DateTime, we will use only the subtract method. For example: if we need to subtract the 12 days from the DateTime, we can create another object of the DateTime or TimeSpan object with 12 days. Now we will subtract this object from the DateTime. At the alternate of this, we can also use minus operator to subtract the DateTime or TimeSpan from the DateTime.

Now we will create a code through which we can create the object of the DateTime and subtract another DateTime and Object of TimeSpan. In code, we will show the subtraction of only the hours, days, or other components from the DateTime.

```cs
DateTime DOB = new DateTime(2000, 10, 20, 12, 15, 45);  
DateTime SubtractDate = new DateTime(2000, 2, 6, 13, 5, 15);  
  
// Use the TimeSpan with 10 days, 2 hrs, 30 mins, 45 seconds, and 100 milliseconds    
TimeSpan ts = new TimeSpan(10, 2, 30, 45, 100);  
  
// Subtract the DateTime    
TimeSpan Different = DOB.Subtract(SubtractDate);  
Console.WriteLine(Different.ToString());  
  
// Subtract the TimeSpan    
DateTime Different2 = DOB.Subtract(ts);  
Console.WriteLine(Different2.ToString());  
  
// Subtract 10 Days by creating the object SubtractedDays  
 DateTime SubtractedDays = new DateTime(DOB.Year, DOB.Month, DOB.Day - 10);  
 Console.WriteLine(SubtractedDays.ToString());  
  
 // Subtract hours, minutes, and seconds with creating the object HoursMinutesSeconds  
 DateTime HoursMinutesSeconds = new DateTime(DOB.Year, DOB.Month, DOB.Day, DOB.Hour - 1, DOB.Minute - 15, DOB.Second - 15);  
Console.WriteLine(HoursMinutesSeconds.ToString());  

```

*Searching of the Days in the Month*

To find the number of days in the month, we used the static DaysInMonth method. This searching method [] takes the parameter in numbers from 1 to 12.

Here we will write a code through which we will find out the number of days in a particular month.

Here we will find out the number of days in Feb in 2020. The output will be 28 days.

```cs
int NumberOfDays = DateTime.DaysInMonth(2004, 2);  
Console.WriteLine(NumberOfDays);  

```

With the same technique, we can find out the total number of days in a year. For that, we will use the method DaysInYear.

```cs
private int DaysInYear(int year)  
            {  
                int DaysIN= 0;  
                for (int j = 1; j <= 12; j++)  
                {  
                    DaysIN += DateTime.DaysInMonth(year, j);  
                }  
                return DaysIN;  
            }  

```

*Comparison of two DateTime in C#*

The comparer static method is used to compare the object of the two datetime. If the objects of both DateTime is the same, then the result will be 0. If the first DateTime is earlier, then the result will be 0 else the first DateTime would be later.

Now we will show the comparison of the two datetime objects in C#.

```cs
using System;  
using System. Collections;  
using System.Collections.Generic;  
using System. Linq;  
using System. Text;  
using System.Threading.Tasks;  
  
namespace ConsoleApp8  
{  
    class Program  
    {  
        static void Main(string[] args)  
        {  
  
  
            DateTime DateOfFirst = new DateTime(2002, 10, 22);  
            DateTime DateOfSecond = new DateTime(2009, 8, 11);  
            int result1 = DateTime.Compare(DateOfFirst, DateOfSecond);  
  
            if (result1 < 0)  
                Console.WriteLine("Date of First is earlier");  
            else if (result1 == 0)  
                Console.WriteLine("Both dates are same");  
            else  
                Console.WriteLine("Date of First is later");  
  
        }  
    }  
}  
Output:

```

*CompareTo Method*

CompareTo method is used to compare the two dates. We will assign the DateTime or object in this method.

To compare the two DateTime object, we used the CompareTo method. Below we have a C# code to compare the DateTime object.

```cs
using System;  
using System. Collections;  
using System.Collections.Generic;  
using System. Linq;  
using System. Text;  
using System.Threading.Tasks;  
  
namespace ConsoleApp8  
{  
    class Program  
    {  
        static void Main(string[] args)  
        {  
  
  
            DateTime DateOfFirst = new DateTime(2001, 10, 20);  
            DateTime DateOfSecond = new DateTime(2009, 8, 11);  
            int ResultOfComparison = DateOfFirst.CompareTo(DateOfSecond);  
            if (ResultOfComparison < 0)  
                Console.WriteLine("Date Of First is Earlier");  
            else if (ResultOfComparison == 0)  
                Console.WriteLine("Date of Both are same");  
            else  
                Console.WriteLine("Date of First is Later");  
  
        }  
    }  
}  
Output:

```

*Formatting of the DateTime in C#*

In C#, we can format the DateTime to any type of string format as we want.

For the formatting of the DateTime, we used the GetDateTimeFormats method, which returns all the possible DateTime formats for the current culture of the computer.

Here we have a C# code that returns the array of the strings of all the possible standard formats.

```cs
using System;  
using System. Collections;  
using System.Collections.Generic;  
using System. Linq;  
using System. Text;  
using System.Threading.Tasks;  
  
namespace ConsoleApp8  
{  
    class Program  
    {  
        static void Main(string[] args)  
        {  
  
  
            DateTime DateOfMonth = new DateTime(2020, 02, 25);  
            string[] FormatsOfDate = DateOfMonth.GetDateTimeFormats();  
            foreach (string format in FormatsOfDate)  
                Console.WriteLine(format);  
  
        }  
    }  
}   
Output:

DateTime in C#
DateTime in C#

```

We can overload the GetDateTimeFormats method, which takes the format specifier as a parameter and converts the DateTime to that format. To get the desired format, we need to understand the format of the DateTime specifiers.

We will show it with the code with the pattern in a table.

Code	Pattern
"d"	Short date
"D"	Long date
"f"	Full date time. Short time.
"F"	Full date time. Long Time.
"g"	Generate date time. Long Time.
"G"	General date time. Long Time.
"M","m."	Month/day
"O","o"	Round trip date/time.
"R","r"	RFC1123
"s"	Sortable date time.
"t"	Sort Time
"T"	Long Time
"u"	Universal sortable date time.
"U"	Universal full date-time.
"Y","y"	Year, Month
We will specify the format of the DateTime in the below C# Code.

```cs

using System;  
using System. Collections;  
using System.Collections.Generic;  
using System. Linq;  
using System. Text;  
using System.Threading.Tasks;  
  
namespace ConsoleApp8  
{  
    class Program  
    {  
        static void Main(string[] args)  
        {  
  
  
            DateTime FormatOfDate = new DateTime(2020, 02, 25);  
            // DateTime Formats: d, D, f, F, g, G, m, o, r, s, t, T, u, U,    
            Console.WriteLine("----------------");  
            Console.WriteLine("d Formats");  
            Console.WriteLine("----------------");  
            string[] DateFormat = FormatOfDate.GetDateTimeFormats('d');  
            foreach (string format in DateFormat)  
                Console.WriteLine(format);  
            Console.WriteLine("----------------");  
            Console.WriteLine("D Formats");  
            Console.WriteLine("----------------");  
            DateFormat = FormatOfDate.GetDateTimeFormats('D');  
            foreach (string format in DateFormat)  
                Console.WriteLine(format);  
  
            Console.WriteLine("----------------");  
            Console.WriteLine("f Formats");  
            Console.WriteLine("----------------");  
            DateFormat = FormatOfDate.GetDateTimeFormats('f');  
            foreach (string format in DateFormat)  
                Console.WriteLine(format);  
  
            Console.WriteLine("----------------");  
            Console.WriteLine("F Formats");  
            Console.WriteLine("----------------");  
            DateFormat = FormatOfDate.GetDateTimeFormats('F');  
            foreach (string format in DateFormat)  
                Console.WriteLine(format);  
  
        }  
    }  
}  
Output:

```

We can also do the formatting of the DateTime by passing the format specifier in the ToString() method of DateTime. Now we will write the C# code for the formatting of the DateTime using the ToString() method.

```cs
Console.WriteLine(DateOfFormat.ToString("r"));  

```

Now we will write a C# code for the DateTime format specifiers within the ToString() method.

*Get the Leap Year and Daylight-Saving Time*

Through the C# Code, we will get the Leap Year and Daylight-Saving Time.

```cs
using System;  
using System. Collections;  
using System.Collections.Generic;  
using System. Linq;  
using System. Text;  
using System.Threading.Tasks;  
  
namespace ConsoleApp8  
{  
    class Program  
    {  
        static void Main(string[] args)  
        {  
  
            DateTime DateOfTime = new DateTime(2020, 02, 22);  
            Console.WriteLine(DateOfTime.IsDaylightSavingTime());  
            Console.WriteLine(DateTime.IsLeapYear(DateOfTime.Year));  
  
        }  
    }  
}  
Output:

```

*Conversion of string to the DateTime*

To convert the string to a DateTime object, we used the Parse method. In the Parse method, the passing string must have the correct format of the DateTime. For the conversion of the DateTime to the String, the ToString() method is used.  

```cs
using System;  
using System. Collections;  
using System.Collections.Generic;  
using System. Linq;  
using System. Text;  
using System.Threading.Tasks;  
  
namespace ConsoleApp8  
{  
    class Program  
    {  
        static void Main(string[] args)  
        {  
  
            string DT = "2020-02-04T20:12:45-5:00";  
            DateTime NEWDt = DateTime.Parse(DT);  
            Console.WriteLine(NEWDt.ToString());  
  
        }  
    }  
}  
Output:

```

*Conversion of DateTime in C#*

The structure of the DateTime is full of self-explanatory conversion, which converts the DateTime to the specific type. The methods are ToFileTime, ToLocalTime, ToLongDateString, ToBinary ,ToLongTimeString, ToOADate, ToShortDateString, ToShortTimeString, ToString, and ToUniversalTime.

Here we will take an example of C# to convert the DateTime to the specific type.

```cs
using System;  
using System. Collections;  
using System.Collections.Generic;  
using System. Linq;  
using System. Text;  
using System.Threading.Tasks;  
  
namespace ConsoleApp8  
{  
    class Program  
    {  
        static void Main(string[] args)  
        {  
  
            DateTime DOB = new DateTime(2020, 01, 22);  
            Console.WriteLine("ToString: " + DOB.ToString());  
            Console.WriteLine("ToBinary: " + DOB.ToBinary());  
            Console.WriteLine("ToFileTime: " + DOB.ToFileTime());  
            Console.WriteLine("ToLocalTime: " + DOB.ToLocalTime());  
            Console.WriteLine("ToLongDateString: " + DOB.ToLongDateString());  
            Console.WriteLine("ToLongTimeString: " + DOB.ToLongTimeString());  
            Console.WriteLine("ToOADate: " + DOB.ToOADate());  
            Console.WriteLine("ToShortDateString: " + DOB.ToShortDateString());  
            Console.WriteLine("ToShortTimeString: " + DOB.ToShortTimeString());  
            Console.WriteLine("ToUniversalTime: " + DOB.ToUniversalTime());  
  
        }  
    }  
}    

// Output:
// 
// 
```
