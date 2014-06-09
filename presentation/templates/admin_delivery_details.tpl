{* admin_delivery_details.tpl *}
{load_presentation_object filename="admin_delivery_details" assign="obj"}
<form method="post" action="{$obj->mLinkToDeliveryAdmin}">
	<div class="innerheading">
		Editing delivery: ID #{$obj->mDeliveryID}
		[<a href="{$obj->mLinkToSupplierDeliveriesAdmin}">back to deliveries ...</a> ]
	</div>
	{if $obj->mErrorMessage}<div class="errorMessage">{$obj->mErrorMessage}</div>{/if}
	<table class="borderless-records">
		<tr>
			<td class="bold-text">Supplier Name:</td>
			<td>
				<input type="text" value="{$obj->mDeliveries.supplierName}"
				readonly="readonly" />
			</td>
		</tr>
		<tr>
			<td class="bold-text">Date:</td>
			<td><input type="text" name="delivery_date"
				value="{$obj->mDeliveries.dateOfDelivery}" size="30" />
			</td>
		</tr>
		<tr>
			<td class="bold-text">Time:</td>
			<td><input type="text" name="delivery_time"
				value="{$obj->mDeliveries.timeOfDelivery}" size="30" />
			</td>
		</tr>
		<tr>
			<td></td>
			<td align="right">
				<input class="tool-button save-button" type="submit" name="UpdateDeliveryInfo" value="Update info" />
				<input class="tool-button delete-button" type="submit" name="RemoveDelivery"
				value="Remove delivery from database" />
			</td>
		</tr>
	</table>
</form>
