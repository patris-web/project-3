<?php

session_start();

require_once 'db/config.php';

    $username = 'admin';
    $password = '1999';
    $role = 'admin';

    if(empty($username))
    {
       die('Το Username είναι υποχρεωτικό!');
    }

    elseif(empty($password))
    {
        die('Το Password είναι υποχρεωτικό!');
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password,role)
                                VALUES (:username, :password, :role)");
    $result = $stmt->execute([
        ':username' => $username,
        ':password' => $hashed_password,
        ':role' => $role
    ]);
        
    if($result)
    {
        echo 'Η εγγραφη έγινε';
    }
    else
    {
        echo 'Κάτι πήγε στραβά!';
    }

?>