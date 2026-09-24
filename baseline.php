<?php

$tab = [
    ["tâche 1", "OPEN", "URGENT"],
    ["tâche 2", "IN PROGRESS", "NORMAL"], 
    ["tâche 3", "DONE", "NONE"],
    ["tâche 4", "OPEN", "NORMAL"]
];

$tab_filtered = array_filter($tab, function($a) {
    return $a[1] === "OPEN";
});

$priority_map = [
    "NONE" => 0,
    "NORMAL" => 1,
    "URGENT" => 2
];

usort($tab_filtered, function($a, $b) use($priority_map) {
    return $priority_map[$b[2]] - $priority_map[$a[2]];
});

foreach ($tab_filtered as $task) {
    echo $task[0] . " - " . "priorité " . $task[2] . "\n";
}