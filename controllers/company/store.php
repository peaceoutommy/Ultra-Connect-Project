<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$existingCompanies = $queryBuilder->getCompanyByAllFields($email, $username, $phone, $nif);

if ($existingCompanies) {
    foreach ($existingCompanies as $company) {
        if ($company->Email === $email) {
            $_SESSION['emailUsed'] = "This email is already being used.";
        }
        if ($company->Username === $username) {
            $_SESSION['companyNameUsed'] = "This company name is already being used.";
        }
        if ($company->Phone === $phone) {
            $_SESSION['phoneUsed'] = "This phone number is already being used.";
        }
        if ($company->NIF === $nif) {
            $_SESSION['NIFUsed'] = "This NIF is already being used.";
        }
    }
    redirect('companyRegister');
} else {
    if ($_POST['Password'] != $_POST['Password2']) {
        $_SESSION['passDontMatch'] = "The passwords dont match.";
        redirect('freelancerRegister');
    } else {
        $queryBuilder->create('company', [
            'Name' => trim($_POST['Name']),
            'Email' => trim($_POST['Email']),
            'Phone' => trim($_POST['Phone']),
            'Address' => trim($_POST['Address']),
            'NIF' => trim($_POST['NIF']),
            'Password' => password_hash(($_POST['Password']), PASSWORD_DEFAULT),
        ]);
        redirect('');
    }
}
