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

$modversion = array( 'name' => _XO_MI_MEMBERS_NAME,
    'description' => _XO_MI_MEMBERS_DESC,
    'author' => 'John Neill, Kazumi Ono',
    'license' => 'GNU GPL 2.0',
    'license_url' => "www.gnu.org/licenses/gpl-2.0.html",
    'help' => 'page=help',
    'contributors' => '',
    'credits' => 'The Xoops Module Development Team',
    'version' => 1.02,
    'module_status' => "Final",
//	'releasedate' => 'Friday 10.4.2009',
    'official' => 1,
    'image' => 'images/slogo.png',
    'dirname' => basename( dirname( __FILE__ ) ),
    'dirmoduleadmin' => '/Frameworks/moduleclasses/moduleadmin',
    'icons16' =>  '../../Frameworks/moduleclasses/icons/16',
    'icons32' =>  '../../Frameworks/moduleclasses/icons/32',

    //about
    'author_website_url' => 'http://xoops.org',
    'author_website_name' => 'XOOPS',
    'module_website_url' => 'http://xoops.org',
    'module_website_name' => 'XOOPS',
    'release_date' => '2013/04/29',
    'min_php' => '5.2.0',
    'min_xoops' => '2.5.6',
    'min_db' => array('mysql'=>'5.0.7', 'mysqli'=>'5.0.7'),
    'min_admin' => '1.1'
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
$modversion['hasMain'] = 1;

/**
 * Module Templates
 */
$modversion['templates'][] = array( 'file' => 'xoopsmembers_searchform.html',
    'description' => ''
    );
$modversion['templates'][] = array( 'file' => 'xoopsmembers_searchresults.html',
    'description' => ''
    );
