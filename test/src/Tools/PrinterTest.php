<?php

namespace AwesomePackages\AwesomeCliTests\Tools;

use AwesomePackages\AwesomeCli\Enum\Colors;
use AwesomePackages\AwesomeCli\Tools\Printer;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class PrinterTest extends TestCase
{
    /** @test */
    public static function givenPrinterClass_WithSimpleMessage_ShouldReturnMessage(): void
    {
        $printer = new Printer();
        $printer->addMessage('Hello World');
        $message = $printer->getMessage();

        $expectedMessage = Colors::RESET . 'Hello World' . Colors::RESET . PHP_EOL;

        Assert::assertEquals($expectedMessage, $message);
    }

    /** @test */
    public static function givenPrinterClass_WithColorMessage_ShouldReturnMessage(): void
    {
        $printer = new Printer();
        $printer->addMessage('Hello World', Colors::GREEN);
        $message = $printer->getMessage();

        $expectedMessage = Colors::GREEN . 'Hello World' . Colors::RESET . PHP_EOL;

        Assert::assertEquals($expectedMessage, $message);
    }

    /** @test */
    public static function givenPrinterClass_WithMessageUsingLineBreak_ShouldReturnMessage(): void
    {
        $printer = new Printer();
        $printer->addMessage('Hello World', Colors::GREEN)
            ->lineBreak();
        $message = $printer->getMessage();

        $expectedMessage = Colors::GREEN . 'Hello World' . Colors::RESET . PHP_EOL . PHP_EOL;

        Assert::assertEquals($expectedMessage, $message);
    }
}
