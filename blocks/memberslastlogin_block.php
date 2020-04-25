<?php
// Author: Lio MJ
// Website: https://www.github.com/liomj/

if (!defined('XOOPS_ROOT_PATH')) {
    exit;
}

/**
 * @param $options
 * @return array
 */
function show_memberslastlogin_block($options)
{
    $x      = 0;
    $now    = time();
    $hours  = 24;
    $time   = ((int)$hours > 0) ? time() - ((int)$hours * 3600) : (time() - 24 * 3600);
    $block  = [];
    $sql    = 'SELECT distinct uid, name, uname, user_avatar, last_login FROM ' . $GLOBALS['xoopsDB']->prefix('users') . " WHERE level > 0 AND last_login >= '" . $time . "' ORDER BY last_login DESC LIMIT " . $options[3] . '';
    $result = $GLOBALS['xoopsDB']->query($sql);
    while (list($uid, $name, $uname, $user_avatar, $last_login) = $GLOBALS['xoopsDB']->fetchRow($result)) {
        $sincelastlogin = ' ' . timeDifference($last_login, $now, 'hours') . ' ago ';
        $x++;

        $block['recentlogin'] = [];// = $recentlogin;
        $recentlogin['uid']     = $uid;

        if ('' != $name && '1' == $options[2]) {
            $recentlogin['name'] = htmlspecialchars($name, ENT_QUOTES);
        } else {
            $recentlogin['name'] = $uname;
        }
        $recentlogin['user_avatar']    = $user_avatar;
        $recentlogin['last_login']     = $last_login;
        $recentlogin['sincelastlogin'] = $sincelastlogin;
    }

    $block['showrecentloginname']   = $options[0];
    $block['showrecentloginavatar'] = $options[1];
    $block['userealname']           = $options[2];
    $block['memberdisplay']         = $options[3];
    return $block;
}

/**
 * @param        $start
 * @param        $end
 * @param string $return
 * @return string
 */
function timeDifference($start,$end,$return='days') {
    //change times to Unix timestamp.
    //$start = strtotime($start);
    //$end = strtotime($end);
    //subtract dates
    $difference = max($end, $start) - min($end,$start);
    $time = NULL;
    //24 hours equal to 86400
    //calculate time difference.
    switch($return) {
        case 'days':
            $days = floor($difference/86400);
            $difference = $difference % 86400;
            $time['days'] = $days;
        case 'hours':
            $hours = floor($difference/3600);
            $difference = $difference % 3600;
            $time['hours'] = $hours;
        case 'minutes':
            $minutes = floor($difference/60);
            $difference = $difference % 60;
            $time['minutes'] = $minutes;
        case 'seconds':
            $seconds = $difference;
            $time['seconds'] = $seconds;
    }

    $output = [];
    if(is_array($time)) {
        $showSec = true;
        if(isset($time['hours']) && $time['hours'] > 0) {
            $output[] = $time['hours'] . ' Hour';
            $showSec = false;
        }

        if(isset($time['minutes']) && $time['minutes'] > 0) {
            $output[] = $time['minutes'] . ' minutes';
            $showSec = false;
        }

        if(isset($time['seconds']) && true == $showSec) {
            return $time['seconds'] . ' seconds';
        }
        return implode(', ',$output);
    }
}

/**
 * @param $options
 * @return string
 */
function memberslastlogin_edit($options)
{
    $form = _MB_XOOPSMEMBERS_SHOWRECENTLOGINNAME . '&nbsp;';
    if (1 == $options[0]) {
        $chk = " checked='checked'";
    }
    $form .= "<input type='radio' name='options[0]' value='1'" . $chk . ' >&nbsp;' . _YES . '';
    $chk  = '';
    if (0 == $options[0]) {
        $chk = " checked='checked'";
    }
    $form .= "&nbsp;<input type='radio' name='options[0]' value='0'" . $chk . ' >' . _NO . '<br>';

    $form .= _MB_XOOPSMEMBERS_SHOWRECENTLOGINAVATAR . '&nbsp;';
    if (1 == $options[1]) {
        $chk = " checked='checked'";
    }
    $form .= "<input type='radio' name='options[1]' value='1'" . $chk . ' >&nbsp;' . _YES . '';
    $chk  = '';
    if (0 == $options[1]) {
        $chk = " checked='checked'";
    }
    $form .= "&nbsp;<input type='radio' name='options[1]' value='0'" . $chk . ' >' . _NO . '<br>';

    $form .= _MB_XOOPSMEMBERS_USEREALNAME . '&nbsp;';
    if (1 == $options[2]) {
        $chk = " checked='checked'";
    }
    $form .= "<input type='radio' name='options[2]' value='1'" . $chk . ' >&nbsp;' . _YES . '';
    $chk  = '';
    if (0 == $options[2]) {
        $chk = " checked='checked'";
    }
    $form .= "&nbsp;<input type='radio' name='options[2]' value='0'" . $chk . ' >' . _NO . '<br>';

    $form .= _MB_XOOPSMEMBERS_MEMBERDISPLAY . '&nbsp;';
    $form .= "<input type='text' name='options[3]' value='" . $options[3] . "'>";
    return $form;
}


