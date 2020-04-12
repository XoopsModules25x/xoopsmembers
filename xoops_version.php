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
 * @copyright  The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license    http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package    : XOOPS
 * @Module     :
 * @subpackage :
 * @since      2.3.0
 * @author     John Neill
 * @version    $Id: xoops_version.php 11483 2013-04-30 08:14:19Z beckmi $
 */
defined('XOOPS_ROOT_PATH') or die('Restricted access');

$modversion = [
    'name'                => _MI_XOOPSMEMBERS_MEMBERS_NAME,
    'description'         => _MI_XOOPSMEMBERS_MEMBERS_DESC,
    'author'              => 'John Neill, Kazumi Ono',
    'license'             => 'GNU GPL 2.0',
    'license_url'         => 'www.gnu.org/licenses/gpl-2.0.html',
    'help'                => 'page=help',
    'contributors'        => '',
    'credits'             => 'The Xoops Module Development Team',
    'version'             => 1.03,
    'module_status'       => 'Alpha',
    'official'            => 1,
    'image'               => 'assets/images/slogo.png',
    'dirname'             => basename(__DIR__),
    'dirmoduleadmin'      => '/Frameworks/moduleclasses/moduleadmin',
    'icons16'             => '../../Frameworks/moduleclasses/icons/16',
    'icons32'             => '../../Frameworks/moduleclasses/icons/32',

    //about
    'author_website_url'  => 'https://www.xoops.org',
    'author_website_name' => 'XOOPS',
    'module_website_url'  => 'https://www.xoops.org',
    'module_website_name' => 'XOOPS',
    'release_date'        => '2020',
    'min_php'             => '7.3.0',
    'min_xoops'           => '2.5.10',
    'min_db'              => ['mysql' => '5.6', 'mysqli' => '5.6'],
    'min_admin'           => '1.2',
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
$modversion['sub']     = [
    [
        'name' => _MI_XOOPSMEMBERS_MEMBERSLIST,
        'url'  => 'index.php',
    ],
    [
        'name' => _MI_XOOPSMEMBERS_ADVANCEDSEARCH,
        'url'  => 'searchmembers.php',
    ],
];

/**
 * Module Templates
 */
$modversion['templates'][] = [
    'file'        => 'xoopsmembers_index.tpl',
    'description' => '',
];
$modversion['templates'][] = [
    'file'        => 'xoopsmembers_searchform.tpl',
    'description' => '',
];
$modversion['templates'][] = [
    'file'        => 'xoopsmembers_searchresults.tpl',
    'description' => '',
];

// Search
$modversion['hasSearch']      = 1;
$modversion['search']['file'] = 'include/search.inc.php';
$modversion['search']['func'] = 'member_search';
