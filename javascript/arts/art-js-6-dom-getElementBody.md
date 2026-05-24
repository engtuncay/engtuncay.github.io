

# GetElementBody




## Body Elementini Seçme

`body` seçilip içine eleman ekleyebilirsiniz.

- **Body seçme:** `document.body`, `document.querySelector('body')`, veya `document.getElementsByTagName('body')[0]`.
- **Yeni element oluşturma:** `document.createElement(...)`.
- **Ekleme yöntemleri:** `appendChild`, `append`, `insertBefore`, `insertAdjacentHTML` vb.
- **DOMContentLoaded (güvenli):** Script üstteyse DOM hazır olunca çalıştırmak için `DOMContentLoaded` kullanın.

Kısa örnek:
```js
document.addEventListener('DOMContentLoaded', () => {
  const el = document.createElement('div');
  el.textContent = 'Selam dünya';
  el.className = 'yeni-item';
  document.body.appendChild(el);
});
```

Alternatif (hızlı ekleme):

```js
document.body.insertAdjacentHTML('beforeend', '<div class="yeni-item">Selam</div>');
```


## Modal Oluşturma

```js
function fiBsModalInjectHtml(modalId = 'logModal', closeOnBackdropClick = true) {
  let dialog = document.getElementById(modalId) as HTMLDialogElement;
  
  if (!dialog) {
    const modalBodyId = modalId + 'Body';
    dialog = document.createElement('dialog');
    dialog.id = modalId;

    const dialogContent = `
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="${modalId}Label">Loglar</h5>
          <button type="button" class="btn-close" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="${modalBodyId}"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary">Kapat</button>
        </div>
      </div>
    `;
    
    dialog.innerHTML = dialogContent;
    
    document.body.appendChild(dialog);
    
    // Dialog içindeki butonları scoped olarak seç
    const closeBtn = dialog.querySelector('.btn-close') as HTMLButtonElement;
    const secondaryBtn = dialog.querySelector('.btn-secondary') as HTMLButtonElement;
    
    closeBtn?.addEventListener('click', () => dialog.close());
    secondaryBtn?.addEventListener('click', () => dialog.close());
    
    // Dışarı tıklanırsa kapanma (backdrop click)
    if (closeOnBackdropClick) {
      dialog.addEventListener('click', (event) => {
        if (event.target === dialog) {
          dialog.close();
        }
      });
    }
  }
  
  return modalId + 'Body';
}

export function fiBsModal(htmlModalContent, modalId = 'logModal', closeOnBackdropClick = true) {
  const modalBodyId = fiBsModalInjectHtml(modalId, closeOnBackdropClick);
  const dialog = document.getElementById(modalId) as HTMLDialogElement;
  
  document.getElementById(modalBodyId).innerHTML = htmlModalContent;
  dialog.showModal();
}
```