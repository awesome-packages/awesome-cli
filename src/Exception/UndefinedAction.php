<?php

namespace AwesomePackages\AwesomeCli\Exception;

class UndefinedAction extends \Exception
{
    public function __construct(string $command)
    {
        parent::__construct("Undefined action in the command $command");
    }
}
