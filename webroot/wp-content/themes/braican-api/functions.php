<?php

define('BRAICAN_THEME_URI', get_template_directory_uri());
define('BRAICAN_THEME_PATH', dirname(__FILE__) . '/');

require_once 'lib/BraicanTheme.php';
require_once 'lib/BraicanAPI.php';


// init the site
new BraicanTheme();

// init the api
new BraicanAPI();
