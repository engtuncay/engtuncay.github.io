
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


## Solidity Variables

Variable Types:

1. State variables

● Declared at contract level;

● Permanently stored in contract storage;

● Can be set as constants;

● Expensive to use, they cost gas;

● Initialized at declaration, using a constructor or after contract deployment by
calling setters;

2. Local variables

● Declared inside functions;

● If using the memory keyword and are arrays or struct, they are allocated at runtime.
Memory keyword can’t be used at contract level

## Where does EVM save data?

1. Storage
- Holds state variables;
- Persistent and expensive (it costs gas);
- Like a computer HDD;

2. Stack

- Holds local variables defined inside functions if they are not reference types (ex: int);

- Free to be used (it doesn’t cost gas);

3. Memory

- Holds local variables defined inside functions if they are reference types but declared
with the memory keyword;

- Holds function arguments;

- Like a computer RAM;

- Free to be used (it doesn’t cost gas);

Reference Types: string, array, struct and mapping




