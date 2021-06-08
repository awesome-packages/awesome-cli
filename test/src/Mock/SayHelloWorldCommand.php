<?php

namespace AwesomePackages\AwesomeCliTests\Mock;

use AwesomePackages\AwesomeCli\AwesomeCommand;

final class SayHelloWorldCommand extends AwesomeCommand
{
    protected string $group = 'say';
    protected string $action = 'hello-world';
    protected string $description = 'This is a simple description';

    public function run(): string
    {
        return 'Hello World';
    }
}
