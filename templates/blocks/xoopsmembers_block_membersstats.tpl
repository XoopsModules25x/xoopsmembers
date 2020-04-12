<{if $block.showtotalpost == 1}>
<{$block.totalpostmade_lang}> <{$block.totalposts}> <{$block.totalposts_lang}><br>
<{/if}>
<{$block.wehave_lang}> <{$block.activeusers}> <{$block.registeredmembers_lang}><br>

<{if $block.showtotalonline == 1}>
<{$block.online_guests}> <{$block.guests_lang}> <{$block.and_lang}> <{$block.online_members}> <{$block.members_lang}> <{$block.currentonline_lang}> <br>
<{/if}>

<{if $block.showreghistory == 1}>
<{$block.todayreg}> <{$block.registeredtoday_lang}> <{$block.and_lang}> <{$block.yesterdayreg}> <{$block.registeredyesterday_lang}><br>
<{/if}>

<{if $block.shownewmember == 1}>
<{$block.newestmember_lang}> <a href="<{$xoops_url}>/userinfo.php?uid=<{$block.latest_id}>">
<{$block.latestmember}>
</a>
<{/if}>
