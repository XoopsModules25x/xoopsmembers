<?php
/**
 * Name: menu.php
 * Description: Menu for the Xoops Members Module
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright ::  XOOPS Project (https://xoops.org)
 * @license   ::    {@link http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @package   ::    xoopsmembers
 * @subpackage:: Xoops Members Adminisration
 * @since     ::      1.02
 * @author    ::     John Neill
 */

use XoopsModules\Xoopsmembers;

include dirname(__DIR__) . '/preloads/autoloader.php';

/** @var \Xoopsmembers\Helper $helper */
$helper = Xoopsmembers\Helper::getInstance();
$helper->loadLanguage('common');
$helper->loadLanguage('feedback');

$pathIcon32 = \Xmf\Module\Admin::menuIconPath('');
if (is_object($helper->getModule())) {
    $pathModIcon32 = $helper->getModule()->getInfo('modicons32');
}

$adminmenu[] = [
    'title' => _MI_XOOPSMEMBERS_MENU_HOME,
    'link'  => 'admin/index.php',
    'icon'  => $pathIcon32 . '/home.png',
];

$adminmenu[] = [
    'title' => _MI_XOOPSMEMBERS_MENU_ABOUT,
    'link'  => 'admin/about.php',
    'icon'  => $pathIcon32 . '/about.png',
];
