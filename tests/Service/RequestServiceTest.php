<?php

declare(strict_types=1);
use App\Service\RequestService;
use PHPUnit\Framework\TestCase;

class RequestServiceTest extends TestCase {

public function testFindByIdReturnsRequest(): void {
    $service = new RequestService();
    $result = $service->findById(101);
    $this->assertSame(101, $result['id']);
    $this->assertSame("Demo request", $result['title']);
    $this->assertSame("OPEN", $result['status']);

}

}