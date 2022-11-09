<?php

error_reporting(E_ALL);
ini_set('ignore_repeated_errors', TRUE);
ini_set('display_errors', FALSE);
ini_set('log_errors', TRUE);
ini_set("error_log", "php-errors.log");

require_once 'libs/database.php';
require_once 'libs/controller.php';
require_once 'libs/view.php';
require_once 'libs/model.php';
require_once 'libs/app.php';

require_once 'classes/session.php';
require_once 'classes/sessionController.php';
require_once 'classes/messagesManager.php';
require_once 'classes/errors.php';

require_once 'config/config.php';

include_once 'models/userModel.php';
include_once 'models/productModel.php';

$app = new App();
