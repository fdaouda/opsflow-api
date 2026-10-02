<?php
declare(strict_types=1);
namespace App\Domain;
use App\Notification\Notifier;
use App\Domain\Exception\RequestAlreadyClosed;
use App\Domain\Exception\InvalidAssignee;

final class Request
{
    public function __construct(
        public readonly int $id,
        public string $title,
        public int $priority,
        public Notifier $notifier,
        public ?string $assignee = null,
        public RequestStatus $status = RequestStatus::OPEN,
    ) {
    }

    public function assignTo(string $assignee): void {
        if ( trim($assignee) === '') {
            throw new InvalidAssignee("chaîne vide ou composée uniquement d\’espaces");
        }
        $this->assignee = $assignee;
        $this->notifier->notify("Request " . $this->id . " assigned to " . $assignee);
    }

    public function close(): void  {
        if ($this->status === RequestStatus::DONE) {
            throw new RequestAlreadyClosed("Une Request déjà DONE ne peut pas être fermée une seconde fois.");
        }
        $this->status = RequestStatus::DONE;
    }
}