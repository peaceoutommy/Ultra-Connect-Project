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

        <form action="<?php echo route('updateEvent'); ?>" method="POST">
            <div class="form-group">
                <input type="hidden" class="form-control" name="eventId" value="<?php echo $event->Id; ?>" required>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="Name" value="<?php echo $event->Name; ?>" required>
            </div>
            <div class="form-group">
                <label for="Description">Description:</label>
                <input type="text" class="form-control" name="Description" value="<?php echo $event->Description; ?>" required>
            </div>
            <div class="form-group">
                <label for="Date">Date:</label>
                <input type="date" class="form-control" name="Date" value="<?php echo $event->Date; ?>" required>
            </div>
            <div class="form-group">
                <label for="State">State:</label>
                <input type="text" class="form-control" name="State" value="<?php echo $event->State; ?>" required>
            </div>
            <div class="form-group">
                <label for="Spots">Spots:</label>
                <input type="text" class="form-control" name="Spots" value="<?php echo $event->Spots; ?>" required>
            </div>
            <div class="form-group">
                <label for="Sector">Sector:</label>
                <input type="text" class="form-control" name="Sector" value="<?php echo $event->Sector; ?>" required>
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-secondary">Update Event</button>
            <a href="<?php echo route(''); ?>" class="btn btn-light">Home Page</a>
        </form>

        <!-- DELETE EVENT  -->
        <?php if (isset($_SESSION["companyId"])) { ?>
            <form action="<?php echo route('deleteEvent/' . $event->Id); ?>" method="POST" class="d-inline">
                <input type="hidden" class="form-control" name="eventId" value="<?php echo $event->Id; ?>" required>
                <button type="submit" class="btn btn-danger">Delete Event</button>
            </form>
        <?php } ?>
        </table>

    </div>
    <div class="mt-auto"><?php include('views/footer.view.php'); ?></div>
</body>

</html>