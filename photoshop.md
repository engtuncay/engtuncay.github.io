

- [Section](#section)
  - [How to make your images "POP" with Photoshop](#how-to-make-your-images-pop-with-photoshop)
  - [How to Retouch your photos with photoshop](#how-to-retouch-your-photos-with-photoshop)
  - [How to Resize and save images for social media](#how-to-resize-and-save-images-for-social-media)
- [Layers](#layers)
  - [Layers in the real world vs in the digital word](#layers-in-the-real-world-vs-in-the-digital-word)
  - [Discover the 12 differenty types of layers and 3 ways to customize them](#discover-the-12-differenty-types-of-layers-and-3-ways-to-customize-them)
  - [Thoughts On Post Processing in Photoshop](#thoughts-on-post-processing-in-photoshop)
- [Color of Light](#color-of-light)
  - [color of light](#color-of-light-1)
  - [color management](#color-management)
  - [calibratation](#calibratation)
  - [Raw vs Jpeg](#raw-vs-jpeg)
- [ACR (Adobe Camera Raw) CC 2019](#acr-adobe-camera-raw-cc-2019)
  - [Preferences](#preferences)
  - [White Balance](#white-balance)
  - [Histogram and Dynamic Range Adjustments](#histogram-and-dynamic-range-adjustments)
  - [Tone Curves in Ps Acr](#tone-curves-in-ps-acr)




# Section

## How to make your images "POP" with Photoshop

histogramı açıp, köşelerde boşluk varsa(hiçbir data yoksa) alttaki tutamaçları bilginin olduğu yere (sağdan ve soldan) çekerek (contrast artar) düzeltiriz. daha çok içe çektimiz vakit detaylar kaybolur , fakat portre fotograflarda bunu uygulayabiliriz.

## How to Retouch your photos with photoshop

- spot healing seçtikten sonra düküman üzerinde sağ klik yapınca özellikler paneli açılır. (size, hardness, spacing ...)

- spot healing mesela tek saç telini düzeltmek click +drag yaparız, basılı tutup kaydırarak seçimi yaparız.

## How to Resize and save images for social media

- Images / Image Size düzeltiriz.

- Resolution 72,240 veya 300 olabilir (genel)

- web için 72 yeterli
  
- www.sproutsocial.com --> recommended size güzel bir doc

- Facebook 1200*628  

- facebook için png için kaydedin (png, jpeg den daha kaliteli), (tekrardan facebook sıkıştırdığı için kalitesini düşürüyor)

- the more its compressed the lower quality of the image.
(10-12) arası seçilebilir. 10 ideal.

- save for web ( orginail - 2up - 4up )

jpeg - quality:maximum quality- 80-100

- high - 60 yapabiliriz. (2-up)

# Layers

- Görünmüyorsa, window -> layer menüden aktif edebiliriz.

- Sağ klik - Panel options yapıtğımızda ayarlar yapabiliriz.
- 
- layers panelinin en üstünde (search icon ve kind) yazan yerde filtrelemeler yapabiliriz.

- blending options lar var.
- opacity ve fill seçenekleri var.
- layer kilitleyebiliriz.


## Layers in the real world vs in the digital word

- Window - Essentials(default) ana panelleri gösterir photoshop

- Ana foto background layer da olmalı ve locked kilitli olmalı
- Göz ile layer ı gizleyip gösterebiliriz.
- Yazı olan layer'a text layer deriz. T ikonu görünür.

Outline : çerçeve, dış çizgi

- Layer taşımak için layer kilitli olmamalı.

## Discover the 12 differenty types of layers and 3 ways to customize them


## Thoughts On Post Processing in Photoshop


# Color of Light

## Color of light

- All sources of light emit color of light and that color is dependent on the light source and intensity whether it s diffused

- temperature of light is measured in Kelvin 0 - 9000

2000k sunrise.     Warm colors 
5500k-6000k direct sun
7000k shade        cool colors
8000k cloudy

- insan gözü 7 ile on milyon arasında renk görür

- monitor 16.7 milyon renk gösterir, rgb 256*256*256

## color management

Color workspace is a scale that help us define color relative to the way that we see rgb color values

## calibratation

Calibrate your monitor monthly

Light is emitting a specific color based on the temperature of that color

Color cast?

## Raw vs Jpeg

- raw dosyada exposure, white balance metadata olarak saklanır

- raw capable of capturing a much higher dynamic range versus jpeg

# ACR (Adobe Camera Raw) CC 2019

## Preferences

- Adobe Bridge Menüsünden Camera Raw Preferences tercihleri yapabiliriz.

- Save image settings
  - camera raw db : yedeklemesi , taşınması zor
  - sidecar xmp files (recommended)

- Apply sharpening to : Preview images only (recom)

- Default image settinms
  - Apply auto tone and color adjusment : false
  - Apply auto mix when convertign to b&w : false
-  Make defaults : true (ikiside)

- Camera Raw Cache : purge cache (cache leri temizleyebiliriz)

- Keyboard shortcuts : use legacy undo shortcuts : false

**File Handling Secim**

- Dng ile uğraşmıyorsan bunları false yapabilirsin.
  - Ignore sidece ".xmp" files : false
  -  update embedded jpeg previews : false
  
- Jpeg heic and tiff handling

İkiside Auto open seçilmiş

**Performance**

- Grafik kartı varsa true yapın.

- Raw Defaults : otomatik preset uygular

**Workflow**

- Resize to Fit

w:1000 h:1000 pixels yaparız.

longer edge convert it to 1000 , sonra da oranlar.

resolution : 72 online için
300 print için


## White Balance

- Eye dropper (I) seçerek natural gray tonu fotoda seçeriz , buna ps wb ayarlayabilir.


## Histogram and Dynamic Range Adjustments

Editler top-down , left to right şeklinde yapmalıyız.

I personalyy prefer to use the histogram as a means to determine what adjustments I need to make to the dynamic range of my image bec all that info is being represented in the hist.

resimde görünen problemler

- gölgeler çok karanlık ve birçok detayı kapatıyor (a lot of details in   
- the highlights (parlak nokta) are showing detail in them but they are not very bright ( so overall image is kind of flat)

- histogram on a graph versus pixels
- hist rgb değerlerini gösteriyor fotonun

- gri alanlar fotonun luminosity (parlaklık) gösteryor ( brightness and darkness of our image)

- sagda solda boş alan varsa , bunlar bilgi eksikliğini gösteriyor

histogram solda sağa farklı şeyleri gösteriyor

blacks
shadows (gri box ile vurgulanmış (highlighted))
orta alan exposure
onun sağı highlights
uzak sağda white points 

ideal olarak hiçbir gap olmamalı fotoda

( a low key or a high key image ise olabilr boşluk)

- boşluğu kaldırmamız lazım, dynamic range doğru bir şekilde set edebilmek için

(clip:kırpmak-kesmek-vurmak-indirmek)

- spikelar solda olunca fotodaki detaylar gözükmediğini gösterir.

- önce soldaki boşluğu kapatırız, solda çerçeveden içe dogru çekeriz , whites değeri artar ( sola çektikçe fotoyu degrade eder.) (overedited olur.)

- alt ile clipping mask görürüz. (dataların olduğu alanları gösterir.) / nwo your entire image has detail in the white point areas.??
sağa çektikçe kırmızlık görünür, bu starting to clip data or losing detail in your white points. gösterir.

- black de ise clipping mask da renkli bölgeler de kaybedilen dataları gösterir.

- shadow kullanırken zoom yaptığımızda mavi alanlar dataların olduğunu gösterir. (gölgeye çok açarsak foto degrade olur, bilgiler kalitesiz bir şekilde görünür. alot of noise olur orada (kumlanma olur) and digital artifacts in the shadows.

- we dont have any spikes in the exposure section so we dont need to reduce the exposure ( aksi takdirde bazı alanlar karanlık olacak , losing detail in the shadows)
I dont want to go brighter bec then i ll start losing detail in the highlights.

- contrast artırarak make the imgage pop a little bit more but i prefer using my tone curve versus the contrast lighter.

- tone curve ile constrast üzerinde daha kontrole sahibiz.

- we can adjust the contrast in the highlights in the shodows.

- have less control over how much contrast is beign applied in certain areas of your image.
  
- highlights : this would be to bring back detail in the highlights or tone down the hightlights

- Clarity : clarity makes your image appear to be sharper but it s not really a sharpening tool. what clarity does is it adds contrast to your image but its different versus the contrast slider and the tone curve. and this is how it s different. your contrast slider is applying adjustments globally. in other words, its applying contrast to your shadows your hightlights and your mid tones. clarity on the other hand is only applying contrast to the mid tones which gives it the appearance of sharpening your image , now you can also control the contrast of your midtones with your tone curve.

highlight ve shadowların contrastı için tone curve kullanabiliriz.

clarity için landscape fotolar için 10-15 değeri
portrait fotos 5-8 değeri

- Saturation ve vibrance renklerin doygunluğunu (saturation) oynar. saturation global değişiklik (edit) yaparken (shadows,highlights and mid-tones tümüne), vibrance sadece mid tones yapar. Contrast ve Clarity de olduğu gibi. Böylelikle vibrance oynadığımızda, fotomuzun sadece orta tonları (mid tones) etkilenecek. 

saturation : doyma,canlılık,koyuluk (darkness)

## Tone Curves in Ps Acr

- the tone cure ve lens correction adjustments için preset hazırlanıp editler yapılmazdan önce tüm fotolara uygulanabilir.

- 


- 























