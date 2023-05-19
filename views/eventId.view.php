<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo route('/views/styles.css'); ?>" />
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include 'views/navbar.view.php' ?>
    <div class="container">

        <ul class="list-group mt-4">
            <li class="list-group-item">
                <div class="row">
                    <div class="col-6">
                        <h3><?php echo $event->Name ?></h3>
                        <p><b>Description: </b><?php echo $event->Description ?></p>
                        <p><b>Company name: </b><?php echo $event->Company->Name ?></p>
                        <p><b>Date: </b><?php echo $event->Date ?></p>
                        <p><b>State: </b><?php echo $event->State ?></p>
                        <p><b>Spots available: </b><?php echo $event->Spots ?></p>
                        <p><b>Sector: </b><?php echo $event->Sector ?></p>
                    </div>
                    <?php if (isset($_SESSION["companyId"])) { ?>
                        <div class="col-6 vertAlignDiv">
                            <h3 style="visibility:hidden;">just a spacer</h3>
                            <p><a class="linkRedirect" href="<?php echo route('applicationPending/' . $event->Id); ?>">Go to Pending Applications</a></p>
                            <p><a class="linkRedirect" href="<?php echo route('applicationAccepted/' . $event->Id); ?>">Go to Accepted Applications</a></p>
                            <p><a class="linkRedirect" href="<?php echo route('applicationRejected/' . $event->Id); ?>">Go to Rejected Applications</a></p>
                            <h3 style="visibility:hidden;">just a spacer</h3>
                        </div>
                    <?php } ?>
                </div>
            </li>
        </ul>

        <br>
        <!-- DISPLAY EDIT FUNCTIONALITIES TO COMPANIES ONLY -->
        <?php if (isset($_SESSION["companyId"])) { ?>
            <a href="<?php echo route('editEvent/' . $event->Id); ?>" class="btn btn-secondary">Edit Event</a>
            <a href="<?php echo route(''); ?>" class="btn btn-light">Home Page</a>
        <?php } ?>
        <!-- IF ITS A FREELANCER THE BUTTON COLOR IS GRAY INSTEAD OF LIGHT GRAY -->
        <?php if (isset($_SESSION["freelancerId"])) { ?>
            <a href="<?php echo route(''); ?>" class="btn btn-secondary">Home Page</a>
        <?php } ?>
    </div>
    <div class="mt-auto"><?php include('views/footer.view.php'); ?></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="views/javascript.js"></script>
</body>

</html>