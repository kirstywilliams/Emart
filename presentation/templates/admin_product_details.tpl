{* admin_product_details.tpl *}
{load_presentation_object filename="admin_product_details" assign="obj"}
<form enctype="multipart/form-data" method="post" action="{$obj->mLinkToProductDetailsAdmin}">
	<div class="innerheading">
		Editing product: ID #{$obj->mStock.itemID} &mdash;
		{$obj->mStock.itemName} [<a href="{$obj->mLinkToCategoryProductsAdmin}">back to products ...</a> ]
	</div>
	{if $obj->mErrorMessage}<div class="errorMessage">{$obj->mErrorMessage}</div>{/if}
	<table class="borderless-records">
		<tbody>
			<tr>
				<td class="leftEdit" valign="top">
					<div class="bold-text">
						Product name:
					</div>
					<div>
						<input type="text" name="name"
						value="{$obj->mStock.itemName}" size="30" />
					</div>
					<div class="bold-text">
						Product brief description:
					</div>
					<div>
						{strip}
							<textarea name="briefDescription" rows="3" cols="40">
								{$obj->mStock.briefDescription}
							</textarea>
						{/strip}
					</div>
					<div class="bold-text">
						Product long description:
					</div>
					<div>
						{strip}
							<textarea name="longDescription" rows="8" cols="40">
								{$obj->mStock.longDescription}
							</textarea>
						{/strip}
					</div>
					<div class="bold-text">
						Product supplier:
					</div>
					<div>
						<input type="text" name="supplier"
						value="{$obj->mStock.supplierID}" size="5" />
					</div>
					<div class="bold-text">
						Product price:
					</div>
					<div>
						<input type="text" name="price"
						value="{$obj->mStock.price}" size="5" />
					</div>
					<div class="bold-text">
						Product discounted price:
					</div>
					<div>
						<input type="text" name="discounted_price"
						value="{$obj->mStock.discountedPrice}" size="5" />
					</div>
					<div>
						<br/>
						<input class="centerBtn" type="submit" name="UpdateProductInfo"
						value="Update info" />
					</div>
				</td>
				<td class="rightEdit" valign="top">
					<div>
						<font class="bold-text">Product belongs to these categories:</font>
						{$obj->mProductCategoriesString}
					</div>
					<div class="bold-text">
						Remove this product from:
					</div>
					<div>
						{html_options name="TargetCategoryIdRemove"
						options=$obj->mRemoveFromCategories}
						<input type="submit" name="RemoveFromCategory" value="Remove"
						{if $obj->mRemoveFromCategoryButtonDisabled}
						disabled="disabled" {/if}/>
					</div>
					<div class="bold-text">
						Assign product to this category:
					</div>
					<div>
						{html_options name="TargetCategoryIdAssign"
						options=$obj->mAssignOrMoveTo}
						<input type="submit" name="Assign" value="Assign" />
					</div>
					<div class="bold-text">
						Move product to this category:
					</div>
					<div>
						{html_options name="TargetCategoryIdMove"
						options=$obj->mAssignOrMoveTo}
						<input type="submit" name="Move" value="Move" />
					</div>
					{if $obj->mProductAttributes}
						<div class="bold-text">
							<br/>
							Product attributes:
						</div>
						<div>
							{html_options name="TargetAttributeValueIdRemove"
							options=$obj->mProductAttributes}
							<input type="submit" name="RemoveAttributeValue"
							value="Remove" />
						</div>
					{/if}
					{if $obj->mCatalogAttributes}
						<div class="bold-text">
							Assign attribute to product:
						</div>
						<div>
							{html_options name="TargetAttributeValueIdAssign"
							options=$obj->mCatalogAttributes}
							<input type="submit" name="AssignAttributeValue"
							value="Assign" />
						</div>
					{/if}
					<div class="bold-text">
						<br/>
						Set display option for this product:
					</div>
					<div>
						{html_options name="ProductDisplay"
						options=$obj->mProductDisplayOptions
						selected=$obj->mStock.display}
						<input type="submit" name="SetProductDisplayOption" value="Set" />
					</div>
					<div>
						<br/>
						<input class="tool-button delete-button" type="submit" name="RemoveFromCatalog"
						value="Remove product from catalog"
						{if !$obj->mRemoveFromCategoryButtonDisabled}
						disabled="disabled" {/if}/>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	<div class="imageEdit">
		<div>
			<font class="bold-text">Thumbnail name:</font> {$obj->mStock.thumbImage}
			<input name="ImageUpload" type="file" value="Upload" />
			<input type="submit" name="Upload" value="Upload" class="tool-button save-button" style="width:100px !important" />
		</div>
		{if $obj->mStock.thumbImage}
			<div>
				<img src="product_images/{$obj->mStock.thumbImage}"
				border="0" alt="{$obj->mStock.itemName} thumbnail" />
			</div>
		{/if}
		<div>
			<br/>
			<font class="bold-text">Large image name:</font> {$obj->mStock.bigImage}
			<input name="Image2Upload" type="file" value="Upload" />
			<input type="submit" name="Upload" value="Upload" class="tool-button save-button" style="width:100px !important" />
		</div>
		{if $obj->mStock.bigImage}
			<div>
				<img src="product_images/{$obj->mStock.bigImage}"
				border="0" alt="{$obj->mStock.itemName} large image" />
			</div>
		{/if}
	</div>
</form>
