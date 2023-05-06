<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo route('/views/styles.css'); ?>" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Applications</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include 'views/navbar.view.php' ?>

    <div class="container">
        <h1 class="titlePadding mt-4"><?php echo ($_SESSION['companyName']) ?> Events</h1>
        <?php foreach ($events as $event) : ?>
            <div class="card mt-4">
                <div class="card-header">
                    <!-- DISPLAY EVENT NAME && AVAILABLE SPOTS -->
                    <h3><a class="linkRedirect" href="<?php echo route('event/' . $event->Id); ?>"><?php echo $event->Name; ?></a></h3>

                    <?php
                    //CALCULATE AVAILABLE SPOTS
                    $spotsAvailable = $event->Spots;
                    ?>
                    <p><b>Spots available: </b><?php echo $spotsAvailable; ?></p>
                </div>
                <div class="card-body">
                    <div class="dropdown d-inline">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownPending" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pending Applications
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownPending" style="max-height: 200px; overflow-y: auto;">
                            <?php foreach ($event->applications as $application) : ?>
                                <?php if ($application->State === 'Pending') : ?>
                                    <a class="dropdown-item" href="#">
                                        <!-- GO TO FREELANCER PROFILE -->
                                        <form action="<?php echo route('seeFreelancer'); ?>" method="post" class="freelancer-link-form">
                                            <input type="hidden" name="freelancer_id" value="<?php echo $application->Id_Freelancer; ?>">
                                            <button type="submit" class="btn btn-link">
                                                <p><b>Freelancer: </b><?php echo $application->Freelancer_Name; ?></p>
                                            </button>
                                        </form>
                                        <form action="<?php echo route('updateApplicationState'); ?>" method="post">
                                            <input type="hidden" name="application_id" value="<?php echo $application->Id; ?>">
                                            <button type="submit" name="state" value="Accepted" class="btn btn-success">Accept</button>
                                            <button type="submit" name="state" value="Rejected" class="btn btn-danger">Reject</button>
                                        </form>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="dropdown d-inline">
                        <button class="btn btn-light dropdown-toggle acceptedBtn" type="button" id="dropdownAccepted" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Accepted Applications
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownAccepted" style="max-height: 200px; overflow-y: auto;">
                            <?php foreach ($event->applications as $application) : ?>
                                <?php if ($application->State == 'Accepted') : ?>
                                    <a class="dropdown-item" href="#">
                                        <!-- GO TO FREELANCER PROFILE -->
                                        <form action="<?php echo route('seeFreelancer'); ?>" method="post" class="freelancer-link-form">
                                            <input type="hidden" name="freelancer_id" value="<?php echo $application->Id_Freelancer; ?>">
                                            <button type="submit" class="btn btn-link">
                                                <p><b>Freelancer: </b><?php echo $application->Freelancer_Name; ?></p>
                                            </button>
                                        </form>
                                        <p><b>State: </b><?php echo $application->State; ?></p>
                                        <hr>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="dropdown d-inline">
                        <button class="btn btn-light dropdown-toggle rejectedBtn" type="button" id="dropdownRejected" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Rejected Applications
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownRejected" style="max-height: 200px; overflow-y: auto;">
                            <?php foreach ($event->applications as $application) : ?>
                                <?php if ($application->State == 'Rejected') : ?>
                                    <a class="dropdown-item" href="">
                                        <!-- GO TO FREELANCER PROFILE -->
                                        <form action="<?php echo route('seeFreelancer'); ?>" method="post" class="freelancer-link-form">
                                            <input type="hidden" name="freelancer_id" value="<?php echo $application->Id_Freelancer; ?>">
                                            <button type="submit" class="btn btn-link">
                                                <p><b>Freelancer: </b><?php echo $application->Freelancer_Name; ?></p>
                                            </button>
                                        </form>
                                        <p><b>State: </b><?php echo $application->State; ?></p>
                                        <hr>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php include('views/footer.view.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo route('views/javascript.js'); ?>"></script>
</body>

</html>