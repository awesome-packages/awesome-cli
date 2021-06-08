<?php

namespace AwesomePackages\AwesomeCliTests;

use AwesomePackages\AwesomeCli\CommandRunner;
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
}
