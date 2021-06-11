<?php

namespace AwesomePackages\AwesomeCli\Tools;

use AwesomePackages\AwesomeCli\Enum\Colors;

final class Printer
{
    public static function echo(string $message): void
    {
        echo $message . PHP_EOL;
    }

    public static function customColor(string $message, string $color = Colors::RESET): void
    {
        echo $color . $message . Colors::RESET . PHP_EOL;
    }
}
