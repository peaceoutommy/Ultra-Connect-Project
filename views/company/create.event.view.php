<!DOCTYPE html>
<html lang="en">

<head>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo route('/views/styles.css'); ?>" />
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Event</title>
</head>

<body class="d-flex flex-column min-vh-100">
  <?php include('views/navbar.view.php'); ?>

  <div class="container">
    <h1>Create Event</h1>
    <form method="POST" action="<?php echo route('createEvent'); ?>">
      <input type="hidden" name="Id_Company" value="<?php echo $_SESSION["companyId"]; ?>">
      <!-- ERROR MESSAGES -->
      <span class="text-danger"><?php if (isset($_SESSION['eventNameUsed'])) echo $_SESSION['eventNameUsed']; ?></span>
      <!-- REMOVE ERROR MESSAGES -->
      <?php
      unset($_SESSION['eventNameUsed']);
      ?>
      <div class="form-group mt-5">
        <input type="text" class="form-control" name="Name" placeholder="Insert event name..." required>
      </div><br>
      <div class="form-group">
        <input type="text" class="form-control" name="Description" placeholder="Insert event description..." required>
      </div><br>
      <div class="form-group">
        <input type="date" class="form-control" name="Date" placeholder="Insert event date..." required>
      </div><br>
      <div class="form-group">
        <select name="State" class="form-select" aria-label="Default select example" required>
          <option selected>Select the event state...</option>
          <option value="Confirmed">Confirmed</option>
          <option value="Uncertain">Uncertain</option>
        </select>
      </div><br>
      <div class="form-group">
        <input type="number" class="form-control" name="Spots" placeholder="Insert event spots..." required>
      </div><br>
      <div class="form-group">
        <input type="text" class="form-control" name="Sector" placeholder="Insert event sector..." required>
      </div><br>

      <button type="submit" class="btn btn-secondary" name="submit">Add event</button>
    </form>
  </div>
  <div class="mt-auto"><?php include('views/footer.view.php'); ?></div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="views/javascript.js"></script>
</body>

</html>