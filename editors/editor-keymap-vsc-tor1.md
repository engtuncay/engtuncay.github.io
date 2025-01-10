
OrakSoft Keyboard shortcuts for Windows Based On Visual Studio Code

- [General  (Frequent)](#general--frequent)
- [Code Navigation](#code-navigation)
- [Display And Editor Navigation](#display-and-editor-navigation)
- [Editor management](#editor-management)
- [Basic editing](#basic-editing)
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
  - [Shift + Control](#shift--control)
- [Notes](#notes)
- [Other Unfrequent Items](#other-unfrequent-items)
 
---

<h2>Info About This Article</h2> 

- cs+s means Ctrl + Shift + S key
- c+k,s means c+k, then c+s

# General  (Frequent)

Shortcut      | Desc
--------------|-----------------------
cs+p (F1)     | Show Command Palette
c+p           | Go to File, Quick Open
cs+n          | New window/instance
cs+w          | Close window/instance
ca+s          | User Settings
ca+d          | Keyboard Shortcuts
c+pup / pdown | Prev / Next Tab

# Code Navigation 

Kod içerisinde gezinme için kısayollar

Shortcut     | Desc
-------------|--------------------------------
c+t          | Show all Symbols
c+p          | Go to File
cs+o (c+*)   | Go to Symbol...
a+left/right | Go back / forward
c+g          | Go to Line
F8           | Go to next error or warning
s+F8         | Go to previous error or warning
c+k,c+b      | Toogle Bookmark (idea)
c+F11        | Toggle Bookmark Mnemonic (idea)
cs+[0-9]     | Toggle Bookmark [0-9] (idea)
c+[0-9]      | Go to Bookmark (idea)
A + d        | Open file from path (extension)


# Display And Editor Navigation

Editor panelleri arasında gezinmek, panellerin görüntülemesini açmak ve kapatmak için kısayollar

Shortcut  | Desc                                                  | Note
----------|-------------------------------------------------------|--------
cs+d      | Show Debug                                            |
cs+s      | Toggle Sidebar Panel                                  | c+B old
cs+e      | Show Explorer                                         |
cs+f      | Show Search                                           |
cs+g      | Show Source Control                                   |
cs+x      | Show Extensions                                       |
cs+h      | Replace in files                                      |
cs+j      | Toggle Search details                                 |
cs+u      | Show Output panel                                     |
cs+m      | Show Problems panel                                   |
cs+v      | Open Markdown preview                                 |
c+k c+v   | Open Markdown preview to the side                     |
c+k c+z   | Zen Mode (Esc Esc to exit)                            |
a+o       | Open In Default Browser                               | User
c+"       | Focus-Open Terminal (workbench.action.terminal.focus) |
c+1       | Focus Editor(1)                                       |
c+= / c+- | Zoom in/out                                           |


unfavs
```
F11      | Toggle full screen                               |
s+a+0    | Toggle editor layout (horizontal/vertical)       |
cs+tab   | Navigate editor group history                    |
c+j      | (workbench.action.focusActiveEditorGroup)        |
```

# Editor management 

Shortcut        | Desc
----------------|----------------------------------------
c+F4, c+W       | Close editor
c+K F           | Close folder
c+\             | Split editor
c+ 1 / 2 / 3    | Focus into 1st, 2nd or 3rd editor group
c+K c+ ←/→      | Focus into previous/next editor group
c+s+PgUp / PgDn | Move editor left/right
c+K ← / →       | Move active editor group

# Basic editing 

Shortcut      | Desc
--------------|-----------------------------------
c+X           | Cut line (empty selection)
c+C           | Copy line (empty selection)
a+ ↑ / ↓      | Move line up/down
s+A + ↓ / ↑   | Copy line up/down
c+L,(c+s)+K   | Delete line
c+Enter       | Insert line below
c+s+Enter     | Insert line above
c+s+\         | Jump to matching bracket
c+] / [       | Indent/outdent line
Home / End    | Go to beginning/end of line
c+Home        | Go to beginning of file
c+End         | Go to end of file
c+↑ / ↓       | Scroll line up/down
a+PgUp / PgDn | Scroll page up/down
c+s+[         | Fold (collapse) region
c+s+]         | Unfold (uncollapse) region
c+K c+[       | Fold (collapse) all subregions
c+K c+]       | Unfold (uncollapse) all subregions
c+K c+0       | Fold (collapse) all regions
c+K c+J       | Unfold (uncollapse) all regions
c+k c+C       | Add line comment
c+k c+u       | Remove line comment
c+/ , c+7     | Toggle line comment
Sa+a, cs+7    | Toggle block comment
a+z           | Toggle word wrap

# Search and replace 

Shortcut    | Desc
------------|-------------------------------------------
c+F         | Find
c+H         | Replace
F3 / s+F3   | Find next/previous
a+Enter     | Select all occurences of Find match
c+D         | Add selection to next Find match
c+K c+D     | Move last selection to next Find match
a+C / R / W | Toggle case-sensitive / regex / whole word

# Multi-cursor and selection 

Shortcut            | Desc
--------------------|--------------------------------------------
a+Click             | Insert cursor
c+a+ ↑ / ↓          | Insert cursor above / below
c+U                 | Undo last cursor operation
s+a+I               | Insert cursor at end of each line selected
c+L                 | Select current line
c+s+L               | Select all occurrences of current selection
c+F2                | Select all occurrences of current word
s+a+→               | Expand selection
s+a+←               | Shrink selection
s+A + (drag mouse)  | Column (box) selection
c+s+A + (arrow key) | Column (box) selection
c+s+A +PgUp/PgDn    | Column (box) selection page up/down

# Rich languages editing 

Shortcut      | Desc
--------------|----------------------------
c+space - c+i | Trigger suggestion
cs+space      | Trigger parameter hints
sa+F          | Format document
c+k,f         | Format selection
F12           | Go to Definition
a+F12         | Peek Definition
c+k, F12      | Open Definition to the side
c+.           | Quick Fix
s+F12         | Show References
F2            | Rename Symbol
c+k,x         | Trim trailing whitespace


# Debug 

| Shortcut    | Desc              |
|-------------|-------------------|
| F9          | Toggle breakpoint |
| F5          | Start/Continue    |
| s+F5        | Stop              |
| F11 / s+F11 | Step into/out     |
| F10         | Step over         |
| c+K c+I     | Show hover        |

# Integrated terminal 

| Shortcut          | Desc                       |
|-------------------|----------------------------|
| c+`            | Show integrated terminal   |
| c+s+`      | Create new terminal        |
| (c+S)+C           | Copy selection             |
| (c+S)+V           | Paste into active terminal |
| c+↑ / ↓        | Scroll up/down             |
| s+PgUp / PgDn | Scroll page up/down        |
| c+Home / End   | Scroll to top/bottom       |

# File management 

| Shortcut | Desc                                    |
|----------|-----------------------------------------|
| c+N      | New File                                |
| c+O      | Open File...                            |
| c+S      | Save                                    |
| c+s+S    | Save As...                              |
| c+K S    | Save All                                |
| c+F4     | Close                                   |
| c+K c+W  | Close All                               |
| c+s+T    | Reopen closed editor                    |
| c+K      | Enter Keep preview mode editor open     |
| c+Tab    | Open next                               |
| c+s+Tab  | Open previous                           |
| c+K P    | Copy path of active file                |
| c+K R    | Reveal active file in Explorer          |
| c+K O    | Show active file in new window/instance |


# Alphatic Order

## Ctrl Shortcuts

Key | Desc       | User Change
----|------------|------------
c+a | select all |
ctb |
c+c | cut
c+d |
c+e |
c+f | find
c+g | go to
c+h | multi | c+h+ h replace
c+ı |
c+i |
c+j | multi key
c+k | multi key
c+l | delete line
c+m | screen to center
c+n | Create New File
c+o | Open File
c+p | Navigate Project File
c+r | Open Recent | ctr c+r
c+s | Save
c+ş |
c+t | go to symbol
c+u |
c+ü |
c+v | paste
c+y |
c+z |

## multi keys

Key | Exp
----|-------------------
c+k | x
c+j | x
c+r | x
c+h | x
c+1 | navigation related

### (c+k) multi keys

Key   | Exp
------|------------
c+k,f | Format File

### (c+h) multi keys

Key   | Exp
------|-------------------------
c+h,p | Previewe Markdown
c+h,r | Run File
c+h,c | Clear Output (run panel)


## Shift + Control 

Key | Desc
----|-----
a   |
b   |
c   |
d   |
e   |
f   |
g   |
h   |
ı   |
i   |
j   |
k   |
l   |
m   |
n   |
o   |
p   |
r   |
s   |
ş   |
t   |
u   |
ü   |
v   |
y   |
z   |

Boş

Key | Desc
----|-----
a   |
b   |
c   |
d   |
e   |
f   |
g   |
h   |
ı   |
i   |
j   |
k   |
l   |
m   |
n   |
o   |
p   |
r   |
s   |
ş   |
t   |
u   |
ü   |
v   |
y   |
z   |


# Notes

- Other operating systems’ keyboard shortcuts and additional unassigned shortcuts available at aka.ms/vscodekeybindings  (Key Bindings for Visual Studio Code)



# Other Unfrequent Items

c+k,m         | Change file language