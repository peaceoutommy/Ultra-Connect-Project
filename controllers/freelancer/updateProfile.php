<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$newPass = trim($_POST['NewPassword']);
$newPassRepeat = trim($_POST['NewPasswordRepeat']);

if ($newPass == $newPassRepeat) {
    $updatedInformation = [
        'Name' => trim($_POST['Name']),
        'Username' => trim($_POST['Username']),
        'Email' => trim($_POST['Email']),
        'Phone' => trim($_POST['Phone']),
        'Address' => trim($_POST['Address']),
        'NIF' => trim($_POST['NIF']),
    ];
} else {
}

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
    // After the file is in the right directory upload the path to db
    if ($cv_file_path !== null) {
        $updatedInformation['CV'] = $cv_file_path;
    }
}

$queryBuilder->update('freelancer', $_SESSION['freelancerId'], $updatedInformation);

redirect('profileFreelancer');
