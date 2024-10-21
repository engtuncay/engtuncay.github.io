
C# FileStream

Source : https://www.javatpoint.com/c-sharp-filestream

[Back](readme.md)

---

**Contents**

- [C# FileStream](#c-filestream)
- [C# StreamWriter](#c-streamwriter)
- [C# TextWriter](#c-textwriter)
- [C# TextReader](#c-textreader)
- [C# BinaryWriter](#c-binarywriter)
- [C# BinaryReader](#c-binaryreader)
- [C# StringWriter Methods](#c-stringwriter-methods)
- [C# StringReader Class](#c-stringreader-class)
- [C# FileInfo Class](#c-fileinfo-class)
- [C# DirectoryInfo Class](#c-directoryinfo-class)
- [C# Serialization](#c-serialization)
- [C# Deserialization](#c-deserialization)
- [C# System.IO Namespace](#c-systemio-namespace)


## C# FileStream

C# FileStream class provides a stream for file operation. It can be used to perform synchronous and asynchronous read and write operations. By the help of FileStream class, we can easily read and write data into file.

➖ C# FileStream example: writing single byte into file

Let's see the simple example of FileStream class to write single byte of data into file. Here, we are using OpenOrCreate file mode which can be used for read and write operations.

```cs
using System;  
using System.IO;  

public class FileStreamExample  
{  
    public static void Main(string[] args)  
    {  
        FileStream f = new FileStream("c:\\b.txt", FileMode.OpenOrCreate);//creating file stream  
        f.WriteByte(65);//writing byte into stream  
        f.Close();//closing stream  
    }  
}  

// Output: (file content)
// 
// A

```

➖ C# FileStream example: writing multiple bytes into file

Let's see another example to write multiple bytes of data into file using loop.

```cs
using System;  
using System.IO;  
public class FileStreamExample  
{  
    public static void Main(string[] args)  
    {  
        FileStream f = new FileStream("e:\\b.txt", FileMode.OpenOrCreate);  
        for (int i = 65; i <= 90; i++)  
        {  
            f.WriteByte((byte)i);  
        }  
        f.Close();  
    }  
}  
Output:

ABCDEFGHIJKLMNOPQRSTUVWXYZ

```

➖ C# FileStream example: reading all bytes from file

Let's see the example of FileStream class to read data from the file. Here, ReadByte() method of FileStream class returns single byte. To all read all the bytes, you need to use loop.

```cs
using System;  
using System.IO;  
public class FileStreamExample  
{  
    public static void Main(string[] args)  
    {  
        FileStream f = new FileStream("e:\\b.txt", FileMode.OpenOrCreate);  
        int i = 0;  
        while ((i = f.ReadByte()) != -1)  
        {  
            Console.Write((char)i);  
        }  
        f.Close();  
    }  
}  
// Output:
// 
// ABCDEFGHIJKLMNOPQRSTUVWXYZ

```

## C# StreamWriter

C# StreamWriter class is used to write characters to a stream `in specific encoding`. It inherits TextWriter class. It provides overloaded `write() and writeln()` methods to write data into file.

➖ C# StreamWriter example

Let's see a simple example of StreamWriter class which writes a single line of data into the file.

```cs
using System;  
using System.IO;

public class StreamWriterExample  
{  
    public static void Main(string[] args)  
    {  
        FileStream f = new FileStream("e:\\output.txt", FileMode.Create);  
        StreamWriter s = new StreamWriter(f);  
  
        s.WriteLine("hello c#");  
        s.Close();  
        f.Close();  
     Console.WriteLine("File created successfully...");  
    }  
}

// Output:
// 
// File created successfully...

// output.txt:
// 
// hello c#
```

Now open the file, you will see the text "hello c#" in output.txt file.

## C# TextWriter
  
C# TextWriter class is an abstract class. It is used to write text or `sequential series of characters into file`. It is found in System.IO namespace.

C# TextWriter Example

Let's see the simple example of TextWriter class to write two lines data.

```cs
using System;  
using System.IO;  
namespace TextWriterExample  
{  
    class Program  
    {  
        static void Main(string[] args)  
        {  
            using (TextWriter writer = File.CreateText("e:\\f.txt"))  
            {  
                writer.WriteLine("Hello C#");  
                writer.WriteLine("C# File Handling by JavaTpoint");  
            }  
            Console.WriteLine("Data written successfully...");  
        }  
    }  
}  

// Output:
// 
// Data written successfully...
// 
// f.txt:
// 
// Hello C#
// C# File Handling by JavaTpoint

```

## C# TextReader

C# TextReader class is found in System.IO namespace. It represents a reader that can be used to read text or sequential series of characters.

C# TextReader Example: Read All Data

Let's see the simple example of TextReader class that reads data till the end of file.

```cs
using System;  
using System.IO;  
namespace TextReaderExample  
{  
    class Program  
    {  
        static void Main(string[] args)  
        {  
            using (TextReader tr = File.OpenText("e:\\f.txt"))  
            {  
                Console.WriteLine(tr.ReadToEnd());  
            }  
        }  
    }  
}  

// Output:
// 
// Hello C#
// C# File Handling by JavaTpoint
// C# TextReader Example: Read One Line

```

Let's see the simple example of TextReader class that reads single line from the file.

```cs
using System;  
using System.IO;  
namespace TextReaderExample  
{  
    class Program  
    {  
        static void Main(string[] args)  
        {  
            using (TextReader tr = File.OpenText("e:\\f.txt"))  
            {  
                Console.WriteLine(tr.ReadLine());  
            }  
        }  
    }  
}  

// Output:
// 
// Hello C#

```

## C# BinaryWriter
C# BinaryWriter class is used to write binary information into stream. It is found in System.IO namespace. It also supports writing string in specific encoding.

C# BinaryWriter Example
Let's see the simple example of BinaryWriter class which writes data into dat file.

using System;  
using System.IO;  
namespace BinaryWriterExample  
{  
    class Program  
    {  
        static void Main(string[] args)  
        {  
            string fileName = "e:\\binaryfile.dat";  
            using (BinaryWriter writer = new BinaryWriter(File.Open(fileName, FileMode.Create)))  
            {  
                writer.Write(2.5);  
                writer.Write("this is string data");  
                writer.Write(true);  
            }  
            Console.WriteLine("Data written successfully...");    
        }  
    }  
}  
Output:

Data written successfully...

## C# BinaryReader
C# BinaryReader class is used to read binary information from stream. It is found in System.IO namespace. It also supports reading string in specific encoding.

C# BinaryReader Example
Let's see the simple example of BinaryReader class which reads data from dat file.

using System;  
using System.IO;  
namespace BinaryWriterExample  
{  
    class Program  
    {  
        static void Main(string[] args)  
        {  
            WriteBinaryFile();  
            ReadBinaryFile();  
            Console.ReadKey();  
        }  
        static void WriteBinaryFile()  
        {  
            using (BinaryWriter writer = new BinaryWriter(File.Open("e:\\binaryfile.dat", FileMode.Create)))  
            {  
                 
                writer.Write(12.5);  
                writer.Write("this is string data");  
                writer.Write(true);  
            }  
        }  
        static void ReadBinaryFile()  
        {  
            using (BinaryReader reader = new BinaryReader(File.Open("e:\\binaryfile.dat", FileMode.Open)))  
            {  
                Console.WriteLine("Double Value : " + reader.ReadDouble());  
                Console.WriteLine("String Value : " + reader.ReadString());  
                Console.WriteLine("Boolean Value : " + reader.ReadBoolean());  
            }  
        }  
    }  
}  
Output:

Double Value : 12.5
String Value : this is string data
Boolean Value : true

## C# StringWriter Methods
Methods
Description
Close()
It is used to close the current StringWriter and the underlying stream.
Dispose()
It is used to release all resources used by the TextWriter object.
Equals(Object)
It is used to determine whether the specified object is equal to the current object or not.
Finalize()
It allows an object to try to free resources and perform other cleanup operations.
GetHashCode()
It is used to serve as the default hash function.
GetStringBuilder()
It returns the underlying StringBuilder.
ToString()
It returns a string containing the characters written to the current StringWriter.
WriteAsync(String)
It is used to write a string to the current string asynchronously.
Write(Boolean)
It is used to write the text representation of a Boolean value to the string.
Write(String)
It is used to write a string to the current string.
WriteLine(String)
It is used to write a string followed by a line terminator to the string or stream.
WriteLineAsync(String)
Writes a string followed by a line terminator asynchronously to the current string.(Overrides TextWriter.WriteLineAsync(String).)
C# StringWriter Example
In the following program, we are using StringWriter class to write string information to the StringBuilder class. The StringReader class is used to read written information to the StringBuilder.

using System;  
using System.IO;  
using System.Text;  
namespace CSharpProgram  
{  
    class Program  
    {  
        static void Main(string[] args)  
        {  
            string text = "Hello, Welcome to the javatpoint \n" +  
                "It is nice site. \n" +  
                "It provides technical tutorials";  
            // Creating StringBuilder instance  
            StringBuilder sb = new StringBuilder();  
            // Passing StringBuilder instance into StringWriter  
            StringWriter writer = new StringWriter(sb);  
            // Writing data using StringWriter  
            writer.WriteLine(text);  
            writer.Flush();  
            // Closing writer connection  
            writer.Close();  
            // Creating StringReader instance and passing StringBuilder  
            StringReader reader = new StringReader(sb.ToString());  
            // Reading data  
            while (reader.Peek() > -1)  
            {  
                Console.WriteLine(reader.ReadLine());  
            }  
        }  
    }  
}  
Output:

Hello, Welcome to the javatpoint
It is nice site.
It provides technical tutorials

## C# StringReader Class
StringReader class is used to read data written by the StringWriter class. It is subclass of TextReader class. It enables us to read a string synchronously or asynchronously. It provides constructors and methods to perform read operations.

C# StringReader Signature
[SerializableAttribute]  
[ComVisibleAttribute(true)]  
public class StringReader : TextReader  
C# StringReader Constructors
StringReader has the following constructors.

Constructors
Description
StringReader(String)
Initializes a new instance of the StringReader class that reads from the specified string.
C# StringReader Methods
Following are the methods of StringReader class.

Method
Description
Close()
It is used to close the StringReader.
Dispose()
It is used to release all resources used by the TextReader object.
Equals(Object)
It determines whether the specified object is equal to the current object or not.
Finalize()
It allows an object to try to free resources and perform other cleanup operations.
GetHashCode()
It serves as the default hash function.
GetType()
It is used to get the type of the current instance.
Peek()
It is used to return the next available character but does not consume it.
Read()
It is used to read the next character from the input string.
ReadLine()
It is used to read a line of characters from the current string.
ReadLineAsync()
It is used to read a line of characters asynchronously from the current string.
ReadToEnd()
It is used to read all the characters from the current position to the end of the string.
ReadToEndAsync()
It is used to read all the characters from the current position to the end of the string asynchronously.
ToString()
It is used to return a string that represents the current object.
C# StringReader Example
In the following example, StringWriter class is used to write the string information and StringReader class is used to read the string, written by the StringWriter class.

using System;  
using System.IO;  
namespace CSharpProgram  
{  
    class Program  
    {  
        static void Main(string[] args)  
        {  
            StringWriter str = new StringWriter();  
            str.WriteLine("Hello, this message is read by StringReader class");  
            str.Close();  
            // Creating StringReader instance and passing StringWriter  
            StringReader reader = new StringReader(str.ToString());  
            // Reading data  
            while (reader.Peek() > -1)  
            {  
                Console.WriteLine(reader.ReadLine());  
            }  
        }  
    }  
}  
Output:

Hello, this message is read by StringReader class

## C# FileInfo Class
The FileInfo class is used to deal with file and its operations in C#. It provides properties and methods that are used to create, delete and read file. It uses StreamWriter class to write data to the file. It is a part of System.IO namespace.

C# FileInfo Class Signature
[SerializableAttribute]  
[ComVisibleAttribute(true)]  
public sealed class FileInfo : FileSystemInfo  
C# FileInfo Constructors
The following table contains constructors for the FileInfo class.

Constructor
Description
FileInfo(String)
It is used to initialize a new instance of the FileInfo class which acts as a wrapper for a file path.
C# FileInfo Properties
The following table contains properties of the FileInfo class.

Properties
Description
Attributes
It is used to get or set the attributes for the current file or directory.
CreationTime
It is used to get or set the creation time of the current file or directory.
Directory
It is used to get an instance of the parent directory.
DirectoryName
It is used to get a string representing the directory's full path.
Exists
It is used to get a value indicating whether a file exists.
FullName
It is used to get the full path of the directory or file.
IsReadOnly
It is used to get or set a value that determines if the current file is read only.
LastAccessTime
It is used to get or set the time from current file or directory was last accessed.
Length
It is used to get the size in bytes of the current file.
Name
It is used to get the name of the file.
C# FileInfo Methods
The following table contains methods of the FileInfo class.

Method
Description
AppendText()
It is used to create a StreamWriter that appends text to the file represented by this instance of the FileInfo.
CopyTo(String)
It is used to copy an existing file to a new file.
Create()
It is used to create a file.
CreateText()
It is used to create a StreamWriter that writes a new text file.
Decrypt()
It is used to decrypt a file that was encrypted by the current account using the Encrypt method.
Delete()
It is used to permanently delete a file.
Encrypt()
It is used to encrypt a file so that only the account used to encrypt the file can decrypt it.
GetAccessControl()
It is used to get a FileSecurity object that encapsulates the access control list (ACL) entries.
MoveTo(String)
It is used to move a specified file to a new specified location.
Open(FileMode)
It is used to open a file in the specified mode.
OpenRead()
It is used to create a read-only FileStream.
OpenText()
It is used to create a StreamReader with UTF8 encoding that reads from an existing text file.
OpenWrite()
It is used to create a write-only FileStream.
Refresh()
It is used to refresh the state of the object.
Replace(String,String)
It is used to replace the contents of a specified file with the file described by the current FileInfo object.
ToString()
It is used to return the path as a string.
C# FileInfo Example: Creating a File
using System;  
using System.IO;  
namespace CSharpProgram  
{  
    class Program  
    {  
        static void Main(string[] args)  
        {  
            try  
            {  
                // Specifying file location  
                string loc = "F:\\abc.txt";  
                // Creating FileInfo instance  
                FileInfo file = new FileInfo(loc);  
                // Creating an empty file  
                file.Create();  
                Console.WriteLine("File is created Successfuly");  
            }catch(IOException e)  
            {  
                Console.WriteLine("Something went wrong: "+e);  
            }  
        }  
    }  
}  
Output:

File is created Successfully
We can see inside the F drive a file abc.txt is created. A screenshot is given below.

CSharp File info 1
C# FileInfo Example: writing to the file
using System;  
using System.IO;  
namespace CSharpProgram  
{  
    class Program  
    {  
        static void Main(string[] args)  
        {  
            try  
            {  
                // Specifying file location  
                string loc = "F:\\abc.txt";  
                // Creating FileInfo instance  
                FileInfo file = new FileInfo(loc);  
                // Creating an file instance to write  
                StreamWriter sw = file.CreateText();  
                // Writing to the file  
                sw.WriteLine("This text is written to the file by using StreamWriter class.");  
                sw.Close();  
            }catch(IOException e)  
            {  
                Console.WriteLine("Something went wrong: "+e);  
            }  
        }  
    }  
}  
Output:

CSharp File info 2
C# FileInfo Example: Reading text from the file
using System;  
using System.IO;  
namespace CSharpProgram  
{  
    class Program  
    {  
        static void Main(string[] args)  
        {  
            try  
            {  
                // Specifying file to read  
                string loc = "F:\\abc.txt";  
                // Creating FileInfo instance  
                FileInfo file = new FileInfo(loc);  
                // Opening file to read  
                StreamReader sr = file.OpenText();  
                string data = "";  
                while ((data = sr.ReadLine()) != null)  
                {  
                     Console.WriteLine(data);  
                }  
            }  
            catch (IOException e)  
            {  
                Console.WriteLine("Something went wrong: " + e);  
            }  
        }  
    }  
}  
Output:

CSharp File info 3

Source : https://www.javatpoint.com/c-sharp-fileinfo

## C# DirectoryInfo Class
DirectoryInfo class is a part of System.IO namespace. It is used to create, delete and move directory. It provides methods to perform operations related to directory and subdirectory. It is a sealed class so, we cannot inherit it.

The DirectoryInfo class provides constructors, methods and properties that are listed below.

C# DirectoryInfo Syntax
[SerializableAttribute]  
[ComVisibleAttribute(true)]  
public sealed class DirectoryInfo : FileSystemInfo  
C# DirectoryInfo Constructors
The following table contains the constructors for the DirectoryInfo class.

Constructor
Description
DirectoryInfo(String)
It is used to initialize a new instance of the DirectoryInfo class on the specified path.
C# DirectoryInfo Properties
The following table contains the properties of the DirectoryInfo class.


Property
Description
Attributes
It is used to get or set the attributes for the current file or directory.
CreationTime
It is used to get or set the creation time of the current file or directory.
CreationTimeUtc
It is used to get or set creation time, in coordinated universal time (UTC).
Exists
It is used to get a value indicating whether the directory exists.
Extension
It is used to get the string representing the extension part of the file.
FullName
It is used to get the full path of the directory.
LastAccessTime
It is used to get or set the time the current file or directory was last accessed.
LastAccessTimeUtc
It is used to get or set the time, in coordinated universal time (UTC) that the current file or directory was last accessed.
LastWriteTime
It is used to get or set the time when the current file or directory was last written.
LastWriteTimeUtc
It is used to get or set the time, in coordinated universal time (UTC), when the current file or directory was last written.
Name
It is used to get the name of this DirectoryInfo instance.
Parent
It is used to get the parent directory of a specified subdirectory.
Root
It is used to get the root portion of the directory.
C# DirectoryInfo Methods
The following table contains the methods of the DirectoryInfo class.

Method
Description
Create()
It is used to create a directory.
Create(DirectorySecurity)
It is used to create a directory using a DirectorySecurity object.
CreateObjRef(Type)
It is used to create an object that contains all the relevant information required to generate a proxy used to communicate with a remote object.
CreateSubdirectory(String)
It is used to create a subdirectory or subdirectories on the specified path.
CreateSubdirectory(String,DirectorySecurity)
It is used to create a subdirectory or subdirectories on the specified path with the specified security.
Delete()
It is used to delete this DirectoryInfo if it is empty.
Delete(Boolean)
It is used to delete this instance of a DirectoryInfo, specifying whether to delete subdirectories and files.
EnumerateDirectories()
It returns an enumerable collection of directory information in the current directory.
EnumerateFiles()
It returns an enumerable collection of file information in the current directory.
GetAccessControl()
It is used to get a DirectorySecurity object that encapsulates the access control list (ACL) entries for the directory.
GetDirectories()
It returns the subdirectories of the current directory.
GetFiles()
It returns a file list from the current directory.
GetType()
It is used to get the Type of the current instance.
MoveTo(String)
It is used to move a DirectoryInfo instance and its contents to a new path.
Refresh()
It is used to refresh the state of the object.
SetAccessControl(DirectorySecurity)
It is used to set access control list (ACL) entries described by a DirectorySecurity object.
ToString()
It returns the original path that was passed by the user.
C# DirectoryInfo Example
In the following example, we are creating a javatpoint directory by specifying the directory path.

using System;  
using System.IO;  
namespace CSharpProgram  
{  
    class Program  
    {  
        static void Main(string[] args)  
        {  
            // Provide directory name with complete location.  
            DirectoryInfo directory = new DirectoryInfo(@"F:\javatpoint");  
            try  
            {  
                // Check, directory exist or not.  
                if (directory.Exists)  
                {  
                    Console.WriteLine("Directory already exist.");  
                    return;  
                }  
                // Creating a new directory.  
                directory.Create();  
                Console.WriteLine("The directory is created successfully.");  
            }  
            catch (Exception e)  
            {  
                Console.WriteLine("Directory not created: {0}", e.ToString());  
            }  
        }  
    }  
}  
Output:

The directory is created successfully.
In below screenshot, we can see that a directory is created.

CSharp Directory info 1
The DirectoryInfo class also provides a delete method to delete created directory. In the following program, we are deleting a directory that we created in previous program.

C# DirectoryInfo Example: Deleting Directory
using System;  
using System.IO;  
namespace CSharpProgram  
{  
    class Program  
    {  
        static void Main(string[] args)  
        {  
            // Providing directory name with complete location.  
            DirectoryInfo directory = new DirectoryInfo(@"F:\javatpoint");  
            try  
            {  
                // Deleting directory  
                directory.Delete();  
                Console.WriteLine("The directory is deleted successfully.");  
            }  
            catch (Exception e)  
            {  
                Console.WriteLine("Something went wrong: {0}", e.ToString());  
            }  
        }  
    }  
}  
Output:

The directory is deleted successfully.
It throws a System.IO.DirectoryNotFoundException exception if the specified directory not present at the location.

## C# Serialization
In C#, serialization is the process of converting object into byte stream so that it can be saved to memory, file or database. The reverse process of serialization is called deserialization.

Serialization is internally used in remote applications.

C# serialization
C# SerializableAttribute
To serialize the object, you need to apply SerializableAttribute attribute to the type. If you don't apply SerializableAttribute attribute to the type, SerializationException exception is thrown at runtime.

C# Serialization example
Let's see the simple example of serialization in C# where we are serializing the object of Student class. Here, we are going to use BinaryFormatter.Serialize(stream, reference) method to serialize the object.

using System;  
using System.IO;  
using System.Runtime.Serialization.Formatters.Binary;  
[Serializable]  
class Student  
{  
    int rollno;  
    string name;  
    public Student(int rollno, string name)  
    {  
        this.rollno = rollno;  
        this.name = name;  
    }  
}  
public class SerializeExample  
{  
    public static void Main(string[] args)  
    {  
        FileStream stream = new FileStream("e:\\sss.txt", FileMode.OpenOrCreate);  
        BinaryFormatter formatter=new BinaryFormatter();  
          
        Student s = new Student(101, "sonoo");  
        formatter.Serialize(stream, s);  
  
        stream.Close();  
    }  
}  
sss.txt:

JConsoleApplication1, Version=1.0.0.0, Culture=neutral, PublicKeyToken=null Student rollnoname e sonoo
As you can see, the serialized data is stored in the file. To get the data, you need to perform deserialization.

Source : https://www.javatpoint.com/c-sharp-serialization

## C# Deserialization
In C# programming, deserialization is the reverse process of serialization. It means you can read the object from byte stream. Here, we are going to use BinaryFormatter.Deserialize(stream) method to deserialize the stream.

C# deserialization
C# Deserialization Example
Let's see the simple example of deserialization in C#.

using System;  
using System.IO;  
using System.Runtime.Serialization.Formatters.Binary;  
[Serializable]  
class Student  
{  
    public int rollno;  
    public string name;  
    public Student(int rollno, string name)  
    {  
        this.rollno = rollno;  
        this.name = name;  
    }  
}  
public class DeserializeExample  
{  
    public static void Main(string[] args)  
    {  
        FileStream stream = new FileStream("e:\\sss.txt", FileMode.OpenOrCreate);  
        BinaryFormatter formatter=new BinaryFormatter();  
  
        Student s=(Student)formatter.Deserialize(stream);  
        Console.WriteLine("Rollno: " + s.rollno);  
        Console.WriteLine("Name: " + s.name);  
  
        stream.Close();  
    }  
}  
Output:

Rollno: 101
Name: sonoo

## C# System.IO Namespace

The System.IO namespace consists of IO related classes, structures, delegates and enumerations. These classes can be used to reads and write data to files or data streams. It also contains classes for file and directory support.

C# System.IO Namespace Classes

Following are the classes reside into System.IO namespace.

Class
Description
BinaryReader
It is used to read primitive data types as binary values in a specific encoding.
BinaryWriter
It is used to write primitive types in binary to a stream.
BufferedStream
It is used to add a buffering layer to read and write operations on another stream. It is a sealed class.
Directory
It is used to expose static methods for creating, moving and enumerating through directories and subdirectories. It is a sealed class.
DirectoryInfo
It is used to expose instance methods for creating, moving and enumerating through directories and subdirectories. It is a sealed class.
DirectoryNotFoundException
It is used to handle exception related to the file or directory cannot be found.
DriveInfo
It is used to access the information on a drive.
DriveNotFoundException
It is used to handle drive not found exception.
EndOfStreamException
It is used to handle end of stream exception.
ErrorEventArgs
It provides data for the FileSystemWatcher.Error event.
File
This class provides static methods for the creation, copying, deletion, moving and opening of a single file.
FileFormatException
It is used to handle file format exception.
FileInfo
It is used to provide properties and instance methods for the creation, copying, deletion, moving and opening of files.
FileLoadException
It is used to handle file load exception.
FileNotFoundException
It is used to handle file load exception.
FileNotFoundException
It is used to handle file not found exception.
FileStream
It provides a Stream for a file, supporting both synchronous and asynchronous read and write operations.
FileSystemEventArgs
It provides data for the directory events.
FileSystemInfo
It provides the base class for both FileInfo and DirectoryInfo objects.
FileSystemWatcher
It listens to the file system change notifications and raises events when a directory or file in a directory, changes.
InternalBufferOverflowException
This class is used to handle internal buffer overflow exception.
InvalidDataException
It is used to handle invalid data exception.
IODescriptionAttribute
It sets the description visual designers can display when referencing an event, extender or property.
IOException
It is an exception class that handles I/O errors.
MemoryStream
It is used to create a stream whose backing store is memory.
Path
It performs operations on String instances that contain file or directory path information.
PathTooLongException
It is an exception class and used to handle path too long exception.
PipeException
This exception class is used to handle pipe related exception.
RenamedEventArgs
It is used to provide data for the Renamed event.
Stream
It is used to provide a generic view of a sequence of bytes. It is an abstract class.
StreamReader
It is used to implement a TextReader that reads characters from a byte stream.
StringReader
It is used to implement a TextReader that reads from a string.
StringWriter
It is used to implement a TextWriter for writing information to a string. The information is stored in an underlying StringBuilder.
TextReader
This class is used to represent a reader that can read a sequential series of characters.
TextWriter
This class is used to represent a writer that can write a sequential series of characters.
UnmanagedMemoryAccessor
It is used to provide random access to unmanaged blocks of memory from managed code.
UnmanagedMemoryStream
It is used to get access to unmanaged blocks of memory from managed code.
System.IO Namespace Structures
Following are the structures reside into the System.IO Namespace.

Structure
Description
WaitForChangedResult
It contains information on the change that occurred.
System.IO Namespace Delegates
The System.IO Namespace contains the following delegates.

Delegates
Description
ErrorEventHandler
It represents the method that will handle the Error event of a FileSystemWatcher object.
FileSystemEventHandler
It represents the method that will handle the Changed, Created or Deleted event of a FileSystemWatcher class.
RenamedEventHandler
It represents the method that will handle the renamed event of a FileSystemWatcher class.
System.IO Namespace Enumerations
The following table contains the enumerations reside into the System.IO namespace.

Enumeration
Description
DriveType
It is used to define constants for drive types including CDRom, Fixed, Network etc.
FileAccess
It is used to define constants for read, write or read/write access to a file.
FileAttributes
It is used to provide attributes for files and directories.
FileMode
It is used to specify how the operating system should open a file.
FileOptions
It is used to represents advanced options for creating a FileStream object.
FileShare
It is used to contain constants for controlling the kind of access other FileStream objects can have to the same file.
HandleInheritability
It specifies whether the underlying handle is inheritable by child processes.
NotifyFilters
It is used to specify changes to watch for in a file or folder.
SearchOption
It is used to specify whether to search the current directory or the current directory and all subdirectories.
SeekOrigin
It is used to specify the position in a stream to use for seeking.
WatcherChangeTypes
It changes that might occur to a file or directory.

Source : https://www.javatpoint.com/c-sharp-system-io

---

[Back](readme.md)