<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require __DIR__ . '../../vendor/autoload.php';
require_once '../config.php';

// Routes
require_once '../routes/web.php';
require_once '../app/Router.php';

use App\Model\Comment;
use App\Model\News;
use App\Utils\DB;
use App\Utils\NewsManager;

