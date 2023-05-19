<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo route('/views/styles.css'); ?>" />
    <title>Pending Applications</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include('views/navbar.view.php') ?>
    <div class="container">
        <h2 class="mt-4"><?php echo ($event->Name); ?></h2>
        <h5>Pending applications</h5>

        <table class="table table-bordered table-striped mt-4">
            <tbody>
                <?php if (count($applications) == 0) { ?>
                    <th>There are no pending applications for this event.</th>
                <?php } ?>

                <?php foreach ($applications as $application) : ?>
                    <tr>
                        <!-- DATA COMING FROM SQL QUERY IN QUERY BUILDER FUNCTION getApplicationsByEventIdAndState -->
                        <!-- GO TO FREELANCER PROFILE -->
                        <form action="<?php echo route('seeFreelancer'); ?>" method="post" class="freelancer-link-form">

                            <th>Name:</th>
                            <td><button type="submit" class="btn btn-link"><?php echo $application->Freelancer_Name; ?></button></td>
                            <th>Username:</th>
                            <td><?php echo $application->Freelancer_Username; ?></td>
                            <th>Email:</th>
                            <td><?php echo $application->Freelancer_Email; ?></td>
                            <!-- STORE THE FREELANCER ID -->
                            <input type="hidden" name="freelancer_id" value="<?php echo $application->Id_Freelancer; ?>">
                        </form>
                        <!-- Accept button -->
                        <td>
                            <form action="<?php echo route('updateApplicationState'); ?>" method="post">
                                <input type="hidden" name="application_id" value="<?php echo $application->Id; ?>">
                                <button type="submit" name="state" value="Accepted" class="btn btn-success">Accept</button>
                                <button type="submit" name="state" value="Rejected" class="btn btn-danger">Reject</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-auto"><?php include('views/footer.view.php'); ?></div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="views/javascript.js"></script>
</body>

</html>