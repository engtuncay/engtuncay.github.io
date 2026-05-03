



# Extension

## Installation


```sh
pnpm install -g yo generator-code
```

adımları tamamladıktan sonra extension adında klasör açıp kodları orada oluşturur.

## Packing and Testing an extension

- vsce paketini global olarak yükleriz. 

```sh
pnpm i -g vsce
```

- vsce ile paketleriz.

```sh
vsce package
```

- paketi vscode'a yüklemek istersek

```sh
code --install-extension weather-ext-0.1.vsix
```

- paketi vscode repo'sunda barındırmak için : 

