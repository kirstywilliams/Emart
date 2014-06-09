{* admin_orders.tpl *}
{load_presentation_object filename="admin_orders" assign="obj"}
	<div class="heading">eMart Orders</div>
	<form method="get" action="{$obj->mLinkToAdmin}">
		{if $obj->mErrorMessage}
			<div class="errorMessage">
				{$obj->mErrorMessage}
			</div>
		{/if}
		<input name="Page" type="hidden" value="Orders" />
		<p>
			<font class="bold-text">Show orders by customer</font>
			<select name="customer_id">
			{section name=i loop=$obj->mCustomers}
				<option value="{$obj->mCustomers[i].customerID}"
				{if $obj->mCustomers[i].customerID == $obj->mCustomerId}
				selected="selected" {/if}>
				{$obj->mCustomers[i].firstname} {$obj->mCustomers[i].surname}
				</option>
			{/section}
			</select>
			<input type="submit" name="submitByCustomer" value="Go!" />
		</p>
		<p>
			<font class="bold-text">Get by order ID</font>
			<input name="orderId" type="text" value="{$obj->mOrderId}" />
			<input type="submit" name="submitByOrderId" value="Go!" />
		</p>
		<p>
			<font class="bold-text">Show the most recent</font>
			<input name="recordCount" type="text" value="{$obj->mRecordCount}" />
			<font class="bold-text">orders</font>
			<input type="submit" name="submitMostRecent" value="Go!" />
		</p>
		<p>
			<font class="bold-text">Show all records created between</font>
			<input name="startDate" type="text" value="{$obj->mStartDate}" />
			<font class="bold-text">and</font>
			<input name="endDate" type="text" value="{$obj->mEndDate}" />
			<input type="submit" name="submitBetweenDates" value="Go!" />
		</p>
		<p>
			<font class="bold-text">Show orders by status</font>
			{html_options name="status" options=$obj->mOrderStatusOptions
				selected=$obj->mSelectedStatus}
			<input type="submit" name="submitOrdersByStatus" value="Go!" />
		</p>
	</form>
	{if $obj->mOrders}
		<table class="records">
			<tr>
				<th>Order ID</th>
				<th>Date Created</th>
				<th>Date Shipped</th>
				<th>Status</th>
				<th>Customer</th>
				<th>Tools</th>
			</tr>
			{section name=i loop=$obj->mOrders}
				{assign var=status value=$obj->mOrders[i].orderStatus}
				<tr>
				<td>{$obj->mOrders[i].orderID}</td>
				<td>{$obj->mOrders[i].createdOn|date_format:"%Y-%m-%d %T"}</td>
				<td>{$obj->mOrders[i].shippedOn|date_format:"%Y-%m-%d %T"}</td>
				{if $obj->mOrders[i].orderStatus == 'Received'}
					<td>{$obj->mOrderStatusOptions[0]}</td>
				{elseif $obj->mOrders[i].orderStatus == 'Checking Funds'}
					<td>{$obj->mOrderStatusOptions[1]}</td>
				{elseif $obj->mOrders[i].orderStatus == 'Notifying Stock Check'}
					<td>{$obj->mOrderStatusOptions[2]}</td>
				{elseif $obj->mOrders[i].orderStatus == 'Awaiting Stock Confirmation'}
					<td>{$obj->mOrderStatusOptions[3]}</td>
				{elseif $obj->mOrders[i].orderStatus == 'Awaiting Payment'}
					<td>{$obj->mOrderStatusOptions[4]}</td>
				{elseif $obj->mOrders[i].orderStatus == 'Notifying Warehouse Despatch'}
					<td>{$obj->mOrderStatusOptions[5]}</td>
				{elseif $obj->mOrders[i].orderStatus == 'Awaiting Despatch Confirmation'}
					<td>{$obj->mOrderStatusOptions[6]}</td>
				{elseif $obj->mOrders[i].orderStatus == 'Notifying Customer'}
					<td>{$obj->mOrderStatusOptions[7]}</td>
				{elseif $obj->mOrders[i].orderStatus == 'Complete'}
					<td>{$obj->mOrderStatusOptions[8]}</td>
				{elseif $obj->mOrders[i].orderStatus == 'Cancelled'}
					<td>{$obj->mOrderStatusOptions[9]}</td>
				{/if}
				<td>{$obj->mOrders[i].firstname} {$obj->mOrders[i].surname}</td>
				<td align="right">
					<a href="{$obj->mOrders[i].link_to_order_details_admin}">View Details</a>
				</td>
				</tr>
			{/section}
		</table>
	{/if}