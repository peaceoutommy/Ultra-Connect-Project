<?php

/* home page */
$router->get('', function () {
    require 'controllers/home.php';
});

/* GENERAL register*/
$router->get('generalRegister', function () {
    require 'controllers/registerGeneral.php';
});

/* GENERAL login*/
$router->get('generalLogin', function () {
    require 'controllers/loginGeneral.php';
});

/* FREELANCER register */
$router->get('freelancerRegister', function () {
    require 'controllers/freelancer/register.php';
});

$router->post('freelancerRegister', function () {
    require 'controllers/freelancer/store.php';
});

/* FREELANCER login */
$router->get('freelancerLogin', function () {
    require 'controllers/freelancer/login.php';
});

$router->post('freelancerLogin', function () {
    require 'controllers/freelancer/loginVerify.php';
});

/* COMPANY register */
$router->get('companyRegister', function () {
    require 'controllers/company/register.php';
});

$router->post('companyRegister', function () {
    require 'controllers/company/store.php';
});

/* COMPANY login */
$router->get('companyLogin', function () {
    require 'controllers/company/login.php';
});

$router->post('companyLogin', function () {
    require 'controllers/company/loginVerify.php';
});

/* LOGOUT */
$router->get('logout', function () {
    require 'controllers/logout.php';
});

/* COMPANY create event */
$router->get('createEvent', function () {
    require 'controllers/company/createEvent.php';
});

$router->post('createEvent', function () {
    require 'controllers/company/storeEvent.php';
});

/* FREELANCER browse events */
$router->get('browseEvents', function () {
    require 'controllers/freelancer/browseEvents.php';
});

/* browse events Order*/
$router->post('browseEvents', function () {
    require 'controllers/freelancer/browseEvents.php';
});

/* FREELANCER apply event */
$router->post('applyEvent', function () {
    require 'controllers/freelancer/applyEvent.php';
});

// COMPANY my events & manage application
$router->get('manageApplications', function () {
    require 'controllers/company/manageApplications.php';
});

// COMPANY update application state
$router->post('updateApplicationState', function () {
    require 'controllers/company/updateApplicationState.php';
});

// FREELANCER view freelancer profile
$router->get('profileFreelancer', function () {
    require 'controllers/freelancer/profile.php';
});

// COMPANY view company profile
$router->get('profileCompany', function () {
    require 'controllers/company/profile.php';
});

// COMPANY see freelancer profile
$router->post('seeFreelancer', function () {
    require 'controllers/company/seeFreelancer.php';
});

// FREELANCER see company profile
$router->post('seeCompany', function () {
    require 'controllers/freelancer/seeCompany.php';
});

// FREELANCER myEvents
$router->get('myEvents', function () {
    require 'controllers/freelancer/myEvents.php';
});

// see event Details
$router->get('event/(\d+)', function ($id) {
    require 'controllers/eventId.php';
});

// FREELANCER profile edit
$router->get('editFreelancerProfile', function () {
    require 'controllers/freelancer/editProfile.php';
});

$router->post('updateFreelancerProfile', function () {
    require 'controllers/freelancer/updateProfile.php';
});