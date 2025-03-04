


# WPF'de Grid'e Dinamik Olarak Row Eklemek

WPF'de bir `Grid` control'üne dinamik olarak bir satır (`Row`) eklemek için aşağıdaki adımları izleyebilirsiniz:

## Adımlar

1. **Yeni Satır Tanımlama (RowDefinition)**
   - `RowDefinition` nesnesi oluşturulur.
   - Bu nesne, ilgili `Grid`'in `RowDefinitions` koleksiyonuna eklenir.

2. **Kontrol Eklemek**
   - Yeni bir WPF kontrolü (ör. `TextBlock`) oluşturulur.
   - `Grid.SetRow()` metodu ile bu kontrolün, eklenen yeni satıra yerleştirileceği belirtilir.
   - Yeni kontrol, `Grid.Children.Add()` kullanılarak grid'e eklenir.

## Örnek Kod

```csharp
private void ActBtnTest(object sender, RoutedEventArgs e)
{
    // Yeni bir RowDefinition oluştur
    var newRow = new RowDefinition();
    newRow.Height = GridLength.Auto; // İsteğe bağlı olarak yüksekliğini belirtebilirsiniz
    
    // Oluşturulan RowDefinition'ı Grid'e ekle
    myGrid.RowDefinitions.Add(newRow);

    // Yeni bir içerik (örneğin TextBlock) oluştur ve Grid'e ekle
    var newTextBlock = new TextBlock
    {
        Text = "Yeni Eklenmiş İçerik",
        FontSize = 16,
        Margin = new Thickness(5)
    };

    // İçeriğin hangi satırda yer alacağını belirle
    Grid.SetRow(newTextBlock, myGrid.RowDefinitions.Count - 1);

    // Grid'e içeriği ekle
    myGrid.Children.Add(newTextBlock);
}
```

## Açıklamalar

- **`RowDefinition` Nesnesi:** 
  Yeni satır eklemek için bir `RowDefinition` nesnesi oluşturulmalı ve `Grid.RowDefinitions` koleksiyonuna eklenmelidir.
  
- **İçerik Eklemek:** 
  - Yeni bir WPF kontrolü (ör. `TextBlock`) oluşturulur.
  - `Grid.SetRow()` metodu ile kontrolün yerleşeceği satır belirlenir.
  - Grid'e eklenecek tüm içerikler sonrasında `Grid.Children.Add()` ile grid'e dahil edilir.

## Örnek Senaryo

XAML'de adı `myGrid` olan bir grid'iniz varsa, yukarıdaki kodu kullanarak grid'e her buton tıklamasında bir satır ve metin ekleyebilirsiniz.

## Buton ile Event Bağlamak için Örnek XAML

```xaml
<Button Content="Satır Ekle" Click="ActBtnTest" />
```

Her tıklamada, `Grid` kontrolüne yeni bir satır eklenir ve içine "Yeni Eklenmiş İçerik" yazılı bir `TextBlock` yerleştirilir.

