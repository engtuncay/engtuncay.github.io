

##Rename Refactoring

It's easy to rename a symbol such as a function name or variable name. Hit F2 while in the symbol Book to rename all instances - this will occur across all files in a project. You can also see refactoring in the right click context menu.

## Refactoring via Extraction
Sometimes you want factor already written code into a separate function or constant to use it later again. Select the lines you want to factor out and press Ctrl+. or click the little light bulb and choose one of the respective Extract to... options. Try it by selecting the code inside the if-clause on line 3 or any other common code you want to factor out.

##Code Folding
In a large file it can often be useful to collapse sections of code to increase readability. 
To do this you can simply press Ctrl+Shift+ğ to fold the code - 
press Ctrl+Shift+ü to unfold. 
Folding can also be done with the +/- icons in the left gutter.(?????)  
To fold all sections Ctrl+K Ctrl+0 or to unfold all Ctrl+K Ctrl+J.

##Formatting
Keeping your code looking great is hard without a good formatter. Luckily it's easy to format content either the entire document with Shift+Alt+F or formatting can be applied to the current selection with Ctrl+K Ctrl+F. Both of these options are also available through the right click context menu.

Tip: Additional formatters are available in the extension gallery. Formatting support can also be configured via settings e.g. enabling editor.formatOnSave.


##Errors and Warnings

Errors and warnings are highlighted as you edit your code with squiggles. In the sample below you can see a number of syntax errors. By pressing F8 you can navigate across them in sequence and see the detailed error message. As you correct them the squiggles and scrollbar indicators will update.


##Sorting Extensions
@sort:installs