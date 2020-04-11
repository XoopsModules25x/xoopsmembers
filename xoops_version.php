<?php

/**
 * Name: xoops_version.php
 * Description:
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright  XOOPS Project (https://xoops.org)
 * @license    http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package    : XOOPS
 * @Module     :
 * @subpackage :
 * @since      2.3.0
 * @author     John Neill
 */
defined('XOOPS_ROOT_PATH') || exit('Restricted access');

require_once __DIR__ . '/preloads/autoloader.php';

$modversion = [
    'version'             => 1.03,
    'module_status'       => 'Beta 1',
    'release_date'        => '2017/07/07',
    'name'                => _XO_MI_MEMBERS_NAME,
    'description'         => _XO_MI_MEMBERS_DESC,
    'author'              => 'John Neill, Kazumi Ono',
    'license'             => 'GNU GPL 2.0',
    'license_url'         => 'www.gnu.org/licenses/gpl-2.0.html',
    'help'                => 'page=help',
    'contributors'        => '',
    'credits'             => 'The Xoops Module Development Team',
    //  'releasedate' => 'Friday 10.4.2009',
    'official'            => 1,
    'image'               => 'assets/images/logoModule.png',
    'dirname'             => basename(__DIR__),
    'modicons16'          => 'assets/images/icons/16',
    'modicons32'          => 'assets/images/icons/32',
    //about
    'author_website_url'  => 'https://xoops.org',
    'author_website_name' => 'XOOPS',
    'module_website_url'  => 'https://xoops.org',
    'module_website_name' => 'XOOPS',
    'min_php'             => '5.5',
    'min_xoops'           => '2.5.10',
    'min_db'              => ['mysql' => '5.5'],
    'min_admin'           => '1.1',
];

// ------------------- Help files ------------------- //
$modversion['helpsection'] = [
    ['name' => _MI_XOOPSMEMBERS_OVERVIEW, 'link' => 'page=help'],
    ['name' => _MI_XOOPSMEMBERS_DISCLAIMER, 'link' => 'page=disclaimer'],
    ['name' => _MI_XOOPSMEMBERS_LICENSE, 'link' => 'page=license'],
    ['name' => _MI_XOOPSMEMBERS_SUPPORT, 'link' => 'page=support'],
];
/**
 * Module Admin
 */
$modversion['hasAdmin']    = 1;
$modversion['system_menu'] = 1;
$modversion['adminindex']  = 'admin/index.php';
$modversion['adminmenu']   = 'admin/menu.php';
/**
 * Module Main Main
 */
$modversion['hasMain'] = 1;

/**
 * Module Templates
 */
$modversion['templates'][] = [
    'file'        => 'xoopsmembers_searchform.tpl',
    'description' => '',
];
$modversion['templates'][] = [
    'file'        => 'xoopsmembers_searchresults.tpl',
    'description' => '',
];
