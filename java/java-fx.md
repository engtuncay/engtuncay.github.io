

---
<!-- TOC -->

- [Temel Pencere Sistemi ( Stage (Sahne) and Scene (Dekor) )](#temel-pencere-sistemi--stage-sahne-and-scene-dekor-)
    - [Stage](#stage)
    - [Scene](#scene)
    - [Layout Sistemleri](#layout-sistemleri)
        - [Gridpane](#gridpane)
        - [Stack Pane](#stack-pane)
        - [MigLayout](#miglayout)

<!-- /TOC -->
---


[TOC]


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

- **Pencere stage (sahne,platform), Pencerenin içi scene (dekor) dir.** Sahne, stage aynıdır, scene yani sahne dekoru değişebilir. Aynı sahnede (stage), farklı dekorlar (aşamalar,oyunlar)(scene) sahnelenebilir.

- Hosted by a stage. ( Bir sahne(scene), stage tarafından barındırılır/evsahipliği yapılır/ağırlanır.

- Container for elements that comprise the scene (Dekor elemanlarını kendi içinde barındırır.)

- Consists of a scene graph. ( Scene graph içerir.)

- Elements of a scene are nodes. ( Scene elemanları (küme elemanları gibi...) node'lardır.) Examples textbox, button, checkbox etc.

- Parent nodes can contain other child nodes. ( Ebeveyn node, çocuk nodelarını içerir.)

*All are subclasses of Node*

- Root node temel node dur. Root node, stack pane veya border pane yerleştirilebilir

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
panel.add(comp3, "wrap")   // Wrap to next row. Bir sonraki satıra geçiş yapar.
panel.add(comp4)

```










