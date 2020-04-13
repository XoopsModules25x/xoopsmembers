    <{if $displaybreadcrumb == 1}>
        <div class="breadcrumb">
            <a href="index.php"><{$smarty.const._MD_XOOPSMEMBERS_MEMBERSLIST}></a>&nbsp;&raquo;&nbsp;<{$smarty.const._MD_XOOPSMEMBERS_MEMBERSLIST}>
        </div>
    <{/if}>

    <h4><{$smarty.const._MD_XOOPSMEMBERS_WELCOMETO}></h4>
    <{if $displaywelcomemessage == 1}><{$welcomemessage}><br><{/if}>

    <{if $displaytotalmember == 1}>
        <b><{$smarty.const._MD_XOOPSMEMBERS_TOTALUSERS}>:</b> <{$totalmember}>
    <{/if}>

    <{if $displaylatestmember == 1}>
         &nbsp;&nbsp;<b><{$smarty.const._MD_XOOPSMEMBERS_LATESTMEMBER}>:</b> <{$latestmember}> <br><br>
    <{/if}>
  
  <{if $indextemplate == 'normal'}>
  
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
	<{if $displayfrom == 1 && $users[i].location!=''}>
        <br><span class='text-muted'><small><b><{$smarty.const._MD_XOOPSMEMBERS_LOCATION}> :</b> <{$users[i].location}></small></span>
    <{/if}>
    <{if $displayoccupation == 1 && $users[i].occupation!=''}>
        <span class='text-muted'><small> | <b><{$smarty.const._MD_XOOPSMEMBERS_OCCUPATION}> :</b> <{$users[i].occupation}>  </small></span>
    <{/if}>
    <{if $displayinterest == 1 && $users[i].interest!=''}>
        <br><span class='text-muted'><small> <b><{$smarty.const._MD_XOOPSMEMBERS_INTEREST}> :</b> <{$users[i].interest}></small></span>
    <{/if}>
    <br>
    <{if $displayregdate == 1}>
        <br><span class='text-muted'><small><b><{$smarty.const._MD_XOOPSMEMBERS_MEMBERSINCE}> :</b> <{$users[i].registerdate}></small></span>
    <{/if}>
    <{if $displayposts == 1}>
        <span class='text-muted'><small> | <b><{$smarty.const._MD_XOOPSMEMBERS_POSTS}> :</b> <{$users[i].posts}>  </small></span>
    <{/if}>
    <{if $displaylastlogin == 1}>
        <span class='text-muted'><small> | <b><{$smarty.const._MD_XOOPSMEMBERS_LASTLOGIN}> :</b> <{$users[i].lastlogin}></small></span>
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
<{$pagenav}><br>

<{else}>

<div class="table-responsive">
<table id="memberslist" class="table table-striped table-hover">
  <thead>
  <tr>
    <{if $displayavatar == 1}>
    <th align="center"><{$smarty.const._MD_XOOPSMEMBERS_AVATAR}></th>
	<{/if}>
	<th><{$smarty.const._MD_XOOPSMEMBERS_UNAME}></th>
	<{if $displayrealname == 1}>
    <th align="center"><{$smarty.const._MD_XOOPSMEMBERS_REALNAME}>
	<{/if}>
	<{if $displayfrom == 1}>
		<th align="center"><{$smarty.const._MD_XOOPSMEMBERS_LOCATION}></th>
	<{/if}>
	<{if $displayoccupation == 1}>
		<th align="center"><{$smarty.const._MD_XOOPSMEMBERS_OCCUPATION}></th>
	<{/if}>
	<{if $displayinterest == 1}>
		<th align="center"><{$smarty.const._MD_XOOPSMEMBERS_INTEREST}></th>
	<{/if}>
	<{if $displayposts == 1}>
	<th align="center"><{$smarty.const._MD_XOOPSMEMBERS_POSTS}></th>
    <{/if}>
	<{if $displayregdate == 1}>
		<th align="center"><{$smarty.const._MD_XOOPSMEMBERS_REGDATE}></th>
	<{/if}>
    <{if $displaylastlogin == 1}>
		<th align="center"><{$smarty.const._MD_XOOPSMEMBERS_LASTLOGIN}></th>
	<{/if}>
	<th align="center"><{$smarty.const._MD_XOOPSMEMBERS_CONTACT}></th>
	<{if $is_admin == true}>
    <th align="center"><{$smarty.const._MD_XOOPSMEMBERS_ADMIN}></th>
    <{/if}>
  </tr>
  </thead>
  <tbody>
  <{section name=i loop=$users}>
  <tr>
    <{if $displayavatar == 1}>  
		<td><a href="<{$xoops_url}>/userinfo.php?uid=<{$users[i].id}>"><img src='<{$xoops_url}>/uploads/<{$users[i].avatar}>' class='rounded-circle float-left' title='<{$users[i].name}>' alt='<{$users[i].name}>' style='padding:10px' width='100' height='100'></a></td>
	<{/if}>
    	<td><a href="<{$xoops_url}>/userinfo.php?uid=<{$users[i].id}>"><{$users[i].name}></a></td>
    <{if $displayrealname == 1}>  
		<{if $users[i].realname!=''}>  
			<td><{$users[i].realname}></td>
		<{else}>
			<td>-</td>
		<{/if}>
	<{/if}>
    <{if $displayfrom == 1}>  
		<{if $users[i].location!=''}>  
			<td><{$users[i].location}></td>
		<{else}>
			<td>-</td>
		<{/if}>
	<{/if}>
    <{if $displayoccupation == 1}>  
		<{if $users[i].occupation!=''}>  
			<td><{$users[i].occupation}></td>
		<{else}>
			<td>-</td>
		<{/if}>
	<{/if}>
    <{if $displayinterest == 1}>  
		<{if $users[i].interest!=''}>  
			<td><{$users[i].interest}></td>
		<{else}>
			<td>-</td>
		<{/if}>
	<{/if}>
	<{if $displayposts == 1}>
		<td align="center"><{$users[i].posts}></td>
    <{/if}>
	<{if $displayregdate == 1}>
		<td align="center"><{$users[i].registerdate}></td>
	<{/if}>
	<{if $displaylastlogin == 1}>
		<td align="center"><{$users[i].lastlogin}></td>
	<{/if}>
	<td align="center">
	<{if $displayemail == 1}>
		<{$users[i].email}>
    <{/if}>
	<{if $xoops_isuser AND $displaypm == 1}>
		<{$users[i].pmlink}>
	<{/if}>
	<{if $displayurl == 1}>
		<{$users[i].website}>
	<{/if}>
	</td>
	<{if $is_admin == true}>
		<td align="center"><{$users[i].adminlink}></td>
	<{/if}>
  </tr>
  <{/section}> 
  </tbody>
</table>
</div>

<script>
$(document).ready(function() {
    $('#memberslist').DataTable( {
		"displayLength": <{$membersperpage}>,
    } );
} );
</script>
<{/if}>