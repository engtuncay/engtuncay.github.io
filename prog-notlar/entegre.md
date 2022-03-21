
- [Dialog Oluşturma](#dialog-oluşturma)
  - [Text Veri Alımı](#text-veri-alımı)

# Dialog Oluşturma

## Text Veri Alımı

```java
FxSimpleDialog fxSimpleDialog = new FxSimpleDialog(FxSimpleDialogType.TextFieldWithValidation);
fxSimpleDialog.setTxInitialValue(selectedItemFiGen.getCha_belge_no());
fxSimpleDialog.setMessageHeader("Yeni Belge Nosunu Giriniz;");
fxSimpleDialog.openAsDialogSync();

if (fxSimpleDialog.isClosedWithOk()) {

  String txValue = fxSimpleDialog.getTxValue();
  // Loghelper.get(getClass()).debug("belge no yeni:" + txValue);
  FiMapParams fiMapParams = FiMapParams.build().buildPut(FiColsMikro.bui().cha_belge_no(), txValue);
  Fdr fdr = new RepoCariHareketlerJdbi().upFiMapParamsByCandId(selectedItemFiGen, fiMapParams);

  FxDialogShow.showDbResult2(fdr,() -> {
    selectedItemFiGen.setCha_belge_no(txValue);
    getFxTableView().refreshTableFiAsyn();
  });

}

```