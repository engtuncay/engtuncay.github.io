
- [Temel Kavramlar](#temel-kavramlar)
  - [Elementlerin Render Edilmesi](#elementlerin-render-edilmesi)
  - [Bileşenler ve Prop'lar – React](#bileşenler-ve-proplar--react)
  - [State ve Yaşam Döngüsü – React](#state-ve-yaşam-döngüsü--react)
  - [Olay Yönetimi – React](#olay-yönetimi--react)





# Temel Kavramlar

Temel Kavramlar 12 bölümden oluşur.

1. Merhaba Dünya
2. JSX'e Giriş
3. Elementlerin Render Edilmesi
4. Bileşenler ve Prop'lar
5. State ve Yaşam Döngüsü
6. Olay Yönetimi
7. Koşullu Renderlama
8. Listeler ve Anahtarlar
9. Formlar
10. State'i Yukarı Taşıma
11. Bileşim vs Kalıtım
12. React'te Düşünmek


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

```js
function Welcome(props) { 
    return <h1>Hello, {props.name}</h1>; } const element = <Welcome name="Sara" />;

ReactDOM.render( element, document.getElementById('root') );
```

(to:attribute lar da alt eleman olarak props a dahil edilir.)

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

## State ve Yaşam Döngüsü – React

https://tr.reactjs.org/docs/state-and-lifecycle.html

State ve Yaşam Döngüsü

Bu bölümde ise, Clock bileşenini nasıl sarmalayacağımıza ve tekrar kullanılabilir hale getireceğimize değineceğiz. Bu bileşen, kendi zamanlayıcısını başlatacak ve her saniye kendisini güncelleyecek.

Öncelikle Clock’u, ayrı bir bileşen halinde sarmalayarak görüntüleyelim:

```
function Clock(props) { return ( <div> <h1>Hello, world!</h1> <h2>It is {props.date.toLocaleTimeString()}.</h2> </div> ); } 

function tick() { 
    ReactDOM.render( <Clock date={new Date()} />, document.getElementById('root')); 
} 
    
setInterval(tick, 1000);

```
Güzel görünüyor ancak bu aşamada kritik bir gereksinimi atladık: Clock‘un kendi zamanlayıcısını ayarlaması ve her saniye kullanıcı arayüzünü güncellemesi işini kendi bünyesinde gerçekleştirmesi gerekiyordu.

Aşağıdaki kodu bir kere yazdığımızda, Clock‘un artık kendi kendisini güncellemesini istiyoruz:

ReactDOM.render( <Clock />, document.getElementById('root') );

Bunu yapmak için, Clock bileşenine state eklememiz gerekiyor.

State’ler, prop’larla benzerlik gösterir. Fakat sadece ilgili bileşene özeldir ve yalnızca o bileşen tarafından kontrol edilirler.

Sınıf olarak oluşturulan bileşenlerin, fonksiyon bileşenlerine göre bazı ek özelliklerinin bulunduğundan bahsetmiştik. Bahsettiğimiz ek özellik yerel state değişkenidir ve sadece sınıf bileşenlerine özgüdür.

Bir Fonksiyonun Sınıfa Dönüştürülmesi
Clock gibi bir fonksiyon bileşenini 5 adımda sınıf bileşenine dönüştürebilirsiniz:

Öncelikle, fonksiyon ismiyle aynı isimde bir ES6 sınıfı oluşturun. Ve bu sınıfı React.Component‘tan türetin.
Sınıfın içerisine, render() adında boş bir fonksiyon ekleyin.
Fonksiyon bileşeni içerisindeki kodları render() metoduna taşıyın.
render() metodu içerisindeki props yazan yerleri, this.props ile değiştirin.

Son olarak, içi boşaltılmış fonksiyonu tamamen silin.

class Clock extends React.Component { render() { return ( <div> <h1>Hello, world!</h1> <h2>It is {this.props.date.toLocaleTimeString()}.</h2> </div> ); } }

Önceden fonksiyon bileşeni olan Clock, artık bir sınıf bileşeni haline gelmiş oldu.

Bu kodda render metodumuz, her güncelleme olduğunda yeniden çağrılacaktır. Fakat <Clock /> bileşenini aynı DOM düğümünde render ettiğimizden dolayı, Clock sınıfının yalnızca bir örneği kullanılacaktır. (singleton mı ???)

Bir Sınıfa Yerel State’in Eklenmesi

date değişkenini, props’tan state’e taşımamız gerekiyor. Bunu 3 adımda gerçekleştirebiliriz:

render() metodundaki this.props.date‘i this.state.date ile değiştirelim:

class Clock extends React.Component { render() { return ( <div> <h1>Hello, world!</h1> <h2>It is {this.state.date.toLocaleTimeString()}.</h2> </div> ); } }

state‘in ilk kez oluşturulacağı yer olan sınıf constructor‘ını ekleyelim:

class Clock extends React.Component { constructor(props) { super(props); this.state = {date: new Date()}; } render() { return ( <div> <h1>Hello, world!</h1> <h2>It is {this.state.date.toLocaleTimeString()}.</h2> </div> ); } }

props‘ı, constructor içerisinde nasıl oluşturduğumuza yakından bakalım:

constructor(props) { super(props); this.state = {date: new Date()}; }

Sınıf bileşenleri React.Component sınıfından türetildikleri için, daima super(props)‘u çağırmaları gerekir.

<Clock /> elementinden date prop’unu çıkaralım:

ReactDOM.render( <Clock />, document.getElementById('root') );

Zamanlayıcı kodunu, daha sonra Clock bileşenin içerisine ekleyeceğiz. Fakat şimdilik Clock bileşeninin son hali aşağıdaki gibi olacaktır:

class Clock extends React.Component { constructor(props) { super(props); this.state = {date: new Date()}; } render() { return ( <div> <h1>Hello, world!</h1> <h2>It is {this.state.date.toLocaleTimeString()}.</h2> </div> ); } } ReactDOM.render( <Clock />, document.getElementById('root') );

Şimdi Clock bileşenini, kendi zamanlayıcısını kuracak ve her saniye kendisini güncelleyecek şekilde ayarlayalım.

Bir Sınıfın Yaşam Döngüsü Kodlarının Eklenmesi

Birçok bileşene sahip uygulamalarda, bileşenler yok edildiğinde ilgili kaynakların bırakılması çok önemlidir.

Clock bileşeni ilk kez DOM’a render edildiğinde bir zamanlayıcı kurmak istiyoruz. React’te bu olaya “mounting” (değişkenin takılması) adı verilir.

Ayrıca, Clock bileşeni DOM’dan çıkarıldığında, zamanlayıcının da temizlenmesini istiyoruz. React’te bu olaya “unmounting” (değişkenin çıkarılması) adı verilir.

Clock bileşeni takılıp çıkarıldığında bazı işleri gerçekleştirebilmek için özel metotlar tanımlayabiliriz:

class Clock extends React.Component { constructor(props) { super(props); this.state = {date: new Date()}; } componentDidMount() { } componentWillUnmount() { } render() { return ( <div> <h1>Hello, world!</h1> <h2>It is {this.state.date.toLocaleTimeString()}.</h2> </div> ); } }

Bu metodlara “lifecycle methods” (yaşam döngüsü metodları) adı verilir.

Bileşenin çıktısı, DOM’a render edildikten sonra componentDidMount() metodu çalıştırılır. Burası aynı zamanda bir zamanlayıcı oluşturmak için en elverişli yerdir:

componentDidMount() { this.timerID = setInterval( () => this.tick(), 1000 ); }

this‘e (this.timerID) zamanlayıcı ID’sini nasıl atadığımızı inceleyebilirsiniz.

Daha önce de belirttiğimiz gibi, this.props React tarafından yönetiliyor, ve this.state‘in de özel bir yaşam döngüsü var. Eğer timerID gibi veri akışına dâhil olmayan değişkenleri saklamanız gerekiyorsa, bu örnekte yaptığımız gibi sınıf içerisinde değişkenler tanımlayabilirsiniz.

Oluşturduğumuz zamanlayıcıyı componentWillUnmount() yaşam döngüsü metodu içerisinde Clock bileşeninden söküp çıkaralım:

componentWillUnmount() { clearInterval(this.timerID); }

Son olarak, Clock bileşeninin saniyede bir çalıştıracağı tick() fonksiyonunu kodlayalım.

tick() fonksiyonu, this.setState()‘i çağırarak Clock bileşeninin yerel state’ini güncelleyecektir:

class Clock extends React.Component { constructor(props) { super(props); this.state = {date: new Date()}; } componentDidMount() { this.timerID = setInterval( () => this.tick(), 1000 ); } componentWillUnmount() { clearInterval(this.timerID); } tick() { this.setState({ date: new Date() }); } render() { return ( <div> <h1>Hello, world!</h1> <h2>It is {this.state.date.toLocaleTimeString()}.</h2> </div> ); } } ReactDOM.render( <Clock />, document.getElementById('root') );

Artık saat, her saniye başı tikleyerek mevcut zamanı görüntüleyecektir.

Şimdi kısa bir özet geçerek neler yaptığımızı ve sırasıyla hangi metotların çağrıldığını kontrol edelim:

ReactDOM.render() metoduna <Clock /> aktarıldığı zaman React, Clock bileşeninin constructor’ını çağırır. Clock bileşeni, mevcut saati görüntülemesi gerektiğinden dolayı, this.state‘e o anki zamanı atar. Daha sonra bu state güncellenecektir.

Devamında React, Clock bileşeninin render() metodunu çağırır. Bu sayede React, ekranda nelerin gösterilmesi gerektiğini bilir. Sonrasında ise Clock‘un render edilmiş çıktısı ile eşleşmek için ilgili DOM güncellemelerini gerçekleştirir.

Clock bileşeninin çıktısı DOM’a eklendiğinde, yaşam döngüsündeki componentDidMount() metodu çağrılır. Bu metodda Clock bileşeni, her saniyede bir tick() metodunun çalıştırılması gerektiğini tarayıcıya bildirir.

Tarayıcı her saniyede bir tick() metodunu çağırır. tick() metodunda Clock bileşeni, kullanıcı arayüzünü güncellemek için setState() metodunu çağırır ve bu metoda mevcut tarih/saat değerini aktarır. setState()‘in çağrılması sayesinde React, state’in değiştiğini anlar ve ekranda neyin görüntüleneceğini anlamak için tekrar render() metodunu çağırır. Artık render() metodundaki this.state.date‘in değeri eski halinden farklı olduğundan dolayı, render çıktısı güncellenmiş zamanı içerecek demektir. Buna göre React, DOM’u ilgili şekilde günceller.

Eğer Clock bileşeni, DOM’dan çıkarılırsa, yaşam döngüsündeki componentWillUnmount() metodu çağrılır ve tarayıcı tarafından zamanlayıcı durdurulmuş olur.
State’in Doğru Kullanımı

setState() hakkında bilmeniz gereken 3 şey bulunmaktadır.

State’i Doğrudan Değiştirmeyiniz

Örneğin, aşağıdaki kod bileşeni yeniden render etmeyecektir:

// Yanlış kullanım
this.state.comment = 'Hello';
Bunun yerine setState() kullanınız:

// Doğru kullanım this.setState({comment: 'Hello'});
this.state‘e atama yapmanız gereken tek yer, ilgili bileşenin constructor’ıdır.

State Güncellemeleri Asenkron Olabilir
React, çoklu setState() çağrılarını, performans için tekil bir güncellemeye dönüştürebilir.

this.props ve this.state, asenkron olarak güncellenebildiklerinden dolayı, sonraki state’i hesaplarken bu nesnelerin mevcut değerlerine güvenmemelisiniz.

Örneğin, aşağıdaki kod counter‘ı güncellemeyebilir:

// Yanlış kullanım this.setState({ counter: this.state.counter + this.props.increment, });
Bunu düzeltmek için, setState()‘in ikinci formunu kullanmamız gerekir. Bu formda setState() fonksiyonu, parametre olarak nesne yerine fonksiyon alır. Bu fonksiyon, ilk parametre olarak önceki state’i, ikinci parametre olarak da o anda güncellenen props değerini alır:

// Doğru kullanım this.setState((state, props) => ({ counter: state.counter + props.increment }));
Yukarıda bir ok fonksiyonu kullandık. Fakat normal fonksiyonlarla da gayet çalışabilir:

ok fonksiyonu = lambda fonksiyon

// Doğru kullanım this.setState(function(state, props) { return { counter: state.counter + props.increment }; });

**State Güncellemeleri Birleştirilir**

React, setState()‘i çağırdığınızda, parametre olarak verdiğiniz nesneyi alıp mevcut state’e aktarır.

Örneğin, state’iniz aşağıdaki gibi birçok bağımsız değişkeni içerebilir:

constructor(props) { super(props); this.state = { posts: [], comments: [] }; }

Ve siz de bu değişkenleri, ayrı birer setState() çağrıları ile güncellemek isteyebilirsiniz:

componentDidMount() { fetchPosts().then(response => { this.setState({ posts: response.posts }); }); fetchComments().then(response => { this.setState({ comments: response.comments }); }); }

Birleşme işlemi yüzeysel olduğundan dolayı, this.setState({comments}) çağrısı this.state.posts değişkenini değişmeden bırakırken, this.state.comments‘i tamamıyla değiştirecektir.

Verinin Alt Bileşenlere Aktarılması

Ne üst, ne de alt bileşenler, belirli bir bileşenin state’li veya state’siz olduğunu bilemez. Ayrıca o bileşenin fonksiyon veya sınıf olarak tanımlanmasını da önemsemezler.

Bu nedenle state’e, yerel state denir. State, kendisine sahip olan ve kendisini ayarlayan bileşen haricinde hiçbir bileşen için erişilebilir değildir.

Bir bileşen kendi state’ini, prop’lar aracılığıyla alt bileşenlere aktarabilir:

<FormattedDate date={this.state.date} />

FormattedDate bileşeni, date değişkenini props’tan alabilir. Ve bunu alırken Clock‘un state’inden mi yoksa prop’undan mı geldiğini bilemez. Hatta date değişkeni, Clock bileşeni içerisinde state’ten harici olarak tanımlanmış bir değer de olabilir ve bunu da bilmesine imkânı yoktur:

function FormattedDate(props) { return <h2>It is {props.date.toLocaleTimeString()}.</h2>; }
Bu olaya genellikle yukarıdan-aşağıya veya tek yönlü veri akışı denir. Her state, belirli bir bileşen tarafından tutulur. Bu bileşenden türetilen herhangi bir veri veya kullanıcı arayüzü, yalnızca bu bileşenin altındaki bileşen ağacına etki edebilir.

Bileşen ağacını, prop’lardan oluşan bir şelale olarak düşünebilirsiniz. Her bileşenin state’i, prop’ları istenilen bir noktada birleştirebilen ve aynı zamanda alt bileşenlere de akıtan ek bir su kaynağı gibidir.

React uygulamalarında, bir bileşenin state’li veya state’siz olması, bir kodlama detayıdır ve zaman içerisinde değişkenlik gösterebilir. State’li bileşenler içerisinde, state’siz bileşenleri kullanabilirsiniz. Veya bu durumun tam tersi de geçerlidir.


## Olay Yönetimi – React

https://tr.reactjs.org/docs/handling-events.html

React’teki olay yönetimi, DOM elementlerindeki olay yönetimi ile oldukça benzerdir. Sadece, bazı küçük sözdizimi farklılıkları bulunmaktadır:

Olay isimleri, DOM’da lowercase iken, React’te camelCase olarak adlandırılır.
DOM’da fonksiyon isimleri, ilgili olaya string olarak atanırken, JSX’te direkt fonksiyon olarak atanır.

Örneğin HTML’de aşağıdaki gibi olan kod:

<button onclick="activateLasers()"> Activate Lasers </button>
React’te biraz daha farklıdır:

<button onClick={activateLasers}> Activate Lasers </button>
React’teki diğer bir farklılık ise, olaylardaki varsayılan davranışın false değeri döndürülerek engellenemiyor oluşudur. Bunun için preventDefault şeklinde açıkça yazarak tarayıcıya belirtmeniz gerekir. Örneğin düz bir HTML kodunda, bir <a> elementinin yeni bir sayfayı açmasını engellemek için aşağıdaki gibi yazabilirsiniz:

<a href="#" onclick="console.log('The link was clicked.'); return false"> Click me </a>
React’te ise varsayılan <a> elementi davranışını e.preventDefault() kodu ile engellemeniz gerekir:

function ActionLink() { function handleClick(e) { e.preventDefault(); console.log('The link was clicked.'); } return ( <a href="#" onClick={handleClick}> Click me </a> ); }
Burada e, bir sentetik olaydır. React, bu sentetik olayları W3C şartnamesine göre tanımlar. Bu sayede, tarayıcılar arası uyumsuzluk problemi oluşmaz. Bu konuda daha fazla bilgi edinmek için Sentetik Olaylar rehberini inceleyebilirsiniz.

React ile kod yazarken, bir DOM elementi oluşturulduktan sonra ona bir dinleyici (listener) atamak için, addEventListener fonksiyonunu çağırmanıza gerek yoktur. Bunun yerine render fonksiyonunda, ilgili element ilk kez render olduğunda ona bir dinleyici (listener) atamanız doğru olacaktır.

ES6 sınıfı kullanarak bir bileşen oluşturulduğunda, ilgili olayın tanımlanması için en yaygın yaklaşım, ilgili metodun o sınıf içerisinde oluşturulmasıdır. Örneğin aşağıdaki Toggle bileşeni, “ON” ve “OFF” durumlarının gerçekleştirilmesi için bir butonu render etmektedir:

class Toggle extends React.Component { constructor(props) { super(props); this.state = {isToggleOn: true}; // Callback içerisinde `this` erişiminin çalışabilmesi için, `bind(this)` gereklidir this.handleClick = this.handleClick.bind(this); } handleClick() { this.setState(state => ({ isToggleOn: !state.isToggleOn })); } render() { return ( <button onClick={this.handleClick}> {this.state.isToggleOn ? 'ON' : 'OFF'} </button> ); } } ReactDOM.render( <Toggle />, document.getElementById('root') );
JSX callback’lerinde this kullanırken dikkat etmeniz gerekmektedir. Çünkü JavaScript’te, sınıf metotları varsayılan olarak this‘e bağlı değillerdir. Bu nedenle, this.handleClick‘i bind(this) ile bağlamayı unutarak onClick‘e yazarsanız, fonksiyon çağrıldığında this değişkeni undefined hale gelecek ve hatalara sebep olacaktır.

Bu durum, React’e özgü bir davranış biçimi değildir. Aslen, fonksiyonların JavaScript’te nasıl çalıştığı ile ilgilidir. Genellikle, onClick={this.handleClick} gibi bir metot, parantez kullanmadan çağırırken, o metodun bind edilmesi gerekir.

Eğer sürekli her metot için bind eklemek istemiyorsanız, bunun yerine farklı yöntemler de kullanabilirsiniz. Örneğin, henüz deneysel bir özellik olan public class fields yöntemini kullanırsanız, callback’leri bağlamak için sınıf değişkenlerini kullanabilirsiniz:

class LoggingButton extends React.Component { 

    // Bu yazım şekli, `this`'in handleClick içerisinde bağlanmasını sağlar. 
    // Uyarı: henüz *deneysel* bir özelliktir. 
    handleClick = () => { console.log('this is:', this); } 

    render() { return ( <button onClick={this.handleClick}> Click me </button> );}}

Bu yöntem, Create React App ile oluşturulan geliştirim ortamında varsayılan olarak gelir. Böylece hiçbir ayarlama yapmadan kullanabilirsiniz.

Eğer bu yöntemi kullanmak istemiyorsanız, callback içerisinde ok fonksiyonunu da kullanabilirsiniz:

class LoggingButton extends React.Component { handleClick() { console.log('this is:', this); } render() { // Bu yazım şekli, `this`'in handleClick içerisinde bağlanmasını sağlar. return ( <button onClick={() => this.handleClick()}> Click me </button> ); } }

Fakat bu yöntemin bir dezavantajı vardır. LoggingButton bileşeni her render edildiğinde, yeni bir callback oluşturulur. Birçok durumda bu olay bir sorun teşkil etmez. Ancak ilgili callback, prop aracılığıyla alt bileşenlere aktarılırsa, bu bileşenler fazladan render edilebilir. Bu tarz problemlerle karşılaşmamak için binding işleminin, ya sınıfın constructor’ında ya da class fields yöntemi ile yapılmasını öneririz.

Olay Yöneticilerine Parametre Gönderimi

Bir döngü içerisinde, olay fonksiyonuna fazladan parametre göndermek isteyebilirsiniz. Örneğin, bir satır ID’si için id parametresi, aşağıdaki kodlardan her ikisi de işinizi görecektir:

<button onClick={(e) => this.deleteRow(id, e)}>Delete Row</button> 
<button onClick={this.deleteRow.bind(this, id)}>Delete Row</button>

Üstteki iki satır birbiriyle eş niteliktedir. Ve sırasıyla ok fonksiyonu ile Function.prototype.bind fonksiyonu kullanırlar.

Her iki durum için de e parametresi, ID’den sonra ikinci parametre olarak aktarılacak bir React olayını temsil eder. Ok fonksiyonunda bu parametre açık bir şekilde tanımlanırken, bind fonksiyonunda ise otomatik olarak diğer parametreler ile birlikte gönderilir.
