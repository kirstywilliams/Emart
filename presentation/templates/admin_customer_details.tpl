{* admin_customer_details.tpl *}
{load_presentation_object filename="admin_customer_details" assign="obj"}
<form method="post" action="{$obj->mLinkToCustomerAdmin}">
	<div class="innerheading">
		Editing customer: ID #{$obj->mCustomers.customerID}
		[<a href="{$obj->mLinkToCustomersAdmin}">back to customers ...</a> ]
	</div>
	{if $obj->mErrorMessage}<div class="errorMessage">{$obj->mErrorMessage}</div>{/if}
	<table class="borderless-records">
		<tr>
			<td class="bold-text">First name:</td>
			<td><input type="text" name="customer_first_name"
				value="{$obj->mCustomers.firstname}" size="30" />
			</td>
		</tr>
		<tr>
			<td class="bold-text">Surname:</td>
			<td><input type="text" name="customer_surname"
				value="{$obj->mCustomers.surname}" size="30" />
			</td>
		</tr>
		<tr>
			<td class="bold-text">Email address:</td>
			<td><input type="text" name="customer_email"
				value="{$obj->mCustomers.emailAddress}" size="30" />
			</td>
		</tr>
		<tr>
			<td class="bold-text">Password:</td>
			<td><input type="text" name="customer_password"
				value="{$obj->mCustomers.password}" size="30" />
			</td>
		</tr>
		<tr>
			<td class="bold-text">Telephone number:</td>
			<td><input type="text" name="customer_telephone"
				value="{$obj->mCustomers.telephoneNumber}" size="30" />
			</td>
		</tr>
		<tr>
			<td class="bold-text"><div style="float:left">Shipping Address: </div>
			<div style="float:right;text-align:right;margin-right:10px" width="50%">
			Street<br/>
			Town<br/>
			City<br/>
			County<br/>
			Postcode<br/><br/>
			</div></td>
			<td>
				<input name="customer_address_line_one" type="text" size="50"
				value="{$obj->mCustomers.addressLineOne}" /><br/>

				<input name="customer_town" type="text" size="50"
				value="{$obj->mCustomers.town}" /><br/>

				<input name="customer_city" type="text" size="50"
				value="{$obj->mCustomers.city}" /><br/>

				<input name="customer_county" type="text" size="50"
				value="{$obj->mCustomers.county}" /><br/>

				<input name="customer_postcode" type="text" size="25"
				value="{$obj->mCustomers.postcode}" /><br/><br/>
			</td>
		</tr>
		<tr>
			<td></td>
			<td align="right">
				<input class="tool-button save-button" class="centerBtn" type="submit" name="UpdateCustomerInfo"
				value="Update info" />
				<input class="tool-button delete-button" type="submit" name="RemoveFromDatabase"
				value="Remove customer from database" />
			</td>
		</tr>
	</table>
</form>
