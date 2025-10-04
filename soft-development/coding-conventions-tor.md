

- [Değişken İsimlendirme](#değişken-i̇simlendirme)
- [Standard Method Naming](#standard-method-naming)
- [Bazı Kısaltmalar (Metod ismi içerisindeki)](#bazı-kısaltmalar-metod-ismi-içerisindeki)
- [File Prefix](#file-prefix)

---

## Değişken İsimlendirme

- Camel Case 
- Type prefix

Prefix | Alt | Description
-------|-----|----------------
tx     | st  | : string
ln     |     | integer
db     |     | double
dt     |     | date
bo     |     | boolean
ref    |     | reference types
by     |     | binary,byte
nm     |     | number


## Standard Method Naming

| Controller Method | Meaning                                           |
|-------------------|---------------------------------------------------|
| act.......        | View üzerinden gelen actionlara karşılık metodlar |
| actBtn...         | button üzerinden gelen action                     |


| Model And Repo Method | Meaning                                  |
|-----------------------|------------------------------------------|
| checkExist......OnDb  | Veritabanın olup olmadığı kontrol edilir |


| View Method | Meaning |
|-------------|---------|
| .....       |         |


## Bazı Kısaltmalar (Metod ismi içerisindeki)

Wout : Without

Wit : With

By : e göre 

Lim : Limit

## File Prefix

Pref | Desc
-----|----------------------
Mxx  | Modal of xx project
Dxx  | Modules of xx project
Com  | Component
