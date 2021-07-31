<?php
/**
 * XoopsMembers module
 * Description: Category Admin file
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright ::  The XOOPS Project (https://xoops.org)
 * @license   ::    {@link http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @package   ::    xoopsmembers
 * @subpackage:: admin
 * @since     ::      1.02
 * @author    ::     Mamba
 **/

use Xmf\Module\Admin;
use XoopsModules\Xoopsmembers;

require dirname(__DIR__) . '/preloads/autoloader.php';

require dirname(__DIR__, 3) . '/include/cp_header.php';
//require_once $GLOBALS['xoops']->path('www/class/xoopsformloader.php');

// require_once  dirname(__DIR__) . '/class/Utility.php';
//require_once  dirname(__DIR__) . '/include/common.php';

$moduleDirName      = \basename(\dirname(__DIR__));
$moduleDirNameUpper = mb_strtoupper($moduleDirName);

/** @var Xoopsmembers\Helper $helper */
$helper      = Xoopsmembers\Helper::getInstance();
$adminObject = Admin::getInstance();

$pathIcon16    = Admin::iconUrl('', 16);
$pathIcon32    = Admin::iconUrl('', 32);
$pathModIcon32 = $helper->getModule()->getInfo('modicons32');

// Load language files
$helper->loadLanguage('admin');
$helper->loadLanguage('modinfo');
$helper->loadLanguage('common');
$helper->loadLanguage('blocksadmin');

$myts = \MyTextSanitizer::getInstance();

if (!isset($GLOBALS['xoopsTpl']) || !($GLOBALS['xoopsTpl'] instanceof \XoopsTpl)) {
    require_once $GLOBALS['xoops']->path('class/template.php');
    $xoopsTpl = new \XoopsTpl();
}
