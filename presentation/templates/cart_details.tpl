{* cart_details.tpl *}
{load_presentation_object filename="cart_details" assign="obj"}
<div id="updating">Updating...</div>
{if $obj->mIsCartNowEmpty eq 1}
	<h2>Your shopping cart is empty!<h2>
      <div id="bolded-line"></div>
{else}
	<h3>These are the products in your shopping cart:</h3>
    <div id="bolded-line"></div>
	<form class="cart-form" method="post" action="{$obj->mUpdateCartTarget}"
	onsubmit="return executeCartAction(this);">
		<table class="standard-table">
			<tr>
				<th>Product Name</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Subtotal</th>
				<th width="100px">Tools</th>
			</tr>
			{section name=i loop=$obj->mCartProducts}
				<tr>
					<td>
						<input name="productId[]" type="hidden"
							value="{$obj->mCartProducts[i].productID}" />
						{$obj->mCartProducts[i].itemName}<br/>
						{$obj->mCartProducts[i].attributes}
					</td>
					<td>&pound{$obj->mCartProducts[i].price}</td>
					<td>
						<input type="text" name="quantity[]" size="5"
							value="{$obj->mCartProducts[i].quantity}" />
					</td>
					<td>&pound{$obj->mCartProducts[i].subtotal}</td>
					<td>
						<a href="{$obj->mCartProducts[i].save}"
							onclick="return executeCartAction(this);">Save for later</a>
						<a href="{$obj->mCartProducts[i].remove}"
							onclick="return executeCartAction(this);">Remove</a>
					</td>
				</tr>
			{/section}
		</table>
		<table class="standard-table">
			<tr>
				<td align="right">
                	Total amount: &pound{$obj->mTotalAmount}
					<input style="margin-left:20px;" class="button light" type="submit" name="update" value="Update" />
				</td>
				{if $obj->mShowCheckoutLink}
					<td align="right">
						<a href="{$obj->mLinkToCheckout}">Checkout</a>
					</td>
				{/if}
			</tr>
		</table>
	</form>
{/if}

{if ($obj->mIsCartLaterEmpty eq 0)}
	<br/><br/>
	<h3>Saved products to buy later:</h3>
	<table class="standard-table">
		<tr>
			<th>Product Name</th>
			<th>Price</th>
			<th width="100px">Tools</th>
		</tr>
		{section name=j loop=$obj->mSavedCartProducts}
			<tr>
				<td>
					{$obj->mSavedCartProducts[j].itemName}<br/>
					{$obj->mSavedCartProducts[j].attributes}
				</td>
				<td>
					&pound{$obj->mSavedCartProducts[j].price}
				</td>
				<td>
					<a href="{$obj->mSavedCartProducts[j].move}"
						onclick="return executeCartAction(this);">Move to cart</a>
					<a href="{$obj->mSavedCartProducts[j].remove}"
						onclick="return executeCartAction(this);">Remove</a>
				</td>
			</tr>
		{/section}
	</table>
{/if}
{if $obj->mLinkToContinueShopping}
	<p><a href="{$obj->mLinkToContinueShopping}">Continue Shopping </a></p>
{/if}