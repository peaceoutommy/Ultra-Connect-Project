<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo route('views/styles.css'); ?>" />
</head>

<body>
    <nav>
        <div class="p-3 text-white headDiv">
            <div class="flexMain">
                <div class="flex2 text-center">

                    <!-- USER NOT LOGGED IN -->
                    <?php if (!isset($_SESSION["freelancerId"]) && (!isset($_SESSION["companyId"]))) { ?>
                        <strong>Welcome Guest</strong>
                    <?php
                    }
                    if (isset($_SESSION["freelancerId"])) { ?>

                        <!-- FREELANCER LOGGED IN -->
                        <strong> Welcome
                            <?php echo $_SESSION["freelancerUsername"]; ?>
                        </strong>

                        <!-- COMPANY LOGGED IN -->
                    <?php }
                    if (isset($_SESSION["companyId"])) { ?>
                        <strong> Welcome
                            <?php echo $_SESSION["companyName"]; ?>
                        </strong>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div id="menuHolder">
            <div role="navigation" class="sticky-top" id="mainNavigation">
                <div class="flexMain">
                    <div class="buttonMenu">
                        <!-- BUTTON MENU -->
                        <button class="whiteLink siteLink" onclick="menuToggle()"><i class="fas fa-bars me-2"></i>
                            MENU</button>
                    </div>
                    <div class="flex3 text-center" id="siteBrand">ULTRA CONNECT</div>

                    <!-- USER NOT LOGGED -->
                    <?php if (!isset($_SESSION["freelancerId"]) && !isset($_SESSION["companyId"])) { ?>

                        <div class="flex3 text-end d-none d-md-block nav-menu" id="loginMenu">
                            <a href="<?php echo route('generalLogin'); ?>"><button class="whiteLink siteLink">LOGIN</button></a>
                            <a href="<?php echo route('generalRegister'); ?>"><button class="whiteLink siteLink">REGISTER</button></a>
                        </div>

                        <!-- FREELANCER LOGGED IN -->
                    <?php
                    }
                    if (isset($_SESSION["freelancerId"])) {
                    ?>
                        <div class="flex3 text-end d-none d-md-block nav-menu" id="loginMenu">
                            <a href="<?php echo route('profileFreelancer'); ?>"><button class="whiteLink siteLink">PROFILE</button></a>
                            <a href="<?php echo route('logout'); ?>"><button class="whiteLink siteLink">LOGOUT</button></a>
                        </div>

                        <!-- COMPANY LOGGED IN -->
                    <?php
                    }
                    if (isset($_SESSION["companyId"])) {
                    ?>
                        <div class="flex3 text-end d-none d-md-block nav-menu" id="loginMenu">
                            <a href="<?php echo route('profileCompany'); ?>"><button class="whiteLink siteLink">PROFILE</button></a>
                            <a href="<?php echo route('logout'); ?>"><button class="whiteLink siteLink">LOGOUT</button></a>
                        </div>
                    <?php } ?>

                </div>
            </div>
            <div id="menuDrawer">
                <div class="p-4 " style="border-bottom:1px solid #fff ;">
                    <div class='row'>
                        <div class="col">
                            <div>
                                <img src="Imagens/Logo.svg" class="menuLogo">
                            </div>
                        </div>
                        <div class="col text-end ">
                            <!-- LIMITAR O TAMANHO DO LOGO DENTRO DO MENU -->
                        </div>
                    </div>
                </div>
                <!-- USER NOT LOGGED (DRAWER MENU) -->
                <?php if (!isset($_SESSION["freelancerId"]) && !isset($_SESSION["companyId"])) { ?>
                    <div>
                        <a href="<?php echo route(''); ?>" class="nav-menu-item"><i class="fas fa-home me-3"></i>Home</a>
                        <a href="<?php echo route('generalRegister'); ?>" class="buttonReg nav-menu-item d-none"><i class="fas fa-building me-3"></i>Register</a>
                        <a href="<?php echo route('generalLogin'); ?>" class="buttonReg nav-menu-item d-none"><i class="fas fa-building me-3"></i>Login</a>
                        <a href="<?php echo route('Info'); ?>" class="nav-menu-item"><i class="fas fa-home me-3"></i>Informations</a>
                        <a href="" class="nav-menu-item" id="closeButton"><i class="fas fa-building me-3"></i>Close</a>
                    </div>
                <?php } ?>

                <!-- FREELANCER LOGGED IN (DRAWER MENU) -->
                <?php if (isset($_SESSION["freelancerId"])) { ?>
                    <div>
                        <a href="<?php echo route(''); ?>" class="nav-menu-item"><i class="fas fa-home me-3"></i>Home</a>
                        <a href="<?php echo route('profileFreelancer'); ?>" class="nav-menu-item"><i class="fas fa-home me-3"></i>Profile</a>
                        <a href="<?php echo route('browseEvents'); ?>" class="nav-menu-item"><i class="fas fa-home me-3"></i>Browse Events</a>
                        <a href="<?php echo route('myEvents'); ?>" class="nav-menu-item"><i class="fas fa-home me-3"></i>My Events</a>
                        <a href="<?php echo route('logout'); ?>" class="buttonReg nav-menu-item"><i class="fas fa-building me-3"></i>Logout</a>
                        <a href="" class="nav-menu-item" id="closeButton"><i class="fas fa-building me-3"></i>Close</a>
                    </div>
                <?php } ?>

                <!-- COMPANY LOGGED IN (DRAWER MENU) -->
                <?php if (isset($_SESSION["companyId"])) { ?>
                    <div>
                        <a href="<?php echo route(''); ?>" class="nav-menu-item"><i class="fas fa-home me-3"></i>Home</a>
                        <a href="<?php echo route('listEvents'); ?>" class="nav-menu-item"><i class="fas fa-home me-3"></i>My Events</a>
                        <a href="<?php echo route('createEvent'); ?>" class="nav-menu-item"><i class="fas fa-home me-3"></i>Create Events</a>
                        <a href="<?php echo route('profileCompany'); ?>" class="nav-menu-item"><i class="fas fa-home me-3"></i>My Profile</a>
                        <a href="<?php echo route('logout'); ?>" class="buttonReg nav-menu-item"><i class="fas fa-building me-3"></i>Logout</a>
                        <a href="#" class="nav-menu-item" id="closeButton"><i class="fas fa-building me-3"></i>Close</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="<?php echo route('views/javascript.js'); ?>"></script>
</body>

</html>