<?php

#use controller
require_once("../Controller/CustomerController.php");

#get model
$model = IndexModel();

#set layout variables
$pageTitle = "Home";
$body = <<<EOD
<body class="layout-body">

    <p>hello $pageTitle</p>

    <p>The model is $model</p>

</body>
EOD;

#use layout
require_once('Shared/layout.php');