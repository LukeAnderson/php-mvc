<?php

#use controller
require_once("../Controller/CustomerController.php");

#get model
$model = ViewUsersModel();

#set layout variables
$pageTitle = "Users";
$body = <<<EOD
<body class="layout-body">
    <table class="table">
EOD;

foreach((array)$model as $customer){
    $body.=<<<EOD
    <tr>
        <td>$customer->fname</td>
        <td>$customer->lname</td>
        <td>$customer->age</td>
    </tr>
EOD;
}

$body.= "</table>
    </body>";

#use layout
require_once('Shared/layout.php');