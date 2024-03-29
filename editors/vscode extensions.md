

- [Debug (web)](#debug-web)
  - [Debugger for Chrome - Must have extension for Angular development.](#debugger-for-chrome---must-have-extension-for-angular-development)
  - [Template Productivity](#template-productivity)
  - [Code Analysis](#code-analysis)
    - [TSLint - linter for the TypeScript language, help fixing error in TS code.](#tslint---linter-for-the-typescript-language-help-fixing-error-in-ts-code)
    - [AngularDoc for Visual Studio Code](#angulardoc-for-visual-studio-code)
    - [TypeScript Hero -](#typescript-hero--)
  - [Workbench](#workbench)
    - [EditorConfig for VS Code - EditorConfig Support for Visual Studio Code (must have plugin for VSCode)](#editorconfig-for-vs-code---editorconfig-support-for-visual-studio-code-must-have-plugin-for-vscode)
    - [angular2-inline - support for inline HTML and CSS in angular components. I don't use inline templates, but this is a helpful extension in case you use inline HTML or CSS.](#angular2-inline---support-for-inline-html-and-css-in-angular-components-i-dont-use-inline-templates-but-this-is-a-helpful-extension-in-case-you-use-inline-html-or-css)
    - [NgBootstrap Snippets - if you need Bootstrap 4 support in you angular project, this extension has some helpful snippets.](#ngbootstrap-snippets---if-you-need-bootstrap-4-support-in-you-angular-project-this-extension-has-some-helpful-snippets)
    - [vscode-icons - my favorite collection of icons for VSCode projects!](#vscode-icons---my-favorite-collection-of-icons-for-vscode-projects)
- [Productivity](#productivity)
  - [Bracket Pair Colorizer](#bracket-pair-colorizer)
  - [snippet-creator](#snippet-creator)
- [Git](#git)
  - [Git History (git log)](#git-history-git-log)

---

This extension pack packages some of the most popular (and some I find very useful) VS Code Angular extensions.

Extensions Included

Angular + Angular Material + NgRX + RxJS Code Snippets

# Debug (web)

##  Debugger for Chrome - Must have extension for Angular development. 

You can debug using chrome and add your breakpoints in VSCode. Tutorial on how to use can be found on VSCode docs.

## Template Productivity

Auto Rename Tag - Auto rename paired HTML/XML tag.

Auto Close Tag - Automatically add HTML/XML close tag, same as Visual Studio IDE or Sublime Text.

HTML Snippets - Full HTML tags including HTML5 Snippets.

Productivity

Auto Import - Automatically finds, parses and provides code actions and code completion for all available imports (altough VSCode has auto import funcionatlity, this plugin is a great complement).

json2ts - Convert a JSON from clipboard to TypeScript interfaces. (Ctrl+Alt+V).

Prettier - JavaScript formatter - format your Javascript / Typescript / CSS - specially for Angular, I recommend adding the following config in you users setting for VsCode. Recommended settings:

"prettier.singleQuote": true (this helps when using auto import extension or the VSCode auto import functionality).
"prettier.tabWidth": 2 (angular lint uses 2 spaces as default indentation). With this setting, you can continue using tabs if it is your preference
"prettier.useTabs": false (same as above)

Path Intellisense - VSCode has a very good auto import capability, but sometime you still need to import some files manually, and this extension helps a lot in these cases.

Move TS - this is a great extension to help you refactor and re-organize some files and components in the project. It automatically fixes the imports on the file (or component folder) that is being moved and also files that are importing the component you are moving. To use it: right-click on a file or folder in the Project Explorer pane and select 'Move TypeScript'.

## Code Analysis

### TSLint - linter for the TypeScript language, help fixing error in TS code.

Recommended settings: "tslint.autoFixOnSave": true (auto fix lint issues on file save)

### AngularDoc for Visual Studio Code 
Architectural analysis and visualization for Angular 2 projects.

### TypeScript Hero - 
Favorite feature for Angular projects: sorts and organizes your imports according to convention and removes imports that are unused (Ctrl+Alt+o on Win/Linux or Ctrl+Opt+o on MacOS).

## Workbench

###  EditorConfig for VS Code - EditorConfig Support for Visual Studio Code (must have plugin for VSCode)

Other extensions recommended, but not included in this package

###  angular2-inline - support for inline HTML and CSS in angular components. I don't use inline templates, but this is a helpful extension in case you use inline HTML or CSS.

###  NgBootstrap Snippets - if you need Bootstrap 4 support in you angular project, this extension has some helpful snippets.

###  vscode-icons - my favorite collection of icons for VSCode projects!

# Productivity

## Bracket Pair Colorizer 

This extension allows matching brackets to be identified with colours. Great when you have nested brackets. I usually keep this extension disabled and only enable it when needed.

## snippet-creator 

helps you creating code snippets (saves snippets in the User Snippets in VSCode)


# Git

## Git History (git log) 

allows you to view git history with graph and details


