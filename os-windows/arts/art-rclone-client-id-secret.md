
# Rclone İçin Özel Google Drive API Client ID ve Client Secret Alma Rehberi

Bu rehber, rclone'un ortak havuz kotalarından ve hız sınırlarından (rate limit) kurtulmak için kendi ücretsiz Google Cloud API kimlik bilgilerinizi nasıl oluşturacağınızı anlatır.

---

## Adım 1: Google Cloud Console'da Proje Oluşturma

1. [Google Cloud Console](https://console.cloud.google.com/) adresine gidin ve Google hesabınızla giriş yapın.
2. Üst menüden proje seçme alanına tıklayın ve sağ üstteki **"New Project" (Yeni Proje)** butonuna basın.
3. Projeye bir isim verin (Örn: `RcloneSync`) ve **Create** butonuna tıklayarak projenin oluşturulmasını bekleyin.
4. Oluşturma tamamlandıktan sonra üst kısımdaki proje seçicisinden bu yeni projeyi seçtiğinizden emin olun.

---

## Adım 2: Google Drive API'yi Etkinleştirme

1. Sol üstteki menüden **APIs & Services (API'ler ve Hizmetler) > Library (Kütüphane)** sekmesine gidin.
2. Arama çubuğuna **Google Drive API** yazın ve çıkan sonuca tıklayın.
3. Mavi **Enable (Etkinleştir)** butonuna basarak API'yi projeniz için aktif hale getirin.

---

## Adım 3: OAuth İzin Ekranını (Consent Screen) Ayarlama

1. Sol menüden **APIs & Services > OAuth consent screen** sekmesine gidin.
2. Kullanıcı türü (User Type) olarak **External (Dış)** seçeneğini seçin ve **Create** butonuna basın.
3. Gelen formda zorunlu alanları doldurun:
   * **App name:** `Rclone` (veya istediğiniz bir isim)
   * **User support email:** Kendi e-posta adresiniz
   * Sayfanın en altına inip **Developer contact information** kısmına tekrar e-posta adresinizi yazın.
4. **Save and Continue** diyerek sonraki adımları tamamlayın ve panoya geri dönün.

---

## Adım 4: Client ID ve Client Secret Üretme

1. Sol menüden **APIs & Services > Credentials (Kimlik Bilgileri)** sekmesine gidin.
2. Üst kısımdaki **+ CREATE CREDENTIALS** butonuna tıklayın ve **OAuth client ID** seçeneğini seçin.
3. **Application type** olarak **Desktop app (Masaüstü uygulaması)** seçin.
4. Ad kısmına bir isim verin (örn: `Rclone Desktop`) ve **Create** butonuna basın.
5. Karşınıza çıkan ekranda beliren **Client ID** ve **Client Secret** değerlerini kopyalayıp güvenli bir yere not edin.

---

## Adım 5: Bu Bilgileri Rclone'a Tanımlama

1. Terminalde şu komutu çalıştırarak rclone ayarlarını açın:
   ```bash
   rclone config