<{if $displaybreadcrumb == 1}>
	<a href="index.php"><{$smarty.const._MD_XM_SEARCH}></a>&nbsp;<span style="font-weight:bold;">&raquo;</span>&nbsp;<{$smarty.const._MD_XM_RESULTS}><br />
<{/if}>
<h4><{$smarty.const._MD_XM_RESULTS}></h4>

<{if $total_found != 0}>
  <{$lang_numfound}><br>
<table class="table table-bordered table-striped table-hover">
  <thead>
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
	<{if $xoops_isuser AND $displaypm == 1}>
		<th align="center"><{$smarty.const._MD_XM_PM}></th>
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
  </thead>
  <tbody>
  <{section name=i loop=$users}>
  <tr>
    <{if $displayavatar == 1}>  
		<td><{$users[i].avatar}></td>
	<{/if}>
	<td><a href="<{$xoops_url}>/userinfo.php?uid=<{$users[i].id}>"><{$users[i].name}></a></td>
    <{if $displayrealname == 1}>  
		<td><{$users[i].realname}></td>
	<{/if}>
	<{if $displayemail == 1}>
		<td align="center"><{$users[i].email}></td>
    <{/if}>
	<{if $xoops_isuser AND $displaypm == 1}>
		<td align="center"><{$users[i].pmlink}></td>
	<{/if}>
	<{if $displayurl == 1}>
		<td align="center"><{$users[i].website}></td>
	<{/if}>
	<{if $displayregdate == 1}>
		<td align="center"><{$users[i].registerdate}></td>
	<{/if}>
	<{if $displaylastlogin == 1}>
		<td align="center"><{$users[i].lastlogin}></td>
	<{/if}>
	<{if $displayposts == 1}>
		<td align="center"><{$users[i].posts}></td>
    <{/if}>
	<{if $is_admin == true}>
		<td align="center"><{$users[i].adminlink}></td>
	<{/if}>
  </tr>
  <{/section}> 
  </tbody>
</table>
<br>
  <{$pagenav}>
<{else}>
    <{$smarty.const._MD_XOOPSMEMBERS_NOFOUND}>
<{/if}>
