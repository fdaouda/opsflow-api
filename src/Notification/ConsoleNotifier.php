<?php
declare(strict_types=1);
namespace App\Notification;
final class ConsoleNotifier implements Notifier
{
    public function notify(string $message): void
    {
        echo $message . PHP_EOL;
    }
}