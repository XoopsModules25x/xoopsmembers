<div class='text-center'>
	<{$smarty.const._MB_XOOPSMEMBERS_WELCOME}><br>
	<a href="<{$xoops_url}>/edituser.php?op=avatarform" alt="<{$block.membername}>" title="<{$block.membername}>">
		<img src="<{$xoops_url}>/uploads/<{$block.user_avatar}>" title="<{$block.membername}>" alt="<{$block.membername}>" class="img-thumbnail" width="150" height="150"/>
	</a>
	<br><{$block.membername}>             

<{if $block.showrank == 1}>
			<table class="table text-center">
			<tr>
				<td><img src="<{$xoops_url}>/uploads/<{$block.rankimage}>"><br><{$block.ranktitle}></td>
			</tr>
			</table>
<{/if}>
</div>