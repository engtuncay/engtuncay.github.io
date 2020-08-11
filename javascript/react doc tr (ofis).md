
- [Temel Kavramlar](#temel-kavramlar)
  - [Elementlerin Render Edilmesi](#elementlerin-render-edilmesi)
  - [Bileşenler ve Prop'lar – React](#bileşenler-ve-proplar--react)


# Temel Kavramlar

## Elementlerin Render Edilmesi

https://tr.reactjs.org/docs/rendering-elements.html

Elementler, React uygulamalarının en küçük yapı birimidir.

Bir element, ekranda neyi görmek istiyorsanız onu tasvir eder:

const element = <h1>Hello, world</h1>;

Tarayıcının DOM elementlerinin aksine, React elementleri daha sade nesnelerdir ve oluşturulmaları daha kolaydır. Çünkü React DOM, elementler ile eşleşmek için DOM’ın güncellenmesi işini kendisi halleder.

Not: “Bileşen” (component) konsepti daha yaygın olarak bilindiği için, anlam bakımından elementler ile karıştırılabilir. Sonraki bölümde React bileşenlerine de değineceğiz. Fakat elementler, React bileşenlerinin en küçük yapıtaşlarıdır. Bu nedenle sonraki bölüme atlamadan önce bu bölümü okumanızı tavsiye ederiz.

Bir Elementin DOM’a Render Edilmesi

HTML dosyanızın herhangi bir yerinde <div> olduğunu düşünelim:

<div id="root"></div>

Buna “root” (kök) düğüm denir. Çünkü içerisindeki her şey React DOM tarafından yönetilir.

Genellikle React ile yazılan uygulamalar, sadece bir adet kök DOM düğümü içerirler. Eğer React’i mevcut uygulamanıza entegre ediyorsanız, birbirinden izole olacak şekilde dilediğiniz kadar kök DOM düğümüne sahip olabilirsiniz.

Kök DOM düğümü içerisinde bir React elementini render etmek istiyorsanız, bu iki parametreyi de ReactDOM.render() metoduna geçirmeniz gereklidir:
const element = <h1>Hello, world</h1>; ReactDOM.render(element, document.getElementById('root'));

Sayfada “Hello, world” mesajı görüntülenecektir.

Render Edilmiş Elementin Güncellenmesi

React elementleri immutable‘dır. Yani bir kez React elementi oluşturduktan sonra, o elementin alt elemanlarını veya özelliklerini değiştiremezsiniz. Bu nedenle element, bütün bir videonun tek bir karesi gibidir: arayüzün belirli bir andaki görüntüsünü temsil eder.

Bu zamana kadar edindiğimiz bilgiler ışığında, kullanıcı arayüzünün güncellenmesi için tek yolun, yeni bir element oluşturup, ReactDOM.render() metoduna aktarmak olduğunu biliyoruz.

Aşağıdaki saat örneğini ele alalım:

```js
function tick() {
  const element = (
    <div>
      <h1>Hello, world!</h1>
      <h2>It is {new Date().toLocaleTimeString()}.</h2>
    </div>
  );

ReactDOM.render(element, document.getElementById('root'));}
setInterval(tick, 1000);

```

( Codepen'de Deneyin )

setInterval() metodu ile her saniye bitiminde ReactDOM.render() metodu çağrılıyor.

Not: Genelde birçok React uygulamasında ReactDOM.render() yalnızca bir kez çağrılır. Sonraki bölümlerde bu tarz kodların nasıl state’li bileşenlere dönüştürüleceğine değineceğiz.

Her bir konu diğeri için zemin hazırladığından dolayı, bu konuları atlamamanızı öneririz.

React Yalnızca Gerekli Kısımları Günceller

React DOM, ilgili elementi ve elementin alt elemanlarını, bir önceki versiyonlarıyla karşılaştırır. Farkları tespit ettikten sonra yalnızca gerekli olan kısımlarda DOM güncellemesi yapar. Bu sayede DOM, istenen duruma getirilmiş olur.

Bütün UI ağacını her saniye bir görüntüleyen bir element oluşturmamıza rağmen, React DOM tarafından yalnızca içeriği değişen metin düğümü güncellenir.

Not : Deneyimlerimizden yola çıkarsak, kullanıcı arayüzünün zaman içerisinde nasıl değiştirileceğinden ziyade herhangi bir anda nasıl görünmesi gerektiğini düşünmek birçok hatanın oluşmasını engellemektedir.


## Bileşenler ve Prop'lar – React

https://tr.reactjs.org/docs/components-and-props.html

Bileşenler, kullanıcı arayüzünü ayrıştırarak birbirinden bağımsız ve tekrar kullanılabilen parçalar oluşturmanızı sağlar. Bu sayede her bir parçayı, birbirinden izole bir şekilde düşünerek kodlayabilirsiniz.

Bu sayfa, bileşenlerin ne olduğuna dair bir fikir edinmenizi sağlayacaktır. Bileşenler API dokümanını inceleyerek daha detaylı bilgi edinebilirsiniz.
Kavramsal olarak bileşenler, JavaScript fonksiyonları gibidir. Bileşenler, “props” adındaki girdileri opsiyonel olarak alırlar ve ekranda görüntülenecek React elementlerini geri döndürürler.

Fonksiyon ve Sınıf Bileşenleri

Bir bileşen oluşturmak için en basit yol, bir JavaScript fonksiyonu yazmaktır:

function Welcome(props) { return <h1>Hello, {props.name}</h1>; }

Bu fonksiyon, girdi olarak “props” (properties) adındaki tek bir nesneyi aldığı ve geriye bir React elementi döndürdüğü için geçerli bir React bileşenidir. Bu tarz bileşenler, gerçekten de birer JavaScript fonksiyonları oldukları için adına “fonksiyonel bileşenler” denir.

Fonksiyon yerine, bir ES6 sınıfı kullanarak da React bileşeni oluşturabilirsiniz:

class Welcome extends React.Component { render() { return <h1>Hello, {this.props.name}</h1>; } }

Üstteki her iki bileşen de React’in bakış açısından birbirine eşittirler.

Sınıf ve fonksiyon bileşenlerinin her birisi bazı ek özelliklere sahiptirler. Buna sonraki bölümlerde değineceğiz.

Bir Bileşenin Render Edilmesi

Önceki bölümlerde, React elementi olarak sadece DOM elementlerini ele almıştık.

const element = <div />;

Ancak elementler, kullanıcı tanımlı bileşenler de olabilirler:

const element = <Welcome name="Sara" />;

React, kullanıcı tanımlı bir bileşeni gördüğü zaman, JSX özelliklerini ve alt elemanlarını bu bileşene tek bir nesne olarak aktarır. Bu nesneye “props” adı verilir.

Örneğin aşağıdaki kod, sayfada “Hello, Sara” mesajını görüntüler:

function Welcome(props) { return <h1>Hello, {props.name}</h1>; } const element = <Welcome name="Sara" />;ReactDOM.render( element, document.getElementById('root') );
attribute lar da alt eleman olarak props a dahil edilir.

Bu örnekte, hangi olayların gerçekleştiğine bir bakalım:

<Welcome name="Sara" /> elementi ile birlikte ReactDOM.render() fonksiyonunu çağırıyoruz.

Devamında React, {name: 'Sara'} prop’u ile Welcome bileşenini çağırıyor.

Welcome bileşenimiz, sonuç olarak geriye bir <h1>Hello, Sara</h1> elementi döndürüyor.

React DOM, <h1>Hello, Sara</h1> ile eşleşmek için, DOM’ı arka planda efektif bir şekilde güncelliyor.

Not: Bileşen isimlendirmelerinde daima büyük harfle başlayınız.

Çünkü React, küçük harfle başlayan bileşenlere DOM etiketleri gibi davranır. Örneğin <div />, bir HTML div etiketini temsil eder, fakat <Welcome /> ise bir bileşeni temsil eder ve kodun etki alanında Welcome‘ın tanımlı olmasını gerektirir.

Bu isimlendirmenin nedeni hakkında detaylı bilgi edinmek için lütfen Derinlemesine JSX sayfasına bakınız.

Bileşenlerden Kompozisyon Oluşturulması

Bileşenler, çıktılarında diğer bileşenleri gösterebilir. Bu sayede soyutlanan bir bileşen, herhangi bir ayrıntı düzeyinde tekrar kullanılabilir. Butonlar, formlar, diyaloglar, ekranlar ve daha nicesi React uygulamalarında yaygın bir şekilde bileşen olarak ifade edilebilirler.

Genellikle, yeni React uygulamaları, en üstte bir tane App bileşeni içerirler. Ancak React’i mevcut uygulamanıza entegre ediyorsanız, Button gibi en küçük bileşenlerden başlayacak şekilde, basitten karmaşığa doğru ilerleyerek bileşen hiyerarşisini oluşturabilirsiniz.
Bileşenlerin Çıkarılması

Büyük bileşenleri, sade ve yönetilebilir olması açısından daha küçük bileşenlere bölebilirsiniz.

Bileşenlerin çıkarılması en başta angarya bir işlem gibi görünebilir. Fakat büyük çaplı uygulamalarda, tekrar kullanılabilir bileşenler içeren bir bileşen paletine sahip olmak oldukça faydalı hale gelecektir. Bileşen çıkarmanın genel mantığı aşağıdaki gibidir:

Eğer kullanıcı arayüzündeki bir eleman (Button, Panel, Avatar) uygulama içerisinde birçok defa kullanılıyorsa,
Eğer bir bileşen (App, FeedStory, Comment) oldukça karmaşık hale geldiyse,
Bu bileşen, içerisinden bileşenler çıkarmak için iyi bir adaydır diyebiliriz.

Prop’lar ve Salt Okunurlar

Fonksiyon veya sınıf bileşeninden herhangi birini oluşturduğunuzda, bu bileşen kendi prop’larını asla değiştirmemelidir. Örneğin aşağıdaki sum fonksiyonunu ele alalım:

function sum(a, b) { return a + b; }

Bu tarz fonksiyonlar, kendi girdi parametrelerini değiştirmedikleri ve her zaman aynı parametreler için aynı sonucu ürettiklerinden dolayı “pure” (saf) fonksiyonlardır.

Tam ters örnek verecek olursak, aşağıdaki fonksiyon impure’dür (saf değildir). Çünkü kendi girdi değerini değiştirmektedir:

function withdraw(account, amount) { account.total -= amount; }

React, kod yazımında oldukça esnek olmasına rağmen, sadece bir tek kuralı şart koşmaktadır:

**Bütün React bileşenleri yalın (pure) fonksiyonlar gibi davranmalı ve prop’larını asla değiştirmemelidirler.**

Tabii ki kullanıcı arayüzleri dinamiktir ve zaman içerisinde değişiklik gösterir. Sonraki bölümde, “state” (durum) adındaki yeni konsepte değineceğiz. State bu kurala sadık kalarak; kullanıcı etkileşimleri, ağ istekleri ve diğer şeylerden dolayı zaman içerisinde değişen arayüzün görüntülenmesi için, React bileşenlerinin kendi çıktılarını değiştirebilmesine izin verir.

