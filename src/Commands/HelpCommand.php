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
        $printer = new Printer();

        array_map(function ($command) use (&$commands) {
            $command = new $command;

            $commands[$command->getGroup()][] = [
                'action' => $command->getAction(),
                'description' => $command->getDescription(),
            ];
        }, CommandRunner::$commands);

        $printer->addMessage('Awesome CLI ' . Colors::GREEN . 'v1.0' . Colors::RESET)
            ->lineBreak()
            ->addMessage('Usage', Colors::YELLOW)
            ->addMessage('  composer awesome-cli group:action')
            ->lineBreak()
            ->addMessage('Available commands:', Colors::YELLOW)
            ->addMessage(self::generateDescriptionCommand('help', 'Show this display'));

        foreach($commands as $group => $command) {
            $printer->addMessage($group, Colors::YELLOW);
            foreach ($command as $item) {
                $printer->addMessage(
                    self::generateDescriptionCommand(
                        $group . ':' . $item['action'],
                        $item['description']
                    )
                );
            }
        }

        return $printer->getMessage();
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
