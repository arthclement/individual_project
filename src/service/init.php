<?php

require_once __DIR__.'/../../vendor/autoload.php';
require_once __DIR__.'/DBConnector.php';
$configs = require_once __DIR__.'/../../config/app.conf.php';

Service\DBConnector::setConfig($configs['db']);