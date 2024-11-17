<?php

require_once 'config.php';

// Ellenőrizzük, hogy a PHP_CodeSniffer helyesen működik
$command = 'php vendor\\bin\\phpcs --report=json test.php functions.php';
exec($command, $output, $returnVar);

if ($returnVar !== 0) {
    echo "PHP_CodeSniffer encountered an error.\n";
    exit(1);
}

// JSON formátumú kimenet feldolgozása
$jsonOutput = implode("\n", $output);
$data = json_decode($jsonOutput, true);

// Ellenőrizzük a hiba- és figyelmeztetésszámokat
$totalErrors = $data['totals']['errors'] ?? 0;
$totalWarnings = $data['totals']['warnings'] ?? 0;

$maxScore = 10.0;
$score = $maxScore - (($totalErrors * 0.5) + ($totalWarnings * 0.2));
$score = max(0, min($score, $maxScore)); // Biztosítjuk, hogy 0 és 10 között legyen

echo "Score: {$score}\n";

if ($score < THRESHOLD) {
    echo "Code quality is too low!\n";
    exit(1);
} else {
    echo "Code quality is acceptable.\n";
    exit(0);
}
