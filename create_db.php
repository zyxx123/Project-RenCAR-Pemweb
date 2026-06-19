<?php
try {
    $db = new PDO('mysql:host=127.0.0.1', 'root', '');
    $db->exec('CREATE DATABASE IF NOT EXISTS rentcar_app');
    echo 'DB created successfully';
} catch (PDOException $e) {
    echo $e->getMessage();
}
