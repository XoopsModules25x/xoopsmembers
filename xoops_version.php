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
 * @copyright The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package : XOOPS
 * @Module :
 * @subpackage :
 * @since 2.3.0
 * @author John Neill
 * @version $Id: xoops_version.php 11483 2013-04-30 08:14:19Z beckmi $
 */
defined( 'XOOPS_ROOT_PATH' ) or die( 'Restricted access' );

$modversion = array( 'name' => _MI_XM_MEMBERS_NAME,
    'description' => _MI_XM_MEMBERS_DESC,
    'author' => 'John Neill, Kazumi Ono',
    'license' => 'GNU GPL 2.0',
    'license_url' => "www.gnu.org/licenses/gpl-2.0.html",
    'help' => 'page=help',
    'contributors' => '',
    'credits' => 'The Xoops Module Development Team',
    'version' => 1.03,
    'module_status' => "Alpha",
    'official' => 1,
    'image' => 'assets/images/slogo.png',
    'dirname' => basename( dirname( __FILE__ ) ),
    'dirmoduleadmin' => '/Frameworks/moduleclasses/moduleadmin',
    'icons16' =>  '../../Frameworks/moduleclasses/icons/16',
    'icons32' =>  '../../Frameworks/moduleclasses/icons/32',

    //about
    'author_website_url' => 'https://www.xoops.org',
    'author_website_name' => 'XOOPS',
    'module_website_url' => 'https://www.xoops.org',
    'module_website_name' => 'XOOPS',
    'release_date' => '2020',
    'min_php' => '7.3.0',
    'min_xoops' => '2.5.10',
    'min_db' => array('mysql'=>'5.6', 'mysqli'=>'5.6'),
    'min_admin' => '1.2'
    );

/**
 * Module Admin
 */
$modversion['hasAdmin'] = 1;
$modversion['system_menu'] = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu'] = 'admin/menu.php';
/**
 * Module Main Main
 */
$modversion['hasMain']             = 1;
$modversion['sub']                 = [
        [
            'name' => _MI_XM_MEMBERSLIST,
            'url'  => 'index.php',
        ],
		[
            'name' => _MI_XM_ADVANCEDSEARCH,
            'url'  => 'searchmembers.php',
        ]
    ];

/**
 * Module Templates
 */
$modversion['templates'][] = array( 'file' => 'xoopsmembers_index.tpl',
    'description' => ''
    );
$modversion['templates'][] = array( 'file' => 'xoopsmembers_searchform.tpl',
    'description' => ''
    );
$modversion['templates'][] = array( 'file' => 'xoopsmembers_searchresults.tpl',
    'description' => ''
    );

// Search
$modversion['hasSearch'] = 1;
$modversion['search']['file'] = "include/search.inc.php";
$modversion['search']['func'] = "member_search";


// Config categories

$modversion['configcat']['index']      = [
    'name'        => _MI_XM_CONFCAT_INDEX,
    'description' => _MI_XM_CONFCAT_INDEX_DSC,
];

$modversion['configcat']['indexsearch']      = [
    'name'        => _MI_XM_CONFCAT_INDEXSEARCH,
    'description' => _MI_XM_CONFCAT_INDEXSEARCH_DSC,
];


//Configs

// group header
$modversion['config'][] = [
    'name'        => 'indexsearch_configs',
    'title'       => '_MI_XM_CONFCAT_INDEXPAGE',
    'description' => '_MI_XM_CONFCAT_INDEXPAGEDSC',
    'formtype'    => 'line_break',
    'valuetype'   => 'textbox',
    'default'     => 'odd',
    'category'    => 'group_header',
];

$modversion['config'][] = [
    'name'        => 'displaywelcomemessage',
    'title'       => '_MI_XM_INDEXDISPLAYWELCOMEMSG',
    'description' => '_MI_XM_INDEXDISPLAYWELCOMEMSG_DSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
    'category'    => 'index',
];

$modversion['config'][] = [
    'name'        => 'welcomemessage',
    'title'       => '_MI_XM_INDEXWELCOMEMSG',
    'description' => '_MI_XM_INDEXWELCOMEMSGDSC',
    'formtype'    => 'textarea',
    'valuetype'   => 'text',
    'default'     => _MI_XM_INDEXDEFAULTWELCOMEMSG,
    'category'    => 'index',
];

$modversion['config'][] = [
    'name'        => 'displaylatestmember',
    'title'       => '_MI_XM_INDEXLATESTMEMBER',
    'description' => '_MI_XM_INDEXLATESTMEMBER_DSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
    'category'    => 'index',
];

$modversion['config'][] = [
    'name'        => 'membersperpage',
    'title'       => '_MI_XM_INDEXMPAGE',
    'description' => '_MI_XM_INDEXMPAGE_DSC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 15,
    'category'    => 'index',
];

$modversion['config'][] = [
    'name'        => 'sortmembers',
    'title'       => '_MI_XM_INDEXSORT',
    'description' => '_MI_XM_INDEXSORT_DSC',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'default'     => 'uname',
    'options'     => [
        _MI_XM_UNAME      => 'uname',
		_MI_XM_REALNAME   => 'name',
        _MI_XM_LASTLOGIN  => 'last_login',
        _MI_XM_REGDATE    => 'user_regdate',
        _MI_XM_POSTS      => 'posts',
    ],
    'category'    => 'index'	
];

$modversion['config'][] = [
    'name'        => 'membersorder',
    'title'       => '_MI_XM_INDEXORDER',
    'description' => '_MI_XM_INDEXORDER_DSC',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'default'     => 'ASC',
    'options'     => [
        _MI_XM_ASC      => 'ASC',
		_MI_XM_DESC     => 'DESC',    
	],
    'category'    => 'index'	
];


// group header
$modversion['config'][] = [
    'name'        => 'indexsearch_configs',
    'title'       => '_MI_XM_CONFCAT_INDEXSEARCHPAGE',
    'description' => '_MI_XM_CONFCAT_INDEXSEARCHPAGEDSC',
    'formtype'    => 'line_break',
    'valuetype'   => 'textbox',
    'default'     => 'even',
    'category'    => 'group_header',
];


$modversion['config'][] = [
    'name'        => 'displaybreadcrumb',
    'title'       => '_MI_XM_DISPLAYBREADCRUMB',
    'description' => '_MI_XM_DISPLAYBREADCRUMB_DSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
    'category'    => 'indexsearch',
];


$modversion['config'][] = [
    'name'        => 'displaytotalmember',
    'title'       => '_MI_XM_DISPLAYTOTALMEMBER',
    'description' => '_MI_XM_DISPLAYTOTALMEMBER_DSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
    'category'    => 'indexsearch',
];


$modversion['config'][] = [
    'name'        => 'displayavatar',
    'title'       => '_MI_XM_DISPLAYAVATAR',
    'description' => '_MI_XM_DISPLAYAVATAR_DSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
    'category'    => 'indexsearch',
];

$modversion['config'][] = [
    'name'        => 'displayrealname',
    'title'       => '_MI_XM_DISPLAYREALNAME',
    'description' => '_MI_XM_DISPLAYREALNAME_DSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
    'category'    => 'indexsearch',
];

$modversion['config'][] = [
    'name'        => 'displayemail',
    'title'       => '_MI_XM_DISPLAYEMAIL',
    'description' => '_MI_XM_DISPLAYEMAIL_DSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
    'category'    => 'indexsearch',
];

$modversion['config'][] = [
    'name'        => 'displaypm',
    'title'       => '_MI_XM_DISPLAYPM',
    'description' => '_MI_XM_DISPLAYPM_DSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
    'category'    => 'indexsearch',
];


$modversion['config'][] = [
    'name'        => 'displayurl',
    'title'       => '_MI_XM_DISPLAYURL',
    'description' => '_MI_XM_DISPLAYURL_DSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
    'category'    => 'indexsearch',
];


$modversion['config'][] = [
    'name'        => 'displayregdate',
    'title'       => '_MI_XM_DISPLAYREGDATE',
    'description' => '_MI_XM_DISPLAYREGDATE_DSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
    'category'    => 'indexsearch',
];

$modversion['config'][] = [
    'name'        => 'displayfrom',
    'title'       => '_MI_XM_DISPLAYFROM',
    'description' => '_MI_XM_DISPLAYFROM_DSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
    'category'    => 'indexsearch',
];

$modversion['config'][] = [
    'name'        => 'displayposts',
    'title'       => '_MI_XM_DISPLAYPOSTS',
    'description' => '_MI_XM_DISPLAYPOSTS_DSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0,
    'category'    => 'indexsearch',
];

$modversion['config'][] = [
    'name'        => 'displaylastlogin',
    'title'       => '_MI_XM_DISPLAYLASTLOGIN',
    'description' => '_MI_XM_DISPLAYLASTLOGIN_DSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
    'category'    => 'indexsearch',
];

$modversion['config'][] = [
    'name'        => 'displayoccupation',
    'title'       => '_MI_XM_DISPLAYOCC',
    'description' => '_MI_XM_DISPLAYOCC_DSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
    'category'    => 'indexsearch',
];

$modversion['config'][] = [
    'name'        => 'displayinterest',
    'title'       => '_MI_XM_DISPLAYINTEREST',
    'description' => '_MI_XM_DISPLAYINTEREST_DSC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
    'category'    => 'indexsearch',
];

