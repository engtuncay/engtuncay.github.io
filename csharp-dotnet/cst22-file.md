
C# FileStream

Source : https://www.javatpoint.com/c-sharp-filestream

[Home](readme.md)

---

**Contents**

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
  
C# TextWriter class is an abstract class. It is used to write text or sequential series of characters into file. It is found in System.IO namespace.

C# TextWriter Example
Let's see the simple example of TextWriter class to write two lines data.

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
Output:

Data written successfully...
f.txt:

Hello C#
C# File Handling by JavaTpoint