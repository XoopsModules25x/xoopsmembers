<?php
// Author: Lio MJ
// Website: https://www.github.com/liomj/

if (!defined('XOOPS_ROOT_PATH')) {
    exit;
}

/**
 * @param $options
 * @return mixed
 */
function show_memberswelcome_block($options)
{
    global $xoopsConfig, $xoopsUser, $xoopsModule, $xoopsDB, $_SERVER;
    if (is_object($xoopsUser)) {
        $block = [];
        $block['uid'] = $xoopsUser->getVar('uid');
        $realname     = $xoopsUser->getVar('name');

        if ('1' == $options[1] && '' != $realname) {
            $block['membername'] = $xoopsUser->getVar('name');
        } else {
            $block['membername'] = $xoopsUser->getVar('uname');
        }
        $block['user_avatar'] = $xoopsUser->getVar('user_avatar');

        $ranking            = $xoopsUser->rank();
        $block['rankimage'] = $ranking['image'];
        $block['ranktitle'] = $ranking['title'];
        $block['showrank']  = $options[0];
    }

    return $block;
}

/**
 * @param $options
 * @return string
 */
function memberswelcome_edit($options)
{
    $form = _MB_XOOPSMEMBERS_SHOWMEMBERSRANK . '&nbsp;';
    if (1 == $options[0]) {
        $chk = " checked='checked'";
    }
    $form .= "<input type='radio' name='options[0]' value='1'" . $chk . ' >&nbsp;' . _YES . '';
    $chk  = '';
    if (0 == $options[0]) {
        $chk = " checked='checked'";
    }
    $form .= "&nbsp;<input type='radio' name='options[0]' value='0'" . $chk . ' >' . _NO . '<br>';

    $form .= _MB_XOOPSMEMBERS_USEREALNAME . '&nbsp;';
    if (1 == $options[1]) {
        $chk = " checked='checked'";
    }
    $form .= "<input type='radio' name='options[1]' value='1'" . $chk . ' >&nbsp;' . _YES . '';
    $chk  = '';
    if (0 == $options[1]) {
        $chk = " checked='checked'";
    }
    $form .= "&nbsp;<input type='radio' name='options[1]' value='0'" . $chk . ' >' . _NO . '<br>';

    return $form;
}

