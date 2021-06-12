<?php

namespace AwesomePackages\AwesomeCliTests;

use AwesomePackages\AwesomeCli\CommandRunner;
use AwesomePackages\AwesomeCli\Commands\HelpCommand;
use AwesomePackages\AwesomeCliTests\Mock\CommandWithVeryLargeActionName;
use AwesomePackages\AwesomeCliTests\Mock\SayHelloWorldCommand;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

final class CommandRunnerTest extends TestCase
{
    /** @test */
    public static function givenCommandRunner_WithCommandClass_ShouldRunnerCommands(): void
    {
        CommandRunner::registerCommand([
            SayHelloWorldCommand::class
        ]);

        $expectedCommand = ['AwesomePackages\AwesomeCliTests\Mock\SayHelloWorldCommand'];
        $commands = CommandRunner::$commands;

        Assert::assertEquals($expectedCommand, $commands);

        $expectedReturn = 'Hello World';
        $return = CommandRunner::runCommand('say:hello-world');

        Assert::assertEquals($expectedReturn, $return);
    }

    /** @test */
    public static function givenCommandRunner_WithHelpCommand_ShouldReturnHelpDetails(): void
    {
        CommandRunner::registerCommand([
            CommandWithVeryLargeActionName::class
        ]);

        $exceptedReturn = HelpCommand::handle();
        $return = CommandRunner::runCommand('help');

        Assert::assertEquals($exceptedReturn, $return);
    }
}
