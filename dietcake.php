<?php
/**
 * DietCake - Fastest MVC framework skeleton
 *
 * @copyright bunkyo-koki Co.,Ltd.
 * @license MIT License
 * @author Tatsuya Tsuruoka <http://github.com/ttsuruoka>
 */
mb_internal_encoding('UTF-8');
define('TIME_START', microtime(true));
define('DC_ACTION', 'dc_action');

define('DC_DIR', dirname(__FILE__).'/');
define('DC_CORE_DIR', DC_DIR.'core/');
define('CONFIG_DIR', APP_DIR.'config/');
define('CONTROLLERS_DIR', APP_DIR.'controllers/');
define('MODELS_DIR', APP_DIR.'models/');
define('VIEWS_DIR', APP_DIR.'views/');
define('HELPERS_DIR', APP_DIR.'helpers/');
define('TMP_DIR', APP_DIR.'tmp/');
define('LOGS_DIR', TMP_DIR.'logs/');
define('LIB_DIR', ROOT_DIR.'lib/');
define('VENDOR_DIR', ROOT_DIR.'vendor/');

require_once DC_CORE_DIR.'exception.php';
require_once DC_CORE_DIR.'inflector.php';
require_once DC_CORE_DIR.'param.php';
require_once DC_CORE_DIR.'model.php';
require_once DC_CORE_DIR.'view.php';
require_once DC_CORE_DIR.'controller.php';
require_once DC_CORE_DIR.'dispatcher.php';
