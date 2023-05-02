<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$queryBuilder->create('company',[
    'Name' => trim($_POST['Name']),
    'Email' => trim($_POST['Email']),
    'Phone' => trim($_POST['Phone']),
    'Address' => trim($_POST['Address']),
    'NIF' => trim($_POST['NIF']),
    'Password' => password_hash(($_POST['Password']), PASSWORD_DEFAULT),
]);

redirect('');
