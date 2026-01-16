{if $msgs->isMessage()}
<div class="messages bottom-margin">
	<ul>
	{foreach $msgs->getMessages() as $msg}
	<li class="msg {if $msg->type==2}error{/if} {if $msg->type==1}warning{/if} {if $msg->type==0}info{/if}">
        {$msg->text}
    </li>
	{/foreach}
	</ul>
</div>
{/if}