**Özpaş Entegre Geliştirici Dökümantasyonu**

- [Meta Datalar](#meta-datalar)
  - [FiColsEntegre - Entegre Sütun Objeleri](#ficolsentegre---entegre-sütun-objeleri)
  - [MetaEntConst](#metaentconst)
- [Layout](#layout)
  - [Hide Component](#hide-component)
- [Dialog Pencereleri](#dialog-pencereleri)
  - [Pop Dialog - Info Warn Error](#pop-dialog---info-warn-error)
  - [String deger Alan Dialog](#string-deger-alan-dialog)
- [Ozpas Fx Component](#ozpas-fx-component)
  - [Şablon Exceli Oluşturma](#şablon-exceli-oluşturma)
  - [Excel Dosya Seçimi ve Yüklemesi](#excel-dosya-seçimi-ve-yüklemesi)
- [Table](#table)
- [Formlar](#formlar)
  - [Form elemanlarının otomatik kontrolü](#form-elemanlarının-otomatik-kontrolü)
  - [Form Kontrol Helper](#form-kontrol-helper)
  - [Form verilerinin fikeybean olarak almak](#form-verilerinin-fikeybean-olarak-almak)
  - [Form Elements](#form-elements)
    - [ComboBox Element](#combobox-element)
- [Db İşlemler](#db-i̇şlemler)
- [Hata Çözümleri](#hata-çözümleri)
  - [Sorgularda Db Collation CS CI cakismasi](#sorgularda-db-collation-cs-ci-cakismasi)
- [Karalama Notlar - İnceleneecek](#karalama-notlar---i̇nceleneecek)


# Meta Datalar

## FiColsEntegre - Entegre Sütun Objeleri

Entegre sütun objeleri burada tutulur.

örneğin;

```java
public FiCol aucTxValue() {
  FiCol fiCol = new FiCol("aucTxValue", "");
  fiCol.buildColType(OzColType.String);
  return fiCol;
}
```

## MetaEntConst

String sabitler burada tutulur.

Örneğin SOAPaction;

```java
public String soapAction(){
		return "SOAPaction";
  }
```

# Layout

## Hide Component

```java
//
getModView().getFxTableMig().setVisible(false);
//
getModView().getFxTableMig().setManaged(false);

```

# Dialog Pencereleri

İlgili Sınıflar

- FxDialogShow
- FxSimpleDialog

## Pop Dialog - Info Warn Error

## String deger Alan Dialog

```java
FxSimpleDialog fxSimpleDialog = FxSimpleDialog.buildTextFieldDialog("Tarih Giriniz (yyyymmdd)");
			//fxSimpleDialog.openAsDialogSync();
			if (fxSimpleDialog.isClosedWithOk()) {
				String value = fxSimpleDialog.getTxValue();
			}

```

# Ozpas Fx Component 

## Şablon Exceli Oluşturma

```java
btnSablon = new FxButton("Şablon",Icons525.TERMINAL);
btnSablon.setOnAction(event -> { 
    FiDbResult<List<TBLURUN>> fiDbResult = new 
    RepoTblUrun().jdSelectEntityTop1();     
    FiExcel.saveSablonExcel(this, genColsExcel(), fiDbResult.getValue(), TBLURUN.class, "ozpasentegre");}
);
getModView().getFxMigToolbar().add(btnSablon);

```


## Excel Dosya Seçimi ve Yüklemesi

```java

File file = new FiFileGui().actFileChooserForExcelFromDesktop();

if (file != null) {

	List<MkCariHesaplar> listChh = FiExcel.build().readExcelFile(file, genColsExcelVergiNo(), MkCariHesaplar.class);

}

```


# Table


# Formlar

## Form elemanlarının otomatik kontrolü

```java
List<FiCol> listFiTableColWithFormValue = getFxFormMig().getListFiColWithFormValue();
Fdr fdr = FxEditorFactory.validateCols(listFiTableColWithFormValue);

```

## Form Kontrol Helper

```java
if(new EhpFormCols().formKontrol(getFxFormRapor()))return;
```

## Form verilerinin fikeybean olarak almak

```java
FiKeyBean formAsFiKeyBean = getFxFormMig().getFormAsFiKeyBean();
```


## Form Elements

### ComboBox Element

```java
// grup Kodu
listTableCols.add(FiTableColBuildHelper.build(EntegreField.akesTxGrupKod)
    .buildColType(OzColType.String)
	.buildEditorNodeClass(FxComboBoxSimple.class.getName())
	.buildFnEditorRendererAfterFormLoad((o, node) -> {
	    FiEntegreCompHelper.fillFxAktarimEslestirmeGrup((FxComboBoxSimple) node);
        })
  );
```
			
- Sor. Mer. Form Elemanı

```java

listTableCols.add(FiTableColBuildHelper.build(EntegreField.akesTxSorMerKod)
  .buildColType(OzColType.String)
	.buildEditorNodeClass(FxComboBoxSimple.class.getName())
	.buildFnEditorRendererAfterFormLoad((o, node) -> {
		FiEntegreCompHelper.fillFxComboSorMerDefaultNull((FxComboBoxSimple) node);
		})
);
```


# Db İşlemler






# Hata Çözümleri

## Sorgularda Db Collation CS CI cakismasi

varchar alanın sonuna `collate Turkish_CS_AI` eklenir.

```sql
LEFT JOIN MikroDB_V15_OZPAS.dbo.CARI_HESAP_HAREKETLERI chh 
    ON kko.cha_evrakno_seri = chh.cha_evrakno_seri collate Turkish_CS_AI
```

# Karalama Notlar - İnceleneecek

```java

public void actBtnEdit() {

	Object selectedItem = getFxTableView().getSelectionModel().getSelectedItem();

	if (selectedItem == null) return;

	// zorunlu alanlar kontrol edilmeli annolara göre

	ModEntAktarimEslestirmeFormCont modForm = new ModEntAktarimEslestirmeFormCont();
	modForm.setFormEntityForEdit((EntAktarimEslestirme) selectedItem);
	modForm.openAsDialogSync();

	if (modForm.checkClosedWithDone()) {
		//getFxTableView().refreshTableFi();
		pullTableData();
	}

}
    
    
    
EventHandler<KeyEvent> eventFilter = event -> {

	//Loghelperr.getInstance(getClass()).debug(" Entered");
	MkCARI_HESAP_HAREKETLERI mkCARI_hesap_hareketleri = FxEditorFactory.bindFormToEntityByFilterNode(getModView().getFxTableView().getFiTableColList(), MkCARI_HESAP_HAREKETLERI.class);

	//mkCARI_hesap_hareketleri.setEmEvrakTip(getEmEvrakTipWindow());
	List<MkCARI_HESAP_HAREKETLERI> listYeni = new RepoCariHareketlerJdbi().selCariHarLike(mkCARI_hesap_hareketleri);
	getModView().getFxTableView().setItemsAsFilteredList(listYeni);


};

getModView().getFxTableView().setColFilterNodeEnterEvent(eventFilter);
    
```



