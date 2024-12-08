# simple_php_todo
It's a simple php todo list application

## Installation
1. Clone the repository
2. Create a table `tasks` in your database. It should contain: primary index `id`, string field `task`, and integer field `status`
3. Create a PHP file `credentials.php` in the root directory and add the following content, filling in the values:
```php
<?php

define("DBNAME", "database_name"); // Update with your MariaDB database name
define("USERNAME", "username"); // Update with your MariaDB username
define("PASSWORD", "database_password"); // Update with your MariaDB password
```
4. Have fun!
