<?php
declare(strict_types=1);

$requests = [
    ['id' => 101, 'title' => 'Printer unavailable', 'priority' => 2, 'assignee' => 'Mariam', 'status' => 'OPEN'],
    ['id' => 102, 'title' => 'Access request',       'priority' => 3, 'assignee' => null,     'status' => 'OPEN'],
    ['id' => 103, 'title' => 'Update workstation',   'priority' => 1, 'assignee' => 'Mariam', 'status' => 'DONE'],
    ['id' => 104, 'title' => 'VPN unavailable',      'priority' => 3, 'assignee' => 'Youssef','status' => 'OPEN'],
];

function rankOpenRequests(array $requests, ?string $assignee = null): array{

    $requests_filtered = array_filter($requests, function($request)  use($assignee) {
        if ($assignee === null) {
            return $request['status'] === "OPEN";
        }
        
        return  $request['status'] === "OPEN" && $request['assignee'] === $assignee;

    });
    
    usort($requests_filtered, function($a, $b) {
        if ($a['priority'] === $b['priority']) {
            return $a['id'] - $b['id'];
        }
             
        return $b['priority'] - $a['priority'];
    });

    return $requests_filtered;
}