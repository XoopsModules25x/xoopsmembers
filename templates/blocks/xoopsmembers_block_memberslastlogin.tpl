

<div style='padding:2px;'>
<{foreach item=recentlogin from=$block.recentlogin}>


<{if $block.showrecentloginavatar == 1}>
<a href='<{$xoops_url}>/user.php?uid=<{$recentlogin.uid}>' target='_blank'><img src='<{$xoops_url}>/uploads/<{$recentlogin.user_avatar}>' class='rounded-circle' title='<{$recentlogin.name}> | Logged In <{$recentlogin.sincelastlogin}>' border='0' alt='<{$recentlogin.uname}>' height='48' width='48'></a>
<{/if}>

<{if $block.showrecentloginname == 1}>
<a href='<{$xoops_url}>/user.php?uid=<{$recentlogin.uid}>' target='_blank' title='<{$recentlogin.name}> | Logged In <{$recentlogin.sincelastlogin}>'><{$recentlogin.name}></a>
<{/if}>



<{/foreach}></div>