<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

// Create a connection and QueryBuilder instance
$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$company_id = $_SESSION['companyId'];
$freelancer = $queryBuilder->findById('Company', $company_id);

require 'views/company/editProfile.view.php';