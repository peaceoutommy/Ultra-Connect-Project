<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Model\Company;
use App\Model\Event;

// Create a connection and QueryBuilder instance
$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$company_id = $_SESSION['companyId'];
$company = $queryBuilder->findById('Company', $company_id);

$event = $queryBuilder->findById('Event', $id, 'App\Model\Event');

$event->Company = $queryBuilder->findById('Company', $event->Id_Company, 'App\Model\Company');

require 'views/company/editEvent.view.php';
