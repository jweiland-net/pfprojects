# TYPO3 Extension `pfprojects`

![Build Status](https://github.com/jweiland-net/pfprojects/workflows/CI/badge.svg)

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
