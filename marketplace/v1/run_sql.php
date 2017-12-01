<?php
function runSQL($SQL) {
    global $pdo;
    $getData = $pdo->prepare($SQL);
    $getData->execute();
    return $getData->fetchAll();
}
function executeSQL($SQL) {
    global $pdo;
    $getData = $pdo->prepare($SQL);
    $getData->execute();
    
}
