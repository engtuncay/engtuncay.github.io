


<!-- TOC -->

- [Jdbi 3](#jdbi-3)
    - [Jdbi Nedir](#jdbi-nedir)
    - [Maven Repo](#maven-repo)
    - [Install](#install)
- [Sorgular](#sorgular)
    - [Select](#select)
    - [Insert](#insert)
    - [Update](#update)
    - [Delete](#delete)
    - [Create](#create)
- [Plug-Ins](#plug-ins)

<!-- /TOC -->



----


# Jdbi 3

## Jdbi Nedir
Java Jdbi Helper Library


## Maven Repo


## Install




# Sorgular

## Select 



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



## Insert


## Update


## Delete


## Create




# Plug-Ins








