<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros</title>
    <link rel="stylesheet" href="<?php echo route('/views/styles.css'); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="views/javascript.js"></script>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include 'views/navbar.view.php' ?>
    <div class="container">
        <h1 class="my-4">View <?php echo $freelancer->Username; ?>'s Profile</h1>

        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th scope="row">Name:</th>
                    <td><?php echo $freelancer->Name; ?></td>
                </tr>
                <tr>
                    <th scope="row">Email:</th>
                    <td><?php echo $freelancer->Email; ?></td>
                </tr>
                <tr>
                    <th scope="row">Address:</th>
                    <td><?php echo $freelancer->Address; ?></td>
                </tr>


                <!-- Add other data fields as needed -->
            </tbody>
        </table>
        <a href="<?php echo route('manageApplications'); ?>" class="btn btn-secondary">My Events</a>
        <a href="<?php echo route(''); ?>" class="btn btn-light">Home Page</a>
    </div>
</body>

</html>