<?php

#use controller
require_once("../Controller/Customer.php");

#get model
$model = IndexModel();

AddCustomer($model);

#set layout variables
$pageTitle = "Home";
$body = <<<EOD
<body>

    <p>hello $pageTitle</p>

    <p>The model is $model</p>



</body>
EOD;

#use layout
require_once('Shared/layout.php');