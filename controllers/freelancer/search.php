<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$columnName = 'Name';
$searchTerm = ($_POST['search']);
$table = 'Event';

$filteredResult = $queryBuilder->searchBySearchTerm($table, $columnName, $searchTerm, $class = "StdClass");

// Fetch the company information and set it in each event object
foreach ($filteredResult as $event) {
    $event->company = $queryBuilder->findById('Company', $event->Id_Company, App\Model\Company::class);
}

require 'views/freelancer/browse.events.view.php';
