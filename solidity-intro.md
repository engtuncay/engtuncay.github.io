
- [Sources](#sources)
- [Part 1](#part-1)
  - [Örnek Remix Projesi](#örnek-remix-projesi)
  - [Smart Contract Derlenmesi (Compilation)](#smart-contract-derlenmesi-compilation)
  - [ABI](#abi)
  - [Arrays](#arrays)
    - [1. Fixed-size Arrays](#1-fixed-size-arrays)
    - [2. Dynamically-sized arrays](#2-dynamically-sized-arrays)
- [Master the Solidity Programming Language](#master-the-solidity-programming-language)
  - [Standards that Solidity use](#standards-that-solidity-use)
  - [Structure of a Smart Contract](#structure-of-a-smart-contract)
  - [Solidity Basic Syntax](#solidity-basic-syntax)
  - [Solidity Variables](#solidity-variables)
  - [Where does EVM save data?](#where-does-evm-save-data)

# Sources

- Udemy Course , Master ethereum and solidity programming with real world apps , https://www.udemy.com/course/master-ethereum-and-solidity-programming-with-real-world-apps

# Part 1

## Örnek Remix Projesi

remix-project.org 'dan online ide'yi kullanarak veya desktop app kurulumu yaparak uygulayabiliriz.

- Her kaynak kodu lisans belirten bir yorum ile başlaması gerekir.

```js
// SPDX-License-Identifier: GPL-3.0
```

- pragma ile hangi solidity compiler versiyonu kullanacağını belirtiriz.

```js
pragma solidity ^0.8.2;
```

bu app 0.9.x ve 0.7.x compiler'da çalışmaz.

- iki versiyon arası şeklinde de belirtilir.

```js
pragma solidity >0.5.0 <0.9.0;
```

- Örnek Contract Sınıfımız

```js

contract Property {
  int public value;

  function setValue(int _value) public {
    value = _value;
  }
}

```

## Smart Contract Derlenmesi (Compilation)

- Remix ide'de sol taraftan solidity tabını seçeriz. 
- versiyonu seçeriz 
- compile mycontract.sol (dosyanın ismi) buttonu tıklarız.

Hata varsa kırmızı ile işaretleyip gösterir.

The Solidity source code is passed to the solidity compiler and the compile returns the
EVM bytecode that is deployed and the contract ABI - Abstract Binary Interface.

There are many solidity compilers available: Remix built-in compiler, solc, solcjs

Contract bytecode is public. It is saved on the Blockchain and can’t be encrypted
because it must be run by every Ethereum node;

Opcodes are the human readable instructions of the program. They can be easily
obtained from bytecode;

Contract source code doesn’t have to be public. Most contracts are public to build trust.

## ABI

Anyone that wants to interact with the contract must have access to the contract ABI. ABI is basically how you call functions in a contract and get data back;

ABI is list of contract’s function and arguments and it’s in JSON format. ABI is known at compile time.

ABI is generated from source code through compilation. If we don’t have the source code we can’t generate the contract ABI (or only from the bytecode using reverse engineering);

ABI bir nevi API gibidir. (to)

Opcodes : EVM operational codes.

Decompile ederken byte code başına 0x koyarız.

## Arrays

### 1. Fixed-size Arrays

- Has a compile-time fixed size.

- Can store any type (int, uint, address, struct etc).

- bytes1, bytes2, …, bytes32 store a sequence of bytes.

- Has member called length.

### 2. Dynamically-sized arrays

- byte[ ]

- byte[ ] is an alias to bytes

- string (UTF-8 encoding)

- uint[ ], int[ ]

- members: length and push

There are 3 methods

- length

- push

- pop


```js

pragma solidity >= 0.5.0 <0.9.0;

contract DynamicArrays {
  uint [] public numbers;

  function getLength() public view returns (uint) {
    return numbers.length;
  }

  function addElement(uint item) public  {
    numbers.push(item);
  }
}

```

# Master the Solidity Programming Language

## Standards that Solidity use

Solidity compiler encourages the use of machine readable SPDX license identifiers. it is the short for software package data exchange is an open standard used to document information on the software licenses under which a given piece of computer software is distributed.

## Structure of a Smart Contract

- The name of the contract will not be saved on the blockchain. At deployment each contractor receives a unique address that will uniquely identify the contract.

Contracts in solidity are similar to classes in object oriented languages, so each contract can contain declarations of state variables that will be saved on the blockchain, functions, function modifiers, events, structs, and enum types.

There are also special kinds of contracts called libraries and interfaces. 

*Örnek*

```js
// SPDX-License-Identifier: GPL-3.0
pragma solidity >=0.5.0 <0.9.0;

contract Property {
    uint256 private price;
    address public owner;

    constructor() {
        price = 0;
        owner = msg.sender;
    }

    // Function modifier
    modifier onlyOwner() {
        require(msg.sender == owner);
        _;
    }

    function changeOwner(address _owner) public onlyOwner {
        owner = _owner;
    }

    function setPrice(uint _price) public {
        price = _price;
    }

    function getPrice() view public returns (uint) {
        return price;
    }

    // Event
    event ownerChanged(address owner);
}
```

There are two state variables declared: price and owner. 

Price is of type uint or unsigned integer and it is private and owner is of type address and it is public. Their values are permanently stored in contract storage.

Then, we see some functions defined.

The first function is a special one called constructor that is used to initialize the state variables of the contract; it is declared with the constructor keyword and when a contract is created, its constructor is executed once. 

changeOwner() and setPrice() are called setter functions because they change the value of state variables and getPrice() is a getter function because it creates a call that returns the value of the state variable.

There is also a function modifier called oonlyOwner that changes the behavior of the function to which it is applied. In this case, it’s applied to changeOwner(), the one that changes the value of the owner state variable.

And at the end of the contract, we see an event. Events are features that enable logging functionality.

## Solidity Basic Syntax

- Not:

As smart contract code is executed on the EVM, it means that eventually this code is executed on all nodes around the network, so on both mining and non-mining nodes.

That is why Solidity is a more low-level language than commonly used JavaScript or C++.

It is a high-level, statically typed programming language for implementing smart contracts.

It is influenced by C++ and JavaScript and is designed for this virtual machine.

However, it was stripped down as it doesn't include any unnecessary features.

- Solidity is case sensitive, like any other programming language. 
  
- Every statement must end with a semicolon, just as in JavaScript or C++.

- It uses curly braces to the delimit blocks of code.

- Solidity uses C++ and JavaScript syntax for writing comments.

Not : // is double forward slashes

- There's a third type of comment in Solidity, called the NatSpec that is developed and promoted by Ethereum itself. This is a special form of comments in Solidity contracts used by developers when documenting contracts, functions, libraries, return values and more. You may use /// for a single line NatSpec, or /** ending with */ for a multi-line NatSpec comment. (beginning with two stars)

- So an example `/// @notice Returns the price of the Property`. @notice is a predefined NatSpec tag that explains to the users what this tag does. There are more such tags defined.

- Most of the classical control structures and loops are available in Solidity too. However, pay special attention to loops!

Loops do not have a fixed number of iterations and for example, loops that depend on storage values have to be used carefully. They could hit the gas limit, causing the transaction to fail. For this reason, while and do-while loops are rarely used.

## Solidity Variables

Solidity is a statically typed language like C++, Golang or Java, which means that the type of each variable needs to be specified when declaring the variable.

There are two types of variables: state and local.

1. State variables

State variables are declared at the contract level after the name of the contract and are stored on the contract storage

● Declared at contract level;

● Permanently stored in contract storage (so on the blockchain);

Saving state variables on the blockchain is not free and you have to pay gas. According to the Ethereum protocol, saving two 256 bits costs 20k units of gas.

```js
contract Property {
  int public price;
  string constant public location = "London";
}
```

For example, price is a state variable. 

● Can be set as constants;

To declare a constant, so a special variable whose value cannot be changed, use the constant keyword.

I declared another state variable called location of type string that is constant. We suppose that the location of the property cannot change. It's mandatory to specify the value of the constant when declaring it. If you omit the value, you'll get a compiler error. This is an error: uninitialized constant variable.

In Solidity, the concept of undefined or null values does not exist! When you declare new variables, they always have a default value depending on their type. For example, the default value of an int variable is zero.

**Not:**

If you try to change the value of a variable after you declare it, you'll get an error, for example, writing price=100
it's not permitted in Solidity. There is a compilation error.

```js
contract Property {
  int public price;
  string constant public location = "London";

  // price = 100; // this is not permitted in Solidity
}
```

To change the default value of a state variable, there are three possibilities: 

- using the contracts constructor, which is a special kind of function that gets automatically executed when deploying the contract; using a setter function or initializing the variable at declaration.

● Expensive to use, they cost gas;

● Initialized at declaration, using a constructor or after contract deployment by
calling setters;

Also, be aware that storage is not dynamically allocated. What I mean here is that the number of the state variables is fixed at compile time.

This instance of the contract cannot have other state variables besides those already declared. So if I say I want to have another variable called owner in this instance, that won't be possible.

I have to change the contract by declaring that new variable and then deploy a new instance.

All variables must be declared before deploying the contract.

2. Local variables

● Declared inside functions;

Let's move on to local variables; these are variables that are declared and used inside functions and are kept on the stack, not on storage, so they don't save their values between different function calls.

They don't cost gas they are free.

Let's declare a dummy function with a local variable. 

```js
contract Property {
  int public price;
  string constant public location = "London";

  // price = 100; // this is not permitted in Solidity

  function f1 public pure returns(int) { 
    int x = 5; 
    x = x * 2; 
    return x; 
  } 
}
```

I have declared the function pure because it doesn't touch the blockchain. It neither modifies the blockchain nor it reads from the blocks.

X is a local variable that is free and is saved on the stack. Note that there are some types that reference the storage by default, even if they are declared inside the function, their strings, areas, structs and mappings.

● If using the memory keyword and are arrays or struct, they are allocated at runtime.
Memory keyword can’t be used at contract level

So if you want to create a local variable of type string, you have to use the memory key word to limit its lifetime to the function call and not be saved in the storage.

Writing string s1=abc results in an error because string is a special type that by default is saved in storage.

```js
  function f1 public pure returns(int) { 
    int x = 5; 
    x = x * 2; 

    string s1="abc"; // results an error

    return x; 
  } 
}
```

This is an error! I'm adding the memory key word to save it in memory and now everything is fine.

```js
  function f1 public pure returns(int) { 
    int x = 5; 
    x = x * 2; 

    string memory s1="abc";

    return x; 
  } 
}
```

## Where does EVM save data?

So there are free zones where data can be stored: storage stack and memory. Let's come to a conclusion!

1. Storage
- Holds state variables;
- Persistent and expensive (it costs gas);
- Like a computer HDD;

State variables are saved in the contract's storage, so on the Ethereum blockchain, and they cost gas. For example, saving 1 byte costs 5 units of gas. 

2. Stack

Functions and local variables are saved on the stack. if they are not reference types, and don’t cost gas. 

- Holds local variables defined inside functions if they are not reference types (ex: int);

- Free to be used (it doesn’t cost gas);

3. Memory

Functions, arguments and variables, declared inside functions that are reference types but are declared using the *memory* keyword, are saved in the memory and don't cost gas.

- Holds local variables defined inside functions if they are reference types but declared
with the memory keyword;

- Holds function arguments;

- Like a computer RAM;

- Free to be used (it doesn’t cost gas);

Reference Types are string, array, struct and mapping










