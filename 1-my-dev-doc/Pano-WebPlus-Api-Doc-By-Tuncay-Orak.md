
Panoram Web Api Doc By Tuncay Orak


- [Genel](#genel)
  - [Login](#login)
- [Sipariş](#sipariş)
  - [Sipariş Ekleme](#sipariş-ekleme)
  - [Sipariş Ekleme Örnek (Tüm Alanlar)](#sipariş-ekleme-örnek-tüm-alanlar)
- [Müşteri](#müşteri)
  - [Müşteri Ekleme](#müşteri-ekleme)
  - [Müşteri Okuma TxtErpKod](#müşteri-okuma-txterpkod)
  - [Müşteri Okuma Referans No ile](#müşteri-okuma-referans-no-ile)
- [Ürün - Stok](#ürün---stok)
  - [Ürün Listesi](#ürün-listesi)
  - [Ürün By Txtkod](#ürün-by-txtkod)
  - [Stok Miktarlar](#stok-miktarlar)
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

## Sipariş Ekleme Örnek (Tüm Alanlar)

```xml
<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope" xmlns:int="http://integration.univera.com.tr">
   <soap:Header/>
   <soap:Body>
      <int:IntegrationSendEntitySetWithLogin>
         <!--Optional:-->
         <int:strUserName>{{usr}}</int:strUserName>
         <!--Optional:-->
         <int:strPassWord>{{psr}}</int:strPassWord>
         <int:bytFirmaKod>1</int:bytFirmaKod>
         <int:lngCalismaYili>2020</int:lngCalismaYili>
         <int:lngDistributorKod>1</int:lngDistributorKod>
         <!--Optional:-->
         <int:objPanIntEntityList>
            <!--Optional:-->
            <int:objPaketTabloDetaylar>
               <!--Zero or more repetitions:-->
               <int:clsPaketTabloDetay>
                  <!--Optional:-->
                  <int:ChangesColumnNames>
                     <!--Zero or more repetitions:-->
                     <int:string>?</int:string>
                  </int:ChangesColumnNames>
                  <int:Paketkod>?</int:Paketkod>
                  <!--Optional:-->
                  <int:Kolonad>?</int:Kolonad>
                  <int:Inout>?</int:Inout>
                  <int:Sonislemtarihi>?</int:Sonislemtarihi>
                  <!--Optional:-->
                  <int:Sonislemhost>?</int:Sonislemhost>
               </int:clsPaketTabloDetay>
            </int:objPaketTabloDetaylar>
            <!--Optional:-->
            <int:BelgeGeneric>
               <!--Zero or more repetitions:-->
               <int:clsBelgeGeneric>
                  <!--Optional:-->
                  <int:ChangesColumnNames>
                     <!--Zero or more repetitions:-->
                     <int:string>?</int:string>
                  </int:ChangesColumnNames>
                  <!--Optional:-->
                  <int:Distkod>?</int:Distkod>
                  <!--Optional:-->
                  <int:DistReferans>?</int:DistReferans>
                  <int:Belgetip>?</int:Belgetip>
                  <int:Belgekod>?</int:Belgekod>
                  <int:Tur>?</int:Tur>
                  <!--Optional:-->
                  <int:Matbuno>?</int:Matbuno>
                  <int:Islemtarihi>?</int:Islemtarihi>
                  <int:IslemSaati>?</int:IslemSaati>
                  <!--Optional:-->
                  <int:Aciklama>?</int:Aciklama>
                  <!--Optional:-->
                  <int:Aciklama2>?</int:Aciklama2>
                  <int:Odemetip>?</int:Odemetip>
                  <int:Durum>?</int:Durum>
                  <int:Vadegunu>?</int:Vadegunu>
                  <int:Iskontoyuzde1>?</int:Iskontoyuzde1>
                  <int:Iskontoyuzde2>?</int:Iskontoyuzde2>
                  <int:Iskontoyuzde3>?</int:Iskontoyuzde3>
                  <int:KomisyonTutari>?</int:KomisyonTutari>
                  <int:Sevktarihi>?</int:Sevktarihi>
                  <int:SevkDurum>?</int:SevkDurum>
                  <int:Bruttutar>?</int:Bruttutar>
                  <int:Kdvtutari>?</int:Kdvtutari>
                  <int:Nettutar>?</int:Nettutar>
                  <int:Iskontotutari>?</int:Iskontotutari>
                  <int:Kalemsira>?</int:Kalemsira>
                  <!--Optional:-->
                  <int:Urunbirim>?</int:Urunbirim>
                  <!--Optional:-->
                  <int:Urunkod>?</int:Urunkod>
                  <!--Optional:-->
                  <int:UrunReferans>?</int:UrunReferans>
                  <int:Miktar>?</int:Miktar>
                  <int:Birimfiyat>?</int:Birimfiyat>
                  <int:Kayittip>?</int:Kayittip>
                  <int:Detaykdvoran>?</int:Detaykdvoran>
                  <int:Detaynetfiyat>?</int:Detaynetfiyat>
                  <int:Detayisktutar>?</int:Detayisktutar>
                  <int:DetayKomisyonTutari>?</int:DetayKomisyonTutari>
                  <int:Otv>?</int:Otv>
                  <int:Iskyuzde1>?</int:Iskyuzde1>
                  <int:Isktutar1>?</int:Isktutar1>
                  <int:Iskyuzde2>?</int:Iskyuzde2>
                  <int:Isktutar2>?</int:Isktutar2>
                  <int:Iskyuzde3>?</int:Iskyuzde3>
                  <int:Isktutar3>?</int:Isktutar3>
                  <int:Iskyuzde4>?</int:Iskyuzde4>
                  <int:Isktutar4>?</int:Isktutar4>
                  <int:Iskyuzde5>?</int:Iskyuzde5>
                  <int:Isktutar5>?</int:Isktutar5>
                  <int:Iskyuzde6>?</int:Iskyuzde6>
                  <int:Isktutar6>?</int:Isktutar6>
                  <int:Iskyuzde7>?</int:Iskyuzde7>
                  <int:Isktutar7>?</int:Isktutar7>
                  <int:Iskyuzde8>?</int:Iskyuzde8>
                  <int:Isktutar8>?</int:Isktutar8>
                  <int:Promosyonuruntutar>?</int:Promosyonuruntutar>
                  <int:PuanIskYuzde>?</int:PuanIskYuzde>
                  <int:Puantutar>?</int:Puantutar>
                  <int:BonusIskYuzde>?</int:BonusIskYuzde>
                  <int:Bonustutar>?</int:Bonustutar>
                  <!--Optional:-->
                  <int:Ozelkod>?</int:Ozelkod>
                  <int:Harekettip>?</int:Harekettip>
                  <int:Birimsira>?</int:Birimsira>
                  <!--Optional:-->
                  <int:Referans>?</int:Referans>
                  <int:Sevkmiktar>?</int:Sevkmiktar>
                  <int:Kalanmiktar>?</int:Kalanmiktar>
                  <!--Optional:-->
                  <int:Detayozelkod>?</int:Detayozelkod>
                  <int:OTVTutar>?</int:OTVTutar>
                  <!--Optional:-->
                  <int:SeriBaslangic>?</int:SeriBaslangic>
                  <!--Optional:-->
                  <int:SeriBitis>?</int:SeriBitis>
                  <int:Ilkislemtarihi>?</int:Ilkislemtarihi>
                  <int:Sonislemtarihi>?</int:Sonislemtarihi>
                  <int:FiyatHesaplamaTipi>?</int:FiyatHesaplamaTipi>
                  <int:Yil>?</int:Yil>
                  <int:LngDistKod>?</int:LngDistKod>
                  <!--Optional:-->
                  <int:Stkod>?</int:Stkod>
                  <!--Optional:-->
                  <int:StReferans>?</int:StReferans>
                  <int:BelgeDetayKod>?</int:BelgeDetayKod>
                  <int:AcikKapali>?</int:AcikKapali>
                  <int:LngSTKod>?</int:LngSTKod>
                  <int:LngMusteri>?</int:LngMusteri>
                  <!--Optional:-->
                  <int:MusteriKod>?</int:MusteriKod>
                  <!--Optional:-->
                  <int:MerkezMusteriKod>?</int:MerkezMusteriKod>
                  <!--Optional:-->
                  <int:MusteriReferans>?</int:MusteriReferans>
                  <!--Optional:-->
                  <int:SiparisMusteriKod>?</int:SiparisMusteriKod>
                  <!--Optional:-->
                  <int:IrsaliyeMusteriKod>?</int:IrsaliyeMusteriKod>
                  <int:BasimKod>?</int:BasimKod>
                  <int:Ayristirildi>?</int:Ayristirildi>
                  <int:UrunCesitSayisi>?</int:UrunCesitSayisi>
                  <int:VadeTarihi>?</int:VadeTarihi>
                  <int:Cevrim>?</int:Cevrim>
                  <int:KdvOrani>?</int:KdvOrani>
                  <int:DetayUrun>?</int:DetayUrun>
                  <int:Stoktip>?</int:Stoktip>
                  <!--Optional:-->
                  <int:DepoKod>?</int:DepoKod>
                  <int:DepoLngKod>?</int:DepoLngKod>
                  <!--Optional:-->
                  <int:Depoad>?</int:Depoad>
                  <!--Optional:-->
                  <int:DepoReferans>?</int:DepoReferans>
                  <int:Urunkod2>?</int:Urunkod2>
                  <int:Irsaliyekod>?</int:Irsaliyekod>
                  <int:Giristipi>?</int:Giristipi>
                  <int:Detayuruncevrim>?</int:Detayuruncevrim>
                  <int:Onay>?</int:Onay>
                  <int:IlkKullaniciKod>?</int:IlkKullaniciKod>
                  <int:SonKullaniciKod>?</int:SonKullaniciKod>
                  <int:IadeNedeni>?</int:IadeNedeni>
                  <int:DetayIadeNedeni>?</int:DetayIadeNedeni>
                  <int:IptalNedeni>?</int:IptalNedeni>
                  <int:MalTalepKod>?</int:MalTalepKod>
                  <int:SiparisKod>?</int:SiparisKod>
                  <int:BankaHesapKod>?</int:BankaHesapKod>
                  <int:BankaKod>?</int:BankaKod>
                  <int:IsAkisKod>?</int:IsAkisKod>
                  <!--Optional:-->
                  <int:TicariIslemGrupKod>?</int:TicariIslemGrupKod>
                  <int:YuklemeKod>?</int:YuklemeKod>
                  <int:AracKodu>?</int:AracKodu>
                  <!--Optional:-->
                  <int:Plaka>?</int:Plaka>
                  <!--Optional:-->
                  <int:AdSoyad>?</int:AdSoyad>
                  <!--Optional:-->
                  <int:Soforad>?</int:Soforad>
                  <!--Optional:-->
                  <int:Muavin>?</int:Muavin>
                  <int:DistTedarikciMusteri>?</int:DistTedarikciMusteri>
                  <int:IskProHesapTipi>?</int:IskProHesapTipi>
                  <!--Optional:-->
                  <int:MusteriGrup>?</int:MusteriGrup>
                  <!--Optional:-->
                  <int:IadeNedeniAck>?</int:IadeNedeniAck>
                  <!--Optional:-->
                  <int:IlgiliKisi2>?</int:IlgiliKisi2>
                  <int:TevkifatKdv>?</int:TevkifatKdv>
                  <int:TevkifatToplam>?</int:TevkifatToplam>
                  <!--Optional:-->
                  <int:BelgeUrunkod>?</int:BelgeUrunkod>
                  <!--Optional:-->
                  <int:SeriLot>?</int:SeriLot>
                  <!--Optional:-->
                  <int:IrsaliyeReferansKod>?</int:IrsaliyeReferansKod>
                  <!--Optional:-->
                  <int:TCPOzelkod>?</int:TCPOzelkod>
                  <int:GecSevkIptalNeden>?</int:GecSevkIptalNeden>
                  <int:EBelge>?</int:EBelge>
                  <!--Optional:-->
                  <int:DetayAciklama>?</int:DetayAciklama>
                  <!--Optional:-->
                  <int:SiparisReferansKodlari>?</int:SiparisReferansKodlari>
                  <int:BelgeSira>?</int:BelgeSira>
                  <!--Optional:-->
                  <int:IrsaliyeMatbuNo>?</int:IrsaliyeMatbuNo>
                  <int:IrsaliyeTarihi>?</int:IrsaliyeTarihi>
                  <!--Optional:-->
                  <int:UrunTcpKod>?</int:UrunTcpKod>
                  <int:SatisTip>?</int:SatisTip>
                  <int:BayiKod>?</int:BayiKod>
                  <!--Optional:-->
                  <int:MusteriPlaka>?</int:MusteriPlaka>
                  <int:BelgeDovizKur>?</int:BelgeDovizKur>
                  <!--Optional:-->
                  <int:BelgeParabirimi>?</int:BelgeParabirimi>
                  <int:SatirDovizKur>?</int:SatirDovizKur>
                  <!--Optional:-->
                  <int:SatirParabirimi>?</int:SatirParabirimi>
                  <int:DovizliBirimFiyat>?</int:DovizliBirimFiyat>
                  <!--Optional:-->
                  <int:UrunTxtKod2>?</int:UrunTxtKod2>
                  <int:DetayOtl>?</int:DetayOtl>
                  <int:MusterisevkAdresKod>?</int:MusterisevkAdresKod>
                  <int:KomisyonOrani>?</int:KomisyonOrani>
                  <!--Optional:-->
                  <int:UreticiKodu>?</int:UreticiKodu>
                  <int:DepoHareketTip>?</int:DepoHareketTip>
                  <!--Optional:-->
                  <int:SevkAdresi>?</int:SevkAdresi>
                  <int:DistVadeGunFarki>?</int:DistVadeGunFarki>
                  <int:DetayVadeFarki>?</int:DetayVadeFarki>
                  <int:HediyeUrunSira>?</int:HediyeUrunSira>
                  <!--Optional:-->
                  <int:KombinasyonMerkezKod>?</int:KombinasyonMerkezKod>
                  <int:SiparisYil>?</int:SiparisYil>
                  <int:ExternalAktarim>?</int:ExternalAktarim>
                  <int:AlisFaturaKod>?</int:AlisFaturaKod>
                  <!--Optional:-->
                  <int:EArsivUUID>?</int:EArsivUUID>
                  <!--Optional:-->
                  <int:EArsivNo>?</int:EArsivNo>
                  <int:EArsiv>?</int:EArsiv>
                  <int:EBelgeDurum>?</int:EBelgeDurum>
                  <int:Gekap2>?</int:Gekap2>
                  <int:IskontoUygulansinmi>?</int:IskontoUygulansinmi>
                  <!--Optional:-->
                  <int:SeriAralik>
                     <!--Zero or more repetitions:-->
                     <int:clsERUrunSeriAralik>
                        <int:Urunkod>?</int:Urunkod>
                        <int:SeriBas>?</int:SeriBas>
                        <int:SeriSon>?</int:SeriSon>
                        <!--Optional:-->
                        <int:SeriBas_Str>?</int:SeriBas_Str>
                        <!--Optional:-->
                        <int:SeriSon_Str>?</int:SeriSon_Str>
                        <int:KalemSira>?</int:KalemSira>
                        <int:SatisDurum>?</int:SatisDurum>
                        <!--Optional:-->
                        <int:EkKod>?</int:EkKod>
                        <int:KontrolDurum>?</int:KontrolDurum>
                        <!--Optional:-->
                        <int:TalepNeden>?</int:TalepNeden>
                        <int:EkrandanGeldi>?</int:EkrandanGeldi>
                        <int:StatuKod>?</int:StatuKod>
                        <!--Optional:-->
                        <int:MotorNo>?</int:MotorNo>
                        <!--Optional:-->
                        <int:MotorUrunKodu>?</int:MotorUrunKodu>
                        <int:MotorUrunKod>?</int:MotorUrunKod>
                        <int:SeriSira>?</int:SeriSira>
                        <!--Optional:-->
                        <int:UreticiSeriNo>?</int:UreticiSeriNo>
                     </int:clsERUrunSeriAralik>
                  </int:SeriAralik>
                  <int:IsBildirimOlussunMu>?</int:IsBildirimOlussunMu>
                  <!--Optional:-->
                  <int:SbOperasyonTipi>?</int:SbOperasyonTipi>
                  <!--Optional:-->
                  <int:SiparisDetayEk>
                     <!--Optional:-->
                     <int:ChangesColumnNames>
                        <!--Zero or more repetitions:-->
                        <int:string>?</int:string>
                     </int:ChangesColumnNames>
                     <int:KalemSira>?</int:KalemSira>
                     <int:Kod>?</int:Kod>
                     <int:Siparisdetaykod>?</int:Siparisdetaykod>
                     <!--Optional:-->
                     <int:Marka>?</int:Marka>
                     <int:Kalinlik1>?</int:Kalinlik1>
                     <int:Kalinlik2>?</int:Kalinlik2>
                     <int:Kalinlik3>?</int:Kalinlik3>
                     <int:Ilkislemtarihi>?</int:Ilkislemtarihi>
                     <int:Ilkkullanicikod>?</int:Ilkkullanicikod>
                     <int:Sonislemtarihi>?</int:Sonislemtarihi>
                     <int:Sonkullanicikod>?</int:Sonkullanicikod>
                     <!--Optional:-->
                     <int:KayitTip>?</int:KayitTip>
                     <int:GBelgeTarihi>?</int:GBelgeTarihi>
                     <!--Optional:-->
                     <int:GBelgeNo>?</int:GBelgeNo>
                     <!--Optional:-->
                     <int:NihaiMusteri>?</int:NihaiMusteri>
                  </int:SiparisDetayEk>
                  <int:MusteriAracKod>?</int:MusteriAracKod>
                  <int:MusteriAracKilometre>?</int:MusteriAracKilometre>
                  <int:DetaySiparisKod>?</int:DetaySiparisKod>
                  <int:TeslimTarihi>?</int:TeslimTarihi>
                  <int:NakliyeTarihi>?</int:NakliyeTarihi>
                  <int:SCBelgeNum>?</int:SCBelgeNum>
                  <int:KismiSevkBakiye>?</int:KismiSevkBakiye>
                  <int:OTVYuzde>?</int:OTVYuzde>
                  <int:VadeFarki>?</int:VadeFarki>
                  <!--Optional:-->
                  <int:SiparisEskiUrunKod>?</int:SiparisEskiUrunKod>
                  <!--Optional:-->
                  <int:UygulanacakIskKodlar>?</int:UygulanacakIskKodlar>
                  <!--Optional:-->
                  <int:SecimliIskProList>
                     <!--Zero or more repetitions:-->
                     <int:clsSecimliIskPro>
                        <int:IskProKod>?</int:IskProKod>
                        <int:KademeSira>?</int:KademeSira>
                        <int:HediyeSira>?</int:HediyeSira>
                        <!--Optional:-->
                        <int:UrunList>
                           <!--Zero or more repetitions:-->
                           <int:clsSecimliIskProGrup>
                              <int:UrunKod>?</int:UrunKod>
                              <!--Optional:-->
                              <int:UrunTxtKod>?</int:UrunTxtKod>
                              <int:Miktar>?</int:Miktar>
                           </int:clsSecimliIskProGrup>
                        </int:UrunList>
                     </int:clsSecimliIskPro>
                  </int:SecimliIskProList>
                  <!--Optional:-->
                  <int:IhaleNo>?</int:IhaleNo>
                  <int:SavingGroupCode>?</int:SavingGroupCode>
               </int:clsBelgeGeneric>
            </int:BelgeGeneric>
            <!--Optional:-->
            <int:SiparisGeneric>
               <!--Zero or more repetitions:-->
               <int:clsSiparisGeneric>
                  <!--Optional:-->
                  <int:ChangesColumnNames>
                     <!--Zero or more repetitions:-->
                     <int:string>?</int:string>
                  </int:ChangesColumnNames>
                  <!--Optional:-->
                  <int:Distkod>?</int:Distkod>
                  <!--Optional:-->
                  <int:DistReferans>?</int:DistReferans>
                  <int:Belgetip>?</int:Belgetip>
                  <int:Belgekod>?</int:Belgekod>
                  <int:Tur>?</int:Tur>
                  <!--Optional:-->
                  <int:Matbuno>?</int:Matbuno>
                  <int:Islemtarihi>?</int:Islemtarihi>
                  <int:IslemSaati>?</int:IslemSaati>
                  <!--Optional:-->
                  <int:Aciklama>?</int:Aciklama>
                  <!--Optional:-->
                  <int:Aciklama2>?</int:Aciklama2>
                  <int:Odemetip>?</int:Odemetip>
                  <int:Durum>?</int:Durum>
                  <int:Vadegunu>?</int:Vadegunu>
                  <int:Iskontoyuzde1>?</int:Iskontoyuzde1>
                  <int:Iskontoyuzde2>?</int:Iskontoyuzde2>
                  <int:Iskontoyuzde3>?</int:Iskontoyuzde3>
                  <int:KomisyonTutari>?</int:KomisyonTutari>
                  <int:Sevktarihi>?</int:Sevktarihi>
                  <int:SevkDurum>?</int:SevkDurum>
                  <int:Bruttutar>?</int:Bruttutar>
                  <int:Kdvtutari>?</int:Kdvtutari>
                  <int:Nettutar>?</int:Nettutar>
                  <int:Iskontotutari>?</int:Iskontotutari>
                  <int:Kalemsira>?</int:Kalemsira>
                  <!--Optional:-->
                  <int:Urunbirim>?</int:Urunbirim>
                  <!--Optional:-->
                  <int:Urunkod>?</int:Urunkod>
                  <!--Optional:-->
                  <int:UrunReferans>?</int:UrunReferans>
                  <int:Miktar>?</int:Miktar>
                  <int:Birimfiyat>?</int:Birimfiyat>
                  <int:Kayittip>?</int:Kayittip>
                  <int:Detaykdvoran>?</int:Detaykdvoran>
                  <int:Detaynetfiyat>?</int:Detaynetfiyat>
                  <int:Detayisktutar>?</int:Detayisktutar>
                  <int:DetayKomisyonTutari>?</int:DetayKomisyonTutari>
                  <int:Otv>?</int:Otv>
                  <int:Iskyuzde1>?</int:Iskyuzde1>
                  <int:Isktutar1>?</int:Isktutar1>
                  <int:Iskyuzde2>?</int:Iskyuzde2>
                  <int:Isktutar2>?</int:Isktutar2>
                  <int:Iskyuzde3>?</int:Iskyuzde3>
                  <int:Isktutar3>?</int:Isktutar3>
                  <int:Iskyuzde4>?</int:Iskyuzde4>
                  <int:Isktutar4>?</int:Isktutar4>
                  <int:Iskyuzde5>?</int:Iskyuzde5>
                  <int:Isktutar5>?</int:Isktutar5>
                  <int:Iskyuzde6>?</int:Iskyuzde6>
                  <int:Isktutar6>?</int:Isktutar6>
                  <int:Iskyuzde7>?</int:Iskyuzde7>
                  <int:Isktutar7>?</int:Isktutar7>
                  <int:Iskyuzde8>?</int:Iskyuzde8>
                  <int:Isktutar8>?</int:Isktutar8>
                  <int:Promosyonuruntutar>?</int:Promosyonuruntutar>
                  <int:PuanIskYuzde>?</int:PuanIskYuzde>
                  <int:Puantutar>?</int:Puantutar>
                  <int:BonusIskYuzde>?</int:BonusIskYuzde>
                  <int:Bonustutar>?</int:Bonustutar>
                  <!--Optional:-->
                  <int:Ozelkod>?</int:Ozelkod>
                  <int:Harekettip>?</int:Harekettip>
                  <int:Birimsira>?</int:Birimsira>
                  <!--Optional:-->
                  <int:Referans>?</int:Referans>
                  <int:Sevkmiktar>?</int:Sevkmiktar>
                  <int:Kalanmiktar>?</int:Kalanmiktar>
                  <!--Optional:-->
                  <int:Detayozelkod>?</int:Detayozelkod>
                  <int:OTVTutar>?</int:OTVTutar>
                  <!--Optional:-->
                  <int:SeriBaslangic>?</int:SeriBaslangic>
                  <!--Optional:-->
                  <int:SeriBitis>?</int:SeriBitis>
                  <int:Ilkislemtarihi>?</int:Ilkislemtarihi>
                  <int:Sonislemtarihi>?</int:Sonislemtarihi>
                  <int:FiyatHesaplamaTipi>?</int:FiyatHesaplamaTipi>
                  <int:Yil>?</int:Yil>
                  <int:LngDistKod>?</int:LngDistKod>
                  <!--Optional:-->
                  <int:Stkod>?</int:Stkod>
                  <!--Optional:-->
                  <int:StReferans>?</int:StReferans>
                  <int:BelgeDetayKod>?</int:BelgeDetayKod>
                  <int:AcikKapali>?</int:AcikKapali>
                  <int:LngSTKod>?</int:LngSTKod>
                  <int:LngMusteri>?</int:LngMusteri>
                  <!--Optional:-->
                  <int:MusteriKod>?</int:MusteriKod>
                  <!--Optional:-->
                  <int:MerkezMusteriKod>?</int:MerkezMusteriKod>
                  <!--Optional:-->
                  <int:MusteriReferans>?</int:MusteriReferans>
                  <!--Optional:-->
                  <int:SiparisMusteriKod>?</int:SiparisMusteriKod>
                  <!--Optional:-->
                  <int:IrsaliyeMusteriKod>?</int:IrsaliyeMusteriKod>
                  <int:BasimKod>?</int:BasimKod>
                  <int:Ayristirildi>?</int:Ayristirildi>
                  <int:UrunCesitSayisi>?</int:UrunCesitSayisi>
                  <int:VadeTarihi>?</int:VadeTarihi>
                  <int:Cevrim>?</int:Cevrim>
                  <int:KdvOrani>?</int:KdvOrani>
                  <int:DetayUrun>?</int:DetayUrun>
                  <int:Stoktip>?</int:Stoktip>
                  <!--Optional:-->
                  <int:DepoKod>?</int:DepoKod>
                  <int:DepoLngKod>?</int:DepoLngKod>
                  <!--Optional:-->
                  <int:Depoad>?</int:Depoad>
                  <!--Optional:-->
                  <int:DepoReferans>?</int:DepoReferans>
                  <int:Urunkod2>?</int:Urunkod2>
                  <int:Irsaliyekod>?</int:Irsaliyekod>
                  <int:Giristipi>?</int:Giristipi>
                  <int:Detayuruncevrim>?</int:Detayuruncevrim>
                  <int:Onay>?</int:Onay>
                  <int:IlkKullaniciKod>?</int:IlkKullaniciKod>
                  <int:SonKullaniciKod>?</int:SonKullaniciKod>
                  <int:IadeNedeni>?</int:IadeNedeni>
                  <int:DetayIadeNedeni>?</int:DetayIadeNedeni>
                  <int:IptalNedeni>?</int:IptalNedeni>
                  <int:MalTalepKod>?</int:MalTalepKod>
                  <int:SiparisKod>?</int:SiparisKod>
                  <int:BankaHesapKod>?</int:BankaHesapKod>
                  <int:BankaKod>?</int:BankaKod>
                  <int:IsAkisKod>?</int:IsAkisKod>
                  <!--Optional:-->
                  <int:TicariIslemGrupKod>?</int:TicariIslemGrupKod>
                  <int:YuklemeKod>?</int:YuklemeKod>
                  <int:AracKodu>?</int:AracKodu>
                  <!--Optional:-->
                  <int:Plaka>?</int:Plaka>
                  <!--Optional:-->
                  <int:AdSoyad>?</int:AdSoyad>
                  <!--Optional:-->
                  <int:Soforad>?</int:Soforad>
                  <!--Optional:-->
                  <int:Muavin>?</int:Muavin>
                  <int:DistTedarikciMusteri>?</int:DistTedarikciMusteri>
                  <int:IskProHesapTipi>?</int:IskProHesapTipi>
                  <!--Optional:-->
                  <int:MusteriGrup>?</int:MusteriGrup>
                  <!--Optional:-->
                  <int:IadeNedeniAck>?</int:IadeNedeniAck>
                  <!--Optional:-->
                  <int:IlgiliKisi2>?</int:IlgiliKisi2>
                  <int:TevkifatKdv>?</int:TevkifatKdv>
                  <int:TevkifatToplam>?</int:TevkifatToplam>
                  <!--Optional:-->
                  <int:BelgeUrunkod>?</int:BelgeUrunkod>
                  <!--Optional:-->
                  <int:SeriLot>?</int:SeriLot>
                  <!--Optional:-->
                  <int:IrsaliyeReferansKod>?</int:IrsaliyeReferansKod>
                  <!--Optional:-->
                  <int:TCPOzelkod>?</int:TCPOzelkod>
                  <int:GecSevkIptalNeden>?</int:GecSevkIptalNeden>
                  <int:EBelge>?</int:EBelge>
                  <!--Optional:-->
                  <int:DetayAciklama>?</int:DetayAciklama>
                  <!--Optional:-->
                  <int:SiparisReferansKodlari>?</int:SiparisReferansKodlari>
                  <int:BelgeSira>?</int:BelgeSira>
                  <!--Optional:-->
                  <int:IrsaliyeMatbuNo>?</int:IrsaliyeMatbuNo>
                  <int:IrsaliyeTarihi>?</int:IrsaliyeTarihi>
                  <!--Optional:-->
                  <int:UrunTcpKod>?</int:UrunTcpKod>
                  <int:SatisTip>?</int:SatisTip>
                  <int:BayiKod>?</int:BayiKod>
                  <!--Optional:-->
                  <int:MusteriPlaka>?</int:MusteriPlaka>
                  <int:BelgeDovizKur>?</int:BelgeDovizKur>
                  <!--Optional:-->
                  <int:BelgeParabirimi>?</int:BelgeParabirimi>
                  <int:SatirDovizKur>?</int:SatirDovizKur>
                  <!--Optional:-->
                  <int:SatirParabirimi>?</int:SatirParabirimi>
                  <int:DovizliBirimFiyat>?</int:DovizliBirimFiyat>
                  <!--Optional:-->
                  <int:UrunTxtKod2>?</int:UrunTxtKod2>
                  <int:DetayOtl>?</int:DetayOtl>
                  <int:MusterisevkAdresKod>?</int:MusterisevkAdresKod>
                  <int:KomisyonOrani>?</int:KomisyonOrani>
                  <!--Optional:-->
                  <int:UreticiKodu>?</int:UreticiKodu>
                  <int:DepoHareketTip>?</int:DepoHareketTip>
                  <!--Optional:-->
                  <int:SevkAdresi>?</int:SevkAdresi>
                  <int:DistVadeGunFarki>?</int:DistVadeGunFarki>
                  <int:DetayVadeFarki>?</int:DetayVadeFarki>
                  <int:HediyeUrunSira>?</int:HediyeUrunSira>
                  <!--Optional:-->
                  <int:KombinasyonMerkezKod>?</int:KombinasyonMerkezKod>
                  <int:SiparisYil>?</int:SiparisYil>
                  <int:ExternalAktarim>?</int:ExternalAktarim>
                  <int:AlisFaturaKod>?</int:AlisFaturaKod>
                  <!--Optional:-->
                  <int:EArsivUUID>?</int:EArsivUUID>
                  <!--Optional:-->
                  <int:EArsivNo>?</int:EArsivNo>
                  <int:EArsiv>?</int:EArsiv>
                  <int:EBelgeDurum>?</int:EBelgeDurum>
                  <int:Gekap2>?</int:Gekap2>
                  <int:IskontoUygulansinmi>?</int:IskontoUygulansinmi>
                  <!--Optional:-->
                  <int:SeriAralik>
                     <!--Zero or more repetitions:-->
                     <int:clsERUrunSeriAralik>
                        <int:Urunkod>?</int:Urunkod>
                        <int:SeriBas>?</int:SeriBas>
                        <int:SeriSon>?</int:SeriSon>
                        <!--Optional:-->
                        <int:SeriBas_Str>?</int:SeriBas_Str>
                        <!--Optional:-->
                        <int:SeriSon_Str>?</int:SeriSon_Str>
                        <int:KalemSira>?</int:KalemSira>
                        <int:SatisDurum>?</int:SatisDurum>
                        <!--Optional:-->
                        <int:EkKod>?</int:EkKod>
                        <int:KontrolDurum>?</int:KontrolDurum>
                        <!--Optional:-->
                        <int:TalepNeden>?</int:TalepNeden>
                        <int:EkrandanGeldi>?</int:EkrandanGeldi>
                        <int:StatuKod>?</int:StatuKod>
                        <!--Optional:-->
                        <int:MotorNo>?</int:MotorNo>
                        <!--Optional:-->
                        <int:MotorUrunKodu>?</int:MotorUrunKodu>
                        <int:MotorUrunKod>?</int:MotorUrunKod>
                        <int:SeriSira>?</int:SeriSira>
                        <!--Optional:-->
                        <int:UreticiSeriNo>?</int:UreticiSeriNo>
                     </int:clsERUrunSeriAralik>
                  </int:SeriAralik>
                  <int:IsBildirimOlussunMu>?</int:IsBildirimOlussunMu>
                  <!--Optional:-->
                  <int:SbOperasyonTipi>?</int:SbOperasyonTipi>
                  <!--Optional:-->
                  <int:SiparisDetayEk>
                     <!--Optional:-->
                     <int:ChangesColumnNames>
                        <!--Zero or more repetitions:-->
                        <int:string>?</int:string>
                     </int:ChangesColumnNames>
                     <int:KalemSira>?</int:KalemSira>
                     <int:Kod>?</int:Kod>
                     <int:Siparisdetaykod>?</int:Siparisdetaykod>
                     <!--Optional:-->
                     <int:Marka>?</int:Marka>
                     <int:Kalinlik1>?</int:Kalinlik1>
                     <int:Kalinlik2>?</int:Kalinlik2>
                     <int:Kalinlik3>?</int:Kalinlik3>
                     <int:Ilkislemtarihi>?</int:Ilkislemtarihi>
                     <int:Ilkkullanicikod>?</int:Ilkkullanicikod>
                     <int:Sonislemtarihi>?</int:Sonislemtarihi>
                     <int:Sonkullanicikod>?</int:Sonkullanicikod>
                     <!--Optional:-->
                     <int:KayitTip>?</int:KayitTip>
                     <int:GBelgeTarihi>?</int:GBelgeTarihi>
                     <!--Optional:-->
                     <int:GBelgeNo>?</int:GBelgeNo>
                     <!--Optional:-->
                     <int:NihaiMusteri>?</int:NihaiMusteri>
                  </int:SiparisDetayEk>
                  <int:MusteriAracKod>?</int:MusteriAracKod>
                  <int:MusteriAracKilometre>?</int:MusteriAracKilometre>
                  <int:DetaySiparisKod>?</int:DetaySiparisKod>
                  <int:TeslimTarihi>?</int:TeslimTarihi>
                  <int:NakliyeTarihi>?</int:NakliyeTarihi>
                  <int:SCBelgeNum>?</int:SCBelgeNum>
                  <int:KismiSevkBakiye>?</int:KismiSevkBakiye>
                  <int:OTVYuzde>?</int:OTVYuzde>
                  <int:VadeFarki>?</int:VadeFarki>
                  <!--Optional:-->
                  <int:SiparisEskiUrunKod>?</int:SiparisEskiUrunKod>
                  <!--Optional:-->
                  <int:UygulanacakIskKodlar>?</int:UygulanacakIskKodlar>
                  <!--Optional:-->
                  <int:SecimliIskProList>
                     <!--Zero or more repetitions:-->
                     <int:clsSecimliIskPro>
                        <int:IskProKod>?</int:IskProKod>
                        <int:KademeSira>?</int:KademeSira>
                        <int:HediyeSira>?</int:HediyeSira>
                        <!--Optional:-->
                        <int:UrunList>
                           <!--Zero or more repetitions:-->
                           <int:clsSecimliIskProGrup>
                              <int:UrunKod>?</int:UrunKod>
                              <!--Optional:-->
                              <int:UrunTxtKod>?</int:UrunTxtKod>
                              <int:Miktar>?</int:Miktar>
                           </int:clsSecimliIskProGrup>
                        </int:UrunList>
                     </int:clsSecimliIskPro>
                  </int:SecimliIskProList>
                  <!--Optional:-->
                  <int:IhaleNo>?</int:IhaleNo>
                  <int:SavingGroupCode>?</int:SavingGroupCode>
                  <int:AnaSipariskod>?</int:AnaSipariskod>
                  <!--Optional:-->
                  <int:SevkAdresAciklama>?</int:SevkAdresAciklama>
                  <!--Optional:-->
                  <int:SevkAdres1>?</int:SevkAdres1>
                  <!--Optional:-->
                  <int:SevkAdres2>?</int:SevkAdres2>
                  <int:SevkIlKod>?</int:SevkIlKod>
                  <!--Optional:-->
                  <int:SevkSehir>?</int:SevkSehir>
                  <int:SevkIlceKod>?</int:SevkIlceKod>
                  <!--Optional:-->
                  <int:SevkIlce>?</int:SevkIlce>
                  <!--Optional:-->
                  <int:SevkSemt>?</int:SevkSemt>
                  <!--Optional:-->
                  <int:SevkCadde>?</int:SevkCadde>
                  <!--Optional:-->
                  <int:SevkKapiNo>?</int:SevkKapiNo>
                  <!--Optional:-->
                  <int:SevkTelefon>?</int:SevkTelefon>
                  <!--Optional:-->
                  <int:BayiTextKod>?</int:BayiTextKod>
                  <!--Optional:-->
                  <int:BayiUnvan>?</int:BayiUnvan>
                  <!--Optional:-->
                  <int:OzelUrunKod>?</int:OzelUrunKod>
                  <int:OpsiyonMerkezKod>?</int:OpsiyonMerkezKod>
                  <!--Optional:-->
                  <int:VerilenSiparisTip>?</int:VerilenSiparisTip>
                  <int:TamTeslimat>?</int:TamTeslimat>
                  <int:SevkiyatTipKod>?</int:SevkiyatTipKod>
               </int:clsSiparisGeneric>
            </int:SiparisGeneric>
            <int:SatirBazliTransaction>?</int:SatirBazliTransaction>
            <int:LogKategori>?</int:LogKategori>
            <int:IntegrationGorevSonucTip>?</int:IntegrationGorevSonucTip>
            <int:SCCall>?</int:SCCall>
            <int:ReturnLoglist>?</int:ReturnLoglist>
         </int:objPanIntEntityList>
      </int:IntegrationSendEntitySetWithLogin>
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


## Stok Miktarlar

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
              <int:Tabloadi>VIEWDEPOSTOKDURUMGENERIC</int:Tabloadi>
               <!--Optional:-->
               <int:Viewadi>VIEWDEPOSTOKDURUMGENERIC</int:Viewadi>
               <int:Kriter>"LNGDEPOKOD=96 AND LNGYIL=2020"</int:Kriter>
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

