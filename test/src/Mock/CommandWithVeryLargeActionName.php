<?php

namespace AwesomePackages\AwesomeCliTests\Mock;

use AwesomePackages\AwesomeCli\AwesomeCommand;

final class CommandWithVeryLargeActionName extends AwesomeCommand
{
    protected string $group = 'group';
    protected string $action = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
    protected string $description = 'This is a simple description';
}
