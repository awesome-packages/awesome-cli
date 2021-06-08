<?php

namespace AwesomePackages\AwesomeCli\Exception;

class DuplicateCommand extends \Exception
{
    protected $message = 'Command is duplicated, see registered commands and fix this problem';
}
