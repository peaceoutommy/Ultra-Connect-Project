<?php

require 'vendor/autoload.php';
use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$application_id = $_POST['application_id'];
$state = $_POST['state'];

$queryBuilder->updateApplicationState($application_id, $state);

header('Location: ' . route('manageApplications'));