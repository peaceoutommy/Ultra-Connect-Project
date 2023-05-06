<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Model\Application;
use App\Database\Event;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$event = $queryBuilder->findById('Event', $id, 'App\Model\Event');
$freelancer = $queryBuilder->findById('Freelancer', $id, 'App\Model\Freelancer');
$freelancer =

$event_id = $event->Id;

$applications = $queryBuilder->getApplicationsByEventIdAndState($event_id, 'Accepted');

require 'views/company/applicationAccepted.view.php';
