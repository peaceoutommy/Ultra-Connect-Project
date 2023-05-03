<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

// Create a connection and QueryBuilder instance
$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$company_id = $_SESSION["companyId"];
$events = $queryBuilder->getCompanyEvents($company_id);
$applications = $queryBuilder->getCompanyEventsWithApplications($company_id);

// Pass the $events variable to the view
extract(['events' => $events]);

require 'views/company/listEvents.view.php';
