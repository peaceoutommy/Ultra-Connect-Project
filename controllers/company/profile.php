<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Models\Company;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$company_id = $_SESSION["companyId"];

$company = $queryBuilder->findById('Company', $company_id, App\Model\Company::class);

require 'views/company/profile.view.php';