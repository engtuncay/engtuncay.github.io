
- [chocolatey](#chocolatey)
- [cmd ilgili klasörde açma kısayolu](#cmd-ilgili-klasörde-açma-kısayolu)
- [lokal dns yönlendirme yapma - ip yönlendirme](#lokal-dns-yönlendirme-yapma---ip-yönlendirme)


# chocolatey

- Kurulum dökümantasyon :  https://chocolatey.org/install 

- Kurulum için powershell'i admin yetkisi ile başlaratak aşağıdaki komutu girmemiz yeterli olacaktır.

```bash
Set-ExecutionPolicy Bypass -Scope Process -Force; iex ((New-Object System.Net.WebClient).DownloadString('https://chocolatey.org/install.ps1'))

```

Kurulum işlemi tamamladıktan sonra yine powershell ekranında istediğimiz programı yüklemek için choco install (paket adı) yazmamız yeterli olacaktır. Örnedğin bir PDF reader olarak foxitreader uygulamasını kurmak istiyorsunuz aşağıdakii komutu yazmanız yeterli olacaktır.

```bash
choco install foxitreader

```

Peki ihtiyacınız olan programın install komutunu bilmiyorsanız ne olacak. Bu durumda https://chocolatey.org/packages bu adres üzerinden hem en çok kullanılan programları hemde arama bölümünü bulabilirsiniz. Arama satırına istediğiniz uygulama adını yazarsanız size kurulum iiçin yazmanız gereken komutu verecektir.

Peki kurulumlarınızı bitirdiniz aradan bir ay geçti ve bi kaç programın güncellemesi çıktı bunları update etmeniz gerekiyor yine komut satırını açarak `cup all` komutu ile cohoco ile yüklenmiş tüm uygulamaları zahmetsizce update edebilirsiniz.

Elinizdeki yüklü paketlerin listesini `clist -l –idonly` komutu ile alabilirsiniz ve yeni bir bilgisayarda choco install paket adlarını birer boşluk kullanarak hızlıca kurabilirsiniz.Chocolatey is software management automation

# cmd ilgili klasörde açma kısayolu

windows dosya explorer da adres çubuğuna cmd yazarsak, o klasörde terminali açar.

# lokal dns yönlendirme yapma - ip yönlendirme

- kayıt etmek için 

```bash
netsh interface portproxy add v4tov4 listenport=80 listenaddress=127.27.27.10 connectport=8080 connectaddress=127.0.0.1

```

- kayıtları listelemek için

```bash
netsh interface portproxy show v4tov4

```

- kaydı silmek için

```bash
netsh interface portproxy delete v4tov4 listenport=80 listenaddress=127.27.27.10

```

