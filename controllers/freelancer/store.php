<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$queryBuilder->create('freelancer',[
    'Name' => trim($_POST['Name']),
    'Username' => trim($_POST['Username']),
    'Email' => trim($_POST['Email']),
    'Phone' => trim($_POST['Phone']),
    'Address' => trim($_POST['Address']),
    'NIF' => trim($_POST['NIF']),
    'Password' => password_hash(($_POST['Password']), PASSWORD_DEFAULT),
]);

redirect('');
