<?php
use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Models\Freelancer;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);



$freelancer = $queryBuilder->findById('Freelancer', $_POST['freelancer_id'], App\Model\Freelancer::class);

require 'views/company/seeFreelancer.view.php';