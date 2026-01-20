OrakSoft Keyboard shortcuts for Windows Based On Idea And VS Code

[Back](../readme.md)

---

# Contents

- [Contents](#contents)
- [Memorize Table](#memorize-table)
- [General (Frequent)](#general-frequent)
- [Code Navigation](#code-navigation)
- [Display / Panel Navigation](#display--panel-navigation)
- [Rich Languages Editing](#rich-languages-editing)
- [Editing](#editing)
- [Editor management](#editor-management)
- [Search and replace](#search-and-replace)
- [Multi-cursor and selection](#multi-cursor-and-selection)
- [Debug](#debug)
- [Integrated terminal](#integrated-terminal)
- [File management](#file-management)
- [Alphatic Order](#alphatic-order)
  - [Ctrl Shortcuts](#ctrl-shortcuts)
  - [Alt Shortcuts](#alt-shortcuts)
  - [multi keys](#multi-keys)
    - [(c+k) multi keys](#ck-multi-keys)
    - [(c+h) multi keys](#ch-multi-keys)
- [Notes](#notes)
- [Other Unfrequent Items](#other-unfrequent-items)
- [Templates](#templates)

---

<h2>Info About This Article</h2>

- cs+s means ctrl + shift + s key

- ❗ c+ks or c+k,s means c+k, then c+s

- np:numpad , np- (numpad-)

[🔝](#contents)

# Memorize Table

kullanışlı olan,ezberlenecek liste

| Key   | Desc                                 |
|-------|--------------------------------------|
| c+j,j | `Focus Active Editor (editor focus)` |
| aaa   | aaa                                  |


[🔝](#contents)

# General (Frequent)

| Shortcut      | Desc                   |
| ------------- | ---------------------- |
| F1 (cs+p)     | Show Command Palette   |
| ca+s          | User Settings          |
| ca+d          | Keyboard Shortcuts     |
| c+p           | Go to File, Quick Open |
| c+pup / pdown | Prev / Next Tab        |
| cs+n ???      | New window/instance    |
| cs+w ???      | Close window/instance  |

[🔝](#contents)

# Code Navigation

Kod içerisinde gezinme için kısayollar

| Shortcut     | Desc                               | F   |
|--------------|------------------------------------|-----|
| c+t          | Show all Symbols                   |     |
| c+p          | Go to File                         |     |
| c+\* (cs+o)  | Go to Symbol...                    |     |
| a+left/right | Go (navigate) back / forward       |     |
| c+g          | Go to Line                         |     |
| F8           | Go to next error or warning        |     |
| s+F8         | Go to previous error or warning    |     |
| cs+m         | `Jump to matching bracket`         | xxx |
| c+k,b        | Toogle Bookmark (idea)             |     |
| c+F11        | Toggle Bookmark Mnemonic (idea)    |     |
| cs+[0-9]     | Toggle Bookmark [0-9] (idea)       |     |
| c+[0-9]      | Go to Bookmark (idea)              |     |
| c+h,b        | Open file from path (vsc-ext)      |     |
| a+z          | Toggle word wrap                   |     |
| cs+(np-)     | Fold (collapse) region (close)     |     |
| cs+(np+)     | Unfold (uncollapse) region (open)  |     |
| c+k,[        | Fold (collapse) all subregions     | ??  |
| c+k,]        | Unfold (uncollapse) all subregions | ??  |
| c+k,0        | Fold (collapse) all regions        |     |
| c+k,j        | Unfold (uncollapse) all regions    |     |
| Home / End   | Go to beginning/end of line        |     |
| c+Home       | Go to beginning of file            |     |
| c+End        | Go to end of file                  |     |

[🔝](#contents)


# Display / Panel Navigation

- Editor panelleri arasında gezinme
- Panellerin görüntülemesini açma ve kapama işlemleri

| Shortcut   | Desc                                 | Note                       |
|------------|--------------------------------------|----------------------------|
| c+j,j      | `Focus Active Editor (editor focus)` |
| cs+d       | Show Debug                           |
| cs+s       | Toggle Sidebar Panel                 | old(c+b)                   |
| cs+e - a+1 | Show Explorer                        |
| cs+f       | Show Search                          |
| cs+g       | Show Source Control                  |
| cs+x       | Show Extensions                      |
| cs+h       | Replace in files                     |
| cs+j       | Toggle Search details                |
| cs+u       | Show Output panel                    |
| cs+m       | Show Problems panel                  |
| cs+v       | Open Markdown preview                |
| c+k,v      | Open Markdown preview to the side    |
| c+k,z      | Zen Mode (Esc Esc to exit)           |
| a+o        | Open In Default Browser              | User-explorer da çalışıyor |
| c+"        | Focus-Open Terminal                  | (wb.action.terminal.focus) |
| c+1        | Focus Editor(1)                      |
| c+= / c+-  | Zoom in/out                          |
| a+t        | TODO (idea)                          |

unfavs

```
F11      | Toggle full screen                               |
s+a+0    | Toggle editor layout (horizontal/vertical)       |
cs+tab   | Navigate editor group history                    |
c+j      | (workbench.action.focusActiveEditorGroup)        |
```

# Rich Languages Editing

| Shortcut      | Desc                        |
| ------------- | --------------------------- |
| c+space - c+i | Trigger suggestion          |
| cs+space      | Trigger parameter hints     |
| as+f          | Format document             |
| c+k,f         | Format selection            |
| F12           | Go to Definition            |
| a+F12         | Peek Definition             |
| c+k, F12      | Open Definition to the side |
| c+.           | Quick Fix                   |
| s+F12         | Show References             |
| F2            | Rename Symbol               |
| c+k,x         | Trim trailing whitespace    |

# Editing

| Shortcut    | Desc                 | Note    |
|-------------|----------------------|---------|
| c+l s+del   | Delete line          |         |
| a+up/down   | Move line up/down    |         |
| as+up/down  | Copy line up/down    |         |
| c+Enter     | Insert line below    |         |
| c+s+Enter   | Insert line above    |         |
| c+] / [     | Indent/outdent line  | invalid |
| c+up/down   | Scroll line up/down  |         |
| a+PgUp/PgDn | Scroll page up/down  |         |
| c+k,c       | Add line comment     |         |
| c+k,u       | Remove line comment  |         |
| c+/ c+7     | Toggle line comment  |         |
| as+a , cs+7 | Toggle block comment |         |
|             | Duplicate Line       |         |


[🔝](#contents)

# Editor management

| Shortcut        | Desc                                    | Note |
|-----------------|-----------------------------------------|------|
| c+F4, c+W       | Close editor                            |      |
| c+K, F          | Close folder                            |      |
| c+\             | Split editor                            |      |
| c+ 1 / 2 / 3    | Focus into 1st, 2nd or 3rd editor group |      |
| c+k,c + ←/→      | Focus into previous/next editor group   |      |
| cs+PgUp / PgDn | Move editor left/right                  |      |
| c+K ← / →       | Move active editor group                |      |

# Search and replace

| Shortcut    | Desc                                       |
| ----------- | ------------------------------------------ |
| c+F         | Find                                       |
| c+H         | Replace                                    |
| F3 / s+F3   | Find next/previous                         |
| a+Enter     | Select all occurences of Find match        |
| c+d         | Add selection to next Find match           |
| c+K c+D     | Move last selection to next Find match     |
| a+C / R / W | Toggle case-sensitive / regex / whole word |

[🔝](#contents)

# Multi-cursor and selection

| Shortcut         | Desc                                        |
| ---------------- | ------------------------------------------- |
| a+click          | Insert cursor                               |
| ca+up/down       | Insert cursor above / below                 |
| c+u              | Undo last cursor operation                  |
| sa+ı             | Insert cursor at end of each line selected  |
| c+l              | Select current line                         |
| cs+l             | Select all occurrences of current selection |
| c+f2             | Select all occurrences of current word      |
| sa+right         | Expand selection                            |
| sa+left          | Shrink selection                            |
| sa+(drag mouse)  | Column (box) selection                      |
| cs+a+(arrow key) | Column (box) selection                      |
| cs+a+pgup/pgdn   | Column (box) selection page up/down         |

[🔝](#contents)

# Debug

| Shortcut    | Desc              |
| ----------- | ----------------- |
| F9          | Toggle breakpoint |
| F5          | Start/Continue    |
| s+F5        | Stop              |
| F11 / s+F11 | Step into/out     |
| F10         | Step over         |
| c+K c+I     | Show hover        |

[🔝](#contents)

# Integrated terminal

| Shortcut      | Desc                       |
| ------------- | -------------------------- |
| c+` (c+ht)    | Show integrated terminal   |
| c+s+`         | Create new terminal        |
| (c+S)+C       | Copy selection             |
| (c+S)+V       | Paste into active terminal |
| c+↑ / ↓       | Scroll up/down             |
| s+PgUp / PgDn | Scroll page up/down        |
| c+Home / End  | Scroll to top/bottom       |

[🔝](#contents)

# File management

| Shortcut      | Desc                                    |
| ------------- | --------------------------------------- |
| c+n           | New File                                |
| c+o           | Open File...                            |
| c+s           | Save                                    |
| c+s,s         | Save As...                              |
| c+k,s         | Save All                                |
| c+f4          | Close                                   |
| c+k,w         | Close All                               |
| c+s,t         | Reopen closed editor                    |
| c+k           | Enter Keep preview mode editor open     |
| c+tab         | Open next                               |
| cs+tab        | Open previous                           |
| c+k,p         | Copy path of active file                |
| c+k,r - c+o,e | Reveal active file in Explorer          |
| c+k,o         | Show active file in new window/instance |

# Alphatic Order

[🔝](#contents)

## Ctrl Shortcuts

| Key   | Desc                           | When             |
|-------|--------------------------------|------------------|
| c+a   | select all                     |
| ctb   |                                |
| c+c   | cut                            |
| c+d   | copy line down(duplicate line) |
| c+d   | add selection to match         | selection active |
| c+e   | recent files                   |
| c+f   | find                           |
| c+g   | go to                          |
| c+h,h | replace                        |
| c+ı   |                                |
| c+i   |                                |
| c+j,j |                                |
| c+k,k |                                |
| c+l   | delete line                    |
| c+m   | (screen to center??)           |
| c+n   | Create New File                |
| c+o   | open file                      |
| c+p   | navigate Project File          |
| c+rr  | open recent                    |
| c+s   | save                           |
| c+ş   |
| c+t   | go to symbol                   |
| c+u   |
| c+ü   |
| c+v   | paste                          |
| c+y   |
| c+z   |

[🔝](#contents)

## Alt Shortcuts

| Key   | Desc             |
|-------|------------------|
| a+a   | matched brackets |
| a+b   | -                |
| a+c   | -                |
| a+d   | open file        |
| a+e   | edit menu        |
| a+f   | file menu        |
| a+g   | go menu          |
| a+h   | help menu        |
| a+ı   | -                |
| a+i   | -                |
| a+j   | -                |
| a+k   | -                |
| a+l,l |                  |
| a+m   | -                |
| a+n   | -                |
| a+o   | -                |
| a+p   | -                |
| a+r   | -                |
| a+s   | tilda char       |
| a+ş   | -                |
| a+t   | -                |
| a+u   | -                |
| a+ü   | -                |
| a+v   | view menu        |
| a+y   | -                |

## multi keys

| Key | Exp                   |
| --- | --------------------- |
| c+k | x                     |
| c+j | x                     |
| c+r | x                     |
| c+h | x                     |
| c+1 | navigation related??? |
| c+m | markdown related      |

[🔝](#contents)

### (c+k) multi keys

| Key   | Exp         |
| ----- | ----------- |
| c+k,f | Format File |

[🔝](#contents)

### (c+h) multi keys

| Key   | Exp                      |
| ----- | ------------------------ |
| c+h,p | Preview Markdown         |
| c+h,r | Run File                 |
| c+h,c | Clear Output (run panel) |

# Notes

- Other operating systems’ keyboard shortcuts and additional unassigned shortcuts available at aka.ms/vscodekeybindings (Key Bindings for Visual Studio Code)

# Other Unfrequent Items

c+k,m | Change file language

# Templates

See [Keymap Template](./keymap-template.md)

[🔝](#contents)
