
- [WPF'de Stil ve Şablonlama](#wpfde-stil-ve-şablonlama)
  - [🎨 Stil (Style)](#-stil-style)
    - [📌 Basit Örnek](#-basit-örnek)
    - [🔖 Anahtar (Key) ile Tanımlama](#-anahtar-key-ile-tanımlama)
  - [🧩 Kontrol Şablonu (ControlTemplate)](#-kontrol-şablonu-controltemplate)
    - [🧪 Basit Örnek (Button)](#-basit-örnek-button)
  - [📁 Stil Hiyerarşisi (Öncelik Sırası)](#-stil-hiyerarşisi-öncelik-sırası)
  - [🔁 Stil Devralma](#-stil-devralma)
  - [🧠 Notlar](#-notlar)
- [WPF'de Stil, Şablon, DataTemplate ve Triggers](#wpfde-stil-şablon-datatemplate-ve-triggers)
  - [🎨 Style](#-style)
  - [🧩 ControlTemplate](#-controltemplate)
  - [📄 DataTemplate](#-datatemplate)
    - [🧪 Örnek](#-örnek)
  - [⚡ Triggers](#-triggers)
    - [🎯 PropertyTrigger](#-propertytrigger)
    - [🔄 DataTrigger (DataTemplate içinde)](#-datatrigger-datatemplate-içinde)
  - [🧠 Ek Bilgiler](#-ek-bilgiler)
  - [📦 Kaynaklar](#-kaynaklar)
- [Örnek](#örnek)
- [Source](#source)


# WPF'de Stil ve Şablonlama

## 🎨 Stil (Style)

**Style**, birden fazla öğeye ortak özellikler uygulamak için kullanılır. XAML'de `Style` nesnesi ile tanımlanır.

### 📌 Basit Örnek

```xml
<Window.Resources>
    <Style TargetType="Button">
        <Setter Property="Background" Value="LightBlue"/>
        <Setter Property="Foreground" Value="DarkBlue"/>
        <Setter Property="FontWeight" Value="Bold"/>
        <Setter Property="Margin" Value="5"/>
    </Style>
</Window.Resources>
```

Bu stil, pencere içindeki tüm `Button` öğelerine uygulanır.

### 🔖 Anahtar (Key) ile Tanımlama

```xml
<Window.Resources>
    <Style x:Key="RedButtonStyle" TargetType="Button">
        <Setter Property="Background" Value="Red"/>
        <Setter Property="Foreground" Value="White"/>
    </Style>
</Window.Resources>

<Button Style="{StaticResource RedButtonStyle}" Content="Sil"/>
```

## 🧩 Kontrol Şablonu (ControlTemplate)

**ControlTemplate**, bir kontrolün görsel yapısını (UI yapısını) tamamen özelleştirir. `Template` özelliği üzerinden atanır.

### 🧪 Basit Örnek (Button)

```xml
<Window.Resources>
    <Style x:Key="FlatButtonStyle" TargetType="Button">
        <Setter Property="Template">
            <Setter.Value>
                <ControlTemplate TargetType="Button">
                    <Border Background="{TemplateBinding Background}" 
                            BorderBrush="{TemplateBinding BorderBrush}" 
                            BorderThickness="1" 
                            Padding="5">
                        <ContentPresenter HorizontalAlignment="Center" VerticalAlignment="Center"/>
                    </Border>
                </ControlTemplate>
            </Setter.Value>
        </Setter>
        <Setter Property="Background" Value="Gray"/>
        <Setter Property="Foreground" Value="White"/>
    </Style>
</Window.Resources>

<Button Style="{StaticResource FlatButtonStyle}" Content="Düz Buton"/>
```

## 📁 Stil Hiyerarşisi (Öncelik Sırası)

1. Doğrudan öğeye atanmış özellikler (`Button Background="Red"`)
2. Öğeye atanmış stil (`Style="{StaticResource ...}"`)
3. Tür tabanlı stil (`TargetType="Button"`)
4. Temalarda tanımlanan stiller

## 🔁 Stil Devralma

Bir stili başka bir stil üzerinden genişletebilirsin:

```xml
<Style x:Key="BaseStyle" TargetType="TextBlock">
    <Setter Property="FontSize" Value="14"/>
</Style>

<Style x:Key="HeaderStyle" BasedOn="{StaticResource BaseStyle}" TargetType="TextBlock">
    <Setter Property="FontWeight" Value="Bold"/>
</Style>
```

## 🧠 Notlar

- `Style` sadece görsel özellikleri ayarlamak içindir; olay (event) bağlamaz.
- `ControlTemplate`, kontrolün iç yapısını değiştirir.
- Daha karmaşık yapılar için `DataTemplate` ve `Triggers` kullanılabilir.

# WPF'de Stil, Şablon, DataTemplate ve Triggers

## 🎨 Style

```xml
<Style TargetType="Button">
    <Setter Property="Background" Value="LightBlue"/>
    <Setter Property="Foreground" Value="DarkBlue"/>
</Style>
```

## 🧩 ControlTemplate

```xml
<Style x:Key="FlatButtonStyle" TargetType="Button">
    <Setter Property="Template">
        <Setter.Value>
            <ControlTemplate TargetType="Button">
                <Border Background="{TemplateBinding Background}" Padding="5">
                    <ContentPresenter HorizontalAlignment="Center" VerticalAlignment="Center"/>
                </Border>
            </ControlTemplate>
        </Setter.Value>
    </Setter>
    <Setter Property="Background" Value="Gray"/>
</Style>
```

## 📄 DataTemplate

**DataTemplate**, veri nesnesini görsel öğeye nasıl çevireceğini tanımlar. Genelde `ItemsControl`, `ListBox`, `ComboBox` gibi koleksiyon temelli kontrollerde kullanılır.

### 🧪 Örnek

```xml
<Window.Resources>
    <DataTemplate x:Key="PersonTemplate">
        <StackPanel Orientation="Horizontal">
            <TextBlock Text="{Binding Name}" FontWeight="Bold" Margin="0,0,5,0"/>
            <TextBlock Text="(" Foreground="Gray"/>
            <TextBlock Text="{Binding Age}" Foreground="Gray"/>
            <TextBlock Text=")" Foreground="Gray"/>
        </StackPanel>
    </DataTemplate>
</Window.Resources>

<ListBox ItemTemplate="{StaticResource PersonTemplate}" ItemsSource="{Binding People}"/>
```

> ViewModel'de:
```csharp
public ObservableCollection<Person> People { get; set; }
```

## ⚡ Triggers

`Triggers`, belirli koşullar gerçekleştiğinde stillerde veya şablonlarda görsel değişiklik yapmanı sağlar.

### 🎯 PropertyTrigger

```xml
<Style TargetType="Button">
    <Setter Property="Background" Value="LightGray"/>
    <Style.Triggers>
        <Trigger Property="IsMouseOver" Value="True">
            <Setter Property="Background" Value="DarkGray"/>
        </Trigger>
    </Style.Triggers>
</Style>
```

### 🔄 DataTrigger (DataTemplate içinde)

```xml
<DataTemplate x:Key="PersonTemplate">
    <StackPanel>
        <TextBlock Text="{Binding Name}" />
        <TextBlock Text="18 yaş altı!" Foreground="Red" Visibility="Collapsed">
            <TextBlock.Style>
                <Style TargetType="TextBlock">
                    <Style.Triggers>
                        <DataTrigger Binding="{Binding Age}" Value="17">
                            <Setter Property="Visibility" Value="Visible"/>
                        </DataTrigger>
                    </Style.Triggers>
                </Style>
            </TextBlock.Style>
        </TextBlock>
    </StackPanel>
</DataTemplate>
```

## 🧠 Ek Bilgiler

- `ControlTemplate` kontrolün yapısını değiştirir, `DataTemplate` sadece veri sunumunu değiştirir.
- `Style.Triggers`, yalnızca stil üzerinden özelliğe müdahale eder.
- `DataTrigger`, veri bağlama (`Binding`) ile çalışır.
- Animasyon için `EventTrigger` kullanılabilir.

## 📦 Kaynaklar

- [Microsoft Docs - Styles and Templates](https://learn.microsoft.com/en-us/dotnet/desktop/wpf/controls/styles-and-templates)
- [Microsoft Docs - Data Templating](https://learn.microsoft.com/en-us/dotnet/desktop/wpf/data/data-templating-overview)

# Örnek

```xml
<Window x:Class="WpfStylesDemo.MainWindow"
        xmlns="http://schemas.microsoft.com/winfx/2006/xaml/presentation"
        xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"
        Title="Stil ve Şablonlama Demo" Height="350" Width="525">
    <Window.Resources>

        <!-- Stil: Fare üstüne gelince rengi değişen buton -->
        <Style x:Key="HoverButtonStyle" TargetType="Button">
            <Setter Property="Background" Value="LightGray"/>
            <Setter Property="Foreground" Value="Black"/>
            <Style.Triggers>
                <Trigger Property="IsMouseOver" Value="True">
                    <Setter Property="Background" Value="DarkGray"/>
                    <Setter Property="Foreground" Value="White"/>
                </Trigger>
            </Style.Triggers>
        </Style>

        <!-- DataTemplate: Kişi bilgilerini gösteren şablon -->
        <DataTemplate x:Key="PersonTemplate">
            <StackPanel Orientation="Horizontal">
                <TextBlock Text="{Binding Name}" FontWeight="Bold" Margin="0,0,5,0"/>
                <TextBlock Text="(" Foreground="Gray"/>
                <TextBlock Text="{Binding Age}" Foreground="Gray"/>
                <TextBlock Text=")" Foreground="Gray"/>
                <TextBlock Text=" - Çocuk" Foreground="Red" Visibility="Collapsed" Margin="5,0,0,0">
                    <TextBlock.Style>
                        <Style TargetType="TextBlock">
                            <Style.Triggers>
                                <DataTrigger Binding="{Binding Age}" Value="17">
                                    <Setter Property="Visibility" Value="Visible"/>
                                </DataTrigger>
                            </Style.Triggers>
                        </Style>
                    </TextBlock.Style>
                </TextBlock>
            </StackPanel>
        </DataTemplate>

    </Window.Resources>

    <StackPanel Margin="10">
        <TextBlock Text="Buton" FontSize="16" Margin="0,0,0,5"/>
        <Button Style="{StaticResource HoverButtonStyle}" Content="Üzerine Gel!" Width="150" Height="30"/>

        <TextBlock Text="Kişi Listesi" FontSize="16" Margin="0,20,0,5"/>
        <ListBox ItemsSource="{Binding People}" ItemTemplate="{StaticResource PersonTemplate}" />
    </StackPanel>
</Window>

```

```cs
using System.Collections.ObjectModel;
using System.Windows;

namespace WpfStylesDemo
{
    public partial class MainWindow : Window
    {
        public ObservableCollection<Person> People { get; set; }

        public MainWindow()
        {
            InitializeComponent();

            People = new ObservableCollection<Person>
            {
                new Person { Name = "Ali", Age = 25 },
                new Person { Name = "Ayşe", Age = 17 },
                new Person { Name = "Mehmet", Age = 30 }
            };

            DataContext = this;
        }
    }

    public class Person
    {
        public string Name { get; set; }
        public int Age { get; set; }
    }
}


```

# Source

- https://chatgpt.com/c/681ad49f-e500-800e-83b2-245d9ef23bbd


