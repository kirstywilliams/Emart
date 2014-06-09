{* admin_products.tpl *}
{load_presentation_object filename="admin_products" assign="obj"}
	<div class="innerheading">
		Editing products for category:
		{$obj->mCategoryName} [<a href="{$obj->mLinkToDepartmentCategoriesAdmin}">back to categories ...</a> ]
	</div>
	<form method="post" action="{$obj->mLinkToCategoryProductsAdmin}">
		{if $obj->mErrorMessage}
			<div class="errorMessage">
				{$obj->mErrorMessage}
			</div>
		{/if}
		{if $obj->mProductsCount eq 0}
			<div class="noitemsfound">
				There are no products in this category!
			</div><!-- end noitemsfound -->
		{else}
			<table class="records">
				<tr>
				<th class="record-values-d5">Name</th>
				<th class="record-values-d5">Brief Description</th>
				<th class="record-values-d5">Long Description</th>
				<th class="record-values-d5">Price</th>
				<th class="record-values-d5">Discounted Price</th>
				<th class="record-values-tools">Tools</th>
				</tr>

				{section name=i loop=$obj->mStock}
					<tr>
						<td>{$obj->mStock[i].itemName}</td>
						<td>{$obj->mStock[i].briefDescription}</td>
						<td>{$obj->mStock[i].longDescription}</td>
						<td>{$obj->mStock[i].price}</td>
						<td>{$obj->mStock[i].discountedPrice}</td>
						<td>
							<input class="tool-button edit-button" type="submit" name="submit_edit_prod_{$obj->mStock[i].itemID}" value="Edit" />
						</td>
					</tr>
				{/section}
			</table>
		{/if}
		<div class="subtitle">
			Add new product:
		</div>
		<p class="add-object">
			<input type="text" name="product_name" placeholder="[name]" size="25" />
			<input type="text" name="product_brief_description" placeholder="[brief description]" size="25" />
			<input type="text" name="product_long_description" placeholder="[long description]" size="55" />
			<input type="text" name="product_price" placeholder="[price]" size="7" />
			<input type="text" name="current_qty" placeholder="[current quantity]" size="25" />
			<input type="text" name="ideal_qty" placeholder="[ideal quantity]" size="25" />
			<input type="submit" name="submit_add_prod_0" value="Add" class="tool-button add-button" />
		</p>
	</form>
