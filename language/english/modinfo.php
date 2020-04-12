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
defined('XOOPS_ROOT_PATH') || exit('Restricted access');

/**
 * Module Menu Items
 */
define('_MI_XOOPSMEMBERS_NAME', 'Members');
define('_MI_XOOPSMEMBERS_DESC', 'Shows a list of registered users');

// 1.03

define('_MI_XOOPSMEMBERS_MEMBERSLIST', 'Members List');
define('_MI_XOOPSMEMBERS_SEARCH', 'Search Members');
define('_MI_XOOPSMEMBERS_ADVANCEDSEARCH', 'Advanced Member Search');
define('_MI_XOOPSMEMBERS_CONFCAT_INDEX', 'Member List Index');
define('_MI_XOOPSMEMBERS_CONFCAT_INDEX_DSC', 'Index List');
define('_MI_XOOPSMEMBERS_CONFCAT_INDEXPAGE', '<b>:: Index Page Section :: </b>');
define('_MI_XOOPSMEMBERS_CONFCAT_INDEXPAGEDSC', 'Index List');
define('_MI_XOOPSMEMBERS_CONFCAT_INDEXSEARCH', 'Index and Search Members');
define('_MI_XOOPSMEMBERS_CONFCAT_INDEXSEARCH_DSC', 'Index and Search Members');
define('_MI_XOOPSMEMBERS_CONFCAT_INDEXSEARCHPAGE', '<b>:: Index Page and Search Members Section :: </b>');
define('_MI_XOOPSMEMBERS_CONFCAT_INDEXSEARCHPAGEDSC', 'Index and Search Members');
define('_MI_XOOPSMEMBERS_INDEXMPAGE', 'Member per page');
define('_MI_XOOPSMEMBERS_INDEXMPAGE_DSC', 'How many members will we show per page in index page ?');
define('_MI_XOOPSMEMBERS_INDEXSORT', 'Sort By Option');
define('_MI_XOOPSMEMBERS_INDEXSORT_DSC', 'Sorting option for the members list in index page?');
define('_MI_XOOPSMEMBERS_INDEXORDER', 'Order By Option');
define('_MI_XOOPSMEMBERS_INDEXORDER_DSC', 'Order by option for the members list in index page?');
define('_MI_XOOPSMEMBERS_REALNAME', 'Real Name');
define('_MI_XOOPSMEMBERS_REGDATE', 'Joined Date');
define('_MI_XOOPSMEMBERS_EMAIL', 'Email');
define('_MI_XOOPSMEMBERS_UNAME', 'User Name');
define('_MI_XOOPSMEMBERS_LASTLOGIN', 'Last login');
define('_MI_XOOPSMEMBERS_POSTS', 'Number of posts');
define('_MI_XOOPSMEMBERS_ORDER_ASC', 'Ascending order');
define('_MI_XOOPSMEMBERS_ORDER_DESC', 'Descending order');
define('_MI_XOOPSMEMBERS_DISPLAYREALNAME', 'Display Real Name');
define('_MI_XOOPSMEMBERS_DISPLAYREALNAME_DSC', 'Hide or Display Members Real Name');
define('_MI_XOOPSMEMBERS_DISPLAYEMAIL', 'Display Email');
define('_MI_XOOPSMEMBERS_DISPLAYEMAIL_DSC', 'Hide or Display Members Email');
define('_MI_XOOPSMEMBERS_DISPLAYPM', 'Display Private Message Button');
define('_MI_XOOPSMEMBERS_DISPLAYPM_DSC', 'Hide or Display Private Message Button');
define('_MI_XOOPSMEMBERS_DISPLAYURL', 'Display Website URL');
define('_MI_XOOPSMEMBERS_DISPLAYURL_DSC', 'Hide or Display Members Website URL Field');
define('_MI_XOOPSMEMBERS_DISPLAYAVATAR', 'Display Avatar');
define('_MI_XOOPSMEMBERS_DISPLAYAVATAR_DSC', 'Hide or Display Members Avatar');
define('_MI_XOOPSMEMBERS_DISPLAYREGDATE', 'Display Joined Date');
define('_MI_XOOPSMEMBERS_DISPLAYREGDATE_DSC', 'Hide or Display Members Joined Date');
define('_MI_XOOPSMEMBERS_DISPLAYFROM', 'Display From/Location');
define('_MI_XOOPSMEMBERS_DISPLAYFROM_DSC', 'Hide or Display Members From/Location');
define('_MI_XOOPSMEMBERS_DISPLAYPOSTS', 'Display Comment/Post Total');
define('_MI_XOOPSMEMBERS_DISPLAYPOSTS_DSC', 'Hide or Display Members Comment/Post Level');
define('_MI_XOOPSMEMBERS_DISPLAYLASTLOGIN', 'Display Last Login');
define('_MI_XOOPSMEMBERS_DISPLAYLASTLOGIN_DSC', 'Hide or Display Members Last Login');
define('_MI_XOOPSMEMBERS_DISPLAYOCC', 'Display Occupation');
define('_MI_XOOPSMEMBERS_DISPLAYOCC_DSC', 'Hide or Display Members Occupation');
define('_MI_XOOPSMEMBERS_DISPLAYINTEREST', 'Display Interest');
define('_MI_XOOPSMEMBERS_DISPLAYINTEREST_DSC', 'Hide or Display Members Interest');
//Menu
define('_MI_XOOPSMEMBERS_MENU_HOME', 'Home');
define('_MI_XOOPSMEMBERS_MENU_01', 'Admin');
define('_MI_XOOPSMEMBERS_MENU_ABOUT', 'About');

//Config
define('MI_XOOPSMEMBERS_EDITOR_ADMIN', 'Editor: Admin');
define('MI_XOOPSMEMBERS_EDITOR_ADMIN_DESC', 'Select the Editor to use by the Admin');
define('MI_XOOPSMEMBERS_EDITOR_USER', 'Editor: User');
define('MI_XOOPSMEMBERS_EDITOR_USER_DESC', 'Select the Editor to use by the User');

//Help
define('_MI_XOOPSMEMBERS_DIRNAME', basename(dirname(dirname(__DIR__))));
define('_MI_XOOPSMEMBERS_HELP_HEADER', __DIR__ . '/help/helpheader.tpl');
define('_MI_XOOPSMEMBERS_BACK_2_ADMIN', 'Back to Administration of ');
define('_MI_XOOPSMEMBERS_OVERVIEW', 'Overview');

//define('_MI_XOOPSMEMBERS_HELP_DIR', __DIR__);

//help multi-page
define('_MI_XOOPSMEMBERS_DISCLAIMER', 'Disclaimer');
define('_MI_XOOPSMEMBERS_LICENSE', 'License');
define('_MI_XOOPSMEMBERS_SUPPORT', 'Support');

define('_MI_XOOPSMEMBERS_HOME', 'Home');
define('_MI_XOOPSMEMBERS_ABOUT', 'About');
