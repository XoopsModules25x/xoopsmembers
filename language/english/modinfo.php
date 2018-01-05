<?php
/**
 * Xoops Members Module
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright XOOPS Project (https://xoops.org)
 * @license   http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package   Xoops Members
 * @since     2.3.0
 * @author    onokazu
 * @author    John Neill
 * @version   $Id: index.php catzwolf$
 */
defined('XOOPS_ROOT_PATH') || die('Restricted access');

/**
 * Module Menu Items
 */
define('_XO_MI_MEMBERS_NAME', 'Members');
define('_XO_MI_MEMBERS_DESC', 'Shows a list of registered users');

//1.03
//Help
define('_MI_XOOPSMEMBERS_DIRNAME', basename(dirname(dirname(__DIR__))));
define('_MI_XOOPSMEMBERS_HELP_HEADER', __DIR__.'/help/helpheader.tpl');
define('_MI_XOOPSMEMBERS_BACK_2_ADMIN', 'Back to Administration of ');
define('_MI_XOOPSMEMBERS_OVERVIEW', 'Overview');

//define('_MI_XOOPSMEMBERS_HELP_DIR', __DIR__);

//help multi-page
define('_MI_XOOPSMEMBERS_DISCLAIMER', 'Disclaimer');
define('_MI_XOOPSMEMBERS_LICENSE', 'License');
define('_MI_XOOPSMEMBERS_SUPPORT', 'Support');

define('_MI_XOOPSMEMBERS_HOME', 'Home');
define('_MI_XOOPSMEMBERS_ABOUT', 'About');
