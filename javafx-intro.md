

Java Fx Contents

- [Temel Pencere Sistemi ( Stage (Sahne) and Scene (Dekor) )](#temel-pencere-sistemi--stage-sahne-and-scene-dekor-)
	- [Stage](#stage)
	- [Scene](#scene)
	- [Layout Sistemleri](#layout-sistemleri)
		- [Gridpane](#gridpane)
		- [Stack Pane](#stack-pane)
		- [MigLayout](#miglayout)
- [Observable Value List](#observable-value-list)
	- [Converting Integer to ObservableValue<Integer> in javafx](#converting-integer-to-observablevalueinteger-in-javafx)

---

# Temel Pencere Sistemi ( Stage (Sahne) and Scene (Dekor) )

## Stage
- **Top level container**
- At least one stage called primary stage
- Primary stage is created by runtime on startup
- Container for scenes.
- Scene objeleri için konteynırdır.
- Appearance and functionality varies based on platform
- Stage sahne , Scene perde,dekor.


## Scene
- **Pencere stage (sahne,platform), Pencerenin içi scene (dekor) dir.** Aynı sahnede(stage) farklı dekorlar veya oyunlar(scene) sahnelenebilir.
- Hosted by a stage. ( Bir sahne(scene), stage tarafından barındırılır/evsahipliği yapılır/ağırlanır).
- Container for elements that comprise the scene (Dekor elemanlarını içine alan bir settir,kümedir.)
- Consists of a scene graph. ( Scene graph içerir.)
- Elements of a scene are nodes. ( Scene elemanları (küme elemanları gibi...) node'lardır.) Examples textbox, button, checkbox etc.
- Parent nodes can contain other child nodes. ( Ebeveyn node, çocuk node'larını içerebilir.)
*All are subclasses of Node*
- Root node temel node dur. Örneğin root node'a, stack pane veya border pane yerleştirilebilir

## Layout Sistemleri
- alignment : bir üst node içerisinde nasıl konumlanacak
- x ve y koordinat sistemindeki gibidir: x ekseni yatay eksen (<-->) ve y ekseni dikey eksendir (|).

### Gridpane
- hgap:
- vgap:
- gridLinesVisable : ızgaraları gösterir
- columnConstraints child element eklenebilir. Column yani sütunun percentWidth attribute ile yüzdelik olarak ne kadar kapsayacağını belirleriz.
- ​
- **Compenentinin attribute yazılacak özellikler:**
- Gridpane.rowIndex : konumunun satır indeksi
- Gridpane.columnIndex : konumunun sütun indeksi

### Stack Pane
Yığındır. Üst üste gelir componentler. Resimleri üst üste atılır. Slider için kullanılabilir.
Docs oracle javafx layout dan detaylı bilgi alınabilir
- gridpane içindeki alignment attribute içindeki child ların nereye yaslanacağını gösterir
- gridpane etiketi hgap vgap gridlinesvisible style gibi attribute ları alabilir
- columconstraint ile pencere büyüdüğünde sütunlar nasıl büyütüleceğini belirtiriz. Columnconstraints etiketi percentWidth attribute na yüzdelik büyüme belirtebiliyoruz
- child element gridpane etiketi içine yazılır. Hangi yere konumlanacağı gridpane. Rowindex ve gridpane. Columnindex i ile belirtilir.
- içindeki alignment ını gridpane. halignment attribute ile belirtilir
- içine boşluk için padding etiketi kullanılır. Padding etiketinin içinde insets etiketi ile iç boşluğu ayarlanır

### MigLayout

```java
// iki satır
panel.add(comp1)
panel.add(comp2)
panel.add(comp3, "wrap") // Wrap to next row. Bir sonraki satıra geçiş yapar.
panel.add(comp4)
```
Örnek MigLayout Tasarım
```java
// Main Layouts
        migHeader = new MigPane("debug,insets 0","[]","[]"); //[][][grow,fill][][grow,fill]
        migContent = new MigPane("debug,insets 0","[]","[]"); //[][][grow,fill][][grow,fill]
        migMain = new MigPane("fill,debug,insets 0","[grow,fill]","[][grow,fill]"); //[][][grow,fill][][grow,fill]
        migMain.add(migHeader,"span"); // gap 0 , pushy
        migMain.add(migContent,"span");
        // initialize components
        lblEskiSifre= new FxLabel("Eski Şifre");
        lblTekrar = new FxLabel("Tekrar");
        lblYeniSifre = new FxLabel("Yeni Şifre");
        lblMesaj= new FxLabel("Lütfen gerekli bilgileri doldurunuz.");
        txfEskiSifre= new FxTextField();
        txfTekrar=new FxTextField();
        txfYeniSifre= new FxTextField();
        btnOnayla=new FxButton("Onayla");
        //
        migForm1 = new MigPane("debug,insets 0","0[]","0[]");
        //migForm1.setPadding(new Insets(0,0,0,0));
        migForm1.add(lblEskiSifre,"");
        migForm1.add(txfEskiSifre,"wrap");
        migForm1.add(lblYeniSifre,"");
        migForm1.add(txfYeniSifre,"wrap");
        migForm1.add(lblTekrar,"");
        migForm1.add(txfTekrar,"wrap");
        migContent.add(migForm1,"span"); //span,gap 0
        // Toolbar contente ekleyelim
        hBoxToolbar1 = new HBox(5);
        //hBoxToolbar1.setPadding(new Insets(0,0,0,0));
        hBoxToolbar1.getChildren().add(btnOnayla);
        hBoxToolbar1.setStyle("-fx-border-color: black;");
        migHeader.add(new Label("Header"), "span");
        migContent.add(lblMesaj,"span");
        migContent.add(hBoxToolbar1, "span");
//      migForm1.setStyle("-fx-border-color: black;");
//      migContent.setStyle("-fx-border-color: black;");
//      migHeader.setStyle("-fx-border-color: black;");
//      migMain.setStyle("-fx-border-color: black;");
        //migContent.add(lblMesaj, "span");
        //lblMesaj.setVisible(false);
        //lblMesaj.setManaged(false);
```


```java
// **** Main Layouts
// inset , css'deki padding yerine geçiyor
// gap , mig container daki satır ve sütunların arasındaki boşluğu belirtir
```



# Observable Value List

## Converting Integer to ObservableValue<Integer> in javafx

We use a ReadOnlyObjectWrapper<>(*integer value*); and store the value in a ObservableValue<Integer> reference.

```java
ObservableValue<Integer> obsInt = new ReadOnlyObjectWrapper<>(intValue);
```

Update

Starting JavaFX 8, you can also do the following :

```java
ObservableValue<Integer> obsInt = new SimpleIntegerProperty(intValue).asObject();
```

