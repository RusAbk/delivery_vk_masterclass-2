<?php

// Connect to DB
$db = new PDO("mysql:host=localhost;dbname=delivery", "delivery", "admin");

$st = $db->prepare("SELECT * FROM dishes");
$st->execute();

$dishesArr = $st->fetchall(PDO::FETCH_ASSOC);

echo json_encode($dishesArr);

?>