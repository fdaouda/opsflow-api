<?php
declare(strict_types=1);
namespace App\Service;

class RequestService {

    public function findById(int $id): array {
        return [
                "id" => $id,
                "title" => "Demo request",
                "status" => "OPEN"
                ];
    }
}