<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Database\Event;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$event = $queryBuilder->findById('Event', $id, 'App\Model\Event');

$event->Company = $queryBuilder->findById('Company', $event->Id_Company, 'App\Model\Company');

require 'views/eventId.view.php';
