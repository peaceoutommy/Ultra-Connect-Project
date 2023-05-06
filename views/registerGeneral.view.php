<!DOCTYPE html>
<html lang="en">

<head>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="views/javascript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="views/styles.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include('navbar.view.php'); ?>
    <div class="container">
        <div class="row mt-4">
            <div class="col-12">
                <h2 class="textSlide"><b>New to Ultra?</b></h2>
                <h4 class="textSlide2"><b>Create an account</b></h4>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-4">
                <a href="<?php echo route('freelancerRegister'); ?>" class="textCardHref userCard">
                    <span class="textCard">FREELANCER</span>
                    <span class="textCardInvis">Login</span>
                </a>
            </div>
            <div class="col-4"></div>
            <div class="col-4">
                <a href="<?php echo route('companyRegister'); ?>" class="textCardHref userCard">
                    <span class="textCard">COMPANY</span>
                    <span class="textCardInvis">Login</span>
                </a>
            </div>
        </div>
    </div>
    <div class="mt-auto"><?php include('footer.view.php'); ?></div>
</body>

</html>