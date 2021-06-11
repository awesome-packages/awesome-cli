<?php

namespace AwesomePackages\AwesomeCliTests\Exception;

use AwesomePackages\AwesomeCli\CommandRunner;
use AwesomePackages\AwesomeCli\Exception\CommandNotConfigured;
use AwesomePackages\AwesomeCli\Exception\CommandNotExtendsAwesomeCommand;
use AwesomePackages\AwesomeCli\Exception\CommandNotFound;
use AwesomePackages\AwesomeCli\Exception\DuplicateCommand;
use AwesomePackages\AwesomeCli\Exception\UndefinedAction;
use AwesomePackages\AwesomeCli\Exception\UndefinedDescription;
use AwesomePackages\AwesomeCli\Exception\UndefinedGroup;
use AwesomePackages\AwesomeCliTests\Mock\CommandWithoutAction;
use AwesomePackages\AwesomeCliTests\Mock\CommandWithoutDescription;
use AwesomePackages\AwesomeCliTests\Mock\CommandWithoutGroup;
use AwesomePackages\AwesomeCliTests\Mock\CommandWithoutRunMethod;
use PHPUnit\Framework\TestCase;

final class AwesomeCliExceptionsTest extends TestCase
{
    /** @before */
    public function clearsRegisteredCommands()
    {
        CommandRunner::$commands = [];
    }
    
    /** @test */
    public function givenCommandClass_WithoutTheGroupAttribute_ShouldThrowException(): void
    {
        $this->expectException(UndefinedGroup::class);
        $this->expectExceptionMessage('Undefined group in the command AwesomePackages\AwesomeCliTests\Mock\CommandWithoutGroup');

        CommandRunner::registerCommand([
            CommandWithoutGroup::class
        ]);
    }

    /** @test */
    public function givenCommandClass_WithoutTheActionAttribute_ShouldThrowException(): void
    {
        $this->expectException(UndefinedAction::class);
        $this->expectExceptionMessage('Undefined action in the command AwesomePackages\AwesomeCliTests\Mock\CommandWithoutAction');

        CommandRunner::registerCommand([
            CommandWithoutAction::class
        ]);
    }

    /** @test */
    public function givenCommandClass_WithoutTheDescriptionAttribute_ShouldThrowException(): void
    {
        $this->expectException(UndefinedDescription::class);
        $this->expectExceptionMessage('Undefined description in the command AwesomePackages\AwesomeCliTests\Mock\CommandWithoutDescription');

        CommandRunner::registerCommand([
            CommandWithoutDescription::class
        ]);
    }

    /** @test */
    public function givenCommandRunner_WithClassThatAreNotCommands_ShouldThrowException(): void
    {
        $this->expectException(CommandNotExtendsAwesomeCommand::class);
        $this->expectExceptionMessage('stdClass command is not configured correctly, your command needs to extend the AwesomeCommand');

        CommandRunner::registerCommand([
            \stdClass::class
        ]);
    }

    /** @test */
    public function givenCommandRunner_WithANonExistentCommand_ShouldThrowException(): void
    {
        $this->expectException(CommandNotFound::class);
        $this->expectExceptionMessage('Command not found');

        CommandRunner::registerCommand([
            CommandWithoutRunMethod::class
        ]);

        CommandRunner::runCommand('command:not-found');
    }

    /** @test */
    public function givenCommandRunner_WithDuplicatedCommand_ShouldThrowException(): void
    {
        $this->expectException(DuplicateCommand::class);
        $this->expectExceptionMessage('Command is duplicated, see registered commands and fix this problem');

        CommandRunner::registerCommand([
            CommandWithoutRunMethod::class,
            CommandWithoutRunMethod::class
        ]);

        CommandRunner::runCommand('command:without-run');
    }

    /** @test */
    public function givenCommandRunner_WithClassThatNotConfiguredRunMethod_ShouldThrowException(): void
    {
        $this->expectException(CommandNotConfigured::class);
        $this->expectExceptionMessage('Command not configured, create the handle method in your command class');

        CommandRunner::registerCommand([
            CommandWithoutRunMethod::class
        ]);

        CommandRunner::runCommand('command:without-run');
    }
}
