<?php
define('SITE_NAME', 'your-site-name');

//App Root
define('APP_ROOT', dirname(dirname(__FILE__)));
define('URL_ROOT', '/');
define('URL_SUBFOLDER','optimy_test');

//DB Params
define('DB_HOST', 'your-host');
define('DB_USER', 'your-username');
define('DB_PASS', 'your-password');
define('DB_NAME', 'your-db-name');

return [
 'LOG_PATH' => __DIR__ . './logs',

 'DATABASE_NAME' => 'phptest',
 'DATABASE_HOST' => '127.0.0.1',
 'DATABASE_USER' => 'root',
 'DATABASE_PASSWORD' => '',
];

