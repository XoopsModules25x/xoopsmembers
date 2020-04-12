<a href="index.php"><{$smarty.const._MD_XOOPSMEMBERS_MEMBERSLIST}></a>

&nbsp;<span style="font-weight:bold;">&raquo;</span>&nbsp;<{$smarty.const._MD_XOOPSMEMBERS_MEMBERSLIST}><br /><br />
<span style="color:#ff0000;"><{$smarty.const._MD_XOOPSMEMBERS_TOTALUSERS}> <{$totalmember}></span>

<table class="outer" cellspacing="1" cellpadding="4">
  <tr>
    <{if $displayavatar == 1}>
    <th align="center"><{$smarty.const._MD_XOOPSMEMBERS_AVATAR}></th>
	<{/if}>
	<th align="center"><{$smarty.const._MD_XOOPSMEMBERS_UNAME}></th>
    <{if $displayrealname == 1}>
	<th align="center"><{$smarty.const._MD_XOOPSMEMBERS_REALNAME}></th>
	<{/if}>
	<{if $displayemail == 1}>
	<th align="center"><{$smarty.const._MD_XOOPSMEMBERS_EMAIL}></th>
	<{/if}>
	<{if $displaypm == 1}>
	<th align="center"><{$smarty.const._MD_XOOPSMEMBERS_PM}></th>
	<{/if}>
    <{if $displayurl == 1}>
	<th align="center"><{$smarty.const._MD_XOOPSMEMBERS_URL}></th>
	<{/if}>
    <{if $displayregdate == 1}>
		<th align="center"><{$smarty.const._MD_XOOPSMEMBERS_REGDATE}></th>
	<{/if}>
    <{if $displaylastlogin == 1}>
		<th align="center"><{$smarty.const._MD_XOOPSMEMBERS_LASTLOGIN}></th>
	<{/if}>
	<{if $displayposts == 1}>
	<th align="center"><{$smarty.const._MD_XOOPSMEMBERS_POSTS}></th>
    <{/if}>
    <{if $is_admin == true}>
    <th align="center"><{$smarty.const._MD_XOOPSMEMBERS_ADMIN}></th>
    <{/if}>
  </tr>
  <{section name=i loop=$users}>
  <tr valign="middle">
    <{if $displayavatar == 1}>  
		<td class="even"><{$users[i].avatar}></td>
	<{/if}>
	<td class="odd"><a href="<{$xoops_url}>/userinfo.php?uid=<{$users[i].id}>"><{$users[i].name}></a></td>
    <{if $displayrealname == 1}>  
		<td class="even"><{$users[i].realname}></td>
	<{/if}>
	<{if $displayemail == 1}>
		<td align="center" class="odd"><{$users[i].email}></td>
    <{/if}>
	<{if $displaypm == 1}>
		<td class="even" align="center"><{$users[i].pmlink}></td>
	<{/if}>
	<{if $displayurl == 1}>
		<td class="odd" align="center"><{$users[i].website}></td>
	<{/if}>
	<{if $displayregdate == 1}>
		<td class="even" align="center"><{$users[i].registerdate}></td>
	<{/if}>
	<{if $displaylastlogin == 1}>
		<td class="odd" align="center"><{$users[i].lastlogin}></td>
	<{/if}>
	<{if $displayposts == 1}>
		<td class="even" align="center"><{$users[i].posts}></td>
    <{/if}>
	<{if $is_admin == true}>
		<td class="odd" align="center"><{$users[i].adminlink}></td>
	<{/if}>
  </tr>
  <{/section}>
</table>
<div style="text-align:center">
  <{$pagenav}>
</div>
