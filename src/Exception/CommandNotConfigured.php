<?php

namespace AwesomePackages\AwesomeCli\Exception;

class CommandNotConfigured extends \Exception
{
    protected $message = 'Command not configured, create the handle method in your command class';
}
