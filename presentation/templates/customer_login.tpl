{* customer_login.tpl *}
{load_presentation_object filename="customer_login" assign="obj"}
<div class="box">
	<h3>Login</h3>
	<form method="post" action="{$obj->mLinkToLogin}">
		{if $obj->mErrorMessage}<div class="error">{$obj->mErrorMessage}</div>{/if}
		<div>
			<label for="email">E-mail address:</label>
			<input type="text" name="email" size="18"
			value="{$obj->mEmail}" />
		</div>
		<div>
			<label for="password">Password:</label>
			<input type="password" name="password" size="18" />
		</div>
		<div>
			<br/>
			<input class="button light" type="submit" name="Login" value="Login" /> |
			<a href="{$obj->mLinkToRegisterCustomer}">Register</a>
		</div>
		<div>
        <br/>
			<input class="button light" name="forgot" type="submit" id="fpwd" value="Forgotten Password?" />
		</div>
	</form>
</div>