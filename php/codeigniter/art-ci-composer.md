

engtuncay:  phputil8 yerini belirtmeme rağmen eski adresi görüyor. Source path "Y:/xampp/htdocs/phputils8" is not found for package engtuncay/phputils8 

composer clear-cache

Remove-Item composer.lock -Force -ErrorAction SilentlyContinue

composer install





```sh
//composer.lock sil + yeniden yükle
composer clear-cache
composer install
// İçeriden doğrulayın
composer validate
// yüklü paketleri gösterir
composer show -i

```