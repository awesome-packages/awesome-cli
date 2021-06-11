<?php

namespace AwesomePackages\AwesomeCli\Exception;

class UndefinedDescription extends \Exception
{
    public function __construct(string $command)
    {
        parent::__construct("Undefined description in the command $command");
    }
}
