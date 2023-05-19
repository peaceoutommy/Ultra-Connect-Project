<?php

require 'vendor/autoload.php';

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Models\Event;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$event = $queryBuilder->findById('Event', $event->Id, App\Model\Event::class);
$application_id = $_POST['application_id'];
$state = $_POST['state'];

$queryBuilder->updateApplicationState($application_id, $state);
redirect('listEvents');
