---
title: npm vs Yarn Command Translation Cheat Sheet
subtitle: CLI commands comparison
author: yarn
date: February 15, 2020
source: https://yarnpkg.com/en/docs/migrating-from-npm
---

# npm vs Yarn Command Translation Cheat Sheet

| npm                                       | yarn                            | npm short        |
|-------------------------------------------|---------------------------------|------------------|
| `npm --v`                                 | `yarn --version`                |                  |
| `npm init`                                | `yarn init`                     |                  |
| `npm install`                             | `yarn`                          |                  |
| `npm install [package]`                   | `(N/A)`                         |                  |
| `npm install --save [package]`            | `yarn add [package]`            |                  |
| `npm install --save-dev [package]`        | `yarn add [package] --dev`      | `npm install -D` |
| `npm install --global [package]`          | `yarn global add [package]`     |                  |
| `npm update --global`                     | `yarn global upgrade`           |                  |
| `npm uninstall [package]`                 | `(N/A)`                         |                  |
| `npm uninstall --save [package]`          | `yarn remove [package]`         |                  |
| `npm uninstall --save-dev [package]`      | `yarn remove [package]`         |                  |
| `npm uninstall --save-optional [package]` | `yarn remove [package]`         |                  |
| `npm cache clean`                         | `yarn cache clean`              |                  |
| `rm -rf node_modules && npm install`      | `yarn upgrade`                  |                  |
| `(N/A)`                                   | `yarn install --flat`           |                  |
| `(N/A)`                                   | `yarn install --har`            |                  |
| `(N/A)`                                   | `yarn install --no-lockfile`    |                  |
| `(N/A)`                                   | `yarn install --pure-lockfile`  |                  |
| `(N/A)`                                   | `yarn add [package] --peer`     |                  |
| `npm install --save-optional [package]`   | `yarn add [package] --optional` |                  |
| `npm install --save-exact [package]`      | `yarn add [package] --exact`    |                  |
| `(N/A)`                                   | `yarn add [package] --tilde`    |                  |
| `npm rebuild`                             | `yarn add --force`              |                  |
| `npm version major`                       | `yarn version --major`          |                  |
| `npm version minor`                       | `yarn version --minor`          |                  |
| `npm version patch`                       | `yarn version --patch`          |                  |