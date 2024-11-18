
- [Cheatsheet](#cheatsheet)
- [Code Play For Tailwind](#code-play-for-tailwind)
- [Preflight (Reset values)](#preflight-reset-values)
- [General Concepts](#general-concepts)
  - [Size Table ($spacing)](#size-table-spacing)
  - [Fraction Sizes](#fraction-sizes)
  - [Special Sizes](#special-sizes)
  - [Responsive Sizes](#responsive-sizes)

# Cheatsheet

- Umeshmk Cheatsheet *5, https://umeshmk.github.io/Tailwindcss-cheatsheet/

- https://nerdcave.com/tailwind-cheat-sheet

- https://tailwindcomponents.com/cheatsheet/

- Tailwind Doc, https://tailwindcss.com/docs/installation



# Code Play For Tailwind

- Tailwind official Code Play : https://play.tailwindcss.com/

- Tailwind Demos : https://8mrjrn.csb.app/

- CodePen : https://codepen.io/engtuncay/pen/vYjgOMy

# Preflight (Reset values)

Source  : https://tailwindcss.com/docs/preflight

# General Concepts

## Size Table ($spacing)

- 0.25rem (size value) * 4 = 1 ($spacing)
- 1 ($spacing) * 4 = 4px

Size ($spacing) Table

Size | Properties | Pixel
-----|------------|------
0    | 0px;       | 0px
px   | 1px        | 1px
0.5  | 0.125rem;  | 2px
1    | 0.25rem;   | 4px
1.5  | 0.375rem;  | 6px
2    | 0.5rem;    | 8px
2.5  | 0.625rem;  | 10px
3    | 0.75rem;   | 12px
3.5  | 0.875rem;  |
4    | 1rem;      |
5    | 1.25rem;   |
6    | 1.5rem;    |
7    | 1.75rem;   |
8    | 2rem;      |
9    | 2.25rem;   |
10   | 2.5rem;    |
11   | 2.75rem;   |
12   | 3rem;      |
14   | 3.5rem;    |
16   | 4rem;      |
20   | 5rem;      |
24   | 6rem;      |
28   | 7rem;      |
32   | 8rem;      |
36   | 9rem;      |
40   | 10rem;     |
44   | 11rem;     |
48   | 12rem;     |
52   | 13rem;     |
56   | 14rem;     |
60   | 15rem;     |
64   | 16rem;     |
72   | 18rem;     |
80   | 20rem;     |
96   | 24rem;     | 384px

**Examples**

Class | Css Value
------|---------------
w-2   | width: 0.5rem;
w-px  | width: 1px


✏ pixel value is taken from padding table (https://tailwindcss.com/docs/padding)

## Fraction Sizes

Class   | Properties
--------|-------------------
w-1/2   | width: 50%;
w-1/3   | width: 33.333333%;
w-2/3   | width: 66.666667%;
w-1/4   | width: 25%;
w-2/4   | width: 50%;
w-3/4   | width: 75%;
w-1/5   | width: 20%;
w-2/5   | width: 40%;
w-3/5   | width: 60%;
w-4/5   | width: 80%;
w-1/6   | width: 16.666667%;
w-2/6   | width: 33.333333%;
w-3/6   | width: 50%;
w-4/6   | width: 66.666667%;
w-5/6   | width: 83.333333%;
w-1/12  | width: 8.333333%;
w-2/12  | width: 16.666667%;
w-3/12  | width: 25%;
w-4/12  | width: 33.333333%;
w-5/12  | width: 41.666667%;
w-6/12  | width: 50%;
w-7/12  | width: 58.333333%;
w-8/12  | width: 66.666667%;
w-9/12  | width: 75%;
w-10/12 | width: 83.333333%;
w-11/12 | width: 91.666667%;
w-full  | width : 100%

## Special Sizes

Class    | Properties
---------|--------------------
w-auto   | width: auto;
w-screen | width: 100vw;
w-min    | width: min-content;
w-max    | width: max-content;
w-fit    | width: fit-content;

## Responsive Sizes

Size       | Value
-----------|-------
xs         | 20rem
sm         | 24rem
md         | 28rem
lg         | 32rem
xl         | 36rem
2xl        | 42rem
3xl        | 48rem
4xl        | 56rem
5xl        | 64rem
6xl        | 72rem
7xl        | 80rem
screen-sm  | 640px
screen-md  | 768px
screen-lg  | 1024px
screen-xl  | 1280px
screen-2xl | 1536px

