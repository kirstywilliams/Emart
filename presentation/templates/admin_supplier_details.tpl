{* admin_supplier_details.tpl *}
{load_presentation_object filename="admin_supplier_details" assign="obj"}
<form method="post" action="{$obj->mLinkToSupplierAdmin}">
	<div class="innerheading">
		Editing supplier: ID #{$obj->mSuppliers.supplierID}
		[<a href="{$obj->mLinkToSuppliersAdmin}">back to suppliers ...</a> ]
	</div>
	{if $obj->mErrorMessage}<div class="errorMessage">{$obj->mErrorMessage}</div>{/if}
	<table class="borderless-records">
		<tr>
			<td class="bold-text">Company Name:</td>
			<td><input type="text" name="supplier_name"
				value="{$obj->mSuppliers.supplierName}" size="30" />
			</td>
		</tr>
		<tr>
			<td class="bold-text">Email address:</td>
			<td><input type="text" name="supplier_email"
				value="{$obj->mSuppliers.emailAddress}" size="30" />
			</td>
		</tr>
		<tr>
			<td class="bold-text">Telephone number:</td>
			<td><input type="text" name="supplier_telephone"
				value="{$obj->mSuppliers.telephoneNumber}" size="30" />
			</td>
		</tr>
		<tr>
			<td class="bold-text"><div style="float:left">Company Address: </div>
			<div style="float:right;text-align:right;margin-right:10px" width="50%">
			Street<br/>
			Town<br/>
			City<br/>
			County<br/>
			Postcode<br/><br/>
			</div></td>
			<td>
				<input name="supplier_address_line_one" type="text" size="50"
				value="{$obj->mSuppliers.addressLineOne}" /><br/>

				<input name="supplier_town" type="text" size="50"
				value="{$obj->mSuppliers.town}" /><br/>

				<input name="supplier_city" type="text" size="50"
				value="{$obj->mSuppliers.city}" /><br/>

				<input name="supplier_county" type="text" size="50"
				value="{$obj->mSuppliers.county}" /><br/>

				<input name="supplier_postcode" type="text" size="25"
				value="{$obj->mSuppliers.postcode}" /><br/><br/>
			</td>
		</tr>
		<tr>
			<td></td>
			<td align="right">
				<input class="tool-button" type="submit" name="EditSupplierDeliveries" value="View Deliveries" />
				<input class="tool-button save-button" type="submit" name="UpdateSupplierInfo" value="Update info" />
				<input class="tool-button delete-button" style="color:red; font-weight:bold" type="submit" name="RemoveFromDatabase"
				value="Remove supplier from database" />
			</td>
		</tr>
	</table>
</form>
