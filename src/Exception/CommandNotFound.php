<?php

namespace AwesomePackages\AwesomeCli\Exception;

class CommandNotFound extends \Exception
{
    protected $message = 'Command not found';
}
