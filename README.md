# simple_php_todo
It's a simple php todo list application

## Installation
1. Clone the repository
2. Create a table tasks into your database. It should contains: primery index 'id', string field 'task' and intager field 'status'
3. Create file credentials.php in the root directory and add the following code:
```php
<?php
$dbname = "todo"; // Update with your MariaDB database name
$username = "username"; // Update with your MariaDB username
$password = "password"; // Update with your MariaDB password
?>
```
3. Have fun!
