<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

// Define the event id by saving it on the edit.event.view form
$id = $_POST['eventId'];

$updatedInformation = [
    'Name' => trim($_POST['Name']),
    'Description' => trim($_POST['Description']),
    'Date' => trim($_POST['Date']),
    'State' => trim($_POST['State']),
    'Spots' => trim($_POST['Spots']),
    'Sector' => trim($_POST['Sector']),
];

// Update the event data
$queryBuilder->update('event', $id, $updatedInformation);

redirect('manageApplications');
