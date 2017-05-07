<?php
    $dsn = 'mysql:host=sql1.njit.edu;dbname=ab936';
    $username = 'ab936';
    $password = 'Debolina2024';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error = $e->getMessage();
        include('../errors/error.php');
        exit();
    }
?>
