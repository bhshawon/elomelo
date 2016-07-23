<?php
// lol. getting confused with your structure :p
// rtrim because there is little differnce between windows and linus server
define("APP_DIR", rtrim(dirname(__FILE__), '/').'/');
define("APP_URI", "/MyMVC/public/");
define("APP_URL", "http://localhost:8080".APP_URI);

define("DB_NAME", "");
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");