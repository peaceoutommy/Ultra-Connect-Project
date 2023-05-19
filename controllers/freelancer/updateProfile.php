<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$freelancerId = $_SESSION['freelancerId'];
$name = trim($_POST['Name']);
$username = trim($_POST['Username']);
$email = trim($_POST['Email']);
$phone = trim($_POST['Phone']);
$nif = trim($_POST['NIF']);
$field = 'Freelancer';
$newPass = trim($_POST['NewPassword']);
$newPassRepeat = trim($_POST['NewPasswordRepeat']);

// Check if the updated fields are unique
$existingFreelancer = $queryBuilder->checkFreelancerUpdate($field, $freelancerId, $email, $username, $phone, $nif);

if ($newPass != $newPassRepeat) {
    $_SESSION['passDontMatch'] = "The passwords dont match.";
    redirect('editFreelancerProfile');
} else if (!empty($existingFreelancer)) {
    foreach ($existingFreelancer as $freelancer) {
        if ($freelancer->Username === $username) {
            $_SESSION['usernameUsed'] = "This username is already being used.";
        }
        if ($freelancer->Email === $email) {
            $_SESSION['emailUsed'] = "This email is already being used.";
        }
        if ($freelancer->Phone === $phone) {
            $_SESSION['phoneUsed'] = "This phone number is already being used.";
        }
        if ($freelancer->NIF === $nif) {
            $_SESSION['NIFUsed'] = "This NIF is already being used.";
        }
    }
    redirect('editFreelancerProfile');
} else {
    // Handle the CV
    $cv_file_path = null;
    if (isset($_FILES['CV'])) {
        // Set the target directory and file name
        $target_dir = "CV/";
        $freelancer_id = $_SESSION['freelancerId'];
        $file_name = $freelancer_id . "CV";
        $file_extension = ".pdf";
        $target_file = $target_dir . $file_name . $file_extension;

        // See if another CV exists and delete
        if (file_exists($target_file)) {
            unlink($target_file);
        }
        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['CV']['tmp_name'], $target_file)) {
            $cv_file_path = $target_file;
        }
    }
    $updatedInformation = [
        'Name' => $name,
        'Username' => $username,
        'Email' => $email,
        'Phone' => $phone,
        'Address' => trim($_POST['Address']),
        'NIF' => $nif,
        'Password' => password_hash(($newPass), PASSWORD_DEFAULT)
    ];
    // After the file is in the right directory upload the path to db
    if ($cv_file_path !== null) {
        $updatedInformation['CV'] = $cv_file_path;
    }

    $queryBuilder->update('freelancer', $freelancerId, $updatedInformation);
    // Redirect to the profile page after successful update
    redirect('profileFreelancer');
}
