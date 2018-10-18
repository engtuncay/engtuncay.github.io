

- [Swal Module](#swal-module)
    - [Button ile kullanımı](#button-ile-kullanımı)




## Swal Module

### Button ile kullanımı


```html
from ( butceTanımlari.html)

<button class="btn btn-light" [swal]="deleteSwal">
  Swal Demo
</button>

<swal #deleteSwal title="SweetAlert2 Timer">
  <div *swalPartial class="alert alert-info">
    <strong>{{ config.paging }}</strong> seconds elapsed since then.

  </div>
</swal>

```

