<?php
include('db.php');

$stmt = $pdo->query("SELECT * FROM $table");
$reads = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>ToDoList</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class ="container">
        <form action = "add_task.php" method = "POST">
            <h2>To Do List App JohnLloyDev</h2>
            
            <fieldset>
                <legend>Create Tasks</legend>
                
                <label for = "tasks">Input your tasks</label>
                <input type = "text" name = "task" required>
                
                <label for = "dates">Select Date</label>
                <input type = "date" name = "date">
                
                <button type="submit">Add task</button>
            </fieldset>
        </form>
        
        <fieldset>
        <legend>My Task List</legend>
        
        <ul>
        <?php foreach($reads as $read): ?>
            <div class="good">
                <br><br>
                Tasks: <?php echo htmlspecialchars($read['task']?? ''); ?><br><br>
                Date: <?php echo htmlspecialchars($read['date']?? ''); ?><br><br>
                <a href="edit_task.php?id=<?php echo $read['id']; ?>">Update</a>
                <a href="delete_task.php?id=<?php echo htmlspecialchars($read['id']?? ''); ?>">Delete</a><br><br><br>
               </div>
            <?php endforeach; ?>
        </ul>
        </fieldset>
        </div>
    </body>
</html>
