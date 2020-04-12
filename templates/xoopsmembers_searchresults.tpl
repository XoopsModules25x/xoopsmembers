<a href="index.php"><{$smarty.const._MD_XM_SEARCH}></a>

&nbsp;<span style="font-weight:bold;">&raquo;</span>&nbsp;<{$smarty.const._MD_XM_RESULTS}><br /><br />

<{if $total_found != 0}>
<table class="outer" cellspacing="1" cellpadding="4">
  <tr>
    <{if $displayavatar == 1}>
		<th align="center"><{$smarty.const._MD_XM_AVATAR}></th>
	<{/if}>
	<th align="center"><{$smarty.const._MD_XM_UNAME}></th>
    <{if $displayrealname == 1}>
		<th align="center"><{$smarty.const._MD_XM_REALNAME}></th>
	<{/if}>
	<{if $displayemail == 1}>
		<th align="center"><{$smarty.const._MD_XM_EMAIL}></th>
	<{/if}>
	<{if $displaypm == 1}>
		<th align="center"><{$smarty.const._MD_XM_PM}></th>
	<{/if}>
    <{if $displayurl == 1}>
		<th align="center"><{$smarty.const._MD_XM_URL}></th>
	<{/if}>
    <{if $displayregdate == 1}>
		<th align="center"><{$smarty.const._MD_XM_REGDATE}></th>
	<{/if}>
    <{if $displaylastlogin == 1}>
		<th align="center"><{$smarty.const._MD_XM_LASTLOGIN}></th>
	<{/if}>
	<{if $displayposts == 1}>
		<th align="center"><{$smarty.const._MD_XM_POSTS}></th>
    <{/if}>
	<{if $is_admin == true}>
    <th align="center"><{$smarty.const._MD_XM_ADMIN}></th>
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
  <{$lang_numfound}>
</div>
<{else}>
  <{$smarty.const._MD_XM_NOFOUND}>
<{/if}>