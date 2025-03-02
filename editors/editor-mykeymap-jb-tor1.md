
OrakSoft Keyboard shortcuts for Windows Based On `Jetbtrains`

[Back](../readme.md)

Source : https://www.jetbrains.com/help/idea/reference-keymap-win-default.html

(some parts may be modified or added)

---

<h2>Info About This Article</h2> 

- cs+s means Ctrl + Shift + S key
- c+k,s means c+k, then c+s
- shortcuts with alt key may coincide with alt plus menu keys (alt ile olanlar menu kısayolu ile çakışabilir)
- (*) symbol means that user changed key

# Windows Keymap

## Contents

- [Windows Keymap](#windows-keymap)
  - [Contents](#contents)
  - [Intro](#intro)
  - [Top keyboard shortcuts](#top-keyboard-shortcuts)
  - [Nonlogic Keymap](#nonlogic-keymap)
  - [Build projects](#build-projects)
  - [Basic editing](#basic-editing)
  - [Caret navigation](#caret-navigation)
  - [Select text](#select-text)
  - [Code folding](#code-folding)
  - [Multiple carets and selection ranges](#multiple-carets-and-selection-ranges)
  - [Coding assistance](#coding-assistance)
  - [Context navigation](#context-navigation)
  - [Find everything](#find-everything)
  - [Navigate from symbols](#navigate-from-symbols)
  - [Code analysis](#code-analysis)
  - [Run and debug](#run-and-debug)
  - [Refactorings](#refactorings)
  - [Global VCS actions](#global-vcs-actions)
  - [Diff Viewer](#diff-viewer)
  - [Tool windows](#tool-windows)
 
---

## Intro

Last modified: 12 December 2+24
    
You can find all shortcuts and modify them in `Settings | Keymap`.

You can also print the default keymap reference card.

##  Top keyboard shortcuts
    
Key             | Desc
----------------|-----------------------
Double Shift    | Search Everywhere
cs+A            | Find Action...
a+1             | Show Project window
cs+F9           | Rebuild
Alt+Enter       | Show Intention Actions
Ctrl+E          | Recent Files
AltF7           | Find Usages
AltF1           | Select In...
CtrlAlt+S       | Settings...
(Alt+.) Alt+Ins | Generate...
Double Ctrl     | Run Anything
AltShiftF9      | Debug...
CtrlShiftF8     | View Breakpoints...
ca+F5           | Attach to Process...
cas+t           | Refactor This...
ca+L            | Reformat Code
cs+L            | Reformat File

Nonlogic Keymap
----
Alt+backtick    |VCS Operations Popup...

[Contents](#contents)

## Build projects
    
Key           | Desc
--------------|----------------------
CtrlAltInsert | New in This Directory
CtrlF9        | Build Project
CtrlShiftF9   | Rebuild

[Contents](#contents)
    
## Basic editing

Key                | Desc
-------------------|----------------------------------
Ctrl+X             | Cut
Ctrl+C             | Copy
Ctrl+V             | Paste
CtrlAltShift+V     | Paste as Plain Text
CtrlShift+V        | Paste from History...
CtrlShift+C        | Copy Paths
CtrlAltShift+C     | Copy Reference
Ctrl+S             | Save All
Ctrl+Z             | Undo
CtrlShift+Z        | Redo
Tab                | Indent Selection
ShiftTab           | Unindent Line or Selection
CtrlAlt+I          | Auto-Indent Lines
ShiftEnter         | Start New Line
CtrlAltEnter       | Start New Line Before Current
Ctrl+Y             | Delete Line
CtrlShift+J        | Join Lines
Ctrl+D             | Duplicate Line or Selection
CtrlShift+U        | Toggle Case
CtrlAltShiftInsert | Scratch File
ShiftF4            | Open Source in New Window
AltShift+.         | Increase Font Size in All Editors
AltShift+,         | Decrease Font Size in All Editors

[Contents](#contents)
  	
## Caret navigation

Key         | Desc
------------|-------------------------------
Ctrl+left   | Move Caret to Previous Word
Ctrl+right  | Move Caret to Next Word
Home        | Move Caret to Line Start
End         | Move Caret to Line End
CtrlShift+M | Move Caret to Matching Brace
Ctrl+[      | Move Caret to Code Block Start
Ctrl+]      | Move Caret to Code Block End
Alt+down    | Next Method
Alt+up      | Previous Method
C+Home      | Move Caret to Text Start
C+End       | Move Caret to Text End

UnFrequently
.           | Move Caret to Page Top (CtrlPg Up)
.           | Move Caret to Page Bottom (CtrlPg Dn)


[Contents](#contents)
    
## Select text

Key             | Desc
----------------|----------------------------------------------
Ctrl+A          | Select All
Shift+left      | Left with Selection
Shift+right     | Right with Selection
CtrlShift+left  | Move Caret to Previous Word with Selection
CtrlShift+right | Move Caret to Next Word with Selection
ShiftHome       | Move Caret to Line Start with Selection
ShiftEnd        | Move Caret to Line End with Selection
Shift+up        | Up with Selection
Shift+down      | Down with Selection
CtrlShift+[     | Move Caret to Code Block Start with Selection
CtrlShift+]     | Move Caret to Code Block End with Selection
CtrlShiftPg Up  | Move Caret to Page Top with Selection
CtrlShiftPg Dn  | Move Caret to Page Bottom with Selection
ShiftPg Up      | Page Up with Selection
ShiftPg Dn      | Page Down with Selection
CtrlShiftHome   | Move Caret to Text Start with Selection
CtrlShiftEnd    | Move Caret to Text End with Selection
Ctrl+W          | Extend Selection
CtrlShift+W     | Shrink Selection

[Contents](#contents)
  	
## Code folding

Key               | Desc
------------------|---------------------
CtrlNumPad +      | Expand
CtrlNumPad -      | Collapse
CtrlAltNumPad +   | Expand Recursively
CtrlAltNumPad -   | Collapse Recursively
CtrlShiftNumPad + | Expand All
CtrlShiftNumPad - | Collapse All
Ctrl+.            | Fold Selection

[Contents](#contents)
  	
## Multiple carets and selection ranges

Key                  | Desc
---------------------|-----------------------------------------------
AltShiftClick        | Add/Remove Caret
AltShiftInsert       | Toggle Column Selection Mode
Double Ctrl + Up     | Clone Caret Above
Double Ctrl + Down   | Clone Caret Below
AltShift+G           | Add Caret to Each Line in Selection
Alt+J                | Add Selection for Next Occurrence
CtrlAltShift+J       | Select All Occurrences
AltShift+J           | Deselect Last Occurrence
AltShiftMiddle click | Create Rectangular Selection
AltClick             | Drag to Create Rectangular Selection
CtrlAltShiftClick    | Drag to Create Multiple Rectangular Selections

[Contents](#contents)

##  Coding assistance

Key                 | Desc
--------------------|--------------------------------
C+. (*) (Alt+Enter) | Show Context Actions
C+Space             | Basic Completion
CS+Space            | Type-Matching Completion
CA+Space            | Second Basic Completion
CtrlShiftEnter      | Complete Current Statement
CtrlAlt+L           | Reformat Code
C+q,p (*)           | Parameter Info (c+p)
C+q,q (*)           | Quick Documentation (c+q)
CtrlShift+up        | Move Statement Up
CtrlShift+down      | Move Statement Down
CtrlAltShift+left   | Move Element Left
CtrlAltShift+right  | Move Statement Right
AltShift+up         | Move Line Up
AltShift+down       | Move Line Down
Ctrl+/              | Comment with Line Comment
CtrlShift+/         | Comment with Block Comment
CtrlAlt+T           | Surround With...
A+. (*) (A+Insert)  | Generate...
---Not-Feasible---  | ------------------
Alt+\               | Complete Code with AI Assistant
Ctrl+\              | Generate Code with AI Assistant

    
[Contents](#contents)

## Context navigation

Key                | Desc
-------------------|------------------------------
Alt+down           | Next Method
Alt+up             | Previous Method
Ctrl+G             | Go to Line/Column...
Ctrl+Tab           | Switcher
Alt+F1             | Select In...
C+E                | Recent Files
AS+c               | Recent Changes
CS+Backspace       | Last Edit Location
A+left (*)         | Back (ca+left)
A+right (*)        | Forward (ca+right)
c+pgup (*) ca+left | Select Previous Tab (a+left)
c+pgdown (*)       | Select Next Tab (a+right)
F11                | Toggle Anonymous Bookmark
CtrlShift          | Toggle Bookmark with Digit
Ctrl+F11           | Toggle Bookmark with Mnemonic
Shift+F11          | Show All Bookmarks
Ctrl               | Go to Bookmark with Digit
CS+F11             | Show Mnemonic Bookmarks
Alt+2              | Show Bookmarks window
Alt+7              | Show Structure window
Alt+3              | Show Find window
CtrlAlt+down       | Next Occurrence
CtrlAlt+up         | Previous Occurrence
    
[Contents](#contents)

## Find everything

Key            | Desc
---------------|--------------------------------------------
Double Shift   | Search Everywhere
Ctrl+F         | Find...
F3             | Find Next / Move to Next Occurrence
Shift+F3       | Find Previous / Move to Previous Occurrence
Ctrl+R         | Replace...
CtrlShift+F    | Find in Files...
CtrlShift+R    | Replace in Files...
CtrlF3         | Next Occurrence of the Word at Caret
CtrlShift+N    | Go to File...
CtrlF12        | File Structure
CtrlAltShift+N | Go to Symbol...
CtrlShift+A    | Find Action...

[Contents](#contents)
  	
## Navigate from symbols

Key         | Desc
------------|----------------------------
AltF7       | Find Usages
Ctrl+B      | Go to Declaration or Usages
CtrlShift+B | Go to Type Declaration
CtrlAltF7   | Show Usages
Ctrl+U      | Go to Super Method
CtrlAlt+B   | Go to Implementation(s)
CtrlShift+T | Go to Test
CtrlShiftF7 | Highlight Usages in File
    
## Code analysis

Key            | Desc
---------------|-------------------------------------
AltEnter       | Show Intention Actions
CtrlF1         | Error Description
F9 (*)         | Next Highlighted Error (F2)
s+f9 (*)       | Previous Highlighted Error (ShiftF2)
CtrlAltShift+I | Run Inspection by Name...
Alt+6          | Show Problems window
  	
## Run and debug

Key            | Desc
---------------|--------------------------------------
Double Ctrl    | Run Anything
ShiftF1+       | Run context configuration
AltShiftF1+    | Run...
.              | Debug context configuration (ShiftF9)
AltShiftF9     | Debug...
CtrlAltF5      | Attach to Process...
CtrlF2         | Stop
F9             | Resume Program
CtrlShiftF2    | Stop Background Processes...
F8             | Step Over
AltShiftF8     | Force Step Over
F7             | Step Into
ShiftF7        | Smart Step Into
AltShiftF7     | Force Step Into
ShiftF8        | Step Out
AltF9          | Run To Cursor
CtrlAltF9      | Force Run To Cursor
AltF1+         | Show Execution Point
AltF8          | Evaluate Expression...
CtrlAltF8      | Quick Evaluate Expression
CtrlF8         | Toggle Line Breakpoint
CtrlAltShiftF8 | Toggle Temporary Line Breakpoint
CtrlShiftF8    | View Breakpoints...
CtrlShiftF8    | Edit Breakpoint
Alt+4          | Show Run window
Alt+5          | Show Debug window
Alt+8          | Show Services window

[Contents](#contents)

## Refactorings

Key            | Desc
---------------|-----------------------
CtrlAltShift+T | Refactor This...
F2 (*)         | Rename... (ShiftF6)
Ctrl+F6        | Change Signature...
CtrlAlt+N      | Inline...
F6             | Move...
CtrlAlt+M      | Extract Method...
CtrlAlt+F      | Introduce Field...
CtrlAlt+P      | Introduce Parameter...
CtrlAlt+V      | Introduce Variable...
AltDelete      | Safe Delete...

[Contents](#contents)
    
## Global VCS actions

Key	|	Desc
---	|	---
Alt+`	|	VCS Operations Popup...
Ctrl+K	|	Commit...
Ctrl+T	|	Update Project
CtrlAlt+Z	|	Rollback
CtrlShift+K	|	Push...
CtrlAltShift+down	|	Next Change
CtrlAltShift+up	|	Previous Change
Alt+9	|	Show Version Control window
Alt+0	|	Show Commit window

[Contents](#contents)

## Diff Viewer

Key          | Desc
-------------|----------------------------
Ctrl+D       | Show Diff
Ctrl+D       | Compare Files
F7           | Next Difference
ShiftF7      | Previous Difference
CtrlAlt+R    | Accept Left Side
CtrlAlt+A    | Accept Right Side
CtrlShiftTab | Select Opposite Diff Pane
CtrlShift+D  | Show Diff Settings Popup...

[Contents](#contents)
     
## Tool windows

Key                | Desc
-------------------|----------------------------
ShiftEsc           | Hide Active Tool Window
CtrlShiftF12       | Hide All Tool Windows
F12                | Jump to Last Tool Window
CtrlAltShift+left  | Stretch to Left
CtrlAltShift+right | Stretch to Right
CtrlAltShift+up    | Stretch to Top
CtrlAltShift+down  | Stretch to Bottom
Alt+1              | Show Project window
Alt+2              | Show Bookmarks window
Alt+3              | Show Find window
Alt+4              | Show Run window
Alt+5              | Show Debug window
Alt+6              | Show Problems window
Alt+7              | Show Structure window
Alt+8              | Show Services window
Alt+9              | Show Version Control window
Alt+0              | Show Commit window
Alt+F12            | Show Terminal window

[Contents](#contents)