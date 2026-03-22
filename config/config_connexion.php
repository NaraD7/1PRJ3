<?php
define('LOGIN', 'admin');
$password = password_hash('admin', PASSWORD_DEFAULT);
define('PASSWORD', $password);
?>