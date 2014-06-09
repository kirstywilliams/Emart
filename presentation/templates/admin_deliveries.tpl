{* admin_products.tpl *}
{load_presentation_object filename="admin_deliveries" assign="obj"}
	<div class="innerheading">
		Editing deliveries for supplier:
		{$obj->mSupplierName} [<a href="{$obj->mLinkToSupplierAdmin}">back to supplier ...</a> ]
	</div>
	<form method="post" action="{$obj->mLinkToSupplierDeliveriesAdmin}">
		{if $obj->mErrorMessage}
			<div class="errorMessage">
				{$obj->mErrorMessage}
			</div>
		{/if}
		{if $obj->mDeliveriesCount eq 0}
			<div class="noitemsfound">
				There are no deliveries for this supplier!
			</div><!-- end noitemsfound -->
		{else}
			<table class="records">
				<tr>
					<th class="record-values-d2">Date</th>
					<th class="record-values-d2">Time</th>
					<th class="record-tools">Tools</th>
				</tr>

				{section name=i loop=$obj->mDeliveries}
					<tr>
						<td>{$obj->mDeliveries[i].dateOfDelivery}</td>
						<td>{$obj->mDeliveries[i].timeOfDelivery}</td>
						<td>
							<input class="tool-button edit-button" type="submit" name="submit_edit_del_{$obj->mDeliveries[i].deliveryID}" value="Edit" />
						</td>
					</tr>
				{/section}
			</table>
		{/if}
		<div class="subtitle">
			Add new delivery:
		</div>
		<p class="add-object">
			<input type="text" name="delivery_date" placeholder="[YYYY-MM-DD]" size="25" />
			<input type="text" name="delivery_time" placeholder="[HH:MM:SS]" size="25" />
			<input type="submit" name="submit_add_del_0" value="Add" class="tool-button add-button" />
		</p>
	</form>
