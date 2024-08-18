<?php
$servername = "localhost";
$username = "root";
$password = ""; // Update with your MariaDB password
$dbname = "todo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add task
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['task'])) {
    $task = $_POST['task'];
    $sql = "INSERT INTO tasks (task) VALUES ('$task')";
    $conn->query($sql);
}

// Mark task as completed
if (isset($_GET['complete'])) {
    $id = $_GET['complete'];
    $sql = "UPDATE tasks SET status = 1 WHERE id = $id";
    $conn->query($sql);
}

// Fetch tasks
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #50b3a2;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #e8491d 3px solid;
        }
        header a {
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
        }
        .task-form {
            margin: 30px 0;
        }
        .task-form input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            width: 80%;
        }
        .task-form input[type="submit"] {
            padding: 10px;
            font-size: 16px;
            background: #50b3a2;
            color: #fff;
            border: 0;
            cursor: pointer;
        }
        .tasks {
            list-style: none;
            padding: 0;
        }
        .tasks li {
            background: #fff;
            margin: 5px 0;
            padding: 10px;
            border: 1px solid #ccc;
        }
        .tasks li.completed {
            text-decoration: line-through;
            color: #888;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Todo List</h1>
        </div>
    </header>
    <div class="container">
        <div class="task-form">
            <form method="POST" action="">
                <input type="text" name="task" placeholder="Enter a new task">
                <input type="submit" value="Add Task">
            </form>
        </div>
        <ul class="tasks">
            <?php while($row = $result->fetch_assoc()): ?>
                <li class="<?php echo $row['status'] ? 'completed' : ''; ?>">
                    <?php echo $row['task']; ?>
                    <?php if (!$row['status']): ?>
                        <a href="?complete=<?php echo $row['id']; ?>">Complete</a>
                    <?php endif; ?>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
</body>
</html>

<?php
$conn->close();
?>