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
<br>
<script>
$(document).ready(function() {
$('#memberslist').DataTable({
   dom: 'Alfrtip',
   alphabetSearch: {
      column: 1,
   },
   "displayLength": <{$membersperpage}>,
   "language": {
    "decimal":        "<{$smarty.const._MD_XOOPSMEMBERS_DTDECIMAL}>",
    "emptyTable":     "<{$smarty.const._MD_XOOPSMEMBERS_DTEMPTYTABLE}>",
    "info":           "<{$smarty.const._MD_XOOPSMEMBERS_DTINFOSHOWING}> _START_ <{$smarty.const._MD_XOOPSMEMBERS_DTINFOTO}> _END_ <{$smarty.const._MD_XOOPSMEMBERS_DTINFOOF}> _TOTAL_ <{$smarty.const._MD_XOOPSMEMBERS_DTINFOENTRIES}>",
    "infoEmpty":      "<{$smarty.const._MD_XOOPSMEMBERS_DTINFOEMPTY}>",
    "infoFiltered":   "(<{$smarty.const._MD_XOOPSMEMBERS_DTINFOFILTEREDFROM}> _MAX_ <{$smarty.const._MD_XOOPSMEMBERS_DTINFOFILTEREDTOTALENTRIES}>)",
    "infoPostFix":    "<{$smarty.const._MD_XOOPSMEMBERS_DTINFOPOSTFIX}>",
    "thousands":      "<{$smarty.const._MD_XOOPSMEMBERS_DTTHOUSANDS}>",
    "lengthMenu":     "<{$smarty.const._MD_XOOPSMEMBERS_DTLENGTHMENUSHOW}> _MENU_ <{$smarty.const._MD_XOOPSMEMBERS_DTLENGTHMENUENTRIES}>",
    "loadingRecords": "<{$smarty.const._MD_XOOPSMEMBERS_DTLOADINGRECORDS}>",
    "processing":     "<{$smarty.const._MD_XOOPSMEMBERS_DTPROCESSING}>",
    "search":         "<{$smarty.const._MD_XOOPSMEMBERS_DTSEARCH}>",
    "zeroRecords":    "<{$smarty.const._MD_XOOPSMEMBERS_DTZERORECORDS}>",
    "paginate": {
        "first":      "<{$smarty.const._MD_XOOPSMEMBERS_DTFIRST}>",
        "last":       "<{$smarty.const._MD_XOOPSMEMBERS_DTLAST}>",
        "next":       "<{$smarty.const._MD_XOOPSMEMBERS_DTNEXT}>",
        "previous":   "<{$smarty.const._MD_XOOPSMEMBERS_DTPREVIOUS}>"
    },
    "aria": {
        "sortAscending":  "<{$smarty.const._MD_XOOPSMEMBERS_DTSORTASCENDING}>",
        "sortDescending": "<{$smarty.const._MD_XOOPSMEMBERS_DTSORTDESCENSING}>"
    }
}
});
} );
</script>



