<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$freelancer_id = $_SESSION["freelancerId"];
$accepted_events = $queryBuilder->getAcceptedEventsForFreelancer($freelancer_id);

require 'views/freelancer/myEvents.view.php';