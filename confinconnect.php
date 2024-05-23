<?php

$dbHost = 'seu_host';
$dbUser = 'seu_user';
$dbPass = 'seu_banco';
$dbName = 'seu_pass';

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_errno) {
    echo 'Not_Connected';
}
