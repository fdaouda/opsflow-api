<?php
declare(strict_types=1);
namespace App\Domain;

enum RequestStatus: string {
    case OPEN = "OPEN";
    case DONE = "DONE";
}