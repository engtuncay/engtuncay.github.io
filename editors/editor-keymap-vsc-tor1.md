
Keyboard shortcuts for Windows Based On Visual Studio Code

- [General](#general)
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
  - [Shift + Control](#shift--control)
- [Notes](#notes)
  - [Visual Studio Keymaps Changes](#visual-studio-keymaps-changes)
  - [Idea Keymap Changes](#idea-keymap-changes)
  - [Rider Changes](#rider-changes)
 
---

<h2>Info About This Article</h2> 

- Other operating systems’ keyboard shortcuts and additional unassigned shortcuts available at aka.ms/vscodekeybindings  (Key Bindings for Visual Studio Code)

- cs+s means C + S + s

# General 

Shortcut       | Desc
---------------|------------------------
CS + P (F1)    | Show Command Palette
C + P          | Quick Open, Go to File…
CS + N         | New window/instance
CS + W         | Close window/instance
C+, CA+s       | User Settings
C+K,C+S (CA+D) | Keyboard Shortcuts
C+Pup/PDown    | Prev/Next Tab


# Code Navigation 

Kod içerisinde gezinme için kısayollar

Shortcut     | Desc
-------------|--------------------------------
C+t          | Show all Symbols
C+p          | Go to File
CS+o (c+*)   | Go to Symbol...
A+left/right | Go back / forward
C+g          | Go to Line
F8           | Go to next error or warning
S+F8         | Go to previous error or warning
C+k,C+b      | Toogle Bookmark (idea)
C+F11        | Toggle Bookmark Mnemonic (idea)
CS+[0-9]     | Toggle Bookmark [0-9] (idea)
C+[0-9]      | Go to Bookmark (idea)
A + d        | Open file from path (extension)


# Display And Editor Navigation

Editor panelleri arasında gezinmek, panellerin görüntülemesini açmak ve kapatmak için kısayollar

Shortcut  | Desc                                                  | Note
----------|-------------------------------------------------------|--------
CS+d      | Show Debug                                            |
CS+s      | Toggle Sidebar Panel                                  | C+B old
CS+e      | Show Explorer                                         |
CS+f      | Show Search                                           |
CS+g      | Show Source Control                                   |
CS+x      | Show Extensions                                       |
CS+h      | Replace in files                                      |
CS+j      | Toggle Search details                                 |
CS+u      | Show Output panel                                     |
CS+m      | Show Problems panel                                   |
CS+v      | Open Markdown preview                                 |
C+k C+v   | Open Markdown preview to the side                     |
C+k C+z   | Zen Mode (Esc Esc to exit)                            |
A+o       | Open In Default Browser                               | User
C+"       | Focus-Open Terminal (workbench.action.terminal.focus) |
C+1       | Focus Editor(1)                                       |
C+= / c+- | Zoom in/out                                           |


unfavs
```
F11      | Toggle full screen                               |
S+A+0    | Toggle editor layout (horizontal/vertical)       |
CS+tab   | Navigate editor group history                    |
C+j      | (workbench.action.focusActiveEditorGroup)        |
```

# Editor management 

Shortcut        | Desc
----------------|----------------------------------------
C+F4, C+W       | Close editor
C+K F           | Close folder
C+\             | Split editor
C+ 1 / 2 / 3    | Focus into 1st, 2nd or 3rd editor group
C+K C+ ←/→      | Focus into previous/next editor group
C+S+PgUp / PgDn | Move editor left/right
C+K ← / →       | Move active editor group

# Basic editing 

Shortcut      | Desc
--------------|-----------------------------------
C+X           | Cut line (empty selection)
C+C           | Copy line (empty selection)
A+ ↑ / ↓      | Move line up/down
S+A + ↓ / ↑   | Copy line up/down
c+L,(c+s)+K   | Delete line
C+Enter       | Insert line below
C+S+Enter     | Insert line above
C+S+\         | Jump to matching bracket
C+] / [       | Indent/outdent line
Home / End    | Go to beginning/end of line
C+Home        | Go to beginning of file
C+End         | Go to end of file
C+↑ / ↓       | Scroll line up/down
A+PgUp / PgDn | Scroll page up/down
C+S+[         | Fold (collapse) region
C+S+]         | Unfold (uncollapse) region
C+K C+[       | Fold (collapse) all subregions
C+K C+]       | Unfold (uncollapse) all subregions
C+K C+0       | Fold (collapse) all regions
C+K C+J       | Unfold (uncollapse) all regions
C+k C+C       | Add line comment
C+k C+u       | Remove line comment
C+/ , C+7     | Toggle line comment
SA+a, CS+7    | Toggle block comment
A+z           | Toggle word wrap

# Search and replace 

Shortcut    | Desc
------------|-------------------------------------------
C+F         | Find
C+H         | Replace
F3 / S+F3   | Find next/previous
A+Enter     | Select all occurences of Find match
C+D         | Add selection to next Find match
C+K C+D     | Move last selection to next Find match
A+C / R / W | Toggle case-sensitive / regex / whole word

# Multi-cursor and selection 

Shortcut            | Desc
--------------------|--------------------------------------------
A+Click             | Insert cursor
C+A+ ↑ / ↓          | Insert cursor above / below
C+U                 | Undo last cursor operation
S+A+I               | Insert cursor at end of each line selected
C+L                 | Select current line
C+S+L               | Select all occurrences of current selection
C+F2                | Select all occurrences of current word
S+A+→               | Expand selection
S+A+←               | Shrink selection
S+A + (drag mouse)  | Column (box) selection
C+S+A + (arrow key) | Column (box) selection
C+S+A +PgUp/PgDn    | Column (box) selection page up/down

# Rich languages editing 

Shortcut     | Desc
-------------|----------------------------
C+Space, C+I | Trigger suggestion
C,S+Space    | Trigger parameter hints
S+A+F        | Format document
C+K C+F      | Format selection
F12          | Go to Definition
A+F12        | Peek Definition
C+K F12      | Open Definition to the side
C+.          | Quick Fix
S+F12        | Show References
F2           | Rename Symbol
C+K C+X      | Trim trailing whitespace
C+K M        | Change file language

# Debug 

| Shortcut    | Desc              |
|-------------|-------------------|
| F9          | Toggle breakpoint |
| F5          | Start/Continue    |
| S+F5        | Stop              |
| F11 / S+F11 | Step into/out     |
| F10         | Step over         |
| C+K C+I     | Show hover        |

# Integrated terminal 

| Shortcut          | Desc                       |
|-------------------|----------------------------|
| C+`            | Show integrated terminal   |
| C+S+`      | Create new terminal        |
| (C+S)+C           | Copy selection             |
| (C+S)+V           | Paste into active terminal |
| C+↑ / ↓        | Scroll up/down             |
| S+PgUp / PgDn | Scroll page up/down        |
| C+Home / End   | Scroll to top/bottom       |

# File management 

| Shortcut | Desc                                    |
|----------|-----------------------------------------|
| C+N      | New File                                |
| C+O      | Open File...                            |
| C+S      | Save                                    |
| C+S+S    | Save As...                              |
| C+K S    | Save All                                |
| C+F4     | Close                                   |
| C+K C+W  | Close All                               |
| C+S+T    | Reopen closed editor                    |
| C+K      | Enter Keep preview mode editor open     |
| C+Tab    | Open next                               |
| C+S+Tab  | Open previous                           |
| C+K P    | Copy path of active file                |
| C+K R    | Reveal active file in Explorer          |
| C+K O    | Show active file in new window/instance |


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

<<<<<<< Updated upstream
Key     | Exp
--------|------------
c+k     | x
c+k c+f | Format File
c+j     | x
c+r     | x
c+h     | x

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

## Visual Studio Keymaps Changes

## Idea Keymap Changes

## Rider Changes

