<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

// Create a connection and QueryBuilder instance
$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$freelancer_id = $_SESSION['freelancerId'];
$freelancer = $queryBuilder->findById('Freelancer', $freelancer_id);

require 'views/freelancer/editProfile.view.php';