# Jupiter CMS

## Introduction

This is an alpha, experimental release of Jupiter CMS!

Dont' use it for production.

## Installation

First, install the Jupiter installer and make sure that the global Composer bin directory is within your system's $PATH:

```
composer global require "socieboy/jupiter-installer=~1.0"
```

Next, create a new Laravel application and install Jupiter.
```
laravel new application

cd application

jupiter install
```

If you want to run the migrations and seeds in the installation, just be sure to update your .env file.