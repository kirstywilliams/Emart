{* checkout_info.tpl *}
{load_presentation_object filename="checkout_info" assign="obj"}
<form method="post" action="{$obj->mLinkToCheckout}">
<h3>Your order consists of the following items:</>
<table class="standard-table">
	<tr>
		<th>Product Name</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>Subtotal</th>
	</tr>
	{section name=i loop=$obj->mCartItems}
		<tr>
			<td>{$obj->mCartItems[i].itemName} <br/>{$obj->mCartItems[i].attributes}</td>
			<td>{$obj->mCartItems[i].price}</td>
			<td>{$obj->mCartItems[i].quantity}</td>
			<td>{$obj->mCartItems[i].subtotal}</td>
		</tr>
	{/section}
</table>
<div>
	Total amount:
	<font class="price">&pound{$obj->mTotalAmount}<br/><br/></font>
</div>
{if $obj->mNoCreditCard == 'yes'}
	<div class="error">No credit card details stored.</div>
{else}
	<div>{$obj->mCreditCardNote}<br/><br/></div>
{/if}
{if $obj->mNoShippingAddress == 'yes'}
	<div class="error">Shipping address required to place order.</div>
{else}
	<div>
		Shipping address: <br/>
		&nbsp;{$obj->mCustomerData.addressLineOne}<br/>
		&nbsp;{$obj->mCustomerData.town}<br/>
		&nbsp;{$obj->mCustomerData.city}<br/>
		&nbsp;{$obj->mCustomerData.county}<br/>
		&nbsp;{$obj->mCustomerData.postcode}<br/><br/>
	</div>
{/if}
{if $obj->mNoCreditCard!= 'yes' && $obj->mNoShippingAddress != 'yes'}
	<div>
		Shipping type:
		<select name="shipping">
		{section name=i loop=$obj->mShippingInfo}
			<option value="{$obj->mShippingInfo[i].shippingID}">
				{$obj->mShippingInfo[i].shippingType}
			</option>
		{/section}
		</select>
	</div>
{/if}
<input type="submit" name="place_order" value="Place Order"
{$obj->mOrderButtonVisible} /> |
<a href="{$obj->mLinkToCart}">Edit Shopping Cart</a> |
<a href="{$obj->mLinkToContinueShopping}">Continue Shopping</a>
</form>