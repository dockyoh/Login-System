<?php

require_once 'classAutoLoader.pure.php';

//INPUT
$signupController = new SignupController('Reygin', 'Loader');

//PROCESS user inputs
$userDatas = $signupController->getUserData();
$loaderData = $signupController->getLoaderData();

//OUTPUT process results
$userResult = new SignupView($userDatas);
$loaderResult = new SignupView($loaderData);

$userResult->showUser();
$loaderResult->showLoader();
