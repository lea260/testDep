<?php

session_start();

require 'libs/database.php';
require 'libs/model.php';
require 'libs/controller.php';
require 'libs/view.php';
require 'libs/app.php';
require 'config/config.php';
//require 'config/secrets.php';

$app = new App();