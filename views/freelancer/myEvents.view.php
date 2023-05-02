<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="views/javascript.js"></script>
    <link rel="stylesheet" href="<?php echo route('/views/styles.css'); ?>" />
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include 'views/navbar.view.php' ?>

    <div class="container">
        <h1 class="titlePadding">My Events</h1>
        <ul class="list-group mt-4">
            <?php foreach ($accepted_events as $event) : ?>
                <li class="list-group-item">
                    <h3><a class="linkRedirect" href="<?php echo route('event/' . $event->Id); ?>"><?php echo $event->Name; ?></a></h3>
                    <p><?php echo $event->Description; ?></p>
                    <p><?php echo $event->Date; ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="mt-auto"><?php include('views/footer.view.php'); ?></div>
</body>

</html>