<?php

require_once 'classAutoLoader.pure.php';

//INPUT
$signupController = new SignupController('Reygin', 'Loader');

//PROCESS user inputs
$userDatas = $signupController->getUserData();
$loaderData = $signupController->getLoaderData();
$dataList = $signupController->dbDataArray();

//OUTPUT process results
$userResult = new SignupView($userDatas);
$loaderResult = new SignupView($loaderData);
$dbData = new SignupView($dataList);

$userResult->showUser();
$loaderResult->showLoader();
$dbData->showDbData();
