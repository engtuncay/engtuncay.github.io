

engtuncay:  phputil8 yerini belirtmeme rağmen eski adresi görüyor. Source path "Y:/xampp/htdocs/phputils8" is not found for package engtuncay/phputils8 

composer clear-cache

Remove-Item composer.lock -Force -ErrorAction SilentlyContinue

composer install

