<?php
include('db.php');

$id=$_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM $table WHERE id = ?");
$stmt->execute([$id]);
$updates = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $task = $_POST['task'];
    $date = $_POST['date'];
    
    $stmtupdater = $pdo->prepare("UPDATE $table SET task = ?, date = ? WHERE id = ?");
    $stmtupdater->execute([$task, $date, $id]);
    
    header("Location: index.php");
    
}
?>
<DOCTYPE html>
<html>
    <head>
        <title>ToDoList</title>
    </head>
    <style>
        body {
            width: 600px;
            height: auto;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        form {
            width: 600px;
            height: auto;
            border: 4px solid yellowgreen;
            border-radius: 10px;
            margin: auto;
            justify-content: center;
            align-items: center;
            font-family: Times New Roman;
        }
        fieldset {
            margin: auto;
            width: auto
            height: auto;
            margin-bottom: 50px;
            border: 4px solid yellowgreen;
            border-radius: 10px;
        }
        h2 {
            display: block;
            margin-top: 30px;
            margin-bottom: 30px;
            text-align: center;
            font-weight: bold;
            font-size: 30px;
        }
        legend {
            display: block;
            margin: auto;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        label {
            margin: auto;
            display: block;
            text-align: center;
            margin-bottom: 14px;
        }
        input[type='text'],
        input[type='date']{
            width: 220px;
            display: flex;
            align-items: center;
            margin: auto;
            height: 30px;
            background-color: transparent;
            border-radius: 6px;
        }
        button{
            display: flex;
            justify-content: center;
            margin: 0;
            height: 20px;
            margin: auto;
            margin-bottom: 40px;
            background-color: green;
            border-radius: 2px;
        }
    </style>
    <body>
        <form method = "POST">
            <h2>Update To Do List</h2>
            
            <fieldset>
                <legend>Update Tasks</legend>
                
                <label for = "tasks">Input your tasks</label>
                <input type = "text" name = "task" value="<?php echo htmlspecialchars($updates['task']?? ''); ?>"><br>
                
                <label for = "dates">Select Date</label>
                <input type = "date" name = "date" value="<?php echo htmlspecialchars($updates['date']?? ''); ?>"><br>
                
                <button type="submit">Update task</button>
            </fieldset>
        </form>
        </body>
        </html>
