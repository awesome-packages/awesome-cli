<?php

namespace AwesomePackages\AwesomeCliTests\Mock;

use AwesomePackages\AwesomeCli\AwesomeCommand;

final class CommandWithoutAction extends AwesomeCommand
{
    protected string $group = 'group';
    protected string $action = '';
    protected string $description = 'This is a simple description';
}
