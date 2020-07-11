<?php
// ini_set('display_startup_errors', 1);
// ini_set('display_errors', 1);
// error_reporting(-1);

require("./core/config.php");

// CONSTANTS
require("./core/constants.php");

// DB Class
require("./core/db.php");

// MODELS
require("./models/contacts.php");

// HELPER CLASSES
require("./helpers/form_validation.php");
require("./helpers/build_page.php");
