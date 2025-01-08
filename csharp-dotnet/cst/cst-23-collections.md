
Source : https://www.javatpoint.com/c-sharp-collections

[Back](../readme.md)

---

- [C# Collections](#c-collections)
  - [Types of Collections in C#](#types-of-collections-in-c)
- [C# `List<T>`](#c-listt)
- [C# `HashSet<T>`](#c-hashsett)
- [C# `SortedSet<T>`](#c-sortedsett)
- [C# `Stack<T>`](#c-stackt)
- [C# `Queue<T>`](#c-queuet)
- [C# `LinkedList<T>`](#c-linkedlistt)
- [C# `Dictionary<K,V>`](#c-dictionarykv)
- [C# `SortedDictionary<K,V>`](#c-sorteddictionarykv)
- [C# `SortedList<K,V>`](#c-sortedlistkv)


# C# Collections

In C#, collection represents group of objects. By the help of collections, we can perform various operations on objects such as

- store object
- update object
- delete object
- retrieve object
- search object, and
- sort object

In sort, all the data structure work can be performed by C# collections.

We can store objects in array or collection. Collection has advantage over array. Array has size limit but objects stored in collection can grow or shrink dynamically.

## Types of Collections in C#

There are 3 ways to work with collections. The three namespaces are given below:

- System.Collections.Generic classes
- System.Collections classes (Now deprecated)
- System.Collections.Concurrent classes

1) System.Collections.Generic classes

The System.Collections.Generic namespace has following classes:

- List
- Stack
- Queue
- LinkedList
- HashSet
- SortedSet
- Dictionary
- SortedDictionary
- SortedList

2) System.Collections classes

These classes are legacy. It is suggested now to use System.Collections.Generic classes. The System.

Collections namespace has following classes:

- ArrayList
- Stack
- Queue
- Hashtable
- 
3) System.Collections.Concurrent classes

The System.Collections.Concurrent namespace provides classes for thread-safe operations. Now multiple threads will not create problem for accessing the collection items.

The System.Collections.Concurrent namespace has following classes:

- BlockingCollection
- ConcurrentBag
- ConcurrentStack
- ConcurrentQueue
- ConcurrentDictionary
- Partitioner
- Partitioner
- OrderablePartitioner

# C# `List<T>`

C# `List<T>` class is used to store and fetch elements. It can have duplicate elements. It is found in System.Collections.Generic namespace.

🧲 C# `List<T>` example

Let's see an example of generic `List<T>` class that stores elements using `Add()` method and iterates the list using for-each loop.

```cs
using System;  
using System.Collections.Generic;  
  
public class ListExample  
{  
    public static void Main(string[] args)  
    {  
        // Create a list of strings  
        var names = new List<string>();  
        names.Add("Sonoo Jaiswal");  
        names.Add("Ankit");  
        names.Add("Peter");  
        names.Add("Irfan");  
  
        // Iterate list element using foreach loop  
        foreach (var name in names)  
        {  
            Console.WriteLine(name);  
        }  
    }  
}  
//Output:
//
//Sonoo Jaiswal
//Ankit
//Peter
//Irfan

```

C# List`<T>` example using collection initializer

```cs
using System;  
using System.Collections.Generic;  
  
public class ListExample  
{  
    public static void Main(string[] args)  
    {  
        // Create a list of strings using collection initializer  
        var names = new List<string>() {"Sonoo", "Vimal", "Ratan", "Love" };  
         
        // Iterate through the list.  
        foreach (var name in names)  
        {  
            Console.WriteLine(name);  
        }  
    }  
}  
// Output:
// 
// 
// Sonoo
// Vimal
// Ratan
// Love

```

# C# `HashSet<T>`

C# HashSet class can be used to store, remove or view elements. It does not store duplicate elements. It is suggested to use HashSet class if you have to store only unique elements. It is found in System.Collections.Generic namespace.

Let's see an example of generic `HashSet<T>` class that stores elements using Add() method and iterates elements using for-each loop.

```cs
using System;  
using System.Collections.Generic;  
  
public class HashSetExample  
{  
    public static void Main(string[] args)  
    {  
        // Create a set of strings  
        var names = new HashSet<string>();  
        names.Add("Sonoo");  
        names.Add("Ankit");  
        names.Add("Peter");  
        names.Add("Irfan");  
        names.Add("Ankit");//will not be added  
          
        // Iterate HashSet elements using foreach loop  
        foreach (var name in names)  
        {  
            Console.WriteLine(name);  
        }  
    }  
}  
// Output:
// 
// Sonoo
// Ankit
// Peter
// Irfan

```
Example 2

Let's see another example of generic `HashSet<T>` class that stores elements using Collection initializer.

```cs
using System;  
using System.Collections.Generic;  
  
public class HashSetExample  
{  
    public static void Main(string[] args)  
    {  
        // Create a set of strings  
        var names = new HashSet<string>(){"Sonoo", "Ankit", "Peter", "Irfan"};  
          
        // Iterate HashSet elements using foreach loop  
        foreach (var name in names)  
        {  
            Console.WriteLine(name);  
        }  
    }  
}  
// Output:
// 
// Sonoo
// Ankit
// Peter
// Irfan

```


# C# `SortedSet<T>`

# C# `Stack<T>`

# C# `Queue<T>`

# C# `LinkedList<T>`


# C# `Dictionary<K,V>`

# C# `SortedDictionary<K,V>`

# C# `SortedList<K,V>`