<?php

#set layout variables
$pageTitle = "About";
$body = <<<EOD
<body class="layout-body">

    <p>hello $pageTitle</p>

</body>
EOD;

#use layout
require_once('Shared/layout.php');