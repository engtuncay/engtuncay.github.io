C# Properties

Source : https://www.javatpoint.com/c-sharp-properties

[Home](readme.md)

---

**Contents**



C# Properites doesn't have storage location. C# Properites are extension of fields and accessed like fields.

The Properties have accessors that are used to set, get or compute their values.

Usage of C# Properties
C# Properties can be read-only or write-only.
We can have logic while setting values in the C# Properties.
We make fields of the class private, so that fields can't be accessed from outside the class directly. Now we are forced to use C# properties for setting or getting values.
C# Properties Example
using System;  
   public class Employee  
    {  
        private string name;  
  
        public string Name  
        {  
            get  
            {  
                return name;  
            }  
            set  
            {  
                name = value;  
            }  
        }  
   }  
   class TestEmployee{  
       public static void Main(string[] args)  
        {  
            Employee e1 = new Employee();  
            e1.Name = "Sonoo Jaiswal";  
            Console.WriteLine("Employee Name: " + e1.Name);  
  
        }  
    }  
Output:

Employee Name: Sonoo Jaiswal
C# Properties Example 2: having logic while setting value
using System;  
   public class Employee  
    {  
        private string name;  
  
        public string Name  
        {  
            get  
            {  
                return name;  
            }  
            set  
            {  
                name = value+" JavaTpoint";  
                  
            }  
        }  
   }  
   class TestEmployee{  
       public static void Main(string[] args)  
        {  
            Employee e1 = new Employee();  
            e1.Name = "Sonoo";  
            Console.WriteLine("Employee Name: " + e1.Name);  
        }  
    }  
Output:

Employee Name: Sonoo JavaTpoint
C# Properties Example 3: read-only property
using System;  
   public class Employee  
    {  
        private static int counter;  
  
        public Employee()  
        {  
            counter++;  
        }  
        public static int Counter  
        {  
            get  
            {  
                return counter;  
            }  
         }  
   }  
   class TestEmployee{  
       public static void Main(string[] args)  
        {  
            Employee e1 = new Employee();  
            Employee e2 = new Employee();  
            Employee e3 = new Employee();  
            //e1.Counter = 10;//Compile Time Error: Can't set value  
  
            Console.WriteLine("No. of Employees: " + Employee.Counter);  
        }  
    }  
Output:

No. of Employees: 3