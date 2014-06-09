{* cart_summary.tpl *}
{load_presentation_object filename="cart_summary" assign="obj"}
{* Start cart summary *}
	<div class="box" id="cart-summary">
		<h3>Cart Summary</h3>
		<div id="updating">Updating...</div>
		{if $obj->mEmptyCart}
			<div class="empty-cart">Your shopping cart is empty!</div>
		{else}
			<table class="cart-summary standard-table">
				<tbody>
					{section name=i loop=$obj->mItems}
						<tr>
							<td width="30" valign="top" align="right">
								{$obj->mItems[i].quantity} x
							</td>
							<td class="cart-summary-attributes">
								{$obj->mItems[i].itemName} <br/>{$obj->mItems[i].attributes}
							</td>
						</tr>
					{/section}
					<tr>
						<td colspan="2">
							<span class="price">&pound{$obj->mTotalAmount}
                            </span>
							<span style="float:right">
								[ <a href="{$obj->mLinkToCartDetails}">View details</a> ]
							</span>
						</td>
					</tr>
				</tbody>
			</table>
		{/if}
	</div>
{* End cart summary *}