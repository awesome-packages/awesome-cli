<?php

namespace AwesomePackages\AwesomeCli\Exception;

use Throwable;

class CommandNotExtendsAwesomeCommand extends \Exception
{
    public function __construct(string $commandName)
    {
        $message = "$commandName command is not configured correctly, your command needs to extend the AwesomeCommand";

        parent::__construct($message);
    }
}
