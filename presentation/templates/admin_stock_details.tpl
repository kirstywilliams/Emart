{* admin_sTOCK_details.tpl *}
{load_presentation_object filename="admin_stock_details" assign="obj"}
<form method="post" action="{$obj->mLinkToStockDetailsAdmin}">
	<div class="innerheading">
		Editing item: ID #{$obj->mItemID}
		[<a href="{$obj->mLinkToStockControlAdmin}">back to stock control ...</a> ]
	</div>
	{if $obj->mErrorMessage}<div class="errorMessage">{$obj->mErrorMessage}</div>{/if}
	<table class="borderless-records">
		<tr>
			<td class="bold-text">Item Name:</td>
			<td><input type="text" name="item_name" disabled="disabled"
				value="{$obj->mStockDetails.itemName}" size="30" />
			</td>
		</tr>
		<tr>
			<td class="bold-text">Current Quantity:</td>
			<td><input type="text" name="current_qty"
				value="{$obj->mStockDetails.currentQuantity}" size="30" />
			</td>
		</tr>
		<tr>
			<td class="bold-text">Ideal Quantity:</td>
			<td><input type="text" name="ideal_qty"
				value="{$obj->mStockDetails.idealQuantity}" size="30" />
			</td>
		</tr>
		<tr>
			<td class="bold-text">Status: </td>
			<td>
				<select name="status" disabled="disabled" >
					{if $obj->mStockDetails.status == 'Stocked'}
						{assign var=selected value=0}
					{elseif $obj->mStockDetails.status == 'Medium'}
						{assign var=selected value=1}
					{elseif $obj->mStockDetails.status == 'Reorder'}
						{assign var=selected value=2}
					{elseif $obj->mStockDetails.status == 'OutOfStock'}
						{assign var=selected value=3}
					{/if}

					{html_options options=$obj->mStockStatusOptions
					selected=$selected}
				</select>
			</td>
		</tr>
		<tr>
			<td class="bold-text">Supplier ID:</td>
			<td><input type="text" name="supplier" disabled="disabled"
				value="{$obj->mStockDetails.supplierID}" size="30" />
			</td>
		</tr>
		<tr>
			<td></td>
			<td align="right">
				<input class="tool-button save-button" type="submit" name="UpdateStockInfo" value="Update info" />
			</td>
		</tr>
	</table>
</form>
