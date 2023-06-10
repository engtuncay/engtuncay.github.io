
- [C# Regular Expressions](#c-regular-expressions)
  - [C# regex isMatch](#c-regex-ismatch)

# C# Regular Expressions

Source : https://zetcode.com/csharp/regex/

last modified January 4, 2023

*Regular expressions*

Regular expressions are used for text searching and more advanced text manipulation. 

C# has built-in API for working with regular expressions; it is located in System.Text.RegularExpressions.

A regular expression defines *a search pattern* for strings. Regex represents an immutable regular expression. It contains methods to match text, replace text, or split text.

*Regex examples*

The following table shows a couple of regular expression strings.

Regex  | Meaning
-------|-----------------------------------------------------
.      | Matches any single character.
?      | Matches the preceding element once or not at all.
\+     | Matches the preceding element once or more times.
\*    | Matches the preceding element zero or more times.
^      | Matches the starting position within the string.
`$`      | Matches the ending position within the string.
`|`     | Alternation operator.
[abc]  | Matches a or b, or c.
[a-c]  | Range; matches a or b, or c.
[^abc] | Negation, matches everything except a, or b, or c.
\s     | Matches white space character.
\w     | Matches a word character; equivalent to [a-zA-Z_0-9]

## C# regex isMatch

The isMatch method indicates whether the regular expression finds a match in the input string.

```cs
//Program.cs
using System.Text.RegularExpressions;

var words = new List<string>() { "Seven", "even",
        "Maven", "Amen", "eleven" };

var rx = new Regex(@".even", RegexOptions.Compiled);

foreach (string word in words)
{
    if (rx.IsMatch(word))
    {
        Console.WriteLine($"{word} does match");
    }
    else
    {
        Console.WriteLine($"{word} does not match");
    }
}

//---Output---
// 
// Seven does match
// even does not match
// Maven does not match
// Amen does not match
// eleven does match

```

In the example, we have five words in a list. We check which words match the .even regular expression.

```cs
var words = new List<string>() { "Seven", "even","Maven", "Amen", "eleven" };
//We have a list of words.
var rx = new Regex(@".even", RegexOptions.Compiled);
```

We define the ".even" regular expression. The *RegexOptions.Compiled* option specifies that the regular expression is compiled to an assembly. This yields faster execution but increases startup time. The dot (.) metacharacter stands for any single character in the text.

```cs
foreach (string word in words)
{
    if (rx.IsMatch(word))
    {
        Console.WriteLine($"{word} does match");
    }
    else
    {
        Console.WriteLine($"{word} does not match");
    }
}

```

We go through the list of words. The IsMatch method returns true if the word matches the regular expression.

```cs
$ dotnet run
Seven does match
even does not match
Maven does not match
Amen does not match
eleven does match

```

C# regex Match index

The Match's Success property returns a boolean value indicating whether the match is successful. The NextMatch method returns a new Match object with the results for the next match, starting at the position at which the last match ended.

We can find out the position of the matches in the string with the Index property of the Match.

Program.cs
using System.Text.RegularExpressions;

var content = @"Foxes are omnivorous mammals belonging to several genera
of the family Canidae. Foxes have a flattened skull, upright triangular ears,
a pointed, slightly upturned snout, and a long bushy tail. Foxes live on every
continent except Antarctica. By far the most common and widespread species of
fox is the red fox.";

var rx = new Regex("fox(es)?", RegexOptions.Compiled |
    RegexOptions.IgnoreCase);

Match match = rx.Match(content);

while (match.Success)
{
    Console.WriteLine($"{match.Value} at index {match.Index}");
    match = match.NextMatch();
}

In the example, we look for all occurrences of the fox word.

var rx = new Regex("fox(es)?", RegexOptions.Compiled |
    RegexOptions.IgnoreCase);
We add the (es)? expression to include the plural form of the word. The RegexOptions.IgnoreCase searches in case-insensitive mode.

Match match = rx.Match(content);

while (match.Success)
{
    Console.WriteLine($"{match.Value} at index {match.Index}");
    match = match.NextMatch();
}
The match.Value returns the matched string and the match.Index returns its index in the text. We find the next occurrence of a match with the match.NextMatch method.

$ dotnet run
Foxes at index 0
Foxes at index 80
Foxes at index 194
fox at index 292
fox at index 307
C# regex Matches
The Matches method searches an input string for all occurrences of a regular expression and returns all the matches.

Program.cs
using System.Text.RegularExpressions;

String content = @"<p>The <code>Regex</code> is a compiled 
                representation of a regular expression.</p>";

var rx = new Regex(@"</?[a-z]+>", RegexOptions.Compiled);
var matches = rx.Matches(content);

foreach (Match match in matches)
{
    Console.WriteLine(match);
}
The example retrieves all HTML tags from a string.

var rx = new Regex(@"</?[a-z]+>", RegexOptions.Compiled);
In the regular expression, we search for tags; both starting and ending.

var matches = rx.Matches(content);
The Matches method returns a collection of the Match objects found by the search. If no matches are found, the method returns an empty collection object.

foreach (Match match in matches)
{
    Console.WriteLine(match);
}
We go through the collection and print all matched strings.

$ dotnet run
<p>
<code>
</code>
</p>
C# regex Count
With Count, we can count the number of occurrences of the pattern. We have static and instance overloads of the method.

Program.cs
using System.Text.RegularExpressions;

string content = @"Foxes are omnivorous mammals belonging to several genera
of the family Canidae. Foxes have a flattened skull, upright triangular ears,
a pointed, slightly upturned snout, and a long bushy tail. Foxes live on every
continent except Antarctica. By far the most common and widespread species of
fox is the red fox.";

string pattern = "fox(es)?";

int n = Regex.Count(content, pattern, RegexOptions.Compiled |
    RegexOptions.IgnoreCase);
Console.WriteLine($"There are {n} matches");
In the program, we count the number of variants of the fox word.

int n = Regex.Count(content, pattern, RegexOptions.Compiled |
    RegexOptions.IgnoreCase);
We use the static Regex.Count method.

var rx = new Regex(pattern, RegexOptions.Compiled |
    RegexOptions.IgnoreCase);

int n = rx.Count(content);
Console.WriteLine($"There are {n} matches");
We can also use the instance method.

$ dotnet run
There are 5 matches
C# regex word boundaries
The metacharacter \b is an anchor which matches at a position that is called a word boundary. It allows to search for whole words.

Program.cs
using System.Text.RegularExpressions;

var text = "This island is beautiful";

var rx = new Regex(@"\bis\b", RegexOptions.Compiled);
var matches = rx.Matches(text);

foreach (Match match in matches)
{
    Console.WriteLine($"{match.Value} at {match.Index}");
}
In the example, we look for the is word. We do not want to include the This and the island words.

var rx = new Regex(@"\bis\b", RegexOptions.Compiled);
With two \b metacharacters, we search for the is whole word.

$ dotnet run
is at 12
C# regex implicit word boundaries
The \w is a character class used for a character allowed in a word. For the \w+ regular expression, which denotes a word, the leading and trailing word boundary metacharacters are implicit; i.e. \w+ is equal to \b\w+\b.

Program.cs
using System.Text.RegularExpressions;

var content = @"Foxes are omnivorous mammals belonging to several genera 
of the family Canidae. Foxes have a flattened skull, upright triangular ears, 
a pointed, slightly upturned snout, and a long bushy tail. Foxes live on every 
continent except Antarctica. By far the most common and widespread species of 
fox is the red fox.";

var rx = new Regex(@"\w+", RegexOptions.Compiled |
    RegexOptions.IgnoreCase);

var matches = rx.Matches(content);
Console.WriteLine(matches.Count);

foreach (var match in matches)
{
    Console.WriteLine(match);
}
In the example, we search for all words in the text.

Console.WriteLine(matches.Count);
The Count property returns the number of matches.

C# regex currency symbols
The \p{Sc} regular expresion can be used to look for currency symbols.

Program.cs
using System.Text.RegularExpressions;

Console.OutputEncoding = System.Text.Encoding.UTF8;

string content = @"Currency symbols: ฿ Thailand bath, ₹  Indian rupee, 
    ₾ Georgian lari, $ Dollar, € Euro, ¥ Yen, £ Pound Sterling";

string pattern = @"\p{Sc}";

var rx = new Regex(pattern, RegexOptions.Compiled);
var matches = rx.Matches(content);

foreach (Match match in matches)
{
    Console.WriteLine($"{match.Value} is at {match.Index}");
}
In the example, we look for currency symbols.

string content = @"Currency symbols: ฿ Thailand bath, ₹ Indian rupee, 
    ₾ Georgian lari, $ Dollar, € Euro, ¥ Yen, £ Pound Sterling";
We have a couple of currency symbols in the text.

string pattern = @"\p{Sc}";
We define the regular expression for the currency symbols.

foreach (Match match in matches)
{
    Console.WriteLine($"{match.Value} is at {match.Index}");
}
We find all the symbols and their index.

$ dotnet run 
฿ is at 18
₹  is at 35
₾ is at 57
$ is at 74
€ is at 84
¥ is at 92
£ is at 99
C# regex anchors
Anchors match positions of characters inside a given text. In the next example, we look if a string is located at the beginning of a sentence.

Program.cs
using System.Text.RegularExpressions;

var sentences = new List<string>() {
    "I am looking for Jane.",
    "Jane was walking along the river.",
    "Kate and Jane are close friends." 
};

var rx = new Regex(@"^Jane", RegexOptions.Compiled);

foreach (string sentence in sentences)
{
    if (rx.IsMatch(sentence))
    {
        Console.WriteLine($"{sentence} does match");
    }
    else
    {
        Console.WriteLine($"{sentence} does not match");
    }
}
We have three sentences. The search pattern is ^Jane. The pattern checks if the "Jane" string is located at the beginning of the text. Jane\.$ would look for "Jane" at the end of the sentence.

C# regex alternations
The alternation operator | enables to create a regular expression with several choices.

Program.cs
using System.Text.RegularExpressions;

var users = new List<string>() {"Jane", "Thomas", "Robert",
    "Lucy", "Beky", "John", "Peter", "Andy"};

var rx = new Regex("Jane|Beky|Robert", RegexOptions.Compiled);

foreach (string user in users)
{
    if (rx.IsMatch(user))
    {
        Console.WriteLine($"{user} does match");
    }
    else
    {
        Console.WriteLine($"{user} does not match");
    }
}
We have nine names in the list.

var rx = new Regex("Jane|Beky|Robert", RegexOptions.Compiled);
This regular expression looks for "Jane", "Beky", or "Robert" strings.

C# regex capturing groups
Round brackets are used to create capturing groups. This allows us to apply a quantifier to the entire group or to restrict alternation to a part of the regular expression.

Program.cs
using System.Text.RegularExpressions;

var sites = new List<string>() {"webcode.me",
    "zetcode.com", "freebsd.org", "netbsd.org"};

var rx = new Regex(@"(\w+)\.(\w+)", RegexOptions.Compiled);

foreach (var site in sites) 
{
    Match match = rx.Match(site);

    if (match.Success)
    {
        Console.WriteLine(match.Value);
        Console.WriteLine(match.Groups[1]);
        Console.WriteLine(match.Groups[2]);
    }

    Console.WriteLine("*****************");
}
In the example, we divide the domain names into two parts by using groups.

var rx = new Regex(@"(\w+)\.(\w+)", RegexOptions.Compiled);
We define two groups with parentheses.

if (match.Success)
{
    Console.WriteLine(match.Value);
    Console.WriteLine(match.Groups[1]);
    Console.WriteLine(match.Groups[2]);
}
The match.Value returns the whole matched string; it is equal to the match.Groups[0]. The groups are accessed via the Groups property.

$ dotnet run
webcode.me
webcode
me
*****************
zetcode.com
zetcode
com
*****************
freebsd.org
freebsd
org
*****************
netbsd.org
netbsd
org
*****************
In the following example, we use groups to work with expressions.

Program.cs
using System.Text.RegularExpressions;

string[] expressions = { "16 + 11", "12 * 5", "27 / 3", "2 - 8" };
string pattern = @"(\d+)\s+([-+*/])\s+(\d+)";

foreach (var expression in expressions)
{
    var rx = new Regex(pattern, RegexOptions.Compiled);
    var matches = rx.Matches(expression);

    foreach (Match match in matches)
    {
        int val1 = Int32.Parse(match.Groups[1].Value);
        int val2 = Int32.Parse(match.Groups[3].Value);

        var oper = match.Groups[2].Value;

        string result = oper switch
        {
            "+" => $"{match.Value} = {val1 + val2}",
            "-" => $"{match.Value} = {val1 - val2}",
            "*" => $"{match.Value} = {val1 * val2}",
            "/" => $"{match.Value} = {val1 / val2}",
            _ => "unknown operator"
        };

        Console.WriteLine(result);
    }
}
The example parses four simple mathematical expressions and computes them.

string[] expressions = { "16 + 11", "12 * 5", "27 / 3", "2 - 8" };
We have an array of four expressions.

string pattern = @"(\d+)\s+([-+*/])\s+(\d+)";
In the regex pattern, we have three groups: two groups for the values, one for the operator.

int val1 = Int32.Parse(match.Groups[1].Value);
int val2 = Int32.Parse(match.Groups[3].Value);
We get the values and transform them into integers.

var oper = match.Groups[2].Value;
We get the operator.

string result = oper switch
{
    "+" => $"{match.Value} = {val1 + val2}",
    "-" => $"{match.Value} = {val1 - val2}",
    "*" => $"{match.Value} = {val1 * val2}",
    "/" => $"{match.Value} = {val1 / val2}",
    _ => "unknown operator"
};
With the switch expression, we compute the expressions.

$ dotnet run
16 + 11 = 27
12 * 5 = 60
27 / 3 = 9
2 - 8 = -6
C# regex captures
When we use quantifiers, the group can capture zero, one, or more strings in a single match. All the substrings matched by a single capturing group are available from the Group.Captures property. In such as case, the Group object contains information about the last captured substring.

Program.cs
using System.Text.RegularExpressions;

string text = "Today is a beautiful day. The sun is shining.";
string pattern = @"\b(\w+\s*)+\.";

MatchCollection matches = Regex.Matches(text, pattern);

foreach (Match match in matches)
{
    Console.WriteLine("Matched sentence: {0}", match.Value);

    for (int i = 0; i < match.Groups.Count; i++)
    {
        Console.WriteLine("\tGroup {0}:  {1}", i, match.Groups[i].Value);

        int captures = 0;

        foreach (Capture capture in match.Groups[i].Captures)
        {
            Console.WriteLine("\t\tCapture {0}: {1}", captures, capture.Value);
            captures++;
        }
    }
}
In the example, we have two sentences. With a regular expression, we capture all words from a sentence.

string pattern = @"\b(\w+\s*)+\.";
We use the + quantifier for the (\w+\s*) group. The group then contains all captures: words of the sentence.

foreach (Capture capture in match.Groups[i].Captures)
{
    Console.WriteLine("\t\tCapture {0}: {1}", captures, capture.Value);
    captures++;
}
We go through the captures of the group and print them to the console.

$ dotnet run
Matched sentence: Today is a beautiful day.
        Group 0:  Today is a beautiful day.
                Capture 0: Today is a beautiful day.
        Group 1:  day
                Capture 0: Today
                Capture 1: is
                Capture 2: a
                Capture 3: beautiful
                Capture 4: day
Matched sentence: The sun is shining.
        Group 0:  The sun is shining.
                Capture 0: The sun is shining.
        Group 1:  shining
                Capture 0: The
                Capture 1: sun
                Capture 2: is
                Capture 3: shining
This is the output. Remember that match.Groups[0].Value equals to match.Value.

C# regex replacing strings
It is possible to replace strings with Replace. The method returns the modified string.

Program.cs
using System.Text.RegularExpressions;


using var client = new HttpClient();
var content = await client.GetStringAsync("http://webcode.me");

var rx = new Regex(@"<[^>]*>", RegexOptions.Compiled |
    RegexOptions.IgnoreCase);

var modified = rx.Replace(content, String.Empty);

Console.WriteLine(modified.Trim());
The example reads HTML data of a web page and strips its HTML tags using a regular expression.

using var client = new HttpClient();
var content = await client.GetStringAsync("http://webcode.me");
We create a GET request with HttpClient and retrieve the HTML code.

var rx = new Regex(@"<[^>]*>", RegexOptions.Compiled |
    RegexOptions.IgnoreCase);
This pattern defines a regular expression that matches HTML tags.

var modified = rx.Replace(content, String.Empty);
We remove all the tags with replaceAll method.

C# regex splitting text
Text can be split with Pattern's split method.

data.csv
22, 1, 3, 4, 5, 17, 18,
2, 13, 4, 1, 8, 4,
3, 21, 4, 5, 1, 48, 9, 42
We read from data.csv file.

Program.cs
using System.Text.RegularExpressions;

string content = File.ReadAllText("data.csv");

var rx = new Regex(@",\s*", RegexOptions.Compiled);
var data = rx.Split(content);

Console.WriteLine("[{0}]", string.Join(", ", data));

int sum = 0;
Array.ForEach(data, e =>
{
    string e2 = e.Trim();

    sum += Int32.Parse(e);

});

Console.WriteLine(sum);

The examples reads values from a CSV file and computes the sum of them. It uses regular expression to process the data.

string content = File.ReadAllText("data.csv");
In one shot, we read all data into the list of strings with File.ReadAllText.

var rx = new Regex(@",\s*", RegexOptions.Compiled);
The regular expression is a comma character followed by zero or more white space characters.

var data = rx.Split(content);
The Split method splits an input string into an array of substrings.

int sum = 0;
Array.ForEach(data, e => {

    var e2 = e.Trim();

    sum += Int32.Parse(e);
});
We go through the lines and cut off spaces with trim and compute the sum value.

$ dotnet run
[22, 1, 3, 4, 5, 17, 18, 2, 13, 4, 1, 8, 4, 3, 21, 4, 5, 1, 48, 9, 42]
235
C# case-insensitive regular expression
By setting the RegexOptions.IgnoreCase flag, we can have case-insensitive matching.

Program.cs
using System.Text.RegularExpressions;

var words = new List<string>() { "dog", "Dog", "DOG", "Doggy" };

var rx = new Regex(@"\bdog\b", RegexOptions.Compiled |
    RegexOptions.IgnoreCase);

foreach (string word in words)
{
    if (rx.IsMatch(word))
    {
        Console.WriteLine($"{word} does match");
    }
    else
    {
        Console.WriteLine($"{word} does not match");
    }
}
The example performs case-insensitive matching of the regular expression.

var rx = new Regex(@"\bdog\b", RegexOptions.Compiled | 
    RegexOptions.IgnoreCase);
Case-insensitive matching is enabled by setting RegexOptions.Compiled as the second parameter to Regex.

C# regex subpatterns
Subpatterns are patterns within patterns. Subpatterns are created with () characters.

Program.cs
using System.Text.RegularExpressions;

var words = new List<string>() {"book", "bookshelf", "bookworm",
                "bookcase", "bookish", "bookkeeper", "booklet", "bookmark"};

var rx = new Regex("^book(worm|mark|keeper)?$", RegexOptions.Compiled);

foreach (string word in words)
{
    if (rx.IsMatch(word))
    {
        Console.WriteLine($"{word} does match");
    }
    else
    {
        Console.WriteLine($"{word} does not match");
    }
}
The example creates a subpattern.

var rx = new Regex("^book(worm|mark|keeper)?$", RegexOptions.Compiled); 
The regular expression uses a subpattern. It matches bookworm, bookmark, bookkeeper, and book words.

C# regex word frequency
In the next example, we count the frequency of words in a file.

$ wget https://raw.githubusercontent.com/janbodnar/data/main/the-king-james-bible.txt
We use the King James Bible.

Program.cs
using System.Text.RegularExpressions;

var fileName = "/home/janbodnar/Documents/the-king-james-bible.txt";
var text = File.ReadAllText(fileName);

var matches = new Regex("[a-z-A-Z']+").Matches(text);
var words = matches.Select(m => m.Value).ToList();

var res = words
    .GroupBy(m => m)
    .OrderByDescending(g => g.Count())
    .Select(x => new { word = x.Key, Count = x.Count() })
    .Take(10);

foreach (var r in res)
{
    Console.WriteLine($"{r.word}: {r.Count}");
}
In the example, we count the frequency of the words from the King James Bible.

var matches = new Regex("[a-z-A-Z']+").Matches(text);
var words = matches.Select(m => m.Value).ToList();
We find all the matches witch Matches method. From the match collection, we get all the words into a list.

var res = words
    .GroupBy(m => m)
    .OrderByDescending(g => g.Count())
    .Select(x => new { word = x.Key, Count = x.Count() })
    .Take(10);
The words are grouped and ordered by frequency in descending order. We take the first top words.

$ dotnet run
the 62103
and 38848
of 34478
to 13400
And 12846
that 12576
in 12331
shall 9760
he 9665
unto 8942
C# regex email example
In the following example, we create a regex pattern for checking email addresses.

Program.cs
using System.Text.RegularExpressions;

var emails = new List<string>() {"luke@gmail.com",
    "andy@yahoocom", "34234sdfa#2345", "f344@gmail.com"};

var pattern = @"[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,18}";

var rx = new Regex(pattern, RegexOptions.Compiled);

foreach (string email in emails)
{
    if (rx.IsMatch(email))
    {
        Console.WriteLine($"{email} does match");
    }
    else
    {
        Console.WriteLine($"{email} does not match");
    }
}
This example provides only one possible solution.

var pattern = @"[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,18}";
The email is divided into five parts. The first part is the local part. This is usually a name of a company, individual, or a nickname. The [a-zA-Z0-9._-]+ lists all possible characters, we can use in the local part. They can be used one or more times.

The second part consists of the literal @ character. The third part is the domain part. It is usually the domain name of the email provider, like Yahoo or Gmail. The [a-zA-Z0-9-]+ is a character set providing all characters that can be used in the domain name. The + quantifier makes use of one or more of these characters.

The fourth part is the dot character. It is preceded by the escape character (\). This is because the dot character is a metacharacter and has a special meaning. By escaping it, we get a literal dot.

The final part is the top level domain: [a-zA-Z.]{2,18}. Top level domains can have from 2 to 18 characters, such as sk, net, info, travel, cleaning, travelinsurance. The maximum length can be 63 characters, but most domain are shorter than 18 characters today. There is also a dot character. This is because some top level domains have two parts; for example co.uk.

In this article, we have worked with regular expression in C#.
