<?php

/**
 * @param $queryarray
 * @param $andor
 * @param $limit
 * @param $offset
 * @param $userid
 * @return array
 */
function member_search($queryarray, $andor, $limit, $offset, $userid)
{
    $sql = 'SELECT * FROM ' . $GLOBALS['xoopsDB']->prefix('users') . ' WHERE level > 0';
    if ($userid != 0) {
        $sql .= " AND uid='0'";
    }
    // because count() returns 1 even if a supplied variable  
    // is not an array, we must check if $querryarray is really an array  
    if (is_array($queryarray) && $count = count($queryarray)) {
        $sql .= " AND ((uname LIKE '%{$queryarray[0]}%' OR name LIKE '%{$queryarray[0]}%')";
        for ($i = 1; $i < $count; $i++) {
            $sql .= " $andor ";
            $sql .= "(uname LIKE '%{$queryarray[$i]}%' OR name LIKE '%{$queryarray[$i]}%')";
        }
        $sql .= ') ';
    }
    $sql .= ' ORDER BY uname,name ASC';

    $result = $GLOBALS['xoopsDB']->query($sql, intval($limit), intval($offset));
    $ret    = [];
    $i      = 0;
    while ($myrow = $GLOBALS['xoopsDB']->fetchArray($result)) {
        $ret[$i]['link']  = '' . XOOPS_URL . "\userinfo.php?uid=" . $myrow['uid'] . '';
        $ret[$i]['title'] = '' . htmlspecialchars($myrow['uname']) . ' / ' . htmlspecialchars($myrow['name']) . '';
        $ret[$i]['time']  = '' . $myrow['user_regdate'] . '';
        $ret[$i]['uid']   = '' . $myrow['uid'] . '';
        $i++;
    }
    return $ret;
}

?>
