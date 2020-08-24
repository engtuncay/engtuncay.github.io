



## JSX'e Giriş – React

https://tr.reactjs.org/docs/introducing-jsx.html

JSX, React elementleri oluşturmanızı sağlar. Sonraki bölümde bu elementlerin nasıl DOM’a render edileceğine değineceğiz.
HTML ve JavaScript kodlarının ayrı dosyalarda tutularak teknolojilerin birbirinden yapay bir şekilde ayrılması yerine React, hem HTML hem de JavaScript kodu barındıran ve birbirine gevşek bir şekilde bağlı olan bileşenler (components) sayesinde ilgili işlerin ayrılmasını sağlar.
Fakat hala HTML kodlarının JavaScript içerisine konulması sizi rahatsız ediyorsa bu video sizi ikna edecektir.
React, JSX kullanımını zorunlu tutmaz.
JSX İçerisinde JavaScript Kodlarının Kullanımı
JSX’te süslü parantezler arasına dilediğiniz herhangi bir JavaScript ifadesini yazabilirsiniz. Örneğin, 2 + 2, user.firstName, veya formatName(user) gibi JavaScript ifadelerini kullanabilirsiniz.
Okunabilirliği arttırmak için JSX kodunu birkaç satır halinde yazdık. Buradaki gibi, JSX kodunu birçok satır halinde yazarken, kodu parantezler ile sarmalamanızı öneririz. Bu sayede otomatik olarak noktalı virgül eklenmesi ile oluşan birçok hatanın önüne geçebilirsiniz.

JSX de bir JavaScript İfadesidir
Oluşan derlemenin ardından JSX ifadeleri, sıradan JavaScript fonksiyon çağrılarına dönüşür ve bu fonksiyonlar JavaScript nesnelerini işleyecek şekilde çalışırlar.

Bir HTML elemanı için string ifadelerini çift tırnak içerisinde atayabilirsiniz:

const element = <div tabIndex="0"></div>;
Ayrıca bir JavaScript ifadesini, elemanın özelliği olarak tanımlamak için süslü parantezler ile sarmalayabilirsiniz:

const element = <img src={user.avatarUrl}></img>;
Bir JavaScript ifadesini, herhangi bir özellik içerisine yazarken çift tırnak kullanmayınız. String için çift tırnak, JavaScript ifadeleri için süslü parantezler kullanmalısınız. Aynı özellik için hem çift tırnak hem de süslü parantez kullanmayınız.
Uyarı:

JSX ifadeleri, HTML’den ziyade JavaScript’e daha yakındırlar. Bu nedenle React DOM, özellik isimlendirme için HTML’deki gibi bir isimlendirme yerine camelCase isimlendirme standardını kullanmaktadır.

Örneğin JSX içerisinde class özelliği className, ve tabindex özelliği de tabIndex olarak yazılmalıdır.

JSX ile Alt Elemanların Tanımlanması
Eğer bir HTML etiketinin içeriği boş ise, XML’deki gibi /> kullanarak etiketi kapatabilirsiniz:

const element = <img src={user.avatarUrl} />;
JSX etiketleri alt elemanlar da içerebilir:

const element = ( <div> <h1>Hello!</h1> <h2>Good to see you here.</h2> </div> );
JSX, Injection Saldırılarını Engeller
JSX’te kullanıcı girdisini koda direkt olarak gömmek güvenlidir:

const title = response.potentiallyMaliciousInput; // Bu kullanım güvenlidir: const element = <h1>{title}</h1>;
Çünkü varsayılan olarak React DOM, render işlemi öncesinde gömülen değerlerdeki <, & gibi bazı özel karakterleri &lt; ve &amp; olacak şekilde dönüştürür. Böylece uygulama içerisinde, kullanıcının yazabileceği kötü amaçlı kodların enjekte edilmesi engellenmiş olur. Render işlemi öncesi her şey string ifadeye dönüştürüldüğünden dolayı, XSS saldırıları engellenmiş olur.

JSX, JavaScript Nesnelerini Temsil Eder
Babel derleyicisi, JSX kodlarını React.createElement() çağrılarına dönüştürür.

Bu nedenle aşağıdaki iki kod örneği de aynı işlemi gerçekleştirir:

const element = ( <h1 className="greeting"> Hello, world! </h1> );
const element = React.createElement( 'h1', {className: 'greeting'}, 'Hello, world!' );
React.createElement() çağrısı, hatasız kod yazmanız için size yardımcı olacak birtakım kontrolleri gerçekleştirir. Aslında yaptığı şey, aşağıdaki gibi bir nesne oluşturmaktadır:
// Not: bu yapı basitleştirilmiştir const element = { type: 'h1', props: { className: 'greeting', children: 'Hello, world!' } };
Bu nesnelere “React elementleri” adı verilir.
İpucu:

ES6 ve JSX kodlarının uygun şekilde renklendirilmesi için, kod editörünüzde “Babel” dil tanımlamalarını kullanmanızı öneririz.