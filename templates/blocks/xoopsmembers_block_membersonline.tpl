<div class="container-fluid">		
	<div class="row">	
			<{if $block.showtotalonline == 1}>
			<{$block.online_guests}> <{$block.online_members}> 
			<{/if}>
	</div>
	
	<{if $block.showonlinemember == 1}>	
	<div class="row row-cols-5">
					<div class="col text-center p-2">
					<{if $block.showonlineavatar == 1}>
						<a href='<{$xoops_url}>/userinfo.php?uid=<{$block.uid}>' target='_blank'><img src='<{$xoops_url}>/uploads/<{$block.avatar}>' class='rounded-circle' title='<{$block.name}>' border='0' alt='<{$block.uname}>' height='48' width='48'></a>
					<{/if}>
					<{if $block.showonlinename == 1}>
						<a href='<{$xoops_url}>/userinfo.php?uid=<{$block.uid}>' target='_blank' title='<{$block.name}>'><br><small><{$block.name}></small></a>
					<{/if}>	
					</div>	
	</div>
	<{/if}>	

			<{if $block.showonlinepopup == 1}>
			<a href="javascript:openWithSelfMain('<{$xoops_url}>/misc.php?action=showpopups&amp;type=online','Online',420,350);" class="btn btn-info btn-sm"><{$smarty.const._MB_XOOPSMEMBERS_MORE}></a>
			<{/if}>
</div>




