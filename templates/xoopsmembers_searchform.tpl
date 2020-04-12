<{if $displaybreadcrumb == 1}>
	<a href="index.php"><{$smarty.const._MD_XOOPSMEMBERS_MEMBERSLIST}></a>&nbsp;&raquo;&nbsp;<a href="searchmembers.php"><{$smarty.const._MD_XOOPSMEMBERS_SEARCH}></a>&nbsp;<span style="font-weight:bold;">&raquo;</span><br />
<{/if}>

<h4><{$smarty.const._MD_XOOPSMEMBERS_SEARCH}></h4>
<{if $displaytotalmember == 1}>
	<{$smarty.const._MD_XOOPSMEMBERS_TOTALUSERS}> <{$totalmember}>
<{/if}>

<{$searchform.javascript}>
<b><{$searchform.title}></b>
<br><br>
<form name="<{$searchform.name}>" action="<{$searchform.action}>" method="<{$searchform.method}>" <{$searchform.extra}>>
    <table class="outer" cellpadding="4" cellspacing="1">
        <!-- start of form elements loop -->
        <{foreach item=element from=$searchform.elements}>
            <{if $element.hidden != true}>
                <tr>
                    <td class="head"><b><{$element.caption}></b></td>
                    <td class="<{cycle values="even,odd"}>"><{$element.body}></td>
                </tr>
            <{else}>
                <{$element.body}>
            <{/if}>
        <{/foreach}>
        <!-- end of form elements loop -->
    </table>
</form>
