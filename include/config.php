<?php
// SITE_ROOT contains the full path to the emart folder
// dirname(dirname(__FILE__)) returns the parent of the 
// current file’s directory
define('SITE_ROOT', dirname(dirname(__FILE__)));

// Application directories
define('PRESENTATION_DIR', SITE_ROOT . '/presentation/');
define('BUSINESS_DIR', SITE_ROOT . '/business/');

// Settings needed to configure the Smarty template engine
define('SMARTY_DIR', SITE_ROOT . '/libs/smarty/');
define('TEMPLATE_DIR', PRESENTATION_DIR . 'templates');
define('COMPILE_DIR', PRESENTATION_DIR . 'templates_c');
define('CONFIG_DIR', SITE_ROOT . '/include/configs');

// These should be true while developing the web site
define('IS_WARNING_FATAL', true);
define('DEBUGGING', true);

// The error types to be reported
define('ERROR_TYPES', E_ALL);

// Settings about mailing the error messages to admin
define('SEND_ERROR_MAIL', false);
define('ADMIN_ERROR_MAIL', 'emartadmin@localhost');
define('SENDMAIL_FROM', 'errors@localhost');
ini_set('sendmail_from', SENDMAIL_FROM);

// By default we don't log errors to a file
define('LOG_ERRORS', true);
define('LOG_ERRORS_FILE', 'logs\errors_log.txt'); // Windows

/* Generic error message to be displayed instead of debug info
(when DEBUGGING is false) */
define('SITE_GENERIC_ERROR_MESSAGE', '<h1>eMart Error!</h1>');

// Database connectivity setup
define('DB_PERSISTENCY', 'true');
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'sysadmin');
define('DB_PASSWORD', 'password');
define('DB_DATABASE', 'emart');
define('PDO_DSN', 'mysql:host=' . DB_SERVER . ';dbname=' . DB_DATABASE);

// Server HTTP port (can omit if the default 80 is used)
define('HTTP_SERVER_PORT', '80');

/* Name of the virtual directory the site runs in, for example:
'/emart/' if the site runs at http://www.example.com/emart/
'/' if the site runs at http://www.example.com/ */
define('VIRTUAL_LOCATION', '/emart/');

// Configure product lists display options
define('SHORT_PRODUCT_DESCRIPTION_LENGTH', 80);
define('PRODUCTS_PER_PAGE', 6);

// We enable and enforce SSL when this is set to anything else than 'no'
define('USE_SSL', 'no');

// Administrator login information
define('ADMIN_USERNAME', 'sysadmin');
define('ADMIN_PASSWORD', 'password');

// Shopping cart item types
define('GET_CART_PRODUCTS', 1);
define('GET_CART_SAVED_PRODUCTS', 2);

// Cart actions
define('ADD_PRODUCT', 1);
define('REMOVE_PRODUCT', 2);
define('UPDATE_PRODUCTS_QUANTITIES', 3);
define('SAVE_PRODUCT_FOR_LATER', 4);
define('MOVE_PRODUCT_TO_CART', 5);

// Random value used for hashing
define('HASH_PREFIX', 'EPWD1-');

// Constant definitions for order handling related messages
define('ADMIN_EMAIL', 'emartadmin@localhost');
define('CUSTOMER_SERVICE_EMAIL', 'emartcustomerservice@localhost');
define('ORDER_PROCESSOR_EMAIL', 'emartorders@localhost');
define('SUPPLIER_EMAIL', 'emartwarehouse@localhost');

// Store name
define('STORE_NAME', 'eMart');

// Constant definitions for authorize.net
define('AUTHORIZE_NET_URL', 'https://test.authorize.net/gateway/transact.dll');
define('AUTHORIZE_NET_LOGIN_ID', '7Yq7Z6Sne');
define('AUTHORIZE_NET_TRANSACTION_KEY', '6dDb29kVv28b5VzX');
define('AUTHORIZE_NET_TEST_REQUEST', 'FALSE');
?>