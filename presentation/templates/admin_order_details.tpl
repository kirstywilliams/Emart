{* admin_order_details.tpl *}
{load_presentation_object filename="admin_order_details" assign="obj"}
	<div class="innerheading">
		Editing details for order ID: {$obj->mOrderInfo.orderID} [
		<a href="{$obj->mLinkToOrdersAdmin}">back to admin orders...</a> ]
	</div>
	<form method="get" action="{$obj->mLinkToAdmin}">
		<input type="hidden" name="Page" value="OrderDetails" />
		<input type="hidden" name="OrderId" value="{$obj->mOrderInfo.orderID}" />
		<table class="borderless-records">
			<tr>
				<td class="bold-text">Total Amount: </td>
				<td class="price">
					&pound{$obj->mOrderInfo.totalAmount}
				</td>
			</tr>
			<tr>
				<td class="bold-text">Shipping: </td>
				<td class="price">{$obj->mOrderInfo.shippingType}</td>
			</tr>
			<tr>
				<td class="bold-text">Date Created: </td>
				<td>
					{$obj->mOrderInfo.createdOn|date_format:"%Y-%m-%d %T"}
				</td>
			</tr>
			<tr>
				<td class="bold-text">Date Shipped: </td>
				<td>
					{$obj->mOrderInfo.shippedOn|date_format:"%Y-%m-%d %T"}
				</td>
			</tr>
			<tr>
				<td class="bold-text">Status: </td>
				<td>
				<select name="status" {if !$obj->mEditEnabled} disabled="disabled" {/if}" >
					{if $obj->mOrderInfo.orderStatus == 'Received'}
						{assign var=selected value=0}
					{elseif $obj->mOrderInfo.orderStatus == 'Checking Funds'}
						{assign var=selected value=1}
					{elseif $obj->mOrderInfo.orderStatus == 'Notifying Stock Check'}
						{assign var=selected value=2}
					{elseif $obj->mOrderInfo.orderStatus == 'Awaiting Stock Confirmation'}
						{assign var=selected value=3}
					{elseif $obj->mOrderInfo.orderStatus == 'Awaiting Payment'}
						{assign var=selected value=4}
					{elseif $obj->mOrderInfo.orderStatus == 'Notifying Warehouse Despatch'}
						{assign var=selected value=5}
					{elseif $obj->mOrderInfo.orderStatus == 'Awaiting Despatch Confirmation'}
						{assign var=selected value=6}
					{elseif $obj->mOrderInfo.orderStatus == 'Notifying Customer'}
						{assign var=selected value=7}	
					{elseif $obj->mOrderInfo.orderStatus == 'Complete'}
						{assign var=selected value=8}
					{elseif $obj->mOrderInfo.orderStatus == 'Cancelled'}
						{assign var=selected value=9}
					{/if}
			
					{html_options options=$obj->mOrderStatusOptions
					selected=$selected}
				</select>
				</td>
			</tr>
			<tr>
				<td class="bold-text">Authorization Code: </td>
				<td>
					<input name="authCode" type="text" size="50"
					value="{$obj->mOrderInfo.authCode}"
					{if ! $obj->mEditEnabled} disabled="disabled" {/if} />
				<td>
			</tr>
			<tr>
				<td class="bold-text">Reference Number: </td>
				<td>
					<input name="reference" type="text" size="50"
					value="{$obj->mOrderInfo.reference}"
					{if ! $obj->mEditEnabled} disabled="disabled" {/if} />
				<td>
			</tr>
			<tr>
				<td class="bold-text">Comments: <br/><br/></td>
				<td>
					<input name="comments" type="text" size="50"
					value="{$obj->mOrderInfo.comments}"
					{if ! $obj->mEditEnabled} disabled="disabled" {/if} /><br/><br/>
				<td>
			</tr>
			<tr>
				<td class="bold-text">Customer Name: <br/><br/></td>
				<td>
					<input name="customerFirstName" type="text" size="50"
					value="{$obj->mOrderInfo.firstname}"
					{if ! $obj->mEditEnabled} disabled="disabled" {/if} /><br/>
					
					<input name="customerSurname" type="text" size="50"
					value="{$obj->mOrderInfo.surname}"
					{if ! $obj->mEditEnabled} disabled="disabled" {/if} /><br/><br/>
				</td>
			</tr>
			<tr>
				<td class="bold-text"><div style="float:left">Shipping Address: </div>
				<div style="float:right;text-align:right;margin-right:10px" width="50%">
				Street<br/>
				Town<br/>
				City<br/>
				County<br/>
				Postcode<br/><br/>
				</div></td>
				<td>
					<input name="addressLineOne" type="text" size="50"
					value="{$obj->mOrderInfo.addressLineOne}"
					{if ! $obj->mEditEnabled} disabled="disabled" {/if} /><br/>
					
					<input name="addressTown" type="text" size="50"
					value="{$obj->mOrderInfo.town}"
					{if ! $obj->mEditEnabled} disabled="disabled" {/if} /><br/>
					
					<input name="addressCity" type="text" size="50"
					value="{$obj->mOrderInfo.city}"
					{if ! $obj->mEditEnabled} disabled="disabled" {/if} /><br/>
					
					<input name="addressCounty" type="text" size="50"
					value="{$obj->mOrderInfo.county}"
					{if ! $obj->mEditEnabled} disabled="disabled" {/if} /><br/>
					
					<input name="addressPostCode" type="text" size="25"
					value="{$obj->mOrderInfo.postcode}"
					{if ! $obj->mEditEnabled} disabled="disabled" {/if} /><br/><br/>
				</td>
			</tr>
			<tr>
				<td class="bold-text">Customer Email: <br/>Telephone Number:<br/></td>
				<td>
					<input name="customerEmail" type="text" size="30"
					value="{$obj->mOrderInfo.emailAddress}"
					{if ! $obj->mEditEnabled} disabled="disabled" {/if} /><br/><br/>
					
					<input name="customerTelephone" type="text" size="30"
					value="{$obj->mOrderInfo.telephoneNumber}"
					{if ! $obj->mEditEnabled} disabled="disabled" {/if} /><br/><br/>
				</td>
			</tr>
		</table>
		
		<div class="borderless-records">
			<br/>
			<input type="submit" name="submitEdit" value="Edit"
			{if $obj->mEditEnabled} disabled="disabled" {/if} />
			<input type="submit" name="submitUpdate" value="Update"
			{if ! $obj->mEditEnabled} disabled="disabled" {/if} />
			<input type="submit" name="submitCancel" value="Cancel"
			{if ! $obj->mEditEnabled} disabled="disabled" {/if} />
			{if $obj->mProcessButtonText}
				<input type="submit" name="submitProcessOrder"
				value="{$obj->mProcessButtonText}" />
			{/if}
			<br/><br/>
		</div>
		<br/><div class="subtitle">Order contains these products:</div>
		<table class="records">
			<tr>
				<th>Product ID</th>
				<th>Product Name</th>
				<th>Quantity</th>
				<th>Unit Cost</th>
				<th>Subtotal</th>
			</tr>
			{section name=i loop=$obj->mOrderDetails}
				<tr>
					<td>{$obj->mOrderDetails[i].itemID}</td>
					<td>
						{$obj->mOrderDetails[i].itemName}<br/>
						{$obj->mOrderDetails[i].attributes}
					</td>
					<td>{$obj->mOrderDetails[i].orderQuantity}</td>
					<td>&pound{$obj->mOrderDetails[i].price}</td>
					<td>&pound{$obj->mOrderDetails[i].subtotal}</td>
				</tr>
			{/section}
		</table>
		<h3>Order audit trail:</h3>
		<table class="records">
			<tr>
				<th>Audit ID</th>
				<th>Created On</th>
				<th>Code</th>
				<th>Message</th>
			</tr>
			{section name=j loop=$obj->mAuditTrail}
				<tr>
					<td>{$obj->mAuditTrail[j].audit_id}</td>
					<td>{$obj->mAuditTrail[j].created_on}</td>
					<td>{$obj->mAuditTrail[j].code}</td>
					<td>{$obj->mAuditTrail[j].message}</td>
				</tr>
			{/section}
		</table>
	</form>