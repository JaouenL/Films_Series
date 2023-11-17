<?php
try {
    $db = new PDO('mysql:host=localhost;port=3306;dbname=dbperso;charset=utf8', 'root', '');
} catch (PDOException $e) {

    http_response_code(400);
    echo json_encode([
        'code' => '400',
        'message' => $e
    ]);
    exit;
}
