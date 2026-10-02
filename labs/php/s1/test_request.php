<?php
/*declare(strict_types=1);
require("../../../vendor/autoload.php");
use App\Domain\Request;
use App\Notification\ConsoleNotifier;

$notifier = new ConsoleNotifier();
$request = new Request(1, "Bug report", 1, $notifier);

$request->assignTo("John Doe");
$request->close();

var_dump($request);*/

declare(strict_types=1);
require("../../../vendor/autoload.php");
use App\Domain\Request;
use App\Notification\ConsoleNotifier;
use App\Domain\Exception\RequestAlreadyClosed;

$notifier = new ConsoleNotifier();
$request = new Request(1, "request1", 3, $notifier);

try {
    $request->close();
    $request->close();
} catch (RequestAlreadyClosed $e) {
    echo $e->getMessage();
}

