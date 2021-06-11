<?php

namespace AwesomePackages\AwesomeCli\Commands;

use AwesomePackages\AwesomeCli\AwesomeCommand;
use AwesomePackages\AwesomeCli\CommandRunner;
use AwesomePackages\AwesomeCli\Enum\Colors;
use AwesomePackages\AwesomeCli\Tools\Printer;

class HelpCommand extends AwesomeCommand
{
    const SIZE_DEFAULT = 25;

    public static function handle(): string
    {
        $commands = [];

        array_map(function ($command) use (&$commands) {
            $command = new $command;

            $commands[$command->getGroup()][] = [
                'action' => $command->getAction(),
                'description' => $command->getDescription(),
            ];
        }, CommandRunner::$commands);

        Printer::echo('Awesome CLI ' . Colors::GREEN . 'v1.0' . Colors::RESET);
        Printer::echo('');
        Printer::customColor('Usage', Colors::YELLOW);
        Printer::echo('  composer awesome-cli group:action');
        Printer::echo('');
        Printer::customColor('Available commands:', Colors::YELLOW);
        Printer::echo(self::generateDescriptionCommand('help', 'Show this display'));

        foreach($commands as $group => $command) {
            Printer::customColor($group, Colors::YELLOW);
            foreach ($command as $item) {
                Printer::echo(
                    self::generateDescriptionCommand(
                        $group . ':' . $item['action'],
                        $item['description']
                    )
                );
            }
        }

        return '';
    }

    public static function generateDescriptionCommand(string $command, string $description): string
    {
        $spacing = (self::SIZE_DEFAULT - strlen($command));

        if ($spacing < 0) {
            $spacing = 1;
        }

        return '  ' . $command . str_repeat(' ', $spacing) . $description;
    }
}
