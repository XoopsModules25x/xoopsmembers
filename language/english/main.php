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

define('_MD_XOOPSMEMBERS_SEARCH', 'Search Members');
define('_MD_XOOPSMEMBERS_AVATAR', 'Avatar');
define('_MD_XOOPSMEMBERS_REALNAME', 'Real Name');
define('_MD_XOOPSMEMBERS_REGDATE', 'Joined Date');
define('_MD_XOOPSMEMBERS_EMAIL', 'Email');
define('_MD_XOOPSMEMBERS_PM', 'PM');
define('_MD_XOOPSMEMBERS_URL', 'Website URL');
define('_MD_XOOPSMEMBERS_ADMIN', 'Admin');
define('_MD_XOOPSMEMBERS_PREVIOUS', 'Previous');
define('_MD_XOOPSMEMBERS_NEXT', 'Next');
define('_MD_XOOPSMEMBERS_USERSFOUND', '%s member(s) found');
define('_MD_XOOPSMEMBERS_TOTALUSERS', 'Total Members: ');
define('_MD_XOOPSMEMBERS_NOFOUND', 'No Members Found');
define('_MD_XOOPSMEMBERS_UNAME', 'User Name');
define('_MD_XOOPSMEMBERS_LOCATIONCONTAINS', 'Location contains');
define('_MD_XOOPSMEMBERS_OCCUPATIONCONTAINS', 'Occupation contains');
define('_MD_XOOPSMEMBERS_INTERESTCONTAINS', 'Interest contains');
define('_MD_XOOPSMEMBERS_URLCONTAINS', 'Website URL contains');
define('_MD_XOOPSMEMBERS_LASTLOGMORE', 'Last login is more than <span style=\'color:#ff0000;\'>X</span> days ago');
define('_MD_XOOPSMEMBERS_LASTLOGLESS', 'Last login is less than <span style=\'color:#ff0000;\'>X</span> days ago');
define('_MD_XOOPSMEMBERS_REGMORE', 'Joined date is more than <span style=\'color:#ff0000;\'>X</span> days ago');
define('_MD_XOOPSMEMBERS_REGLESS', 'Joined date is less than <span style=\'color:#ff0000;\'>X</span> days ago');
define('_MD_XOOPSMEMBERS_POSTSMORE', 'Number of Posts is greater than <span style=\'color:#ff0000;\'>X</span>');
define('_MD_XOOPSMEMBERS_POSTSLESS', 'Number of Posts is less than <span style=\'color:#ff0000;\'>X</span>');
define('_MD_XOOPSMEMBERS_SORT', 'Sort by');
define('_MD_XOOPSMEMBERS_ORDER', 'Order');
define('_MD_XOOPSMEMBERS_LASTLOGIN', 'Last Login');
define('_MD_XOOPSMEMBERS_POSTS', 'Number of Posts');
define('_MD_XOOPSMEMBERS_ASC', 'Ascending order');
define('_MD_XOOPSMEMBERS_DESC', 'Descending order');
define('_MD_XOOPSMEMBERS_LIMIT', 'Number of members per page');
define('_MD_XOOPSMEMBERS_RESULTS', 'Search results');

// 1.03
define('_MD_XOOPSMEMBERS_MEMBERSLIST', 'Members List');
define('_MD_XOOPSMEMBERS_LATESTMEMBER', 'Latest Member');
define('_MD_XOOPSMEMBERS_WELCOMETO', 'Welcome to Members Directory');
define('_MD_XOOPSMEMBERS_NEVERLOGIN', 'Never Login');
define('_MD_XOOPSMEMBERS_MEMBERSINCE', 'Member Since');
define('_MD_XOOPSMEMBERS_LOCATION', 'Location');
define('_MD_XOOPSMEMBERS_OCCUPATION', 'Occupation');
define('_MD_XOOPSMEMBERS_INTEREST', 'Interest');
define('_MD_XOOPSMEMBERS_CONTACT', 'Contact');
define('_MD_XOOPSMEMBERS_ONLINESTATUS', 'Online Status');
define('_MD_XOOPSMEMBERS_ONLINE', 'Online');
define('_MD_XOOPSMEMBERS_OFFLINE', 'Offline');
define('_MD_XOOPSMEMBERS_SIGNATURE', 'Signature');
define('_MD_XOOPSMEMBERS_BIOGRAPHY', 'Biography');
define('_MD_XOOPSMEMBERS_EXTRAINFO', 'Extra Information');
define('_MD_XOOPSMEMBERS_GROUP', 'Group');
define('_MD_XOOPSMEMBERS_PRIVATEMESSAGE', 'Private Message');
define('_MD_XOOPSMEMBERS_WEBSITE', 'Website');
define('_MD_XOOPSMEMBERS_WWW', 'WWW');
define('_MD_XOOPSMEMBERS_EXTRAINFOCONTAINS', 'Extra Info Contains');
define('_MD_XOOPSMEMBERS_BIOGRAPHYINFOCONTAINS', 'Biography Contains');
define('_MD_XOOPSMEMBERS_SIGNATURECONTAINS', 'Signature Contains');

//rank.php
define('_MD_XOOPSMEMBERS_USERRANK', 'Members Rank');
define('_MD_XOOPSMEMBERS_MRANK', 'System Members Ranks');
define('_MD_XOOPSMEMBERS_RANK', 'Rank');
define('_MD_XOOPSMEMBERS_SRANK', 'Special Rank');
define('_MD_XOOPSMEMBERS_MINPOST', 'Minimum Post');
define('_MD_XOOPSMEMBERS_MAXPOST', 'Maximum Post');
define('_MD_XOOPSMEMBERS_IMAGE', 'Image');

//Data Tables
define('_MD_XOOPSMEMBERS_DTDECIMAL', '');
define('_MD_XOOPSMEMBERS_DTEMPTYTABLE', 'No data available in table');
define('_MD_XOOPSMEMBERS_DTINFOSHOWING', 'Showing');
define('_MD_XOOPSMEMBERS_DTINFOTO', 'to');
define('_MD_XOOPSMEMBERS_DTINFOOF', 'of');
define('_MD_XOOPSMEMBERS_DTINFOENTRIES', 'entries');
define('_MD_XOOPSMEMBERS_DTINFOEMPTY', 'Showing 0 to 0 of 0 entries');
define('_MD_XOOPSMEMBERS_DTINFOFILTEREDFROM', 'filtered from');
define('_MD_XOOPSMEMBERS_DTINFOFILTEREDTOTALENTRIES', 'total entries');
define('_MD_XOOPSMEMBERS_DTINFOPOSTFIX', '');
define('_MD_XOOPSMEMBERS_DTTHOUSANDS', ',');
define('_MD_XOOPSMEMBERS_DTLENGTHMENUSHOW', 'Show');
define('_MD_XOOPSMEMBERS_DTLENGTHMENUENTRIES', 'entries');
define('_MD_XOOPSMEMBERS_DTLOADINGRECORDS', 'Loading...');
define('_MD_XOOPSMEMBERS_DTPROCESSING', 'Processing...');
define('_MD_XOOPSMEMBERS_DTSEARCH', 'Search');
define('_MD_XOOPSMEMBERS_DTZERORECORDS', 'No matching records found');
define('_MD_XOOPSMEMBERS_DTFIRST', 'First');
define('_MD_XOOPSMEMBERS_DTLAST', 'Last');
define('_MD_XOOPSMEMBERS_DTNEXT', 'Next');
define('_MD_XOOPSMEMBERS_DTPREVIOUS', 'Previous');
define('_MD_XOOPSMEMBERS_DTSORTASCENDING', ': activate to sort column ascending');
define('_MD_XOOPSMEMBERS_DTSORTDESCENSING', ': activate to sort column descending');
