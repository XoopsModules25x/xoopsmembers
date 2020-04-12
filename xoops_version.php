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

$modversion = [
    'version'             => 1.04,
    'module_status'       => 'Alpha 2',
    'release_date'        => '2020/04/11',
    'name'                => _MI_XOOPSMEMBERS_NAME,
    'description'         => _MI_XOOPSMEMBERS_DESC,
    'author'              => 'John Neill, Kazumi Ono',
    'license'             => 'GNU GPL 2.0',
    'license_url'         => 'www.gnu.org/licenses/gpl-2.0.html',
    'help'                => 'page=help',
    'contributors'        => '',
    'credits'             => 'The Xoops Module Development Team',
    'official'            => 1,
    'dirname'             => basename(__DIR__),
    'image'               => 'assets/images/logoModule.png',
    'modicons16'          => 'assets/images/icons/16',
    'modicons32'          => 'assets/images/icons/32',
    //about
    'author_website_url'  => 'https://xoops.org',
    'author_website_name' => 'XOOPS',
    'module_website_url'  => 'https://xoops.org',
    'module_website_name' => 'XOOPS',
    'min_php'             => '7.1',
    'min_xoops'           => '2.5.10',
    'min_db'              => ['mysql' => '5.5'],
    'min_admin'           => '1.2',
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

// Config categories

$modversion['configcat']['index'] = [
    'name'        => _MI_XOOPSMEMBERS_CONFCAT_INDEX,
    'description' => _MI_XOOPSMEMBERS_CONFCAT_INDEX_DSC,
];

$modversion['configcat']['indexsearch']      = [
    'name'        => _MI_XOOPSMEMBERS_CONFCAT_INDEXSEARCH,
    'description' => _MI_XOOPSMEMBERS_CONFCAT_INDEXSEARCH_DSC,
];


//Configs

// group header
$modversion['config'][] = [
    'name'        => 'indexsearch_configs',
    'title'       => '_MI_XOOPSMEMBERS_CONFCAT_INDEXPAGE',
    'description' => '_MI_XOOPSMEMBERS_CONFCAT_INDEXPAGEDSC',
    'formtype'    => 'line_break',
    'valuetype'   => 'textbox',
    'default'     => 'even',
    'category'    => 'group_header',
];

$modversion['config'][] = [
    'name'        => 'membersperpage',
    'title'       => '_MI_XOOPSMEMBERS_INDEXMPAGE',
    'description' => '_MI_XOOPSMEMBERS_INDEXMPAGE_DSC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 15,
    'category'    => 'index',
];

$modversion['config'][] = [
    'name'        => 'sortmembers',
    'title'       => '_MI_XOOPSMEMBERS_INDEXSORT',
    'description' => '_MI_XOOPSMEMBERS_INDEXSORT_DSC',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'default'     => 'uname',
    'options'     => [
        _MI_XOOPSMEMBERS_UNAME     => 'uname',
        _MI_XOOPSMEMBERS_REALNAME  => 'name',
        _MI_XOOPSMEMBERS_LASTLOGIN => 'last_login',
        _MI_XOOPSMEMBERS_REGDATE   => 'user_regdate',
        _MI_XOOPSMEMBERS_POSTS     => 'posts',
    ],
    'category'    => 'index',
];

$modversion['config'][] = [
    'name'        => 'membersorder',
    'title'       => '_MI_XOOPSMEMBERS_INDEXORDER',
    'description' => '_MI_XOOPSMEMBERS_INDEXORDER_DSC',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'default'     => 'ASC',
    'options'     => [
        _MI_XOOPSMEMBERS_ORDER_ASC  => 'ASC',
        _MI_XOOPSMEMBERS_ORDER_DESC => 'DESC',
    ],
    'category'    => 'index',
];



// group header
$modversion['config'][] = [
    'name'        => 'indexsearch_configs',
    'title'       => '_MI_XOOPSMEMBERS_CONFCAT_INDEXSEARCHPAGE',
    'description' => '_MI_XOOPSMEMBERS_CONFCAT_INDEXSEARCHPAGEDSC',
    'formtype'    => 'line_break',
    'valuetype'   => 'textbox',
    'default'     => 'even',
    'category'    => 'group_header',
];

$modversion['config'][] = [
    'name'        => 'displayavatar',
    'title'       => '_MI_XOOPSMEMBERS_DISPLAYAVATAR',
    'description' => '_MI_XOOPSMEMBERS_DISPLAYAVATAR_DSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
    'category'    => 'indexsearch',
];

$modversion['config'][] = [
    'name'        => 'displayrealname',
    'title'       => '_MI_XOOPSMEMBERS_DISPLAYREALNAME',
    'description' => '_MI_XOOPSMEMBERS_DISPLAYREALNAME_DSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
    'category'    => 'indexsearch',
];

$modversion['config'][] = [
    'name'        => 'displayemail',
    'title'       => '_MI_XOOPSMEMBERS_DISPLAYEMAIL',
    'description' => '_MI_XOOPSMEMBERS_DISPLAYEMAIL_DSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
    'category'    => 'indexsearch',
];

$modversion['config'][] = [
    'name'        => 'displaypm',
    'title'       => '_MI_XOOPSMEMBERS_DISPLAYPM',
    'description' => '_MI_XOOPSMEMBERS_DISPLAYPM_DSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
    'category'    => 'indexsearch',
];


$modversion['config'][] = [
    'name'        => 'displayurl',
    'title'       => '_MI_XOOPSMEMBERS_DISPLAYURL',
    'description' => '_MI_XOOPSMEMBERS_DISPLAYURL_DSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
    'category'    => 'indexsearch',
];


$modversion['config'][] = [
    'name'        => 'displayregdate',
    'title'       => '_MI_XOOPSMEMBERS_DISPLAYREGDATE',
    'description' => '_MI_XOOPSMEMBERS_DISPLAYREGDATE_DSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
    'category'    => 'indexsearch',
];

$modversion['config'][] = [
    'name'        => 'displayfrom',
    'title'       => '_MI_XOOPSMEMBERS_DISPLAYFROM',
    'description' => '_MI_XOOPSMEMBERS_DISPLAYFROM_DSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
    'category'    => 'indexsearch',
];

$modversion['config'][] = [
    'name'        => 'displayposts',
    'title'       => '_MI_XOOPSMEMBERS_DISPLAYPOSTS',
    'description' => '_MI_XOOPSMEMBERS_DISPLAYPOSTS_DSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
    'category'    => 'indexsearch',
];

$modversion['config'][] = [
    'name'        => 'displaylastlogin',
    'title'       => '_MI_XOOPSMEMBERS_DISPLAYLASTLOGIN',
    'description' => '_MI_XOOPSMEMBERS_DISPLAYLASTLOGIN_DSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
    'category'    => 'indexsearch',
];

$modversion['config'][] = [
    'name'        => 'displayoccupation',
    'title'       => '_MI_XOOPSMEMBERS_DISPLAYOCC',
    'description' => '_MI_XOOPSMEMBERS_DISPLAYOCC_DSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
    'category'    => 'indexsearch',
];

$modversion['config'][] = [
    'name'        => 'displayinterest',
    'title'       => '_MI_XOOPSMEMBERS_DISPLAYINTEREST',
    'description' => '_MI_XOOPSMEMBERS_DISPLAYINTEREST_DSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
    'category'    => 'indexsearch',
];
