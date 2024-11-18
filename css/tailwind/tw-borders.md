# Section - Border

## Border Radius

Utilities for controlling the border radius of an element.

Class                              | Properties
-----------------------------------|----------------------------------
rounded-none                       | border-radius: 0px;
rounded                            | border-radius: 0.25rem; /* 4px */
rounded-[sm\|md\|lg\|xl\|2xl\|3xl] | border-radius: [size_value]
rounded-full                       | border-radius: 9999px;

*Custom Borders*

Class                                  | Properties
---------------------------------------|------------------------------------------
rounded-s-none                         | border-start-start-radius: 0px;
.                                      | border-end-start-radius: 0px;
.                                      | ---
rounded-[s]-[sm\|md\|lg\|xl\|2xl\|3xl] | border-start-[start]-radius: [size_value]
.                                      | border-end-[start]-radius: [size_value]
.                                      | ---
rounded-[e]-[sm\|md\|lg\|xl\|2xl\|3xl] | border-start-[end]-radius: [size_value]
.                                      | border-end-[end]-radius: [size_value]
.                                      | ---
rounded-[t]-[sm\|md\|lg\|xl\|2xl\|3xl] | border-top-left-radius: [size_value]
.                                      | border-top-right-radius: [size_value]
.                                      | ---
rounded-[r]-[sm\|md\|lg\|xl\|2xl\|3xl] | border-top-right-radius: [size_value]
.                                      | border-bottom-right-radius: [size_value]



rounded-s	
rounded-s-full	border-start-start-radius: 9999px; border-end-start-radius: 9999px;
rounded-ss-none	border-start-start-radius: 0px;
rounded-ss-sm	border-start-start-radius: 0.125rem; /* 2px */
rounded-ss	border-start-start-radius: 0.25rem; /* 4px */
rounded-se-md	border-start-end-radius: 0.375rem; /* 6px */
rounded-ee-none	border-end-end-radius: 0px;
rounded-es-md	border-end-start-radius: 0.375rem; /* 6px */
rounded-tl-sm	border-top-left-radius: 0.125rem; /* 2px */
rounded-tr-sm	border-top-right-radius: 0.125rem; /* 2px */
rounded-br-none	border-bottom-right-radius: 0px;
rounded-bl-none	border-bottom-left-radius: 0px;
​
🔔 Basic usage - Rounded corners

Use utilities like rounded-sm, rounded, or rounded-lg to apply different border radius sizes to an element.

rounded

rounded-md

rounded-lg

rounded-full

```html
<div class="rounded ..."></div>
<div class="rounded-md ..."></div>
<div class="rounded-lg ..."></div>
<div class="rounded-full ..."></div>

```
​
## Pill buttons

Use the rounded-full utility to create pill buttons.

rounded-full

Save Changes

```html
<button class="rounded-full ...">Save Changes</button>

```
​
## No rounding

Use rounded-none to remove an existing border radius from an element.

rounded-none

Save Changes
<button class="rounded-none ...">Save Changes</button>
This is most commonly used to remove a border radius that was applied at a smaller breakpoint.

​
Rounding sides separately
Use rounded-{t|r|b|l}{-size?} to only round one side of an element.

rounded-t-lg

rounded-r-lg

rounded-b-lg

rounded-l-lg

<div class="rounded-t-lg ..."></div>
<div class="rounded-r-lg ..."></div>
<div class="rounded-b-lg ..."></div>
<div class="rounded-l-lg ..."></div>
​
Rounding corners separately
Use rounded-{tl|tr|br|bl}{-size?} to only round one corner an element.

rounded-tl-lg

rounded-tr-lg

rounded-br-lg

rounded-bl-lg

<div class="rounded-tl-lg ..."></div>
<div class="rounded-tr-lg ..."></div>
<div class="rounded-br-lg ..."></div>
<div class="rounded-bl-lg ..."></div>
​
Using logical properties
Use the rounded-{s|e|ss|se|es|ee}{-size?} utilities to set the border radius using logical properties, which map to the appropriate corners based on the text direction.

Left-to-right

Right-to-left

<div dir="ltr">
  <div class="rounded-s-lg ..."></div>
<div>

<div dir="rtl">
  <div class="rounded-s-lg ..."></div>
<div>
Here are all the available border color logical property utilities and their physical property equivalents in both LTR and RTL modes.

Class	Left-to-right	Right-to-left
rounded-s-*	rounded-l-*	rounded-r-*
rounded-e-*	rounded-r-*	rounded-l-*
rounded-ss-*	rounded-tl-*	rounded-tr-*
rounded-se-*	rounded-tr-*	rounded-tl-*
rounded-es-*	rounded-bl-*	rounded-br-*
rounded-ee-*	rounded-br-*	rounded-bl-*
For more control, you can also use the LTR and RTL modifiers to conditionally apply specific styles depending on the current text direction.