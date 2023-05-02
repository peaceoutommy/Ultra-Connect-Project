<?php

use App\Model\Event;
use App\Database\Connection;
use App\Database\QueryBuilder;

// Create a connection and QueryBuilder instance
$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$sort = isset($_POST['sort']) ? $_POST['sort'] : 'Date ASC'; // Order by ASC or DESC

// Get all events
$events = $queryBuilder->getAll('Event', 'App\Model\Event', 'Date ASC');
$companies = $queryBuilder->getAll('Company', 'App\Model\Company');

$events_with_accepted_applications_count = [];
foreach ($events as $event) {
    $event->company = $queryBuilder->findById('Company', $event->Id_Company, App\Model\Company::class); // Get company name
    $accepted_applications_count = $queryBuilder->getAcceptedApplicationsCount($event->Id);
    $events_with_accepted_applications_count[$event->Id] = $accepted_applications_count;
    $accepted_applications_count = $events_with_accepted_applications_count[$event->Id] ?? 0;
    $available_spots = $event->Spots - $accepted_applications_count;
}

require 'views/freelancer/browse.events.view.php';
