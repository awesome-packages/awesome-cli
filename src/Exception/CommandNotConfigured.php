<?php

namespace AwesomePackages\AwesomeCli\Exception;

class CommandNotConfigured extends \Exception
{
    protected $message = 'Command not configured, create the run method in your command class';
}
