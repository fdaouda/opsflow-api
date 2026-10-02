<?php
declare(strict_types=1);
namespace App\Notification;

interface Notifier
{
    public function notify(string $message): void;
}