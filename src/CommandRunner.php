<?php

namespace AwesomePackages\AwesomeCli;

use AwesomePackages\AwesomeCli\Exception\CommandNotExtendsAwesomeCommand;
use AwesomePackages\AwesomeCli\Exception\CommandNotFound;
use AwesomePackages\AwesomeCli\Exception\DuplicateCommand;
use AwesomePackages\AwesomeCli\Exception\UndefinedAction;
use AwesomePackages\AwesomeCli\Exception\UndefinedDescription;
use AwesomePackages\AwesomeCli\Exception\UndefinedGroup;

final class CommandRunner
{
    private const DEFAULT_CLASS = 'AwesomePackages\AwesomeCli\AwesomeCommand';

    public static array $commands = [];

    /**
     * @param array $commands
     * @return void
     *
     * @throws \AwesomePackages\AwesomeCli\Exception\CommandNotExtendsAwesomeCommand
     * @throws \AwesomePackages\AwesomeCli\Exception\UndefinedGroup
     * @throws \AwesomePackages\AwesomeCli\Exception\UndefinedAction
     * @throws \AwesomePackages\AwesomeCli\Exception\UndefinedDescription
     */
    public static function registerCommand(array $commands): void
    {
        foreach ($commands as $command) {
            self::validateWhetherTheClassExtendsTheAwesomeCommandOrCry($command);
            self::validateIfTheClassHasAttributesOrCry($command);

            self::$commands[] = $command;
        }
    }

    /**
     * @param string $command
     * @return void
     *
     * @throws \AwesomePackages\AwesomeCli\Exception\CommandNotExtendsAwesomeCommand
     */
    private static function validateWhetherTheClassExtendsTheAwesomeCommandOrCry(string $command): void
    {
        $extensionName = get_parent_class($command);

        if ($extensionName !== self::DEFAULT_CLASS) {
            throw new CommandNotExtendsAwesomeCommand($command);
        }
    }

    /**
     * @param string $command
     * @return void
     *
     * @throws \AwesomePackages\AwesomeCli\Exception\UndefinedGroup
     * @throws \AwesomePackages\AwesomeCli\Exception\UndefinedAction
     * @throws \AwesomePackages\AwesomeCli\Exception\UndefinedDescription
     */
    private static function validateIfTheClassHasAttributesOrCry(string $command): void
    {
        $class = new $command;

        $groupAttribute = $class->getGroup();
        if (empty($groupAttribute)) {
            throw new UndefinedGroup();
        }

        $actionAttribute = $class->getAction();
        if (empty($actionAttribute)) {
            throw new UndefinedAction();
        }

        $descriptionAttribute = $class->getDescription();
        if (empty($descriptionAttribute)) {
            throw new UndefinedDescription();
        }
    }

    /**
     * @param string $argument
     * @return string
     *
     * @throws \AwesomePackages\AwesomeCli\Exception\CommandNotFound
     * @throws \ReflectionException
     * @throws \AwesomePackages\AwesomeCli\Exception\DuplicateCommand
     */
    public static function runCommand(string $argument): string
    {
        $classCommand = array_filter(self::$commands, function($command) use ($argument) {
            $class = new $command;

            $group = $class->getGroup();
            $action = $class->getAction();

            return $argument === $group . ':' . $action ? $command : '';
        });

        if (empty($classCommand)) {
            throw new CommandNotFound();
        }

        if (count($classCommand) > 1) {
            throw new DuplicateCommand();
        }

        return (new \ReflectionMethod($classCommand[0], 'run'))->invoke(new $classCommand[0]);
    }
}
