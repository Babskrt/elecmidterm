<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'dbc.inc.php';

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birthday = $_POST['birthday'];

    // Do your code here
    $query = "INSERT INTO students (firstname, lastname, birthday) VALUES (:firstname, :lastname, :birthday);";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":firstname", $firstname);
        $stmt->bindParam(":lastname", $lastname);
        $stmt->bindParam(":birthday", $birthday);

        $stmt->execute();

    $pdo = null;
    $stmt = null;

    header("Location: ../index.php?success");
    die();
} else {
    header('Location: ../index.php');
    exit();
}
