<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros</title>
    <link rel="stylesheet" href="<?php echo route('/views/styles.css'); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include 'views/navbar.view.php' ?>
    <div class="container">
        <h1 class="my-4">View <?php echo $freelancer->Username; ?>'s Profile</h1>

        <div class="container noMargin">
            <div class="row noMargin">
                <div class="col-md-8 noMargin">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th scope="row" class="noMargin">Name:</th>
                                <td class="noMargin"><?php echo $freelancer->Name; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Email:</th>
                                <td><?php echo $freelancer->Email; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Phone:</th>
                                <td><?php echo $freelancer->Phone; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">NIF:</th>
                                <td><?php echo $freelancer->NIF; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Address:</th>
                                <td><?php echo $freelancer->Address; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <?php if (!empty($freelancer->CV)) : ?>
                        <div class="pdf-container">
                            <object id="pdf-object" class="CV" data="<?php echo $freelancer->CV; ?>" type="application/pdf" width="100%" height="100%">
                                <p>It appears you don't have a CV.</p>
                            </object>
                            <div id="overlay" class="overlay">
                                <p style="font-size: 1.5rem; font-weight: bold;">Click to download CV</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <a href="<?php echo route('manageApplications'); ?>" class="btn btn-secondary">My Events</a>
        <a href="<?php echo route(''); ?>" class="btn btn-light">Home Page</a>
    </div>
    <script>
        document.getElementById("overlay").addEventListener("click", function() {
            const link = document.createElement("a");
            link.href = "<?php echo $freelancer->CV; ?>";
            link.download = "<?php echo $freelancer->Id; ?>.pdf";
            link.style.display = "none";
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="views/javascript.js"></script>
</body>

</html>