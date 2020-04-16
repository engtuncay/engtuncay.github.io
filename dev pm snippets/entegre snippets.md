
Entegre için kodcuklar (snippets)

- [Layout](#layout)
  - [Hide Component](#hide-component)
- [Ozpas Fx Component](#ozpas-fx-component)
  - [Şablon Exceli Oluşturma](#%c5%9eablon-exceli-olu%c5%9fturma)
- [Table](#table)
- [Form](#form)
  - [Form Element](#form-element)
    - [ComboBox Element](#combobox-element)
- [Karalama Notlar - İnceleneecek](#karalama-notlar---%c4%b0nceleneecek)


# Layout


## Hide Component
```
getModView().getFxTableMig().setVisible(false);
getModView().getFxTableMig().setManaged(false);

```



# Ozpas Fx Component 

## Şablon Exceli Oluşturma

```
btnSablon = new FxButton("Şablon",Icons525.TERMINAL);
btnSablon.setOnAction(event -> { 
    FiDbResult<List<TBLURUN>> fiDbResult = new 
    RepoTblUrun().jdSelectEntityTop1();     
    FiExcel.saveSablonExcel(this, genColsExcel(), fiDbResult.getValue(), TBLURUN.class, "ozpasentegre");}
);
getModView().getFxMigToolbar().add(btnSablon);

```


# Table


 # Form

## Form Element

### ComboBox Element

```
// grup Kodu
listTableCols.add(FiTableColBuildHelper.build(EntegreField.akesTxGrupKod)
    .buildColType(OzColType.String)
	.buildEditorNodeClass(FxComboBoxSimple.class.getName())
	.buildFnEditorRendererAfterFormLoad((o, node) -> {
	    FiEntegreCompHelper.fillFxAktarimEslestirmeGrup((FxComboBoxSimple) node);
        })
    );
    
```
			
Sor. Mer. Form Elemanı

    listTableCols.add(FiTableColBuildHelper.build(EntegreField.akesTxSorMerKod).buildColType(OzColType.String)
	    .buildEditorNodeClass(FxComboBoxSimple.class.getName())
		.buildFnEditorRendererAfterFormLoad((o, node) -> {
            FiEntegreCompHelper.fillFxComboSorMerDefaultNull((FxComboBoxSimple) node);
			})
    );







# Karalama Notlar - İnceleneecek

```


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