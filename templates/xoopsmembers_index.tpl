	<{if $displaybreadcrumb == 1}>
		<a href="index.php"><{$smarty.const._MD_XM_MEMBERSLIST}></a>&nbsp;&raquo;&nbsp;<{$smarty.const._MD_XM_MEMBERSLIST}><br /><br />
	<{/if}>

	<h4><{$smarty.const._MD_XM_WELCOMETO}></h4>
	<{if $displaywelcomemessage == 1}><{$welcomemessage}><br><{/if}>

	<{if $displaytotalmember == 1}>
		<{$smarty.const._MD_XM_TOTALUSERS}>: <{$totalmember}> 
	<{/if}>

	<{if $displaylatestmember == 1}>
		 <{$smarty.const._MD_XM_LATESTMEMBER}>: <{$latestmember}> <br><br>
	<{/if}>   


<table class="table table-bordered table-striped table-hover">
  <thead>
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
	<{if $xoops_isuser AND $displaypm == 1}>
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
