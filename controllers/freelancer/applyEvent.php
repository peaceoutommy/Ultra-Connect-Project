<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Database\Event;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$freelancer_id = $_SESSION['freelancerId'];
$event_id = $_POST['event_id'];

$queryBuilder->create('Application', [
    'Id_Event' => $event_id,
    'Id_Freelancer' => $freelancer_id,
    'State' => 'Pending',
]);

redirect('browseEvents');
