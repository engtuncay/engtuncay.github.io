
- [Sources](#sources)
- [Intro](#intro)
  - [What is XSL](#what-is-xsl)
  - [First Example Online XSLT Editor](#first-example-online-xslt-editor)
- [XSL(T) Languages](#xslt-languages)
  - [It Started with XSL](#it-started-with-xsl)
  - [CSS = Style Sheets for HTML](#css--style-sheets-for-html)
  - [XSL = Style Sheets for XML](#xsl--style-sheets-for-xml)
  - [XSL - More Than a Style Sheet Language](#xsl---more-than-a-style-sheet-language)
  - [What is XSLT?](#what-is-xslt)
  - [XSLT = XSL Transformations](#xslt--xsl-transformations)
  - [XSLT Uses XPath](#xslt-uses-xpath)
  - [How Does it Work?](#how-does-it-work)
  - [XSLT Browser Support](#xslt-browser-support)
  - [XSLT is a W3C Recommendation](#xslt-is-a-w3c-recommendation)


# Sources

- https://www.w3schools.com/xml/xsl_intro.asp


# Intro

## What is XSL

XSL (eXtensible Stylesheet Language) is a styling language for XML.

XSLT stands for XSL Transformations.

This tutorial will teach you how to use XSLT to transform XML documents into other formats (like transforming XML into HTML).

## First Example Online XSLT Editor

https://www.w3schools.com/xml/tryxslt.asp?xmlfile=cdcatalog&xsltfile=cdcatalog

**xml (data)**

```
<?xml version="1.0" encoding="UTF-8"?>
<catalog>
  <cd>
    <title>Empire Burlesque</title>
    <artist>Bob Dylan</artist>
    <country>USA</country>
    <company>Columbia</company>
    <price>10.90</price>
    <year>1985</year>
  </cd>
  <cd>
    <title>Hide your heart</title>
    <artist>Bonnie Tyler</artist>
    <country>UK</country>
    <company>CBS Records</company>
    <price>9.90</price>
    <year>1988</year>
  </cd>
</catalog>
```

**xslt**

```
<?xml version="1.0"?>

<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <html>
  <body>
    <h2>My CD Collection</h2>
    <table border="1">
      <tr bgcolor="#9acd32">
        <th>Title</th>
        <th>Artist</th>
      </tr>
      <xsl:for-each select="catalog/cd">
        <tr>
          <td><xsl:value-of select="title"/></td>
          <td><xsl:value-of select="artist"/></td>
        </tr>
      </xsl:for-each>
    </table>
  </body>
  </html>
</xsl:template>

</xsl:stylesheet>

```

**html output**

```
<div id="result_output">

<h2>My CD Collection</h2>

<table border="1">
<tbody><tr bgcolor="#9acd32">
<th style="text-align:left">Title</th>
<th style="text-align:left">Artist</th>
</tr>
<tr>
<td>Empire Burlesque</td>
<td>Bob Dylan</td>
</tr>
<tr>
<td>Hide your heart</td>
<td>Bonnie Tyler</td>
</tr>

</tbody></table>
</div>
```

# XSL(T) Languages

XSLT is a language for transforming XML documents.

XPath is a language for navigating in XML documents.

XQuery is a language for querying XML documents.

## It Started with XSL

XSL stands for EXtensible Stylesheet Language.

The World Wide Web Consortium (W3C) started to develop XSL because there was a need for an XML-based Stylesheet Language.

## CSS = Style Sheets for HTML

HTML uses predefined tags. The meaning of, and how to display each tag is well understood.

CSS is used to add styles to HTML elements. 

## XSL = Style Sheets for XML

XML does not use predefined tags, and therefore the meaning of each tag is not well understood.

A <table> element could indicate an HTML table, a piece of furniture, or something else - and browsers do not know how to display it!

So, XSL describes how the XML elements should be displayed.

## XSL - More Than a Style Sheet Language

XSL consists of four parts:

- XSLT - a language for transforming XML documents
- XPath - a language for navigating in XML documents
- XSL-FO - a language for formatting XML documents (discontinued in 2013)
- XQuery - a language for querying XML documents

- Note : With the CSS3 Paged Media Module, W3C has delivered a new standard for document formatting. So, since 2013, CSS3 is proposed as an XSL-FO replacement.

## What is XSLT?

- XSLT stands for XSL Transformations
- XSLT is the most important part of XSL
- XSLT transforms an XML document into another XML document
- XSLT uses XPath to navigate in XML documents
- XSLT is a W3C Recommendation

## XSLT = XSL Transformations

XSLT is the most important part of XSL.

XSLT is used to transform an XML document into another XML document, or another type of document that is recognized by a browser, like HTML and XHTML. Normally XSLT does this by transforming each XML element into an (X)HTML element.

With XSLT you can add/remove elements and attributes to or from the output file. You can also rearrange and sort elements, perform tests and make decisions about which elements to hide and display, and a lot more.

A common way to describe the transformation process is to say that XSLT transforms an XML source-tree into an XML result-tree.

## XSLT Uses XPath

XSLT uses XPath to find information in an XML document. XPath is used to navigate through elements and attributes in XML documents.

If you want to study XPath first, please read our XPath Tutorial.

## How Does it Work?

In the transformation process, XSLT uses XPath to define parts of the source document that should match one or more predefined templates. When a match is found, XSLT will transform the matching part of the source document into the result document.

## XSLT Browser Support

All major browsers support XSLT and XPath.

## XSLT is a W3C Recommendation

XSLT became a W3C Recommendation 16. November 1999.

