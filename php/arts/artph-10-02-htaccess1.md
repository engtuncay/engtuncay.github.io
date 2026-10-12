
- [The Ultimate Guide to .htaccess Files](#the-ultimate-guide-to-htaccess-files)
  - [Introduction:](#introduction)
  - [What is .htaccess?:](#what-is-htaccess)
  - [Comments](#comments)
  - [Checking if .htaccess is Enabled:](#checking-if-htaccess-is-enabled)
  - [is\_htaccess\_enabled](#is_htaccess_enabled)
  - [DirectoryIndex](#directoryindex)
  - [is\_htaccess\_enabled\_2](#is_htaccess_enabled_2)
  - [Consequences of .htaccess files:](#consequences-of-htaccess-files)

Source : 

# The Ultimate Guide to .htaccess Files

Joseph Pecoraro, May 11, 2009

Apache's .htaccess configuration files have baffled countless developers. This tutorial aims to break through this confusion by focusing on examples and thorough descriptions. Among the benefits of learning .htaccess configuration is automatic gzipping of your content, providing friendlier URLs, preventing hotlinking, improving caching, and more. 

(baffle:şaşırt-)

Looking for a Quick Solution?

This article will teach you about configuring your .htaccess files manually, but if you want a simple, quick solution, try downloading .htaccess Builder from Envato Market. It lets you quickly and effortlessly deliver an htaccess file without having to remember anything about the Apache server language used to construct the htaccess file!

htaccess Builder on Envato Market

## Introduction:

That is all well and good, but the classic argument is:

“Give a man a fish and he will eat for a day. Teach a man to fish and he will eat for a lifetime.” - Confucius

My focus will be on Apache 2, however much of this will apply to Apache 1.3 and I'll try to point out any differences that I know of.

Finally, this tutorial will make the most sense if you read it in order. I try to tie my examples together, and build off of them, in such a way that you can try them yourself and follow along.

## What is .htaccess?:

To quote Apache:

.htaccess files (or “distributed configuration files”) provide a way to make configuration changes on a per-directory basis. A file, containing one or more configuration directives, is placed in a particular document directory, and the directives apply to that directory, and all subdirectories thereof.

➖ Directives

“Directives” is the terminology that Apache uses for `the commands in Apache’s configuration files`. They are normally relatively short commands, typically key value pairs, that modify Apache’s behavior. An .htaccess file allows developers to execute a bunch of these directives without requiring access to Apache’s core server configuration file, often named httpd.conf. This file, httpd.conf, is typically referred to as the "global configuration file" and I will refer to it with that name or its short filename equivalent.

This feature is ideal for many hosting companies deploying a shared hosting environment. The hosting company will not allow its customers to access the global configuration file, which ultimately affects all of the customers hosted on that server. Instead, by enabling .htaccess, they give each of their customers the power to specify and execute their own Apache directives in their own directories and subdirectories. Of course it's also useful to the single developer, as you will see.

It's worth mentioning that anything that can be done with a .htaccess file can be done in the httpd.conf file. However, NOT everything that can be done in httpd.conf can be done in a .htaccess file. In fact .htaccess files must be enabled in the httpd.conf file in order to be executed at all. Once enabled, their power can be limited to certain “contexts” so that they may be allowed to override some settings but not others. This gives the system administrators more control over what they let other developers get away with in their .htaccess files.

TBC - 20251028 - 1619 

➖ Enabling .htaccess:

.htaccess files are normally enabled by default. This is actually controlled by the AllowOverride Directive in the httpd.conf file. This directive can only be placed inside of a `<Directory>` section. Don’t let this confuse you. The typical httpd.conf file defines a DocumentRoot and the majority of the file will contain Directives inside a `<Directory>` section dealing with that directory. This includes the AllowOverride directive.

The default value is actually “All” and thus .htaccess files are enabled by default. An alternative value would be “None” which would mean that they are completely disabled. There are numerous other values that limit configuration of only certain contexts. Some are:

- AuthConfig - Authorization directives such as those dealing with Basic Authentication.
- FileInfo - Directives that deal with setting Headers, Error Documents, Cookies, URL Rewriting, and more.
- Indexes - Default directory listing customizations.
- Limit - Control access to pages in a number of different ways.
- Options - Similar access to Indexes but includes even more values such as ExecCGI, FollowSymLinks, Includes and more.
- Full .htaccess Overriding

I’ll show some examples, without their corresponding `<Directory>` sections. Here is an example that allows full .htaccess overriding:

```php
# Allow .htaccess files their full power
AllowOverride All
Limited Overriding

```

And here is an example that takes a more fine grained approach and only allows overriding of the Authorization and Indexes contexts but nothing else:

```
# Only allow .htaccess files to override Authorization and Indexes
AllowOverride AuthConfig Indexes

```

## Comments

The first line in both of these examples are Apache comments. Comments start with the “#” symbol. This is common to many configuration files and scripting languages. I’ll have plenty of comments in my examples to help explain what things do. However, they are not required, and it's really just personal preference on how much you want to comment. Comments are not required.

The second line is the AllowOverride directive itself. This is the usual syntax of an Apache Directive. First there is the Directive name “AllowOverride” followed by a space separated list of values. Although this syntax looks rather loose; always be careful.

Sometimes even a single error in your httpd.conf or .htaccess file will result in a temporary meltdown of the server, and users will see 500 - Internal Server Error pages.

For that reason alone, it's good practice to always make a backup of your httpd.conf and .htaccess files before you make a change or addition. This way, if anything goes wrong with a modification, you will have nothing to worry about, because you can revert to your previous working version. I will also encourage you to make small changes at a time and verify that the changes work in increments as opposed to making a number of changes at once. This way, if you make an error, it will be much easier to track down what may have caused it.

If you are ever confused on the syntax of any directive, immediately go to the Apache Directive listing and review the “Syntax” they have listed in the table for each individual directive. I will do my best to try and explain it here (I am trying to teach) but my explanation can never be as good as the formal technical documentation itself. Never be afraid of the documentation, it is your most reliable and trustworthy reference. I’ll try to make things more interesting here (woohoo!), but in the end, I’m just putting a different spin on those docs.

## Checking if .htaccess is Enabled:

It's quite possible, in fact it's extremely likely, that your hosting company does not give you access to the httpd.conf file. So how do you know if .htaccess support is enabled or not? Don’t worry, .htaccess is a very common and useful feature that most companies will have enabled, or will enable if you ask politely.

The best thing to do would be to just check with your hosting company. If it's not explicitly listed anywhere in your hosting plan, then shoot their support an email. This is a relatively common question so they mostly likely already have a response ready for you. They will likely be willing to enable the service or at least give a reason why they may not allow it.

In any event, you can always give it a shot and see if a simple .htaccess file works! Included in this tutorial’s sample download are two ways which you can check to see if .htaccess support is enabled. The two folders are “is_htaccess_enabled” and “is_htaccess_enabled_2”. Give them a shot, I’ll explain what each one is doing here.

## is_htaccess_enabled

This test case is very simple. It uses a directive to make Apache look first for the “indexgood.html” file before “index.html.” If .htaccess support is enabled, when you point your browser to the folder, Apache will load the .htaccess file and know that it should display the “indexgood.html” page containing a green message saying Congratulations! If .htaccess support is not enabled then Apache will, by default, ignore the .htaccess file and immediately look for an index.html file.

```
# This Directive will make Apache look first
# for "index_good.html" before looking for "index.html"
DirectoryIndex index_good.html index.html

```

## DirectoryIndex

The DirectoryIndex directive takes a space separated list of potential filenames. When Apache is given a URL of a directory, and not a direct page (for example http://www.example.com and not http://www.example.com/index.html) Apache will use this list of files to search for the proper page to load. Apache will look for the files using the values in the list from left to right. The first file that Apache sees exists will be the file that it loads and displays to the client.

Using the above .htaccess file, here is an example of the good (enabled) and bad (disabled) cases:

Good Apache Redirected
Bad htaccess Ignored

## is_htaccess_enabled_2

As I said earlier, a syntax error in your .htaccess file will cause the server to hiccup. You can use this to your advantage to test if your server has .htaccess support enabled! Here is an example of an .htaccess file that is intended to blow up.

```
# This file is intended to make Apache blow up.  This will help
# determine if .htaccess is enabled or not!
AHHHHHHH

```

It's pretty clear that “AHHHHHHH” is not a valid Apache directive. This will cause an error if Apache tries to read the .htaccess file! So, if you get back a page yelling “Internal Server Error” then your server is looking for .htaccess files! If you actually see the contents of the index.html file, then it is likely that they have been disabled. Here again are the good and bad cases:

Good Internal Service Error

Bad htaccess Ignored

AccessFileName

Finally, it is still possible that .htaccess support is still enabled, just with unique settings. Systems administrators can change the name of the .htaccess file just like we changed the name of the default file Apache looks for. This is possible by using the AccessFileName directive in the global configuration file. Again, the best thing to do in that case would be to contact your hosting company for more information.

## Consequences of .htaccess files:

Before I get into some of the cool things you can do with .htaccess files, I have to tell you what you’re getting into. As I mentioned previously you’re allowing `overriding server settings for a directory and all of its subdirectories`. Always keep in mind that you’re affecting all of the subdirectories as well as the current directory.

Also, when enabled the server will take a potential performance hit. The reason is because, every server request, if .htaccess support is enabled, when Apache goes to fetch the requested file for the client, it has to look for a .htaccess file in every single directory leading up to wherever the file is stored.

This means a number of things. First because Apache always looks for the .htaccess files on every request, any changes to the file will immediately take effect. Apache does not cache them, and it will immediately see your changes on the next request. However, this also means that Apache is going to have to do some extra work for every request. For example, if a user requests /www/supercool/test/index.html, then your server would check for the following .htaccess files:

```php
/www/.htaccess
/www/supercool/.htaccess
/www/supercool/test/.htaccess

```

These potential file accesses (potential because the files may not exist) and their execution (if they did exist) will take time. Again, my experience is that it's unnoticeable and it doesn’t outweigh the benefits and flexibility that .htaccess files provide developers.

However, if this does concern you, as long as you have access to the httpd.conf file then you can always put your directives there. By setting AllowOverride to “None” Apache will not look for those .htaccess files. If you really want to, you can put the directives you wanted to put in your /www/supercool/test/.htaccess file directly in httpd.conf like so:

```php
<Directory /www/supercool/test>
  # Put Directives Here
</Directory>

```

The disadvantage with this approach is that you will have to restart the Apache server on every change so that it reloads the new configuration.

In the end it comes down to personal preference or whatever your host allows. I prefer using .htaccess files because I have the flexibility to place them where I want, and their effects are live immediately without requiring a server reset.

Starting Simple - Directory Listing - Indexes:

Directory Listings

Before getting into any of the complex features, let's start with something simple, but useful, so that you can gain a feel for working with .htaccess files. Directory Listings are so common that you’ve probably come across them numerous times browsing the web.

When a user requests a directory, Apache first looks for the default file. Typically, it will be named “index.html” or “index.php” or something similar. When it doesn’t find one of these files, it falls back on the mod_autoindex module to display a listing of the files and folders in that directory. Sometimes this is enabled, sometimes disabled, and sometimes you want to make customizations. Well, with .htaccess you can easily manipulate these listings!

By default Directory listings are enabled. Here is an example scenario. Suppose you have a bunch of media files that you're storing on your web server, and you want to hide them from the public and search engines so that no one can steal these files. That's very easy to do! Simply create a .htaccess file in the directory that you want to hide and add the following directive:

```php
# Disable Directory Listings in this Directory and Subdirectories
# This will hide the files from the public unless they know direct URLs
Options -Indexes
Options Directive

```

Breaking this down we are using the Options directive. This directive can take a number of values (mentioned previously). If you provide the values with a + or - like I did with -Indexes, then this will inherit the Options that were enabled in higher directories and the global configuration! If you don’t provide a + or - then the list that you provide will become the only options enabled for that directory and its subdirectories. No other options will be enabled. Because you may not know which Options were enabled previously, you will most likely use the + or - syntax unless you are absolutely sure you only want certain Options.

Now, with that directive in your .htaccess file, when you point your browser to that directory you will no longer be able to see the files. Here is the before and after:

```php
Before Normal Directory Listing
After Forbidden Access
Forge Ahead - Basic Authentication

```

Okay, maybe totally disabling the Directory Index is not what you want. It's more likely that you want to keep the Indexes but only allow certain people access. That is where Basic Authentication can be very useful. This is the most common type of Authentication on the web. When the user tries to access the page they will see the familiar Username/Password dialog. Only a user with the proper credentials will be able to access the contents.

For basic authentication there are just two steps.

Setup a file that stores usernames and password (encrypted).

Add a few lines to .htaccess to use that file.

Traditionally web developers have named the file that store the usernames and passwords “.htpasswd”. This is because the command line tool that ships with Apache that generates the proper encrypted username/password pair is actually called htpasswd! If you feel comfortable at the command line you can use the htpasswd tool, however there are plenty of online tools which will generate the output just as easily.

I created a sample .htpasswd file for a user “joe” with password “cool”. I threw those values into the linked online tool and it produced:

```
joe:$apr1$QneYj/..$0G9cBfG2CdFGwia.AHFtR1

```

Your output might be different, that is okay. The passwords are hashed with a random salt to make them a bit more unique and secure. Once your username and password combination has been added to the .htpasswd file, then you should add the following lines to your file:

```php
# Enable Basic Authentication
AuthType Basic
# This is what will be displayed to the user on the login dialog.
AuthName "Access to the Hidden Files"
# This you must edit.  It is the absolute path to the .htpasswd file.
AuthUserFile /path/to/.htpasswd
# This allows any user from inside the .htpasswd file to access the
# content if they provide the proper username and password.
Require valid-user

```

Those commands are well documented. The only real challenge is that you have to properly set the path to the .htpasswd file that you just generated. This is a full absolute path from the absolute root of the server. Also, because the .htpasswd file path is absolute, it's good practice to put it in a directory outside the directory where Apache serves webpages to the public. That way malicious users won’t be able to easily gain access to the raw listing of users/passwords stored in the .htpasswd.

Once it's all set up, when someone attempts to access the page they will receive the following dialog:

Login Dialog
Basic Authentication is nice and easy, but it's not a total solution. Passwords are sent over the wire, Base 64 Encoded, in plain text. If you want more secure authentication you should couple Basic Authentication with https, a more secure protocol. That is a topic for another time.

Headers
The core protocol of the web is the Hypertext Transfer Protocol (HTTP). If you really want to understand what the rest of the Apache directives deal with, you should have some knowledge of the protocol. I’m only going to su pplya very quick summary here. I’ll also make an effort to explain what the more complex directives are doing, but it will make more sense if you understand HTTP Headers.

The quick summary is that HTTP is stateless. With every request (from the browser) and every response (from the Web Server like Apache) there are two sections. A section of Header information, then an optional section containing the data itself, if there is any data.

Request header information often specifies the file they are requesting from the server (index.html), any state information they should provide (such as cookie data), and the mime types it's willing to accept back from the server (text/html or even gzip encoded content).

Response header information often specifies generic server information (Apache, PHP, Perl versions etc.), the content encoding, length, mime/type, and more. There are a plethora of HTTP headers to specify even more details like Cache Control, Redirects, and Status Codes. Ever get a 404? That was a result of requesting a file the server couldn’t find, and thus it sent back a 404 Status Code in its Response.

What does this have to do with .htaccess? Well, you can use Apache directives to overwrite (set) or add new headers (add) which are sent back to the client in the Response’s Header section. Also, as you will see in later tutorials, more advanced functionality such as URL Rewriting deals with the incoming headers.

Let's start simple, we'll add a header to the Response and see what happens:

```php
# Add the following header to every response
Header add X-HeaderName "Header Value"

```

Requesting a file in the same directory as this .htaccess file shows the extra header:

Custom Header Shown in Safaris Web Inspector

You probably thought it was peculiar that I prefixed the custom header with “X-”. This is actually a common convention that developers use to denote that the header is a non-standard header. This makes it really easy to realize that this header is custom. This convention is briefly mentioned here.

On a more comical note, some people have had a bit of fun with headers. This site points out some rather unusual headers found all over the web.

However, I really want to show you how to create Headers so that you can use them as a debugging technique. Just the other day, I ran a test to check to see if certain modules were enabled on a web-server. I wrote the following check:

```php
<IfModule mod_gzip.c>
  Header add X-Enabled mod_gzip
</IfModule>
<IfModule mod_deflate.c>
  Header add X-Enabled mod_deflate
</IfModule>

```
When I made my next request with my browser and checked the Response Headers, it showed that neither of the modules were turned on! I contacted my hosting company, and they agreed to enable gzip compression!

There is a difference between Header set and Header add. With add, the Header will always get added to the Response. Even if it happens to show up multiple times in the response. This is most often what you would want for custom headers. You would use set when you want to override the value of one of the default headers that Apache returns. An example would be overriding the mime/type specified by the Content-Type header for a certain file. Apache would set the internal value and then use that when it prints out the default header. There will be no duplicates, and thus no possibility for interpreting an error or confusion by the client. (In case you were wondering, the HTTP specification states that, in the case of duplicates, the client should always use the last value specified for that duplicate header.)

Conclusion:

I’ve gone over some basic Apache directives in quite a bit of detail. I wanted to get the fundamental details out of the way so that the next tutorial may discuss cooler things. My next article will focus on some of the more useful features you can enable with .htaccess. These topics will include:

GZip encoding of content for both Apache 1.3 and Apache 2

A through description of mod_rewrite and plenty of examples that are dissected and explained in detail.
Follow us on Twitter, or subscribe to the NETTUTS RSS Feed for more daily web development tuts and articles.
And don't forget, if you're struggling to follow this, another option is to try the .htaccess Builder utility available on Envato Market.