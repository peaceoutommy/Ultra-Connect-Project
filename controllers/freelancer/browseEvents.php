<?php
use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

use App\Model\Company;
use App\Model\Event;

$ASC = 'Date ASC'; // Order by date ASC

// Get all events
$events = $queryBuilder->getEventsWithCompanies($ASC);
$freelancer_id = ($_SESSION["freelancerId"]);
$applied_event_ids = $queryBuilder->getAppliedEventIds($freelancer_id);

$events_with_accepted_applications_count = $queryBuilder->getAcceptedApplicationsCountForAllEvents();

require 'views/freelancer/browse.events.view.php';
