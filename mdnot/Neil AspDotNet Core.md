<!-- $theme: default -->

---
Neil Asp Dot Net Core Course Notes

[TOC]




---
## Environment

Kurulacak Uygulamalar

- Dot Net Sdk  (>2)
- Nodejs LTS
- Visual Studio Code
- Postman
- sqlite browser


---
## DotNet Cli

- -h ile yardım alırız. Mesela, 
  - dotnet new -h 
    - Bu bize yeni oluşturulacak proje ile ilgili opsiyonları sıralar.
- dotnet new webapi -o DatingApp.API -n DatingApp.API
  - DatingApp.API adında klasör içerisine projeyi oluşturur. (namespace DatingApp.API yapar)

---
## Project Files

- Vscode components
  - C#
  - C# Extensions
- Program.cs 
- Startup.cs
- two important initial classes

---

## Starting the App

- valuesController.cs
  - [controller] controller ismini gösteriyor.
  - örnekteki values eşitlenir.
- Uygulamayı çalıştırmak için (api webservis başlatır)
  - terminal: **dotnet run**
- browser apimize ulaşmak adresi gireriz:
  - localhost:5000/api/values
- terminalden (power shell)
  - $env:ASPNETCORE_ENVIRONMENT= "Development"
  - throw new exception("test exception"); gönderdiğimizde detaylı hata raporunu verir.

---
## Adding Dot Net Watch

- DatingApp.API.csproj
  - Proje dosyamız. 
  - ![Dot Net Watch Kütüphanesi Ekleme](.\Screenshot_2.png)
  - kütüphaneleri indirmek için
    - terminal: dotnet restore
    - terminal: dotnet watch run
    - böylelikle bir değişiklik yaparsak otomatik olarak serverda güncellenir.

---

## Creating the First Model and Data Context


---
<!--stackedit_data:
eyJoaXN0b3J5IjpbMTY3MzM3MTMwMV19
-->