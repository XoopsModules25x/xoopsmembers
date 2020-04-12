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
 * @copyright The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license   http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package   Xoops Members
 * @since     2.3.0
 * @author    onokazu
 * @author    John Neill
 */

require_once  __DIR__ . '/header.php';

global $xoopsModule;

$op = (isset($_POST['op']) && 'submit' == $_POST['op']) ? 'submit' : 'form';
/** @var \XoopsMemberHandler $memberHandler */
$memberHandler = xoops_getHandler('member');

if ('form' == $op) {
    $xoopsOption['template_main'] = 'xoopsmembers_searchform.tpl';
    include XOOPS_ROOT_PATH . '/header.php';

    $total          = $memberHandler->getUserCount(new Criteria('level', 0, '>'));

    include_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

    $form        = new XoopsThemeForm('', 'searchform', 'searchmembers.php');
    $uname_text  = new XoopsFormText('', 'user_uname', 30, 60);
    $uname_match = new XoopsFormSelectMatchOption('', 'user_uname_match');
    $uname_tray  = new XoopsFormElementTray(_MD_XOOPSMEMBERS_UNAME, '&nbsp;');
    $uname_tray->addElement($uname_match);
    $uname_tray->addElement($uname_text);
    $form->addElement($uname_tray);

    if (1 == $xoopsModuleConfig['displayrealname']){
    $name_text  = new XoopsFormText('', 'user_name', 30, 60);
    $name_match = new XoopsFormSelectMatchOption('', 'user_name_match');
    $name_tray  = new XoopsFormElementTray(_MD_XOOPSMEMBERS_REALNAME, '&nbsp;');
    $name_tray->addElement($name_match);
    $name_tray->addElement($name_text);
    $form->addElement($name_tray);
    }

    if (1 == $xoopsModuleConfig['displayemail']){
    $email_text  = new XoopsFormText('', 'user_email', 30, 60);
    $email_match = new XoopsFormSelectMatchOption('', 'user_email_match');
    $email_tray  = new XoopsFormElementTray(_MD_XOOPSMEMBERS_EMAIL, '&nbsp;');
    $email_tray->addElement($email_match);
    $email_tray->addElement($email_text);
    $form->addElement($email_tray);
    }

    if (1 == $xoopsModuleConfig['displayurl']){
    $form->addElement(new XoopsFormText(_MD_XOOPSMEMBERS_URLC, 'user_url', 30, 100));
    }
    if (1 == $xoopsModuleConfig['displayfrom']){
    $form->addElement(new XoopsFormText(_MD_XOOPSMEMBERS_LOCATION, 'user_from', 30, 100));
    }
    if (1 == $xoopsModuleConfig['displayoccupation']){
    $form->addElement(new XoopsFormText(_MD_XOOPSMEMBERS_OCCUPATION, 'user_occ', 30, 100));
    }
    if (1 == $xoopsModuleConfig['displayinterest']){
    $form->addElement(new XoopsFormText(_MD_XOOPSMEMBERS_INTEREST, 'user_intrest', 30, 100));
    }
    if (1 == $xoopsModuleConfig['displaylastlogin']){
    $form->addElement(new XoopsFormText(_MD_XOOPSMEMBERS_LASTLOGMORE, 'user_lastlog_more', 10, 5));
    $form->addElement(new XoopsFormText(_MD_XOOPSMEMBERS_LASTLOGLESS, 'user_lastlog_less', 10, 5));
    }
    if (1 == $xoopsModuleConfig['displayregdate']){
    $form->addElement(new XoopsFormText(_MD_XOOPSMEMBERS_REGMORE, 'user_reg_more', 10, 5));
    $form->addElement(new XoopsFormText(_MD_XOOPSMEMBERS_REGLESS, 'user_reg_less', 10, 5));
    }
    if (1 == $xoopsModuleConfig['displayposts']){
    $form->addElement(new XoopsFormText(_MD_XOOPSMEMBERS_POSTSMORE, 'user_posts_more', 10, 5));
    $form->addElement(new XoopsFormText(_MD_XOOPSMEMBERS_POSTSLESS, 'user_posts_less', 10, 5));
    }

    $sort_select = new XoopsFormSelect(_MD_XOOPSMEMBERS_SORT, 'user_sort');
    $sort_select->addOptionArray(['uname' => _MD_XOOPSMEMBERS_UNAME, 'name' => _MD_XOOPSMEMBERS_REALNAME, 'last_login' => _MD_XOOPSMEMBERS_LASTLOGIN, 'user_regdate' => _MD_XOOPSMEMBERS_REGDATE, 'posts' => _MD_XOOPSMEMBERS_POSTS]);
    $form->addElement($sort_select);

    $order_select = new XoopsFormSelect(_MD_XOOPSMEMBERS_ORDER, 'user_order');
    $order_select->addOptionArray(['ASC' => _MD_XOOPSMEMBERS_ASC, 'DESC' => _MD_XOOPSMEMBERS_DESC]);
    $form->addElement($order_select);

    $form->addElement(new XoopsFormText(_MD_XOOPSMEMBERS_LIMIT, 'limit', 6, 2));
    $form->addElement(new XoopsFormHidden('op', 'submit'));
    $form->addElement(new XoopsFormButton('', 'user_submit', _SUBMIT, 'submit'));
    $form->assign($xoopsTpl);
    $xoopsTpl->assign('totalmember', $total);
}

if ('submit' == $op) {
    $xoopsOption['template_main'] = 'xoopsmembers_searchresults.tpl';
    include XOOPS_ROOT_PATH . '/header.php';

    $iamadmin = $xoopsUserIsAdmin;
    $myts     = MyTextSanitizer::getInstance();
    $criteria = new CriteriaCompo();

    if (!empty($_POST['user_uname'])) {
        $match = (!empty($_POST['user_uname_match'])) ? (int)$_POST['user_uname_match'] : XOOPS_MATCH_START;
        $ret   = $myts->addSlashes(trim($_POST['user_uname']));
        xoops_Criteria($criteria, 'uname', $ret, $match);
    }

    if (!empty($_POST['user_name'])) {
        $match = (!empty($_POST['user_name_match'])) ? (int)$_POST['user_name_match'] : XOOPS_MATCH_START;
        $ret   = $myts->addSlashes(trim($_POST['user_uname']));
        xoops_Criteria($criteria, 'name', $ret, $match);
    }

    if (!empty($_POST['user_email'])) {
        $match = (!empty($_POST['user_email_match'])) ? (int)$_POST['user_email_match'] : XOOPS_MATCH_START;
        $ret   = $myts->addSlashes(trim($_POST['user_email']));
        xoops_Criteria($criteria, 'name', $ret, $match);
        if (!$iamadmin) {
            $criteria->add(new Criteria('user_viewemail', 1));
        }
    }

    if (!empty($_POST['user_url'])) {
        $url = formatURL(trim($_POST['user_url']));
        $criteria->add(new Criteria('url', $myts->addSlashes($url) . '%', 'LIKE'));
    }

    if (!empty($_POST['user_from'])) {
        $criteria->add(new Criteria('user_from', '%' . $myts->addSlashes(trim($_POST['user_from'])) . '%', 'LIKE'));
    }

    if (!empty($_POST['user_intrest'])) {
        $criteria->add(new Criteria('user_intrest', '%' . $myts->addSlashes(trim($_POST['user_intrest'])) . '%', 'LIKE'));
    }

    if (!empty($_POST['user_occ'])) {
        $criteria->add(new Criteria('user_occ', '%' . $myts->addSlashes(trim($_POST['user_occ'])) . '%', 'LIKE'));
    }

    if (!empty($_POST['user_lastlog_more']) && is_numeric($_POST['user_lastlog_more'])) {
        $f_user_lastlog_more = (int)trim($_POST['user_lastlog_more']);
        $time                = time() - (60 * 60 * 24 * $f_user_lastlog_more);
        if ($time > 0) {
            $criteria->add(new Criteria('last_login', $time, '<'));
        }
    }

    if (!empty($_POST['user_lastlog_less']) && is_numeric($_POST['user_lastlog_less'])) {
        $f_user_lastlog_less = (int)trim($_POST['user_lastlog_less']);
        $time                = time() - (60 * 60 * 24 * $f_user_lastlog_less);
        if ($time > 0) {
            $criteria->add(new Criteria('last_login', $time, '>'));
        }
    }

    if (!empty($_POST['user_reg_more']) && is_numeric($_POST['user_reg_more'])) {
        $f_user_reg_more = (int)trim($_POST['user_reg_more']);
        $time            = time() - (60 * 60 * 24 * $f_user_reg_more);
        if ($time > 0) {
            $criteria->add(new Criteria('user_regdate', $time, '<'));
        }
    }

    if (!empty($_POST['user_reg_less']) && is_numeric($_POST['user_reg_less'])) {
        $f_user_reg_less = (int)$_POST['user_reg_less'];
        $time            = time() - (60 * 60 * 24 * $f_user_reg_less);
        if ($time > 0) {
            $criteria->add(new Criteria('user_regdate', $time, '>'));
        }
    }

    if (isset($_POST['user_posts_more']) && is_numeric($_POST['user_posts_more'])) {
        $criteria->add(new Criteria('posts', (int)$_POST['user_posts_more'], '>'));
    }

    if (!empty($_POST['user_posts_less']) && is_numeric($_POST['user_posts_less'])) {
        $criteria->add(new Criteria('posts', (int)$_POST['user_posts_less'], '<'));
    }

    $criteria->add(new Criteria('level', 0, '>'));
    $validsort = ['uname', 'email', 'last_login', 'user_regdate', 'posts'];
    $sort      = (!in_array($_POST['user_sort'], $validsort)) ? 'uname' : $_POST['user_sort'];
    $order     = 'ASC';
    if (isset($_POST['user_order']) && 'DESC' == $_POST['user_order']) {
        $order = 'DESC';
    }
    $limit = (!empty($_POST['limit'])) ? (int)$_POST['limit'] : 20;
    if (0 == $limit || $limit > 50) {
        $limit = 50;
    }

    $start          = (!empty($_POST['start'])) ? (int)$_POST['start'] : 0;
    $total          = $memberHandler->getUserCount($criteria);
    $xoopsTpl->assign('total_found', $total);

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
                $userdata['email'] = '<a href="mailto:' . $foundusers[$j]->getVar('email') . '"><img src="' . XOOPS_URL . '/images/icons/email.gif" border="0" alt="' . sprintf(_SENDEMAILTO, $foundusers[$j]->getVar('uname', 'e')) . '" ></a>';
            } else {
                $userdata['email'] = '&nbsp;';
            }
            if ($xoopsUser) {
                $userdata['pmlink'] = '<a href="javascript:openWithSelfMain(\'' . XOOPS_URL . '/pmlite.php?send2=1&amp;to_userid=' . $foundusers[$j]->getVar('uid') . '\',\'pmlite\',450,370);"><img src="' . XOOPS_URL . '/images/icons/pm.gif" border="0" alt="' . sprintf(_SENDPMTO, $foundusers[$j]->getVar('uname', 'e')) . '" ></a>';
            } else {
                $userdata['pmlink'] = '&nbsp;';
            }
            if ('' != $foundusers[$j]->getVar('url', 'e')) {
                $userdata['website'] = '<a href="' . $foundusers[$j]->getVar('url', 'e') . '" target="_blank"><img src="' . XOOPS_URL . '/images/icons/www.gif" border="0" alt="' . _VISITWEBSITE . '" ></a>';
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
                $userdata['adminlink'] = '<a href="' . XOOPS_URL . '/modules/system/admin.php?fct=users&amp;uid=' . $foundusers[$j]->getVar('uid') . '&amp;op=users_edit">' . '<img src=' . $pathIcon16 . '/edit.png' . " alt='" . _EDIT . "' title='" . _EDIT . "' >"

                                         . '</a>  <a href="' . XOOPS_URL . '/modules/system/admin.php?fct=users&amp;op=users_delete&amp;uid=' . $foundusers[$j]->getVar('uid') . '">' . '<img src=' . $pathIcon16 . '/delete.png' . " alt='" . _DELETE . "' title='" . _DELETE . "' >" . '</a>';
            }
            $xoopsTpl->append('users', $userdata);
        }

        $totalpages = ceil($total / $limit);
        if ($totalpages > 1) {
            $hiddenform = '<form name="findnext" action="searchmembers.php" method="post">';
            foreach ($_POST as $k => $v) {
                $hiddenform .= '<input type="hidden" name="' . $myts->htmlSpecialChars($k) . '" value="' . $myts->previewTarea($v) . '" >';
            }
            if (!isset($_POST['limit'])) {
                $hiddenform .= '<input type="hidden" name="limit" value="' . $limit . '" >';
            }
            if (!isset($_POST['start'])) {
                $hiddenform .= '<input type="hidden" name="start" value="' . $start . '" >';
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
}

require __DIR__ . '/footer.php';
require_once XOOPS_ROOT_PATH . '/footer.php';
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
            $criteria->add(new Criteria($name, $ret . '%', 'LIKE'));
            break;
        case XOOPS_MATCH_END:
            $criteria->add(new Criteria($name, '%' . $ret . '%', 'LIKE'));
            break;
        case XOOPS_MATCH_EQUAL:
            $criteria->add(new Criteria($name, $ret));
            break;
        case XOOPS_MATCH_CONTAIN:
            $criteria->add(new Criteria($name, '%' . $ret . '%', 'LIKE'));
            break;
    }
}
