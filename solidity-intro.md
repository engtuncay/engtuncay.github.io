
- [Part 1](#part-1)
  - [Remix Proje Kurulumu](#remix-proje-kurulumu)
  - [Smart Contract Derlenmesi (Compilation)](#smart-contract-derlenmesi-compilation)
  - [ABI](#abi)
  - [Arrays](#arrays)
    - [1. Fixed-size Arrays](#1-fixed-size-arrays)
    - [2. Dynamically-sized arrays](#2-dynamically-sized-arrays)

# Part 1

## Remix Proje Kurulumu

remix-project.org 'dan online ide'yi kullanarak veya desktop app kurulumu yaparak uygulayabiliriz.

- Her kaynak kodu lisans belirten bir yorum ile başlaması gerekir.

```js

// SPDX-License-Identifier: GPL-3.0

```

- pragma ile hangi solidity compiler versiyonu kullanacağını belirtiriz.

```js
pragma solidity 0.8.0;
```

- örnek contract.

```js

contract Property {
  int public value;

  function setValue(int _value) public {
    value = _value;
  }
}

```

## Smart Contract Derlenmesi (Compilation)

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

## ABI

- Anyone that wants to interact with the contract must have access to the contract ABI. ABI is basically how you call functions in a contract and get data back;

- ABI is list of contract’s function and arguments and it’s in JSON format. ABI is known at compile time.

- ABI is generated from source code through compilation. If we don’t have the source code we can’t generate the contract ABI (or only from the bytecode using reverse engineering);

- ABI bir nevi API gibidir. (to)

Opcodes : EVM operational codes.

- Decompile ederken byte code başına 0x koyarız.



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


