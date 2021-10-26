<?php
//  Author: SMD & Trabis
//  URL: http://www.xoopsmalaysia.org  & http://www.xuups.com
//  E-Mail: webmaster@xoopsmalaysia.org  & lusopoemas@gmail.com

if( ! defined( 'XOOPS_ROOT_PATH' ) ) exit ;

function show_membersonline_block($options) {
    global $xoopsConfig, $xoopsUser, $xoopsModule, $xoopsDB, $_SERVER;

    /* @var XoopsOnlineHandler $online_handler */
    $online_handler = xoops_getHandler('online');
    // set gc probabillity to 10% for now..
    if (mt_rand(1, 100) < 11) {
        $online_handler->gc(300);
    }
    if (is_object($xoopsUser)) {
        $uid   = $xoopsUser->getVar('uid');
		$name = $xoopsUser->getVar('name');
		if ($options[4]=='1' && $name!='')
		  {
        $uname = $xoopsUser->getVar('name');
		  }
		else {
		$uname = $xoopsUser->getVar('uname');
		}			

	} else {
        $uid   = 0;
        $uname = '';	
   	    $name = '';
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
		$block   = array();
        $guests  = 0;
        $membersname = '';
		$membersavatar = '';
		$avatar = '';
		$uid = '';
        $name = '';
        $onlineUsers = [];
		for ($i = 0; $i < $total; ++$i) {
			  if ($onlines[$i]['online_uid'] == 0) {
                    $onlineUsers[$i]['user'] = '';
                } else {
                    $onlineUsers[$i]['user'] =  new XoopsUser($onlines[$i]['online_uid']);
                }
			 if (is_object($onlineUsers[$i]['user'])) {
					$block['avatar'] = $onlineUsers[$i]['user']->getVar('user_avatar');
                    $block['uid']= $onlineUsers[$i]['user']->getVar('uid');
					
					$realname     = $onlineUsers[$i]['user']->getVar('name');
					if ('1' == $options[5] && '' != $realname) {
					$block['name'] = $onlineUsers[$i]['user']->getVar('name');
					} else {
					$block['name'] = $onlineUsers[$i]['user']->getVar('uname');
					}
					}
				
            if ($onlines[$i]['online_uid'] > 0) {
				$membersname .= '<a href="' . XOOPS_URL . '/userinfo.php?uid=' . $onlines[$i]['online_uid'] . '" title="' . $onlines[$i]['online_uname'] . '">' . $onlines[$i]['online_uname'] . '</a>, ';
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
        /** @var \XoopsMemberHandler $member_handler */
        $member_handler     =xoops_gethandler('member');
        $today              = formatTimestamp(time());
        $level_criteria     = new Criteria('level', 0, '>');
        $criteria           = new CriteriaCompo($level_criteria);
        $criteria24         = new CriteriaCompo($level_criteria);
        $criteria48         = new CriteriaCompo($level_criteria);
        $total_active_users = $member_handler->getUserCount($level_criteria);
        //Fixing stats for last 24 and 48 hours
        $users_reg_24 = $member_handler->getUserCount($criteria24->add(new Criteria('user_regdate', (mktime(0,0,0)-(24*3600)), '>=')),'AND');
        $users_reg_48 = $member_handler->getUserCount($criteria48->add(new Criteria('user_regdate', (mktime(0,0,0)-(48*3600)), '>=')),'AND');
        $limit = 1;
        $criteria->setOrder('DESC');
        $criteria->setSort('user_regdate');
        $criteria->setLimit($limit);
  
		// data
        $block['activeusers'] = $total_active_users;
        $block['todayreg'] = $users_reg_24;
        $block['yesterdayreg'] = $users_reg_48 - $users_reg_24;
		$block['total_online']	= sprintf(_MB_XOOPSMEMBERS_TOTALONLINE, $total); 
		$block['online_members'] = $total - $guests  . ' ' . _MB_XOOPSMEMBERS_MEMBERS . ' ' . _MB_XOOPSMEMBERS_CURRENTONLINE;
        $block['online_guests']  = $guests . ' ' . _MB_XOOPSMEMBERS_GUESTS . ' ' . _MB_XOOPSMEMBERS_AND;
			
  	
		$block['showonlinemember'] = $options[0];
	    $block['showonlinename'] = $options[1];
		$block['showonlineavatar'] = $options[2];
		$block['showonlinepopup'] = $options[3];
	    $block['showtotalonline'] = $options[4];
		$block['userealname'] = $options[5];
		$block['memberdisplay'] = $options[6];

        return $block;
	} else {
		return false;
	}
}

function membersonline_edit($options) {

    $chk = '';
	$form = _MB_XOOPSMEMBERS_SHOWONLINEMEMBER."&nbsp;";
	if ( $options[0] == 1 ) {
		$chk = " checked='checked'";
	}
	$form .= "<input type='radio' name='options[0]' value='1'".$chk." />&nbsp;"._YES."";
	if ( $options[0] == 0 ) {
		$chk = " checked='checked'";
	}
	$form .= "&nbsp;<input type='radio' name='options[0]' value='0'".$chk." />"._NO."<br />";

	$form .= _MB_XOOPSMEMBERS_SHOWONLINENAME."&nbsp;";
	if ( $options[1] == 1 ) {
		$chk = " checked='checked'";
	}
	$form .= "<input type='radio' name='options[1]' value='1'".$chk." />&nbsp;"._YES."";
	$chk = "";
	if ( $options[1] == 0 ) {
		$chk = " checked='checked'";
	}
	$form .= "&nbsp;<input type='radio' name='options[1]' value='0'".$chk." />"._NO."<br />";

	$form .= _MB_XOOPSMEMBERS_SHOWONLINEAVATAR."&nbsp;";
	if ( $options[2] == 1 ) {
		$chk = " checked='checked'";
	}
	$form .= "<input type='radio' name='options[2]' value='1'".$chk." />&nbsp;"._YES."";
	$chk = "";
	if ( $options[2] == 0 ) {
		$chk = " checked='checked'";
	}
	$form .= "&nbsp;<input type='radio' name='options[2]' value='0'".$chk." />"._NO."<br />";

	$form .= _MB_XOOPSMEMBERS_SHOWONLINEPOPUP."&nbsp;";
	if ( $options[3] == 1 ) {
		$chk = " checked='checked'";
	}
	$form .= "<input type='radio' name='options[3]' value='1'".$chk." />&nbsp;"._YES."";
	$chk = "";
	if ( $options[3] == 0 ) {
		$chk = " checked='checked'";
	}
	$form .= "&nbsp;<input type='radio' name='options[3]' value='0'".$chk." />"._NO."<br />";

	$form .= _MB_XOOPSMEMBERS_SHOWTOTALONLINE."&nbsp;";
	if ( $options[4] == 1 ) {
		$chk = " checked='checked'";
	}
	$form .= "<input type='radio' name='options[4]' value='1'".$chk." />&nbsp;"._YES."";
	$chk = "";
	if ( $options[4] == 0 ) {
		$chk = " checked='checked'";
	}
	$form .= "&nbsp;<input type='radio' name='options[4]' value='0'".$chk." />"._NO."<br />";

	$form .= _MB_XOOPSMEMBERS_USEREALNAME."&nbsp;";
	if ( $options[5] == 1 ) {
		$chk = " checked='checked'";
	}
	$form .= "<input type='radio' name='options[5]' value='1'".$chk." />&nbsp;"._YES."";
	$chk = "";
	if ( $options[5] == 0 ) {
		$chk = " checked='checked'";
	}
	$form .= "&nbsp;<input type='radio' name='options[5]' value='0'".$chk." />"._NO."<br />";
	
	$form .= _MB_XOOPSMEMBERS_MEMBERDISPLAY."&nbsp;";
	$form .= "<input type='text' name='options[6]' value='".$options[6]."'/>";
	return $form;
}

