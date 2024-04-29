[![Latest Stable Version](http://poser.pugx.org/mymoid/api/v)](https://packagist.org/packages/mymoid/api)
[![PHP Version Require](http://poser.pugx.org/mymoid/api/require/php)](https://packagist.org/packages/mymoid/api)

<p align="center">
  <a href="https://developers.mymoid.com" target="_blank" rel="noopener noreferrer">
   <picture>
      <source media="(prefers-color-scheme: dark)" srcset="https://mymoid-static.s3.amazonaws.com/images/mymoid-suit/mymoid_m.svg">
      <img src="https://mymoid-static.s3.amazonaws.com/images/mymoid-suit/mymoid_m.svg" height="64">
    </picture>
  </a>
</p>

# MYMOID PHP SDK Library

## Documentation

- For detailed instructions on getting started with the MYMOID PHP API SDK, please refer to our [developer's portal getting started](https://developers.mymoid.com/guides/getting-started#getting-started).

- For a complete reference of the API, please refer to our [API reference](https://developers.mymoid.com/api-reference).

## Getting started

### Installation

**Prerequisites:** Ensure PHP 8.1 or higher is installed on your system, if you have PHP 7 please follow the manually steps. <br/>
To install the SDK in your project, you need have installed [Composer](https://getcomposer.org/download/).

**Command:** Run the following Composer command:

```sh
composer require mymoid/api
```

Or, if you prefer, you could do it manually following these steps:

1. **Repository Cloning:** Begin by cloning this [repository](https://github.com/mymoid/mymoid-php/tree/main) to your local machine, if you have PHP 7 use this [repository](https://github.com/mymoid/mymoid-php/tree/php-7).

2. **Navigation:** Enter the directory of the cloned repository using your command line interface of choice.

3. **Dependency Installation:** Execute the command `composer install` to install all necessary dependencies.

### Examples

- **Exploring Examples:** Delve into the "examples" folder where a treasure trove of demonstration awaits.

- **Configuration:** Each example file requires configuration of specific parameters. Dive into the code, tweak as needed, and ensure to save your changes.

- **Execution:** Finally, unleash the power of the SDK by executing each example with the command `php example_file_name.php`. For instance, if you're looking to create a payment, invoke `php createpayment.php`. Don't forget, if you're at the root directory of the cloned repository, prepend `/examples/` to the file name, like so: `php /examples/createpayment.php`.
