<a href="index.php"><{$smarty.const._MD_XM_SEARCH}></a>

<<<<<<<< HEAD:templates/xoopsmembers_searchresults.tpl
&nbsp;<span style="font-weight:bold;">&raquo;&raquo;</span>&nbsp;<{$smarty.const._MD_XM_RESULTS}><br /><br />

<{if $total_found != 0}>
<table class="outer" cellspacing="1" cellpadding="4">
  <tr>
    <th align="center"><{$smarty.const._MD_XM_AVATAR}></th>
	<th align="center"><{$smarty.const._MD_XM_UNAME}></th>
	<th align="center"><{$smarty.const._MD_XM_REALNAME}></th>
	<th align="center"><{$smarty.const._MD_XM_EMAIL}></th>
	<th align="center"><{$smarty.const._MD_XM_PM}></th>
	<th align="center"><{$smarty.const._MD_XM_URL}></th>
	<th align="center"><{$smarty.const._MD_XM_REGDATE}></th
	><th align="center"><{$smarty.const._MD_XM_LASTLOGIN}></th>
	<th align="center"><{$smarty.const._MD_XM_POSTS}></th>
    <{if $is_admin == true}>
    <th align="center"><{$smarty.const._MD_XM_ADMIN}></th>
    <{/if}>
  </tr>
  <{section name=i loop=$users}>
  <tr valign="middle">
    <td class="even"><{$users[i].avatar}></td>
	<td class="odd"><a href="<{$xoops_url}>/userinfo.php?uid=<{$users[i].id}>"><{$users[i].name}></a></td>
	<td class="even"><{$users[i].realname}></td>
	<td align="center" class="odd"><{$users[i].email}></td>
	<td class="even" align="center"><{$users[i].pmlink}></td>
	<td class="odd" align="center"><{$users[i].website}></td>
	<td class="even" align="center"><{$users[i].registerdate}></td>
	<td class="odd" align="center"><{$users[i].lastlogin}></td>
	<td class="even" align="center"><{$users[i].posts}></td>
    <{if $is_admin == true}>
		<td class="odd" align="center"><{$users[i].adminlink}></td>
	<{/if}>
  </tr>
  <{/section}>
========
&nbsp;<span style="font-weight:bold;">&raquo;&raquo;</span>&nbsp;<{$smarty.const._XO_LA_RESULTS}><br><br>

<{if $total_found != 0}>
<table class="outer" cellspacing="1" cellpadding="4">
    <tr>
        <th align="center"><{$smarty.const._XO_LA_AVATAR}></th>
        <th align="center"><{$smarty.const._XO_LA_UNAME}></th>
        <th align="center"><{$smarty.const._XO_LA_REALNAME}></th>
        <th align="center"><{$smarty.const._XO_LA_EMAIL}></th>
        <th align="center"><{$smarty.const._XO_LA_PM}></th>
        <th align="center"><{$smarty.const._XO_LA_URL}></th>
        <th align="center"><{$smarty.const._XO_LA_REGDATE}>
        </th
        >
        <th align="center"><{$smarty.const._XO_LA_LASTLOGIN}></th>
        <th align="center"><{$smarty.const._XO_LA_POSTS}></th>
        <{if $is_admin == true}>
        <th align="center"><{$smarty.const._XO_LA_ADMIN}></th>
        <{/if}>
    </tr>
    <{section name=i loop=$users}>
    <tr valign="middle">
        <td class="even"><{$users[i].avatar}></td>
        <td class="odd"><a href="<{$xoops_url}>/userinfo.php?uid=<{$users[i].id}>"><{$users[i].name}></a></td>
        <td class="even"><{$users[i].realname}></td>
        <td align="center" class="odd"><{$users[i].email}></td>
        <td class="even" align="center"><{$users[i].pmlink}></td>
        <td class="odd" align="center"><{$users[i].website}></td>
        <td class="even" align="center"><{$users[i].registerdate}></td>
        <td class="odd" align="center"><{$users[i].lastlogin}></td>
        <td class="even" align="center"><{$users[i].posts}></td>
        <{if $is_admin == true}>
        <td class="odd" align="center"><{$users[i].adminlink}></td>
        <{/if}>
    </tr>
    <{/section}>
>>>>>>>> 9803ae2d480b9f8329878d2e9adac4623c64f218:templates/xoopsmembers_searchresults.html
</table>
<div style="text-align:center;">
    <{$pagenav}>
    <{$lang_numfound}>
</div>
<{else}>
<<<<<<<< HEAD:templates/xoopsmembers_searchresults.tpl
  <{$smarty.const._MD_XM_NOFOUND}>
<{/if}>
========
<{$smarty.const._XO_LA_NOFOUND}>
<{/if}>
>>>>>>>> 9803ae2d480b9f8329878d2e9adac4623c64f218:templates/xoopsmembers_searchresults.html
