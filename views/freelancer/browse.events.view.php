<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo route('/views/styles.css'); ?>" />
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include 'views/navbar.view.php' ?>

    <?php

    // Call getAppliedEventIds function in QueryBuilder
    $freelancer_id = ($_SESSION["freelancerId"]);
    $applied_event_ids = $queryBuilder->getAppliedEventIds($freelancer_id);
    ?>
    <div class="container">
        <!-- Search Bar -->
        <div class="divSearch">
            <h1 class="titlePadding">Events</h1>
            <form action="<?php echo route('search'); ?>" method="post" class="mt-3">
                <input type="text" name="search" placeholder="Search...">
                <button type="submit" name="submit" id="buttonSearch" class="btn btn-secondary buttonSearch">Search</button>
            </form>
        </div>
        <div class="flex-2 ">
            <ul class="list-group mt-4">
                <?php if (isset($filteredResult)) { // Check if search is submitted or
                    $events = $filteredResult;
                }
                foreach ($events as $event) {
                    //Verify if freelancer has applied
                    $freelancer_has_applied = in_array($event->Id, $applied_event_ids);
                    $button_text = $freelancer_has_applied ? 'Applied' : 'Apply';
                ?>
                    <li class="list-group-item">
                        <!-- REDIRECT TO EVENT PAGE -->
                        <h3><a class="linkRedirect" href="<?php echo route('event/' . $event->Id); ?>"><?php echo $event->Name; ?></a></h3>
                        <form action="<?php echo route('seeCompany'); ?>" method="post">
                            <input type="hidden" name="company_id" value="<?php echo $event->Id_Company; ?>">
                            <h4><button type="submit" class="textButton"><?php echo $event->company->Name; ?></button></h4>
                        </form>
                        <p><?php echo $event->Description; ?></p>
                        <p><?php echo $event->Date; ?></p>
                        <p>Spots available: <b><?php echo $event->Spots; ?></b></p>

                        <!-- Verify if Event is full -->
                        <?php if ($event->Spots > 0) : ?>
                            <form action="<?php echo route('applyEvent'); ?>" method="post">
                                <input type="hidden" name="action" value="applyForEvent">
                                <input type="hidden" name="freelancer_id" value="<?php echo ($_SESSION["freelancerId"]); ?>">
                                <input type="hidden" name="event_id" value="<?php echo $event->Id; ?>">
                                <button type="submit" name="submit" id="buttonApply" class="btn btn-secondary"><?php echo $button_text; ?></button>
                            </form>
                        <?php else : ?>
                            <button type="button" disabled>Event is Full</button>
                        <?php endif; ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <div class="mt-auto"><?php include('views/footer.view.php'); ?></div>
    <script src="views/javascript.js"></script>
</body>

</html>