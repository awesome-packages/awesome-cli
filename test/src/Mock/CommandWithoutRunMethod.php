<?php

namespace AwesomePackages\AwesomeCliTests\Mock;

use AwesomePackages\AwesomeCli\AwesomeCommand;

final class CommandWithoutRunMethod extends AwesomeCommand
{
    protected string $group = 'command';
    protected string $action = 'without-run';
    protected string $description = 'This is a simple description';
}
