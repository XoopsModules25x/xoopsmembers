<{if $block.showtotalpost == 1}>
<i class="fa fa-sticky-note-o"></i> <{$block.totalposts}> <br>
<{/if}>
<i class="fa fa-user"></i> <{$block.activeusers}> <br>

<{if $block.showtotalonline == 1}>
<i class="fa fa-user-circle"></i> <{$block.online_guests}> <{$block.online_members}> <br>
<{/if}>

<{if $block.showreghistory == 1}>
<i class="fa fa-bar-chart"></i> <{$block.todayreg}> <{$block.yesterdayreg}> <br>
<{/if}>

<{if $block.shownewmember == 1}>
<i class="fa fa-user-circle-o"></i> <{$block.newestmember_lang}> <a href="<{$xoops_url}>/userinfo.php?uid=<{$block.latest_id}>">
<{$block.latestmember}>
</a>
<{/if}>
