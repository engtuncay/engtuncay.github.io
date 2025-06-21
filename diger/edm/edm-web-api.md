
<h1>EDM E-FATURA WEB SERVİS API GELİŞTİRİCİ KILAVUZU V4.2.1</h1> 

Source : 

- https://docs.edmbilisim.com.tr/api/api-documentation/introduction.html

- https://docs.edmbilisim.com.tr/api/api-documentation/einvoice/efatura-soap-envelopes.html

<h2>İÇİNDEKİLER</h2>

- [BAŞLARKEN](#başlarken)
- [1.WEB SERVİS API GELİŞTİRİCİ KILAVUZU](#1web-servi̇s-api-geli̇şti̇ri̇ci̇-kilavuzu)
  - [1.1.GENEL BİLGİ](#11genel-bi̇lgi̇)
  - [1.2.SERVİS ERİŞİMİ](#12servi̇s-eri̇şi̇mi̇)
- [2.API METODLARINA GENEL BAKIŞ](#2api-metodlarina-genel-bakiş)
  - [2.1.WSDL](#21wsdl)
  - [2.2.REQUEST-RESPONSE](#22request-response)
  - [2.3.EXCEPTION](#23exception)
- [3.ORTAK VERİ TİPLERİ](#3ortak-veri̇-ti̇pleri̇)
  - [3.1.REQUEST\_HEADERTYPE](#31request_headertype)
  - [3.2.REQUEST\_RETURNTYPE](#32request_returntype)
  - [3.3.REQUEST\_ERRORTYPE](#33request_errortype)
  - [3.4.BASE64BINARY](#34base64binary)
  - [3.5.SENDER](#35sender)
  - [3.6.RECEIVER](#36receiver)
  - [3.7.AMOUNT TYPE](#37amount-type)
  - [3.8.CURRENCY CONTENT TYPE](#38currency-content-type)
- [4.FATURA ÖZEL VERİ TİPLERİ](#4fatura-özel-veri̇-ti̇pleri̇)
  - [4.1.INVOICE](#41invoice)
  - [4.2.INVOICEHEADER](#42invoiceheader)
  - [4.3.INVOICEHEADERINTERNETSALESDETAILS](#43invoiceheaderinternetsalesdetails)
  - [4.4. INVOICEHEADERINTERNETSALESDETAILS GONDERİ BİLGİLERİ](#44-invoiceheaderinternetsalesdetails-gonderi̇-bi̇lgi̇leri̇)
  - [4.5.INVOICEHEADERINTERNETSALESDETAILS GONDERİ BİLGİLERİ GONDERİTASİYAN](#45invoiceheaderinternetsalesdetails-gonderi̇-bi̇lgi̇leri̇-gonderi̇tasi̇yan)
  - [4.6.INVOICEHEADERINTERNETSALESDETAILS GONDERİ BİLGİLERİ GONDERİ TASİYAN TUZEL KİSİ](#46invoiceheaderinternetsalesdetails-gonderi̇-bi̇lgi̇leri̇-gonderi̇-tasi̇yan-tuzel-ki̇si̇)
  - [4.7.INVOICEHEADERINTERNETSALESDETAILS GONDERİ BİLGİLERİ GONDERİ TASİYAN GERCEK KİSİ](#47invoiceheaderinternetsalesdetails-gonderi̇-bi̇lgi̇leri̇-gonderi̇-tasi̇yan-gercek-ki̇si̇)
  - [4.8.INVOICE\_SEARCH\_KEY](#48invoice_search_key)
  - [4.9.GIBUSER](#49gibuser)
- [5.FONKSİYONLAR](#5fonksi̇yonlar)
  - [5.1. LOGIN](#51-login)
  - [5.2. LOGOUT](#52-logout)
  - [5.3. LOAD INVOICE](#53-load-invoice)
  - [5.4.SEND INVOICE](#54send-invoice)
  - [5.5.GET INVOICE](#55get-invoice)
  - [5.6.GET INVOICE STATUS](#56get-invoice-status)
  - [5.7.MARK INVOICE](#57mark-invoice)
  - [5.8.GET USER LIST](#58get-user-list)
  - [5.9.GET USER LIST BINARY](#59get-user-list-binary)
  - [5.10.CHECK USER](#510check-user)
  - [5.11.SEND INVOICE RESPONSEWITH SERVER SIGN](#511send-invoice-responsewith-server-sign)
  - [5.12.CANCEL INVOICE](#512cancel-invoice)
  - [5.13.CHECK COUNTER](#513check-counter)
  - [5.14. GET INVOICE RESPONSE DATE](#514-get-invoice-response-date)
- [6.FATURA DURUMLARI](#6fatura-durumlari)
- [7.KULLANIM VE ÖNERİLER](#7kullanim-ve-öneri̇ler)
  - [7.1.SERVİS BAĞLANTISI](#71servi̇s-bağlantisi)
  - [7.2.ÖNERİLEN HATA YAKALAMA MEKANİZMASI](#72öneri̇len-hata-yakalama-mekani̇zmasi)

# BAŞLARKEN

Bu dokümanın EDM Web Servisine ait metot ve veri yapılanının amaçları ve özelliklerini tanımlamaya yardımcı olabilmek amacıyla oluşturulmuştur. Web servis URL’inde yer alan WSDL tanımı nihai tanımdır ve kullanımda dikkate alınmalıdır. 

Bu dokümanı ile birlikte entegrasyon paketini istemeyi de unutmayın

Paket içinde örnek C#, Delphi ve PHP ile yazılmış örnek kodlar ve S.S.S dokümanı bulunmaktadır. 

Sorularınız ve yardımlarınız için yazilim@edmbilisim.com.tr ve isgelistirme@edmbilisim.com.tr adreslerinden anlık destek alabilirsiniz. 

Çalışmalarınızda kolaylıklar ve başarılar dileriz.

EDM Bilişim ve Danışmanlık Hizmetleri A.Ş.



# 1.WEB SERVİS API GELİŞTİRİCİ KILAVUZU

## 1.1.GENEL BİLGİ

EDM web servisi Microsoft WCF tabanlı Web Servistir ve SOAP 1.1 ve SOAP 1.2 ile uyumludur.

## 1.2.SERVİS ERİŞİMİ

Test ortamı için endpoint adresi: 

https://test.edmbilisim.com.tr/EFaturaEDM21ea/EFaturaEDM.svc  

Henüz adrese erişim için kullanıcı ve şifreniz yoksa isgelistirme@edmbilisim.com.tr e-posta adresinden size kullanıcı ve şifre tahsis edilmesini istemelisiniz.

Servise erişim için kullanılabilecek servis model parametreleri aşağıdaki gibidir.
Servise bağlanırken kullanılacak Timeout, size, length vb. gibi ‘binding’ tag içinde verilen kota ayarlarının aşağıdaki gibi yüksek değerlere sahip olması gerekir.

```xml
<system.serviceModel>
    <bindings>
        <basicHttpBinding>
          <binding name="EFaturaEDMPort74" closeTimeout="00:20:00" openTimeout="00:20:00" receiveTimeout="00:20:00" sendTimeout="00:20:00" maxBufferSize="2147483647" maxBufferPoolSize="2147483647" maxReceivedMessageSize="2147483647">
              <readerQuotas maxDepth="2147483647" maxStringContentLength="2147483647" maxArrayLength="2147483647" maxBytesPerRead="2147483647" maxNameTableCharCount="2147483647"/>
              <security mode="Transport"/>
          </binding>
        </basicHttpBinding>
    </bindings>    
  </system.serviceModel>

```
# 2.API METODLARINA GENEL BAKIŞ

## 2.1.WSDL

Aşağıdaki tabloda web serviste kullanılan metotların listesi verilmiştir. 
Web servisin Wsdl tanımı içinde görülebilen diğer metotlar yalnızca mevcut uygulamalara uyumluluk sebebiyle bulunmaktadır ve işlevi yoktur. 

## 2.2.REQUEST-RESPONSE

İstisnaları haricinde, her metot kendi ismini taşıyan bir “request” (istek) nesnesini parametre olarak alır ve işlem hatasız ise sonucunu yine kendi ismini taşıyan bir “response” (yanıt) nesnesi ile döner. 

Hatalı dönüşler, uygulama ve sistem hataları vb. gibi her türlü olumsuz sonuç, “REQUEST_ERRORType “tipinde SOAP fault exception ile dönülmektedir. 

Tüm istek nesnelerinde, “Login” metodu hariç, oturum bilgisini içeren bir istek-başlık bilgisi “REQUEST_HEADER” nesnesi olarak bulunmalıdır

## 2.3.EXCEPTION

Web servis işlemine ait her türlü başarısız durum için “REQUEST_ERRORType “tipinde SOAP fault exception dönülmektedir. 
 
# 3.ORTAK VERİ TİPLERİ

## 3.1.REQUEST_HEADERTYPE

Web servis isteklerinde Session ID ve REQUEST ‘e ait temel bilgileri iletmek için kullanılan yapıdır. Login metodu sonrasında edinilen oturum bilgisini (SESSION_ID), sonraki web servis isteklerinde belirtmek gereklidir.

Öneri:

Bu sebepten uygulamanızda REQUEST_HEADERType tipine global bir değişken tanımlayabilir ve oturum bilgisini gerektiren diğer isteklere ait Request nesnelerde kullanabilirsiniz. 

“Aktif session bulunamadı” hatası alınırsa oturum (session) yeniden kurulmalıdır.

Request Header Type bağlantı türü, bağlantı kuran uygulama, firma ve zamanlama bilgilerini içermektedir ve gönderilen her istekte yer almalıdır. Yalnızca “Login” işleminde SESSION_ID bilgisi “0” verilmelidir.

NESNE : REQUEST_HEADER_TYPE

ALAN ADI             | VERİ TİPİ | AÇIKLAMASI                                                                           | SPESİFİK
---------------------|-----------|--------------------------------------------------------------------------------------|---------
SESSION_ID           | String    | Oturum bilgisini taşır.  Login hariç tüm fonksiyonlarda kullanılması zorunludur.     |
CLIENT_TXN_ID        | String    | GUID (UUID) formatında yinelenmiş bir değer gönderilir.                              |
ACTION_DATE          | DateTime  | İsteğin verildiği sistem zamanı verilmelidir.                                        |
ACTION_DATESpecified | Boolean   | True verilmelidir.                                                                   |
APPLICATION_NAME     | String    | İsteği gönderen uygulamanın ismi, versiyonu ve geliştiren firma unvanı girilmelidir. |
CHANNEL_NAME         | String    | İsteği gönderen uygulamayı kullanan firmanın unvanı girilmelidir.                    |
COMPRESSED           | String    | ‘N’ verilmelidir.                                                                    |

## 3.2.REQUEST_RETURNTYPE

Başarılı tamamlanan tüm web istekleri REQUEST_RETURNType nesnesi içeren Response nesnesi dönerler. Hatalı biten metotlar ise REQUEST_ERRORType nesnesi içeren SOAP hatası dönmektedir.

NESNE	:REQUEST_RETURNType

ALAN ADI      | VERİ TİPİ | AÇIKLAMASI                               | SPESİFİK
--------------|-----------|------------------------------------------|---------
INTL_TXN_ID   | Long      | Metot için üretilen işlem numarasıdır    | Rezerve
CLIENT_TXN_ID | String    | İsteği gönderenin işlem numarasını döner | Rezerve
RETURN_CODE   | Int       | Metot dönüş kodu.                        | “0”’dır.

## 3.3.REQUEST_ERRORTYPE

Metotlar işlenirken oluşan hataların tümü için fırlatılan fault exception yapısıdır.

Tüm client(istemci) metot isteklerinde aşağıdaki gibi bir çağrı mekanizmasının kurulması önerilmektedir. Bu sayede hatanın hangi kanaldan geldiği daha iyi anlaşılmakta ve önlemler daha hızlı alınabilmektedir. Örneği C# üzerinden yapmış olsak da diğer platformlarda bu yapıya çok kolay adapte olabilmektedir. Exception yakalama 3 aşamadan oluşmaktadır. Eğer mantıksal bir hata alırsanız 1. aşamadaki catch ‘e yakalanırsınız. 2. aşamada sistemsel bir hatanın olduğunu gösterir 3. aşama genel hataları yakalamak için eklenmiş olsa da genelde client hataları bu aşamada yakalanır.

## 3.4.BASE64BINARY

Web servis isteklerinde transfer edilen Byte[] dizisinin verildiği ve transfer esnasında basr64 kodlamasına kendiliğinden dönüştürülen veri yapısıdır. UBL gibi metinsel içerikler Byte[] dizisine dönüştürülürken, UTF8 kullanılması önemlidir.  

NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI	SPESİFİK DEĞER

Base64binary	ContentType	String	Byte dizisinin ait olduğu içerik türü: XML, PDF, RTF, PNG, JPG, BMĞ vb. içeriğin olası dosya uzantı ismi. 
* Verilmediği takdirde XML olarak ele alınır. 
* UBL belgeleri için default XML olarak ele alınır.	
	Value	Byte[]	Söz konusu içeriğin byte dizisi olarak değeri.

Fatura gibi UBL(XML) belgelerinde, metinsel içeriğin UTF8e göre elde edilmiş byte dizisidir.	

## 3.5.SENDER

Fatura yükleme ve gönderimlerde, Gönderici bilgilerini tanımlamak için kullanılır.

NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI	SPESİFİK DEĞER
SENDER	VKN	String	Göndericinin 10 haneli VKN veya 11 haneli TCKN. 
Bu bilgi, isteğe dahil edilen tüm faturalar için kullanılır.	
	Alias	String	Göndericiye ait GİB gönderici birim etiketi. 
Bu bilgi, isteğe dahil edilen tüm faturalar için kullanılır.	
 
## 3.6.RECEIVER

E-Fatura yükleme ve gönderimlerde, e-fatura alıcı bilgilerini tanımlamak için kullanılır.

NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI	SPESİFİK DEĞER
RECEIVER	VKN	String	Alıcının 10 haneli VKN veya 11 haneli TCKN. 
Bu bilgi, isteğe dahil edilen tüm faturalar için kullanılır.	
	Alias	String	Alıcıya ait GİB posta kutusu etiketi. 
Bu bilgi, isteğe dahil edilen tüm faturalar için kullanılır.	

## 3.7.AMOUNT TYPE

Tutar veri tipidir.

NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI	SPESİFİK DEĞER
AmountType	CurrencyID	CurrencyCodeContentType Enum	Döviz cinsi bilgisidir. Enum veri tipindedir.	TRY, EUR, USD vb.
	Value	Decimal	Tutar bilgisidir.	

## 3.8.CURRENCY CONTENT TYPE

Tutar veri tipidir.

NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI	SPESİFİK DEĞER
CurrencyCodeContentType	Enum veri tipindedir			


# 4.FATURA ÖZEL VERİ TİPLERİ

## 4.1.INVOICE

Fatura, gönderim (Send), alım (Get) ve durum (Status) sorgulamalarında kullanılan web servis veri tipidir.

NESNE	: INVOICE

ALAN ADI | VERİ TİPİ     | AÇIKLAMASI                                                                                                                                                                                                                                    | SPESİFİK
---------|---------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|---------
HEADER   | INVOICEHEADER | Fatura başlık bilgilerini içeren veri yapısıdır                                                                                                                                                                                               |
ID       | String        | 16 haneli GIB Fatura No.Sistemden seri üretimi talebi ile yapılan gönderim (SendInvoice) veya taslak yükleme (LoadInvoice) işlemlerinde, servisten dönülen INVOICE nesneleri içinde bu alanda, sistemde üretilen belge numarası bulunacaktır. |
UUID	|String	| GUID (UUID) formatında fatura tekil no	
CONTENT	|Base64binary	|Faturanın UBL(XML) ini içeren veri yapısıdır. |Portalden seri alınması istendiğinde UBL-TR içindeki “Invoice/ID” elemanına ABC2009123456789 özel değeri verilmelidir.

```xml


```

## 4.2.INVOICEHEADER

`Fatura başlık bilgilerini` içeren veri yapısıdır

NESNE	: INVOICEHEADER

ALAN ADI                                 | VERİ TİPİ                             | AÇIKLAMASI
-----------------------------------------|---------------------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
SENDER                                   | String                                | Faturayı gönderen kurum/kişinin 10 haneli VKN (Vergi NO) veya 11 haneli TCKN (TC NO) su
RECEIVER                                 | String                                | Faturayı alan kurum/kişinin 10 haneli VKN (Vergi NO) veya 11 haneli TCKN (TC NO) su
SUPPLIER (1)                             | String                                | Gönderici unvanı
CUSTOMER (1)                             | String                                | Alıcı unvanı (1)
ISSUE_DATE (1)                           | DateTime                              | Fatura tarihi
ISSUE_DATESpecified (1)                  | Bool                                  | ISSUE_DATE alanındaki değerin dolu olduğunu gösterir
PAYABLE_AMOUNT                           | AmountType                            | Kullanılmıyor
FROM                                     | String                                | Faturayı gönderen kurum/kişinin GİB ‘deki gönderici birim etiketi
TO                                       | String                                | Faturayı alan kurum/kişinin GİB ‘deki posta kutusu etiketi
PROFILEID (1)                            | String                                | Fatura senaryo bilgisini içerir
STATUS                                   | String                                | Faturanın EDM ‘deki durum kodu (örn: SEND)
STATUS_DESCRIPTION                       | String                                | Faturanın EDM ‘deki durum açıklaması (örn: SEND-SUCCEED)
GIB_STATUS_CODE (1)                      | String                                | E-fatura özelinde, zarfın GİB durum kodudur (örn: 1300)
GIB_STATUS_CODE Specified (1)            | String                                | GIB_STATUS_CODE alanının doluluğuna işaret eder. True: alan doludur. False: alan dikkate alınmamalıdır
GIB_STATUS_DESCRIPTION (1)               | String                                | E-fatura özelinde, zarfın GİB durum açıklamasıdır (örn: 1300: BASARIYLA TAMAMLANDI)
RESPONSE_CODE (1)                        | String                                | Ticari E-fatura senaryosuna ait faturalar için uygulama yanıtı kodudur (örn: ACCEPT) detaylar için EDM entegrasyon paketindeki, durum kodları listesine bakınız.
RESPONSE_DESCRIPTION (1)                 | String                                | Ticari E-fatura senaryosuna ait faturalar için uygulama yanıtı açıklamasıdır (örn: ACCEPT-SUCCEED) detaylar için EDM entegrasyon paketindeki, durum kodları listesine bakınız.
FILENAME                                 | String                                | Kullanılmıyor
HASH                                     | String                                | Kullanılmıyor
CDATE                                    | DateTime                              | Faturanın EDM sisteminde oluşturulma tarihidir.
CDATESpecified                           | DateTime                              | CDATE alanının doluluğu ile ilgilidir. True: CDATE alanı doldurur. False: alanı dikkate almayın.
ENVELOPE_IDENTIFIER                      | String                                | Zarfın ID (kimlik bilgisi) ‘si
INTERNETSALES                            | Bool                                  | İnternet satış ise true verilir.
EARCHIVE                                 | Bool                                  | E-arşiv veya Internet satış faturası ise True verilmelidir.
INTERNETSALESDETAILS                     | INVOICEHEADER<br>INTERNETSALESDETAILS | İnternet satış faturalarında, internet satış detaylarının bulunması gereken veri yapısıdır.
INVOICESERIAL_REQUESTED                  | String                                | Taslak yüklemede belirli bir seriden faturano alınması istendiğinde, bu alana faturano üretilecek seri bilgisi verilmelidir.
EXPORT_GTB_REF                           | String                                | Gümrük ticaret bakanlığından dönen REF NO
EXPORT_GTB_GCB_TESCILNO                  | String                                | Gümrük ticaret bakanlığından dönen TESCIL NO
EXPORT_GTB_FIILI_IHRACAT_TARIHI          | DateTime                              | Gümrük ticaret bakanlığı tarafından bildirilen ihracat tarihi
INVOICE_TYPE (1)                         | String                                | Fatura tipi (Satış, İade, İstisna vb.)
INVOICE_SEND_TYPE (1)                    | String                                | Fatura gönderilme tipi (E-Fatura, E-İrsaliye, E-Arşiv, İnternet Satış vb.)
EARCHIVE_REPORT_UUID (1)                 | String                                | E-Arşiv rapor zarfının UUID bilgisi
EARCHIVE_REPORT_SENDDATE                 | String                                | E-Arşiv rapor tarihi (E-Arşiv faturalarının EDM tarafından GİB ‘e raporlanma tarihi)
EARCHIVE_REPORT_STATUS (1)               | String                                | E-Arşiv rapor durum kodu (örn: 30)
EARCHIVE_REPORT_STATUSDESC (1)           | String                                | E-Arşiv rapor durum açıklamasıdır (örn: 30-Başarıyla yüklendi)
CANCEL_EARCHIVE_REPORT_UUID              | String                                | E-Arşiv iptali rapor zarfının UUID bilgisi
EARCHIVE_REPORT_SENDDATE                 | String                                | E-Arşiv iptal rapor tarihi. (İptal edilen E-Arşiv faturalarının EDM tarafından GİB ‘e raporlanma tarihi)
CANCEL_EARCHIVE_REPORT_STATUS            | String                                | E-Arşiv iptal rapor durum kodu (örn: 30)
CANCEL_EARCHIVE_REPORT_STATUSDESC        | String                                | E-Arşiv iptal rapor durum açıklamadır (örn: 30-Başarıyla yüklendi)
ERP_REFERENCE                            | String                                | Faturanın EDM Bulut ile gelmişse ERP ‘den alınan mantıksal ERP referans numarası
DIRECTION                                | String                                | Faturanın gelen veya giden gönde olduğunu belirtmek içindir. “IN”: gelen fatura, “OUT”: giden fatura
EXPORT_GTB_FIILI_IHRACAT_TARIHISpecified | DateTime                              | EXPORT_GTB_FIILI_IHRACAT_TARIHI alanının dikkate alınıp alınmamasını sağlamak içindir. True: EXPORT_GTB_FIILI_IHRACAT_TARIHI alanı kullanılabilir False: alan boş
MOBILE                                   | String                                | SMS gönderimi için 12 haneli olmalı
MARKED                                   | Boolean                               | Fatura için okundu/ okunmadı bilgisi yer alır. True: OKUNDU False: OKUNMADI

•	İşaretli alanlar fatura gönderiminde kullanılmazlar, yerine GetInvoice ile yapılan fatura sorgulamalarda gelen fatura listesinde dolu olarak gelmektedir.

## 4.3.INVOICEHEADERINTERNETSALESDETAILS

İnternet satış faturalarında, internet satış detaylarının verildiği veri yapısıdır.

NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI	KULLANIM
INVOICEHEADERINTERNETSALESDETAILS	webAdresi	String	Satış yapılan web adresi	*
	odemeSekli	String	KREDIKARTI/ BANKAKARTI, EFT/HAVALE, ODEMEARACISI 	*
	odemeAracisiAdi	String	Ödeme şekli ODEMEARACISI olarak verildiği durumda kullanılmalı ve ilgili ödeme aracısının ne olduğu belirtilmelidir.	
	odemeTarihi	DateTime	Ödeme Tarihi	*
	odemeTarihiSpecified	bool	True verilmelidir.	
	gonderiBilgileri	INVOICEHEADERINTERNETSALESDETAILSGonderiBilgileri	İnternet satış gönderim bilgilerinin yer aldığı veri yapısıdır	

## 4.4. INVOICEHEADERINTERNETSALESDETAILS GONDERİ BİLGİLERİ

İnternet satış gönderim bilgilerinin yer aldığı veri yapısıdır

NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI	KULLANIM
INVOICEHEADERINTERNETSALESDETAILSGonderiBilgileri	gonderimTarihi	DateTime	Gönderime verildiği tarihi	*
	gonderiTasiyan	INVOICEHEADERINTERNETSALESDETAILSGonderiBilgileriGonderiTasiyan	Gönderiyi taşıyana ait bilgilerin yer aldığı nesnedir	*

## 4.5.INVOICEHEADERINTERNETSALESDETAILS GONDERİ BİLGİLERİ GONDERİTASİYAN

Gönderiyi taşıyana ait bilgilerin yer aldığı nesnedir.

NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI	KULLANIM
INVOICEHEADERINTERNETSALESDETAILSGonderiBilgileriGonderiTasiyan	tuzelKisi	INVOICEHEADERINTERNETSALESDETAILSGonderiBilgileriGonderiTasiyanTuzelKisi	Gönderiyi taşıyan tüzel kişi ise bu nesne doldurulmalıdır	*
	gercekKisi	INVOICEHEADERINTERNETSALESDETAILSGonderiBilgileriGonderiTasiyanGercekKisi	Gönderiyi taşıyan gerçek kişi ise bu nesne doldurulmalıdır	*

## 4.6.INVOICEHEADERINTERNETSALESDETAILS GONDERİ BİLGİLERİ GONDERİ TASİYAN TUZEL KİSİ

Gönderiyi taşıyan tüzel kişi ise bu nesne doldurulmalıdır.

NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI	KULLANIM
INVOICEHEADERINTERNETSALESDETAILSGonderiBilgileriGonderiTasiyanTuzelKisi	VKN	String	Gönderiyi taşıyan tüzel kişinin VKN bilgisi	*
	unvan	String	Gönderiyi taşıyan tüzel kişinin unvanı	*

## 4.7.INVOICEHEADERINTERNETSALESDETAILS GONDERİ BİLGİLERİ GONDERİ TASİYAN GERCEK KİSİ

Gönderiyi taşıyan gerçek kişi ise bu nesne doldurulmalıdır

NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI	KULLANIM
INVOICEHEADERINTERNETSALESDETAILSGonderiBilgileriGonderiTasiyanGercekKisi	TCKN	String	Gönderiyi taşıyan gerçek kişinin TCKN bilgisi	*
	adiSoyadi	String	Gönderiyi taşıyan gerçek kişinin ismi	*


## 4.8.INVOICE_SEARCH_KEY

GetInvoice ile Fatura okuma/alma işlemlerinde kullanılan filtre kriterlerini taşıyan veri tipidir.

NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI	SPESİFİK DEĞER
INVOICE SEARCH KEY	DIRECTION	String	Yön bilgisi	“OUT”: gidenler “IN”: gelenler
“"OUT-EINVOICE": giden E-Fatura için kullanılır
"OUT-EARCHIVE": giden mail fatura (e-arşiv fatura) için kullanılır 
	LIMIT 		Int	Kaç fatura okunmak istendiği	Verilmezse default 100 olarak sınırlandırılır
	FROM	String	Fatura gönderene ait GIB’de tanımlı e-fatura gönderici birim URN’si	“urn:mail:” ile başlayan formatta ve GİB listesinde tanımlı ifadedir
	TO 		String	Fatura alıcısına ait GIB’de tanımlı e-fatura posta kutusu URN’si	“urn:mail:” ile başlayan formatta ve GİB listesinde tanımlı ifadedir
	ID	String	Faturanın üzerinde yazılı fatura numarası	16 haneli ABC2009123456789 formatında GİB faturano
	UUID	String	Faturanın ETTN (özgün, tekil) numarası	
	SENDER	String	Gönderici VKN/TCKN filtresi	10 hane VKN veya 11 hane TCKN yazılabilir
	RECEIVER	String	Alıcı VKN/TCKN filtresi	10 hane VKN veya 11 hane TCKN yazılabilir
	CONNECTOR
STATUS
DESCRIPTION		String	Faturanın statü durumuna özel filtreleme için kullanılır.
Örn: SEND- WAIT_APPLICATION_RESPONSE verildiğinde yanıt bekleyen ticari faturaların listesi alınmış olur.	Bkz.: Fatura Durumları.xlsx
	ISARCHIVED	bool	EDM sisteminde arşive kaldırılmış faturaların aramaya dahil edilip edilmemesini sağlar. Normal şartlarda arşivde sorgulama yapılmaz.	True: Arşive kaldırılmışları aramaya dahil et
False: Arşive kaldırılmışları aramaya dahil etme.
	ISARCHIVED Specified	bool	ISARCHIVED alanının dikkate alınıp alınmayacağını belirler	True: ISARCHIVED kriterini kullan.
False: ISARCHIVED kriterini kullanma...
	START_DATE	Datetime	Sorgulanan faturaların fatura tarihi başlangıç kriteri vermek için kullanılır	
	START_DATESpecified	Bool	START_DATE alanının dikkate alınıp alınmayacağını belirler	True: START_DATE kriterini kullan.
False: START_DATE kriterini kullanma...
	END_DATE	Datetime	Sorgulanan faturaların fatura tarihi bitiş kriteri vermek için kullanılır	
	END_DATE
Specified	Bool	END_DATE alanının dikkate alınıp alınmayacağını belirler	True: END_DATE kriterini kullan.
False: END_DATE kriterini kullanma...
	CR_START_DATE	Datetime	Sorgulanan faturaların oluşturma tarihi başlangıç kriteri vermek için kullanılır	
	CR_START_DATE
Specified	Bool	CR_START_DATE alanının dikkate alınıp alınmayacağını belirler	True: CR_START_DATE kriterini kullan.
False: CR_START_DATE kriterini kullanma...
	CR_END_DATE	Datetime	Sorgulanan faturaların oluşturma tarihi bitiş kriteri vermek için kullanılır	
	CR_END_DATE
Specified	Bool	CR_END_DATE alanının dikkate alınıp alınmayacağını belirler	True: CR_END_DATE kriterini kullan.
False: CR_END_DATE kriterini kullanma...
	READ_INCLUDED	Bool	Okunmuş olarak işaretlenen faturaları da getirsin mi bilgisi	True: dahil edilsin.
False: dahil edilmesin. 
	READ_INCLUDED
Specified	Bool	READ_INCLUDED içeriğinin dikkate alınıp alınmayacağını belirler	True: READ_INCLUDED kriterini kullan.
False: READ_INCLUDED kriterini kullanma...

## 4.9.GIBUSER

GIB kullanıcı sorgulamalarında dönen veri tipidir. 

NESNE	ALAN ADI 	VERİ TİPİ	AÇIKLAMASI 	SPESİFİK DEĞER

GIBUSER	IDENTIFIER 	String	Kullanıcının GIB’de tanımlı ID si 	
ALIAS 	String	Kullanıcının GIB’de tanımlı Posta Kutusu URN’si 	
TITLE 	String	Kullanıcının GIB’de tanımlı adı/unvanı 	
TYPE 	String	Kullanıcının tip bilgisi, Kamu ya da Özel olabilir. 	
REGISTER_TIME 	String	Kullanıcının GIB E-FATURA Sistemine ilk kayıt tarihi 	
UNIT 	String	Kullanıcı kaydının bulunduğu birim, PK ya da GB olabilir PK (Posta Kutusu) mu yoksa GB (Gönderici Birim) için tanımlı olduğunu gösterir 	“PK” veya “GB” olabilir. 
Kriter olarak verilirken boş bırakılabilir.
ALIAS_CREATION_TIME	String	Hesap etiketinin oluşturulma zamanını içerir	
ALIAS_REMOVAL_TIME	String	Hesap etiketinin iptal zamanını içerir	


# 5.FONKSİYONLAR

## 5.1. LOGIN

Web servis Client ‘in EFATURA Entegrasyon Platformuna kimlik doğrulayarak giriş yapmasını sağlar. 
Login yanıtında alınan SessionID değeri, takiben çağrılacak tüm metotlarda istek-başlığında (request-header) verilmelidir.
API deki diğer Web servis isteklerinin verilmesi veya yürütülmesi esnasında, “Aktif session bulunamadı” hatası alınırsa, oturum sona ermiş demektir ve oturumun tekrar açılıp, işlemin tekrarlanması gereklidir. 
LoginResponse ← LoginRequest

NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI	SPESİFİK DEĞER
LoginRequest	USER_NAME	String	PORTAL ‘e bağlanılacak kullanıcı adı	
	PASSWORD	String	PORTAL ‘e bağlanılacak kullanıcı şifresi	
	REQUEST_HEADER	REQUEST_HEADERType	Bkz.:(Ortak veri tipleri)	

NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI	SPESİFİK DEĞER
LoginResponse	REQUEST_RETURN	REQUEST_RETURNType		
	SESSION_ID	String	Oturum kimliği taşır. GUID formatındadır	


## 5.2. LOGOUT

LogoutResponse ← LogoutRequest

NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI	SPESİFİK DEĞER
LogoutRequest	REQUEST_HEADER	REQUEST_HEADERType	Bkz.:(Ortak veri tipleri)	

NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI	SPESİFİK DEĞER
LogoutResponse	REQUEST_RETURN	REQUEST_RETURNType	Bkz.:(Ortak veri tipleri)	


## 5.3. LOAD INVOICE

EFATURA Entegrasyon Platformu üzerinden bir ya da daha fazla faturanın- daha sonra gönderilmek üzere- taslak olarak EDM sistemine yüklenmesini sağlar.

LoadInvoiceResponse ← LoadInvoiceRequest
Fatura yüklemede, göndericinin VKN/TCKN ve Gönderici Birim etiketi ile alıcının VKN/TCKN ve Posta Kutusu etiketi belirtilmelidir. 
Fatura bilahare web servis üzerinden SendInvoice metodu ile gönderilmek istendiğine bu etiketleri değiştirme imkânı vardır.
Gönderici ve alıcı bilgileri 2 farklı şekilde belirtilebilir.
Bunlar; INVOICE içindeki HEADER ’da yer alan “SENDER, FROM”, “RECEIVER, TO” alanları ve LoadInvoiceRequestSENDER ve LoadInvoiceRequestRECEIVER içinde bulunan “vkn, alias” alanlarıdır.
LoadInvoiceRequestSENDER ve LoadInvoiceRequestRECEIVER, gönderim bazında global gönderici ve alıcı bilgilerini içermekteyken, INVOICE-> HEADER Fatura bazında değişen gönderici ve alıcıları içermektedir. 
Bu durum, farklı göndericilerden farklı alıcılara ait faturaların aynı web servis isteği ile EDM servisine gönderilmesine imkân vermektedir. 
Gönderici ve/veya alıcı bilgileri, her iki yöntemde aynı anda verilirse, INVOICE-> HEADER içindeki gönderici ve alıcı bilgileri öncelikli olup kullanılmaktadır. 
NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI	SPESİFİK DEĞER
LoadInvoiceRequest	REQUEST_HEADER	REQUEST_HEADERType	Oturum bilgisini taşır. Bkz.: (Ortak Veri Tipleri)	SESSION_ID alanı dolu olmalı
	SENDER	LoadInvoiceRequestSENDER	Gönderici bilgileri 
Bkz.: (Ortak veri tipleri)	
	RECEIVER	LoadInvoiceRequestRECEIVER	Alıcı bilgileri Bkz.:(Ortak veri tipleri)	
	INVOICE	INVOICE[]	Gönderilecek faturalar dizisidir. INVOICE detaylar için bkz.(Ortak veri tipleri)	
	GENERATEINVOICEIDONLOAD	Bool	Taslak yükleme esnasında fatura serino üretimini sağlamak amacıyla kullanılmaktadır	True: yükleme esnasında fatura serino alır
False: yükleme esnasında faturaserino almaz.

LoadInvoiceRequest nesnesinde, GENERATEINVOICEIDONLOAD True verilirse, yükleme anında fatura serino aldırmak mümkün olmaktadır. Serino alımındaki fatura tarihine göre kontrollü seri sırano alınması bu işlemde de vardır. Bu nedenle fatura yüklemelerde seri aldırılacak faturaların, fatura tarihine göre sıralı gönderilmesi önemlidir. 
Faturano üretilecek seri, normal şartlarda sistem tarafından belirlenmektedir. Yerine, belirli bir seriden faturano üretilmesi isteniyorsa, INVOICE nesnesi içindeki ID alanına ABC2009123456789 formatında fatura numarası verilmelidir.




## 5.4.SEND INVOICE

EFATURA Entegrasyon Platformu üzerinden bir ya da daha fazla faturayı GIB (Gelir İdaresi Başkanlığı) EFATURA sistemine gönderir.

Bu metot, ile beraberinde iletilen faturayı göndermek mümkün olduğu gibi, öncesinde LoadInvoice metodu ile taslak olarak kaydedilmiş faturanın gönderimini sağlamak için de kullanılabilir.

SendInvoiceResponse ← SendInvoiceRequest

Fatura gönderiminde, Göndericinin VKN/TCKN ve Gönderici Birim etiketi ile alıcının VKN/TCKN ve Posta Kutusu etiketi belirtilmelidir. Gönderici ve alıcı bilgileri 2 farklı şekilde belirtilebilir.

Bunlar; INVOICE içindeki HEADER ‘da yer alan “SENDER, FROM” , “RECEIVER, TO”  alanları ve SendInvoiceRequestSENDER ve SendInvoiceRequestRECEIVER içinde bulunan  “vkn, alias”  alanlarıdır.

SendInvoiceRequestSENDER ve SendInvoiceRequestRECEIVER, gönderim bazında global gönderici ve alıcı bilgilerini içermekteyken, INVOICE -> HEADER Fatura bazında değişen gönderici ve alıcıları içermektedir. 

Bu durum, farklı göndericilerden farklı alıcılara ait faturaların aynı web servis isteği ile EDM servisine gönderilmesine imkân vermektedir. 

Gönderici ve/veya alıcı bilgileri, her iki yöntemde aynı anda verilirse, INVOICE-> HEADER içindeki gönderici ve alıcı bilgileri öncelikli olup kullanılmaktadır. 

Nesne : SendInvoiceRequest

ALAN ADI       | VERİ TİPİ          | AÇIKLAMASI                                                                                   | SPESİFİK
---------------|--------------------|----------------------------------------------------------------------------------------------|---------
REQUEST_HEADER | REQUEST_HEADERType | Oturum bilgisini taşır. Detaylar için Bkz.:(Ortak Veri Tipleri)	SESSION_ID alanı dolu olmalı |
SENDER	|SendInvoiceRequestSENDER	|Gönderici bilgileri 	
RECEIVER	|SendInvoiceRequestRECEIVER	|Alıcı bilgileri	
INVOICE	|INVOICE[]	|Gönderilecek faturalar dizisidir. INVOICE detaylar için bkz.(Ortak veri tipleri)	

LoadInvoice ile taslak olarak yüklenmiş faturanın SendInvoice metodu ile gönderimi için, faturanın INVOICE yapısının CONTENT elemanının boş bırakılması ve gönderilecek faturanın UUID referansının verilmesi zorunludur.

❗ Öneri: Aynı belge, herhangi bir sebepten ikinci kez gönderildiğinde ikinci kez fatura kaydı oluşmaması için, ERPREFERANCENO parametresi eklenmesi gerekmektedir. Bu durumda mevcut belgeler için mükerrer kayıt oluşmayacaktır.

➖ Örnek

```xml
<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
    <s:Header>
        <ActivityId CorrelationId="cdc1a640-f7a1-48e8-84e3-ac0ec8228ce8" xmlns="http://schemas.microsoft.com/2004/09/ServiceModel/Diagnostics">00000000-0000-0000-0000-000000000000</ActivityId>
    </s:Header>
    <s:Body xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
        <SendInvoiceRequest xmlns="http://tempuri.org/">
            <REQUEST_HEADER xmlns="">
              <!-- detay alanlar -->
            </REQUEST_HEADER>
            <RECEIVER vkn="1245548126" alias="damla.bas@edmbilisim.com.tr" xmlns=""/>
            <INVOICE TRXID="0" xmlns="">
                <HEADER>
                    <SENDER>3230512384</SENDER>
                    <RECEIVER>1245548126</RECEIVER>
                    <FROM>urn:mail:defaultgb@yenibirfirmadaha.com.tr </FROM>
                    <TO>damla.bas@edmbilisim.com.tr</TO>
                    <INTERNETSALES>false</INTERNETSALES>
                    <EARCHIVE>false</EARCHIVE>
                    <EARCHIVE_REPORT_SENDDATE>0001-01-01</EARCHIVE_REPORT_SENDDATE>
                    <CANCEL_EARCHIVE_REPORT_SENDDATE>0001-01-01</CANCEL_EARCHIVE_REPORT_SENDDATE>
                </HEADER>
                <CONTENT>PEludm9pY...2UgeG1sbn</CONTENT>
            </INVOICE>
        </SendInvoiceRequest>
    </s:Body>
</s:Envelope>

```

## 5.5.GET INVOICE

GetInvoiceResponse ← GetInvoiceRequest

GIB (Gelir İdaresi Başkanlığı) sisteminden gelen ve/veya EDM platformuna gönderilen faturaların listelenmesi, sorgulanması ve indirilmesini sağlar.

NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI	SPESİFİK DEĞER
GetInvoiceRequest	REQUEST_HEADER	REQUEST_HEADERType	Oturum bilgisini taşır. Detaylar için bkz.:(Ortak Veri Tipleri)	SESSION_ID alanı dolu olmalı
	INVOICE_SEARCH_KEY	INVOICE_SEARCH_KEY	Fatura sorgulama kriterlerini taşıyan veri tipidir. Bkz.:(Ortak veri tipleri)	
	HEADER_ONLY	String	Dönecek fatura listesinde UBL fatura içeriğinin (xml) yer alıp almamasını belirtmek içindir.	“Y” veya “N”
	INVOICE_CONTENT_TYPE		Alınacak veri tipi	.xml, .pdf, .html olmalıdır.
	HOSTNAME	String	Host Adı / 	
	REASON	String	Gönderilen Servis Açıklaması	

NESNE	ALAN ADI	VERİ TİPİ		AÇIKLAMA
INVOICE[]	INVOICE	INVOICE[]	Bkz.:(Ortak veri tipleri)



Öneri:
GIB (Gelir İdaresi Başkanlığı) sisteminden gelen ve/veya EDM platformuna gönderilen faturaların listelenmesi işleminde sistem yavaşlamasını önlemek amaçlı fatura adetlerinde sınır bulunmaktadır. Bu sınıra takılmamak ve hızlı işlem yapabilmek için aşağıda belirtildiği gibi işlem yapmanız önerilir.

GetInvoice metodu ile alınan INVOICE [] dizi elemanları, Faturaların EDM sisteminde oluşturulduğu zaman bilgisine saniye hassasiyetine göre listelenir. 
Belirli fatura tarihine sahip faturaları alırken, işlemlerinizi oluşturma zamanına göre parçalı halde gerçekleştirebilirsiniz. 
Parçalı alım için oluşturacağınız her request nesnesinde, çekmek istediğiniz faturaların başlangıç (START_DATE) ve bitiş (END_DATE) tarihlerini aynı vermeli ve belirlediğiniz limit adedini belirtmelisiniz (örneğin 100). 
İlk Request’inizde ilgili fatura başlangıç ve bitiş tarihlerini ve limit bilgisini (örn 100) veriniz. CR_START_DATE alanını boş bırakınız. 
İlk request yanıtında gelen faturalar, Response nesnesinde bulunan INVOICE [] dizisi ile gelir. INVOICE [] dizi elemanları, CDATE alanındaki oluşturma zamanına göre saniye hassasiyetine göre artan sıralı gelir. Son elemanın (örnekte 100.incü eleman) CDATE içindeki zaman bilgisi, ilk 100’lük gurubun son faturasına ait oluşturma zamanını gösterir. Bir sonraki istekte bu zaman bilgisi kullanılacaktır.
İlk Response, Reuqest'te verilen limit (örn 100 adet) kadar gelmişse, ilgili fatura tarihi aralığına ait limitten çok fatura var anlamına gelir ve ikinci Request aşağıdaki gibi gönderilmelidir.
İkinci Request’inizde yine aynı fatura tarih aralığı ve limit bilgisi ile birlikte, Response ’deki son INVOICE tagi içerisinde CDATE bilgisini CR_START_DATE’e yazdırarak ikinci 100 faturanızı sisteme alınır. Yanıtta gelen faturaların önceki gurupla örtüşme ihtimaline karşın, UUID kontrolü de sağlanarak aynı faturanın ikinci kez sisteme gelmesi engellenmelidir veya CDATE deki saniyeyi 1 arttırarak işlem yapılabilir.
Gelen Response, Reuqest'te verilen limit kadar gelmişse, yine ilgili fatura tarihi aralığına uyan limitten daha fazla fatura var anlamına gelir ve yeni bir Reuqest daha benzer şekilde oluşturulur. 
Bu işlem, isteğe gelen yanıttaki INVOICE [] dizi eleman sayısı, verilen limite eşit olduğu sürece devam ettirilmelidir.


✏ Öneri: Belirlenmiş belge için, ek olarak, belgeyi gönderirken eklemiş olduğunuz ERPREFERANCE alanından belge alınabilir. GetInvoiceRequestINVOICE_SEARCH_KEY metodunda sorgulama yapabilmek için, ERPREFERANCENO parametresi eklenmelidir. 

## 5.6.GET INVOICE STATUS

Belirlenen Fatura No veya UUID bilgisi ile mevcut faturaların zarf durumu ve portal durumunu kontrol etmeyi sağlar. Elde edilen bilgiler ışığında faturaların tutarlılığı sağlanır

GetInvoiceStatusResponse ← GetInvoiceStatusRequest

NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI	SPESİFİK DEĞER
GetInvoiceStatusRequest	INVOICE	INVOICE	Bkz.:(Ortak veri tipleri)	
	REQUEST_HEADER	REQUEST_HEADERType	Bkz.:(Ortak veri tipleri)	

NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI
GetInvoiceStatusResponse	INVOICE_STATUS	GetInvoiceStatusResponseINVOICE_STATUS	Bkz.: GetInvoiceStatusResponseINVOICE_STATUS

NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI
GetInvoiceStatusResponseINVOICE_STATUS	STATUS	String	Faturanın EDM ‘deki durum kodu (örn: ACCEPT- SUCCEED)
	STATUS_DESCRIPTION	String	Faturanın EDM ‘deki durum kodu (örn: SUCCEED)
	GIB_STATUS_CODE	Int	Faturanın GIB ‘deki durum kodu (örn:1300)
	GIB_STATUS_DESCRIPTION	String	Faturanın GIB ‘deki durum açıklaması (örn: 1300: BASARIYLA TAMAMLANDI)
	RESPONSE_CODE	String	Ticari faturaya dönülen yanıt durumu (kabul/Red) (örn: ACCEPT)
	RESPONSE_DESCRIPTION	String	Ticari faturaya dönülen yanıt durumu (Kabul/Red) (örn: ACCEPT)
	CDATE	DateTime	Faturanın EDM Portal’e kayıt tarihi (Gelen & Giden)
	EARCHIVE_REPORT_STATUS	String	E-Arşiv raporlandı/raporlanmadı durum kodu (örn: REPORT – SUCCESS)
	EARCHIVE_REPORT_STATUS_DESC	String	E-Arşiv raporlandı/raporlanmadı durum açıklaması
	EARCHIVE_CANCEL_REPORT_STATUS	String	E-Arşiv iptali raporlandı/raporlanmadı durum kodu (örn CANCEL REPORT – SUCCESS)
	EARCHIVE_CANCEL_REPORT_STATUS_DESC	String	E-Arşiv iptali raporlandı/raporlanmadı durum açıklaması (örn CANCEL REPORT – SUCCESS)
	ENVELOPE_IDENTIFIER	String	Fatura zarfının ID (kimlik bilgisi) ‘si
	HEADER	INVOICEHEADER	Faturanın başlık bilgileri
	ID	String	Fatura NO
	UUID	String	Fatura UUID


NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI
INVOICE_HEADER	EXPORT_GTB_REFNO	String	Gümrük Ticaret Referans NO
	EXPORT_GTB_GCB_TESCILNO	String	Gümrük Ticaret Tescil NO
	EXPORT_GTB_FIILI_IHRACAT_TARIHI	DateTime	Gümrük Ticaret Fiili İhracat Tarihi
	EXPORT_GTB_FIILI_IHRACAT_TARIHISpecified	Bool	Gümrük Ticaret Fiili İhracat Tarihi alanı dolu ise true gelir


## 5.7.MARK INVOICE

Faturanın işaretlenmesini sağlar.  Faturanın işaretlenmesi, GetInvoice ile sorgulamada dönen fatura listesine dahil edilmesini önlemek amacıyla kullanılmaktadır. 

GetInvoice metodu kullanılarak dönemsel kriterlerle yapılan fatura sorgularında INVOICE_SEARCH_KEY kriterinde READ_INCLUDED=False olarak kullanıldığı durumda işaretlenen faturaların sistemden çekilmemesini sağlar. İşaretlenen faturaların sorgulanması gerektiğinde, sorgulama kriterine READ_INCLUDED=True olarak verilmelidir.

İşaret bilgisi eklendiği gibi, iptal de edilebilir.

MarkInvoiceResponse ← MarkInvoiceRequest

NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI	SPESİFİK DEĞER
MarkInvoiceRequest	REQUEST_HEADER	REQUEST_HEADERType	İşaret konacak faturanın ID veya UUID bilgisi	
	Mark	MarkInvoiceRequestMARK	İşaretleme bilgisi	



NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI	SPESİFİK DEĞER
MarkInvoiceRequestMARK	value	Bool	İşaretleme bilgisidir.
True = işaret koyar, 
False = işareti kaldırır.	TRUE / FALSE
	valueSpecified	Bool	Value alanının dikkate alınıp alınmayacağını belirler, True verilmelidir.	TRUE

	INVOICE	INVOICE[]	İşareti konacak veya kaldırılacak fatura ID veya UUID ileri içeren INVOICE dizisi.
Dizi içindeki her bir INVOICE nesnesinin yalnızca ID veya UUID alanı dolu olmalıdır.
INVOICE veri tipi detayları için bkz.:(Ortak Veri Tipleri)	


NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI	SPESİFİK DEĞER
MarkInvoiceResponse	REQUEST_RETURN	REQUEST_RETURNType	Metot sonucu. Metot hatasız tamamlandı ise bu veri yapısı aksi halde 	

 
## 5.8.GET USER LIST

GIB EFATURA sistemine kayıtlı kullanıcıların listesini ve bilgilerini getirir. 

GetUserListResponse ← GetUserListRequest

NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI	SPESİFİK DEĞER
GetUserListRequest	REQUEST_HEADER	REQUEST_HEADERType	İstek başlık bilgisi zorunludur	
	REGISTER_TIME_START	DateTime	GIB efatura kayıt zamanına başlangıç kriteri belirtmek için kullanılır. 
Tarih verilmezse tüm kullanıcıları getirir.	
	REGISTER_TIME_START
Specified	Bool	REGISTER_TIME_START alanının dikkate alınıp alınmayacağını belirler	
	REMOVED_ONLY	Bool	Yalnızca iptal edilmiş GİB hesaplarını almak için kullanılır	
	REMOVED_ONLY
Specified	Bool	REMOVED_ONLY alanının dikkate alınıp alınmayacağını belirler	
	REMOVED_TIME_START	DateTime	Belirli bir zamandan sonra iptal edilmiş hesap kayıtlarını bulmak için kullanılır.	
	REMOVED_TIME_START
Specified	Bool	REGISTER_TIME_START alanının dikkate alınıp alınmayacağını belirler	
	UNIT	String	Etiket türü kriteri vermek için kullanılır, opsiyoneldir. Boş bırakılırsa gönderici birim ve posta kutusu birlikte listelenir. 	“PK” veya “GB”



Alanların kullanımına örnekler
1) Yalnızca aktif olanları almak:
getUserListRequest.REGISTER_TIME_STARTSpecified = true;
getUserListRequest.REGISTER_TIME_START = new DateTime (2017,12,1); // örnek zaman bilgisi
getUserListRequest.REMOVED_ONLYSpecified = false;
getUserListRequest.REMOVED_TIME_STARTSpecified = false;
(Gönderilen request ‘in SOAP BODY XML ‘inde "REMOVED_TIME_START" bulunmamalı)
1) Yalnızca pasif olanları almak:
getUserListRequest.REMOVED_ONLYSpecified = true;
getUserListRequest.REMOVED_ONLY = true;
getUserListRequest.REMOVED_TIME_STARTSpecified = true;
getUserListRequest.REMOVED_TIME_START = new DateTime (2017,12,1); // örnek zaman bilgisi
Gelen yanıtta dikkat etmeniz gereken ALIAS_REMOVAL_TIME zamanını dolu olduğudur.
1) Aktif ve pasifleri birlikte almak:
getUserListRequest.REGISTER_TIME_STARTSpecified = true;
getUserListRequest.REGISTER_TIME_START = new DateTime (2017,12,1); // örnek zaman bilgisi
getUserListRequest.REMOVED_ONLYSpecified = false;
getUserListRequest.REMOVED_ONLY = false;
getUserListRequest.REMOVED_TIME_STARTSpecified = true;
getUserListRequest.REMOVED_TIME_START = new DateTime (2017,12,1); // örnek zaman bilgisi
Gelen yanıtlarda gereken ALIAS_REMOVAL_TIME alanı dolu olanlar, PASİF hesaplardır.

NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI	SPESİFİK DEĞER
GetUserListResponse	Items	GIBUSER[]	GIBUSER dizisi olarak hesap listesi	

## 5.9.GET USER LIST BINARY

GIB EFATURA sistemine kayıtlı kullanıcıların listesinin tamamının XML veya CSV olarak alınmasını sağlar

GetUserListBinaryResponse ← GetUserListBinaryRequest

NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI	SPESİFİK DEĞER
GetUserListBinaryRequest	REQUEST_HEADER	REQUEST_HEADERType	İstek başlık bilgisi zorunludur	
	TYPE	GetUserListBinaryRequestTYPE 	Enum türünde, dosya türü bilgisidir.	XML, CSV

NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI	SPESİFİK DEĞER
GetUserListBinaryResponse		Item	base64Binary	GIB e-fatura kullanıcı listesinin istenen dosya formatında Byte[] dizisi olarak içeriği 	

## 5.10.CHECK USER

Verilen kriterlere uyan GIB EFATURA hesabının varlığını kontrol eder ve uyan kayıt veya kayıtları liste olarak geri döner. 

GIBUSER[] ← CheckUserRequest

NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI
CheckUserRequest	REQUEST_HEADER	REQUEST_HEADERType	İstek başlığı
	USER	GIBUSER 	GIBUSER’ın Bazı alanlarına sorgulama kriteri verilebilir
NESNE	ALAN ADI 	VERİ TİPİ	AÇIKLAMASI 
GIBUSER	IDENTIFIER 	String	Kontrol edilmek istenen hesabın 
VKN si 
	TITLE 	String	Kontrol edilmek istenen hesabın 
unvanına ait baştan metin ifadeler

## 5.11.SEND INVOICE RESPONSEWITH SERVER SIGN

Ticari faturaya Kabul/Red yanıtı verebilmek için kullanılmaktadır.

NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI
SendInvoiceResponse
WithServerSignRequest	REQUEST_HEADER	REQUEST_HEADERType	Bkz.:(Ortak veri tipleri)
	STATUS	String	KABUL: fatura kabulü için kullanılır
RED: fatura reddi için kullanılır
	INVOICE	INVOICE[]	Yanıt verilecek fatura listesi bu yapı ile verilir. Faturano (ID) veya ETTN (UUID) alanlarının verilmesi yeterlidir.
	DESCRIPTION	String[]	Yanıt RET ise ret sebebi bu alanda verilmelidir. 
Birden çok fatura söz konusu ise her bir fatura için ayrı ayrı ret sebebi dizi halinde verilmelidir.

## 5.12.CANCEL INVOICE
Faturayı EDM sisteminde iptal eder. IPTAL edilen her fatura sistemde silinmiş niteliği kazanır. 
Faturalar EDM tarafında hiçbir zaman silinmez ve iptal listesinden görülebilir. 
E-Fatura senaryosunda başarıyla gönderilmiş faturalar iptal edilemez.

E-Arşiv Fatura senaryosunda faturaların iptal edilebilmesi için taslak (Load-Succeed), başarısız ve işlemi tamamlanmış (Send-Succeed) durumlarında ise makbuzların iptal edilmesine izin verilir. Fatura durumu GET INVOICE fonksiyonu ile kontrol edilebilir.
NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI
CancelInvoiceRequest	REQUEST_HEADER	REQUEST_HEADERType	İstek başlığı.
Bkz.:(Ortak veri tipleri)
	INVOICE	INVOICE[]	İptal edilecek fatura listesi verilir.
Bkz.:(Ortak veri tipleri)

NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI
CancelInvoiceResponse	REQUEST_RETURN	REQUEST_RETURNType	İstek sonucu.
Bkz.:(Ortak veri tipleri)

## 5.13.CHECK COUNTER

Kontör kullanan hesapların, kalan kontörünün VKN bazında sorgulanması için kullanılır.
Sorgulama için VKN verilmesine gerek yoktur, sisteme Login olmak yeterlidir.
NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI
CheckCounterRequest	REQUEST_HEADER	REQUEST_HEADERType	Bkz.:(Ortak veri tipleri)

NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI
CheckCounterResponse	COUNTER_LEFT	 Int	Kalan kontör miktarı


## 5.14. GET INVOICE RESPONSE DATE

Belirlenen mevcut fatura bilgilerine göre faturaların Kabul/Red durumlarını kontrol etmeyi sağlar.

NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI
INVOICERESPONSEDATELIST	INVOICERESPONSEDATE	DateTime	Fatura durum yanıt tarihi
	SUPPLİERNAME	String	Müşteri Unvanı
	INVOICEID	String	Fatura ID
	INVOICEUUID	String	Fatura UUID
	SUPPLIERTAXNUMBER	String	Müşteri VKN
	STATUSCODE	String	Fatura durum kodu
	STATUSDESC	String	Fatura durum(kabul/Red)


NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI
GetInvoiceResponseDateRequest_
SEARCH_KEY	INVOICERESPONSESTARTDATE	DateTime	Fatura sorgulama başlangıç tarihi
	INVOICERESPONSEENDDATE	DateTime	Fatura sorgulama bitiş tarihi
	INVOICEID	String	Fatura ID
	INVOICEUUID	String	Fatura UUID
	COMPANYTAXNUMBER	String	Müşteri VKN

NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI
GetInvoiceResponseDateResponseX	Items	INVOICERESPONSEDATELIST []	Bkz.:(Ortak veri tipi)

GetInvoiceResponseDateResponse ← GetInvoiceResponseDateRequest
NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI
GetInvoiceResponseDateResponse	Items	GetInvoiceResponseDateResponseX 	Bkz.:(Ortak veri tipi)

GetInvoiceResponseDateResponse ← GetInvoiceResponseDateRequest

NESNE	ALAN ADI	VERİ TİPİ	AÇIKLAMASI
GetInvoiceResponseDateRequest	INVOICERESPONSEDATE_SEARCH_KEY_SEARCH_KEY	GetInvoiceResponseDateRequest_SEARCH_KEY	Bkz.:(Ortak veri tipleri)
	REQUEST_HEADER	REQUEST_HEADERType	Bkz.:(Ortak veri tipleri)



# 6.FATURA DURUMLARI

EXCEL formatında doküman olarak pakette bulunmaktadır.


# 7.KULLANIM VE ÖNERİLER

Verilen örnekler C# ile yazılmıştır.

## 7.1.SERVİS BAĞLANTISI

```csharp
EFaturaEDMPortClient client = new EFaturaEDMPortClient();

```

## 7.2.ÖNERİLEN HATA YAKALAMA MEKANİZMASI

Hata yakalama yöntemi, kademeli hata yakalama yöntemidir. 

```csharp
try
{
SendInvoiceResponse sendInvoiceResponse 
= _service.SendInvoice(sendInvoiceRequest);
}
catch (System.ServiceModel.FaultException<REQUEST_ERRORType> fexp) // SERVİSTEN GÖNDERİLMİŞ İŞLEM HATASINI DÖNER
{
// REQUEST_ERRORType tipini çözümleyip, içindeki hata detaylarına ulaşmak gereklidir.

String detail = xmlSerializeObject(
(((System.ServiceModel.FaultException<REQUEST_ERRORType>)fexp)).Detail
);

var requesterror = (System.ServiceModel.FaultException<REQUEST_ERRORType>)fexp;

Console.WriteLine(fexp.Message);
Console.WriteLine(requesterror.Detail.ERROR_SHORT_DES);
Console.WriteLine(requesterror.Detail.ERROR_LONG_DES);
}
catch (System.ServiceModel.FaultException fex) // PROTOKOL İLE İLGİLİ SORUNLARI DÖNER
{	
Console.WriteLine(fex.Message);
}
catch (Exception ex) // ÇAĞIRAN UYGUALAMA (CLIENT) TARAFINDAKİ BİR SORUNA İŞARET EDER
{
Console.WriteLine(ex.Message);
}

```

