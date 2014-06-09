{* contact_us.tpl *}
{load_presentation_object filename="contact_us" assign="obj"}
<h1>Contact us</h1>
<div id="bolded-line"></div>
{if $obj->mErrorMessage}
	<div class="error">
		{$obj->mErrorMessage}
	</div>
{/if}
<div class="info">
	<form id="contact_form" name="contact_form" action="{$obj->mLinkToContactUs}" method="POST">
		<label class="contact_label">Name
			<span class="contact_small">Add your name</span>
		</label><input type="text" name="name" {if $obj->mErrorMessage}value="{$obj->mName}"{/if}/><br/>
		<label class="contact_label">Email
			<span class="contact_small">Enter a Valid Email</span>
		</label><input type="text" name="email" {if $obj->mErrorMessage}value="{$obj->mEmail}"{/if}/><br/>
		<label class="contact_label">Message
			<span class="contact_small">Type Your Message</span>
		</label><textarea name="message" rows="10" cols="23">{if $obj->mErrorMessage}{$obj->mMessage}{/if}</textarea><br/>
		<button class="button light" type="submit" name="contact_us" value="contact_us">Submit</button>                        
	</form>
</div>