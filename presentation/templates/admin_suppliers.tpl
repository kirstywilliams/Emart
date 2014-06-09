{* admin_suppliers.tpl *}
{load_presentation_object filename="admin_suppliers" assign="obj"}
	<div class="heading">eMart Suppliers</div>
	<form method="post" action="{$obj->mLinkToSuppliersAdmin}">
		{if $obj->mErrorMessage}
			<div class="errorMessage">
				{$obj->mErrorMessage}
			</div>
		{/if}
		{if $obj->mSuppliersCount eq 0}
			<div class="noitemsfound">
				There are no suppliers in the database!
			</div><!-- end noitemsfound -->
		{else}
			<table class="records">
				<tr>
				<th class="record-values-d2">Name</th>
				<th class="record-values-d2">Email</th>
				<th class="record-tools">Tools</th>
				</tr>

				{section name=i loop=$obj->mSuppliers}
					<tr>
						<td>{$obj->mSuppliers[i].supplierName}</td>
						<td>{$obj->mSuppliers[i].emailAddress}</td>
						<td>
							<input class="tool-button" type="submit" name="submit_edit_supp_{$obj->mSuppliers[i].supplierID}" value="View Details" />
						</td>
					</tr>
				{/section}
			</table>
		{/if}
		<div class="subtitle">
			Add new supplier:
		</div>
		<p class="add-object">
			<input type="text" name="supplier_name" placeholder="[company name]" size="25" />
			<input type="text" name="supplier_email" placeholder="[email address]" size="25" />
			<input type="text" name="supplier_telephone" placeholder="[telephone number]" size="20" />
			<input type="text" name="supplier_address_line_one" placeholder="[street address]" size="25" />
			<input type="text" name="supplier_town" placeholder="[town]" size="25" />
			<input type="text" name="supplier_city" placeholder="[city]" size="25" />
			<input type="text" name="supplier_county" placeholder="[county]" size="20" />
			<input type="text" name="supplier_postcode" placeholder="[postcode]" size="8" />
			<input type="submit" name="submit_add_supp_0" value="Add" class="tool-button add-button" />
		</p>
	</form>
