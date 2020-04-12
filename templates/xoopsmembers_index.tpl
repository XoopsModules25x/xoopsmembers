	<{if $displaybreadcrumb == 1}>
		<a href="index.php"><{$smarty.const._MD_XOOPSMEMBERS_MEMBERSLIST}></a>&nbsp;&raquo;&nbsp;<{$smarty.const._MD_XOOPSMEMBERS_MEMBERSLIST}><br /><br />
	<{/if}>

	<h4><{$smarty.const._MD_XOOPSMEMBERS_WELCOMETO}></h4>
	<{if $displaywelcomemessage == 1}><{$welcomemessage}><br><{/if}>

	<{if $displaytotalmember == 1}>
		<{$smarty.const._MD_XOOPSMEMBERS_TOTALUSERS}>: <{$totalmember}> 
	<{/if}>

	<{if $displaylatestmember == 1}>
		 <{$smarty.const._MD_XOOPSMEMBERS_LATESTMEMBER}>: <{$latestmember}> <br><br>
	<{/if}>   
  
<div class="table-responsive">
<table class="table table-striped table-hover">
  <thead>
  <tr>
    <th bgcolor="#38a8e8"><{$smarty.const._MD_XOOPSMEMBERS_MEMBERSLIST}></th>
  </tr>
  </thead>
  <tbody>
  <{section name=i loop=$users}>
  <tr>
	<td>
	<h5><a href="<{$xoops_url}>/userinfo.php?uid=<{$users[i].id}>"><{$users[i].name}></a></h5>
    <{if $displayavatar == 1}>  
		<a href="<{$xoops_url}>/userinfo.php?uid=<{$users[i].id}>"><img src='<{$xoops_url}>/uploads/<{$users[i].avatar}>' class='rounded-circle float-left' title='<{$users[i].name}>' alt='<{$users[i].name}>' style='padding:10px' width='100' height='100'></a>
	<{/if}>
	<{if $displayrealname == 1 && $users[i].realname!=''}>  
		<span class="text-muted"><b><{$smarty.const._MD_XOOPSMEMBERS_REALNAME}> :</b> <a href="<{$xoops_url}>/userinfo.php?uid=<{$users[i].id}>"><{$users[i].realname}></a></span>
	<{/if}>
	<{if $displayregdate == 1}>
		<br><span class='text-muted'><small><b><{$smarty.const._MD_XOOPSMEMBERS_MEMBERSINCE}> :</b> <{$users[i].registerdate}></small></span>
	<{/if}>
	<{if $displayposts == 1}>
		<span class='text-muted'><small> | <b><{$smarty.const._MD_XOOPSMEMBERS_POSTS}> :</b> <{$users[i].posts}>  </small></span>
    <{/if}>
	<{if $displaylastlogin == 1 && $users[i].lastlogin!='0'}>
		<span class='text-muted'><small> | <b><{$smarty.const._MD_XOOPSMEMBERS_LASTLOGIN}> :</b> <{$users[i].lastlogin}></small></span>
	<{else}>	
	    <span class='text-muted'><small> | <b><{$smarty.const._MD_XOOPSMEMBERS_LASTLOGIN}> :</b> <{$smarty.const._MD_XOOPSMEMBERS_NEVERLOGIN}> </b></small></span>
	<{/if}>
	<br>
	<{if $displayemail == 1}>
		<{$users[i].email}>
    <{/if}>
	<{if $xoops_isuser AND $displaypm == 1}>
		<{$users[i].pmlink}>
	<{/if}>
	<{if $displayurl == 1}>
		<{$users[i].website}>
	<{/if}>
	
	<{if $is_admin == true}>
		<p class="float-right"><br><{$users[i].adminlink}></p>
	<{/if}>
  </td>
  </tr>
  <{/section}> 
  </tbody>
</table>
</div>
<br>
<{$pagenav}>
