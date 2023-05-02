<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Models\Event;
use App\Models\Company;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$company_id = $_POST['company_id'];

$company = $queryBuilder->findById("Company", $company_id, 'App\Model\Company');

require 'views/freelancer/seeCompany.view.php';
