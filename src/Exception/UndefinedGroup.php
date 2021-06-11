<?php

namespace AwesomePackages\AwesomeCli\Exception;

class UndefinedGroup extends \Exception
{
    public function __construct(string $command)
    {
        parent::__construct("Undefined group in the command $command");
    }
}
