<?php

namespace AwesomePackages\AwesomeCliTests\Mock;

use AwesomePackages\AwesomeCli\AwesomeCommand;

final class CommandWithoutDescription extends AwesomeCommand
{
    protected string $group = 'group';
    protected string $action = 'action';
    protected string $description = '';
}
