<?php

require_once __DIR__.'/../../vendor/autoload.php';
$configs = require_once __DIR__.'/../../config/app.conf.php';

use Service;

DBConnector::setConfig($configs['db']);