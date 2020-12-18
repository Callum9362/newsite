<?php

include  'database/php_mysql.php';

$mysql = new MySqlDb();

$fetch = $mysql->getData("users", "username = 'Callum'");

print_r($fetch);

?>