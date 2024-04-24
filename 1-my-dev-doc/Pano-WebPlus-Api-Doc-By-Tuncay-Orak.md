
Panoram Web Api Doc By Tuncay Orak


- [Genel](#genel)
  - [Login](#login)
- [Sipariş](#sipariş)
  - [Sipariş Ekleme](#sipariş-ekleme)
- [Müşteri](#müşteri)
  - [Müşteri Ekleme](#müşteri-ekleme)
  - [Müşteri Okuma TxtErpKod](#müşteri-okuma-txterpkod)
  - [Müşteri Okuma Referans No ile](#müşteri-okuma-referans-no-ile)
- [Ürün - Stok](#ürün---stok)
  - [Ürün Listesi](#ürün-listesi)
  - [Ürün By Txtkod](#ürün-by-txtkod)
- [Fiyat](#fiyat)
  - [Fiyat Listesi](#fiyat-listesi)

# Genel

## Login

```xml
<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope" xmlns:int="http://integration.univera.com.tr">
    <soap:Header/>
    <soap:Body>
        <int:IntegrationLogin>
            <!--Optional:-->
            <int:strUserName>{{usr}}</int:strUserName>
            <!--Optional:-->
            <int:strPassWord>{{psr}}</int:strPassWord>
            <int:bytFirmaKod>{{panoFirmaKod}}</int:bytFirmaKod>
            <int:lngCalismaYili>{{panoCalismaYili}}</int:lngCalismaYili>
            <int:lngDistributorKod>{{panoLngDistKod}}</int:lngDistributorKod>
        </int:IntegrationLogin>
    </soap:Body>
</soap:Envelope>
```

# Sipariş

## Sipariş Ekleme

```xml
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
    <soap:Body>
        <IntegrationSendEntitySetWithLogin xmlns="http://integration.univera.com.tr">
            <strUserName>{{usr}}</strUserName>
            <strPassWord>{{psr}}</strPassWord>
            <bytFirmaKod>{{panoFirmaKod}}</bytFirmaKod>
            <lngCalismismaYili>{{panoCalismaYili}}</lngCalismaYili>
            <lngDistributorKod>{{panoLngDistKod}}</lngDistributorKod>
            <objPanIntEntityList>
                <SiparisGeneric>
                    <clsSiparisGeneric>
                        <!--sabit alanlar-->
                        <Stoktip>0</Stoktip>
                        <Tur>0</Tur>
                        <Belgetip>1</Belgetip>
                        <Durum>0</Durum>
                        <Kayittip>0</Kayittip>
                        <Yil>2021</Yil>
                        <FiyatHesaplamaTipi>Uygulama</FiyatHesaplamaTipi>
                        <BelgeDetayKod>0</BelgeDetayKod>
                        <BasimKod>0</BasimKod>
                        <Giristipi>8</Giristipi>
                        <Onay>1</Onay>
                        <BelgeSira>0</BelgeSira>
                        <Harekettip>15</Harekettip>
                        <LngDistKod>1</LngDistKod>
                        <Birimsira>1</Birimsira>
                        <!--Ayarlardan parametre olarak alalım Siparis ST Lng Kodu-->
                        <LngSTKod>67</LngSTKod>
                        <!--Ayarlardaki LngDepoKodu degerinden alalım-->
                        <DepoLngKod>96</DepoLngKod>
                        <!--degisken doldurulacak alanlar -->
                        <!--dış sistemdeki sipariş numarası,çakışmaması için burada ön ek kullanılmalı-->
                        <Referans>J25487954</Referans>
                        <!--0 peşin(nakit) 3 Kredi Kartı 4 Açık Hesap 7 Eft-->
                        <Odemetip>0</Odemetip>
                        <!-- Sipariş notunu buraya yazalım (max 500 karakter alır) -->
                        <Aciklama>[siparis_notu_gelecek] </Aciklama>
                        <!-- Buraya sipariş nosunu yazalım  -->
                        <Matbuno>[sip_no_gelecek]</Matbuno>
                        <Islemtarihi>2021-03-01T14:35:07.077</Islemtarihi>
                        <Sevktarihi>2021-03-01T14:35:07.077</Sevktarihi>
                        <!--Sipariş kalem indeksi-->
                        <Kalemsira>0</Kalemsira>
                        <MusteriKod>TS001</MusteriKod>
                        <Urunkod>H10101025</Urunkod>
                        <Miktar>15</Miktar>
                        <Birimfiyat>1</Birimfiyat>
                        <!--kalem iskontoları-->
                        <Isktutar1>3</Isktutar1>
                        <Isktutar2>0</Isktutar2>
                        <Isktutar3>0</Isktutar3>
                        <Isktutar4>0</Isktutar4>
                        <Isktutar5>0</Isktutar5>
                        <!--kalem isk tutar veya yüzde olarak verilebilir-->
                        <!--<Iskontoyuzde1>0</Iskontoyuzde1><Iskontoyuzde2>0</Iskontoyuzde2><Iskontoyuzde3>0</Iskontoyuzde3>-->                    
                    </clsSiparisGeneric>
                    <clsSiparisGeneric>
                        <!--sabit alanlar-->
                        <Stoktip>0</Stoktip>
                        <Tur>0</Tur>
                        <Belgetip>1</Belgetip>
                        <Durum>0</Durum>
                        <Kayittip>0</Kayittip>
                        <Yil>2021</Yil>
                        <FiyatHesaplamaTipi>Uygulama</FiyatHesaplamaTipi>
                        <BelgeDetayKod>0</BelgeDetayKod>
                        <BasimKod>0</BasimKod>
                        <Giristipi>8</Giristipi>
                        <Onay>1</Onay>
                        <BelgeSira>0</BelgeSira>
                        <Harekettip>15</Harekettip>
                        <LngSTKod>67</LngSTKod>
                        <LngDistKod>1</LngDistKod>
                        <Birimsira>1</Birimsira>
                        <!--degisken doldurulacak alanlar -->
                        <!--dış sistemdeki sipariş numarası-->
                        <Referans>J25487954</Referans>
                        <!--0 peşin(nakit) 3 Kredi Kartı 4 Açık Hesap 7 Eft-->
                        <Odemetip>0</Odemetip>
                        <!-- Sipariş notunu buraya yazalım (max 500 karakter alır) -->
                        <Aciklama>[siparis_notu_gelecek] </Aciklama>
                        <!-- Buraya sipariş nosunu yazalım  -->
                        <Matbuno>[sip_no_gelecek]</Matbuno>
                        <Islemtarihi>2021-03-01T14:35:07.077</Islemtarihi>
                        <Sevktarihi>2021-03-01T14:35:07.077</Sevktarihi>
                        <Kalemsira>1</Kalemsira>
                        <DepoLngKod>96</DepoLngKod>
                        <MusteriKod>TS001</MusteriKod>
                        <Urunkod>H10101025</Urunkod>
                        <Miktar>10</Miktar>
                        <Birimfiyat>1</Birimfiyat>
                        <!--kalem iskontoları-->
                        <Isktutar1>2</Isktutar1>
                        <Isktutar2>0</Isktutar2>
                        <Isktutar3>0</Isktutar3>
                        <Isktutar4>0</Isktutar4>
                        <Isktutar5>0</Isktutar5>
                        <!--kalem isk tutar veya yüzde olarak verilebilir-->
                        <!--<Iskontoyuzde1>10</Iskontoyuzde1><Iskontoyuzde2>0</Iskontoyuzde2><Iskontoyuzde3>0</Iskontoyuzde3>-->
                    </clsSiparisGeneric>
                </SiparisGeneric>
                <SatirBazliTransaction>false</SatirBazliTransaction>
                <LogKategori>0</LogKategori>
                <IntegrationGorevSonucTip xsi:nil="true" />
                <SCCall>false</SCCall>
                <!--true ise hata varsa detaylı gösterir -->
                <ReturnLoglist>false</ReturnLoglist>
                <StokSil>false</StokSil>
            </objPanIntEntityList>
        </IntegrationSendEntitySetWithLogin>
    </soap:Body>
</soap:Envelope>
```

# Müşteri

## Müşteri Ekleme

```xml
<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope" xmlns:int="http://integration.univera.com.tr">
    <soap:Header/>
    <soap:Body>
        <IntegrationSendEntitySetWithLogin xmlns="http://integration.univera.com.tr">
            <strUserName>{{usr}}</strUserName>
            <strPassWord>{{psr}}</strPassWord>
            <bytFirmaKod>1</bytFirmaKod>
            <lngCalismaYili>2021</lngCalismaYili>
            <lngDistributorKod>1</lngDistributorKod>
            <objPanIntEntityList>
                <Musteriler>
                    <clsMusteriIntegration>
                        <!--Sabit Alanlar-->
                        <!--LNGERPKOD (2 alanda)-->
                        <Kod>-1</Kod>
                        <ErpKod>-1</ErpKod>
                        <DistTextKod>1</DistTextKod>
                        <VadeGun>0</VadeGun>
                        <Tip>0</Tip>
                        <Rut>9</Rut>
                        <!-- Bunları ayarlardan alırsa daha iyi olur,bu entegrasyonu kullanan diger kişilerde farklı olabilir -->
                        <!-- Musteri Grup Referans Kodu  -->
                        <MusteriGrupReferans>ET</MusteriGrupReferans>
                        <MusteriEkGrupReferans>99</MusteriEkGrupReferans>
                        <!-- Değişken Alanlar -->
                        <!--Bizim sistemdeki müşteri kodu, burada ayar parametrelerin ön ek almalı mesela J gibi, müşteri kodu çakışmaması için -->
                        <ErpKod2>J2</ErpKod2>                        
                        <Referans>J2</Referans>
                        <Unvan>Müşteri Unvanı J2</Unvan>
                        <KisaAd>Müşteri Kısa Ad</KisaAd>
                        <!-- Buraya da müşterinin adını yazalım -->
                        <IlgiliKisi>İlgili Kişi</IlgiliKisi>
                        <Adres1>Adres1</Adres1>
                        <Adres2>Adres2</Adres2>
                        <Sehir>GAZİANTEP</Sehir>
                        <Ilce>ŞEHİTKAMİL</Ilce>
                        <!--<MerkezIlTextKod>GAZİANTEP</MerkezIlTextKod> -->
                        <MerkezIlKod>27</MerkezIlKod>
                        <!-- Telefonlar başına 0 konulmadan girilmeli -->
                        <CepTelNo>5334762145</CepTelNo>
                        <Telefon>3422354242</Telefon>
                        <EMail>example@example.com</EMail>
                        <!--1 Kdvden Muaf 2 gerçek 3 tüzel 4 Yabancı Uyruk-->
                        <KdvMuaf>2</KdvMuaf>
                        <VD>ŞEHİTKAMİL</VD>
                        <!-- Tüzel Kişiyse Girilir -->
                        <!-- <VN>7040024790</VN> -->                        
                        <!-- Gerçek Kişiyse Girilir -->
                        <TCKimlikNo>46591081486</TCKimlikNo>
                    </clsMusteriIntegration>
                </Musteriler>
            </objPanIntEntityList>
        </IntegrationSendEntitySetWithLogin>
    </soap:Body>
</soap:Envelope>

```

## Müşteri Okuma TxtErpKod

```xml
<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope">
   <soap:Header/>
   <soap:Body>
      <IntegrationGetEntitySetWithPacketLogin  xmlns="http://integration.univera.com.tr">
         <objPaketTanim>
            <clsPaketTanim>
              <Tabloadi>VIEWMUSTERIGENERIC</Tabloadi>
               <Viewadi>VIEWMUSTERIGENERIC</Viewadi>
               <Kriter>"TXTERPKOD = '{{musteriKod}}'"</Kriter>
            </clsPaketTanim>
         </objPaketTanim>
         <strUserName>{{usr}}</strUserName>
         <strPassWord>{{psr}}</strPassWord>
         <bytFirmaKod>1</bytFirmaKod>
         <lngCalismaYili>2020</lngCalismaYili>
         <lngDistributorKod>1</lngDistributorKod>
      </IntegrationGetEntitySetWithPacketLogin>
   </soap:Body>
</soap:Envelope>

```

## Müşteri Okuma Referans No ile

```xml
<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope">
   <soap:Header/>
   <soap:Body>
      <IntegrationGetEntitySetWithPacketLogin  xmlns="http://integration.univera.com.tr">
         <objPaketTanim>
            <clsPaketTanim>
              <Tabloadi>VIEWMUSTERIGENERIC</Tabloadi>
               <Viewadi>VIEWMUSTERIGENERIC</Viewadi>
               <Kriter>"TXTREFERANS = '{{referansKod}}'"</Kriter>
            </clsPaketTanim>
         </objPaketTanim>
         <strUserName>{{usr}}</strUserName>
         <strPassWord>{{psr}}</strPassWord>
         <bytFirmaKod>1</bytFirmaKod>
         <lngCalismaYili>2020</lngCalismaYili>
         <lngDistributorKod>1</lngDistributorKod>
      </IntegrationGetEntitySetWithPacketLogin>
   </soap:Body>
</soap:Envelope>

```

# Ürün - Stok

## Ürün Listesi

```xml

<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope" xmlns:int="http://integration.univera.com.tr">
   <soap:Header/>
   <soap:Body>
      <int:IntegrationGetEntitySetWithPacketLogin>
         <!--Optional:-->
         <int:objPaketTanim>
            <!--Zero or more repetitions:-->
            <int:clsPaketTanim>
              <!--Optional:VIEWURUNLERGENERIC-->
              <int:Tabloadi>VIEWURUNLERGENERIC</int:Tabloadi>
               <!--Optional:-->
               <int:Viewadi>VIEWURUNLERGENERIC</int:Viewadi>
               <int:Kriter>"BYTDURUM=0 AND TXTOZELKOD='{{txtOzelKod}}'"</int:Kriter>
            </int:clsPaketTanim>
         </int:objPaketTanim>
         <!--Optional:-->
         <int:strUserName>{{usr}}</int:strUserName>
         <!--Optional:-->
         <int:strPassWord>{{psr}}</int:strPassWord>
         <int:bytFirmaKod>1</int:bytFirmaKod>
         <int:lngCalismaYili>2020</int:lngCalismaYili>
         <int:lngDistributorKod>1</int:lngDistributorKod>
      </int:IntegrationGetEntitySetWithPacketLogin>
   </soap:Body>
</soap:Envelope>

```

## Ürün By Txtkod


```xml
<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope" xmlns:int="http://integration.univera.com.tr">
   <soap:Header/>
   <soap:Body>
      <int:IntegrationGetEntitySetWithPacketLogin>
         <!--Optional:-->
         <int:objPaketTanim>
            <!--Zero or more repetitions:-->
            <int:clsPaketTanim>
              <!--Optional:VIEWURUNLERGENERIC-->
              <int:Tabloadi>VIEWURUNLERGENERIC</int:Tabloadi>
               <!--Optional:-->
               <int:Viewadi>VIEWURUNLERGENERIC</int:Viewadi>
               <int:Kriter>"TXTKOD='{{panoTxtUrunKod}}'"</int:Kriter>
            </int:clsPaketTanim>
         </int:objPaketTanim>
         <!--Optional:-->
         <int:strUserName>{{usr}}</int:strUserName>
         <!--Optional:-->
         <int:strPassWord>{{psr}}</int:strPassWord>
         <int:bytFirmaKod>1</int:bytFirmaKod>
         <int:lngCalismaYili>2020</int:lngCalismaYili>
         <int:lngDistributorKod>1</int:lngDistributorKod>
      </int:IntegrationGetEntitySetWithPacketLogin>
   </soap:Body>
</soap:Envelope>

```

# Fiyat

## Fiyat Listesi

```xml
<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope" xmlns:int="http://integration.univera.com.tr">
   <soap:Header/>
   <soap:Body>
      <int:IntegrationGetEntitySetWithPacketLogin>
         <!--Optional:-->
         <int:objPaketTanim>
            <!--Zero or more repetitions:-->
            <int:clsPaketTanim>
              <!--Optional:-->
              <int:Tabloadi>VIEWFIYATVADEGENERIC</int:Tabloadi>
               <!--Optional:-->
               <int:Viewadi>VIEWFIYATVADEGENERIC</int:Viewadi>
               <int:Kriter>"TRHBITISTARIH &gt;= '{{currentDate}}' AND TRHBASLANGICTARIH &lt;='{{currentDate}}' 
               AND BYTDURUM = 0 
               AND BYTMUSTERIKRITERTIP = {{intMusTip}}
               AND ISNULL(TXTMUSTERIKRITER,'') = '{{strMusKri}}' "</int:Kriter>
            </int:clsPaketTanim>
         </int:objPaketTanim>
         <!--Optional:-->
         <int:strUserName>{{usr}}</int:strUserName>
         <!--Optional:-->
         <int:strPassWord>{{psr}}</int:strPassWord>
         <int:bytFirmaKod>1</int:bytFirmaKod>
         <int:lngCalismaYili>2022</int:lngCalismaYili>
         <int:lngDistributorKod>1</int:lngDistributorKod>
      </int:IntegrationGetEntitySetWithPacketLogin>
   </soap:Body>
</soap:Envelope>
```

