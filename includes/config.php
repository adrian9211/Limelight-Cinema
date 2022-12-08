<?php

// Site Settings
$siteName = 'http://23.102.4.246/Limelight-Cinema/index.php';
$siteEmail = 'adrian9211@gmail.com';

// Database configuration
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '1xCMat5k5Cb4');
define('DB_NAME', 'Limelight-Cinema');


/* Changes are not required, used for internal purpose */
$siteURL = (!empty($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on")?'https://':'http://';
$siteURL = $siteURL.$_SERVER["SERVER_NAME"].dirname($_SERVER['REQUEST_URI']).'/';

?>