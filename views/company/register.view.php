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
    <form action="<?php echo route('companyRegister'); ?>" method="post">
      <input type="hidden" name="type" value="register">

      <br><input type="text" name="Name" placeholder="Company name..." class="form-control" required><br>
      <input type="text" name="Email" placeholder="Email..." class="form-control" required><br>
      <input type="text" name="Phone" placeholder="Phone number..." class="form-control" required><br>
      <input type="text" name="Address" placeholder="Address..." class="form-control" required><br>
      <input type="text" name="NIF" placeholder="NIF..." class="form-control" required><br>
      <input type="password" name="Password" placeholder="Password..." class="form-control" required><br>
      <input type="password" name="Password2" placeholder="Confirm password..." class="form-control" required><br>
      <button type="submit" name="submit" class="btn btn-secondary">Sign Up</button>
    </form>
  </div>
  <div class="mt-auto"><?php include('views/footer.view.php'); ?></div>
</body>

</html>