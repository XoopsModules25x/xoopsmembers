<div class="container-fluid">
	<div class="row row-cols-5">
			<{foreach item=recentlogin from=$block.recentlogin}>
               <div class="col text-center p-2">
					<{if $block.showrecentloginavatar == 1}>
						<a href='<{$xoops_url}>/userinfo.php?uid=<{$recentlogin.uid}>' target='_blank'><img src='<{$xoops_url}>/uploads/<{$recentlogin.user_avatar}>' class='rounded-circle' title='<{$recentlogin.name}> | Logged In <{$recentlogin.sincelastlogin}>' border='0' alt='<{$recentlogin.uname}>' height='48' width='48'></a>
					<{/if}>

					<{if $block.showrecentloginname == 1}>
						<a href='<{$xoops_url}>/userinfo.php?uid=<{$recentlogin.uid}>' target='_blank' title='<{$recentlogin.name}> | Logged In <{$recentlogin.sincelastlogin}>'><br><small><{$recentlogin.name}></small></a>
					<{/if}>
                </div>
            <{/foreach}>
	</div>
</div>
