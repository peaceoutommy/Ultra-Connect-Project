<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Database\Freelancer;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$email = trim($_POST['Email']);
$username = trim($_POST['Username']);
$phone = trim($_POST['Phone']);
$nif = trim($_POST['NIF']);
$field = 'Freelancer';

$existingFreelancers = $queryBuilder->getFreelancerByAllFields($field, $email, $username, $phone, $nif);

if ($existingFreelancers) {
    foreach ($existingFreelancers as $freelancer) {
        if ($freelancer->Email === $email) {
            $_SESSION['emailUsed'] = "This email is already being used.";
        }
        if ($freelancer->Username === $username) {
            $_SESSION['usernameUsed'] = "This username is already being used.";
        }
        if ($freelancer->Phone === $phone) {
            $_SESSION['phoneUsed'] = "This phone number is already being used.";
        }
        if ($freelancer->NIF === $nif) {
            $_SESSION['NIFUsed'] = "This NIF is already being used.";
        }
    }
    redirect('freelancerRegister');
} else {
    if ($_POST['Password'] != $_POST['Password2']) {
        $_SESSION['passDontMatch'] = "The passwords dont match.";
        redirect('freelancerRegister');
    } else {
        $queryBuilder->create('freelancer', [
            'Name' => trim($_POST['Name']),
            'Username' => $username,
            'Email' => $email,
            'Phone' => $phone,
            'Address' => trim($_POST['Address']),
            'NIF' => $nif,
            'Password' => password_hash(($_POST['Password']), PASSWORD_DEFAULT),
        ]);
        redirect('');
    }
}
