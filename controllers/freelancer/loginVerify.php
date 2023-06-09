<?php

use App\Model\Freelancer;
use App\Database\Connection;
use App\Database\QueryBuilder;

$email = trim($_POST['Email']);
$password = ($_POST['Password']);

// Create a connection and QueryBuilder instance
$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

if (isset($_POST["submit"])) {
    /* Grabbing the data */
    $email = $_POST["Email"];
    $password = $_POST["Password"];

    /* Running error handlers and user signup */
    if (empty($email) || empty($password)) {
        exit();
    }

    $queryBuilder->getFreelancer($email, $password);
    $loginResult = $queryBuilder->getFreelancer($email, $password);

    if ($loginResult === 'wrongpassword') {
        $_SESSION['passwordError'] = "The password is incorrect.";
        redirect('freelancerLogin');
        exit();
    }

    if ($loginResult === 'usernotfound') {
        $_SESSION['emailError'] = "User not found.";
        redirect('freelancerLogin');
        exit();
    }

    if ($loginResult === 'success') {
        redirect('');
    }
}
