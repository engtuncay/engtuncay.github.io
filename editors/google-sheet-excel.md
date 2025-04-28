


İngilizce Formül | Türkçe Formül | Açıklama
----|---|---- |
=SUM(A1:A10) | =TOPLA(A1:A10) | Belirtilen aralıktaki sayıları toplar.
=AVERAGE(A1:A10) | =ORTALAMA(A1:A10) | Belirtilen aralıktaki sayıların ortalamasını alır.
=IF(A1>5, "Yes", "No") | =EĞER(A1>5;"Evet";"Hayır") | Belirli bir koşula göre seçim yapar.
=VLOOKUP(123, A2:B10, 2, FALSE) | =DÜŞEYARA(123;A2:B10;2;YANLIŞ) | Bir değeri tabloda dikey olarak arar.
=HLOOKUP(123, A2:Z2, 2, FALSE) | =YATAYARA(123;A2:Z2;2;YANLIŞ) | Bir değeri tabloda yatay olarak arar.
=COUNT(A1:A10) | =SAY(A1:A10) | Sayı içeren hücreleri sayar.
=COUNTA(A1:A10) | =BAĞ_DEĞER_SAY(A1:A10) | Dolu (boş olmayan) hücreleri sayar.
=LEN(A1) | =UZUNLUK(A1) | Hücredeki karakter sayısını verir.
=CONCATENATE(A1, B1) | =BİRLEŞTİR(A1;B1) | Hücreleri birleştirir.
=LEFT(A1,5) | =SOLDAN(A1;5) | Hücredeki metnin ilk 5 karakterini alır.
=RIGHT(A1,5) | =SAĞDAN(A1;5) | Hücredeki metnin son 5 karakterini alır.
=MID(A1,3,2) | =PARÇAAL(A1;3;2) | Hücredeki metinden belirli bir parçayı çeker.
=NOW() | =ŞİMDİ() | Geçerli tarih ve saati verir.
=TODAY() | =BUGÜN() | Bugünün tarihini verir.
=ROUND(A1,2) | =YUVARLA(A1;2) | Bir sayıyı belirli basamaklara yuvarlar.
=ISBLANK(A1) | =EBOŞSA(A1) | Hücre boş mu kontrol eder.
=ARRAYFORMULA(A1:A5*2) | =DİZİFORMÜLÜ(A1:A5*2) | Bir formülü tüm diziye uygular.
=SPLIT(A1,",") | =BÖL(A1;",") | Bir hücredeki veriyi belirli bir ayırıcıya göre böler.
=UNIQUE(A1:A10) | =TEKRARSIZ(A1:A10) | Benzersiz değerleri listeler.
=IMPORTRANGE("url","Sheet1!A1:B10") | =ARALIKİÇEAKTAR("url";"Sayfa1!A1:B10") | Başka bir Google Sheets dosyasından veri çeker.
=GOOGLETRANSLATE(A1,"en","tr") | =GOOGLEÇEVİRİ(A1;"en";"tr") | Hücredeki metni otomatik çevirir.
=FILTER(A1:B10,A1:A10>5) | =FİLTRE(A1:B10;A1:A10>5) | Belirli koşullara göre verileri filtreler.
=SORT(A1:B10, 1, TRUE) | =SIRALA(A1:B10; 1; DOĞRU) | Bir veri aralığını sıralar.