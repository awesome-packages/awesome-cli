<?php

namespace AwesomePackages\AwesomeCli\Tools;

use AwesomePackages\AwesomeCli\Enum\Colors;

final class Printer
{
    public string $message = '';

    public function addMessage(string $message, string $color = Colors::RESET): self
    {
        $this->message .= $color . $message . Colors::RESET . PHP_EOL;
        return $this;
    }

    public function lineBreak(): self
    {
        $this->message .= PHP_EOL;
        return $this;
    }
    
    public function getMessage(): string
    {
        return $this->message;
    }

    public function send(): void
    {
        echo $this->message;
    }
}
