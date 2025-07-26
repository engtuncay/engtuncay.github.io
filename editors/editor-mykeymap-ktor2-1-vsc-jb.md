OrakSoft Keyboard shortcuts for Windows Based On Visual Studio Code With Jetbrains Keymap

[Back](../readme.md)

---

- [General (Frequent)](#general-frequent)
- [Idea Extension](#idea-extension)
  - [Editing](#editing)
  - [Search/Replace](#searchreplace)
  - [Usage Search](#usage-search)
  - [Compile and Run](#compile-and-run)
  - [Debugging](#debugging)
  - [Navigation](#navigation)
  - [Refactoring](#refactoring)
  - [VCS/Local History](#vcslocal-history)
  - [Live Templates](#live-templates)
  - [General](#general)
  - [Custom](#custom)
- [Vsc Default Keymap](#vsc-default-keymap)
  - [Code Navigation](#code-navigation)
  - [Display Navigation](#display-navigation)
  - [Basic editing](#basic-editing)
  - [Editor management](#editor-management)
  - [Search and replace](#search-and-replace)
  - [Multi-cursor and selection](#multi-cursor-and-selection)
  - [Rich languages editing](#rich-languages-editing)
  - [Debug](#debug)
  - [Integrated terminal](#integrated-terminal)
  - [File management](#file-management)
- [Alphatic Order](#alphatic-order)
  - [Ctrl Shortcuts](#ctrl-shortcuts)
  - [multi keys](#multi-keys)
    - [(c+k) multi keys](#ck-multi-keys)
    - [(c+h) multi keys](#ch-multi-keys)
- [Notes](#notes)
- [Other Unfrequent Items](#other-unfrequent-items)
- [Templates](#templates)

---

<h2>Info About This Article</h2>

- cs+s means Ctrl + Shift + S key
- c+k,s means c+k, then c+s
- shortcuts with alt key may coincide with alt plus menu keys (alt ile olanlar menu kısayolu ile çakışabilir)

# General (Frequent)

| Shortcut      | Desc                   |
| ------------- | ---------------------- |
| cs+p (F1)     | Show Command Palette   |
| c+p           | Go to File, Quick Open |
| cs+n          | New window/instance    |
| cs+w          | Close window/instance  |
| ca+s          | User Settings          |
| ca+d          | Keyboard Shortcuts     |
| c+pup / pdown | Prev / Next Tab        |

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


# Vsc Default Keymap


## Code Navigation

Kod içerisinde gezinme için kısayollar

| Shortcut     | Desc                               |
| ------------ | ---------------------------------- |
| c+t          | Show all Symbols                   |
| c+p          | Go to File                         |
| cs+o (c+\*)  | Go to Symbol...                    |
| a+left/right | Go back / forward                  |
| c+g          | Go to Line                         |
| F8           | Go to next error or warning        |
| s+F8         | Go to previous error or warning    |
| c+k,c+b      | Toogle Bookmark (idea)             |
| c+F11        | Toggle Bookmark Mnemonic (idea)    |
| cs+[0-9]     | Toggle Bookmark [0-9] (idea)       |
| c+[0-9]      | Go to Bookmark (idea)              |
| c+h,b        | Open file from path (vsc-ext)      |
| a+z          | Toggle word wrap                   |
| Home / End   | Go to beginning/end of line        |
| c+Home       | Go to beginning of file            |
| c+End        | Go to end of file                  |
| c+s+[        | Fold (collapse) region             |
| c+s+]        | Unfold (uncollapse) region         |
| c+k,[        | Fold (collapse) all subregions     |
| c+k,]        | Unfold (uncollapse) all subregions |
| c+k,0        | Fold (collapse) all regions        |
| c+k,j        | Unfold (uncollapse) all regions    |

## Display Navigation

Editor panelleri arasında gezinmek, panellerin görüntülemesini açmak ve kapatmak için kısayollar

| Shortcut  | Desc                              | Note                              |
| --------- | --------------------------------- | --------------------------------- |
| cs+d      | Show Debug                        |
| cs+s      | Toggle Sidebar Panel              | c+b old                           |
| cs+e      | Show Explorer                     |
| cs+f      | Show Search                       |
| cs+g      | Show Source Control               |
| cs+x      | Show Extensions                   |
| cs+h      | Replace in files                  |
| cs+j      | Toggle Search details             |
| cs+u      | Show Output panel                 |
| cs+m      | Show Problems panel               |
| cs+v      | Open Markdown preview             |
| c+k c+v   | Open Markdown preview to the side |
| c+k c+z   | Zen Mode (Esc Esc to exit)        |
| a+o       | Open In Default Browser           | User                              |
| c+"       | Focus-Open Terminal               | (workbench.action.terminal.focus) |
| c+1       | Focus Editor(1)                   |
| c+= / c+- | Zoom in/out                       |
| a+t       | TODO (idea)                       |

unfavs

```
F11      | Toggle full screen                               |
s+a+0    | Toggle editor layout (horizontal/vertical)       |
cs+tab   | Navigate editor group history                    |
c+j      | (workbench.action.focusActiveEditorGroup)        |
```

## Basic editing

| Shortcut      | Desc                        |
| ------------- | --------------------------- |
| c+X           | Cut line (empty selection)  |
| c+C           | Copy line (empty selection) |
| a+ ↑ / ↓      | Move line up/down           |
| s+A + ↓ / ↑   | Copy line up/down           |
| c+L,(c+s)+K   | Delete line                 |
| c+Enter       | Insert line below           |
| c+s+Enter     | Insert line above           |
| c+s+\         | Jump to matching bracket    |
| c+] / [       | Indent/outdent line         |
| c+↑ / ↓       | Scroll line up/down         |
| a+PgUp / PgDn | Scroll page up/down         |
| c+k c+C       | Add line comment            |
| c+k c+u       | Remove line comment         |
| c+/ , c+7     | Toggle line comment         |
| Sa+a, cs+7    | Toggle block comment        |

## Editor management

| Shortcut        | Desc                                    |
| --------------- | --------------------------------------- |
| c+F4, c+W       | Close editor                            |
| c+K F           | Close folder                            |
| c+\             | Split editor                            |
| c+ 1 / 2 / 3    | Focus into 1st, 2nd or 3rd editor group |
| c+K c+ ←/→      | Focus into previous/next editor group   |
| c+s+PgUp / PgDn | Move editor left/right                  |
| c+K ← / →       | Move active editor group                |

## Search and replace

| Shortcut    | Desc                                       |
| ----------- | ------------------------------------------ |
| c+F         | Find                                       |
| c+H         | Replace                                    |
| F3 / s+F3   | Find next/previous                         |
| a+Enter     | Select all occurences of Find match        |
| c+D         | Add selection to next Find match           |
| c+K c+D     | Move last selection to next Find match     |
| a+C / R / W | Toggle case-sensitive / regex / whole word |

## Multi-cursor and selection

| Shortcut            | Desc                                        |
| ------------------- | ------------------------------------------- |
| a+Click             | Insert cursor                               |
| c+a+ ↑ / ↓          | Insert cursor above / below                 |
| c+U                 | Undo last cursor operation                  |
| s+a+I               | Insert cursor at end of each line selected  |
| c+L                 | Select current line                         |
| c+s+L               | Select all occurrences of current selection |
| c+F2                | Select all occurrences of current word      |
| s+a+→               | Expand selection                            |
| s+a+←               | Shrink selection                            |
| s+A + (drag mouse)  | Column (box) selection                      |
| c+s+A + (arrow key) | Column (box) selection                      |
| c+s+A +PgUp/PgDn    | Column (box) selection page up/down         |

## Rich languages editing

| Shortcut      | Desc                        |
| ------------- | --------------------------- |
| c+space - c+i | Trigger suggestion          |
| cs+space      | Trigger parameter hints     |
| sa+F          | Format document             |
| c+k,f         | Format selection            |
| F12           | Go to Definition            |
| a+F12         | Peek Definition             |
| c+k, F12      | Open Definition to the side |
| c+.           | Quick Fix                   |
| s+F12         | Show References             |
| F2            | Rename Symbol               |
| c+k,x         | Trim trailing whitespace    |

## Debug

| Shortcut    | Desc              |
| ----------- | ----------------- |
| F9          | Toggle breakpoint |
| F5          | Start/Continue    |
| s+F5        | Stop              |
| F11 / s+F11 | Step into/out     |
| F10         | Step over         |
| c+K c+I     | Show hover        |

## Integrated terminal

| Shortcut      | Desc                       |
| ------------- | -------------------------- |
| c+` (c+ht)    | Show integrated terminal   |
| c+s+`         | Create new terminal        |
| (c+S)+C       | Copy selection             |
| (c+S)+V       | Paste into active terminal |
| c+↑ / ↓       | Scroll up/down             |
| s+PgUp / PgDn | Scroll page up/down        |
| c+Home / End  | Scroll to top/bottom       |

## File management

| Shortcut  | Desc                                    |
| --------- | --------------------------------------- |
| c+N       | New File                                |
| c+O       | Open File...                            |
| c+S       | Save                                    |
| c+s+S     | Save As...                              |
| c+K S     | Save All                                |
| c+F4      | Close                                   |
| c+K c+W   | Close All                               |
| c+s+T     | Reopen closed editor                    |
| c+K       | Enter Keep preview mode editor open     |
| c+Tab     | Open next                               |
| c+s+Tab   | Open previous                           |
| c+kp      | Copy path of active file                |
| c+kr,c+oe | Reveal active file in Explorer          |
| c+ko      | Show active file in new window/instance |

# Alphatic Order

## Ctrl Shortcuts

| Key | Desc                  | User Change    |
| --- | --------------------- | -------------- |
| c+a | select all            |
| ctb |
| c+c | cut                   |
| c+d |
| c+e |
| c+f | find                  |
| c+g | go to                 |
| c+h | multi                 | c+h+ h replace |
| c+ı |
| c+i |
| c+j | multi key             |
| c+k | multi key             |
| c+l | delete line           |
| c+m | screen to center      |
| c+n | Create New File       |
| c+o | Open File             |
| c+p | Navigate Project File |
| c+r | Open Recent           | ctr c+r        |
| c+s | Save                  |
| c+ş |
| c+t | go to symbol          |
| c+u |
| c+ü |
| c+v | paste                 |
| c+y |
| c+z |

## multi keys

| Key | Exp                |
| --- | ------------------ |
| c+k | x                  |
| c+j | x                  |
| c+r | x                  |
| c+h | x                  |
| c+1 | navigation related |

### (c+k) multi keys

| Key   | Exp         |
| ----- | ----------- |
| c+k,f | Format File |

### (c+h) multi keys

| Key   | Exp                      |
| ----- | ------------------------ |
| c+h,p | Previewe Markdown        |
| c+h,r | Run File                 |
| c+h,c | Clear Output (run panel) |

# Notes

- Other operating systems’ keyboard shortcuts and additional unassigned shortcuts available at aka.ms/vscodekeybindings (Key Bindings for Visual Studio Code)

# Other Unfrequent Items

c+k,m | Change file language

# Templates

Boş

| Key | Desc |
| --- | ---- |
| a   |
| b   |
| c   |
| d   |
| e   |
| f   |
| g   |
| h   |
| ı   |
| i   |
| j   |
| k   |
| l   |
| m   |
| n   |
| o   |
| p   |
| r   |
| s   |
| ş   |
| t   |
| u   |
| ü   |
| v   |
| y   |
| z   |
