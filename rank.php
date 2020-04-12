<?php
//  Author: Trabis
//  URL: http://www.xuups.com
//  E-Mail: lusopoemas@gmail.com

$xoopsOption['template_main'] = 'xoopsmembers_rank.tpl';
require_once  __DIR__ . '/header.php';

global $xoopsModule;

$db= XoopsDatabaseFactory::getDatabaseConnection();

$result = $db->query('SELECT * FROM ' . $db->prefix('ranks') . ' ORDER BY rank_id');
$ranks = [];
$sranks = [];

while ( $rank = $db->fetchArray($result) ) {
    $i = $rank['rank_id'];
    if (0 == $rank['rank_special']){
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

require __DIR__ . '/footer.php';
require_once XOOPS_ROOT_PATH . '/footer.php';
