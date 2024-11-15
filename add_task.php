<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $task = $_POST['task'];
    $date = $_POST['date'];
    
    $stmt = $pdo->prepare("INSERT INTO $table (task, date) VALUES (?, ?)");
    $stmt->execute([$task, $date]);
    
    header("Location: index.php");
    exit();
    
}

?>
