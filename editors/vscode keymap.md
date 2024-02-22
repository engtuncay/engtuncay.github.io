
- [Basic Editing](#basic-editing)
- [Rich Languages Editing](#rich-languages-editing)
- [Navigation](#navigation)
- [Editor/Window Management](#editorwindow-management)
- [File Management](#file-management)
- [Display](#display)
- [Search](#search)
- [Search Editor](#search-editor)
- [Extensions](#extensions)
- [Source](#source)

# Basic Editing

| Command                                     | Key              | Command id                                        |
|---------------------------------------------|------------------|---------------------------------------------------|
| Cut line (empty selection)                  | Ctrl+X           | editor.action.clipboardCutAction                  |
| Copy line (empty selection)                 | Ctrl+C           | editor.action.clipboardCopyAction                 |
| Paste                                       | Ctrl+V           | editor.action.clipboardPasteAction                |
| Delete Line                                 | Ctrl+Shift+K     | editor.action.deleteLines                         |
| Insert Line Below                           | Ctrl+Enter       | editor.action.insertLineAfter                     |
| Insert Line Above                           | Ctrl+Shift+Enter | editor.action.insertLineBefore                    |
| Move Line Down                              | Alt+Down         | editor.action.moveLinesDownAction                 |
| Move Line Up                                | Alt+Up           | editor.action.moveLinesUpAction                   |
| Copy Line Down                              | Shift+Alt+Down   | editor.action.copyLinesDownAction                 |
| Copy Line Up                                | Shift+Alt+Up     | editor.action.copyLinesUpAction                   |
| Undo                                        | Ctrl+Z           | undo                                              |
| Redo                                        | Ctrl+Y           | redo                                              |
| Add Selection To Next Find Match            | Ctrl+D           | editor.action.addSelectionToNextFindMatch         |
| Move Last Selection To Next Find Match      | Ctrl+K Ctrl+D    | editor.action.moveSelectionToNextFindMatch        |
| Undo last cursor operation                  | Ctrl+U           | cursorUndo                                        |
| Insert cursor at end of each line selected  | Shift+Alt+I      | editor.action.insertCursorAtEndOfEachLineSelected |
| Select all occurrences of current selection | Ctrl+Shift+L     | editor.action.selectHighlights                    |
| Select all occurrences of current word      | Ctrl+F2          | editor.action.changeAll                           |
| Select current line                         | Ctrl+L           | expandLineSelection                               |
| Insert Cursor Below                         | Ctrl+Alt+Down    | editor.action.insertCursorBelow                   |
| Insert Cursor Above                         | Ctrl+Alt+Up      | editor.action.insertCursorAbove                   |
| Jump to matching bracket                    | Ctrl+Shift+\     | editor.action.jumpToBracket                       |
| Indent Line                                 | Ctrl+]           | editor.action.indentLines                         |
| Outdent Line                                | Ctrl+[           | editor.action.outdentLines                        |
| Go to Beginning of Line                     | Home             | cursorHome                                        |
| Go to End of Line                           | End              | cursorEnd                                         |
| Go to End of File                           | Ctrl+End         | cursorBottom                                      |
| Go to Beginning of File                     | Ctrl+Home        | cursorTop                                         |
| Scroll Line Down                            | Ctrl+Down        | scrollLineDown                                    |
| Scroll Line Up                              | Ctrl+Up          | scrollLineUp                                      |
| Scroll Page Down                            | Alt+PageDown     | scrollPageDown                                    |
| Scroll Page Up                              | Alt+PageUp       | scrollPageUp                                      |
| Fold (collapse) region                      | Ctrl+Shift+[     | editor.fold                                       |
| Unfold (uncollapse) region                  | Ctrl+Shift+]     | editor.unfold                                     |
| Fold (collapse) all subregions              | Ctrl+K Ctrl+[    | editor.foldRecursively                            |
| Unfold (uncollapse) all subregions          | Ctrl+K Ctrl+]    | editor.unfoldRecursively                          |
| Fold (collapse) all regions                 | Ctrl+K Ctrl+0    | editor.foldAll                                    |
| Unfold (uncollapse) all regions             | Ctrl+K Ctrl+J    | editor.unfoldAll                                  |
| Add Line Comment                            | Ctrl+K Ctrl+C    | editor.action.addCommentLine                      |
| Remove Line Comment                         | Ctrl+K Ctrl+U    | editor.action.removeCommentLine                   |
| Toggle Line Comment                         | Ctrl+/           | editor.action.commentLine                         |
| Toggle Block Comment                        | Shift+Alt+A      | editor.action.blockComment                        |
| Find                                        | Ctrl+F           | actions.find                                      |
| Replace                                     | Ctrl+H           | editor.action.startFindReplaceAction              |
| Find Next                                   | Enter            | editor.action.nextMatchFindAction                 |
| Find Previous                               | Shift+Enter      | editor.action.previousMatchFindAction             |
| Select All Occurrences of Find Match        | Alt+Enter        | editor.action.selectAllMatches                    |
| Toggle Find Case Sensitive                  | Alt+C            | toggleFindCaseSensitive                           |
| Toggle Find Regex                           | Alt+R            | toggleFindRegex                                   |
| Toggle Find Whole Word                      | Alt+W            | toggleFindWholeWord                               |
| Toggle Use of Tab Key for Setting Focus     | Ctrl+M           | editor.action.toggleTabFocusMode                  |
| Toggle Render Whitespace                    | unassigned       | toggleRenderWhitespace                            |
| Toggle Word Wrap                            | Alt+Z            | editor.action.toggleWordWrap                      |

# Rich Languages Editing                      

| Command                     | Key              | Command id                                 |
|-----------------------------|------------------|--------------------------------------------|
| Trigger Suggest             | Ctrl+Space       | editor.action.triggerSuggest               |
| Trigger Parameter Hints     | Ctrl+Shift+Space | editor.action.triggerParameterHints        |
| Format Document             | Shift+Alt+F      | editor.action.formatDocument               |
| Format Selection            | Ctrl+K Ctrl+F    | editor.action.formatSelection              |
| Go to Definition            | F12              | editor.action.revealDefinition             |
| Show Hover                  | Ctrl+K Ctrl+I    | editor.action.showHover                    |
| Peek Definition             | Alt+F12          | editor.action.peekDefinition               |
| Open Definition to the Side | Ctrl+K F12       | editor.action.revealDefinitionAside        |
| Quick Fix                   | Ctrl+.           | editor.action.quickFix                     |
| Go to References            | Shift+F12        | editor.action.goToReferences               |
| Rename Symbol               | F2               | editor.action.rename                       |
| Replace with Next Value     | Ctrl+Shift+.     | editor.action.inPlaceReplace.down          |
| Replace with Previous Value | Ctrl+Shift+,     | editor.action.inPlaceReplace.up            |
| Expand AST Selection        | Shift+Alt+Right  | editor.action.smartSelect.expand           |
| Shrink AST Selection        | Shift+Alt+Left   | editor.action.smartSelect.shrink           |
| Trim Trailing Whitespace    | Ctrl+K Ctrl+X    | editor.action.trimTrailingWhitespace       |
| Change Language Mode        | Ctrl+K M         | workbench.action.editor.changeLanguageMode |

# Navigation                                  

| Command                         | Key                | Command id                                                  |
|---------------------------------|--------------------|-------------------------------------------------------------|
| Show All Symbols                | Ctrl+T             | workbench.action.showAllSymbols                             |
| Go to Line...                   | Ctrl+G             | workbench.action.gotoLine                                   |
| Go to File..., Quick Open       | Ctrl+P             | workbench.action.quickOpen                                  |
| Go to Symbol...                 | Ctrl+Shift+O       | workbench.action.gotoSymbol                                 |
| Show Problems                   | Ctrl+Shift+M       | workbench.actions.view.problems                             |
| Go to Next Error or Warning     | F8                 | editor.action.marker.nextInFiles                            |
| Go to Previous Error or Warning | Shift+F8           | editor.action.marker.prevInFiles                            |
| Show All Commands               | Ctrl+Shift+P or F1 | workbench.action.showCommands                               |
| Navigate Editor Group History   | Ctrl+Tab           | workbench.action.quickOpenPreviousRecentlyUsedEditorInGroup |
| Go Back                         | Alt+Left           | workbench.action.navigateBack                               |
| Go back in Quick Input          | Alt+Left           | workbench.action.quickInputBack                             |
| Go Forward                      | Alt+Right          | workbench.action.navigateForward                            |
| Focus Breadcrumbs               | Ctrl+Shift+;       | breadcrumbs.focus                                           |
| Focus and Select Breadcrumbs    | Ctrl+Shift+.       | breadcrumbs.focusAndSelect                                  |

# Editor/Window Management                    

| Command                              | Key                 | Command id                                  |
|--------------------------------------|---------------------|---------------------------------------------|
| New Window                           | Ctrl+Shift+N        | workbench.action.newWindow                  |
| Close Window                         | Alt+F4              | workbench.action.closeWindow                |
| Close Editor                         | Ctrl+W              | workbench.action.closeActiveEditor          |
| Close Folder                         | Ctrl+K F            | workbench.action.closeFolder                |
| Cycle Between Editor Groups          | unassigned          | workbench.action.navigateEditorGroups       |
| Split Editor                         | Ctrl+\              | workbench.action.splitEditor                |
| Focus into First Editor Group        | Ctrl+1              | workbench.action.focusFirstEditorGroup      |
| Focus into Second Editor Group       | Ctrl+2              | workbench.action.focusSecondEditorGroup     |
| Focus into Third Editor Group        | Ctrl+3              | workbench.action.focusThirdEditorGroup      |
| Focus into Editor Group on the Left  | unassigned          | workbench.action.focusPreviousGroup         |
| Focus into Editor Group on the Right | unassigned          | workbench.action.focusNextGroup             |
| Move Editor Left                     | Ctrl+Shift+PageUp   | workbench.action.moveEditorLeftInGroup      |
| Move Editor Right                    | Ctrl+Shift+PageDown | workbench.action.moveEditorRightInGroup     |
| Move Active Editor Group Left        | Ctrl+K Left         | workbench.action.moveActiveEditorGroupLeft  |
| Move Active Editor Group Right       | Ctrl+K Right        | workbench.action.moveActiveEditorGroupRight |
| Move Editor into Next Group          | Ctrl+Alt+Right      | workbench.action.moveEditorToNextGroup      |
| Move Editor into Previous Group      | Ctrl+Alt+Left       | workbench.action.moveEditorToPreviousGroup  |

#  File Management                             

| Command                        | Key           | Command id                                       |
|--------------------------------|---------------|--------------------------------------------------|
| New File                       | Ctrl+N        | workbench.action.files.newUntitledFile           |
| Open File...                   | Ctrl+O        | workbench.action.files.openFile                  |
| Save                           | Ctrl+S        | workbench.action.files.save                      |
| Save All                       | Ctrl+K S      | saveAll                                          |
| Save As...                     | Ctrl+Shift+S  | workbench.action.files.saveAs                    |
| Close                          | Ctrl+W        | workbench.action.closeActiveEditor               |
| Close Others                   | unassigned    | workbench.action.closeOtherEditors               |
| Close Group                    | Ctrl+K W      | workbench.action.closeEditorsInGroup             |
| Close Other Groups             | unassigned    | workbench.action.closeEditorsInOtherGroups       |
| Close Group to Left            | unassigned    | workbench.action.closeEditorsToTheLeft           |
| Close Group to Right           | unassigned    | workbench.action.closeEditorsToTheRight          |
| Close All                      | Ctrl+K Ctrl+W | workbench.action.closeAllEditors                 |
| Reopen Closed Editor           | Ctrl+Shift+T  | workbench.action.reopenClosedEditor              |
| Keep Open                      | Ctrl+K Enter  | workbench.action.keepEditor                      |
| Copy Path of Active File       | Ctrl+K P      | workbench.action.files.copyPathOfActiveFile      |
| Reveal Active File in Windows  | Ctrl+K R      | workbench.action.files.revealActiveFileInWindows |
| Show Opened File in New Window | unassigned    | workbench.action.files.showOpenedFileInNewWindow |
| Compare Opened File With       | unassigned    | workbench.files.action.compareFileWith           |

# Display                                     

| Command                      | Key           | Command id                                  |
|------------------------------|---------------|---------------------------------------------|
| Toggle Full Screen           | F11           | workbench.action.toggleFullScreen           |
| Toggle Zen Mode              | Ctrl+K Z      | workbench.action.toggleZenMode              |
| Leave Zen Mode               | Escape Escape | workbench.action.exitZenMode                |
| Zoom in                      | Ctrl+=        | workbench.action.zoomIn                     |
| Zoom out                     | Ctrl+-        | workbench.action.zoomOut                    |
| Reset Zoom                   | Ctrl+Numpad0  | workbench.action.zoomReset                  |
| Toggle Sidebar Visibility    | Ctrl+B        | workbench.action.toggleSidebarVisibility    |
| Show Explorer / Toggle Focus | Ctrl+Shift+E  | workbench.view.explorer                     |
| Show Search                  | Ctrl+Shift+F  | workbench.view.search                       |
| Show Source Control          | Ctrl+Shift+G  | workbench.view.scm                          |
| Show Run                     | Ctrl+Shift+D  | workbench.view.debug                        |
| Show Extensions              | Ctrl+Shift+X  | workbench.view.extensions                   |
| Show Output                  | Ctrl+Shift+U  | workbench.action.output.toggleOutput        |
| Quick Open View              | Ctrl+Q        | workbench.action.quickOpenView              |
| Open New Command Prompt      | Ctrl+Shift+C  | workbench.action.terminal.openNativeConsole |
| Toggle Markdown Preview      | Ctrl+Shift+V  | markdown.showPreview                        |
| Open Preview to the Side     | Ctrl+K V      | markdown.showPreviewToSide                  |
| Toggle Integrated Terminal                  | Ctrl+`               | workbench.action.terminal.toggleTerminal                    |

# Search                                      

| Command                       | Key          | Command id                                 |
|-------------------------------|--------------|--------------------------------------------|
| Show Search                   | Ctrl+Shift+F | workbench.view.search                      |
| Replace in Files              | Ctrl+Shift+H | workbench.action.replaceInFiles            |
| Toggle Match Case             | Alt+C        | toggleSearchCaseSensitive                  |
| Toggle Match Whole Word       | Alt+W        | toggleSearchWholeWord                      |
| Toggle Use Regular Expression | Alt+R        | toggleSearchRegex                          |
| Toggle Search Details         | Ctrl+Shift+J | workbench.action.search.toggleQueryDetails |
| Focus Next Search Result      | F4           | search.action.focusNextSearchResult        |
| Focus Previous Search Result  | Shift+F4     | search.action.focusPreviousSearchResult    |
| Show Next Search Term         | Down         | history.showNext                           |
| Show Previous Search Term     | Up           | history.showPrevious                       |

# Search Editor                               

| Command                    | Key                  | Command id                                   |
|----------------------------|----------------------|----------------------------------------------|
| Open Results In Editor     | Alt+Enter            | search.action.openInEditor                   |
| Focus Search Editor Input  | Escape               | search.action.focusQueryEditorWidget         |
| Search Again               | Ctrl+Shift+R         | rerunSearchEditorSearch                      |
| Delete File Results        | Ctrl+Shift+Backspace | search.searchEditor.action.deleteFileResults |
| Preferences                |                      |                                              |
| Command                    | Key                  | Command id                                   |
| Open Settings              | Ctrl+,               | workbench.action.openSettings                |
| Open Workspace Settings    | unassigned           | workbench.action.openWorkspaceSettings       |
| Open Keyboard Shortcuts    | Ctrl+K Ctrl+S        | workbench.action.openGlobalKeybindings       |
| Open User Snippets         | unassigned           | workbench.action.openSnippets                |
| Select Color Theme         | Ctrl+K Ctrl+T        | workbench.action.selectTheme                 |
| Configure Display Language | unassigned           | workbench.action.configureLocale             |
| Debug                      |                      |                                              |
| Command                    | Key                  | Command id                                   |
| Toggle Breakpoint          | F9                   | editor.debug.action.toggleBreakpoint         |
| Start                      | F5                   | workbench.action.debug.start                 |
| Continue                   | F5                   | workbench.action.debug.continue              |
| Start (without debugging)  | Ctrl+F5              | workbench.action.debug.run                   |
| Pause                      | F6                   | workbench.action.debug.pause                 |
| Step Into                  | F11                  | workbench.action.debug.stepInto              |
| Tasks                      |                      |                                              |
| Command                    | Key                  | Command id                                   |
| Run Build Task             | Ctrl+Shift+B         | workbench.action.tasks.build                 |
| Run Test Task              | unassigned           | workbench.action.tasks.test                  |

# Extensions                 

| Command                     | Key        | Command id                                            |
|-----------------------------|------------|-------------------------------------------------------|
| Install Extension           | unassigned | workbench.extensions.action.installExtension          |
| Show Installed Extensions   | unassigned | workbench.extensions.action.showInstalledExtensions   |
| Show Outdated Extensions    | unassigned | workbench.extensions.action.listOutdatedExtensions    |
| Show Recommended Extensions | unassigned | workbench.extensions.action.showRecommendedExtensions |
| Show Popular Extensions     | unassigned | workbench.extensions.action.showPopularExtensions     |
| Update All Extensions       | unassigned | workbench.extensions.action.updateAllExtensions       |

# Source 

- https://code.visualstudio.com/docs/getstarted/keybindings

