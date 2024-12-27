

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

```sh
rclone cleanup mydrive:
```

➖ 2.Way 

```sh
rclone delete mydrive: --drive-trashed-only --drive-use-trash=false --verbose=2 --fast-list
```

Source : 

## Rclone list trash directory

```sh
rclone ls mydrive: --drive-trashed-only

```

# Reference 

- Rclone command list : https://github.com/rclone/rclone/blob/master/docs/content/commands/rclone.md


