socialcloud-vieber
==================

SocialCloud example using the PHP framework [Vieber](https://github.com/Moxi9/vieber)

## Requirements 

Vieber requires PHP 5.5 or higher.

## Install

Rename the file **config.php.new** to **config.php**

Open the file **config.php**

Enter the full path to where Vieber is located for the constant
```
define('VIEBER_BOOT', '/src/vieber/boot.php');
```

Enter your Moxi9 public & private keys for the constants:
```
define('MOXI9_PUBLIC_KEY', '');
define('MOXI9_PRIVATE_KEY', '');
```

You are all setup. Just point your Moxi9 app to where you have cloned this respository.
