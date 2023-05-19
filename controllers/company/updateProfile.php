<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$companyId = $_SESSION['companyId'];
$username = trim($_POST['Name']);
$email = trim($_POST['Email']);
$phone = trim($_POST['Phone']);
$nif = trim($_POST['NIF']);
$address = trim($_POST['Address']);
$field = 'Company';

// Check if the updated fields are unique
$existingCompanies = $queryBuilder->checkCompanyUpdate($field, $companyId, $email, $username, $phone, $nif);

if (!empty($existingCompanies)) {
    foreach ($existingCompanies as $company) {
        if ($company->Email === $email) {
            $_SESSION['emailUsed'] = "This email is already being used.";
        }
        if ($company->Name === $username) {
            $_SESSION['companyNameUsed'] = "This company name is already being used.";
        }
        if ($company->Phone === $phone) {
            $_SESSION['phoneUsed'] = "This phone number is already being used.";
        }
        if ($company->NIF === $nif) {
            $_SESSION['NIFUsed'] = "This NIF is already being used.";
        }
    }
    redirect('editCompanyProfile');
} else {
    $updatedInformation = [
        'Name' => $username,
        'Email' => $email,
        'Phone' => $phone,
        'Address' => $address,
        'NIF' => $nif,
    ];

    $queryBuilder->update('company', $companyId, $updatedInformation);
    // Redirect to the profile page after successful update
    redirect('profileCompany');
}
