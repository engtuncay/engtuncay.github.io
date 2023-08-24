

**Source**

- https://www.w3schools.com/xml/xsl_elementref.asp

<h1>Contents</h1>

- [XSLT REFERENCES](#xslt-references)
- [XSLT `<xsl:variable>`](#xslt-xslvariable)
- [XSLT, XPath, and XQuery Functions](#xslt-xpath-and-xquery-functions)

---

# XSLT REFERENCES

The XSLT elements from the W3C Recommendation (XSLT Version 1.0).

🔔 XSLT Elements

The links in the "Element" column point to attributes and more useful information about each specific element.

Element                | Description
-----------------------|------------------------------------------------------------------------------------------------------------------------------------------
apply-imports          | Applies a template rule from an imported style sheet
apply-templates        | Applies a template rule to the current element or to the current element's child nodes
attribute              | Adds an attribute
attribute-set          | Defines a named set of attributes
call-template          | Calls a named template
choose                 | Used in conjunction with `<when>` and `<otherwise>` to express multiple conditional tests
comment                | Creates a comment node in the result tree
copy                   | Creates a copy of the current node (without child nodes and attributes)
copy-of                | Creates a copy of the current node (with child nodes and attributes)
decimal-format         | Defines the characters and symbols to be used when converting numbers into strings, with the format-number() function
element                | Creates an element node in the output document
fallback               | Specifies an alternate code to run if the processor does not support an XSLT element
for-each               | Loops through each node in a specified node set
if                     | Contains a template that will be applied only if a specified condition is true
import                 | Imports the contents of one style sheet into another. Note: An imported style sheet has lower precedence than the importing style sheet
include                | Includes the contents of one style sheet into another. Note: An included style sheet has the same precedence as the including style sheet
key                    | Declares a named key that can be used in the style sheet with the key() function
message                | Writes a message to the output (used to report errors)
namespace-alias        | Replaces a namespace in the style sheet to a different namespace in the output
number                 | Determines the integer position of the current node and formats a number
otherwise              | Specifies a default action for the `<choose>` element
output                 | Defines the format of the output document
param                  | Declares a local or global parameter
preserve-space         | Defines the elements for which white space should be preserved
processing-instruction | Writes a processing instruction to the output
sort                   | Sorts the output
strip-space            | Defines the elements for which white space should be removed
stylesheet             | Defines the root element of a style sheet
template               | Rules to apply when a specified node is matched
text                   | Writes literal text to the output
transform              | Defines the root element of a style sheet
value-of               | Extracts the value of a selected node
variable               | Declares a local or global variable
when                   | Specifies an action for the `<choose>` element
with-param             | Defines the value of a parameter to be passed into a template

# XSLT `<xsl:variable>`

🔔 Definition and Usage

The `<xsl:variable>` element is used to declare <span style="color:red">a local or global variable</span>.

❗ Note: The variable is global if it's declared as a top-level element, and local if it's declared within a template.

Note: Once you have set a variable's value, you cannot change or modify that value!

Tip: You can add a value to a variable by the content of the `<xsl:variable>` element OR by the select attribute!

Syntax

```xml
<xsl:variable
name="name"
select="expression">

  <!-- Content:template -->

</xsl:variable>

```

Attributes

Attribute	Value	Description
name	name	Required. Specifies the name of the variable
select	expression	Optional. Defines the value of the variable
Example 1
If the select attribute is present, the <xsl:variable> element cannot contain any content. If the select attribute contains a literal string, the string must be within quotes. The following two examples assign the value "red" to the variable "color":

<xsl:variable name="color" select="'red'" />

<xsl:variable name="color" select='"red"' />
Example 2
If the <xsl:variable> element only contains a name attribute, and there is no content, then the value of the variable is an empty string:

<xsl:variable name="j" />
Example 3
<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:variable name="header">
  <tr bgcolor="#9acd32">
    <th>Title</th>
    <th>Artist</th>
  </tr>
</xsl:variable>

<xsl:template match="/">
  <html>
  <body>
  <table border="1">
    <xsl:copy-of select="$header" />
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

# XSLT, XPath, and XQuery Functions

Source : https://www.w3schools.com/xml/xsl_functions.asp

