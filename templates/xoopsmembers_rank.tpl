<{if $displaybreadcrumb == 1}>
	<a href="index.php"><{$smarty.const._MD_XOOPSMEMBERS_MEMBERSLIST}></a>&nbsp;&raquo;&nbsp;<a href="rank.php"><{$smarty.const._MD_XOOPSMEMBERS_USERRANK}></a>&nbsp;<br />
<{/if}>

<h4><{$smarty.const._MD_XOOPSMEMBERS_MRANK}></h4><br>
<div class="table-responsive">
<table class="table table-striped table-hover">
	<thead>
    <tr align="center">
        <th><{$smarty.const._MD_XOOPSMEMBERS_RANK}></th>
        <th><{$smarty.const._MD_XOOPSMEMBERS_MINPOST}></th>
        <th><{$smarty.const._MD_XOOPSMEMBERS_MAXPOST}></th>
        <th><{$smarty.const._MD_XOOPSMEMBERS_IMAGE}></th>
    </tr>
	</thead>
	<tbody>
    <{foreach item=rank from=$ranks}>
    <tr align="center">
        <td><{$rank.title}></td>
        <td><{$rank.min}></td>
        <td><{$rank.max}></td>
        <td><{$rank.image}></td>
    </tr>
    <{/foreach}>
	</tbody>
</table>
</div>
<br>

<div class="table-responsive">
<table class="table table-striped table-hover">
    <thead>
	<tr align="center">
        <th><{$smarty.const._MD_XOOPSMEMBERS_SRANK}></th>
        <th><{$smarty.const._MD_XOOPSMEMBERS_IMAGE}></th>
    </tr>
	<thead>
	<tbody>
    <{foreach item=rank from=$sranks}>
    <tr align="center">
        <td><{$rank.title}></td>
        <td><{$rank.image}></td>
    </tr>
    <{/foreach}>
	</tbody>
</table>
</div>