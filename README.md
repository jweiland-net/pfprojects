# TYPO3 Extension `pfprojects`

[![Latest Stable Version](https://poser.pugx.org/jweiland/pfprojects/v/stable.svg)](https://packagist.org/packages/jweiland/pfprojects)
[![TYPO3 10.4](https://img.shields.io/badge/TYPO3-10.4-green.svg)](https://get.typo3.org/version/10)
[![TYPO3 11.5](https://img.shields.io/badge/TYPO3-11.5-green.svg)](https://get.typo3.org/version/11)
[![Total Downloads](https://poser.pugx.org/jweiland/pfprojects/downloads.svg)](https://packagist.org/packages/jweiland/pfprojects)
[![Monthly Downloads](https://poser.pugx.org/jweiland/pfprojects/d/monthly)](https://packagist.org/packages/jweiland/pfprojects)
![Build Status](https://github.com/jweiland-net/pfprojects/actions/workflows/ci.yml/badge.svg)

Pfprojects is an extension for TYPO3 CMS. It shows you a list of projects.
Useful extension for example city/town websites
detail view.

## 1 Features

* Create and manage projects

## 2 Usage

### 2.1 Installation

#### Installation using Composer

The recommended way to install the extension is using Composer.

Run the following command within your Composer based TYPO3 project:

```
composer require jweiland/pfprojects
```

#### Installation as extension from TYPO3 Extension Repository (TER)

Download and install `pfprojects` with the extension manager module.

### 2.2 Minimal setup

1) Include the static TypoScript of the extension.
2) Create project records on a sysfolder.
3) Create a plugin on a page and select at least the sysfolder as startingpoint.
