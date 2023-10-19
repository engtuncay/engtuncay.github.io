
- [How to execute PHP code using command line ?](#how-to-execute-php-code-using-command-line-)
  - [PHP Installation for Windows Users](#php-installation-for-windows-users)
  - [PHP Installation for Linux Users:](#php-installation-for-linux-users)
  - [PHP Installation for Mac Users:](#php-installation-for-mac-users)
  - [After Installation, Executing Php Code](#after-installation-executing-php-code)

# How to execute PHP code using command line ?

Source : https://www.geeksforgeeks.org/how-to-execute-php-code-using-command-line/

## PHP Installation for Windows Users

Follow the steps to install PHP on the Windows operating system.

Step 1: First, we have to download PHP from it’s official website. We have to download the .zip file from the respective section depending upon on our system architecture(x86 or x64).

Step 2: Extract the .zip file to your preferred location. It is recommended to choose the Boot Drive(C Drive) inside a folder named php (ie. C:\php).

Step 3: Now we have to add the folder (C:\php) to the Environment Variable Path so that it becomes accessible from the command line. To do so, we have to right click on My Computer or This PC icon, then Choose Properties from the context menu. Then click the Advanced system settings link, and then click Environment Variables. In the section System Variables, we have to find the PATH environment variable and then select and Edit it. If the PATH environment variable does not exist, we have to click New. In the Edit System Variable (or New System Variable) window, we have to specify the value of the PATH environment variable (C:\php or the location of our extracted php files). After that, we have to click OK and close all remaining windows by clicking OK.

## PHP Installation for Linux Users:

Linux users can install php using the following command.
apt-get install php5-common libapache2-mod-php5 php5-cli
It will install php with apache server. For more information click here.

## PHP Installation for Mac Users:

Mac users can install php using the following command.
curl -s https://php-osx.liip.ch/install.sh | bash -s 7.3
It will install php in your system. For more information click here.

## After Installation, Executing Php Code

After installation of PHP, we are ready to run PHP code through command line. You just follow the steps to run PHP program using command line.

- Open terminal or command line window.
- Goto the specified folder or directory where php files are present.
- Then we can run php code using the following command:

```bash
php file_name.php

# php_inline_output

```

We can also start server for testing the php code using the command line by the following command:

```bash
php -S localhost:port -t your_folder/

# php_server_output
```

Note: While using the PHP built-in server, the name of the PHP file inside the root folder must be index.php, and all other PHP files can be hyperlinked through the main index page.

PHP is a server-side scripting language designed specifically for web development. You can learn PHP from the ground up by following this PHP Tutorial (https://www.geeksforgeeks.org/php-tutorials/) and PHP Examples (https://www.geeksforgeeks.org/php-examples/).

