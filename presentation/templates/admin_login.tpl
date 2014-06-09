{* admin_login.tpl *}
{load_presentation_object filename="admin_login" assign="obj"}
<div class="heading">Site Administrator Login</div>
<div id="loginsubtitle">Enter login information or go back to
	<a href="{$obj->mLinkToIndex}">eMart Storefront</a>.
</div>
<form id="adminloginform" method="post" action="{$obj->mLinkToAdmin}">
	{if $obj->mLoginMessage neq ""}
		<div class="errorMessage" align="center">{$obj->mLoginMessage}</div>
	{/if}
    <label class="textlabel" for="username">Username:&nbsp;&nbsp;</label>
	<input name="username" type="text" class="textbox" value="{$obj->mUsername}" /><br/><br/>
   	<label class="textlabel" for="password">Password:&nbsp;&nbsp;&nbsp;</label>
	<input name="password" type="password" class="textbox" value="" /><br/><br/>
	<input name="submit" type="submit" id="btnLogin" value="Login" class="tool-button save-button" />
	<input name="forgot" type="submit" id="fpwd" value="Forgotten Password?" class="tool-button" />
</form>
