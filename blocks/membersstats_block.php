<?php
//  Author: SMD & Trabis
//  URL: http://www.xoopsmalaysia.org  & http://www.xuups.com
//  E-Mail: webmaster@xoopsmalaysia.org  & lusopoemas@gmail.com

if( ! defined( 'XOOPS_ROOT_PATH' ) ) exit ;

/**
 * @param $options
 * @return array|bool
 */
function show_membersstats_block($options) {
    global $xoopsConfig, $xoopsUser, $xoopsModule, $xoopsDB, $_SERVER;
    /* @var XoopsOnlineHandler $online_handler */
    $online_handler = xoops_getHandler('online');
    // set gc probabillity to 10% for now..
    if (mt_rand(1, 100) < 11) {
        $online_handler->gc(300);
    }
    if (is_object($xoopsUser)) {
        $uid   = $xoopsUser->getVar('uid');
        $uname = $xoopsUser->getVar('uname');
    } else {
        $uid   = 0;
        $uname = '';
    }
    $requestIp = \Xmf\IPAddress::fromRequest()->asReadable();
    $requestIp = (false === $requestIp) ? '0.0.0.0' : $requestIp;
    if (is_object($xoopsModule)) {
        $online_handler->write($uid, $uname, time(), $xoopsModule->getVar('mid'), $requestIp);
    } else {
        $online_handler->write($uid, $uname, time(), 0, $requestIp);
    }
    $onlines = $online_handler->getAll();
    if (!empty($onlines)) {
        $total   = count($onlines);
        $block   = [];
        $guests  = 0;
        $members = '';
        for ($i = 0; $i < $total; ++$i) {
            if ($onlines[$i]['online_uid'] > 0) {
                $members .= ' <a href="' . XOOPS_URL . '/userinfo.php?uid=' . $onlines[$i]['online_uid'] . '" title="' . $onlines[$i]['online_uname'] . '">' . $onlines[$i]['online_uname'] . '</a>,';
            } else {
                ++$guests;
            }
        }
        $block['online_total'] = sprintf(_ONLINEPHRASE, $total);
        if (is_object($xoopsModule)) {
            $mytotal = $online_handler->getCount(new Criteria('online_module', $xoopsModule->getVar('mid')));
            $block['online_total'] .= ' (' . sprintf(_ONLINEPHRASEX, $mytotal, $xoopsModule->getVar('name')) . ')';
        }
        // Membership Statistic
        $member_handler =xoops_getHandler('member');
        $today = formatTimestamp(time());
        $level_criteria = new Criteria('level', 0, '>');
        $criteria = new CriteriaCompo($level_criteria);
        $criteria24 = new CriteriaCompo($level_criteria);
        $criteria48 = new CriteriaCompo($level_criteria);
        $total_active_users = $member_handler->getUserCount($level_criteria);
        //Fixing stats for last 24 and 48 hours
        $users_reg_24 = $member_handler->getUserCount($criteria24->add(new Criteria('user_regdate', (mktime(0,0,0)-(24*3600)), '>=')),'AND');
        $users_reg_48 = $member_handler->getUserCount($criteria48->add(new Criteria('user_regdate', (mktime(0,0,0)-(48*3600)), '>=')),'AND');
        $limit = 1;
        $criteria->setOrder('DESC');
        $criteria->setSort('user_regdate');
        $criteria->setLimit($limit);
        $lastmembers =$member_handler->getUsers($criteria);
        $lastusername = $lastmembers[0]->getVar('uname');
        $lastrealname = $lastmembers[0]->getVar('name');
        $lastid = $lastmembers[0]->getVar('uid');
        
        //Total Post Count
        $sql = 'SELECT SUM(posts) AS totalposts FROM ' . $GLOBALS['xoopsDB']->prefix('users') . ' WHERE level > 0';
        $result = $GLOBALS['xoopsDB']->query($sql);
        $myrow = $GLOBALS['xoopsDB']->fetchArray($result);     
        $block['totalposts']=$myrow['totalposts'];
        
        // data
        $block['activeusers'] = $total_active_users;
        $block['todayreg'] = $users_reg_24;
        $block['yesterdayreg'] = $users_reg_48 - $users_reg_24;
        $block['online_names']   = $members;
        $block['online_members'] = $total - $guests;
        $block['online_guests']  = $guests; 
        $block['lang_more']      = _MB_XOOPSMEMBERS_MORE;
        
        $block['total_online'] = $total;
        
        if ('1' == $options[4] && '' != $lastrealname)
          {
            $block['latestmember'] = $lastrealname; 
          }
        else {    
            $block['latestmember'] = $lastusername;
             }
        $block['latest_id'] = $lastid;
        

        // Language Definition
        $block['membership_lang'] = _MB_XOOPSMEMBERS_MEMBERSHIP;
        $block['today_lang'] = _MB_XOOPSMEMBERS_TODAY;
        $block['yesterday_lang'] = _MB_XOOPSMEMBERS_YESTERDAY;
        $block['overall_lang'] = _MB_XOOPSMEMBERS_OVERALL;
        $block['online_lang'] = _MB_XOOPSMEMBERS_ONLINE;
        $block['guests_lang'] = _MB_XOOPSMEMBERS_GUESTS;
        $block['members_lang'] = _MB_XOOPSMEMBERS_MEMBERS;
        $block['total_lang'] = _MB_XOOPSMEMBERS_TOTAL;
        $block['list_lang'] = _MB_XOOPSMEMBERS_LIST;
        $block['popup_lang'] = _MB_XOOPSMEMBERS_POPUP;
        $block['latest_lang'] = _MB_XOOPSMEMBERS_LATEST;
        $block['totalpostmade_lang'] =_MB_XOOPSMEMBERS_TOTALPOSTMADE;
        $block['totalposts_lang'] =_MB_XOOPSMEMBERS_TOTALPOSTS;
        $block['totalpost_lang']  =_MB_XOOPSMEMBERS_TOTALPOST;
        $block['wehave_lang'] =_MB_XOOPSMEMBERS_WEHAVE;
        $block['currentonline_lang'] =_MB_XOOPSMEMBERS_CURRENTONLINE;
        $block['registeredmembers_lang'] =_MB_XOOPSMEMBERS_REGISTEREDMEMBERS;
        $block['registeredtoday_lang'] =_MB_XOOPSMEMBERS_REGISTEREDTODAY;
        $block['registeredyesterday_lang'] =_MB_XOOPSMEMBERS_REGISTEREDYESTERDAY;
        $block['newestmember_lang'] =_MB_XOOPSMEMBERS_NEWESTMEMBER;
        $block['and_lang'] =_MB_XOOPSMEMBERS_AND;
        $block['showtotalpost'] = $options[0];
        $block['showtotalonline'] = $options[1];
        $block['showreghistory'] = $options[2];
        $block['shownewmember'] = $options[3];
        $block['userealname'] = $options[4];
        
        return $block;
    } else {
        return false;
    }    
}

/**
 * @param $options
 * @return string
 */
function membersstats_edit($options) {

    $form = _MB_XOOPSMEMBERS_SHOWTOTALPOST . '&nbsp;';
    if (1 == $options[0]) {
        $chk = " checked='checked'";
    }
    $form .= "<input type='radio' name='options[0]' value='1'".$chk . ' >&nbsp;' . _YES . '';
    $chk = '';
    if (0 == $options[0]) {
        $chk = " checked='checked'";
    }
    $form .= "&nbsp;<input type='radio' name='options[0]' value='0'".$chk . ' >' . _NO . '<br>';


    $form .= _MB_XOOPSMEMBERS_SHOWTOTALONLINE . '&nbsp;';
    if (1 == $options[1]) {
        $chk = " checked='checked'";
    }
    $form .= "<input type='radio' name='options[1]' value='1'".$chk . ' >&nbsp;' . _YES . '';
    $chk = '';
    if (0 == $options[1]) {
        $chk = " checked='checked'";
    }
    $form .= "&nbsp;<input type='radio' name='options[1]' value='0'".$chk . ' >' . _NO . '<br>';

    $form .= _MB_XOOPSMEMBERS_SHOWREGHISTORY . '&nbsp;';
    if (1 == $options[2]) {
        $chk = " checked='checked'";
    }
    $form .= "<input type='radio' name='options[2]' value='1'".$chk . ' >&nbsp;' . _YES . '';
    $chk = '';
    if (0 == $options[2]) {
        $chk = " checked='checked'";
    }
    $form .= "&nbsp;<input type='radio' name='options[2]' value='0'".$chk . ' >' . _NO . '<br>';

    $form .= _MB_XOOPSMEMBERS_SHOWNEWMEMBER . '&nbsp;';
    if (1 == $options[3]) {
        $chk = " checked='checked'";
    }
    $form .= "<input type='radio' name='options[3]' value='1'".$chk . ' >&nbsp;' . _YES . '';
    $chk = '';
    if (0 == $options[3]) {
        $chk = " checked='checked'";
    }
    $form .= "&nbsp;<input type='radio' name='options[3]' value='0'".$chk . ' >' . _NO . '<br>';

    $form .= _MB_XOOPSMEMBERS_USEREALNAME . '&nbsp;';
    if (1 == $options[4]) {
        $chk = " checked='checked'";
    }
    $form .= "<input type='radio' name='options[4]' value='1'".$chk . ' >&nbsp;' . _YES . '';
    $chk = '';
    if (0 == $options[4]) {
        $chk = " checked='checked'";
    }
    $form .= "&nbsp;<input type='radio' name='options[4]' value='0'".$chk . ' >' . _NO . '<br>';

    return $form;
}
