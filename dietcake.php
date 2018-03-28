<?php
/**
 * DietCake - Fastest MVC framework skeleton
 *
 * @copyright bunkyo-koki Co.,Ltd.
 * @license MIT License
 * @author Tatsuya Tsuruoka <http://github.com/ttsuruoka>
 */

use DietCake\Dispatcher;

mb_internal_encoding('UTF-8');
define('TIME_START', microtime(true));
define('DC_ACTION', Dispatcher::DC_ACTION);

define('DC_DIR', __DIR__.'/');
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
