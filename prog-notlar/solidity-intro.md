
- [Part 1](#part-1)
  - [Remix Proje Kurulumu](#remix-proje-kurulumu)
  - [Smart Contract Compilation](#smart-contract-compilation)
  - [Arrays](#arrays)
    - [1. Fixed-size Arrays](#1-fixed-size-arrays)
    - [2. Dynamically-sized arrays](#2-dynamically-sized-arrays)

# Part 1

## Remix Proje Kurulumu

remix-project.org 'dan online ide veya desktop app kurulumu yaparak uygulayabiliriz.

1. online ide
2. desktop app

- every source file should start with a comment indicating its license.

```js

// SPDX-License-Identifier: GPL-3.0

```

- pragma check solidity compiler version

```js
pragma solidity 0.8.0;
```

- contract example

```js

contract Property {
  int public value;

  function setValue(int _value) public {
    value = _value;
  }
}

```


## Smart Contract Compilation

- Remix ide'de sol taraftan solidity tabını seçeriz. versiyonu seçip , compile mycontract.sol (dosyanın ismi) buttonu tıklarız.

- hata varsa kırmızı ile işaretleyip gösterir.

- The Solidity source code is passed to the solidity compiler and the compile returns the
EVM bytecode that is deployed and the contract ABI - Abstract Binary Interface.

- There are many solidity compilers available: Remix built-in compiler, solc, solcjs

- Contract bytecode is public. It is saved on the Blockchain and can’t be encrypted
because it must be run by every Ethereum node;

- Opcodes are the human readable instructions of the program. They can be easily
obtained from bytecode;

- Contract source code doesn’t have to be public. Most contracts are public to build trust.




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

- uint[], int[ ]

- members: length and push

- There are 3 methods

length

push

pop


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


