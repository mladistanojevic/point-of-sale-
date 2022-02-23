<?php
session_start();

require_once '../app/config/config.php';
require_once '../app/helpers/session_helpers.php';
require_once '../app/helpers/general_helpers.php';

require_once '../app/core/Controller.php';
require_once '../app/core/Database.php';
require_once '../app/core/Core.php';


$init = new Core();
