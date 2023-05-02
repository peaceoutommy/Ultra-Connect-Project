<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Models\Freelancer;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$freelancer_id = $_SESSION["freelancerId"];

$freelancer = $queryBuilder->findById('Freelancer', $freelancer_id,'App\Model\Freelancer');

require 'views/freelancer/profile.view.php';