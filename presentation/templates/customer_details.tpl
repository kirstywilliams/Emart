{* customer_details.tpl *}
{load_presentation_object filename="customer_details" assign="obj"}
<h3>Please enter your details:</h3>
<div id="bolded-line"></div>
<form method="post" action="{$obj->mLinkToAccountDetails}">
<table class="standard-table">
	<tr>
		<td>Email Address:</td>
		<td>
			<input class="table-input" type="text" name="email" value="{$obj->mEmail}"
			{if $obj->mEditMode}readonly="readonly"{/if} size="32" />
			{if $obj->mEmailAlreadyTaken}
				<div class="error">A customer with that email address already exists.</div>
			{/if}
			{if $obj->mEmailError}
				<div class="error">You must enter a valid email address.</div>
			{/if}
		</td>
	</tr>
	<tr>
		<td>First name:</td>
		<td>
			<input class="table-input" type="text" name="firstname" value="{$obj->mFirstName}" size="32" />
			{if $obj->mFirstNameError}
				<div class="error">You must enter your first name.</div>
			{/if}
		</td>
	</tr>
	<tr>
		<td>Surname:</td>
		<td>
			<input class="table-input" type="text" name="surname" value="{$obj->mSurname}" size="32" />
			{if $obj->mSurnameError}
				<div class="error">You must enter your surname.</div>
			{/if}
		</td>
	</tr>
	<tr>
		<td>Password:</td>
		<td>
			<input class="table-input" type="password" name="password" size="32" />
			{if $obj->mPasswordError}
				<div class="error">You must enter a password.</div>
			{/if}
		</td>
	</tr>
	<tr>
		<td>Re-enter Password:</td>
		<td>
			<input class="table-input" type="password" name="passwordConfirm" size="32" />
			{if $obj->mPasswordConfirmError || $obj->mPasswordMatchError}
				<div class="error">You must re-enter your password.</p>
			{/if}
		</td>
	</tr>
	<tr>
		<td>Street Address:</td>
		<td>
			<input class="table-input" type="text" name="addressLineOne" value="{$obj->mAddressLineOne}" size="32" />
			{if $obj->mAddressLineOneError}
				<div class="error">You must enter your street address.</div>
			{/if}
		</td>
	</tr>
	<tr>
		<td>Town:</td>
		<td>
			<input class="table-input" type="text" name="town" value="{$obj->mTown}" size="32" />
			{if $obj->mTownError}
				<div class="error">You must enter your town.</div>
			{/if}
		</td>
	</tr>
	<tr>
		<td>City</td>
		<td>
			<input class="table-input" type="text" name="city" value="{$obj->mCity}" size="32" />
			{if $obj->mCityError}
				<div class="error">You must enter your city.</div>
			{/if}
		</td>
	</tr>
	<tr>
		<td>County:</td>
		<td>
			<input class="table-input" type="text" name="county" value="{$obj->mCounty}" size="32" />
			{if $obj->mCountyError}
				<div class="error">You must enter your county.</div>
			{/if}
		</td>
	</tr>
	<tr>
		<td>Post Code:</td>
		<td>
			<input class="table-input" type="text" name="postcode" value="{$obj->mPostCode}" size="12" />
			{if $obj->mPostCodeError}
				<div class="error">You must enter your post code.</div>
			{/if}
		</td>
	</tr>
	<tr>
		<td>Telephone:</td>
		<td>
			<input class="table-input" type="text" name="telephone" value="{$obj->mTelephone}"
			size="32" />
			{if $obj->mTelephoneError}
				<div class="error">You must enter your telephone number.</div>
			{/if}
		</td>
	</tr>
</table>
<div style="text-align:center; margin-top:10px;">
	<input class="button light" type="submit" name="sendit" value="Confirm" /> |
	<a href="{$obj->mLinkToCancelPage}">Cancel</a>
</div>
</form>