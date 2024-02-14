
- [chocolatey](#chocolatey)
- [cmd ilgili klasörde açma kısayolu](#cmd-ilgili-klasörde-açma-kısayolu)


# chocolatey

https://chocolatey.org/install adresine giriyoruz.

Kurulum için powershelli admin yetkisi ile başlaratak aşağıdaki komutu girmemiz yeterli olacaktır.

Set-ExecutionPolicy Bypass -Scope Process -Force; iex ((New-Object System.Net.WebClient).DownloadString('https://chocolatey.org/install.ps1'))
Kurulum işlemi tamamladıktan sonra yine powershell ekranında istediğimiz programı yüklemek için choco install (paket adı) yazmamız yeterli olacaktır. Örnedğin bir PDF reader olarak foxitreader uygulamasını kurmak istiyorsunuz aşağıdakii komutu yazmanız yeterli olacaktır.

choco install foxitreader

Peki ihtiyacınız olan programın install komutunu bilmiyorsanız ne olacak. Bu durumda https://chocolatey.org/packages bu adres üzerinden hem en çok kullanılan programları hemde arama bölümünü bulabilirsiniz. Arama satırına istediğiniz uygulama adını yazarsanız size kurulum iiçin yazmanız gereken komutu verecektir.

Peki kurulumlarınızı bitirdiniz aradan bir ay geçti ve bi kaç programın güncellemesi çıktı bunları update etmeniz gerekiyor yine komut satırını açarak cup all komutu ile cohoco ile yüklenmiş tüm uygulamaları zahmetsizce update edebilirsiniz.

Elinizdeki yüklü paketlerin listesini clist -l –idonly komutu ile alabilirsiniz ve yeni bir bilgisayarda choco install paket adlarını birer boşluk kullanarak hızlıca kurabilirsiniz.Chocolatey is software management automation

# cmd ilgili klasörde açma kısayolu

windows dosya explorer da adres çubuğuna cmd yazarsak, o klasörde terminali açar.