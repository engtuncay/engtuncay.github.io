

# Installation Rclone

➖ https://rclone.org/install/#script-installation

➖ Winget

```sh
winget install Rclone.Rclone
```

➖ Choco

```sh
choco install rclone
```

➖ Uninstall

```sh
winget uninstall Rclone.Rclone --force

```


# Rclone Ls

➖ 

```sh
rclone ls gdrive
```

# Rclone config file

➖ example file address

C:\Users\%username%\AppData\Roaming\rclone\rclone.conf

# Trash Operations

## Rclone delete trash directory

➖ 1.Way

```sh
rclone cleanup mydrive:
```

silent

```sh
rclone.exe cleanup mydrive: --no-console --log-file c:\rclone\logs\sync_files.txt
```

Source : https://rclone.org/commands/rclone_cleanup/

➖ 2.Way 

```sh
rclone delete mydrive: --drive-trashed-only --drive-use-trash=false --verbose=2 --fast-list
```

Source : 

## Rclone list trash directory

```sh
rclone ls mydrive: --drive-trashed-only

```

# Running in background 

https://rclone.org/install/#autostart


Rclone is a console application, so if not starting from an existing Command Prompt, e.g. when starting `rclone.exe` from a shortcut, it will open a Command Prompt window. When configuring rclone to run from task scheduler and windows service you are able to set it to run hidden in background. From rclone version 1.54 you can also make it run hidden from anywhere by adding option --no-console (it may still flash briefly when the program starts). Since rclone normally writes information and any error messages to the console, you must redirect this to a file to be able to see it. Rclone has a built-in option --log-file for that.

Example command to run a sync in background:

```sh
c:\rclone\rclone.exe sync c:\files remote:/files --no-console --log-file c:\rclone\logs\sync_files.txt

```

# Reference 

- Rclone command list : https://github.com/rclone/rclone/blob/master/docs/content/commands/rclone.md


# Rclone Google Drive Docs

https://rclone.org/drive/

