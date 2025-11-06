Idea Extension on Vsc

[Back](../readme.md)

---

# Idea Extension

## Editing

Linux, Windows Feature Supported

| Shortcut         | Desc Note                                                                                   |
| ---------------- | ------------------------------------------------------------------------------------------- |
| ctrl+space       | Basic code completion (the name of any class, method or variable) ✅                        |
| ctrl+shift+space | Smart code completion <br/>(filters the list of methods and variables by expected type) N/A |
| enter            | Choose Lookup Item ✅                                                                       |
| tab              | Choose Lookup Item Replace ✅                                                               |
| ctrl+shift+enter | Complete Current Statement ✅                                                               |
| ctrl+p           | Parameter info (within method call arguments) ✅                                            |
| ctrl+q           | Quick documentation lookup ✅                                                               |

N/A Quick documentation lookup ✅
ctrl+f1 External Doc N/A
ctrl+mouseover Brief Info N/A
ctrl+f1 Show descriptions of error or warning at caret ✅
alt+insert Generate code... (Getters, Setters, Constructors, hashCode/equals, toString) ✅
alt+insert New... ✅
ctrl+o Override methods ✅
ctrl+i Implement methods ✅
ctrl+alt+t Surround with... (if..else, try..catch, for, synchronized, etc.) N/A
N/A Open in Opposite Group ✅
ctrl+/ Comment/uncomment with line comment ✅
ctrl+numpad_divide Comment/uncomment with line comment ✅
ctrl+shift+/ Comment/uncomment with block comment ✅
ctrl+shift+numpad_divide Comment/uncomment with block comment ✅
ctrl+w Select successively increasing code blocks ✅
ctrl+shift+w Decrease current selection to previous state ✅
alt+q Context info N/A
alt+enter Show intention actions and quick-fixes ✅
ctrl+alt+l Reformat code ✅
ctrl+alt+l Reformat selected code ✅
ctrl+alt+o Optimize imports ✅
ctrl+alt+i Auto-indent line(s) N/A
tab Indent selected lines N/A
shift+tab Unindent selected lines N/A
ctrl+x Cut current line or selected block to clipboard ✅
shift+delete Cut current line or selected block to clipboard ✅
ctrl+c Copy current line or selected block to clipboard ✅
ctrl+v Paste from clipboard ✅
ctrl+shift+v Paste from recent buffers... N/A
ctrl+d Duplicate Line ✅
ctrl+d Duplicate Selection ✅
ctrl+y Delete line at caret ✅
ctrl+shift+j Smart line join ✅
ctrl+enter Smart line split ✅
shift+enter Start new line ✅
ctrl+shift+u Toggle case for word at caret or selected block N/A
ctrl+shift+] Select till code block end N/A
ctrl+shift+[ Select till code block start N/A
ctrl+right Cursor to word end ✅
ctrl+right Cursor to hump end ✅
ctrl+left Cursor to word start ✅
ctrl+left Cursor to hump start ✅
ctrl+shift+right Select to word end ✅
ctrl+shift+right Select to hump end ✅
ctrl+shift+left Select to word start ✅
ctrl+shift+left Select to hump start ✅
ctrl+delete Delete to word end ✅
ctrl+delete Delete to hump end ✅
ctrl+backspace Delete to word start ✅
ctrl+backspace Delete to hump start ✅
ctrl+. Fold selection ✅
ctrl+= Expand code block ✅
ctrl+numpad_add Expand code block ✅
ctrl+- Collapse code block ✅
ctrl+numpad_subtract Collapse code block ✅
ctrl+alt+= Expand code block recursively ✅
ctrl+alt+numpad_add Expand code block recursively ✅
ctrl+alt+- Collapse code block recursively ✅
ctrl+alt+numpad_subtract Collapse code block recursively ✅
ctrl+shift+= Expand all ✅
ctrl+shift+numpad_add Expand all ✅
ctrl+shift+- Collapse all ✅
ctrl+shift+numpad_subtract Collapse all ✅
ctrl+f4 Close active editor tab ✅
alt+j Add selection for Next Occurrence ✅
alt+shift+j Unselect Occurrence ✅
shift+alt+down Move Line Down ✅
shift+alt+up Move Line Up ✅
shift+alt+insert Column Selection Mode ✅
shift+alt+. Increase Font Size in All Editors ✅
shift+alt+, Decrease Font Size in All Editors ✅

## Search/Replace

Linux, Windows Feature Supported
shift shift Search everywhere ✅
ctrl+f Find ✅
f3 Find next ✅
shift+f3 Find previous ✅
ctrl+r Replace ✅
ctrl+shift+f Find in path ✅
ctrl+shift+r Replace in path ✅
ctrl+shift+s Search structurally (Ultimate Edition only) N/A
ctrl+shift+m Replace structurally (Ultimate Edition only) N/A

## Usage Search

Linux, Windows Feature Supported
alt+f7 Find usages ✅
alt+ctrl+f7 Show usages ✅
N/A Next Highlighted Usage ✅
N/A Previous Highlighted Usage ✅
ctrl+f7 Find usages in file N/A
ctrl+shift+f7 Highlight usages in file N/A
ctrl+alt+f7 Show usages N/A

## Compile and Run

Linux, Windows Feature Supported
ctrl+f9 Make project (compile modifed and dependent) ✅
ctrl+shift+f9 Compile selected file, package or module N/A
alt+shift+f10 Select configuration and run ✅
alt+shift+f9 Select configuration and debug ✅
ctrl ctrl Run Anything ✅
shift+f10 Run ✅
shift+f9 Debug ✅
ctrl+shift+f10 Run context configuration from editor N/A
ctrl+shift+f10 Debug context configuration from editor N/A

## Debugging

Linux, Windows Feature Supported
ctrl+f2 Stop ✅
f8 Step over ✅
f7 Step into ✅
shift+f7 Smart step into N/A
shift+f8 Step out ✅
alt+f9 Run to cursor ✅
alt+f8 Evaluate expression ✅
alt+f8 Evaluate expression (selection) ✅
f9 Resume program ✅
ctrl+f8 Toggle breakpoint ✅
ctrl+shift+f8 View breakpoints ✅

## Navigation

Linux, Windows Feature Supported
ctrl+n Go to class ✅
ctrl+shift+n Go to file ✅
ctrl+alt+shift+n Go to symbol ✅
alt+left Go to previous editor tab ✅
N/A Go to previous editor tab ✅
alt+right Go to next editor tab ✅
N/A Go to next editor tab ✅
f12 Go back to previous tool window N/A
escape Go to editor (from tool window) N/A
shift+escape Hide Active Tool Window ✅
ctrl+shift+f4 Close active run/messages/find/... tab N/A
ctrl+shift+' Maximize Tool Window (Problems, Output, Debug Console, Terminal) ✅
ctrl+g Go to line ✅
ctrl+e Recent files popup ✅
ctrl+alt+left Navigate back ✅
N/A Navigate back ✅
ctrl+alt+right Navigate forward ✅
N/A Navigate forward ✅
ctrl+shift+backspace Navigate to last edit location ✅
alt+f1 Select current file or symbol in any view N/A
ctrl+b Go to declaration ✅
ctrl+alt+b Go to implementation(s) ✅
ctrl+u Go to super implementation(s) ✅
ctrl+shift+i Open quick definition lookup ✅
N/A Open quick definition lookup ✅
ctrl+shift+b Go to type declaration ✅
ctrl+u Go to super-method/super-class ✅
alt+up Go to previous method N/A
alt+down Go to next method N/A
ctrl+] Move to code block end N/A
ctrl+[ Move to code block start N/A
alt+7 Structure ✅
ctrl+f12 File structure popup ✅
ctrl+h Type hierarchy ✅
ctrl+shift+h Method hierarchy N/A
ctrl+alt+h Call hierarchy ✅
f2 Next highlighted error ✅
shift+f2 Previous highlighted error ✅
f4 Edit source ✅
ctrl+enter View source ✅
shift+ctrl+down Move Statement Down ✅
shift+ctrl+up Move Statement Up ✅
alt+home Show navigation bar N/A
f11 Toggle bookmark N/A
ctrl+f11 Toggle bookmark with mnemonic N/A
ctrl+0 Go to numbered bookmark N/A
shift+f11 Show bookmarks N/A
ctrl+alt+shift+down Next Change ✅
ctrl+alt+shift+up Previous Change ✅
ctrl+home Move Caret to Text Start ✅
ctrl+end Move Caret to Text End ✅
ctrl+shift+m Move Caret to Matching Brace ✅
ctrl+shift+t Go to Test ✅

## Refactoring

Linux, Windows Feature Supported
f5 Copy N/A
ctrl+alt+shift+t Refactor This... ✅
f6 Move ✅
alt+delete Safe Delete N/A
shift+f6 Rename ✅
shift+f6 Select All Occurrences ✅
shift+f6 Rename (File) ✅
ctrl+f6 Change Signature ✅
ctrl+alt+n Inline N/A
ctrl+alt+m Extract Method ✅
ctrl+alt+v Extract Variable ✅
ctrl+alt+f Extract Field ✅
ctrl+alt+c Extract Constant ✅
ctrl+alt+p Introduce Parameter ✅

## VCS/Local History

Linux, Windows Feature Supported
ctrl+alt+k Commit project to VCS ✅
ctrl+shift+k Push commits to VCS ✅
ctrl+t Update project from VCS ✅
ctrl+alt+z Rollback Lines ✅
f4 Jump to Source ✅
alt+shift+c View recent changes N/A

## Live Templates

Linux, Windows Feature Supported
ctrl+alt+j Surround with Live Template N/A
ctrl+j Insert Live Template N/A

## General

Linux, Windows Feature Supported
alt+0 Activate Messages window (Problems) ✅
alt+numpad0 Activate Messages window (Problems) ✅
alt+1 Open corresponding tool window (Explorer) ✅
alt+numpad1 Open corresponding tool window (Explorer) ✅
alt+1 Close corresponding tool window (Explorer) ✅
alt+numpad1 Close corresponding tool window (Explorer) ✅
alt+3 Open corresponding tool window (Search) ✅
alt+numpad3 Open corresponding tool window (Search) ✅
alt+3 Close corresponding tool window (Search) ✅
alt+numpad3 Close corresponding tool window (Search) ✅
alt+5 Open corresponding tool window (Debug) ✅
alt+numpad5 Open corresponding tool window (Debug) ✅
alt+5 Close corresponding tool window (Debug) ✅
alt+numpad5 Close corresponding tool window (Debug) ✅
alt+9 Open corresponding tool window (Git) ✅
alt+numpad9 Open corresponding tool window (Git) ✅
alt+9 Close corresponding tool window (Git) ✅
alt+numpad9 Close corresponding tool window (Git) ✅
ctrl+s Save all ✅
ctrl+alt+y Synchronize N/A
N/A Toggle full screen mode ✅
ctrl+shift+f12 Toggle maximizing editor N/A
alt+shift+f Add to Favorites N/A
alt+shift+i Inspect current file with current profile N/A
ctrl+` Quick switch current scheme ✅
ctrl+alt+s Open Settings dialog ✅
ctrl+alt+s Open Settings dialog ✅
ctrl+alt+shift+s Open Project Structure dialog ✅
ctrl+shift+a Find Action ✅
ctrl+tab Switch between tabs and tool window ✅
shift+f12 Restore Default layout ✅

## Custom

Linux, Windows Feature Supported
ctrl+d Compare Files ✅
ctrl+d Compare Selected Files ✅
ctrl+shift+tab Select Opposite Diff Pane ✅
f7 Next difference ✅
shift+f7 Previous difference ✅
alt+ctrl+enter Start new line before current ✅
shift+ctrl+enter Start new line ✅
alt+f12 Opens and focuses corresponding tool window (Terminal) ✅
alt+f12 Close corresponding tool window (Terminal) ✅
ctrl+shift+alt+j Sublime Text style multiple selections ✅
alt+left Select previous tab (Terminal) ✅
alt+right Select next tab (Terminal) ✅
alt+tab Goto next splitter ✅
shift+alt+tab Goto previous splitter ✅
enter Open Highlighted File (Explorer) ✅
f4 Open Highlighted File (Explorer) ✅
alt+home Jump to Navigation Bar ✅
shift+ctrl+c Copy paths ✅


