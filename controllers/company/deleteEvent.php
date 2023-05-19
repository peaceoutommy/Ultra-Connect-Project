<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Model\Event;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

// Define the event id by saving it on the edit.event.view form
$id = $_POST['eventId'];

$queryBuilder->deleteApplicationsByEventId($id);
$queryBuilder->deleteById('Event', $id);

redirect('listEvents');
