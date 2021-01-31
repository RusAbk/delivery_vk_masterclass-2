<?php

// Connect to DB
$db = new PDO("mysql:host=localhost;dbname=delivery", "delivery", "admin");

$st = $db->prepare("SELECT * FROM users WHERE token = :t");
$st->bindParam(':t', $_REQUEST['token']);
$st->execute();

$userData = $st->fetch(PDO::FETCH_ASSOC);

if( empty($userData) ){
    echo json_encode([
        'status' => 'error',
        'description' => 'Token is invalid'
    ]);
} else {
    if($userData['role'] == 0){
        $st = $db->prepare("INSERT INTO orders (client_id, dishes) VALUES (:id, :d)");
        $st->bindParam(':id', $userData['id']);
        $st->bindParam(':d', $_REQUEST['dishes']);
        $st->execute();

        echo json_encode([
            'status' => 'ok',
            'order_id' => $db->lastInsertId()
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'description' => 'Access denied'
        ]);
    }
}

?>