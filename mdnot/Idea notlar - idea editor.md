





## Kısayollar





- Ctrl + E : Recently visited files  ( eski açılan dosyalar )
- Alt + 2 : Favorites




### Edit

- If you are already in the Project View, press **Alt+Insert (New) | Class**. Project View can be activated via Alt+1.
  - To create a new class in the same directory as the current one use Ctrl+Alt+Insert (New...).
  - You can also do it from the Navigation Bar, press Alt+Home, then choose package with arrow keys, then press Alt+Insert.
  - Another useful shortcut is View | Select In (Alt+F1), Project (1), then Alt+Insert to create a class near the existing one or use arrow keys to navigate through the packages.
  - And yet another way is to just type the class name in the existing code where you want to use it, IDEA will highlight it in red as it doesn't exist yet, then press Alt+Enter for the Intention Actions pop-up, choose Create Class.
  - With Esc and Command + 1 you can navigate between project view and editor area - back and forward, in this way you can select the folder/location you need
  - With Control +Option + N you can trigger New file menu and select whatever you need, class, interface, file, etc. This works in editor as well in project view and it relates to the current selected location







// please consider that this is working with standard key mapping



## Navigation

- Ctrl+Shift+Backspace (Navigate | Last Edit Location) brings you back to the last place where you made changes in the code. Pressing Ctrl+Shift+Backspace a few times moves you deeper into your changes history.







## Inserting live template

There are 2 options to insert live template:

1. Type live template abbreviation (for example **dep**) and next press **TAB** key
2. Use shortcut **Command + J** (Mac) / **Ctrl + J** (PC) to popup list of available live templates in current context

At the beginning it’s quite difficult to remember all you wish to use and going back and forth from code to settings or browsing list is not very efficient – especially when you don’t know what you are looking for. That’s why I created gallery of (in my opinion) most useful built-in live templates for Java and Maven that can be used as a **cheat sheet**:

## Maven

- **dep** – Inserts <dependency/>



- **pl** – Inserts <plugin/>



- **repo** – Inserts <repo/>



## Iterations

- **fori** – creates iteration loop

!

- **itar** – iterates elements of array



- **itco** – iterates elements of java.util.Collection



- **iter** – iterates Iterable


- **itit** – iterates java.util.Iterator



- **itli** – iterates elements of java.util.List



## Other

- **ifn** – Inserts “if null” statement


- **inn** – Inserts “if not null” statement



- **inst** – Checks object type with instanceof and down-casts it



- **lazy** – Performs lazy initialization



## Plain

- **psf** – public static final



- **psfi** – public static final int