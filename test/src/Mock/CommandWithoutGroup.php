<?php

namespace AwesomePackages\AwesomeCliTests\Mock;

use AwesomePackages\AwesomeCli\AwesomeCommand;

final class CommandWithoutGroup extends AwesomeCommand
{
    protected string $group = '';
    protected string $action = 'action';
    protected string $description = 'This is a simple description';
}
