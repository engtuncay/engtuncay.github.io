




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


# VB DB

# VB IO

## How do I create a folder in VB if it doesn't exist?
```
If(Not System.IO.Directory.Exists(YourPath)) Then
    System.IO.Directory.CreateDirectory(YourPath)
End If
```