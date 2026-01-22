<?php
// Örnek basit PHP sayfası - tailwind-plain-php-example
// Build: proje/examples/tailwind-plain-php dizininde 'npm install' sonrası 'npm run build:css' çalıştırın.
// Üretilen CSS: public/css/tailwind.css
?>
<!doctype html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Tailwind + Plain PHP Örnek</title>
  <link href="/js-libs/alpinejs/arts/examples/tailwind-plain-php/public/css/tailwind.css" rel="stylesheet">
</head>
<body class="p-6">
  <?php
    $color = 'red';
    $classes = "bg-{$color}-500 text-white p-4 rounded";
    // Eğer dinamik sınıflar safelist'te yoksa Tailwind onları üretmez.
  ?>
  <div class="<?php echo $classes; ?>">
    Dinamik renk örneği: <?php echo htmlspecialchars($color); ?>
  </div>

  <div class="mt-4">
    <p class="text-gray-700">Statik sınıf örneği</p>
    <button class="mt-2 px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded">Buton</button>
  </div>
</body>
</html>
