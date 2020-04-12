<?php
//  Author: Trabis
//  URL: http://www.xuups.com
//  E-Mail: lusopoemas@gmail.com

$xoopsOption['template_main'] = 'xoopsmembers_rank.tpl';
require_once  __DIR__ . '/header.php';

global $xoopsModule;

$db=Database::getInstance();

$result = $db->query("SELECT * FROM ".$db->prefix("ranks")." ORDER BY rank_id");
$ranks = array();
$sranks = array();

while ( $rank = $db->fetchArray($result) ) {
    $i = $rank['rank_id'];
    if ($rank['rank_special']==0){
        $ranks[$i]['title'] = $rank['rank_title'];
        $ranks[$i]['min'] = $rank['rank_min'];
        $ranks[$i]['max'] = $rank['rank_max'];
        $ranks[$i]['image'] = ($rank['rank_image'] > '')?'<img src="'.XOOPS_URL.'/uploads/'.$rank['rank_image'].'" alt="" />':'&nbsp;';
    } else {
        $sranks[$i]['title'] = $rank['rank_title'];
        $sranks[$i]['image'] = ($rank['rank_image'] > '')?'<img src="'.XOOPS_URL.'/uploads/'.$rank['rank_image'].'" alt="" />':'&nbsp;';
    }
}
$xoopsTpl->assign('ranks', $ranks);
$xoopsTpl->assign('sranks', $sranks);

include 'footer.php';
include_once XOOPS_ROOT_PATH."/footer.php";
?>

