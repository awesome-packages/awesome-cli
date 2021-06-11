<?php

namespace AwesomePackages\AwesomeCli;

use AwesomePackages\AwesomeCli\Exception\CommandNotConfigured;

abstract class AwesomeCommand
{
    protected string $group = '';
    protected string $action = '';
    protected string $description = '';

    /**
     * @return string
     * @throws \AwesomePackages\AwesomeCli\Exception\CommandNotConfigured
     */
    public static function handle(): string
    {
        throw new CommandNotConfigured();
    }

    /**
     * @return string
     */
    public function getGroup(): string
    {
        return $this->group;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
}
