{load_presentation_object filename="product" assign="obj"}
<h2>{$obj->mStock.itemName}</h2>
<div class="standard-table">
	{if $obj->mStock.bigImage}
		<img class="product-image" src="{$obj->mStock.bigImage}"
		alt="{$obj->mStock.itemName} image" />
	{/if}
	<div class="producttext">
		{if $obj->mStock.longDescription != ''}
			<div class="productdescription">{$obj->mStock.longDescription}</div>
		{/if}
		
		<div class="productprice">
			{if $obj->mStock.discountedPrice != 0}
				<span class="old-price">Old Price: &pound{$obj->mStock.price}<br/></span>
				<span class="price">Price: &pound{$obj->mStock.discountedPrice}</span>
			{else}
				<span class="price">Price: &pound{$obj->mStock.price}</span>
			{/if}
		</div>
		
		{* The Add to Cart form *}
		<form class="add-product-form" target="_self" method="post"
					action="{$obj->mStock.link_to_add_product}"
					onsubmit="return addProductToCart(this);">
					
			{* Generate the list of attribute values *}
			<div class="attributes">
				{* Parse the list of attributes and attribute values *}
				{section name=k loop=$obj->mStock.attributes}
					{* Generate a new select tag? *}
					{if $smarty.section.k.first ||
					$obj->mStock.attributes[k].attribute_name !==
					$obj->mStock.attributes[k.index_prev].attribute_name}
						{$obj->mStock.attributes[k].attribute_name}:
						<select class="table-input" name="attr_{$obj->mStock.attributes[k].attribute_name}">
					{/if}
					
					{* Generate a new option tag *}
					<option value="{$obj->mStock.attributes[k].attribute_value}">
						{$obj->mStock.attributes[k].attribute_value}
					</option>
					
					{* Close the select tag? *}
					{if $smarty.section.k.last ||
					$obj->mStock.attributes[k].attribute_name !==
					$obj->mStock.attributes[k.index_next].attribute_name}
						</select>
					{/if}
				{/section}
			</div>
			
			{* Add the submit button and close the form *}
			<p>
            	<br/>
				<input class="button light" type="submit" name="add_to_cart" value="Add to Cart" />
			</p>
		</form>
		{* Show edit button for administrators *}
		{if $obj->mShowEditButton}
			<form action="{$obj->mEditActionTarget}" target="_self"
			method="post" class="edit-form">
				<div>
					<input class="button light" type="submit" name="submit_edit" value="Edit Product Details" />
				</div>
			</form>
		{/if}
	</div>	
	{if $obj->mLinkToContinueShopping}
		<a class="shoppingnav" href="{$obj->mLinkToContinueShopping}">Continue Shopping</a>
	{/if}
	
	<div class="subtitle">Find similar products in our catalog:</div>
		{section name=i loop=$obj->mLocations}
			<div class="shoppingnav">
				{strip}
						<a href="{$obj->mLocations[i].link_to_department}">
						{$obj->mLocations[i].department_name}
						</a>
				{/strip}
				&raquo;
				{strip}
						<a href="{$obj->mLocations[i].link_to_category}">
						{$obj->mLocations[i].category_name}
						</a>
				{/strip}
			</div>
		{/section}
</div>