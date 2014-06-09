{* admin_warehouse.tpl *}
{load_presentation_object filename="admin_stock_control" assign="obj"}
	<div class="heading">eMart Stock</div>
	<form method="post" action="{$obj->mLinkToStockControlAdmin}">
	{if $obj->mErrorMessage}
		<div class="errorMessage">
			{$obj->mErrorMessage}
		</div>
	{/if}
	{if $obj->mStock}
		<table class="records">
			<tr>
				<th class="record-values-d3">Item ID</th>
				<th class="record-values-d3">Item Name</th>
				<th class="record-values-d3">Status</th>
				<th class="record-tools">Tools</th>
			</tr>
			{section name=i loop=$obj->mStock}
				{assign var=status value=$obj->mStock[i].status}
				<tr>
				<td>{$obj->mStock[i].itemID}</td>
				<td>{$obj->mStock[i].itemName}</td>
				{if $obj->mStock[i].status == 'Stocked'}
					<td>{$obj->mStockStatusOptions[0]}</td>
				{elseif $obj->mStock[i].status == 'Medium'}
					<td>{$obj->mStockStatusOptions[1]}</td>
				{elseif $obj->mStock[i].status == 'Reorder'}
					<td>{$obj->mStockStatusOptions[2]}</td>
				{elseif $obj->mStock[i].status == 'OutOfStock'}
					<td>{$obj->mStockStatusOptions[3]}</td>
				{/if}
				<td align="right">
					<input class="tool-button" type="submit" name="submit_edit_prod_{$obj->mStock[i].itemID}" value="View Details" />
				</td>
				</tr>
			{/section}
		</table>
	{/if}
	</form>
