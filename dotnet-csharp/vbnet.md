

- [VB Core](#vb-core)
    - [VbNull](#vbnull)
    - [Nothing](#nothing)
- [VB DB](#vb-db)
- [VB IO](#vb-io)
    - [How do I create a folder in VB if it doesn't exist?](#how-do-i-create-a-folder-in-vb-if-it-doesnt-exist)
- [VB Gui](#vb-gui)
    - [MsgBox](#msgbox)


# VB Core


## VbNull

Dim a1 

Şekline Tanımladığımız değişkenin tipi olmadığı için vbNull dır.

```vb
Dim a1 
a1 = 1
If a1 = vbNull Then
    Console.WriteLn("vbNull True")
End If

```

Şeklindeki örnek içinde a1 = vbNull şartı saglanır, çünkü a1 in tipi yok.

## Nothing

Kullanım Örnekler

```vb
Dim a1 = Nothing
Dim a2 as Integer
a2= Nothing
```

Kontrolü 

```vb
If kasavarmi Is Nothing Then
' ...
End if

If kasavarmi = Nothing Then
' ...
End if


```


# VB DB

# VB IO

## How do I create a folder in VB if it doesn't exist?

```
If(Not System.IO.Directory.Exists(YourPath)) Then
    System.IO.Directory.CreateDirectory(YourPath)
End If
```

# VB Gui

## MsgBox

```vb
' Show the stack trace, which is a list of methods that are currently executing.
MessageBox.Show("Stack Trace: " & vbCrLf & ex.StackTrace)
```
