 {* admin_shipping.tpl *}
{load_presentation_object filename="admin_shipping" assign="obj"}
	<div class="heading">eMart Shipping Methods</div>
	<form method="post" action="{$obj->mLinkToShippingAdmin}">
		{if $obj->mErrorMessage}
			<div class="errorMessage">
				{$obj->mErrorMessage}
			</div>
		{/if}
		{if $obj->mShippingCount eq 0}
			<div class="noitemsfound">
				There are no shipping methods in your database!
			</div><!-- end noitemsfound -->
		{else}
			<table class="records">
				<tr>
				<th class="record-values-d2">Shipping Type</th>
				<th class="record-values-d2">Shipping Cost</th>
				<th class="record-tools">Tools</th>
				</tr>
				{section name=i loop=$obj->mShipping}
					{if $obj->mEditShipping == $obj->mShipping[i].shippingID}
						<tr>
							<td>
								<input type="text" name="type" value="{$obj->mShipping[i].shippingType}" size="30" />
							</td>
							<td>
								<input type="text" name="cost" value="{$obj->mShipping[i].shippingCost}" size="30" />
							</td>
							<td>
								<input class="tool-button save-button" type="submit" name="submit_update_ship_{$obj->mShipping[i].shippingID}" value="Update" />
								<input class="tool-button" type="submit" name="cancel" value="Cancel" />
								<input class="tool-button delete-button" type="submit" name="submit_delete_ship_{$obj->mShipping[i].shippingID}" value="Delete" />
							</td>
						</tr>
					{else}
						<tr>
							<td>{$obj->mShipping[i].shippingType}</td>
							<td>{$obj->mShipping[i].shippingCost}</td>
							<td>
								<input class="tool-button edit-button" type="submit" name="submit_edit_ship_{$obj->mShipping[i].shippingID}" value="Edit" />
								<input class="tool-button delete-button" type="submit" name="submit_delete_ship_{$obj->mShipping[i].shippingID}" value="Delete" />
							</td>
						</tr>
					{/if}
				{/section}
			</table>
		{/if}
		<div class="subtitle">
			Add new shipping type:
		</div>
		<p class="add-object">
			<input type="text" name="shipping_type" placeholder="[type]" size="30" />
			<input type="text" name="shipping_cost" placeholder="[cost]" size="30" />
			<input type="submit" name="submit_add_ship_0" value="Add" class="tool-button add-button" />
		</p>
	</form>
