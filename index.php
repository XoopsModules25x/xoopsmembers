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
 */

$xoopsOption['template_main'] = 'xoopsmembers_index.tpl';
require_once __DIR__ . '/header.php';
//global $pathIcon16;

global $xoopsModule;

/** @var \XoopsMemberHandler $memberHandler */
$memberHandler = xoops_getHandler('member');
$total         = $memberHandler->getUserCount(new Criteria('level', 0, '>'));

$iamadmin = $xoopsUserIsAdmin;
$myts     = \MyTextSanitizer::getInstance();
$criteria = new \CriteriaCompo();

$criteria->add(new \Criteria('level', 0, '>'));
$validsort = ['uname', 'name', 'last_login', 'user_regdate', 'posts'];
$sort      = (!in_array($helper->getModule()->getInfo('sortmembers'), $validsort)) ? 'uname' : $helper->getModule()->getInfo('sortmembers');

$order = 'ASC';
$temp  = $helper->getModule()->getInfo('membersorder');
if (isset($temp) && 'DESC' == $temp) {
    $order = 'DESC';
}
$limit = \Xmf\Request::getInt('limit', 20, 'POST');
if (0 == $limit || $limit > 50) {
    $limit = 50;
}

$start = \Xmf\Request::getInt('start', 0, 'POST');
$total = $memberHandler->getUserCount($criteria);
$xoopsTpl->assign('totalmember', $total);

//Show last member
$result = $GLOBALS['xoopsDB']->query('SELECT uid, uname FROM ' . $GLOBALS['xoopsDB']->prefix('users') . ' WHERE level > 0 ORDER BY uid DESC', 1, 0);
list($latestuid, $latestuser) = $GLOBALS['xoopsDB']->fetchRow($result);
$xoopsTpl->assign('latestmember', " <a href='" . XOOPS_URL . '/userinfo.php?uid=' . $latestuid . "'>" . $latestuser . '</a>');
$xoopsTpl->assign('welcomemessage', $xoopsModuleConfig['welcomemessage']);

if (0 == $total) {
} elseif ($start < $total) {
    if ($iamadmin) {
        $xoopsTpl->assign('is_admin', true);
    }
    $criteria->setSort($sort);
    $criteria->setOrder($order);
    $criteria->setStart($start);
    $criteria->setLimit($limit);
    $foundusers = $memberHandler->getUsers($criteria, true);
    foreach (array_keys($foundusers) as $j) {
        $userdata['avatar']   = $foundusers[$j]->getVar('user_avatar');
        $userdata['realname'] = $foundusers[$j]->getVar('name');
        $userdata['name']     = $foundusers[$j]->getVar('uname');
        $userdata['id']       = $foundusers[$j]->getVar('uid');
        if (1 == $foundusers[$j]->getVar('user_viewemail') || $iamadmin) {
            $userdata['email'] = '<a href="mailto:' . $foundusers[$j]->getVar('email') . '"><img src="' . XOOPS_URL . '/images/icons/email.gif" border="0" alt="' . sprintf(_SENDEMAILTO, $foundusers[$j]->getVar('uname', 'e')) . '"></a>';
        } else {
            $userdata['email'] = '&nbsp;';
        }
        if ($xoopsUser) {
            $userdata['pmlink'] = '<a href="javascript:openWithSelfMain(\'' . XOOPS_URL . '/pmlite.php?send2=1&amp;to_userid=' . $foundusers[$j]->getVar('uid') . '\',\'pmlite\',450,370);"><img src="' . XOOPS_URL . '/images/icons/pm.gif" border="0" alt="' . sprintf(_SENDPMTO, $foundusers[$j]->getVar('uname', 'e')) . '"></a>';
        } else {
            $userdata['pmlink'] = '&nbsp;';
        }
        if ('' != $foundusers[$j]->getVar('url', 'e')) {
            $userdata['website'] = '<a href="' . $foundusers[$j]->getVar('url', 'e') . '" target="_blank"><img src="' . XOOPS_URL . '/images/icons/www.gif" border="0" alt="' . _VISITWEBSITE . '"></a>';
        } else {
            $userdata['website'] = '&nbsp;';
        }
        $userdata['registerdate'] = formatTimestamp($foundusers[$j]->getVar('user_regdate'), 's');
        if (0 != $foundusers[$j]->getVar('last_login')) {
            $userdata['lastlogin'] = formatTimestamp($foundusers[$j]->getVar('last_login'), 'm');
        } else {
            $userdata['lastlogin'] = '&nbsp;';
        }
        $userdata['posts'] = $foundusers[$j]->getVar('posts');
        if ($iamadmin) {
            $userdata['adminlink'] = '<a href="' . XOOPS_URL . '/modules/system/admin.php?fct=users&amp;uid=' . $foundusers[$j]->getVar('uid') . '&amp;op=users_edit">' . '<img src=' . $pathIcon16 . '/edit.png' . " alt='" . _EDIT . "' title='" . _EDIT . "'>"

                                     . '</a> <a href="' . XOOPS_URL . '/modules/system/admin.php?fct=users&amp;op=users_delete&amp;uid=' . $foundusers[$j]->getVar('uid') . '">' . '<img src=' . $pathIcon16 . '/delete.png' . " alt='" . _DELETE . "' title='" . _DELETE . "'>" . '</a>';
        }
        $xoopsTpl->append('users', $userdata);
    }

    $totalpages = ceil($total / $limit);
    if ($totalpages > 1) {
        $hiddenform = '<form name="findnext" action="index.php" method="post">';
        foreach ($_POST as $k => $v) {
            $hiddenform .= '<input type="hidden" name="' . $myts->htmlSpecialChars($k) . '" value="' . $myts->previewTarea($v) . '">';
        }
        if (!isset($_POST['limit'])) {
            $hiddenform .= '<input type="hidden" name="limit" value="' . $limit . '">';
        }
        if (!isset($_POST['start'])) {
            $hiddenform .= '<input type="hidden" name="start" value="' . $start . '">';
        }
        $prev = $start - $limit;
        if ($start - $limit >= 0) {
            $hiddenform .= '<a href="#0" onclick="javascript:document.findnext.start.value=' . $prev . ';document.findnext.submit();">' . _MD_XOOPSMEMBERS_PREVIOUS . '</a>&nbsp;';
        }
        $counter     = 1;
        $currentpage = ($start + $limit) / $limit;
        while ($counter <= $totalpages) {
            if ($counter == $currentpage) {
                $hiddenform .= '<b>' . $counter . '</b> ';
            } elseif (($counter > $currentpage - 4 && $counter < $currentpage + 4) || 1 == $counter || $counter == $totalpages) {
                if ($counter == $totalpages && $currentpage < $totalpages - 4) {
                    $hiddenform .= '... ';
                }
                $hiddenform .= '<a href="#' . $counter . '" onclick="javascript:document.findnext.start.value=' . ($counter - 1) * $limit . ';document.findnext.submit();">' . $counter . '</a> ';
                if (1 == $counter && $currentpage > 5) {
                    $hiddenform .= '... ';
                }
            }
            $counter++;
        }
        $next = $start + $limit;
        if ($total > $next) {
            $hiddenform .= '&nbsp;<a href="#' . $total . '" onclick="javascript:document.findnext.start.value=' . $next . ';document.findnext.submit();">' . _MD_XOOPSMEMBERS_NEXT . '</a>';
        }
        $hiddenform .= '</form>';
        $xoopsTpl->assign('pagenav', $hiddenform);
        $xoopsTpl->assign('lang_numfound', sprintf(_MD_XOOPSMEMBERS_USERSFOUND, $total));
    }
}

include 'footer.php';
include_once XOOPS_ROOT_PATH . '/footer.php';
exit();

/**
 * xoops_Criteria()
 *
 * @param        $criteria
 * @param string $name
 * @param string $ret
 * @param string $match
 * @return void
 */
function xoops_Criteria(&$criteria, $name = '', $ret = '', $match = '')
{
    global $criteria;

    switch ($match) {
        case XOOPS_MATCH_START:
            $criteria->add(new \Criteria($name, $ret . '%', 'LIKE'));
            break;
        case XOOPS_MATCH_END:
            $criteria->add(new \Criteria($name, '%' . $ret . '%', 'LIKE'));
            break;
        case XOOPS_MATCH_EQUAL:
            $criteria->add(new \Criteria($name, $ret));
            break;
        case XOOPS_MATCH_CONTAIN:
            $criteria->add(new \Criteria($name, '%' . $ret . '%', 'LIKE'));
            break;
    }
}
