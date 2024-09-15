
Keyboard shortcuts for Windows Based On Visual Studio Code

- [General](#general)
- [Code Navigation](#code-navigation)
- [Display / Editor Navigation / View](#display--editor-navigation--view)
- [Editor management](#editor-management)
- [Basic editing](#basic-editing)
- [Search and replace](#search-and-replace)
- [Multi-cursor and selection](#multi-cursor-and-selection)
- [Rich languages editing](#rich-languages-editing)
- [Debug](#debug)
- [Integrated terminal](#integrated-terminal)
- [File management](#file-management)
- [Alphatic Order](#alphatic-order)
- [Notes](#notes)
  - [Visual Studio Keymaps Changes](#visual-studio-keymaps-changes)
  - [Idea Keymap Changes](#idea-keymap-changes)
  - [Rider Changes](#rider-changes)
 
---

<h2>Info About This Article</h2> 

- Other operating systems’ keyboard shortcuts and additional unassigned shortcuts available at aka.ms/vscodekeybindings  (Key Bindings for Visual Studio Code)

- cs+s means ctrl + shift + s

# General 

Shortcut       | Desc
---------------|------------------------
CS + P (F1)    | Show Command Palette
C + P          | Quick Open, Go to File…
CS + N         | New window/instance
CS + W         | Close window/instance
C + ,          | User Settings
C+K,C+S (CA+D) | Keyboard Shortcuts
C+Pup/PDown    | Prev/Next Tab


# Code Navigation 

Kod içerisinde gezinme için kısayollar

Shortcut       | Desc
---------------|--------------------------------
C+t            | Show all Symbols
C+p            | Go to File
CS+o (c+*)     | Go to Symbol...
Alt+left/right | Go back / forward
Ctrl+g         | Go to Line
F8             | Go to next error or warning
Shift+F8       | Go to previous error or warning
C+k,C+b        | Toogle Bookmark (idea)
C+F11          | Toggle Bookmark Mnemonic (idea)
CS+[0-9]       | Toggle Bookmark [0-9] (idea)
C+[0-9]        | Go to Bookmark (idea)
A + d          | Open file from path (extension)


# Display / Editor Navigation / View 

Editor panelleri arasında gezinmek için kısayollar

Shortcut       | Desc                                             | Note
---------------|--------------------------------------------------|-----
F11            | Toggle full screen                               |
Shift+Alt+0    | Toggle editor layout (horizontal/vertical)       |
Ctrl+ = /-     | Zoom in/out                                      |
Ctrl+B (cs+s)  | Toggle Sidebar visibility                        |
Ctrl+Shift+E   | Show Explorer / Toggle focus                     |
Ctrl+Shift+F   | Show Search                                      |
Ctrl+Shift+G   | Show Source Control                              |
Ctrl+Shift+D   | Show Debug                                       |
Ctrl+Shift+X   | Show Extensions                                  |
Ctrl+Shift+H   | Replace in files                                 |
Ctrl+Shift+J   | Toggle Search details                            |
cs+u           | Show Output panel                                |
Ctrl+Shift+V   | Open Markdown preview                            |
Ctrl+K V       | Open Markdown preview to the side                |
Ctrl+K Z       | Zen Mode (Esc Esc to exit)                       |
a+o            | Open In Default Browser                          | User
C+",C+Down     | Focus Terminal (workbench.action.terminal.focus) |
C+m , C+m      | Toggle Tab moves focus                           | ??
C + 1          | Focus Editor(1)                                  |
C + j          | (workbench.action.focusActiveEditorGroup)        |
Ctrl+Shift+M   | Show Problems panel                              |
Ctrl+Shift+Tab | Navigate editor group history                    |


# Editor management 

Shortcut               | Desc
-----------------------|----------------------------------------
Ctrl+F4, Ctrl+W        | Close editor
Ctrl+K F               | Close folder
Ctrl+\                 | Split editor
Ctrl+ 1 / 2 / 3        | Focus into 1st, 2nd or 3rd editor group
Ctrl+K Ctrl+ ←/→       | Focus into previous/next editor group
Ctrl+Shift+PgUp / PgDn | Move editor left/right
Ctrl+K ← / →           | Move active editor group

# Basic editing 

Shortcut          | Desc
------------------|-----------------------------------
Ctrl+X            | Cut line (empty selection)
Ctrl+C            | Copy line (empty selection)
Alt+ ↑ / ↓        | Move line up/down
Shift+Alt + ↓ / ↑ | Copy line up/down
c+L,(c+s)+K       | Delete line
Ctrl+Enter        | Insert line below
Ctrl+Shift+Enter  | Insert line above
Ctrl+Shift+\      | Jump to matching bracket
Ctrl+] / [        | Indent/outdent line
Home / End        | Go to beginning/end of line
Ctrl+Home         | Go to beginning of file
Ctrl+End          | Go to end of file
Ctrl+↑ / ↓        | Scroll line up/down
Alt+PgUp / PgDn   | Scroll page up/down
Ctrl+Shift+[      | Fold (collapse) region
Ctrl+Shift+]      | Unfold (uncollapse) region
Ctrl+K Ctrl+[     | Fold (collapse) all subregions
Ctrl+K Ctrl+]     | Unfold (uncollapse) all subregions
Ctrl+K Ctrl+0     | Fold (collapse) all regions
Ctrl+K Ctrl+J     | Unfold (uncollapse) all regions
Ctrl+K Ctrl+C     | Add line comment
Ctrl+K Ctrl+U     | Remove line comment
Ctrl+/            | Toggle line comment
Shift+Alt+A       | Toggle block comment
Alt+Z             | Toggle word wrap

# Search and replace 

Shortcut      | Desc
--------------|-------------------------------------------
Ctrl+F        | Find
Ctrl+H        | Replace
F3 / Shift+F3 | Find next/previous
Alt+Enter     | Select all occurences of Find match
Ctrl+D        | Add selection to next Find match
Ctrl+K Ctrl+D | Move last selection to next Find match
Alt+C / R / W | Toggle case-sensitive / regex / whole word

# Multi-cursor and selection 

Shortcut                     | Desc
-----------------------------|--------------------------------------------
Alt+Click                    | Insert cursor
Ctrl+Alt+ ↑ / ↓              | Insert cursor above / below
Ctrl+U                       | Undo last cursor operation
Shift+Alt+I                  | Insert cursor at end of each line selected
Ctrl+L                       | Select current line
Ctrl+Shift+L                 | Select all occurrences of current selection
Ctrl+F2                      | Select all occurrences of current word
Shift+Alt+→                  | Expand selection
Shift+Alt+←                  | Shrink selection
Shift+Alt + (drag mouse)     | Column (box) selection
Ctrl+Shift+Alt + (arrow key) | Column (box) selection
Ctrl+Shift+Alt +PgUp/PgDn    | Column (box) selection page up/down

# Rich languages editing 

Shortcut           | Desc
-------------------|----------------------------
Ctrl+Space, Ctrl+I | Trigger suggestion
Ctrl+Shift+Space   | Trigger parameter hints
Shift+Alt+F        | Format document
Ctrl+K Ctrl+F      | Format selection
F12                | Go to Definition
Alt+F12            | Peek Definition
Ctrl+K F12         | Open Definition to the side
Ctrl+.             | Quick Fix
Shift+F12          | Show References
F2                 | Rename Symbol
Ctrl+K Ctrl+X      | Trim trailing whitespace
Ctrl+K M           | Change file language

# Debug 

| Shortcut        | Desc              |
|-----------------|-------------------|
| F9              | Toggle breakpoint |
| F5              | Start/Continue    |
| Shift+F5        | Stop              |
| F11 / Shift+F11 | Step into/out     |
| F10             | Step over         |
| Ctrl+K Ctrl+I   | Show hover        |

# Integrated terminal 

| Shortcut          | Desc                       |
|-------------------|----------------------------|
| Ctrl+`            | Show integrated terminal   |
| Ctrl+Shift+`      | Create new terminal        |
| (C+S)+C           | Copy selection             |
| (C+S)+V           | Paste into active terminal |
| Ctrl+↑ / ↓        | Scroll up/down             |
| Shift+PgUp / PgDn | Scroll page up/down        |
| Ctrl+Home / End   | Scroll to top/bottom       |

# File management 

| Shortcut       | Desc                                    |
|----------------|-----------------------------------------|
| Ctrl+N         | New File                                |
| Ctrl+O         | Open File...                            |
| Ctrl+S         | Save                                    |
| Ctrl+Shift+S   | Save As...                              |
| Ctrl+K S       | Save All                                |
| Ctrl+F4        | Close                                   |
| Ctrl+K Ctrl+W  | Close All                               |
| Ctrl+Shift+T   | Reopen closed editor                    |
| Ctrl+K         | Enter Keep preview mode editor open     |
| Ctrl+Tab       | Open next                               |
| Ctrl+Shift+Tab | Open previous                           |
| Ctrl+K P       | Copy path of active file                |
| Ctrl+K R       | Reveal active file in Explorer          |
| Ctrl+K O       | Show active file in new window/instance |


# Alphatic Order

Key | Desc
----|-----------------
c+a | select all
ctb |
c+c | cut
c+d |
c+e |
c+f |
c+g |
c+h |
c+ı |
c+i |
c+j |
c+k | multi key
c+l | delete line
c+m | screen to center
c+n |
c+o |
c+p |
c+r |
c+s |
c+ş |
c+t |
c+u |
c+ü |
c+v | paste
c+y |
c+z |

shift + ctrl 

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

