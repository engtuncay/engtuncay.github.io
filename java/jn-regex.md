

# Matcher Methods

Java'da "Matcher" sınıfı, düzenli ifadeleri kullanarak metinler üzerinde arama ve eşleştirme işlemleri yapmak için kullanılır. İşte Java'da Matcher sınıfının temel yöntemleri:

matches(): Matcher nesnesi, verilen düzenli ifadeyi tamamen hedef metinle eşleştirip eşleşmediğini kontrol eder. Eğer tam bir eşleşme varsa true, yoksa false döner.

```java
Pattern pattern = Pattern.compile("abc");
Matcher matcher = pattern.matcher("abcdef");
boolean isMatch = matcher.matches();

```

find(): Matcher, hedef metinde düzenli ifadeyi arar ve ilk eşleşmeyi bulur. Eşleşme bulunursa true, aksi takdirde false döner.

```java
Pattern pattern = Pattern.compile("abc");
Matcher matcher = pattern.matcher("abcdef");
boolean isFound = matcher.find();

```

group(): Eşleşen metni döndürmek için kullanılır. find() veya matches() kullanıldıktan sonra bu yöntemle eşleşen metni alabilirsiniz.

```java
Pattern pattern = Pattern.compile("abc");
Matcher matcher = pattern.matcher("abcdef");
if (matcher.find()) {
    String matchedText = matcher.group();
}

```

start() ve end(): Bu yöntemler, eşleşen metnin başlangıç ve bitiş indekslerini verir.

```java
Pattern pattern = Pattern.compile("abc");
Matcher matcher = pattern.matcher("abcdef");
if (matcher.find()) {
    int startIndex = matcher.start();
    int endIndex = matcher.end();
}

```

replaceAll() ve replaceFirst(): Matcher, hedef metindeki düzenli ifadeyi değiştirmek için kullanılabilir.

```java
Pattern pattern = Pattern.compile("apple");
Matcher matcher = pattern.matcher("I have an apple and an apple tree.");
String replacedText = matcher.replaceAll("orange");

```

Bu yöntemler, Java'da Matcher sınıfını kullanarak düzenli ifadelerle metin işlemleri yapmak için temel olarak kullanılır. Daha fazla detaylı bilgi için Java dokümantasyonuna başvurabilirsiniz.

## Append and Tail Method

Java'nın Matcher sınıfının append yöntemleri, bir Matcher nesnesinin eşleşen metinleri ve metinler arasındaki boşlukları işlemek için kullanılır. İşte bu yöntemlerin bir listesi:

Matcher appendReplacement(StringBuffer sb, String replacement): Bu yöntem, eşleşen metinleri ve aralarındaki metinleri değiştirerek verilen bir dize ile değiştirir ve sonucu verilen bir StringBuffer nesnesine ekler. Örneğin:

```java
Matcher matcher = pattern.matcher(inputString);
StringBuffer result = new StringBuffer();
while (matcher.find()) {
    matcher.appendReplacement(result, replacementString);
}
matcher.appendTail(result);
String finalResult = result.toString();

```

Matcher appendReplacement(StringBuilder sb, String replacement): Bu, StringBuffer yerine bir StringBuilder kullanmanız gerektiğinde kullanabileceğiniz aynı işlevi sağlar.

Matcher appendTail(StringBuffer sb): Bu yöntem, appendReplacement yöntemi ile değiştirilen metin sonrasındaki kısmı ekler. Örneğin, yukarıdaki kod parçasında görüldüğü gibi kullanılır.

Bu yöntemler, metin üzerinde eşleşenlerin değiştirilmesi ve sonuç metninin oluşturulması için oldukça kullanışlıdır. Matcher sınıfının belgelendirmesine başvurarak daha fazla ayrıntı ve örnek kodlara ulaşabilirsiniz.

## GroupName

Java'da isimle gruplandırılmış (named group) regex kullanımı için aşağıdaki bilgileri kullanabilirsiniz:

Java'da isimle gruplandırılmış bir regex kullanmak için `(?<groupName>...)` sözdizimini kullanabilirsiniz. Bu şekilde bir grup oluştururken, bu grubun adını groupName olarak belirlersiniz. İşte bir örnek:

```java
import java.util.regex.*;

public class NamedGroupExample {
    public static void main(String[] args) {
        String text = "Merhaba, Benim adım John ve Benim yaşım 30.";
        String pattern = "Benim adım (?<name>[A-Za-z]+) ve Benim yaşım (?<age>\\d+).";

        Pattern compiledPattern = Pattern.compile(pattern);
        Matcher matcher = compiledPattern.matcher(text);

        if (matcher.find()) {
            String name = matcher.group("name");
            String age = matcher.group("age");

            System.out.println("Ad: " + name);
            System.out.println("Yaş: " + age);
        }
    }
}

```

Bu örnekte, metin içindeki ad ve yaş bilgisini gruplar halinde alıyoruz ve bu gruplara "name" ve "age" adlarını atıyoruz.

Bu şekilde isimle gruplandırılmış regex kullanarak, eşleşen verileri daha okunabilir ve yönetilebilir hale getirebilirsiniz.
