<?php
use App\Models\Company;
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
    if(empty($email) || empty($password)){
        header("location: ../index.php?error=emptyinput");
        exit();
    }

    $queryBuilder->getCompany($email, $password);
    $loginResult = $queryBuilder->getCompany($email, $password);

    if ($loginResult === 'wrongpassword') {
        $_SESSION['passwordError'] = "The password is incorrect.";
        redirect('companyLogin');
        exit();
    }

    if ($loginResult === 'usernotfound') {
        $_SESSION['emailError'] = "User not found.";
        redirect('companyLogin');
        exit();
    }

    if ($loginResult === 'success') {
        redirect('');
    }
}