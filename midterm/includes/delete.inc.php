<?php
require_once 'dbc.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $firstname = $_GET['firstname'];
    $lastname = $_GET['lastname'];
    $birthday = $_GET['birthday'];

    $sql = "DELETE FROM students WHERE firstname = :firstname AND lastname = :lastname AND birthday = :birthday;";
     $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':firstname', $firstname);
    $stmt->bindValue(':lastname', $lastname);
    $stmt->bindValue(':birthday', $birthday);

    try {
        $stmt->execute();
        header("Location: ../index.php?status=deleted");
        exit();
    } catch (PDOException $e) {
        echo "Error: Data could not be deleted.";
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>