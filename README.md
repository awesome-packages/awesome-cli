![awesome-cli](https://socialify.git.ci/awesome-packages/awesome-cli/image?description=1&descriptionEditable=An%20awesome%20package%20for%20cli&forks=1&issues=1&language=1&logo=https%3A%2F%2Favatars.githubusercontent.com%2Fu%2F84918258%3Fv%3D4&owner=1&pulls=1&stargazers=1&theme=Dark)

![Packagist Downloads](https://img.shields.io/packagist/dt/awesome-packages/awesome-cli?style=flat-square)
![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/awesome-packages/awesome-cli?style=flat-square)
![Codecov](https://img.shields.io/codecov/c/github/awesome-packages/awesome-cli?style=flat-square)
[![CodeFactor](https://www.codefactor.io/repository/github/awesome-packages/awesome-cli/badge)](https://www.codefactor.io/repository/github/awesome-packages/awesome-cli)
[![Build Status](https://travis-ci.com/awesome-packages/awesome-cli.svg?branch=main)](https://travis-ci.com/awesome-packages/awesome-cli)
![GitHub issues](https://img.shields.io/github/issues/awesome-packages/awesome-cli?style=flat-square)
![GitHub pull requests](https://img.shields.io/github/issues-pr/awesome-packages/awesome-cli?style=flat-square)
![Gitmoji](https://img.shields.io/badge/gitmoji-%20😜%20😍-FFDD67.svg?style=flat-square)

## How to install

To install the package use the command below

`composer require awesome-packages/awesome-cli`

## How to use

Add script in composer.json:

```json
"scripts": {
    "awesome-cli": "./vendor/bin/awesome-cli"
}
```

Create your command class:
```php
<?php

namespace AwesomePackages\AwesomeCliTests\Mock;

use AwesomePackages\AwesomeCli\AwesomeCommand;

final class SayHelloWorldCommand extends AwesomeCommand
{
    protected string $group = 'say';
    protected string $action = 'hello-world';
    protected string $description = 'This is a simple description';

    public static function handle(): string
    {
        return 'Hello World';
    }
}
```

Create **commands.php** file in **src/config** folder:

```php
<?php

\AwesomePackages\AwesomeCli\CommandRunner::registerCommand([
    \AwesomePackages\AwesomeCliTests\Mock\SayHelloWorldCommand::class,
    ... // More commands
]);
```

The folder structure will look like this:

```
src
|_ commands
   |_ SayHelloWorldCommand.php
|_ config
   |_ commands.php
```

Finally, run the command below:

`composer awesome-cli say:hello-world`

## License

[MIT](LICENSE) &copy; AwesomeCli
