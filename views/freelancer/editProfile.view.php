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
        <h1 class="my-4">Freelancer Profile</h1>

        <form action="<?php echo route('updateFreelancerProfile'); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="Name" value="<?php echo $freelancer->Name; ?>" required>
            </div>
            <div class="form-group">
                <label for="name">Username:</label>
                <input type="text" class="form-control" name="Username" value="<?php echo $freelancer->Username; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="Email" value="<?php echo $freelancer->Email; ?>" required>
            </div>
            <div class="form-group">
                <label for="name">Phone:</label>
                <input type="text" class="form-control" name="Phone" value="<?php echo $freelancer->Phone; ?>" required>
            </div>
            <div class="form-group">
                <label for="nif">Address:</label>
                <input type="text" class="form-control" name="Address" value="<?php echo $freelancer->Address; ?>" required>
            </div>
            <div class="form-group">
                <label for="nif">NIF:</label>
                <input type="text" class="form-control" name="NIF" value="<?php echo $freelancer->NIF; ?>" required>
            </div>

            <div class="form-group">
                <label for="CV">CV:</label>
                <input type="file" class="form-control" name="CV" accept="application/pdf">
            </div>
            
            <div class="form-group">
                <label for="NewPassword">New password:</label>
                <input type="password" class="form-control" name="NewPassword" placeholder="***********" required>
            </div>
            <div class="form-group">
                <label for="NewPasswordRepeat">Repeat password:</label>
                <input type="password" class="form-control" name="NewPasswordRepeat" placeholder="***********" required>
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-secondary">Update Profile</button>
            <a href="<?php echo route(''); ?>" class="btn btn-light">Home Page</a>
        </form>
        </table>

    </div>
    <div class="mt-auto"><?php include('views/footer.view.php'); ?></div>
</body>

</html>