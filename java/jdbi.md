


<!-- TOC -->

- [Jdbi 3](#jdbi-3)
    - [Jdbi Nedir](#jdbi-nedir)
    - [Maven Repo (draft)](#maven-repo-draft)
    - [Install (draft)](#install-draft)
- [Parameter Binding (draft)](#parameter-binding-draft)
- [Queries (Sorgular)](#queries-sorgular)
    - [Select Queries](#select-queries)
        - [Select Single Row (Entity) - Bind Object     (draft)](#select-single-row-entity---bind-object-----draft)
        - [Select Single Value - Bind Variable](#select-single-value---bind-variable)
        - [Select Rows - Bind List of Objects](#select-rows---bind-list-of-objects)
        - [Select Rows - Bind Map (draft)](#select-rows---bind-map-draft)
    - [Insert](#insert)
        - [Insert With Handle Bind Bean](#insert-with-handle-bind-bean)
        - [Multiple Insert With One Transaction (draft)](#multiple-insert-with-one-transaction-draft)
        - [Get Generated ID (draft)](#get-generated-id-draft)
    - [Update Query (draft)](#update-query-draft)
    - [Delete Query (draft)](#delete-query-draft)
    - [Create Query (draft)](#create-query-draft)
- [Plug-Ins (draft)](#plug-ins-draft)

<!-- /TOC -->



----


# Jdbi 3

## Jdbi Nedir
Java Jdbi Helper Library


## Maven Repo (draft)


## Install (draft)


# Parameter Binding (draft)


# Queries (Sorgular)

## Select Queries

### Select Single Row (Entity) - Bind Object     (draft)

Tek obje döndüren sorguların kullanımı :


### Select Single Value - Bind Variable

Tek değer döndüren sorguların kullanımı :

```
Optional<Integer> optResult = jdbi.withHandle(handle -> {
			return handle.createQuery(sql)
					.bind("TXTKOD", urunkod.trim())
					.mapTo(Integer.class)
					.findFirst();
		});
        
```

### Select Rows - Bind List of Objects

```

String sqlFiyatOzet = "select TFV.[CRRFIYAT],TFV.[TRHBITISTARIH],TFV.[TRHBASLANGICTARIH],TFV.[BYTMUSTERIKRITERTIP],TFV.[TXTMUSTERIKRITER] from TBLFIYATVADE TFV INNER JOIN TBLURUN TU ON TFV.LNGURUNKOD = TU.LNGKOD WHERE TU.TXTKOD=@_TXTKOD AND TFV.BYTDURUM=0 AND (TFV.[TXTMUSTERIKRITER] IS NULL OR TFV.[TXTMUSTERIKRITER]='') AND TFV.[TRHBITISTARIH]>=@_DATERPR  AND TFV.[TRHBASLANGICTARIH]<=@_DATERPR  AND TFV.[CRRFIYAT]<>@_CRRFIYAT ";

Jdbi jdbi = JdbiOzpasWeb.getJdbi();

Date date = UtilozDate.getDatewithTimeZero();

//System.out.println("sql:"+ finalSql);

List<TblFiyatVade> result = jdbi.withHandle(handle -> {
    
    return handle.select(stf(sqlFiyatOzet).sqlFmtConvertAtDash())
            .bind("TXTKOD", urunkod)
            .bind("CRRFIYAT", crrfiyat)
            .bind("DATERPR", date)
            .mapToBean(TblFiyatVade.class)
            .list();

});

return result;

```


```
//handle.registerRowMapper(FieldMapper.factory(TblFiyatVade.class));
//.collect(Collectors.toList());


```

### Select Rows - Bind Map (draft)


## Insert


### Insert With Handle Bind Bean

```java

Integer rowCountUpdate = jdbi.withHandle(handle -> {
    return handle.createUpdate(new OzJdbi().getInsertQuery(TblFiyatVade.class))
            .bindBean(tblFiyatVade)
            .execute(); // returns row count updated
});

if(rowCountUpdate!=null & rowCountUpdate>0) return true;
return false;

```

### Multiple Insert With One Transaction (draft)



### Get Generated ID (draft)


## Update Query (draft)


## Delete Query (draft)


## Create Query (draft)




# Plug-Ins (draft)








