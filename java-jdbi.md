
# Introduction to Jdbi

# Jdbi Website

http://jdbi.org/#_introduction_to_jdbi


- [Introduction to Jdbi](#introduction-to-jdbi)
- [Jdbi Website](#jdbi-website)
- [Jdbi 3](#jdbi-3)
  - [Jdbi Nedir](#jdbi-nedir)
  - [Maven Repo (draft)](#maven-repo-draft)
  - [Install (draft)](#install-draft)
- [Usage of Handle](#usage-of-handle)
  - [withHandle Method](#withhandle-method)
  - [useHandle Method](#usehandle-method)
- [Parameter Binding (draft)](#parameter-binding-draft)
- [Queries (Sorgular)](#queries-sorgular)
  - [Select Queries](#select-queries)
    - [Select Single Row (Entity) - Bind To Entity](#select-single-row-entity---bind-to-entity)
    - [Select Single Value - Bind Variable](#select-single-value---bind-variable)
    - [Select Rows - Bind List of Objects](#select-rows---bind-list-of-objects)
    - [Select Rows - Bind Map (draft)](#select-rows---bind-map-draft)
  - [Insert](#insert)
    - [Insert/Update By WithHandle Method By Binding Bean](#insertupdate-by-withhandle-method-by-binding-bean)
    - [Multiple Insert With One Transaction](#multiple-insert-with-one-transaction)
    - [Get Generated ID After Insert Query (draft)](#get-generated-id-after-insert-query-draft)
  - [Update Query (draft)](#update-query-draft)
  - [Delete Query (draft)](#delete-query-draft)
  - [Create Query (draft)](#create-query-draft)
  - [Solutions](#solutions)
    - [Exception while binding named parameter](#exception-while-binding-named-parameter)
    - [UnableToCreateStatementException: Exception while binding named parameter 'xxxxxxxx' - Caused by: com.microsoft.sqlserver.jdbc.SQLServerException: The index 12 is out of range.](#unabletocreatestatementexception-exception-while-binding-named-parameter-xxxxxxxx---caused-by-commicrosoftsqlserverjdbcsqlserverexception-the-index-12-is-out-of-range)
- [Plug-Ins (draft)](#plug-ins-draft)

---

# Jdbi 3

## Jdbi Nedir
Java Jdbi Helper Library

## Maven Repo (draft)

## Install (draft)

# Usage of Handle

## withHandle Method

## useHandle Method

# Parameter Binding (draft)

# Queries (Sorgular)

## Select Queries

### Select Single Row (Entity) - Bind To Entity

Tek obje döndüren sorguların kullanımı :

```java
Jdbi jdbi = JdbiMikroFactory.getJdbiByAppProp(getConnProfile());
Optional<MkCARI_HESAPLAR> optResult = jdbi.withHandle(handle -> {
    return handle.createQuery(stf(sqslCariHesaplar).sqlFmtAt())
        .bind(Mkfields.cari_kod.toString(), cariKod)
        .mapToBean(MkCARI_HESAPLAR.class)
        .findFirst();
});
return optResult;
```

### Select Single Value - Bind Variable

Tek değer döndüren sorguların kullanımı :

```java
Optional<Integer> optResult = jdbi.withHandle(handle -> {
        return handle.createQuery(sql)
                .bind("TXTKOD", urunkod.trim())
                .mapTo(Integer.class)
                .findFirst();
});
```

- Eğer değer döndürmezse optResult.isPresent false değerini döner , eğer bir değer var ise de isPresent true olur.

### Select Rows - Bind List of Objects

```java
Jdbi jdbi = JdbiPanoFactory.getJdbiByAppProp(this);
List<TblFiyatVade> result = jdbi.withHandle(handle -> {
return handle.select(stf(sqlFiyatOzet).sqlFmtAt())
.bind("TXTKOD", urunkod)
.bind("CRRFIYAT", crrfiyat)
.bind("DATERPR", date)
.mapToBean(TblFiyatVade.class)
.list();
});
return result;
```

MapToBean Alternatifler

```
//handle.registerRowMapper(FieldMapper.factory(TblFiyatVade.class));
//.collect(Collectors.toList());
```

### Select Rows - Bind Map (draft)

## Insert

### Insert/Update By WithHandle Method By Binding Bean

```java
//Jdbi jdbi = JdbiEntegre.getConnection();
Jdbi jdbi = JdbiMikroFactory.getJdbiByAppProp(getConnProfile());

Integer rowCountUpdate = null;
try {
    rowCountUpdate = jdbi.withHandle(handle -> {
        return handle.createUpdate(new FiJdbiHelper().getInsertQueryFi(TblMikroEvrakOnay.class))
        .bindBean(meo)
        .execute(); // returns row count updated
    });
} catch (Exception ex) {
    Loghelper.debugException(getClass(), ex);
}

if (rowCountUpdate != null & rowCountUpdate > 0) return new FiResponse(true);return new FiResponse(false);

// veya boolean değer döndermek istenirse
// if(rowCountUpdate!=null & rowCountUpdate>0) return true;
// return false;
// stf(sqlUpdate).sqlFmtAt()
```
### Multiple Insert With One Transaction

```java

Boolean result = jdbi.inTransaction(handle -> {
handle.begin();
try {
// transactions
handle.commit();
return true;
} catch (Exception e) {
Loghelper.debugException(getClass(), e);
handle.rollback();
return false;
}
});

```


- Handle objects provide two ways to open a transaction — inTransaction allows you to return a result, and useTransaction has no return value.

```java

public Optional<User> findUserById(long id) {
    return handle.inTransaction(h ->
            h.createQuery("SELECT * FROM users WHERE id=:id")
                    .bind("id", id)
                    .mapTo(User.class)
                    .findFirst());
}

```


### Get Generated ID After Insert Query (draft)

- Generated keys elde etmek için sadece sorguda insert query olmalı, ek sorgular olmamalı, yoksa hata veriyor.

- You can get generated keys in the fluent style:

```java

public void fluentInsertKeys() {
    db.useHandle(handle -> {
        User data = handle.createUpdate("INSERT INTO users (name) VALUES(?)")
                .bind(0, "Data")
                .executeAndReturnGeneratedKeys()
                .mapTo(User.class)
                .one();

        assertEquals(1, data.id); // This value is generated by the database
        assertEquals("Data", data.name);
    });
}

```

- mapToBean örneği


```
//entity class da generated_keys alanı olmalı
Optional<EntClazz> execute = handle.createUpdate(fimSqlAt(sql1))
.bindBean(ent)
.executeAndReturnGeneratedKeys()
.mapToBean(getEntityClass())
.findFirst();

FiConsole.debug(execute);

```

- mapToMap örneği, key olarak jdbi generated_keys kullanıyor

```
Optional<Map<String, Object>> optMapGeneratedKeys =         handle.createUpdate(fimSqlAt(sql1))
	.bindBean(ent)
	.executeAndReturnGeneratedKeys()
	.mapToMap().findFirst();

Object generatedKeys = optMapGeneratedKeys.orElse(new HashMap<>()).getOrDefault("generated_keys",null); // object BigDecimal geliyor

if(generatedKeys!=null){
	    FiProperty.setterNested(ent, idField, generatedKeys);
}else{
	    throw new Exception("Generated Keys üretilemedi.Sorgu yapısını inceleyiniz.");
}

Loghelper.debug(getClass(), "map key:"+execute.get().get("generated_keys"));

```


- mapTo(idClazz)

```
Optional opId = handle.createUpdate(fimSqlAt(sql1)
    .bindBean(ent)
	.executeAndReturnGeneratedKeys(idFieldName)
	.mapTo(idClazz)
	.findFirst(); // returns row count updated

opId.ifPresent(insertedId -> { 
FiProperty.setterNested(ent, idField, insertedId);
});

```



```
Integer intGenKeys = handle.createUpdate(fimSqlAt(sqlCariHar))
		//.bindBean(ent)
		.execute((statementSupplier, ctx) -> {
		try {
		System.out.println(ctx.getRawSql());
		String[] strings =  { idField };
		ctx.setGeneratedKeysColumnNames(strings);
		PreparedStatement preparedStatement = statementSupplier.get();
		//preparedStatement.execute();
		//statementSupplier.get().executeUpdate();
		ResultSet generatedKeys = preparedStatement.getGeneratedKeys();
		if(generatedKeys!=null) {
		FiConsole.debug(generatedKeys);
		generatedKeys.next();
		return generatedKeys.getInt(1);
		}
		//return statementSupplier.get().getUpdateCount();
		return null;
		} finally {
		ctx.close();
		}
		//return -1;
		});

		if(intGenKeys!=null) Loghelper.debug(getClass(), "Gen.Key:"+intGenKeys);
        
```





## Update Query (draft)


```
String sqlGuid = FiQueryHelper.selectIdByGuid(getEntityClass());
Loghelper.debug(getClass(), "sqlguild:"+sqlGuid);
Optional<Integer> optId = handle.select(fimSqlAt(sqlGuid)).bindBean(ent).mapTo(Integer.class).findFirst();
```

## Delete Query (draft)
## Create Query (draft)
## Solutions
### Exception while binding named parameter
List bind çalışmıyorsa eğer, < veya > den sonra boşluk bırakılmadan parametre yazılırsa eğer hata veriyor.
```java
chh.cha_tarihi <@cha_tarihi1
```
veya ikinci bir yol escape koymak. Denemedim.
```java
\\<
```
https://stackoverflow.com/questions/32526233/jdbi-how-to-bind-a-list-parameter-in-java
### UnableToCreateStatementException: Exception while binding named parameter 'xxxxxxxx' - Caused by: com.microsoft.sqlserver.jdbc.SQLServerException: The index 12 is out of range.

Sql sorgusunun yorum satırlarında @ veya : başlayan parametre kalmış olabilir.

# Plug-Ins (draft)

