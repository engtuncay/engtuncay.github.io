

### Stage

- Top level container

- At least one stage called primary stage

- Primary stage is created by runtime on startup

- Container for scenes

- Appearance and functionality varies based on platform


### Scene

- Pencere stage, Pencerenin içi scene dir. 

- Hosted by a stage

- Container for elements that comprise the scene 

- Consists of a scene graph

Elements of a scene are nodes

Textbox, button, checkbox etc.

Parent nodes can contain other child nodes

*All are subclasses of Node*

Root node temel node dur. Root node, stack pane veya border pane yerleştirilebilir

Stack Pane

Yığındır. Üst üste gelir componentler. Resimleri üst üste atılır. Slider için kullanılabilir. 

Docs oracle javafx layout dan detaylı bilgi alınabilir 

- gridpane içindeki alignment attribute içindeki child ların nereye yaslanacağını gösterir

- gridpane etiketi hgap vgap gridlinesvisible style gibi attribute ları alabilir

- columconstraint ile pencere büyüdüğünde sütunlar nasıl büyütüleceğini belirtiriz. Columnconstraints etiketi percentWidth attribute na yüzdelik büyüme belirtebiliyoruz 

- child element gridpane etiketi içine yazılır. Hangi yere konumlanacağı gridpane. Rowindex ve gridpane. Columnindex i ile belirtilir. 
- içindeki alignment ını gridpane. halignment attribute ile belirtilir 

- içine boşluk için padding etiketi kullanılır. Padding etiketinin içinde insets etiketi ile iç boşluğu ayarlanır 





