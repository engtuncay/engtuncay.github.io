
İş mantığı yapan sınıflarda statik metod mu, instance metod mu tercih edilmeli ?

Analiz

EmbEdmHelper sınıfında her iki tür metod da var:

Instance metod: getEdmAnaPostaKutu() - constructor ile connProfile öğreniliyor

Statik metod: getEdmAnaPostaKutu(String connProfile) - connProfile parametre olarak alınıyor

Recommendation: Instance Metod

İş mantığı sınıflarında instance metod tercih edilmelidir. İşte nedenler:

✅ Instance Metod Avantajları:
- Encapsulation - connProfile sınıf içinde saklanır, her çağrıda tekrarlanmaz
- Dependency Injection - Constructor üzerinden bağımlılıklar enjekte edilir (testleme kolaylaşır)
- State Yönetimi - Sınıf instance'ı gerektiğinde durumu (state) tutabilir
- OOP Prensibi - İş mantığı sınıfları nesneler olarak davranmalı
- Mocklanabilirlik - Unit testlerde mock nesneler kullanılabilir

❌ Statik Metod Dezavantajları:
- Testleme Zor - Statik metodu mock etmek zordur
- Dependency Injection Zor - Parametreler her çağrıda geçirilmeli
- State Tutamama - Statik üyeler thread-safety sorunları yaratabilir
- Reusability Düşük - Aynı connProfile birden fazla işlem yapılacaksa tekrar tekrar geçilir

Tavsiye

```java
// ✅ TERCIH: Instance metod
public Fdr getEdmAnaPostaKutu() {
    RepoEntAppConfig repoEntAppConfig = new RepoEntAppConfig(getConnProfile());
    // ...
}

```

// ❌ KALDIRABILIR: Statik metod

```java
// Statik versionu kaldırıp, gerektiğinde instance oluşturup kullanın
EmbEdmHelper helper = new EmbEdmHelper("profile");
Fdr result = helper.getEdmAnaPostaKutu();

```

Sonuç: İş mantığı sınıflarında instance metod kullanın. Statik metod sadece utility/helper sınıfları için uygun (örn: string formatting, date utilities).

# Mock Example

Statik metodu mocklama zorluğunu somut bir örnekle açıklayacağım:

Statik Metod Mocklama Sorunu

❌ Statik Metod - Mock Edilemez

```java
// EmbEdmHelper.java
public static Fdr getEdmAnaPostaKutu(String connProfile) {
    RepoEntAppConfig repoEntAppConfig = new RepoEntAppConfig(connProfile);
    Fdr fdrEdmAnaPostaKutusu = repoEntAppConfig.selAppConfigV2(...);
    return fdrEdmAnaPostaKutusu;
}

// Test sınıfı
@Test
public void testGetEdmAnaPostaKutu() {
    // 🚨 SORUN: EmbEdmHelper.getEdmAnaPostaKutu() statik olduğu için
    // bu metodu mock edemezsiniz. Gerçek RepoEntAppConfig çalışır.
    // Veritabanına gerçek bağlantı yapılır → testler yavaş ve bağımlı olur
    
    Fdr result = EmbEdmHelper.getEdmAnaPostaKutu("profile");
    // Bunu mock edemem!
}

```

✅ Instance Metod - Mock Edilebilir

```java
// EmbEdmHelper.java
public class EmbEdmHelper extends AbsEmbEntegre {
    public EmbEdmHelper(String connProfile) {
        super(connProfile);
    }

    public Fdr getEdmAnaPostaKutu() {
        RepoEntAppConfig repoEntAppConfig = new RepoEntAppConfig(getConnProfile());
        Fdr fdrEdmAnaPostaKutusu = repoEntAppConfig.selAppConfigV2(...);
        return fdrEdmAnaPostaKutusu;
    }
}

// Test sınıfı (Mockito ile)
@Test
public void testGetEdmAnaPostaKutu() {
    // ✅ EmbEdmHelper'ı mock edebilirim
    EmbEdmHelper mockHelper = mock(EmbEdmHelper.class);
    
    Fdr mockResult = new Fdr();
    mockResult.setBoResult(true);
    
    // Metodun davranışını belirlerim
    when(mockHelper.getEdmAnaPostaKutu()).thenReturn(mockResult);
    
    // Test yapılır - veritabanı çalışmaz
    assertEquals(true, mockHelper.getEdmAnaPostaKutu().isTrueBoResult());
}

```

Temel Fark

| Yön        | Statik Metod              | Instance Metod            |
|------------|---------------------------|---------------------------|
| Mock       | ❌ Zor (PowerMock gerekli) | ✅ Kolay (Mockito)         |
| Bağımlılık | Sınıfta gömülü            | Constructor'dan geçirilir |
| Test       | Gerçek kod çalışır        | Mock ile izole edilir     |
| Hız        | Yavaş (DB çalışır)        | Hızlı (DB yanıtlanmaz)    |

Özet: Instance metod kullandığınızda, test sırasında RepoEntAppConfig gibi bağımlılıkları mock edebilirsiniz ve veritabanına erişim yapmadan testler çalışır.