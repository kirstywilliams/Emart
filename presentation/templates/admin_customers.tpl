{* admin_customers.tpl *}
{load_presentation_object filename="admin_customers" assign="obj"}
	<div class="heading">eMart Customers</div>
	<form method="post" action="{$obj->mLinkToCustomersAdmin}">
		{if $obj->mErrorMessage}
			<div class="errorMessage">
				{$obj->mErrorMessage}
			</div>
		{/if}
		{if $obj->mCustomersCount eq 0}
			<div class="noitemsfound">
				There are no customers in the database!
			</div><!-- end noitemsfound -->
		{else}
			<table class="records">
				<tr>
				<th class="record-values-d3">First Name</th>
				<th class="record-values-d3">Surname</th>
				<th class="record-values-d3">Email</th>
				<th class="record-tools">Tools</th>
				</tr>

				{section name=i loop=$obj->mCustomers}
					<tr>
						<td>{$obj->mCustomers[i].firstname}</td>
						<td>{$obj->mCustomers[i].surname}</td>
						<td>{$obj->mCustomers[i].emailAddress}</td>
						<td>
							<input type="submit" name="submit_edit_cust_{$obj->mCustomers[i].customerID}" value="View Details" class="tool-button" />
						</td>
					</tr>
				{/section}
			</table>
		{/if}
		<div class="subtitle">
			Add new customer:
		</div>
		<p class="add-object">
			<input type="text" name="customer_first_name" placeholder="[first name]" size="25" />
			<input type="text" name="customer_surname" placeholder="[surname]" size="25" />
			<input type="text" name="customer_email" placeholder="[email address]" size="25" />
			<input type="text" name="customer_password" placeholder="[password]" size="20" />
			<input type="text" name="customer_telephone" placeholder="[telephone number]" size="20" />
			<input type="text" name="customer_address_line_one" placeholder="[street address]" size="25" />
			<input type="text" name="customer_town" placeholder="[town]" size="25" />
			<input type="text" name="customer_city" placeholder="[city]" size="25" />
			<input type="text" name="customer_county" placeholder="[county]" size="20" />
			<input type="text" name="customer_postcode" placeholder="[postcode]" size="8" />
			<input type="submit" name="submit_add_cust_0" value="Add" class="tool-button add-button" />
		</p>
	</form>
