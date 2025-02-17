
Source : https://chatgpt.com/c/67b2176c-1ee0-800e-93c6-ee0521a4b3ab

[Back](../readme.md)

---

- [Bootstrap 5 Cheatsheet](#bootstrap-5-cheatsheet)
  - [📌 Grid System](#-grid-system)
  - [📌 Typography](#-typography)
  - [📌 Colors](#-colors)
  - [📌 Buttons](#-buttons)
  - [📌 Forms](#-forms)
  - [📌 Alerts](#-alerts)
  - [📌 Cards](#-cards)
  - [📌 Navbar](#-navbar)
  - [📌 Modals](#-modals)
  - [📌 Tables](#-tables)
  - [📌 Utility Classes](#-utility-classes)
    - [`w-*` (Width - Genişlik)](#w--width---genişlik)
    - [`h-*` (Height - Yükseklik)](#h--height---yükseklik)
    - [`m-*` ve `p-*` (Margin \& Padding - Dış ve İç Boşluklar)](#m--ve-p--margin--padding---dış-ve-i̇ç-boşluklar)


# Bootstrap 5 Cheatsheet

## 📌 Grid System

```html
<div class="container"> ... </div>
<div class="container-fluid"> ... </div>
<div class="container-lg"> ... </div>
```

```html
<div class="row">
  <div class="col">Col</div>
  <div class="col">Col</div>
</div>

<div class="row">
  <div class="col-6">Col-6</div>
  <div class="col-6">Col-6</div>
</div>
```

## 📌 Typography

```html
<p class="lead">This is a lead paragraph.</p>
<p class="text-muted">Muted text</p>
<p class="text-primary">Primary text</p>
<p class="text-danger">Danger text</p>
```

## 📌 Colors

```html
<div class="bg-primary text-white p-3">Primary</div>
<div class="bg-secondary text-white p-3">Secondary</div>
<div class="bg-success text-white p-3">Success</div>
<div class="bg-danger text-white p-3">Danger</div>
```

## 📌 Buttons

```html
<button class="btn btn-primary">Primary</button>
<button class="btn btn-secondary">Secondary</button>
<button class="btn btn-outline-danger">Outline Danger</button>
```

## 📌 Forms

```html
<form>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" placeholder="name@example.com">
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
</form>
```

## 📌 Alerts

```html
<div class="alert alert-warning" role="alert">This is a warning alert!</div>
<div class="alert alert-danger" role="alert">This is a danger alert!</div>
```

## 📌 Cards

```html
<div class="card" style="width: 18rem;">
  <img src="image.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
```

## 📌 Navbar

```html
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Features</a></li>
      </ul>
    </div>
  </div>
</nav>
```

## 📌 Modals

```html
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch modal
</button>

<div class="modal fade" id="exampleModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        Modal content here.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
```

## 📌 Tables

```html
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>John Doe</td>
      <td>john@example.com</td>
    </tr>
  </tbody>
</table>
```

## 📌 Utility Classes

```html
<div class="d-flex justify-content-center align-items-center">Centered content</div>
<div class="m-3 p-3 border">Margin and padding example</div>
<div class="w-50">Width 50%</div>
<div class="h-25">Height 25%</div>
<div class="shadow-lg">Large shadow</div>
<div class="border border-primary">Primary border</div>
<div class="border border-secondary border-2">Secondary thick border</div>
<div class="border border-danger border-3">Danger thicker border</div>
```

### `w-*` (Width - Genişlik)
- `w-25` → %25 genişlik
- `w-50` → %50 genişlik
- `w-75` → %75 genişlik
- `w-100` → %100 genişlik
- `w-auto` → İçeriğe göre genişlik

### `h-*` (Height - Yükseklik)
- `h-25` → %25 yükseklik
- `h-50` → %50 yükseklik
- `h-75` → %75 yükseklik
- `h-100` → %100 yükseklik
- `h-auto` → İçeriğe göre yükseklik

### `m-*` ve `p-*` (Margin & Padding - Dış ve İç Boşluklar)
- `m-0`, `p-0` → 0 boşluk
- `m-1`, `p-1` → 0.25rem (4px)
- `m-2`, `p-2` → 0.5rem (8px)
- `m-3`, `p-3` → 1rem (16px)
- `m-4`, `p-4` → 1.5rem (24px)
- `m-5`, `p-5` → 3rem (48px)
- `m-auto`, `p-auto` → Otomatik hizalama

---
Bu cheatsheet en sık kullanılan Bootstrap 5 bileşenlerini içerir. Daha fazla detay için [Bootstrap 5 dokümantasyonuna](https://getbootstrap.com/docs/5.0/getting-started/introduction/) göz atabilirsiniz! 🚀
