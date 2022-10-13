                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
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
  - [Functions, Getter and Setter](#functions-getter-and-setter)
  - [Constructor](#constructor)

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

## Functions, Getter and Setter

A function is an executable unit of code within a contract. Functions create the contract’s interface.

Take a look at the functions defined in this contract.

```js
// SPDX-License-Identifier: GPL-3.0
pragma solidity >=0.5.0 <0.9.0;

contract Property {
    uint256 private price;
    address public owner;

    function setPrice(uint _price) public {
        price = _price;
    }

    function getPrice() view public returns (uint) {
        return price;
    }
}
```

There’s a function called setPrice() which is a setter function because it sets or changes the value of a state variable and a function called getPrice() named getter because it gets or returns the value of a state variable.

Let's talk about the syntax. To create a function, use the correct keyword function followed by the function name and a pair of parentheses. If the function has any parameters write then between parentheses, separated by a comma. By the way, the name of the parameter is _price to differentiate it from the state variable. So price is the state variable stored in the storage and _price is the function parameter stored in memory.

Each function must have a visibility specifier that it is given after the parameter list. In this example, both functions are *public*, which means they are part of the contract interface and can be called internally from the same contract or externally from other contracts or applications.

Other visibility specifiers are *private, internal, and external*. We will have a dedicated lecture on visibility specifiers later in this section.

If the function is a *read-only* one that doesn't alter the storage in any way, it should be declared view or pure.

Note that calling a setter function creates a transaction that needs to be mined and costs gas because it changes the blockchain. 

And calling a getter function creates a call that happens instantly and doesn't cost gas because it doesn't alter the blockchain's state. And if the function returns a value that should be indicated using the returns keyboard and the types of the return values between parentheses with a comma between them; in this example, get price will return to a single value of type int.

There are no compilation errors, so I'm deploying the contract. I've used the JavaScript virtual machine environment. 

![](./img/sol/sol-deploy1.png)

In the deployed contract section if we open up the contract, we'll see a button for each function. The buttons were created by the remix environmen; *getter functions* are *in blue* and *setter functions* in *orange*. If I click a button, it will call the corresponding function, so I'm clicking get price, a call was created and the default value for the price, which is zero was returned.

Now I'm changing the price value, so I'm typing one hundred and clicking set price. A transaction was created and sent and the value of the state variable was changed. Now the price is 100.

In fact, it wasn't really necessary to declare the price get function because the price state variable is public. When you declare a public variable, a getter function is *automatically created*.

This is the getter function: price. It returns the value of the state variable.

Let's change the visibility of the variable location to public. By the way, *the default visibility* for a variable is private. I'm erasing this instance and deploying the new contract.

```js
// SPDX-License-Identifier: GPL-3.0

pragma solidity 0.8.0;

contract Property {
    int public price;
    string public location = "London";

    function setPrice(uint _price) public {
        price = _price;
    }

    function getPrice() view public returns (uint) {
        return price;
    }
}

```

Now, we see a new button called location that is in fact the guitar function that was automatically created for the public state variable.

Let's create a setter function for location, as well.


```js
function set location (string memory _location ) public {
  location = _location;
}
```

_location is a local variable. The memory keyword is required because explicit data location for all variables of type array, string, struct, or mapping is now mandatory. It indicates that the variables will be stored in memory and not in storage.

Now I'm deploying the contract. 

This is the new instance and we see five buttons in the contract section: 3 are getters and the other 2 are setters. a getter was automatically created for price.

Now, we can change the value of both state variables and get their values as well.

I have changed the value of the location variable and I'm getting the new value.

## Constructor

Now, let's talk about the constructor! The constructor is a special function that is executed only once when the contract is created. The function is created with the constructor keyword, there's only one and it is optional.

The constructor is used to initialize state variables when the contract is deployed by an externally owned account or by another contract.

Let's create the constructor of the contract to initialize state variables.

```js
// SPDX-License-Identifier: GPL-3.0
pragma solidity 0.8.0;

contract Property {
    int public price;
    string public location;

    constructor(int _price, string memory _location) {
      price = _price;
      location = _location;
    }

    function setPrice(int _price) public {
        price = _price;
    }

    function getPrice() view public returns (int) {
        return price;
    }
}

```

that's all: the state variable price will be initialized with the value of the _price parameter of the function; and the same location. It's not mandatory for the constructor to have arguments, but it's logical to initialize the state variables so it has two arguments. And the visibility of the constructor, which is normally public, should be ignored, starting with Solidity 0.7.

When I deployed the contract, I'll specify two values for the constructors arguments, price and location,

Let's deploy it!

![](./img/sol/sol-constructor.png)

So the price will be 100 and the location Paris.

This is the transaction that has created the contract and this is the contract's interface.

The constructor has initialized the state variables with the supplied values, so if I click price and location, I'll get those values.

Paris and 100.

It's common for a constructor to register the address of the account that creates the contract in a state variable.

This is the admin of the contract or the owner, and in most cases, he has full access over the contract.

So I'm declaring a new state variable at the contract level called *owner* of type *address*, which is a data type in Solidity and holds an account address.

```js
// SPDX-License-Identifier: GPL-3.0
pragma solidity 0.8.0;

contract Property {
    int public price;
    string public location;
    address public owner;

    constructor(int _price, string memory _location) {
      price = _price;
      location = _location;
      owner = msg.sender;
    }

    function setPrice(int _price) public {
        price = _price;
    }

    function getPrice() view public returns (int) {
        return price;
    }
}

```
Let's look for a second at this line: `owner = msg.sender` in the constructor.

What does it do ? It initializes the owner to the value of msg.sender where msg.sender is a global built-in variable. This variable always stores the address of the account that creates and sends the transaction.

In this case, it's the address of the account that deploys the contract, because that's the only time when the constructor is called. Note that I don’t have to declare variable msg.sender because it’s built-in and always exists.

I'm deploying the contract again, choosing another account, for example, the second one. The address of the account will be stored in msg.sender and it becomes the owner of the contract.

I am deploying it.

This is the new instance.

And if I click the owner button, I'll get the address of that account; it was saved on the blockchain

and I can further implement administrative functions of the contract, like selling the property

functions that will be initialized only from the owner account.

This address

is the address of the second account.

Note that the constructor cannot change the owner to a new address because the constructor is called

only once when the contract is deployed.

If you want to change the owner, you need another function that changes the state variable called

owner.

And probably that function can be called only by the current owner.

Note that almost any contract like, for examplelike for example erc20 token contracts or contracts for decentralized

finance, use this approach to register the owner that has special privileges.

At the end let’s talk about initializing constant or immutable state variables. State variables can

be declared as constant or immutable and in both cases, the variables cannot be modified

after the contract has been deployed. For constant variables, the value has to be fixed at compile time

so we need to set their values at declaration time,

while for immutable, it can still be assigned at construction time.

So if I declare a constant state variable, I also have to initialize it with a value.

For example, int constant area = 100; if I don't initialize the constant with a value,

I'll get an error.

This is an error:

uninitialized "constant" variable. If I declare the variable as being immutable, using the immutable

keyword, the variable can be initialized

the same as a constant at the declaration or in the constructor, but not after the contract was created.

So I'm changing constant to immutable.

There is no error!

Another example would be if I wish no one to be able to change the owner, I can declare the variable

immutable and initialize it in the constructor.

So the owner is immutable and it is initialized in the constructor.

After the contract,s deployment, no one will be able to change the variable,

so the owner.

Compared to regular state variables, the gas costs of constant and immutable variables are much lower.

So this allows for local optimization.









