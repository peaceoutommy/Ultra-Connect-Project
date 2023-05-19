<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Models\Event;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$eventName = $_POST['Name'];

if ($queryBuilder->eventNameExists($eventName)) {
    $_SESSION['eventNameUsed'] = "This event already exists.";
    redirect('createEvent');
} else {
    $queryBuilder->create('event', [
        'Id_Company' => trim($_POST['Id_Company']),
        'Name' => trim($_POST['Name']),
        'Description' => trim($_POST['Description']),
        'Date' => $_POST['Date'],
        'State' => trim($_POST['State']),
        'Spots' => trim($_POST['Spots']),
        'Sector' => trim($_POST['Sector']),
    ]);
    redirect('listEvents');
}
